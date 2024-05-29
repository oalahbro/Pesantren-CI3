<div class="container-xl px-4 mt-4">
    <div class="nav nav-borders">
        <a class="nav-link active ms-0" target="__blank">Create Password</a>
    </div>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <form id="newPassword" action="<?php echo base_url("Loginsignup/setPassword"); ?>" method="post">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Buat Password Baru</span>
                    </div>
                    <div class="card-body">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input class="form-control" type="password" placeholder="Masukkan password" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                            <input class="form-control" type="password" placeholder="Masukkan ulang password" name="confirm_password" id="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div id="passwordError" class="text-danger mt-2" style="display: none;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('newPassword').addEventListener('submit', function(event) {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirm_password').value;
        var errorMessage = '';

        if (password.length < 8) {
            errorMessage += 'Password harus memiliki minimal 8 karakter.<br>';
        }

        if (password !== confirmPassword) {
            errorMessage += 'Password dan konfirmasi password tidak cocok.<br>';
        }

        if (errorMessage !== '') {
            event.preventDefault(); // Mencegah form untuk submit
            document.getElementById('passwordError').innerHTML = errorMessage;
            document.getElementById('passwordError').style.display = 'block';
        } else {
            document.getElementById('passwordError').style.display = 'none';
        }
    });
</script>