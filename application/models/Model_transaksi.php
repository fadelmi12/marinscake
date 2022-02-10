<?php

class Model_transaksi extends CI_Model{
    public function tambah_transaksi($data){
        $this->db->insert('transaksi',$data);
    }

    public function get_transaksi($id){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('idUser =', $id);
        return $this->db->get();
    }

}