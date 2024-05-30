<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('M_pembayaran');
        $this->load->library('form_validation');
    }
    public function index()
    {

        if (!$this->session->userdata('user')) {
            redirect(base_url('Loginsignup'));
        } else {
            $userId = $this->session->userdata('user')->id;
            $data['hasPaidThisMonth'] = $this->M_pembayaran->hasPaidThisMonth($userId);
            $data['paymentHistory'] = $this->M_pembayaran->getPaymentHistory($userId);

            $this->load->view('components/inc_header');
            $this->load->view('pembayaran', $data);
            $this->load->view('components/inc_footer');
        }
    }

    public function submitPayment()
    {
        $userId = $this->session->userdata('user')->id;

        $data = [
            'id_member' => $userId,
            'tgl_bayar' => $this->input->post('paymentDate'),
            'total_bayar' => $this->input->post('paymentAmount'),
            'status' => 0
        ];

        if ($this->M_pembayaran->savePayment($data)) {
            $this->session->set_flashdata('message', 'Pembayaran berhasil disimpan.');
        } else {
            $this->session->set_flashdata('message', 'Terjadi kesalahan. Silakan coba lagi.');
        }

        redirect(base_url('Pembayaran'));
    }
}
