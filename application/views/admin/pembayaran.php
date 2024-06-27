<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>TRANSAKSI</h1>
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

                        <h3>TRANSAKSI PEMBAYARAN</h3>
                        <div class="card-header-form">
                            <form action="<?php echo base_url('admin/savePayment') ?>" method="post">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Tanggal Bayar</span>
                        </div>
                        <input type="date" name="tgl_bayar" class="form-control" placeholder="tgl_bayar" aria-label="tanggal" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">ANGGOTA</span>
                        </div>

                        <select name="id_anggota" id="id_anggota" class="form-control">
                            <option value="">Pilih Anggota</option>
                            <?php foreach ($anggota as $a) : ?>
                                <option value="<?php echo $a->id; ?>"><?php echo $a->nama_lengkap; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">jumlah</span>
                        </div>
                        <input type="text" name="jumlah_bayar" class="form-control" placeholder="jumlah bayar" aria-label="masukkan nominal" aria-describedby="basic-addon1">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Bayar</button>
                        </form>
                    </div>