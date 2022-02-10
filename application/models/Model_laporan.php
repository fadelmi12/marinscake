<?php

class Model_laporan extends CI_Model {

    public function get_pengeluaran($idUser){
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
}