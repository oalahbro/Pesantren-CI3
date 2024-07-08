<div class="card my-3">
    <div class="row g-0">
        <div class="col-sm-4 col-5">
            <img src="<?php echo base_url('assets/gambar/' . $tutors['foto']) ?>" class="card-img-top" alt="...">
        </div>
        <div class="col-sm-8 col-7">
            <div class="card-body">
                <h2 class="card-title"><?php echo $tutors['nama'] ?></h2>
                <p class="card-text" id="card-text">
                <div id="short-text"><?php echo $tutors['singkat']; ?>...</div>
                <div id="full-text" style="display: none;"><?php echo $tutors['isi']; ?></div>
                <button class="btn btn-link" id="read-more" onclick="toggleText()">Selengkapnya</button>
                </p>
                <p class="card-text d-none d-sm-block"><small class="text-muted"><?php echo $tutors['tgl_isi']; ?></small></p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var fullText = document.getElementById('full-text').textContent.trim();
        var readMoreBtn = document.getElementById('read-more');

        // Sembunyikan tombol jika teks kurang dari 250 karakter
        if (fullText.length <= 250) {
            readMoreBtn.style.display = 'none';
        }
    });

    function toggleText() {
        var shortText = document.getElementById('short-text');
        var fullText = document.getElementById('full-text');
        var readMoreBtn = document.getElementById('read-more');

        if (fullText.style.display === 'none') {
            shortText.style.display = 'none';
            fullText.style.display = 'block';
            readMoreBtn.textContent = 'Tampilkan lebih sedikit';
        } else {
            shortText.style.display = 'block';
            fullText.style.display = 'none';
            readMoreBtn.textContent = 'Selengkapnya';
        }
    }
</script>