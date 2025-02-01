<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('MAdmin');
    }


    public function data_transaksi()
    {
        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_admin');
        $this->load->view('Pages/Admin/data_obat');
        $this->load->view('Components/footer');
    }

    public function konfirmasi_pemesanan()
    {
        $data['transaksi'] = $this->MAdmin->get_all_transaksi();
        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_admin');
        $this->load->view('Pages/Admin/konfirmasi_pemesanan', $data);
        $this->load->view('Components/footer');
    }

    public function konfirmasi_transaksi($id_transaksi)
    {
        $result = $this->MAdmin->update_status_pembayaran($id_transaksi, 'konfirmasi');

        if ($result) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dikonfirmasi.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengkonfirmasi transaksi.');
        }

        redirect('CAdmin/konfirmasi_pemesanan');
    }

    public function laporan_transaksi()
    {
        // Ambil data start_date dan end_date dari form
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        // Panggil fungsi get_laporan dengan parameter tanggal yang dikirim
        $data['laporan'] = $this->MAdmin->get_laporan($start_date, $end_date);

        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_admin');
        $this->load->view('Pages/Admin/laporan_transaksi', $data);
        $this->load->view('Components/footer');
    }

    public function tambah_akun_apoteker()
    {
        $this->form_validation->set_rules('nama_apoteker', 'Nama Apoteker', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[5]|max_length[255]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Components/header');
            $this->load->view('Components/sidebar_admin');
            $this->load->view('Pages/Admin/tambah_akun_apoteker');
            $this->load->view('Components/footer');
        } else {
            $data_user = [
                'username'     => $this->input->post('username'),
                'role_id'      => '2',
                'created_at'      => date('Y-m-d H:i:s'),
                'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            ];

            $data_apoteker = [
                'nama_apoteker'   => $this->input->post('nama_apoteker'),
                'username'     => $this->input->post('username'),
                'no_telp'          => $this->input->post('no_telp'),
                'alamat'           => $this->input->post('alamat'),
                'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
                'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
            ];

            $this->db->insert('users', $data_user);
            $this->db->insert('apoteker', $data_apoteker);
            $this->session->set_flashdata('message', '<p class="text-sm text-black">akun berhasil dibuat</p>');
            redirect('Auth');
        }
    }
}
