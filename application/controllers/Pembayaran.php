<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('M_pembayaran');
        $this->load->library('form_validation');
        $this->load->library('upload');
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

        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048; // ukuran maksimal file dalam KB

        $file_ext = pathinfo($_FILES['bukti_pembayaran']['name'], PATHINFO_EXTENSION);
        // Generate file name dengan timestamp
        $config['file_name'] = time() . '.' . $file_ext;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('bukti_pembayaran')) {
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload_form', $error);
            var_dump($error);
        } else {
            $img = array('upload_data' => $this->upload->data());
            // $this->load->view('upload_success', $data);
            var_dump($img['upload_data']['file_name']);
        }
        $data = [
            'id_member' => $userId,
            'tgl_bayar' => $this->input->post('paymentDate'),
            'total_bayar' => $this->input->post('paymentAmount'),
            'status' => 0,
            'notes' => 0,
            'bukti_bayar' => $img['upload_data']['file_name']
        ];
        if ($this->M_pembayaran->savePayment($data)) {
            $this->session->set_flashdata('message', 'Pembayaran berhasil disimpan.');
        } else {
            $this->session->set_flashdata('message', 'Terjadi kesalahan. Silakan coba lagi.');
        }

        redirect(base_url('Pembayaran'));
    }
}
