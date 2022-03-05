<?php

class Model_kota extends CI_Model
{
    public function get_kota()
    {
        return $this->db->get('daerah_kirim');
    }

    public function get_kota_where($id_kota)
    {
        $this->db->select('*');
        $this->db->from('daerah_kirim');
        $this->db->where('id_daerah', $id_kota);
        return $this->db->get('');
    }
}
