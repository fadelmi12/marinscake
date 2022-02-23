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

    
}