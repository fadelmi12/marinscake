<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('idUser') == null) {
            redirect('admin/auth/login');
        }
    }

    // Tampilan akun
    public function index()
    {
        $id_user        = $this->session->userdata('idUser');
        $data['user']   = $this->Model_user->get_user_id($id_user)->row();

        $this->load->view('kasir/template/header');
        $this->load->view('kasir/template/sidebar');
        $this->load->view('kasir/data_user', $data);
        $this->load->view('kasir/template/footer');
    }

    public function edit_user()
    {
        $id_user        = $this->session->userdata('idUser');
        $data['user']   = $this->Model_user->get_user_id($id_user)->row();

        $this->load->view('kasir/template/header');
        $this->load->view('kasir/template/sidebar');
        $this->load->view('kasir/edit_user', $data);
        $this->load->view('kasir/template/footer');
    }

    // update akun
    public function update_user()
    {
        $id_user    = $this->session->userdata('idUser');
        $nama       = $this->input->post('nama');
        $email      = $this->input->post('email');
        $no_hp      = $this->input->post('no_hp');
        $password   = $this->input->post('password');
        $pwd        = password_hash($password, PASSWORD_DEFAULT);
        $foto       = $_FILES['foto']['name'];

        if ($foto == null) {
            if ($password == null) {
                $data = array(
                    'nama'      => $nama,
                    'email'     => $email,
                    'no_hp'     => $no_hp
                );
            } else {
                $data = array(
                    'nama'      => $nama,
                    'email'     => $email,
                    'no_hp'     => $no_hp,
                    'password'  => $pwd,
                );
            }
        } else {
            $config['upload_path'] = './uploads/user';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata(
                    'akun',
                    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Gagal","Foto profil gagal diupload","error")  
                            </script>'
                );
                redirect('Kasir/akun/update_user');
            } else {
                $foto = $this->upload->data('file_name');

                if ($password == null) {
                    $data = array(
                        'nama'      => $nama,
                        'email'     => $email,
                        'no_hp'     => $no_hp,
                        'foto'      => $foto
                    );
                } else {
                    $data = array(
                        'nama'      => $nama,
                        'email'     => $email,
                        'no_hp'     => $no_hp,
                        'foto'      => $foto,
                        'password'  => $pwd,
                    );
                }
            }
        }

        $where = array('id_user' => $id_user);

        $this->db->update('user', $data, $where);
        $this->session->set_flashdata(
            'akun',
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data profil Anda berhasil diupdate","success"); 
                            </script>'
        );
        redirect('kasir/akun');
    }
}
