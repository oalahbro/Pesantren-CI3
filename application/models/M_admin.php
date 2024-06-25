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
    public function get_all()
    {
        $query = $this->db->get('members');
        return $query->result();
    }
    public function count_records_pending($search)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('pembayaran');
        $this->db->join('members', 'pembayaran.id_member = members.id');
        $this->db->where('pembayaran.status', 0); // Kondisi untuk pembayaran pending
        $this->db->group_start();
        $this->db->like('members.nama_lengkap', $search);
        $this->db->or_like('members.email', $search);
        $this->db->group_end();
        $totalRecordsRow = $this->db->get()->row_array();
        return $totalRecordsRow['total'];
    }

    public function get_records_pending($search, $perPage, $offset)
    {
        $this->db->select('pembayaran.*, members.nama_lengkap');
        $this->db->from('pembayaran');
        $this->db->join('members', 'pembayaran.id_member = members.id');
        $this->db->where('pembayaran.status', 0); // Kondisi untuk pembayaran pending
        $this->db->group_start();
        $this->db->like('members.nama_lengkap', $search);
        $this->db->or_like('members.email', $search);
        $this->db->or_like('pembayaran.total_bayar', $search);
        $this->db->group_end();
        $this->db->order_by('pembayaran.id', 'ASC');
        $this->db->limit($perPage, $offset);
        return $this->db->get()->result_array();
    }

    public function update_status_pembayaran($id_pembayaran, $status)
    {
        $this->db->where('id', $id_pembayaran);

        if ($status == 'accept') {
            $this->db->update('pembayaran', array('status' => '1'));
        } else {
            $this->db->update('pembayaran', array('status' => '2'));
        }
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function count_records_anggota($search)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('members');
        $totalRecordsRow = $this->db->get()->row_array();
        return $totalRecordsRow['total'];
    }

    public function get_records_anggota($search, $perPage, $offset)
    {
        $this->db->select('members.*, members.nama_lengkap');
        $this->db->from('members');
        $this->db->group_start();
        $this->db->like('members.nama_lengkap', $search);
        $this->db->or_like('members.nama_panggilan', $search);
        $this->db->or_like('members.email', $search);
        $this->db->or_like('members.alamat', $search);
        $this->db->group_end();
        $this->db->order_by('members.id', 'ASC');
        $this->db->limit($perPage, $offset);
        return $this->db->get()->result_array();
    }
    public function get_anggota_by_id($id_anggota)
    {
        $query = $this->db->get_where('members', array('id' => $id_anggota));
        return $query->row_array();
    }
    public function updateAnggota($profileData)
    {
        $this->db->where('id', $profileData['id']); // Misalnya, sesuai dengan id user saat ini
        return $this->db->update('members', $profileData); // Ganti 'users' dengan nama tabel profil Anda

    }
    public function get_payment_history($search = '', $perPage = 10, $offset = 0)
    {
        $this->db->select('pembayaran.*, members.nama_lengkap');
        $this->db->from('pembayaran');
        $this->db->join('members', 'pembayaran.id_member = members.id');
        $this->db->group_start();
        $this->db->like('members.nama_lengkap', $search);
        $this->db->or_like('members.email', $search);
        $this->db->or_like('pembayaran.total_bayar', $search);
        $this->db->group_end();
        $this->db->order_by('pembayaran.tgl_bayar', 'DESC');
        $this->db->limit($perPage, $offset);
        return $this->db->get()->result_array();
    }

    public function count_all_payment_history($search = '')
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('pembayaran');
        $this->db->join('members', 'pembayaran.id_member = members.id');
        $this->db->group_start();
        $this->db->like('members.nama_lengkap', $search);
        $this->db->or_like('members.email', $search);
        $this->db->or_like('pembayaran.total_bayar', $search);
        $this->db->group_end();
        $query = $this->db->get();
        return $query->row()->total;
    }
    public function get_all_payments()
    {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $query = $this->db->get();
        return $query->result();
    }
    public function articel()
    {
        $query = $this->db->get('halaman');
        return $query->result();
    }
    public function getUpdateArticel($id)
    {
        $query = $this->db->get_where('halaman', array('id' => $id));
        return $query->row();
    }
    public function updateIsiImageHalaman($id, $isi)
    {
        $data = array(
            'isi' => $isi
        );

        $this->db->where('id', $id);
        $this->db->update('halaman', $data);

        return $this->db->affected_rows(); // Mengembalikan jumlah baris yang terpengaruh
    }
}
