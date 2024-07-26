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

    public function countMembersUnpaidThisMonth()
    {
        $subquery = $this->db->select('id_member')
            ->from('pembayaran')
            ->where('MONTH(tgl_bayar)', date('m'))
            ->where('YEAR(tgl_bayar)', date('Y'))
            ->get_compiled_select();

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
    public function savePayment($data)
    {
        return $this->db->insert('pembayaran', $data);
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
    public function deleteAnggota($id)
    {
        return $this->db->delete('members', ['id' => $id]); // Sesuaikan dengan nama tabel Anda
    }
    public function insert_anggota($data)
    {
        return $this->db->insert('members', $data);
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
        // $query = $this->db->get('halaman');
        $query =  $this->db->select('*')
            ->from('halaman')
            ->order_by('id', 'ASC')
            ->limit(1000, 0) // 
            ->get();

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
    public function updateArticel($articel)
    {
        $this->db->where('id', $articel['id']);
        return $this->db->update('halaman', $articel);
    }
    public function getPembayaranByFilters($formData)
    {
        // Extracting date range from form data
        list($start_date, $end_date) = explode(" - ", $formData['tanggal']);

        $this->db->select('p.*, m.nama_lengkap');
        $this->db->from('pembayaran p');
        $this->db->join('members m', 'p.id_member = m.id', 'left');
        $this->db->where('p.tgl_bayar >=', $start_date);
        $this->db->where('p.tgl_bayar <=', $end_date);

        // If status is not empty, add the condition
        if (!empty($formData['status'])) {
            $this->db->where('p.status', $formData['status']);
        }

        // If id_anggota is not empty, add the condition
        if (!empty($formData['id_anggota'])) {
            $this->db->where('p.id_member', $formData['id_anggota']);
        }

        $this->db->group_by('p.id'); // Group by id to get total per record
        $query = $this->db->get();
        return $query->result();
    }
    public function getTutors()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('tutors');
        return $query->result();
    }
    public function getUpdateTutors($id)
    {
        $query = $this->db->get_where('tutors', array('id' => $id));
        return $query->row();
    }
    public function updateTutor($tutor)
    {
        $this->db->where('id', $tutor['id']);
        return $this->db->update('tutors', $tutor);
    }
    public function getPartners()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('partners');
        return $query->result();
    }
    public function getUpdatePartners($id)
    {
        $query = $this->db->get_where('partners', array('id' => $id));
        return $query->row();
    }
    public function updatePartner($partner)
    {
        $this->db->where('id', $partner['id']);
        return $this->db->update('partners', $partner);
    }
    public function getInformation()
    {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('info');
        return $query->result();
    }
    public function deletePost($id, $table)
    {
        return $this->db->delete($table, ['id' => $id]); // Sesuaikan dengan nama tabel Anda
    }
    public function insertTutor($data)
    {
        return $this->db->insert('tutors', $data);
    }
    public function insertPartner($data)
    {
        return $this->db->insert('partners', $data);
    }
    public function insertArtikel($data)
    {
        return $this->db->insert('halaman', $data);
    }
    public function count_records_petugas($search)
    {
        $this->db->select('COUNT(*) AS total');
        $this->db->from('admin');
        $totalRecordsRow = $this->db->get()->row_array();
        return $totalRecordsRow['total'];
    }
    public function get_records_petugas($search, $perPage, $offset)
    {
        $this->db->select('admin.*, admin.username');
        $this->db->from('admin');
        $this->db->group_start();
        $this->db->like('admin.username', $search);
        $this->db->group_end();
        $this->db->order_by('admin.id', 'ASC');
        $this->db->limit($perPage, $offset);
        return $this->db->get()->result_array();
    }
    public function get_petugas_by_id($id_petugas)
    {
        $query = $this->db->get_where('admin', array('id' => $id_petugas));
        return $query->row_array();
    }
    public function updatePetugas($profileData)
    {
        $this->db->where('id', $profileData['id']); // Misalnya, sesuai dengan id user saat ini
        return $this->db->update('admin', $profileData); // Ganti 'users' dengan nama tabel profil Anda

    }
    public function deletePetugas($id)
    {
        return $this->db->delete('admin', ['id' => $id]); // Sesuaikan dengan nama tabel Anda
    }
    public function insert_petugas($data)
    {
        return $this->db->insert('admin', $data);
    }
    public function get_petugas_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('admin'); // Replace 'petugas' with your table name
        return $query->row();
    }
}
