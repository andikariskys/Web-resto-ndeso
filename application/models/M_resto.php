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
    }
    

?>