<div class="main-content bg-primary">
    <section class="section">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-male fa-5x"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>JUMLAH ANGGOTA</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_members; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-female fa-xl"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>BELUM BAYAR</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_unpaid; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>SUDAH BAYAR</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_paid; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>TOTAL BAYAR</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $total_payments; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4>PILIH TAHUN</h4>

                        <div class="card-header-form">
                            <div class="form-row input-group">
                                <input type="text" class="form-control" id="startYearPicker" placeholder="Start Year" />
                                <input type="text" class="form-control" id="endYearPicker" placeholder="End Year" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="submitBtn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice table-container">
                            <table class="table table-striped" id="yearRangeData">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Jumlah Bayar</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <div id="loading" class="justify-content-center align-items-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    function formatRupiah(amount) {
        amount = amount.toString();
        var parts = amount.split('.');
        var wholePart = parts[0];
        var decimalPart = parts.length > 1 ? '.' + parts[1] : '';

        wholePart = wholePart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        return 'Rp ' + wholePart + decimalPart;
    }
    $("#startYearPicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
    });

    $("#endYearPicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
    });

    $("#submitBtn").on("click", function() {
        var startYear = $("#startYearPicker").val();
        var endYear = $("#endYearPicker").val();
        $("#loading").css("display", "flex");
        var data = {
            startYear: startYear,
            endYear: endYear,
        };

        $.post("<?php echo base_url("Admin/countPaymentsByYear") ?>", data)
            .done(function(response) {
                $("#loading").hide();
                var jsonData = JSON.parse(response);
                $("#yearRangeData tbody").empty();
                var rowNum = 1;

                jsonData.forEach(function(row) {
                    $("#yearRangeData tbody").append(
                        "<tr>" +
                        "<td>" + rowNum + "</td>" +
                        "<td>" + row.tahun_dibayar + "</td>" +
                        "<td>" + formatRupiah(row.total_jumlah_bayar) + "</td>" +
                        "</tr>"
                    );

                    rowNum++;
                });
            })
            .fail(function(error) {
                $("#loading").hide();
                console.error("Error:", error);
            });
    });
</script>