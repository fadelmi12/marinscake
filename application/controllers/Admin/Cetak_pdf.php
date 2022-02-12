<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_pdf extends CI_Controller {
	function __construct(){
		parent::__construct();
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
	}

	public function cetak_gaji_pdf()
    {
         $this->load->library('dompdf_gen');

        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('gaji_karyawan', 'gaji_karyawan.idKaryawan = karyawan.idKaryawan');
        $data['gaji_karyawan'] = $this->db->get()->result_array();

        $this->load->view('admin/laporan/laporan_gaji_pdf', $data);

        $paper_size 	= 'A5';
		$orientation 	= 'landscape';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Gaji Karyawan.pdf", array('Attachment' =>0)); 
    }
}   