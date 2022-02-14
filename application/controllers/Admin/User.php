<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['user'] = $this->Model_user->get_data_user()->result_array();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/user/data_user', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_user()
    {
        $nama       = $this->input->post('nama');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $pwd        = password_hash($password, PASSWORD_DEFAULT);
        $role       = $this->input->post('role');

        $data = array(
            'nama'      => $nama,
            'email'     => $email,
            'password'  => $pwd,
            'role'      => $role
        );

        $this->db->insert('user', $data);
        $this->session->set_flashdata(
            'user',
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","User baru berhasil ditambahkan","success"); 
                            </script>'
        );
        redirect('admin/user');
    }

    public function update_user($idUser)
    {
        $nama       = $this->input->post('nama');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $pwd        = password_hash($password, PASSWORD_DEFAULT);
        $role       = $this->input->post('role');

        if ($password == null) {
            $data = array(
                'nama'      => $nama,
                'email'     => $email,
                'role'      => $role
            );
        } else {
            $data = array(
                'nama'      => $nama,
                'email'     => $email,
                'password'  => $pwd,
                'role'      => $role
            );
        }
        $where = array('idUser' => $idUser);

        $this->db->update('user', $data, $where);
        $this->session->set_flashdata(
            'karyawan',
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data user berhasil diupdate","success"); 
                            </script>'
        );
        redirect('admin/user');
    }

    public function hapus_user($idUser)
    {

        $where = array('idUser' => $idUser);

        $this->db->delete('user', $where);
        $this->session->set_flashdata(
            'user',
            '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                            <script type ="text/JavaScript">  
                            swal("Sukses","Data user berhasil dihapus","success"); 
                            </script>'
        );
        redirect('admin/user');
    }
}
