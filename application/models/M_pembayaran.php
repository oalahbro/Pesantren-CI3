<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pembayaran extends CI_Model
{

    // Ambil data riwayat pembayaran
    public function getPaymentHistory($userId)
    {
        $this->db->where('id_member', $userId);
        $query = $this->db->get('pembayaran');
        return $query->result();
    }

    // Cek apakah user sudah membayar bulan ini
    public function hasPaidThisMonth($userId)
    {
        $this->db->where('id_member', $userId);
        $this->db->where('MONTH(tgl_bayar)', date('m'));
        $this->db->where('YEAR(tgl_bayar)', date('Y'));
        $query = $this->db->get('pembayaran');
        return $query->num_rows() > 0;
    }

    // Simpan data pembayaran
    public function savePayment($data)
    {
        return $this->db->insert('pembayaran', $data);
    }
}
