<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CPages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function admin()
    {
        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_admin');
        $this->load->view('Pages/Admin/dashboard');
        $this->load->view('Components/footer');
    }

    public function apoteker()
    {
        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_apoteker');
        $this->load->view('Pages/Apoteker/dashboard');
        $this->load->view('Components/footer');
    }

    public function pelanggan()
    {
        $this->load->view('Components/header');
        $this->load->view('Pages/Pelanggan/beranda');
        $this->load->view('Pages/Pelanggan/page_footer');
        $this->load->view('Components/footer');
    }

    public function owner()
    {
        $this->load->view('Components/header');
        $this->load->view('Components/sidebar_owner');
        $this->load->view('Pages/Owner/laporan');;
        $this->load->view('Components/footer');
    }
}
