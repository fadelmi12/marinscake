<?php

class Model_user extends CI_Model
{
    public function get_data_user()
    {
        return $this->db->get('user');
    }

    public function get_user_id($id_user)
    {
        $this->db->where('idUser', $id_user);
        return $this->db->get('user');
    }
}
