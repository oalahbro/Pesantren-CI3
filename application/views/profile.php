<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <div class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Infaq</a>
    </div>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <form>
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Email</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Masukkan email" value="<?php echo $profile->email ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Nama lengkap</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Masukkan nama lengkap" value="<?php echo $profile->nama_lengkap ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Nama Panggilan</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Masukkan nama panggilan" value="<?php echo $profile->nama_panggilan ?>">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">No Telp</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Masukkan nomor telp" value="<?php echo $profile->telp ?>">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Pekerjaan</label>
                                <input class="form-control" id="inputWork" type="text" placeholder="Masukkan Pekerjaan" value="<?php echo $profile->pekerjaan ?>">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Alamat sekarang</label>
                            <input class="form-control" id="inputAddress" type="email" placeholder="Masukkan alamat" value="<?php echo $profile->alamat ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Pendidikan Terakhir</label>
                                <input class="form-control" id="inputEdu" type="tel" placeholder="Masukkan pendidikan terakhir" value="<?php echo $profile->pendidikan_terakhir ?>">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Jumlah Anggota Keluarga</label>
                                <input class="form-control" id="inputFamily" type="text" placeholder="Masukkan julah anggota keluarga" value="<?php echo $profile->jumlah_anggota_keluarga ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-header">Data Keluarga</div>
                    <div class="card-body">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Nama keluarga</label>
                                <input class="form-control" id="inputFamilyName" type="text" placeholder="Masukkan nama Keluarga" value="<?php echo $profile->nama_keluarga ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Status Keluarga</label>
                                <input class="form-control" id="inputFamilyStatus" type="text" placeholder="Masukkan status keluarga" value="<?php echo $profile->status_keluarga ?>">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">No telp Keluarga</label>
                            <input class="form-control" id="inputFamilyTelp" type="text" placeholder="Masukkan no telp keluarga" value="<?php echo $profile->telp_keluarga ?>">
                        </div>
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>