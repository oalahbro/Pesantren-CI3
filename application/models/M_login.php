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
        $this->db->where('id', $this->session->userdata('user')->id); // Misalnya, sesuai dengan id user saat ini
        $this->db->update('members', $profileData); // Ganti 'users' dengan nama tabel profil Anda
    }

    public function register($data)
    {
        return $this->db->insert('members', $data);
    }
    public function update_password($user_id, $password)
    {
        // Enkripsi password sebelum disimpan
        $hashed_password = md5($password);

        $this->db->set('password', $hashed_password);
        $this->db->where('id', $user_id);
        return $this->db->update('members');
    }
    public function get_user_by_email($email)
    {
        return $this->db->get_where('members', ['email' => $email])->row();
    }
}
