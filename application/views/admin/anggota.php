<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>DATA ANGGOTA</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DAFTAR ANGGOTA</h4>
                        <div class="card-header-form">
                            <form class="form-inline">
                                <div class="input-group-btn">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body p-0 ">
                        <div class="col-md-12">
                            <div class="table-responsive ">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA ANGGOTA</th>
                                            <th>NAMA PANGGILAN</th>
                                            <th>EMAIL</th>
                                            <th>ALAMAT</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <!-- Table rows will be filled dynamically via AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <nav aria-label="Page navigation" class="pagination-container md-2">
                    </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="mt-3">Loading, please wait...</div>
            </div>
        </div>
    </div>
</div>
<!-- Modal untuk konfirmasi accept/reject -->
<div class="modal bd-example-modal-lg fade " id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="loadingIndicator" class="text-center" style="display: none;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <form id="editForm" action="<?php echo base_url('Admin/updateAnggota'); ?>" method="post">
                    <input type="text" id="idanggota" name="idanggota" value="" disabled hidden>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="modal-title" id="confirmModalLabel">Account Details</h5>
                        <button type="button" class="btn btn-primary" id="toggleEdit">Edit Profile</button>
                    </div>
                    <div class="card-body">
                        <!-- Form Group (email)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Email</label>
                            <input class="form-control disabled-permanent" id="inputUsername" type="email" placeholder="Masukkan email" name="email" value="" disabled>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (nama)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Nama lengkap</label>
                                <input class="form-control disabled-permanent" id="inputFirstName" type="text" placeholder="Masukkan nama lengkap" name="nama_lengkap" value="" disabled>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Nama Panggilan</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Masukkan nama panggilan" name="nama_panggilan" value="" disabled>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">No Telp</label>
                                <input class="form-control" id="inputOrgName" type="text" placeholder="Masukkan nomor telp" name="telp" value="" disabled>
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Pekerjaan</label>
                                <input class="form-control" id="inputWork" type="text" placeholder="Masukkan Pekerjaan" name="pekerjaan" value="" disabled>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Alamat sekarang</label>
                            <input class="form-control" id="inputAddress" type="text" placeholder="Masukkan alamat" name="alamat" value="" disabled>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Pendidikan Terakhir</label>
                                <input class="form-control" id="inputEdu" type="tel" placeholder="Masukkan pendidikan terakhir" name="pendidikan_terakhir" value="" disabled>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Jumlah Anggota Keluarga</label>
                                <input class="form-control" id="inputFamily" type="text" placeholder="Masukkan julah anggota keluarga" name="jumlah_anggota_keluarga" value="" disabled>
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
                                <input class="form-control" id="inputFamilyName" type="text" placeholder="Masukkan nama Keluarga" name="nama_keluarga" value="" disabled>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFamilyStatus">Status Keluarga</label>
                                <input class="form-control" id="inputFamilyStatus" type="text" placeholder="Masukkan status keluarga" name="status_keluarga" value="" disabled>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputFamilyTelp">No telp Keluarga</label>
                            <input class="form-control" id="inputFamilyTelp" type="text" placeholder="Masukkan no telp keluarga" name="telp_keluarga" value="" disabled>
                        </div>
                        <button id="submitButton" class="btn btn-primary" type="submit" style="display: none;">Save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus anggota ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="deleteAction">Ya</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Function to generate pagination links
        function generatePagination(totalPages, currentPage) {
            var paginationContainer = $('.pagination-container');
            paginationContainer.empty(); // Clear previous pagination links

            var ul = $('<ul class="pagination"></ul>');

            // Add "Previous" link
            if (currentPage > 1) {
                ul.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage - 1) + '">Previous</a></li>');
            }

            // Add individual page links
            for (var i = 1; i <= totalPages; i++) {
                ul.append('<li class="page-item ' + (currentPage === i ? 'active' : '') + '"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>');
            }

            // Add "Next" link
            if (currentPage < totalPages) {
                ul.append('<li class="page-item"><a class="page-link" href="#" data-page="' + (currentPage + 1) + '">Next</a></li>');
            }

            paginationContainer.append(ul);

            // Attach event listener for page links
            paginationContainer.find('.page-link').click(function(e) {
                e.preventDefault();
                var page = parseInt($(this).attr('data-page'));
                var searchQuery = $('#searchInput').val(); // Get search query
                fetchData(page, searchQuery); // Update content based on the clicked page and search query
            });
        }

        // Function to fetch data based on page number and search query
        function fetchData(page, searchQuery = '') {
            $.ajax({
                url: '<?php echo base_url('admin/fetch_anggota') ?>', // URL to fetch data from
                type: 'GET',
                data: {
                    page: page,
                    search: searchQuery // Pass search query to the backend
                },
                dataType: 'json', // Expect JSON response
                success: function(response) {
                    // Update table body with fetched data
                    $('#tableBody').html(response.html);

                    // Generate pagination links based on total pages
                    generatePagination(response.totalPages, page);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', errorThrown);
                }
            });
        }

        // Example: Initial setup with page 1
        fetchData(1);
        // Event listener for search input
        $('#searchInput').on('keyup', function() {
            var searchQuery = $(this).val(); // Get search query
            fetchData(1, searchQuery); // Update content with search query and reset to page 1
        });

        var initialData = {};

        function storeInitialData() {
            $('#editForm input').each(function() {
                initialData[$(this).attr('id')] = $(this).val();
            });
        }

        // Simpan data awal saat modal ditampilkan
        $(document).on('click', '.details-button', function() {
            var id_members = $(this).data('id');
            $('#loadingModal').modal('show');
            $.ajax({
                url: '<?php echo base_url('admin/get_anggota_details'); ?>',
                method: 'POST',
                data: {
                    id_members: id_members
                },
                dataType: 'json',
                success: function(response) {
                    $('#idanggota').val(response.id);
                    $('#inputUsername').val(response.email);
                    $('#inputFirstName').val(response.nama_lengkap);
                    $('#inputLastName').val(response.nama_panggilan);
                    $('#inputOrgName').val(response.telp);
                    $('#inputWork').val(response.pekerjaan);
                    $('#inputAddress').val(response.alamat);
                    $('#inputEdu').val(response.pendidikan_terakhir);
                    $('#inputFamily').val(response.jumlah_anggota_keluarga);
                    $('#inputFamilyName').val(response.nama_keluarga);
                    $('#inputFamilyStatus').val(response.status_keluarga);
                    $('#inputFamilyTelp').val(response.telp_keluarga);

                    // Simpan data awal setelah semua field diisi
                    storeInitialData();
                    $('#loadingModal').modal('hide');
                    $('#confirmModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Aktifkan atau nonaktifkan input
        $('#toggleEdit').click(function() {
            $('#editForm input:not(.disabled-permanent)').prop('disabled', function(i, val) {
                return !val;
            });
            $(this).toggleClass('btn-primary btn-secondary');
        });

        // Tampilkan atau sembunyikan tombol "Save Changes" jika ada perubahan data
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

        // Validasi form submit
        $('#editForm').submit(function() {
            if ($('#submitButton').is(':visible')) {
                return true;
            } else {
                alert('No changes detected.');
                return false;
            }
        });

        // Reset form dan data awal ketika modal ditutup
        $('#confirmModal').on('hidden.bs.modal', function() {
            $('#editForm')[0].reset();
            $('#submitButton').hide();
            $('#editForm input').prop('disabled', true);
            $('#toggleEdit').removeClass('btn-secondary').addClass('btn-primary');
            initialData = {};
        });

        $(document).on('click', '.delete', function() {
            var id_anggota = $(this).data('id');
            $('#deleteAction').data('id', id_anggota);
            $('#deleteAction').data('action', 'delete');
            $('#deleteModal').modal('show');
        });

        $('#deleteAction').click(function() {
            var id_anggota = $(this).data('id');
            // Lakukan AJAX request untuk proses accept/reject
            $.ajax({
                url: '<?php echo base_url('admin/delete_anggota') ?>',
                method: 'POST',
                data: {
                    id_anggota: id_anggota
                },
                success: function(response) {
                    response = JSON.parse(response);
                    // Tampilkan pesan sukses atau error
                    alert(response.message);
                    // Refresh tabel pembayaran jika berhasil
                    if (response.success) {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>