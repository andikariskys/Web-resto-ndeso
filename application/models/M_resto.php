<?php

    class M_resto extends CI_Model
    {
        public function get_all_menu()
        {
            return $this->db->get('data_menu')->result();
        }

        public function get_menu()
        {
            $this->db->where('status', 'tampil');
            return $this->db->get('data_menu')->result();
        }

        public function simpan_menu($data_menu)
        {
            $this->db->insert('data_menu', $data_menu);
        }

        public function get_menu_id($id_menu)
        {
            $this->db->where('id_menu', $id_menu);
            $data_menu =  $this->db->get('data_menu')->result();
            return $data_menu[0];
        }

        public function simpan_edit_menu($id_menu, $data_edit)
        {
            $this->db->where('id_menu', $id_menu);
            $this->db->update('data_menu', $data_edit);
        }

        public function hapus_menu($id_menu)
        {
            $this->db->where('id_menu', $id_menu);
            $this->db->delete('data_menu');
        }

        public function cek_status($id_menu)
        {
            $this->db->where('id_menu', $id_menu);
            $this->db->select('status');
            $status = $this->db->get('data_menu')->result();

            return $status[0]->status;
        }

        public function ubah_status($id_menu, $status)
        {
            $this->db->where('id_menu', $id_menu);
            $this->db->update('data_menu', array('status' => $status));
        }

        public function users()
        {
            $this->db->where('role_id', 2);
            $this->db->or_where('role_id', 3);
            return $this->db->get('data_users')->result();
        }

        public function reset_password($id_user, $data)
        {
            $this->db->where('id_user', $id_user);
            $this->db->update('data_users', $data);
        }

        public function simpan_user($nama, $username, $role_id, $kode_reset)
        {
            $this->db->query("INSERT INTO data_users VALUES(uuid(), '$username', NULL, '$nama', $role_id, $kode_reset)");
        }

        public function hapus_user($id_user)
        {
            $this->db->where('id_user', $id_user);
            $this->db->delete('data_users');
        }

        public function simpan_edit_user($id_user, $data)
        {
            $this->db->where('id_user', $id_user);
            $this->db->update('data_users', $data);
        }

        public function cek_login($username, $password)
        {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            return $this->db->get('data_users');
        }

        public function cek_kode($username, $kode)
        {
            $this->db->where('username', $username);
            $this->db->where('null_password', $kode);

            return $this->db->get('data_users');
        }
    }
    

?>