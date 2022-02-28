<?php

class Model_kota extends CI_Model
{
    public function get_kota()
    {
        return $this->db->get('daerah_kirim');
    }
}
