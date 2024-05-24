</div>
<div id="contact">
    <div class="wrapper">
        <div class="footer">
            <div class="footer-section">
                <h3><?php echo $footer[0]['judul'] ?></h3>
                <?php echo $footer[0]['isi'] ?>
            </div>
            <div class="footer-section">
                <h3><?php echo $footer[1]['judul'] ?></h3>
                <?php echo $footer[1]['isi'] ?>
            </div>
            <div class="footer-section">
                <h3><?php echo $footer[2]['judul'] ?></h3>
                <?php echo $footer[2]['isi'] ?>
            </div>
            <div class="footer-section">
                <h3><?php echo $footer[3]['judul'] ?></h3>
                <?php echo $footer[3]['isi'] ?>
            </div>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="wrapper">
        &copy; 2016. <b>Wahdi Center</b> Hak Cipta.
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        $('#toggleEdit').click(function() {
            var formFields = $('#editForm input');
            var submitButton = $('#submitButton');
            if (formFields.prop('disabled')) {
                formFields.prop('disabled', false);
                $(this).removeClass('btn-primary').addClass('btn-secondary');
            } else {
                formFields.prop('disabled', true);
                $(this).removeClass('btn-secondary').addClass('btn-primary');
            }
        });

        var initialData = {};
        $('#editForm input').each(function() {
            initialData[$(this).attr('id')] = $(this).val();
        });

        // Cek perubahan pada setiap input
        $('#editForm input').on('input', function() {
            var changed = false;
            // Bandingkan nilai input dengan nilai awal
            if ($(this).val() !== initialData[$(this).attr('id')]) {
                changed = true;
            }

            // Aktifkan tombol "Save changes" jika ada perubahan
            if (changed) {
                $('#submitButton').show();
            } else {
                $('#submitButton').hide();
            }
        });

        $('#editForm').submit(function() {
            // Lakukan submit hanya jika tombol "Save changes" aktif
            if ($('#submitButton').is(':visible')) {
                return true;
            } else {
                alert('No changes detected.'); // Ubah atau hapus ini sesuai kebutuhan Anda
                return false; // Blokir submit jika tidak ada perubahan
            }
        });
    });
</script>

</html>