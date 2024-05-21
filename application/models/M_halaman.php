<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_halaman extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getHalaman($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('halaman');
        return $query->row();
    }
}
