<?php

class Model_laporan extends CI_Model {

    //          Transaksi
    public function get_pengeluaran($idUser)
    {
        $this->db->select_sum('jumlah');
        $this->db->from('transaksi');
        $this->db->where('idUser' , $idUser);
        $this->db->where('tipe_transaksi' , 'Pengeluaran');

        return $this->db->get();
    }

    public function get_pemasukan($idUser){
        $this->db->select_sum('jumlah');
        $this->db->from('transaksi');
        $this->db->where('idUser' , $idUser);
        $this->db->where('tipe_transaksi' , 'Pemasukan');

        return $this->db->get();
    }

    //          Penggajian
    public function get_gaji_karyawan($query)
    {
        $this->db->select('*');
        $this->db->from('gaji_karyawan');
        $this->db->like('bulan', $query);
        return $this->db->get();
    }

    public function get_gaji($idKaryawan)
    {
        $this->db->select('gaji');
        $this->db->from('karyawan');
        $this->db->where('idKaryawan', $idKaryawan);
        return $this->db->get();
    } 

    //          Permodalan
    public function get_data_modal($bulan)
    {
        $this->db->select('*');
        $this->db->from('modal');
        $this->db->like('tanggal', $bulan);
        return $this->db->get();
    }

    public function get_detail_modal()
    {
        return $this->db->get('detail_modal');
    }

    public function get_detail_modal_where($idModal)
    {
        return $this->db->get_where('detail_modal', array('idModal' => $idModal));
    } 

    //              Transaksi Langsung
    public function get_transaksi_langsung($filter)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->like('tanggal', $filter);
        return $this->db->get();
    }

    public function get_detail_transaksi_langsung()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('detail_transaksi', 'detail_transaksi.idProduk = produk.idProduk');
        return $this->db->get();
    }

     //              Transaksi Preorder
    public function get_transaksi_preorder($filter)
    {
        $this->db->select('*');
        $this->db->from('preorder');
        $this->db->like('tanggalPesan', $filter);
        return $this->db->get();
    }

    public function get_detail_transaksi_preorder()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('detail_preorder', 'detail_preorder.idProduk = produk.idProduk');
        return $this->db->get();
    }

    //      Laporan Keuntungan
    public function total_transaksi_langsung($filter)
    {
        $this->db->select('SUM(total_belanja) as langsung');
        $this->db->from('transaksi');
        $this->db->like('tanggal', $filter);
        return $this->db->get();
    }

    public function total_transaksi_preorder($filter)
    {
        $this->db->select('SUM(jumlah) as preorder');
        $this->db->from('preorder');
        $this->db->like('tanggalPesan', $filter);
        return $this->db->get();
    }

    public function total_pengeluaran_modal($filter)
    {
        $this->db->select('SUM(totalModal) as keluar_modal');
        $this->db->from('modal');
        $this->db->like('tanggal', $filter);
        return $this->db->get();
    }

    public function total_pengeluaran_gaji($filter)
    {
        $this->db->select('SUM(uangGaji) as keluar_gaji');
        $this->db->from('gaji_karyawan');
        $this->db->like('bulan', $filter);
        return $this->db->get();
    }
}