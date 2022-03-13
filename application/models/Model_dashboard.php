<?php

class Model_dashboard extends CI_Model 
{
    // get data produk
    public function get_produk()
    {
        return $this->db->get('produk');
    }

    //get data transaksi langsung
    public function transaksi_langsung()
    {
        return $this->db->get('transaksi');
    }

    // get data transaksi preorder
    public function transaksi_preorder()
    {
        return $this->db->get('preorder');
    }
}