<?php

    class Resto extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $data_sess = $this->session->userdata('data_sess');

            if ($data_sess['role_id'] != 2) {
                redirect('login');
            }
        }

        public function index()
        {
            $title['title'] = "Dashboard";
            $data['menu'] = $this->m_resto->get_menu();
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_kasir');
            $this->load->view('transaksi/dashboard', $data);
            $this->load->view('templates/footer');
        }
    }
    

?>