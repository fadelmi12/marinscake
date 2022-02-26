<?php

class Model_dashboard extends CI_Model 
{
    public function get_produk()
    {
        return $this->db->get('produk');
    }

    public function transaksi_langsung()
    {
        return $this->db->get('transaksi');
    }
    public function transaksi_preorder()
    {
        return $this->db->get('preorder');
    }
}