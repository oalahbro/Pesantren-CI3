<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function getMember($where)
    {
        // Menentukan kondisi WHERE
        $this->db->where($where);

        // Mengambil data dari tabel 'users'
        $query = $this->db->get('members');

        // Mengembalikan satu baris sebagai objek
        return $query->row();
    }
}
