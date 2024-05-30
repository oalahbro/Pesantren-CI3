<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <div class="nav nav-borders">
        <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
        <a class="nav-link" href="<?php echo base_url('Pembayaran') ?>">Infaq</a>
    </div>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <form id="editForm" action="<?php echo base_url('Loginsignup/updateProfile'); ?>" method="post">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Account Details</span>
                        <button type="button" class="btn btn-primary" id="toggleEdit">Edit Profile</button>
                    </div>
                    <div class="card-body">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Email</label>
                            <input class="form-control disabled-permanent" id="inputUsername" type="email" placeholder="Masukkan email" name="email" value="<?php echo $profile->email; ?>" disabled>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Nama lengkap</label>
                                <input class="form-control disabled-permanent" id="inputFirstName" type="text" placeholder="Masukkan nama lengkap" name="nama_lengkap" value="<?php echo $profile->nama_lengkap; ?>" disabled>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Nama Panggilan</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Masukkan nama panggilan" name="nama_panggilan" value="<?php echo $profile->nama_panggilan; ?>" disabled>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">No Telp</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Masukkan nomor telp" name="telp" value="<?php echo $profile->telp; ?>" disabled>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Pekerjaan</label>
                                <input class="form-control" id="inputWork" type="text" placeholder="Masukkan Pekerjaan" name="pekerjaan" value="<?php echo $profile->pekerjaan; ?>" disabled>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Alamat sekarang</label>
                            <input class="form-control" id="inputAddress" type="text" placeholder="Masukkan alamat" name="alamat" value="<?php echo $profile->alamat; ?>" disabled>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Pendidikan Terakhir</label>
                                <input class="form-control" id="inputEdu" type="tel" placeholder="Masukkan pendidikan terakhir" name="pendidikan_terakhir" value="<?php echo $profile->pendidikan_terakhir; ?>" disabled>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Jumlah Anggota Keluarga</label>
                                <input class="form-control" id="inputFamily" type="text" placeholder="Masukkan julah anggota keluarga" name="jumlah_anggota_keluarga" value="<?php echo $profile->jumlah_anggota_keluarga; ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">Data Keluarga</div>
                    <div class="card-body">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFamilyName">Nama keluarga</label>
                                <input class="form-control" id="inputFamilyName" type="text" placeholder="Masukkan nama Keluarga" name="nama_keluarga" value="<?php echo $profile->nama_keluarga; ?>" disabled>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFamilyStatus">Status Keluarga</label>
                                <input class="form-control" id="inputFamilyStatus" type="text" placeholder="Masukkan status keluarga" name="status_keluarga" value="<?php echo $profile->status_keluarga; ?>" disabled>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputFamilyTelp">No telp Keluarga</label>
                            <input class="form-control" id="inputFamilyTelp" type="text" placeholder="Masukkan no telp keluarga" name="telp_keluarga" value="<?php echo $profile->telp_keluarga; ?>" disabled>
                        </div>
                        <button id="submitButton" class="btn btn-primary" type="submit" style="display: none;">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var initialData = {};
        $('#editForm input').each(function() {
            initialData[$(this).attr('id')] = $(this).val();
        });

        $('#toggleEdit').click(function() {
            $('#editForm input:not(.disabled-permanent)').prop('disabled', function(i, val) {
                return !val;
            });
            $(this).toggleClass('btn-primary btn-secondary');
        });

        $('#editForm input').on('input', function() {
            var changed = false;
            $('#editForm input:not(.disabled-permanent)').each(function() {
                if ($(this).val() !== initialData[$(this).attr('id')]) {
                    changed = true;
                }
            });

            if (changed) {
                $('#submitButton').show();
            } else {
                $('#submitButton').hide();
            }
        });

        $('#editForm').submit(function() {
            if ($('#submitButton').is(':visible')) {
                return true;
            } else {
                alert('No changes detected.');
                return false;
            }
        });
    });
</script>