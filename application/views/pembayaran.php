<div class="container-xl px-4 my-4">
    <div class="nav nav-borders">
        <a class="nav-link active ms-0" href="<?php echo base_url('Loginsignup/profile') ?>">Profile</a>
        <a class="nav-link" href="<?php echo base_url('Pembayaran') ?>">Infaq</a>
    </div>
    <hr class="mt-0 mb-4">

    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-info">
            <?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php endif; ?>

    <div id="paymentNotification" class="alert <?php echo $hasPaidThisMonth ? 'alert-success' : 'alert-warning'; ?>" role="alert">
        <?php echo $hasPaidThisMonth ? 'Anda sudah melakukan pembayaran untuk bulan ini.' : 'Anda belum melakukan pembayaran untuk bulan ini.'; ?>
    </div>

    <!-- Form Pembayaran -->
    <div class="card mb-4">
        <div class="card-header">Form Pembayaran</div>
        <div class="card-body">
            <form id="paymentForm" action="<?php echo site_url('Pembayaran/submitPayment'); ?>" method="post">
                <div class="mb-3">
                    <label for="paymentDate" class="form-label">Tanggal Pembayaran</label>
                    <input type="date" class="form-control" id="paymentDate" name="paymentDate" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="paymentAmount" class="form-label">Nominal Pembayaran</label>
                    <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" placeholder="Masukkan nominal pembayaran" required>
                </div>
                <div class="mb-3">
                    <label for="buktipembayaran" class="form-label">Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="buktipembayaran" name="buktipembayaran" placeholder="Masukkan nominal pembayaran" required>
                </div>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>

    <!-- Riwayat Pembayaran -->
    <div class="card">
        <div class="card-header">Riwayat Pembayaran</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paymentHistory as $payment) : ?>
                        <tr>
                            <td><?php echo date('d - F - Y', strtotime($payment->tgl_bayar)); ?></td>
                            <td>Rp <?php echo number_format($payment->total_bayar, 0, ',', '.'); ?></td>
                            <td>
                                <?php if ($payment->status == 0) : ?>
                                    <button class="btn btn-outline-warning">Pending</button>
                                <?php else : ?>
                                    <button class="btn btn-warning">Lunas</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>