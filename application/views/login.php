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
            <form action="<?php echo site_url('auth/register'); ?>" method="post">
                <div class="mb-3">
                    <label for="register-email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="register-email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="register-password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="register-password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>