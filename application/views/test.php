<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <!-- Notifikasi -->
        <div id="paymentNotification" class="alert alert-info" role="alert">
            <!-- Pesan notifikasi akan diisi oleh JavaScript -->
        </div>

        <!-- Form Pembayaran -->
        <div class="card mb-4">
            <div class="card-header">Form Pembayaran</div>
            <div class="card-body">
                <form id="paymentForm" action="#" method="post">
                    <div class="mb-3">
                        <label for="paymentDate" class="form-label">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="paymentDate" name="paymentDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="paymentAmount" class="form-label">Nominal Pembayaran</label>
                        <input type="number" class="form-control" id="paymentAmount" name="paymentAmount" placeholder="Masukkan nominal pembayaran" required>
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
                    <tbody id="paymentHistory">
                        <!-- Data riwayat pembayaran akan diisi oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menetapkan nilai default untuk input tanggal pembayaran ke tanggal hari ini
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('paymentDate').value = today;

            // Data contoh untuk notifikasi dan riwayat pembayaran
            const hasPaidThisMonth = false; // Ganti dengan logika untuk memeriksa status pembayaran bulan ini
            const paymentHistory = [{
                    date: '2024-04-15',
                    amount: '500000',
                    status: 'Lunas'
                },
                {
                    date: '2024-03-10',
                    amount: '450000',
                    status: 'Lunas'
                },
                {
                    date: '2024-02-12',
                    amount: '400000',
                    status: 'Lunas'
                }
            ];

            // Menampilkan notifikasi
            const notificationElement = document.getElementById('paymentNotification');
            if (hasPaidThisMonth) {
                notificationElement.classList.add('alert-success');
                notificationElement.textContent = 'Anda sudah melakukan pembayaran untuk bulan ini.';
            } else {
                notificationElement.classList.add('alert-warning');
                notificationElement.textContent = 'Anda belum melakukan pembayaran untuk bulan ini.';
            }

            // Menampilkan riwayat pembayaran
            const historyElement = document.getElementById('paymentHistory');
            paymentHistory.forEach(payment => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${payment.date}</td>
                    <td>Rp ${parseInt(payment.amount).toLocaleString('id-ID')}</td>
                    <td>${payment.status}</td>
                `;
                historyElement.appendChild(row);
            });

            // Menghandle submit form
            document.getElementById('paymentForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const paymentDate = document.getElementById('paymentDate').value;
                const paymentAmount = document.getElementById('paymentAmount').value;

                // Tambahkan logika untuk memproses pembayaran di sini

                alert(`Pembayaran sebesar Rp ${parseInt(paymentAmount).toLocaleString('id-ID')} pada tanggal ${paymentDate} berhasil diproses.`);

                // Reset form setelah submit
                this.reset();
                document.getElementById('paymentDate').value = today; // Atur kembali nilai tanggal ke hari ini
            });
        });
    </script>

</body>

</html>