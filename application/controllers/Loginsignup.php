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
        $this->load->view('components/inc_header');
        $this->load->view('profile');
        $this->load->view('components/inc_footer');
    }
}
