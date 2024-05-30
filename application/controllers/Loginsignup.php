<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginsignup extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('M_login');
        $this->load->library('form_validation');
    }
    public function index()
    {

        if ($this->session->userdata('user')) {
            redirect(base_url('Loginsignup/profile'));
        } else {
            $this->load->view('components/inc_header');
            $this->load->view('login');
            $this->load->view('components/inc_footer');
        }
    }

    public function apiAuth()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        if ($email and $password) {
            $where = [
                'email' => $email,
                'password' => md5($password)
            ];

            $members = $this->M_login->getMember($where);

            if ($members) {
                $this->session->set_userdata('user', $members);
                redirect(base_url('/Loginsignup'));
            } else {
                $this->session->set_flashdata('err', 'Username atau Password salah !');
                redirect(base_url('/Loginsignup'));
            }
        } else {
            redirect(base_url('/Loginsignup'));
        }
    }

    public function profile()
    {
        if ($this->session->userdata('user')->password) {
            $where = ['email' => $this->session->userdata('user')->email];
            $data['profile'] = $this->M_login->getMember($where);
            // print_r($profile);
            $this->load->view('components/inc_header');
            $this->load->view('profile', $data);
            $this->load->view('components/inc_footer');
        } else {
            redirect(base_url('/Loginsignup/newPassword'));
        }
    }
    public function checkPasswordStatus()
    {
        $email = $this->input->post('email');

        $user = $this->M_login->get_user_by_email($email);

        if ($user && empty($user->password)) {
            echo json_encode(['password_empty' => true]);
        } else {
            echo json_encode(['password_empty' => false]);
        }
    }
    public function newPassword()
    {
        if (isset($_POST["email"])) {
            $where = [
                'email' => $_POST["email"]
            ];

            $members = $this->M_login->getMember($where);
            $this->session->set_userdata('user', $members);

            $this->load->view('components/inc_header');
            $this->load->view('newpassword');
            $this->load->view('components/inc_footer');
        } else {
            if ($this->session->userdata('user')) {
                $this->load->view('components/inc_header');
                $this->load->view('newpassword');
                $this->load->view('components/inc_footer');
            } else {
                redirect(base_url('/Loginsignup'));
                // echo $_POST["email"];
            }
        }
    }
    public function setPassword()
    {
        // Validasi form
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('set_password_form');
        } else {
            // Jika validasi berhasil, update password
            $password = $this->input->post('password');
            $user_id = $this->session->userdata('user')->id; // Pastikan user_id disimpan dalam session saat login

            if ($this->M_login->update_password($user_id, $password)) {
                $this->session->set_flashdata('success', 'Password berhasil diubah');

                $where = [
                    'email' => $this->session->userdata('user')->email
                ];
                $members = $this->M_login->getMember($where);
                $this->session->set_userdata('user', $members);

                redirect('Loginsignup/profile'); // Ganti dengan halaman login atau halaman lain yang diinginkan
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah password.');
                redirect(base_url('/Loginsignup/newPassword'));
            }
        }
    }
    public function updateProfile()
    {
        if ($this->session->userdata('user')) {
            $profileData = array(
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

            $this->M_login->updateProfile($profileData);
            $where = ['id' => $this->session->userdata('user')->id];
            $members =  $this->M_login->getMember($where);
            $this->session->set_userdata('user', $members);

            redirect(base_url('/Loginsignup/profile'));
        } else {
            redirect(base_url('/Loginsignup'));
        }
    }
    public function test()
    {
        $this->load->view('test');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Loginsignup');
    }

    public function register()
    {
        $this->form_validation->set_message('required', '{field} harus diisi.');
        $this->form_validation->set_message('valid_email', '{field} harus berupa email yang valid.');
        $this->form_validation->set_message('is_unique', '{field} sudah terdaftar.');
        // Set validation rules
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Domisili', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[members.email]');
        $this->form_validation->set_rules('telp', 'No. Telphone/Wa', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('pendidikan_terakhir', 'Pendidikan', 'required');
        $this->form_validation->set_rules('jumlah_anggota_keluarga', 'Anggota Keluarga', 'required');
        $this->form_validation->set_rules('nama_keluarga', 'Nama Keluarga Terdekat', 'required');
        $this->form_validation->set_rules('telp_keluarga', 'Nomer Keluarga Terdekat', 'required');
        // var_dump($this->form_validation->run());

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('components/inc_header');
            $this->load->view('login');
            $this->load->view('components/inc_footer');
        } else {
            // Validation passed, proceed to save the user
            $data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'telp' => $this->input->post('telp'),
                'status' => $this->input->post('status'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'jumlah_anggota_keluarga' => $this->input->post('jumlah_anggota_keluarga'),
                'nama_keluarga' => $this->input->post('nama_keluarga'),
                'telp_keluarga' => $this->input->post('telp_keluarga')
            );

            if ($this->M_login->register($data)) {
                $this->session->set_flashdata('success', 'Registration successful. You can now login.');

                $where = ['email' => $data['email']];
                $members = $this->M_login->getMember($where);
                $this->session->set_userdata('user', $members);

                redirect(base_url('/Loginsignup/newPassword'));
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                echo 'gagal';
            }
        }
    }
}
