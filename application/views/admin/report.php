<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>report</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
                <div class="breadcrumb-item text-primary">Transaksi</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card px-4 pb-2">
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success mt-2">
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-header">
                        <h3>REPORT TRANSAKSI</h3>
                        <div class="card-header-form">
                        </div>
                    </div>
                    <form action="<?php echo base_url('admin/export_to_excel') ?>" method="post">
                        <div class="row form-group">
                            <div class="col">
                                <label for="input1" class="col-sm-2 control-label">Tanggal</label>
                                <input type="text" class="form-control" id="dateRange" name="tanggal">
                            </div>
                            <div class="col">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <select class="form-control" id="status" name="status" placeholder="status">
                                    <option value="1" selected>Lunas</option>
                                    <option value="2">Ditolak</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label for="input3" class="col-sm-2 control-label">Pilih anggota</label>

                                <select name="id_anggota" id="id_anggota" class="form-control">
                                    <option value="">Pilih Anggota</option>
                                    <?php foreach ($anggota as $a) : ?>
                                        <option value="<?php echo $a->id; ?>"><?php echo $a->nama_lengkap; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">EXPORT</button>
                        </div>
                    </form>
                </div>

                <script>
                    $(document).ready(function() {
                        var start = moment().subtract(1, 'months');
                        var end = moment();

                        $('#dateRange').daterangepicker({
                            opens: 'left',
                            locale: {
                                format: 'YYYY-MM-DD'
                            },
                            startDate: start,
                            endDate: end
                        }, function(start, end, label) {
                            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                        });

                        // Set the initial value of the input field
                        $('#dateRange').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
                    });
                </script>