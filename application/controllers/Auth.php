<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	// public function index()
	// {
	// 	if ($this->session->login === true) {
	// 		redirect("admin");
	// 	}

	// 	$data['title'] = 'Apotek | Login';
	// 	$this->load->view('module/header', $data);
	// 	$this->load->view('login');
	// 	$this->load->view('module/footer');
	// }

	// public function login()
	// {
	// 	$username = $this->input->post("username");
	// 	$password = $this->input->post("password");

	// 	$cek = $this->db->get_where("users", ["username" => $username])->result();
	// 	if (count($cek) > 0) {
	// 		if ($cek[0]->password === sha1($password)) {

	// 			$this->session->set_userdata([
	// 				"login" => true,
	// 				"name" => $cek[0]->name
	// 			]);

	// 			redirect("admin");
	// 		} else {
	// 			$this->session->set_flashdata("msg", "<div class='alert alert-danger'>Password salah!</div>");
	// 			redirect("auth");
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata("msg", "<div class='alert alert-danger'>Username tidak terdaftar!</div>");
	// 		redirect("auth");
	// 	}
	// }

	public function index()
	{
		$this->form_validation->set_rules(
			'username',
			'username',
			'required|trim',
			[
				'required' => 'Email wajib diisi.',
				'valid_email' => 'Format email tidak valid.'
			]
		);

		$this->form_validation->set_rules(
			'password',
			'Password',
			'required|trim|min_length[3]',
			[
				'required' => 'Password wajib diisi.',
				'min_length' => 'Password harus memiliki minimal 3 karakter.'
			]
		);

		if ($this->form_validation->run() == false) {
			$this->load->view('Components/header');
			$this->load->view('Pages/Auth/login');
		} else {
			$this->_login();
		}
	}



	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['username' => $username])->row_array();

		if ($user) {
			//cek password 
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'role_id' => $user['role_id'],
					'id_user' => $user['id_user'],
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('CPages/admin');
					// redirect('admin');
				} elseif ($user['role_id'] == 2) {
					redirect('CPages/apoteker');
				} elseif ($user['role_id'] == 3) {
					redirect('CPages/pelanggan');
				}
			} else {
				$this->session->set_flashdata('message', '<p class="text-sm text-red-500">
					password salah
		 			 </p>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<p class="text-sm text-red-500">
			username tidak terdaftar
		 	 </p>');
			redirect('Auth');
		}
	}



	public function registrasi_pelanggan()
	{
		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Buat Akun';
			$this->load->view('Components/header', $data);
			$this->load->view('Pages/Auth/registrasi_pelanggan');
			$this->load->view('Components/footer');
		} else {
			$data_user = [
				'name'         => $this->input->post('name'),
				'username'     => $this->input->post('username'),
				'role_id'      => '3',
				'created_at'      => date('Y-m-d H:i:s'),
				'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			];

			$data_pelanggan = [
				'nama_pelanggan'         => $this->input->post('name'),
				'username'               => $this->input->post('username'),
				'no_telp'                => $this->input->post('no_telp'),
				'alamat'                 => $this->input->post('alamat'),
			];

			$this->db->insert('users', $data_user);
			$this->db->insert('pelanggan', $data_pelanggan);
			$this->session->set_flashdata('message', '<p class="text-sm text-black">akun berhasil dibuat</p>');
			redirect('Auth');
		}
	}



	public function logout()
	{
		session_destroy();

		redirect("auth", "refresh");
	}
}
