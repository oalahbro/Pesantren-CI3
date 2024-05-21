<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_landing extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getFooter()
    {
        $query = $this->db->get('info');
        return $query->result();
    }
    public function getData()
    {
        $query = $this->db->get('halaman');
        return $query->result();
    }

    public function getTutors()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('tutors');
        return $query->result();
    }
    public function getPartners()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('partners');
        return $query->result();
    }
}
