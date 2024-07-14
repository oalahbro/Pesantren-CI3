<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tutors extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_halaman'); // Load the model
    }
    public function index()
    {
        function time_elapsed_string($datetime, $full = false)
        {
            $now = new DateTime;
            $ago = new DateTime($datetime);
            $diff = $now->diff($ago);

            $string = array(
                'y' => 'tahun',
                'm' => 'bulan',
                'd' => 'hari',
                'h' => 'jam',
                'i' => 'menit',
                's' => 'detik',
            );

            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v;
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? 'last update ' . implode(', ', $string) . ' lalu' : 'baru saja';
        }


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->M_halaman->detailTutors($id);
            if ($data) {
                // Menghitung waktu terakhir di-update
                $last_update = time_elapsed_string($data->tgl_isi);

                $data_view['tutors'] = [
                    'nama' => $data->nama,
                    'foto' => $data->foto,
                    'singkat' => substr($data->isi, 0, 300),
                    'isi' => $data->isi,
                    'tgl_isi' => $last_update
                ];
                $this->load->view('components/inc_header');
                $this->load->view('tutors', $data_view);
                $this->load->view('components/inc_footer');
                // var_dump($data_view);
            } else {
                echo 'Data tidak ditemukan.';
            }
        } else {
            echo 'ID tidak ditemukan di URL.';
        }
    }
}
