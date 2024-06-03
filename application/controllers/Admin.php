<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        if ($this->session->userdata('admin')) {
            redirect(base_url('Admin/dashboard'));
        } else {
            $this->load->view('admin/login');
        }
    }
    public function process_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); // Enkripsi password dengan md5

        $admin = $this->M_admin->get_admin($username, $password);

        if ($admin) {
            // Set session admin
            $admin_data = array(
                'admin_id' => $admin->id,
                'admin_username' => $admin->username,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($admin_data);

            redirect(base_url('Admin/dashboard')); // Redirect ke dashboard jika login berhasil
        } else {
            redirect(base_url('Admin?pesan=gagal'));
        }
    }

    public function countPaymentsByYear()
    {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $startYear = $this->input->post("startYear");
            $endYear = $this->input->post("endYear");
            $payments = $this->M_admin->countPaymentsByDate($startYear, $endYear);

            // Convert the PHP array to JSON
            $json_data = json_encode($payments);

            // Output the JSON data
            echo $json_data;
        } else {
            // If the request method is not POST, return an error message
            echo "Error: This endpoint only accepts POST requests.";
        }
    }

    public function dashboard()
    {
        if ($this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $data['total_members'] = $this->M_admin->countTotalMembers();
            $data['total_paid'] = $this->M_admin->countMembersPaidThisMonth();
            $data['total_unpaid'] = $this->M_admin->countMembersUnpaidThisMonth();
            $data['total_payments'] = $this->M_admin->totalPaymentsThisMonth();

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/dashboard', $data);
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Admin'));
    }
}
