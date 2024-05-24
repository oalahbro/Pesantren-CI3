<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginsignup extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('M_login');
    }
    public function index()
    {

        if ($this->session->userdata('user')) {
            // redirect(base_url() . "admin/admin");
            redirect(base_url('Loginsignup/profile'));
        } else {
            $this->load->view('components/inc_header');
            $this->load->view('login');
            $this->load->view('components/inc_footer');
        }
    }

    public function apiAuth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email and $password) {
            $where = [
                'email' => $email,
                'password' => md5($password)
            ];

            $members = $this->M_login->getMember($where);

            if ($members) {
                $this->session->set_userdata('user', $members);
                redirect(base_url('/Loginsignup'));
            } else {
                $this->session->set_flashdata('err', 'Username atau Password salah !');
                redirect(base_url('/Loginsignup'));
            }
        } else {
            redirect(base_url('/Loginsignup'));
        }
    }

    public function profile()
    {
        if ($this->session->userdata('user')) {
            $where = ['email' => $this->session->userdata('user')->email];
            $data['profile'] = $this->M_login->getMember($where);
            // print_r($profile);
            $this->load->view('components/inc_header');
            $this->load->view('profile', $data);
            $this->load->view('components/inc_footer');
        } else {
            redirect(base_url('/Loginsignup'));
        }
    }

    public function updateProfile()
    {
        $this->load->view('components/inc_header');
        $this->load->view('test');
        $this->load->view('components/inc_footer');
    }
}
