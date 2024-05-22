<?php
class  MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Load Footer model
        $this->load->model('M_landing');

        // Ambil data footer
        $footer_data = $this->M_landing->getFooter();
        $footer['footer'] = [];

        foreach ($footer_data as $foot) {
            $footer['footer'][] = [
                'judul' => $foot->judul,
                'isi' => $foot->isi
            ];
        }

        // Bagikan data footer ke semua view
        $this->load->vars($footer);
    }
}
