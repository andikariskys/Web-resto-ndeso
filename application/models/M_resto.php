<?php

    class M_resto extends CI_Model
    {
        public function get_menu()
        {
            $this->db->where('status', 'tampil');
            return $this->db->get('data_menu')->result();
        }
    }
    

?>