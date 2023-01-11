<?php

    class Admin extends CI_Controller
    {
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

            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';

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
                'id_menu' => null,
                'nama_menu' => $nama_menu,
                'kategori' => $kategori,
                'stok' => $stok,
                'harga_satuan' => $harga_satuan,
                'gambar' => $foto,
                'status' => ''
            );

            $this->m_resto->simpan_menu($data_menu);

            redirect('admin');
        }
    }
    

?>