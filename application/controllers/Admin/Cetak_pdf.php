<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_pdf extends CI_Controller {
	function __construct(){
		parent::__construct();
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
	}

	public function cetak_gaji_pdf($blnTh)
    {
     	$this->load->library('dompdf_gen');

     	$data['data_karyawan'] = $this->Model_karyawan->get_data_karyawan()->result_array();
     	$data['gaji_karyawan'] = $this->Model_laporan->get_gaji_karyawan($blnTh)->result_array();
     	$data['bulan_tahun']   = $blnTh;
     	
     	$this->load->view('admin/laporan/laporan_gaji_pdf', $data);

     	$paper_size 	= 'A4';
		$orientation 	= 'portrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Gaji Karyawan.pdf", array('Attachment' =>0)); 
    }

    public function cetak_modal_pdf($blnTh)
    {
     	$this->load->library('dompdf_gen');

     	$data['data_modal'] 	= $this->Model_laporan->get_data_modal($blnTh)->result_array();
        $data['detail_modal'] 	= $this->Model_laporan->get_detail_modal()->result_array();
     	$data['bulan_tahun']   = $blnTh;
     	//echo "<pre>"; print_r($data);
     	$this->load->view('admin/laporan/laporan_modal_pdf', $data);

     	$paper_size 	= 'A4';
		$orientation 	= 'portrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Gaji Karyawan.pdf", array('Attachment' =>0)); 
    }
}   