<?php

class Model_transaksi extends CI_Model
{

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

    public function barang_belum_dikirim()
    {
        return $this->db->get_where('preorder', array('status' => 'Menunggu Pengiriman'));
    }

    public function get_transaksi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('idTransaksi', $id_transaksi);
        return $this->db->get('');
    }

    public function get_detailTransaksi($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->where('idTransaksi', $id_transaksi);
        return $this->db->get('');
    }

    public function get_pengiriman($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('pengiriman');
        $this->db->where('idTransaksi', $id_transaksi);
        return $this->db->get('');
    }

    public function get_midtrans($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('midtrans');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get('');
    }
}
