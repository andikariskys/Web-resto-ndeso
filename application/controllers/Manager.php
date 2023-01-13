<?php

    class Manager extends CI_Controller
    {
        public function index()
        {
            $title['title'] = "Daftar Menu";
            $data['menu'] = $this->m_resto->get_all_menu();
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_manager');
            $this->load->view('manager/dashboard', $data);
            $this->load->view('templates/footer');
        }

        public function edit_status_menu($id_menu)
        {
            $status = $this->m_resto->cek_status($id_menu);

            if ($status == "tampil") {
                $this->m_resto->ubah_status($id_menu, "");
            } else {
                $this->m_resto->ubah_status($id_menu, "tampil");
            }

            redirect('manager');
        }

        public function edit_menu($id_menu)
        {
            $data['menu'] = $this->m_resto->get_menu_id($id_menu);
            $title['title'] = "Edit Menu";
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_manager');
            $this->load->view('manager/edit_menu', $data);
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
            redirect('manager');
        }
        
        public function delete_menu($id_menu)
        {
            $this->m_resto->hapus_menu($id_menu);
            redirect('manager');
        }

        public function data_user()
        {
            $title['title'] = "Daftar User";
            $data['users'] = $this->m_resto->users();
            $this->load->view('templates/header', $title);
            $this->load->view('templates/navbar_manager');
            $this->load->view('manager/data_users', $data);
            $this->load->view('templates/footer');
        }
    }
    

?>