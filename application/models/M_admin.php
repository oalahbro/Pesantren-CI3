<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function get_admin($username, $password)
    {
        // Ambil data admin dari database berdasarkan username dan password
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin');

        return $query->row(); // Mengembalikan satu baris data admin jika ditemukan, atau NULL jika tidak ditemukan
    }
    public function countTotalMembers()
    {
        $this->db->select('COUNT(*) AS total_members');
        $this->db->from('members');
        $query = $this->db->get();
        return $query->row()->total_members;
    }
    // Menghitung member yang sudah melakukan pembayaran bulan ini

    public function countMembersPaidThisMonth()
    {
        $this->db->select('COUNT(DISTINCT m.id) AS total_paid');
        $this->db->from('members m');
        $this->db->join('pembayaran p', 'm.id = p.id_member', 'left');
        $this->db->where('MONTH(p.tgl_bayar)', date('m'));
        $this->db->where('YEAR(p.tgl_bayar)', date('Y'));
        $this->db->where_in('p.status', [0, 1]);
        $query = $this->db->get();
        return $query->row()->total_paid;
    }

    // Menghitung member yang belum melakukan pembayaran bulan ini
    public function countMembersUnpaidThisMonth()
    {
        // Subquery untuk mendapatkan id member yang sudah melakukan pembayaran bulan ini
        $subquery = $this->db->select('id_member')
            ->from('pembayaran')
            ->where('MONTH(tgl_bayar)', date('m'))
            ->where('YEAR(tgl_bayar)', date('Y'))
            ->get_compiled_select();

        // Kueri utama untuk menghitung member yang belum membayar
        $this->db->select('COUNT(id) AS total_unpaid');
        $this->db->from('members');
        $this->db->where("id NOT IN ($subquery)", NULL, FALSE);
        $query = $this->db->get();
        return $query->row()->total_unpaid;
    }
    public function totalPaymentsThisMonth()
    {
        $this->db->select('SUM(total_bayar) AS total_payments');
        $this->db->from('pembayaran');
        $this->db->where('MONTH(tgl_bayar)', date('m'));
        $this->db->where('YEAR(tgl_bayar)', date('Y'));
        $query = $this->db->get();
        return $query->row()->total_payments;
    }
    public function countPaymentsByDate($startYear, $endYear)
    {
        $query = $this->db->select('YEAR(tgl_bayar) AS tahun_dibayar, SUM(total_bayar) AS total_jumlah_bayar')
            ->from('pembayaran')
            ->where('YEAR(tgl_bayar) >=', $startYear)
            ->where('YEAR(tgl_bayar) <=', $endYear)
            ->group_by('YEAR(tgl_bayar)')
            ->get();

        return $query->result_array();
    }
}
