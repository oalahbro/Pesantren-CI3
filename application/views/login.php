<?php if ($this->session->flashdata('err')) {
    echo "<div class='error'><ul class='pesan'>" . $this->session->flashdata('err') . "</ul></div>";
} ?>
<!-- <form action="<?php echo base_url("Loginsignup/apiAuth"); ?>" method="POST">
    <table>
        <tr>
            <td class="label">Email</td>
            <td><input type="text" name="email" class="input" /></td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td><input type="password" name="password" class="input" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="login" value="Login" class="tbl-biru" /></td>
        </tr>
    </table>
</form> -->
<div class="container mb-4 mt-4">
    <div class="navbar navbar-light bg-light">
        <ul class="nav nav-borders" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-success me-2 active" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="true">Login</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-outline-primary me-2" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab" aria-controls="pills-register" aria-selected="false">Register</button>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
            <h2 class="mt-4">Login</h2>
            <form action="<?php echo base_url("Loginsignup/apiAuth"); ?>" method="post">
                <div class="mb-3">
                    <label for="login-email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="login-email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="login-password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="login-password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
            <h2 class="mt-4">Register</h2>
            <h4 class="mt-4">Data Diri</h4>
            <form action="<?php echo site_url('auth/register'); ?>" method="post">
                <div class="mb-3">
                    <label for="register-nama" class="form-label">Nama Lengkap:</label>
                    <input type="text" class="form-control" id="register-nama" name="nama" placeholder="Sesuai E-KTP" required>
                </div>
                <div class="mb-3">
                    <label for="register-namapanggilan" class="form-label">Nama Panggilan:</label>
                    <input type="text" class="form-control" id="register-namapanggilan" name="namapanggilan" required>
                </div>
                <div class="mb-3">
                    <label for="register-alamat" class="form-label">Alamat Domisili:</label>
                    <input type="text" class="form-control" id="register-alamat" name="alamat" required>
                </div>
                <div class="mb-3">
                    <label for="register-email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="register-email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="register-notelp" class="form-label">No. Telphone/Wa:</label>
                    <input type="number" class="form-control" id="register-notelp" name="notelp" required>
                </div>
                <div class="mb-3">
                    <label for="register-status" class="form-label">Status:</label>
                    <input type="text" class="form-control" id="register-status" name="status" placeholder="Menikah / Belum Menikah" required>
                </div>
                <div class="mb-3">
                    <label for="register-pekerjaan" class="form-label">Pekerjaan:</label>
                    <input type="text" class="form-control" id="register-pekerjaan" name="pekerjaan" required>
                </div>
                <div class="mb-3">
                    <label for="register-pendidikan" class="form-label">Pendidikan:</label>
                    <input type="text" class="form-control" id="register-pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir" required>
                </div>
                <div class="mb-3">
                    <label for="register-anggotakeluarga" class="form-label">Anggota Keluarga:</label>
                    <input type="number" class="form-control" id="register-anggotakeluarga" name="anggotakeluarga" required>
                </div>
                <h4 class="mt-4">Data Keluarga Terdekat</h4>
                <div class="mb-3">
                    <label for="register-keluargaterdekat" class="form-label">Nama Keluarga Terdekat:</label>
                    <input type="text" class="form-control" id="register-keluargaterdekat" name="keluargaterdekat" required>
                </div>
                <div class="mb-3">
                    <label for="register-nomerkeluarga" class="form-label">Nomer Keluarga Terdekat:</label>
                    <input type="number" class="form-control" id="register-nomerkeluarga" name="nomerkeluarga" required>
                </div>
                <div class="mb-3">
                    <label for="register-statuskeluarga" class="form-label">Status Keluarga Terdekat:</label>
                    <input type="text" class="form-control" id="register-statuskeluarga" name="statuskeluarga" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="termsCheck">
                    <label class="form-check-label" for="termsCheck">I agree to the Terms & Conditions</label>
                </div>
                <button type="submit" class="btn btn-primary" id="submitButton" disabled>Register</button>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Syarat & Ketentuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Your terms and conditions content here -->
                <p>Syarat Keanggotaan:
                    <ol>
                        <li>Warga Negara Indonesia.</li>
                        <li>Mengisi dan menandatangani formulir permohonan menjadi anggota GASSEBU.</li>
                        <li>Menyerahkan Fotokopi E-KTP & KK.</li>
                        <li>Membayar kotak GASSEBU setiap bulan dan menyerahkan dana GASSEBU kepada Koordinator di wilayahnya.</li>
                        <li>Bersedia mengikuti syarat dan ketentuan Keanggotaan GASSEBU.</li>
                    </ol>
                </p>
                <p>Masa Akhir Keanggotaan:
                    <ol>
                        <li>Meninggal dunia.</li>
                        <li>Berhenti atas kehendak sendiri, (ada surat pengunduran diri).</li>
                        <li>3 bulan berturut-turut tidak andil dalam pengisian kotak GASSEBU.</li>
                    </ol>
                </p>
                <p>Akad Keanggotaan:
                    <li>Akad yang digunakan adalah Infaq/Sedekah, dimana Anggota GASSEBU mewakilkan/mendelegasikan pengurus penyaluran sedekahnya kepada koordinator dan pengurus Wahdi GASSEBU agar dapat menjadi manfaat dunia akhirat.</li>
                </p>
                <p>Prosedur Pengambilan Dana Kaleng GASSEBU:
                    <ol>
                        <li>Setelah menyerahkan fotokopi E-KTP & KK, calon anggota GASSEBU terdaftar resmi menjadi anggota GASSEBU dan mendapatkan kaleng GASSEBU</li>
                        <li>Kaleng GASSEBU diisi sesuai dengan kemampuan namun diusahakan sehari di isi uang minimal Rp. 1000</li>
                        <li>Tanggal pengambilan dana kaleng GASSEBU adalah tanggal pertama kali kaleng GASSEBU diberikan kepada anggota.</li>
                        <li>Dana kaleng GASSEBU dapat di transfer setiap bulannya melalui rekening Wahdi GASSEBU dibawah in:
                            <ul>
                                <li>No. Rekening : 042-301-002-173-562</li>
                                <li>Atas Nama : Wahdi GASSEBU</li>
                                <li>Bank : Bank Rakyat Indonesia (BRI)</li>
                            </ul>
                            <ul>
                                <li>No. Rekening : 7167211121</li>
                                <li>Atas Nama : Wahdi GASSEBU Pusat</li>
                                <li>Bank : Bank Syariah Indonesia</li>
                            </ul>
                        </li>
                        <li>Koordinator berhak mengambil kembali kaleng GASSEBU apabila tidak ada setoran dana selama 3 (tiga) bulan berturut-turut.</li>
                </ol>
                </p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Setuju</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('termsCheck').addEventListener('change', function() {
            var submitButton = document.getElementById('submitButton');
            submitButton.disabled = !this.checked;
            if (this.checked) {
                var termsModal = new bootstrap.Modal(document.getElementById('termsModal'));
                termsModal.show();
            }
        });
    });
</script>