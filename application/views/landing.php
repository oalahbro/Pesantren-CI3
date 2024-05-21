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

<section id="tutors">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Tutors</p>
            <h2>Tutors</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!</p>
        </div>

        <div class="tutor-list">
            <?php
            foreach ($tutors as $tutor) {
                // var_dump($tutors);
            ?>
                <div class="kartu-tutor">
                    <a href="<?php echo $tutor['url'] ?>">
                        <img src="<?php echo "assets/gambar/" . $tutor['foto'] ?>" />
                        <p><?php echo $tutor['nama'] ?></p>
                    </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</section>

<!-- untuk partners -->
<section id="partners">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Partners</p>
            <h2>Partners</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.</p>
        </div>

        <div class="partner-list">
            <?php
            foreach ($partners as $partner) {
            ?>
                <div class="kartu-partner">
                    <a href="<?php echo $partner['url'] ?>">
                        <img src="<?php echo "assets/gambar/" . $partner['foto'] ?>" />
                    </a>
                </div>
            <?php
            }
            ?>


        </div>
    </div>
</section>