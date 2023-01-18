<?php

    class Manager extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $data_sess = $this->session->userdata('data_sess');

            if ($data_sess['role_id'] != 0) {
                redirect('login');
            }
        }

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

        public function reset_pass($id_user)
        {
            $kode_reset = rand(10001, 99999);
            $data = array(
                'password' => null,
                'null_password' => $kode_reset
            );

            $this->m_resto->reset_password($id_user, $data);
            echo "<script>alert('Kode password reset: ".$kode_reset."'); window.location.href='../data_user'</script>";
        }

        public function save_user()
        {
            $nama       = $this->input->post('nama');
            $username   = $this->input->post('username');
            $role_id    = $this->input->post('role_id');

            $this->m_resto->simpan_user($nama, $username, $role_id);
            redirect('manager/data_user');
        }

        public function delete_user($id_user)
        {
            $this->m_resto->hapus_user($id_user);
        }

        public function save_edit_user()
        {
            $id_user    = $this->input->post('id_user');
            $nama       = $this->input->post('nama');
            $username   = $this->input->post('username');
            $role_id    = $this->input->post('role_id');

            $data = array(
                'nama'      => $nama,
                'username'  => $username,
                'role_id'   => $role_id
            );

            $this->m_resto->simpan_edit_user($id_user, $data);
            redirect('manager/data_user');
        }
    }
    

?>