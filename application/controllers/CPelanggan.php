<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CPelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPelanggan');
    }

    public function produk()
    {
        $idUser = $this->session->userdata('id_user');

        $data['obat'] = $this->MPelanggan->get_all_obat();
        $data['cartCount'] = $this->MPelanggan->count_item_cart($idUser);

        $this->load->view('Components/header');
        $this->load->view('Components/navbar', $data);
        $this->load->view('Pages/Pelanggan/produk', $data);
        $this->load->view('Components/footer');
    }

    public function bantuan()
    {
        $this->load->view('Components/header');
        $this->load->view('Components/navbar');
        $this->load->view('Pages/Pelanggan/bantuan');
        $this->load->view('Components/footer');
    }

    public function detail_produk($kode_obat)
    {
        $data['produk'] = $this->MPelanggan->get_by_kode_obat($kode_obat);

        $this->load->view('Components/header');
        $this->load->view('Components/navbar');
        $this->load->view('Pages/Pelanggan/detail_produk', $data);
        $this->load->view('Components/footer');
    }

    public function keranjang()
    {
        // Menampilkan isi keranjang
        $idUser = $this->session->userdata('id_user');
        $data['keranjang'] = $this->MPelanggan->get_keranjang_user($idUser);

        $data['cartCount'] = $this->MPelanggan->count_item_cart($idUser);


        $this->load->view('Components/header');
        $this->load->view('Components/navbar', $data);
        $this->load->view('Pages/Pelanggan/keranjang', $data);
        $this->load->view('Components/footer');
    }


    public function tambah_keranjang()
    {
        // Ambil data POST
        $idUser = $this->session->userdata('id_user'); // ID user dari session
        $kodeObat = $this->input->post('kode_obat');
        $jumlah = $this->input->post('jumlah');


        // Cek apakah item sudah ada di keranjang
        $cartItem = $this->MPelanggan->get_user_item($idUser, $kodeObat);

        if ($cartItem) {
            // Update jumlah jika item sudah ada
            $newJumlah = $cartItem->jumlah + $jumlah;
            $this->MPelanggan->update_item($idUser, $kodeObat, $newJumlah);
        } else {
            // Tambahkan item baru ke keranjang
            $this->MPelanggan->add_item([
                'id_user' => $idUser,
                'kode_obat' => $kodeObat,
                'jumlah' => $jumlah,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        // Redirect dengan pesan sukses
        $this->session->set_flashdata('success', 'Item berhasil ditambahkan ke keranjang.');
        redirect('CPelanggan/produk'); // Kembali ke halaman katalog
    }

    public function checkout()
    {
        $id_user = $this->session->userdata('id_user');
        $keranjang = $this->MPelanggan->get_keranjang_user($id_user);

        // Insert data keranjang ke dalam transaksi
        foreach ($keranjang as $item) {
            $total_harga = $item['harga'] * $item['jumlah'];
            $data_transaksi = [
                'id_user' => $id_user,
                'kode_obat' => $item['kode_obat'],
                'jumlah' => $item['jumlah'],
                'total_harga' => $total_harga,
                'status_pembayaran' => 'menunggu',  // Status sementara
                'created_at' => date('Y-m-d H:i:s'),
            ];
            if (!empty($_FILES['bukti_pembayaran']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|pdf';
                $config['max_size'] = 2048; // 2MB
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('bukti_pembayaran')) {
                    $data_transaksi['bukti_pembayaran'] = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('CPelanggan/detail_produk');
                }
            }
            $this->db->insert('transaksi', $data_transaksi);
        }

        // Hapus data keranjang setelah checkout
        $this->MPelanggan->hapus_keranjang_user($id_user);

        // Redirect ke halaman upload bukti pembayaran
        redirect('CPages/pelanggan');
    }

    // Halaman untuk upload bukti pembayaran
    public function upload_bukti()
    {
        $idUser = $this->session->userdata('id_user');
        $data['cartCount'] = $this->MPelanggan->count_item_cart($idUser);


        $this->load->view('Components/header');
        $this->load->view('Components/navbar', $data);
        $this->load->view('Pages/Pelanggan/upload_bukti', $data);
        $this->load->view('Components/footer');
    }


    // public function proses_upload_bukti()
    // {
    //     $this->load->library('upload');

    //     // Pengaturan konfigurasi upload
    //     $config['upload_path'] = 'uploads/';
    //     $config['allowed_types'] = 'jpg|jpeg|png|pdf'; // Menentukan tipe file yang diizinkan
    //     $config['max_size']      = 2048; // Max size 2MB
    //     $config['file_name']     = 'bukti_pembayaran_' . time();

    //     // Memuat library upload dan mengatur konfigurasi
    //     $this->upload->initialize($config);

    //     // Jika ada file yang diupload
    //     if ($this->upload->do_upload('bukti_pembayaran')) {
    //         $data = $this->upload->data();
    //         $file_path = 'uploads/' . $data['file_name'];

    //         // Anda bisa menyimpan file path ke database atau melakukan proses lainnya
    //         $response = [
    //             'status' => 'success',
    //             'message' => 'File berhasil diupload.',
    //             'file_path' => $file_path
    //         ];
    //     } else {
    //         // Jika gagal upload
    //         $response = [
    //             'status' => 'error',
    //             'message' => $this->upload->display_errors()
    //         ];
    //     }

    //     $this->db->insert('');
    // }

    public function proses_upload_bukti()
    {
        // Validasi input ID transaksi
        $id_transaksi = $this->input->post('id_transaksi');
        if (empty($id_transaksi)) {
            $this->session->set_flashdata('error', 'ID transaksi wajib diisi.');
            redirect('form_url'); // Ganti 'form_url' dengan URL form Anda
        }

        // Konfigurasi upload file
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf'; // Format file yang diperbolehkan
        $config['max_size'] = 2048; // Maksimal ukuran file dalam KB (2MB)
        $config['file_name'] = 'bukti_pembayaran_' . time();

        $this->upload->initialize($config);

        // Proses upload file
        if ($this->upload->do_upload('bukti_pembayaran')) {
            $upload_data = $this->upload->data();
            $file_path = 'uploads/' . $upload_data['file_name'];

            // Update field bukti_pembayaran di database
            $update_data = ['bukti_pembayaran' => $file_path];
            $update_status = $this->MPelanggan->update_bukti_pembayaran($id_transaksi, $update_data);

            if ($update_status) {
                $this->session->set_flashdata('success', 'Bukti pembayaran berhasil diupload.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data di database.');
            }
        } else {
            // Jika gagal upload
            $this->session->set_flashdata('error', $this->upload->display_errors());
        }

        // Redirect kembali ke form
        redirect('CPages/Pelanggan'); // Ganti 'form_url' dengan URL form Anda
    }


    // public function tambah_keranjang()
    // {
    //     $kode_obat = $this->input->post('kode_obat');
    //     $jumlah = $this->input->post('jumlah');

    //     if ($kode_obat && $jumlah) {
    //         $this->MPelanggan->add_to_cart($kode_obat, $jumlah);
    //         // Redirect atau beri notifikasi sukses
    //         redirect('keranjang');
    //     } else {
    //         // Redirect atau beri pesan error
    //         redirect('obat');
    //     }
    // }


    // public function keranjang()
    // {

    //     // Mendapatkan ID user dari session
    //     $user_id = $this->session->userdata('user_id');

    //     // Mengambil data keranjang berdasarkan user_id dengan join ke tabel 'obat'
    //     $this->db->select('keranjang.id_keranjang, keranjang.user_id, keranjang.kode_obat, keranjang.jumlah, obat.nama_obat, obat.harga');
    //     $this->db->from('keranjang');
    //     $this->db->join('obat', 'keranjang.kode_obat = obat.kode_obat', 'left');
    //     $this->db->where('keranjang.user_id', $user_id);
    //     $query = $this->db->get();

    //     $data['keranjang'] = $query->result_array();

    //     $data['keranjang'] = $this->MPelanggan->get_all_cart($user_id);

    //     if (!$this->session->userdata('role_id')) {
    //         $this->session->set_flashdata('message', 'Kamu harus login dulu');
    //         redirect('Auth');
    //     }
    //     $this->load->view('Components/header');
    //     $this->load->view('Components/navbar');
    //     $this->load->view('Pages/Pelanggan/keranjang', $data);
    //     $this->load->view('Components/footer');
    // }


    // public function remove($kode_obat)
    // {
    //     $this->MPelanggan->remove_from_cart($kode_obat);
    //     redirect('keranjang');
    // }
}
