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
    public function updateProfile($profileData)
    {
        // Lakukan pembaruan profil di database
        // Pastikan tabel dan kolom sesuai dengan struktur database Anda
        $this->db->where('id', $this->session->userdata('user')->id); // Misalnya, sesuai dengan id user saat ini
        $this->db->update('members', $profileData); // Ganti 'users' dengan nama tabel profil Anda
    }
}
