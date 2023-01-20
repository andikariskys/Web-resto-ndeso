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

        public function confirm_order()
        {
            $jumlah         = $this->input->post('jumlah');
            $id_menu        = $this->input->post('id_menu');
            $nama_menu      = $this->input->post('nama_menu');
            $harga_menu     = $this->input->post('harga_menu');

            $arr_num        = 0;
            $data_id        = [];
            $jml_menu       = [];
            $data_nama      = [];
            $data_harga     = [];

            foreach ($id_menu as $mn) {
                if ($jumlah[$arr_num] > 0) {
                    array_push($data_id, $id_menu[$arr_num]);
                    array_push($jml_menu, $jumlah[$arr_num]);
                    array_push($data_nama, $nama_menu[$arr_num]);
                    array_push($data_harga, $harga_menu[$arr_num]);
                }

                $arr_num++;
            }

            $data['id_menu']    = $data_id;
            $data['nama_menu']  = $data_nama;
            $data['jumlah']     = $jml_menu;
            $data['harga']      = $data_harga;

            $title['title'] = "Konfirmasi Pesanan";
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_kasir');
            $this->load->view('transaksi/konfirmasi', $data);
            $this->load->view('templates/footer');
        }

        public function save_order()
        {
            $jml_menu       = $this->input->post('jml_menu');
            $id_menu        = $this->input->post('id_menu');

            $nama_pembeli       = $this->input->post('nama_pembeli');
            $total_transaksi    = $this->input->post('total_transaksi');
            $uang_pembeli       = $this->input->post('uang_pembeli');

            date_default_timezone_set('Asia/Jakarta');
            $id_transaksi = "INV-".str_replace(' ', '', date('Y m d H i s'));

            $no_array = 0;

            foreach ($id_menu as $id) {
                $data = array(
                    'id_detail'     => null, 
                    'id_transaksi'  => $id_transaksi,
                    'id_menu'       => $id_menu[$no_array],
                    'jml_menu'      => $jml_menu[$no_array]
                );

                $this->m_resto->simpan_tr_detail($data);

                $no_array++;
            }

            $data_sess = $this->session->userdata('data_sess');

            $data_transaksi = array(
                'id_transaksi'      => $id_transaksi, 
                'id_user'           => $data_sess['id_user'],
                'nama_pembeli'      => $nama_pembeli,
                'tgl_pesan'         => date('Y-m-d H:i:s'),
                'total_pembelian'   => $total_transaksi,
                'uang_pembeli'      => $uang_pembeli
            );

            $this->m_resto->simpan_transaksi($data_transaksi);

            redirect('resto');
        }
    }
    

?>