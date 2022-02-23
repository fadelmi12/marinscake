<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modal extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
            redirect('admin/auth/login');
        }
        date_default_timezone_set('Asia/Jakarta');
    }

    public function pengeluaran_modal($bulan)
    {   
        $data['data_modal'] 	= $this->Model_laporan->get_data_modal($bulan)->result_array();
        $data['detail_modal'] 	= $this->Model_laporan->get_detail_modal()->result_array();
        $data['tanggal']		= $bulan;
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/modal_pengeluaran/keluar_modal', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_data_modal()
    {
        $totalHargaSemua = 0;
        foreach($_POST['totalHarga'] as $key => $val) {
            $totalHargaSemua += $val;

            $data = array(
                'totalModal'    => $totalHargaSemua,
                'tanggal'       => date('Y-m-d'),
                );
        }
        
        $simpan     = $this->db->insert('modal', $data);
        $idModal    = $this->db->insert_id();

        foreach ($_POST['namaBahan'] as $key => $val): 
            $data2[]    = array(                
                'idModal'       => $idModal,
                'namaBahan'     => $_POST['namaBahan'][$key],
                'jumlah'        => $_POST['jumlah'][$key],
                'hargaSatuan'   => $_POST['hargaSatuan'][$key],
                'totalHarga'    => $_POST['totalHarga'][$key],
            );
        endforeach;     
        
        $this->db->insert_batch('detail_modal', $data2);
        $this->session->set_flashdata('berhasil_tambah_modal',
                        '<script type ="text/JavaScript">  
                            swal("Berhasil","Data modal berhasil ditambahkan","success")  
                        </script>'  
                );
        redirect('admin/modal/pengeluaran_modal/'.date('Y-m'));
    }

    public function hapus_modal($idModal_tanggal)
    {
    	$idModal = strstr($idModal_tanggal, '_', true);
        $tanggal = substr($idModal_tanggal, strpos($idModal_tanggal, "_") + 1);

    	$where = array('idModal' => $idModal);
 
    	$this->db->delete('modal', $where);
    	$this->session->set_flashdata('berhasil_tambah_modal',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                        <script type ="text/JavaScript">  
                        swal("Berhasil","Data modal berhasil dihapus","success")  
                        </script>'  
                );
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }    

    public function edit_modal($idModal)
    {
    	$data['detail_modal'] = $this->Model_laporan->get_detail_modal_where($idModal)->result_array();
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/modal_pengeluaran/edit_modal', $data);
        $this->load->view('admin/template/footer');
    }

    public function hapus_bahan()
    {
    	$id_detailModal = $this->input->post('idDetailModal');
    	$idModal 		= $this->input->post('idModal');

    	$where 	= array('id_detailModal' 	=> $id_detailModal);
    	$where2 = array('idModal' 			=> $idModal);

    	// hapus bahan
    	$this->db->delete('detail_modal', $where);

    	// update total pengeluaran pada tb_modal
    	$detail_modal = $this->Model_laporan->get_detail_modal_where($idModal)->result_array();

    	$totalHargaSemua = 0;
    	foreach($detail_modal as $key => $val):
			
	        $totalHargaSemua += $val['totalHarga'];

	        $data = array(
	            'totalModal'    => $totalHargaSemua,
	            'tanggalEdit'  	=> date('Y-m-d'),
	            );
        endforeach;

        $simpan     = $this->db->update('modal', $data, $where2);

    }

    public function update_bahan()
    {
    	$idModal = $this->input->post('idModal');

    	$where = array('idModal' => $idModal);

    	// hapus semua detail
    	$this->db->delete('detail_modal', $where);

    	// update total pengeluaran pada tb_modal
    	$totalHargaSemua = 0;
        foreach($_POST['totalHarga'] as $key => $val) {
            $totalHargaSemua += $val;

            $data = array(
                'totalModal'    => $totalHargaSemua,
                'tanggalEdit'  	=> date('Y-m-d'),
                );
        }
        $simpan     = $this->db->update('modal', $data, $where);

        // simpan/insert data perubahan pada tb_detailModal
    	foreach ($_POST['namaBahan'] as $key => $val): 
            $data2[]    = array(                
                'idModal'       => $idModal,
                'namaBahan'     => $_POST['namaBahan'][$key],
                'jumlah'        => $_POST['jumlah'][$key],
                'hargaSatuan'   => $_POST['hargaSatuan'][$key],
                'totalHarga'    => $_POST['totalHarga'][$key],
            );
        endforeach;  
        
        $this->db->insert_batch('detail_modal', $data2);	
    }

}