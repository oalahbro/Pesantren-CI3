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
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="termsCheck" data-toggle="modal" data-target="#termsModal">
                    <label class="form-check-label" for="termsCheck">I agree to the Terms & Conditions</label>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            
        </div>
    </div>
</div>
