<?php

class Model_laporan extends CI_Model {

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

    public function get_gaji_karyawan($bln_ini)
    {
        $result = $this->db->get_where('gaji_karyawan', array('bulan' => $bln_ini));
        if($result->num_rows() >= 0){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function search_bulan($query)
    {
        $this->db->select('*');
        $this->db->from('gaji_karyawan');
        $this->db->like('bulan', $query);
        return $this->db->get()->result_array();

    }
}