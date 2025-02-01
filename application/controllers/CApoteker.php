<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CApoteker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MApoteker');
    }

    public function data_obat()
    {
        $data['obat'] = $this->MApoteker->get_all_obat();

        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_apoteker');
        $this->load->view('Pages/Apoteker/data_obat', $data);
        $this->load->view('Components/footer');
    }

    public function tambah_obat()
    {
        // Menampilkan form tambah obat
        $data['units'] = $this->MApoteker->get_all_units();

        if ($this->input->post()) {
            $this->form_validation->set_rules('kode_obat', 'Kode Obat', 'required|is_unique[obat.kode_obat]');
            $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'required');
            $this->form_validation->set_rules('stok', 'Stok', 'required|integer');
            $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

            if ($this->form_validation->run()) {
                $data_obat = [
                    'id_unit'   => $this->input->post('id_unit'),
                    'kode_obat' => $this->input->post('kode_obat'),
                    'nama_obat' => $this->input->post('nama_obat'),
                    'stok'      => $this->input->post('stok'),
                    'harga'     => $this->input->post('harga'),
                    'gambar'    => $this->input->post('gambar')
                ];
                $this->MApoteker->insert_obat($data_obat);
                redirect('obat');
            }
        }

        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_apoteker');
        $this->load->view('Pages/Apoteker/tambah_obat', $data);
        $this->load->view('Components/footer');
    }


    public function hapus_obat($id_obat)
    {
        // Menghapus data obat
        $this->Obat_model->delete_obat($id_obat);
        redirect('obat');
    }
}
