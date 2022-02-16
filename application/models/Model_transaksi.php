<?php

class Model_transaksi extends CI_Model{

    public function get_riwayat_transaksi($tanggal)
    {
        return $this->db->get_where('transaksi', array('tanggal' => $tanggal));
    }

    public function detail_riwayat_transaksi()
    {
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('produk', 'produk.idProduk = detail_transaksi.idProduk');
        return $this->db->get('');
    }

    public function get_riwayat_preorder($tanggal)
    {   
        return $this->db->get_where('preorder', array('tanggalPesan' => $tanggal));
    }

    public function detail_riwayat_preorder()
    {
        $this->db->select('*');
        $this->db->from('detail_preorder');
        $this->db->join('produk', 'produk.idProduk = detail_preorder.idProduk');
        return $this->db->get('');
    }
} 