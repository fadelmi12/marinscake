<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/auth/template/header');
        $this->load->view('admin/auth/register');
        $this->load->view('admin/auth/template/footer');
    }

    public function daftar()
    {
        
        $nama       = $this->input->post('nama');
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $pwd        = password_hash($password, PASSWORD_DEFAULT);
        
        $data_user = array(
            'nama'	 	=> $nama,
            'email' 	=> $email,
            'password' 	=> $pwd,
            'role'      => 77,
        );
        
        $daftar = $this->Model_login->daftar_user($data_user, 'user');
        redirect('Admin/auth/login'); 

    }
}
