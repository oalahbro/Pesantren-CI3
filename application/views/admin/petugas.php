<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>DATA ANGGOTA</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>DAFTAR PETUGAS</h4>
                        <div class="card-header-form d-flex align-items-center">
                            <form class="form-inline">
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                </div>
                            </form>
                            <button type="button" class="btn btn-primary ml-2 add">Add Anggota</button>
                        </div>
                    </div>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success mx-2">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger mx-2">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body p-0 ">
                        <div class="col-md-12">
                            <div class="table-responsive ">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th>STATUS</th>
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
                <form id="editForm" action="<?php echo base_url('Admin/updatePetugas'); ?>" method="post">
                    <input type="text" id="idpetugas" name="idpetugas" value="" hidden>

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="modal-title" id="confirmModalLabel">Account Details</h5>
                        <button type="button" class="btn btn-primary" id="toggleEdit">Edit Petugas</button>
                    </div>
                    <div class="card-body">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input type="text" class="form-control disabled-permanent" id="inputUsername" name="uname" value="" disabled>
                        </div>
                        <!-- Form Group (password)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPassword">Password</label>
                            <input class="form-control" id="inputPassword" type="password" placeholder="Masukkan password" name="password" value="" disabled>
                        </div>
                        <!-- Form Group (level)-->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">LEVEL</span>
                            </div>
                            <select name="level" id="inputLevel" class="form-control" disabled>
                                <option value="">Pilih Level</option>
                                <option value="1">ADMIN</option>
                                <option value="2">PETUGAS</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submitButton" class="btn btn-primary" style="display: none;">Submit</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- delete modal -->
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
                Apakah Anda yakin ingin menghapus petugas ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="deleteAction">Ya</button>
            </div>
        </div>
    </div>
</div>


<div class="modal bd-example-modal-lg fade " id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="<?php echo base_url('Admin/addPetugas'); ?>" method="post">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="modal-title" id="addModalLabel">Tambah Petugas</h5>
                    </div>
                    <div class="card-body">
                        <!-- Form Group (email)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control disabled-permanent" id="Username" type="text" placeholder="Masukkan username" name="username" value="">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (nama)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Password</label>
                                <input class="form-control" id="Password" type="text" placeholder="Masukkan nama lengkap" name="password" value="">
                            </div>
                            <!-- Form Group (last name)-->

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="">Pilih Level</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">PETUGAS</option>
                                </select>
                            </div>
                        </div>
                        <button id="submit" class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                url: '<?php echo base_url('admin/fetch_petugas') ?>', // URL to fetch data from
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
            var id_petugas = $(this).data('id');
            $('#loadingModal').modal('show');
            $.ajax({
                url: '<?php echo base_url('admin/get_petugas_details'); ?>',
                method: 'POST',
                data: {
                    id_petugas: id_petugas
                },
                dataType: 'json',
                success: function(response) {
                    $('#idpetugas').val(response.id);
                    $('#inputUsername').val(response.username);
                    $('#inputPassword').val(response.password);
                    $('#inputLevel').val(response.level);

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
            // Toggle the 'disabled' property for specific fields
            $('#inputPassword, #inputLevel').prop('disabled', function(i, val) {
                return !val;
            });

            // Change the button appearance
            $(this).toggleClass('btn-primary btn-secondary');
        });


        // Tampilkan atau sembunyikan tombol "Save Changes" jika ada perubahan data
        $('#editForm input, #editForm select').on('input change', function() {
            var changed = false;
            $('#editForm input:not(.disabled-permanent), #editForm select:not(.disabled-permanent)').each(function() {
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
            $('#editForm select').prop('disabled', true);
            $('#toggleEdit').removeClass('btn-secondary').addClass('btn-primary');
            initialData = {};
        });

        $(document).on('click', '.delete', function() {
            var id_petugas = $(this).data('id');
            $('#deleteAction').data('id', id_petugas);
            $('#deleteAction').data('action', 'delete');
            $('#deleteModal').modal('show');
        });
        $(document).on('click', '.add', function() {
            $('#addModal').modal('show');
        });

        $('#deleteAction').click(function() {
            var id_petugas = $(this).data('id');
            $.ajax({
                url: '<?php echo base_url('admin/delete_petugas') ?>',
                method: 'POST',
                data: {
                    id_petugas: id_petugas
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