<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_halaman'); // Load the model
    }

    public function index()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $id = preg_replace("/[^0-9]/", "", $id);

            $data = $this->M_halaman->getHalaman($id);
            if ($data) {
                $isi    = str_replace("../gambar/", "assets/gambar/", $data->isi);
                $data_view['halaman'] = [
                    'kutipan' => $data->kutipan,
                    'judul' => $data->judul,
                    'isi' => $isi
                ];
                $this->load->view('components/inc_header');
                $this->load->view('halaman', $data_view);
                $this->load->view('components/inc_footer');
            } else {
                echo 'Data tidak ditemukan.';
            }
        } else {
            echo 'ID tidak ditemukan di URL.';
        }
    }
}
