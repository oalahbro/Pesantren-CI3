<!-- untuk home -->
<section id="home">
    <img src="<?php echo $halaman[1]['gambar']; ?>" />
    <div class="kolom">
        <p class="deskripsi"><?php echo $halaman[1]['kutipan'] ?></p>
        <h2><?php echo $halaman[1]['judul'] ?></h2>
        <?php echo $halaman[1]['isi'] ?>
        <p><a href="<?php echo $halaman[1]['url'] ?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
    </div>
</section>

<!-- untuk courses -->
<section id="courses">
    <div class="kolom">
        <p class="deskripsi"><?php echo $halaman[2]['kutipan'] ?></p>
        <h2><?php echo $halaman[2]['judul'] ?></h2>
        <?php echo $halaman[2]['isi'] ?>
        <p><a href="<?php echo $halaman[2]['url'] ?>" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
    </div>
    <img src="<?php echo $halaman[2]['gambar'] ?>" />
</section>