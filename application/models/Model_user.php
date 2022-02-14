<?php

class Model_user extends CI_Model
{
    public function get_data_user()
    {
        return $this->db->get('user');
    }
}
