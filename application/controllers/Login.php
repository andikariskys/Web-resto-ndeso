<?php

    class Login extends CI_Controller
    {
        public function index()
        {
            $title['title'] = "Login";
            $this->load->view('templates/header', $title);
            $this->load->view('login_view');
            $this->load->view('templates/footer');
        }

        public function login()
        {
            $username   = $this->input->post('username');
            $pass       = $this->input->post('password');

            $password = md5($pass);

            $data = $this->m_resto->cek_login($username, $password);

            if ($data->num_rows() > 0) {
                $d_login = $data->result();

                $data_user = array(
                    'id_user' => $d_login[0]->id_user,
                    'role_id' => $d_login[0]->role_id
                );
                $this->session->set_userdata('data_sess', $data_user);

                if ($d_login[0]->role_id == 0) {
                    redirect('manager');
                } else if ($d_login[0]->role_id == 1) {
                    redirect('admin');
                } else {
                    redirect('resto');
                }

            } else {
                echo "<script>alert('Username dan atau password salah'); window.location.href='../'</script>";
            }
            
        }

        public function reset_pass()
        {
            $title['title'] = "Reset Password";
            $this->load->view('templates/header', $title);
            $this->load->view('reset_password');
            $this->load->view('templates/footer');
        }

        public function check_reset()
        {
            $username   = $this->input->post('username');
            $kode       = $this->input->post('kode');
            $new_pass   = $this->input->post('new_password');

            $check_code = $this->m_resto->cek_kode($username, $kode);

            if ($check_code->num_rows() > 0) {
                $data_user = $check_code->result();

                $id_user = $data_user[0]->id_user;
                $pass_user = md5($new_pass);

                $data_pass = array(
                    'password'      => $pass_user,
                    'null_password' => null
                );

                $this->m_resto->simpan_pass_baru($id_user, $data_pass);

                echo "<script>alert('Password berhasil diubah, silakan login kembali.'); window.location.href='../'</script>";
            } else {
                echo "<script>alert('Username dan atau kode yang Anda masukkan salah'); window.location.href = '../login/reset_pass'</script>";
            }
            
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('');
        }
    }


?>