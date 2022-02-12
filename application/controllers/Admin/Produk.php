<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
            redirect('admin/auth/login');
        }
    }

    public function index()
    {
        $data['produk'] = $this->Model_produk->get_produk()->result_array();
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/produk/data_produk', $data);
        $this->load->view('admin/template/footer');
    }

    public function edit_produk($id_produk)
    {
        $data['kategori']   = $this->Model_produk->get_kategori_produk()->result_array();
        $data['produk']     = $this->Model_produk->get_produk_where($id_produk)->result_array();
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/produk/edit_produk', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_produk()
    {
        $data['kategori'] = $this->Model_produk->get_kategori_produk()->result_array();
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/produk/tambah_produk', $data);
        $this->load->view('admin/template/footer');
    }

    public function insert_produk()
    {
        $nama_produk    = $this->input->post("nama_produk");
        $harga          = $this->input->post("harga");
        $status         = $this->input->post("status");
        $kategori       = $this->input->post("kategori");
        $stok           = $this->input->post("stok");
        $gambar         = $_FILES['gambar']['name'];
        // print_r($gambar); exit;
        if ($gambar =''){}else{
            $config ['upload_path'] = './uploads/gambar_produk';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                $this->session->set_flashdata('gagal_insert_produk',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Gagal","Data gagal ditambahkan","error")  
                            </script>'  
                    );
                redirect('Admin/Produk/tambah_produk');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'namaProduk'    => $nama_produk,
            'harga'         => $harga,
            'status'        => $status,
            'idJenis'       => $kategori,
            'stok'          => $stok,
            'gambar'        => $gambar,
        );

        $this->db->insert('produk', $data);
        $this->session->set_flashdata('produk',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil ditambahkan","success")  
                            </script>'  
                    );
        redirect('Admin/Produk/');
    }

    public function hapus_produk($id_produk){
        $data = array('idProduk' => $id_produk);
        $this->db->delete('produk', $data);
        $this->session->set_flashdata('produk',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Produk berhasil dihapus","success"); 
                            </script>'  
                    );
        redirect('Admin/Produk/');
    }

    public function update_produk($id_produk){
        $nama_produk    = $this->input->post("nama_produk");
        $harga          = $this->input->post("harga");
        $status         = $this->input->post("status");
        $kategori       = $this->input->post("kategori");
        $stok           = $this->input->post("stok");
        $gambar         = $_FILES['gambar']['name'];

        if ($gambar == null ){}
        else{
            $config ['upload_path'] = './uploads/gambar_produk';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                $this->session->set_flashdata('gagal_insert_produk',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Gagal","Data gagal ditambahkan","error")  
                            </script>'  
                    );
                redirect('Admin/Produk/tambah_produk');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        if($gambar == null){
            $data = array(
                'namaProduk'    => $nama_produk,
                'harga'         => $harga,
                'status'        => $status,
                'idJenis'       => $kategori,
                'stok'          => $stok,
            );
        }else{
            $data = array(
                'namaProduk'    => $nama_produk,
                'harga'         => $harga,
                'status'        => $status,
                'idJenis'       => $kategori,
                'stok'          => $stok,
                'gambar'        => $gambar,
            );        
        }

        $where = array('idProduk' => $id_produk);
        $this->db->update('produk', $data,  $where);
        $this->session->set_flashdata('produk',
                            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Produk berhasil diupdate","success"); 
                            </script>'  
                    );
        redirect('Admin/Produk/');
    }
}
