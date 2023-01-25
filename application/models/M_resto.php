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

        public function simpan_pass_baru($id_user, $data_pass)
        {
            $this->db->where('id_user', $id_user);
            $this->db->update('data_users', $data_pass);
        }

        public function simpan_tr_detail($data)
        {
            $this->db->insert('transaksi_detail', $data);
        }

        public function simpan_transaksi($data_transaksi)
        {
            $this->db->insert('transaksi', $data_transaksi);
        }

        public function get_stok($id_menu)
        {
            $this->db->where('id_menu', $id_menu);
            $stok = $this->db->get('data_menu')->result();

            return $stok[0];
        }

        public function update_stok($id_menu, $stok)
        {
            $this->db->where('id_menu', $id_menu);
            $this->db->update('data_menu', array('stok' => $stok));
        }

        public function get_riwayat_user($id_user)
        {
            $this->db->where('id_user', $id_user);
            return $this->db->get('transaksi')->result();
        }

        public function get_transaksi_id($id_transaksi)
        {
            $this->db->where('transaksi.id_transaksi', $id_transaksi);
            $this->db->from('transaksi');
            $this->db->join('data_users', 'transaksi.id_user = data_users.id_user');
            $transaksi = $this->db->get()->result();

            return $transaksi[0];
        }

        public function get_detail_id($id_transaksi)
        {
            $this->db->where('transaksi_detail.id_transaksi', $id_transaksi);
            $this->db->from('transaksi_detail');
            $this->db->join('data_menu', 'transaksi_detail.id_menu = data_menu.id_menu');
            return $this->db->get()->result();
        }

        public function get_all_riwayat()
        {
            $this->db->from('transaksi');
            $this->db->join('data_users', 'transaksi.id_user = data_users.id_user');
            return $this->db->get()->result();
        }

        public function jml_pembelian()
        {
            $this->db->select('dm.nama_menu, sum(td.jml_menu) as jumlah');
            $this->db->from('transaksi tr');
            $this->db->join('transaksi_detail td', 'tr.id_transaksi = td.id_transaksi');
            $this->db->join('data_menu dm', 'td.id_menu = dm.id_menu WHERE month(tgl_pesan) = month(now())');
            $this->db->group_by('td.id_menu');
            $this->db->order_by('jumlah', 'DESC');
            $this->db->limit('5');
            return $this->db->get()->result();
        }

        public function min_stok()
        {
            $this->db->limit('5');
            $this->db->order_by('stok', 'ASC');
            return $this->db->get('data_menu')->result();
        }
    }
    

?>