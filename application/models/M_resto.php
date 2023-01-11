<?php

    class M_resto extends CI_Model
    {
        public function get_all_menu()
        {
            return $this->db->get('data_menu')->result();
        }

        public function simpan_menu($data_menu)
        {
            $this->db->insert('data_menu', $data_menu);
        }

        public function get_menu()
        {
            $this->db->where('status', 'tampil');
            return $this->db->get('data_menu')->result();
        }
    }
    

?>