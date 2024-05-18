<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_landing extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getData()
    {
        $query = $this->db->get('halaman');
        return $query->result();
    }
}
