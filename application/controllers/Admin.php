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

    public function pembayaran()
    {
        if ($this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $data['anggota'] = $this->M_admin->get_all();

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/pembayaran', $data);
        }
    }

    public function approval()
    {
        if ($this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            // $data['anggota'] = $this->M_admin->get_all();

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/approval');
        }
    }

    public function fetch_pending_pembayaran()
    {
        $perPage = 10;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $search = $this->input->get('search') ? $this->input->get('search') : '';

        $totalRecords = $this->M_admin->count_records_pending($search);
        $totalPages = ceil($totalRecords / $perPage);

        $offset = ($page - 1) * $perPage;

        $data['results'] = $this->M_admin->get_records_pending($search, $perPage, $offset);
        $data['totalPages'] = $totalPages;

        $output = '';
        $no = ($page - 1) * $perPage + 1; // Calculate initial numbering for the current page

        foreach ($data['results'] as $row) {
            $formatted_jumlah_bayar = 'Rp ' . number_format($row['total_bayar'], 0, ',', '.');

            $output .= '<tr>';
            $output .= '<td>' . $no . '</td>';
            $output .= '<td>' . $row['nama_lengkap'] . '</td>';
            $output .= '<td>' . $formatted_jumlah_bayar . '</td>';
            if ($row['bukti_bayar']) {
                $output .= '<td><button class="btn btn-info view-bukti" data-bukti="' . base_url('assets/uploads/') . $row['bukti_bayar'] . '">Lihat Bukti Bayar</button></td>';
            } else {
                $output .= '<td><button class="btn btn-secondary" disabled>Tidak ada Bukti bayar</button></td>';
            }

            $output .= '<td>';
            $output .= '<button class="btn btn-success accept" data-id="' .  $row['id'] . '">Accept</button>';
            $output .= '<button class="btn btn-danger reject" data-id="' . $row['id'] . '">Reject</button>';
            $output .= '</td>';
            $output .= '</tr>';
            $no++; // Increment numbering for the next row
        }

        // Output the HTML content along with the total pages
        echo json_encode(array('html' => $output, 'totalPages' => $totalPages));
    }

    public function proses_accept_reject()
    {
        $id_pembayaran = $this->input->post('id_pembayaran');
        $action = $this->input->post('action');

        // Tentukan status berdasarkan action
        $status = '';
        if ($action === 'accept') {
            $status = 'accepted';
        } else if ($action === 'reject') {
            $status = 'rejected';
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid action.'));
            return;
        }

        // Update status pembayaran
        if ($this->M_admin->update_status_pembayaran($id_pembayaran, $status)) {
            echo json_encode(array('success' => true, 'message' => 'Pembayaran berhasil diupdate.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Gagal mengupdate pembayaran.'));
        }
    }
}
