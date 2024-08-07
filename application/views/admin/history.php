<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>DATA PEMBAYARAN</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>LIST HISTORY PEMBAYARAN</h4>
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
                                            <th>TGL BAYAR</th>
                                            <th>STATUS</th>
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
                    Apakah Anda yakin ingin menghapus history transaksi ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="deleteAction">Ya</button>
                </div>
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
                url: '<?php echo base_url('admin/fetch_history_pembayaran') ?>', // URL to fetch data from
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
    });

    $(document).on('click', '.delete', function() {
        var id_pembayaran = $(this).data('id');
        $('#deleteAction').data('id', id_pembayaran);
        $('#deleteAction').data('action', 'delete');
        $('#deleteModal').modal('show');
    });
    $('#deleteAction').click(function() {
        var id_pembayaran = $(this).data('id');
        // Lakukan AJAX request untuk proses accept/reject
        $.ajax({
            url: '<?php echo base_url('admin/delete_history') ?>',
            method: 'POST',
            data: {
                id_pembayaran: id_pembayaran
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
</script>