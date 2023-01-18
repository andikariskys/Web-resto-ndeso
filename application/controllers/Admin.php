<?php

    class Admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $data_sess = $this->session->userdata('data_sess');

            if ($data_sess['role_id'] != 1) {
                redirect('login');
            }
        }

        public function index()
        {
            $title['title'] = "Daftar Menu";
            $data['menu'] = $this->m_resto->get_all_menu();
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/dashboard', $data);
            $this->load->view('templates/footer');
        }

        public function add_menu()
        {
            $title['title'] = "Tambah Menu";
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/add_menu');
            $this->load->view('templates/footer');
        }

        public function save_menu()
        {
            $foto = '';

            $config['upload_path']      = './assets/images/';
            $config['allowed_types']    = 'jpg|jpeg|png|webp';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "<script> alert('Gambar gagal di upload'); window.history.back(); </script>";
            } else {
                $foto = $this->upload->data('file_name');
            }

            $nama_menu      = $this->input->post('nama_menu');
            $kategori       = $this->input->post('kategori');
            $stok           = $this->input->post('stok');
            $harga_satuan   = $this->input->post('harga_satuan');

            $data_menu = array(
                'id_menu'       => null,
                'nama_menu'     => $nama_menu,
                'kategori'      => $kategori,
                'stok'          => $stok,
                'harga_satuan'  => $harga_satuan,
                'gambar'        => $foto,
                'status'        => ''
            );

            $this->m_resto->simpan_menu($data_menu);
            redirect('admin');
        }

        public function edit_menu($id_menu)
        {
            $data['menu'] = $this->m_resto->get_menu_id($id_menu);
            $title['title'] = "Edit Menu";
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_admin');
            $this->load->view('admin/edit_menu', $data);
            $this->load->view('templates/footer');
        }

        public function save_edit_menu()
        {
            $config['allowed_types']    = 'png|jpg|jpeg|webp';
            $config['upload_path']      = './assets/images/';

            $this->load->library('upload', $config);

            $gambar = "";

            if (!$this->upload->do_upload('foto')) {
                $gambar = $this->input->post('gambar');
            } else {
                $gambar = $this->upload->data('file_name');
            }

            $id_menu        = $this->input->post('id_menu');
            $status         = $this->input->post('status');
            $nama_menu      = $this->input->post('nama_menu');
            $kategori       = $this->input->post('kategori');
            $stok           = $this->input->post('stok');
            $harga_satuan   = $this->input->post('harga_satuan');

            $data_edit = array(
                'nama_menu'     => $nama_menu,
                'kategori'      => $kategori,
                'stok'          => $stok,
                'harga_satuan'  => $harga_satuan,
                'gambar'        => $gambar,
                'status'        => $status
            );

            $this->m_resto->simpan_edit_menu($id_menu, $data_edit);
            redirect('admin');
        }
        
        public function delete_menu($id_menu)
        {
            $this->m_resto->hapus_menu($id_menu);
            redirect('admin');
        }
    }

?>