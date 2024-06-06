<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>DATA PEMBAYARAN</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LIST PENDING PEMBAYARAN</h4>
                        <div class="card-header-form">
                            <form class="form-inline">
                                <div class="input-group-btn">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0 ">
                        <div class="col-md-12">
                            <div class="table-responsive ">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA ANGGOTA</th>
                                            <th>JUMLAH BAYAR</th>
                                            <th>BUKTI BAYAR</th>
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
<div class="modal fade" id="buktiBayarModal" tabindex="-1" aria-labelledby="buktiBayarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buktiBayarModalLabel">Bukti Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="buktiBayarImg" class="img-fluid" alt="Bukti Bayar">
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk konfirmasi accept/reject -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin <span id="actionLabel"></span> pembayaran ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmAction">Ya</button>
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
                url: '<?php echo base_url('admin/fetch_pending_pembayaran') ?>', // URL to fetch data from
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

        $(document).on('click', '.view-bukti', function() {
            var buktiBayar = $(this).data('bukti');
            console.log(buktiBayar)
            $('#buktiBayarImg').attr('src', buktiBayar);
            $('#buktiBayarModal').modal('show');
        });

        $(document).on('click', '.accept', function() {
            var id_pembayaran = $(this).data('id');
            $('#actionLabel').html('accept');
            $('#confirmAction').data('id', id_pembayaran);
            $('#confirmAction').data('action', 'accept');
            $('#confirmModal').modal('show');
        });

        $(document).on('click', '.reject', function() {
            var id_pembayaran = $(this).data('id');
            $('#actionLabel').html('reject');
            $('#confirmAction').data('id', id_pembayaran);
            $('#confirmAction').data('action', 'reject');
            $('#confirmModal').modal('show');
        });

        // Proses accept/reject pembayaran
        $('#confirmAction').click(function() {
            var id_pembayaran = $(this).data('id');
            var action = $(this).data('action');

            // Lakukan AJAX request untuk proses accept/reject
            $.ajax({
                url: 'proses_accept_reject.php',
                method: 'POST',
                data: {
                    id_pembayaran: id_pembayaran,
                    action: action
                },
                success: function(response) {
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