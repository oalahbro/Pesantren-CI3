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
                            <label class="small mb-1" for="inputUsername">Password</label>
                            <input class="form-control  " type="password" placeholder="Masukkan password" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">confirm password</label>
                            <input class="form-control  " type="password" placeholder="Masukkan ulang password" name="confirm_password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>