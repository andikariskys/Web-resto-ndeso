<?php

    class Resto extends CI_Controller
    {
        public function index()
        {
            $data['title'] = "Dashboard";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_kasir');
            $this->load->view('transaksi/dashboard');
            $this->load->view('templates/footer');
        }
    }
    

?>