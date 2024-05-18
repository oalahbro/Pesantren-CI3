<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_landing'); // Load the model
    }
    public function bersihkan_judul($judul)
    {
        $judul_baru     = strtolower($judul);
        $judul_baru     = preg_replace("/[^a-zA-Z0-9\s]/", "", $judul_baru);
        $judul_baru     = str_replace(" ", "-", $judul_baru);
        return $judul_baru;
    }
    public function maximum_kata($isi, $maximum)
    {
        $array_isi = explode(" ", $isi);
        $array_isi = array_slice($array_isi, 0, $maximum);
        $isi = implode(" ", $array_isi);
        return $isi;
    }
    public function index()
    {
        $data = $this->M_landing->getData();

        $parse['halaman'] = [];

        foreach ($data as $item) {
            $gambar = '';
            if (preg_match('/<img.*?src=["\'](.*?)["\']/', $item->isi, $matches)) {
                $gambar = $matches[1]; // Extract the image source URL
            }
            $gambar = str_replace("../gambar/", "assets/gambar/", $gambar);

            $judul  = $this->bersihkan_judul($item->judul);
            $url = base_url() . "halaman.php/$item->id/$judul";

            $isi = $this->maximum_kata(strip_tags($item->isi), 30);

            $parse['halaman'][] = [
                'gambar' => $gambar, // Assuming there's no image data in the provided objects
                'kutipan' => $item->kutipan,
                'judul' => $item->judul,
                'kutipan' => $item->kutipan,
                'isi' => $isi,
                'url' => $url
            ];
        }
        // print_r($parse);
        $this->load->view('components/inc_header');
        $this->load->view('landing', $parse);
        $this->load->view('components/inc_footer');
    }
}
