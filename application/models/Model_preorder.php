<?php

class Model_preorder extends CI_Model
{
    // get data preorder sesuai param
    public function get_riwayat_preorder($tanggal)
    {
        return $this->db->get_where('preorder', array('tanggalPesan' => $tanggal));
    }

    // get data detail preorder join dengan tb produk
    public function detail_riwayat_preorder()
    {
        $this->db->select('*');
        $this->db->from('detail_preorder');
        $this->db->join('produk', 'produk.idProduk = detail_preorder.idProduk');
        return $this->db->get('');
    }

    // get data preorder status menunggu pengiriman
    public function barang_belum_dikirim()
    {
        return $this->db->get_where('preorder', array('status' => 'Menunggu Pengiriman'));
    }

    // get data preorder where id preorder sesuai parameter
    public function get_preorder($id_preorder)
    {
        $this->db->select('*');
        $this->db->from('preorder');
        $this->db->where('idPreorder', $id_preorder);
        return $this->db->get('');
    }

    // get data detail preorder where id preorder sesuai parameter
    public function get_detailPreorder($id_preorder)
    {
        $this->db->select('*');
        $this->db->from('detail_preorder');
        $this->db->where('idPreorder', $id_preorder);
        return $this->db->get('');
    }

    // get data pengiriman where id preorder sesuai parameter
    public function get_pengiriman($id_preorder)
    {
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->where('idPreorder', $id_preorder);
        return $this->db->get('');
    }

    // get data midtrans where id preorder sesuai parameter
    public function get_midtrans($id_preorder)
    {
        $this->db->select('*');
        $this->db->from('midtrans');
        $this->db->where('id_preorder', $id_preorder);
        return $this->db->get('');
    }
}
