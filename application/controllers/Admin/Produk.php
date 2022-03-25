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

    // tampil produk
    public function index()
    {
        $data['produk']     = $this->Model_produk->get_produk()->result_array();
        $data['kategori']   = $this->Model_produk->get_kategori_produk()->result_array();
        $data['gambar']     = $this->db->get('gambar_produk')->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/produk/data_produk', $data);
        $this->load->view('admin/template/footer');
    }

    // tampil edit produk
    public function edit_produk($id_produk)
    {
        $data['kategori']   = $this->Model_produk->get_kategori_produk()->result_array();
        $data['produk']     = $this->Model_produk->get_produk_where($id_produk)->result_array();
        $data['gambar']     = $this->Model_produk->get_gambar_produk($id_produk)->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/produk/edit_produk', $data);
        $this->load->view('admin/template/footer');
    }

    // tampil tambah produk
    public function tambah_produk()
    {
        $data['kategori'] = $this->Model_produk->get_kategori_produk()->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/produk/tambah_produk', $data);
        $this->load->view('admin/template/footer');
    }

    // tambah data produk
    public function insert_produk()
    {
        $nama_produk    = $this->input->post("nama_produk");
        $harga          = $this->input->post("harga");
        $status         = $this->input->post("status");
        $kategori       = $this->input->post("kategori");
        $stok           = $this->input->post("stok");
        $min_order      = $this->input->post("min_order");
        $deskripsi      = $this->input->post("deskripsi");
        $jumlah_gambar  = count($_FILES['gambar']['name']);


        $data = array(
            'nama_produk'    => $nama_produk,
            'harga'         => $harga,
            'status'        => $status,
            'id_jenis'       => $kategori,
            'stok'          => $stok,
            'min_order'     => $min_order,
            'deskripsi'     => $deskripsi,
        );

        $this->db->insert('produk', $data);
        $id_produk = $this->db->insert_id();

        $data2 = [];
        for ($i = 0; $i < $jumlah_gambar; $i++) :
            if (!empty($_FILES['gambar']['name'][$i])) {
                $_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
                $_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                $_FILES['file']['error']    = $_FILES['gambar']['error'][$i];
                $_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

                $config['upload_path']     = './uploads/gambar_produk';
                $config['allowed_types']   = 'jpg|jpeg|png|gif';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    // upload ke folder sesuai nama
                    $this->upload->data()['file_name'];
                    // replace spasi menjadi "_"
                    $replace_spasi[$i] = str_replace(" ", "_", $_FILES['gambar']['name'][$i]);
                    // file gambar dimasukkan ke array
                    $data2[] = array(
                        'id_produk' => $id_produk,
                        'gambar'    => $replace_spasi[$i],
                    );
                } else {
                    $this->session->set_flashdata(
                        'gagal_insert_produk',
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Gagal","Format gambar tidak sesuai","error")  
                            </script>'
                    );
                }
            }
        endfor;
        // insert gambar ke db
        $this->db->insert_batch('gambar_produk', $data2);
        $this->session->set_flashdata(
            'produk',
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data berhasil ditambahkan","success")  
                            </script>'
        );
        redirect('Admin/Produk/');
    }

    //hapus data produk 
    public function hapus_produk($id_produk)
    {
        $data = array('id_produk' => $id_produk);
        $this->db->delete('produk', $data);
        $this->session->set_flashdata(
            'produk',
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Produk berhasil dihapus","success"); 
                            </script>'
        );
        redirect('Admin/Produk/');
    }

    // update data produk
    public function update_produk($id_produk)
    {
        $nama_produk    = $this->input->post("nama_produk");
        $harga          = $this->input->post("harga");
        $status         = $this->input->post("status");
        $kategori       = $this->input->post("kategori");
        $stok           = $this->input->post("stok");
        $min_order      = $this->input->post("min_order");
        $deskripsi      = $this->input->post("deskripsi");

        $data = array(
            'nama_produk'    => $nama_produk,
            'harga'         => $harga,
            'status'        => $status,
            'id_jenis'       => $kategori,
            'stok'          => $stok,
            'min_order'     => $min_order,
            'deskripsi'     => $deskripsi,
        );

        $where = array('id_produk' => $id_produk);

        $this->db->update('produk', $data,  $where);
        $this->session->set_flashdata(
            'produk',
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Produk berhasil diupdate","success"); 
                            </script>'
        );
        redirect('Admin/Produk/');
    }

    //tambah gambar
    public function insert_gambar($id_produk)
    {
        if (($_FILES['gambar']['name']) != null) {

            $config['upload_path']     = './uploads/gambar_produk';
            $config['allowed_types']   = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }

            $replace_spasi = str_replace(" ", "_", $gambar);
            $data   = array(
                'id_produk' => $id_produk,
                'gambar'    => $replace_spasi,
            );
            $this->db->insert('gambar_produk', $data);
            $id_gambar = $this->db->insert_id();
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                    'data' => $id_gambar
                )));
        }
    }

    //update gambar
    public function update_gambar($id_gambar)
    {
        if (!empty($_FILES['gambar']['name'])) {
            echo $_FILES['gambar']['tmp_name'];

            $config['upload_path']     = './uploads/gambar_produk';
            $config['allowed_types']   = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload";
            } else {
                $gambar = $this->upload->data('file_name');
            }

            $replace_spasi = str_replace(" ", "_", $gambar);
            $data   = array('gambar' => $replace_spasi);
            $where  = array('id_gambar_roduk' => $id_gambar);
            $this->db->update('gambar_produk', $data, $where);
        }
    }

    // hapus gambar produk
    public function hapus_gambar()
    {
        $where = array('id_gambar_produk' => $this->input->post('id_gambar_produk'));
        $this->db->delete('gambar_produk', $where);
    }
}
