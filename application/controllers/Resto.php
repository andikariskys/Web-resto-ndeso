<?php

    class Resto extends CI_Controller
    {
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