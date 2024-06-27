<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
    }
    public function index()
    {
        if ($this->session->userdata('admin')) {
            redirect(base_url('Admin/dashboard'));
        } else {
            $this->load->view('admin/login');
        }
    }
    public function process_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); // Enkripsi password dengan md5

        $admin = $this->M_admin->get_admin($username, $password);

        if ($admin) {
            // Set session admin
            $admin_data = array(
                'admin_id' => $admin->id,
                'admin_username' => $admin->username,
                'logged_in' => TRUE
            );
            $this->session->set_userdata('admin', $admin_data);

            redirect(base_url('Admin/dashboard')); // Redirect ke dashboard jika login berhasil
        } else {
            redirect(base_url('Admin?pesan=gagal'));
        }
    }

    public function countPaymentsByYear()
    {
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $startYear = $this->input->post("startYear");
            $endYear = $this->input->post("endYear");
            $payments = $this->M_admin->countPaymentsByDate($startYear, $endYear);

            // Convert the PHP array to JSON
            $json_data = json_encode($payments);

            // Output the JSON data
            echo $json_data;
        } else {
            // If the request method is not POST, return an error message
            echo "Error: This endpoint only accepts POST requests.";
        }
    }

    public function dashboard()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $data['total_members'] = $this->M_admin->countTotalMembers();
            $data['total_paid'] = $this->M_admin->countMembersPaidThisMonth();
            $data['total_unpaid'] = $this->M_admin->countMembersUnpaidThisMonth();
            $data['total_payments'] = $this->M_admin->totalPaymentsThisMonth();

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/dashboard', $data);
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Admin'));
    }

    public function pembayaran()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $data['anggota'] = $this->M_admin->get_all();

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/pembayaran', $data);
        }
    }
    public function savePayment()
    {
        $data = [
            'id_member' => $this->input->post('id_anggota'),
            'tgl_bayar' => $this->input->post('tgl_bayar'),
            'total_bayar' => $this->input->post('jumlah_bayar'),
            'status' => 1,
            'notes' => 0,
            'bukti_bayar' => 0
        ];
        if ($this->M_admin->savePayment($data)) {
            $this->session->set_flashdata('message', 'Pembayaran berhasil disimpan.');
        } else {
            $this->session->set_flashdata('message', 'Terjadi kesalahan. Silakan coba lagi.');
        }
        redirect(base_url('/Admin/pembayaran'));
    }

    public function approval()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            // $data['anggota'] = $this->M_admin->get_all();

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/approval');
        }
    }

    public function fetch_pending_pembayaran()
    {
        $perPage = 10;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $search = $this->input->get('search') ? $this->input->get('search') : '';

        $totalRecords = $this->M_admin->count_records_pending($search);
        $totalPages = ceil($totalRecords / $perPage);

        $offset = ($page - 1) * $perPage;

        $data['results'] = $this->M_admin->get_records_pending($search, $perPage, $offset);
        $data['totalPages'] = $totalPages;

        $output = '';
        $no = ($page - 1) * $perPage + 1; // Calculate initial numbering for the current page

        foreach ($data['results'] as $row) {
            $formatted_jumlah_bayar = 'Rp ' . number_format($row['total_bayar'], 0, ',', '.');

            $output .= '<tr>';
            $output .= '<td>' . $no . '</td>';
            $output .= '<td>' . $row['nama_lengkap'] . '</td>';
            $output .= '<td>' . $formatted_jumlah_bayar . '</td>';
            if ($row['bukti_bayar']) {
                $output .= '<td><button class="btn btn-info view-bukti" data-bukti="' . base_url('assets/uploads/') . $row['bukti_bayar'] . '">Lihat Bukti Bayar</button></td>';
            } else {
                $output .= '<td><button class="btn btn-secondary" disabled>Tidak ada Bukti bayar</button></td>';
            }

            $output .= '<td>';
            $output .= '<button class="btn btn-success accept" data-id="' .  $row['id'] . '">Accept</button>';
            $output .= '<button class="btn btn-danger reject" data-id="' . $row['id'] . '">Reject</button>';
            $output .= '</td>';
            $output .= '</tr>';
            $no++; // Increment numbering for the next row
        }

        // Output the HTML content along with the total pages
        echo json_encode(array('html' => $output, 'totalPages' => $totalPages));
    }

    public function proses_accept_reject()
    {
        $id_pembayaran = $this->input->post('id_pembayaran');
        $action = $this->input->post('action');

        // Tentukan status berdasarkan action
        $status = '';
        if ($action === 'accept') {
            $status = 'accept';
        } else if ($action === 'reject') {
            $status = 'rejected';
        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid action.'));
            return;
        }

        // Update status pembayaran
        if ($this->M_admin->update_status_pembayaran($id_pembayaran, $status)) {
            echo json_encode(array('success' => true, 'message' => 'Pembayaran berhasil diupdate.'));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Gagal mengupdate pembayaran.'));
        }
    }

    public function anggota()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/anggota');
        }
    }

    public function fetch_anggota()
    {
        $perPage = 10;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $search = $this->input->get('search') ? $this->input->get('search') : '';

        $totalRecords = $this->M_admin->count_records_anggota($search);
        $totalPages = ceil($totalRecords / $perPage);

        $offset = ($page - 1) * $perPage;

        $data['results'] = $this->M_admin->get_records_anggota($search, $perPage, $offset);
        $data['totalPages'] = $totalPages;

        $output = '';
        $no = ($page - 1) * $perPage + 1; // Calculate initial numbering for the current page

        foreach ($data['results'] as $row) {

            $output .= '<tr>';
            $output .= '<td>' . $no . '</td>';
            $output .= '<td>' . $row['nama_lengkap'] . '</td>';
            $output .= '<td>' . $row['nama_panggilan'] . '</td>';
            $output .= '<td>' . $row['email'] . '</td>';
            $output .= '<td>' . $row['alamat'] . '</td>';
            $output .= '<td>';
            $output .= '<button class="btn btn-info details-button" data-id="' .  $row['id'] . '">Detail</button>';
            $output .= '</td>';
            $output .= '</tr>';
            $no++; // Increment numbering for the next row
        }

        // Output the HTML content along with the total pages
        echo json_encode(array('html' => $output, 'totalPages' => $totalPages));
    }
    public function get_anggota_details()
    {
        $id_anggota = $this->input->post('id_members');
        $data = $this->M_admin->get_anggota_by_id($id_anggota);
        echo json_encode($data);
    }
    public function updateAnggota()
    {
        if ($this->session->userdata('admin')) {
            $profileData = array(
                'id' => $this->input->post('idanggota'),
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'telp' => $this->input->post('telp'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'jumlah_anggota_keluarga' => $this->input->post('jumlah_anggota_keluarga'),
                'nama_keluarga' => $this->input->post('nama_keluarga'),
                'status_keluarga' => $this->input->post('status_keluarga'),
                'telp_keluarga' => $this->input->post('telp_keluarga')
            );
            if ($this->M_admin->updateAnggota($profileData)) {
                $this->session->set_flashdata('message', 'Profil <b>' . $profileData['nama_panggilan'] . '</b> berhasil disimpan.');
            } else {
                $this->session->set_flashdata('message', 'Terjadi kesalahan. Silakan coba lagi.');
            }
            redirect(base_url('/Admin/anggota'));
        } else {
            redirect(base_url('Admin'));
        }
    }
    public function fetch_history_pembayaran()
    {
        $perPage = 10;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $search = $this->input->get('search') ? $this->input->get('search') : '';

        $totalRecords = $this->M_admin->count_all_payment_history($search);
        $totalPages = ceil($totalRecords / $perPage);

        $offset = ($page - 1) * $perPage;

        $data['results'] = $this->M_admin->get_payment_history($search, $perPage, $offset);
        $data['totalPages'] = $totalPages;

        $output = '';
        $no = ($page - 1) * $perPage + 1; // Calculate initial numbering for the current page

        foreach ($data['results'] as $row) {
            if ($row['status'] == 0) {
                $status = '<button class="btn btn-outline-warning">Pending</button>';
            } else if ($row['status'] == 1) {
                $status = '<button class="btn btn-success">Lunas</button>';
            } else {
                $status = '<button class="btn btn-danger">Ditolak</button>';
            }

            $formatted_jumlah_bayar = 'Rp ' . number_format($row['total_bayar'], 0, ',', '.');
            $output .= '<tr>';
            $output .= '<td>' . $no . '</td>';
            $output .= '<td>' . $row['nama_lengkap'] . '</td>';
            $output .= '<td>' . $formatted_jumlah_bayar . '</td>';
            $output .= '<td>' . date('d - F - Y', strtotime($row['tgl_bayar'])) . '</td>';
            $output .= '<td>' . $status . '</td>';
            $output .= '</tr>';
            $no++; // Increment numbering for the next row
        }

        // Output the HTML content along with the total pages
        echo json_encode(array('html' => $output, 'totalPages' => $totalPages));
    }
    public function history()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/history');
        }
    }

    public function report()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $data['anggota'] = $this->M_admin->get_all();

            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/report', $data);
        }
    }

    public function export_to_excel()
    {
        $formData = array(
            'tanggal' => $this->input->post('tanggal'),
            'status' => $this->input->post('status'),
            'id_anggota' => $this->input->post('id_anggota')
        );
        // Load PhpSpreadsheet library
        require 'vendor/autoload.php';
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Anggota');
        $sheet->setCellValue('C1', 'Nama Anggota');
        $sheet->setCellValue('D1', 'Tanggal Bayar');
        $sheet->setCellValue('E1', 'Total Bayar');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Total Pembayaran'); // Kolom untuk total pembayaran

        // Ambil data pembayaran dari database
        $payments = $this->M_admin->getPembayaranByFilters($formData);

        // Hitung total pembayaran
        // Hitung total pembayaran
        $total_pembayaran = 0;
        foreach ($payments as $payment) {
            $total_pembayaran += $payment->total_bayar;
        }

        // Isi data ke dalam excel
        $row = 2; // Baris awal untuk data
        $no = 1;
        foreach ($payments as $payment) {
            $formatted_jumlah_bayar = 'Rp ' . number_format($payment->total_bayar, 0, ',', '.');

            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $payment->id_member);
            $sheet->setCellValue('C' . $row, $payment->nama_lengkap);
            $sheet->setCellValue('D' . $row, date('d-M-Y', strtotime($payment->tgl_bayar)));
            $sheet->setCellValue('E' . $row, $formatted_jumlah_bayar);
            $sheet->setCellValue('F' . $row, $payment->status == 0 ? 'Pending' : ($payment->status == 1 ? 'Lunas' : 'Ditolak'));
            $row++;
            $no++;
        }

        // Set nilai total pembayaran di kolom E pada baris terakhir
        $sheet->setCellValue('C' . ($row + 1), ''); // Kolom kosong
        $sheet->setCellValue('D' . ($row + 1), 'Total');
        $sheet->setCellValue('E' . ($row + 1), 'Rp ' . number_format($total_pembayaran, 0, ',', '.'));

        // Set nama file dan header untuk download
        $filename = 'Laporan_Pembayaran_' . date('Ymd') . '.xlsx';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function post()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $data['articel'] = $this->M_admin->articel();
            $parse['halaman'] = [];
            foreach ($data['articel'] as $item) {
                $gambar = '';
                if (preg_match('/<img.*?src=["\'](.*?)["\']/', $item->isi, $matches)) {
                    $gambar = $matches[1]; // Extract the image source URL
                }
                $gambar = str_replace("../gambar/", "../assets/gambar/", $gambar);

                $parse['halaman'][] = [
                    'id' => $item->id,
                    'gambar' => $gambar,
                    'kutipan' => $item->kutipan,
                    'judul' => $item->judul,
                    'kutipan' => $item->kutipan,
                    'isi' => $item->isi
                ];
            }
            // print_r($parse);
            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/landing', $parse);
        }
    }
    public function update_articel()
    {
        if (!$this->session->userdata('admin')) {
            redirect(base_url('Admin'));
        } else {
            $id = $this->input->get('id');
            $data['articel'] = $this->M_admin->getUpdateArticel($id);
            $parse['halaman'] = [];
            $gambar = '';
            if (preg_match('/<img.*?src=["\'](.*?)["\']/', $data['articel']->isi, $matches)) {
                $gambar = $matches[1]; // Extract the image source URL
            }
            $gambar = str_replace("../gambar/", "../assets/gambar/", $gambar);

            $parse['halaman'][] = [
                'id' => $data['articel']->id,
                'gambar' => $gambar,
                'kutipan' => $data['articel']->kutipan,
                'judul' => $data['articel']->judul,
                'kutipan' => $data['articel']->kutipan,
                'isi' => $data['articel']->isi
            ];
            // print_r($parse['halaman']);
            $this->load->view('components/admin/header');
            $this->load->view('components/admin/sidebar');
            $this->load->view('components/admin/footer');
            $this->load->view('admin/post', $parse);
        }
    }
    public function imageUp()
    {
        $id = $this->input->get('id');
        $config['upload_path'] = './assets/gambar/'; // Folder untuk menyimpan gambar
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // Ukuran maksimal gambar (2MB)
        $config['overwrite'] = TRUE; // Memastikan gambar yang ada akan diganti

        // Hapus ../assets/gambar/ dari nama file jika ada
        $rep = str_replace("../assets/gambar/", "", $id);

        // Konfigurasi nama file yang akan diunggah
        $config['file_name'] = $rep;

        // Load library upload dan konfigurasinya
        $this->load->library('upload', $config);

        // Lakukan upload gambar
        if (!$this->upload->do_upload('file')) {
            // Gagal upload
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(array('success' => false, 'message' => $error['error']));
        } else {
            // Berhasil upload
            $image_path = base_url('assets/gambar/' . $rep); // Path gambar yang baru diunggah
            echo json_encode(array('success' => true, 'newImagePath' => $image_path));
        }
    }
    public function test1()
    {
        $formData = array(
            'tanggal' => $this->input->post('tanggal'),
            'status' => $this->input->post('status'),
            'id_anggota' => $this->input->post('id_anggota')
        );

        // Get data from model
        $data['pembayaran'] = $this->M_admin->getPembayaranByFilters($formData);
        var_dump($data);
    }
    public function updateArticle()
    {

        $articel = array(
            'id' => $this->input->post('id'),
            'judul' => $this->input->post('title'),
            'isi' => $this->input->post('content')
        );

        if ($this->M_admin->updateArticel($articel)) {
            $this->session->set_flashdata('message', 'Artikel <b>' . $articel['judul'] . '</b> berhasil disimpan.');
        } else {
            $this->session->set_flashdata('message', 'Terjadi kesalahan. Silakan coba lagi.');
        }
        redirect(base_url('/Admin/post'));
    }
}
