<style>
    * {
        box-sizing: border-box;
    }

    .slick-slide {
        margin: 0px 20px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }
</style><!-- Your existing sections -->
<section id="home" class="gap-4 mt-4">
    <img src="<?php echo $halaman[0]['gambar']; ?>" style="max-width:500px" class="rounded-4" />
    <div class="my-auto">
        <p class="deskripsi"><?php echo $halaman[0]['kutipan'] ?></p>
        <h2><?php echo $halaman[0]['judul'] ?></h2>
        <p><?php echo $halaman[0]['isi'] ?></p>
        <p><a href="<?php echo $halaman[0]['url'] ?>" class="tbl-pink">Pelajari Lebih Lanjut</a></p>
    </div>
</section>

<!-- untuk courses -->
<section id="courses" class="gap-4">
    <div class="my-auto">
        <p class="deskripsi"><?php echo $halaman[1]['kutipan'] ?></p>
        <h2><?php echo $halaman[1]['judul'] ?></h2>
        <p><?php echo $halaman[1]['isi'] ?></p>
        <p><a href="<?php echo $halaman[1]['url'] ?>" class="tbl-biru">Pelajari Lebih Lanjut</a></p>
    </div>
    <img src="<?php echo $halaman[1]['gambar'] ?>" style="max-width:500px" class="rounded-4" />
</section>

<section id="tutors">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top Tutors</p>
            <h2>Tutors</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!</p>
        </div>
        <div class="tutor-list">
            <?php foreach ($tutors as $tutor) { ?>
                <div class="kartu-tutor">
                    <a href="<?php echo $tutor['url'] ?>">
                        <div class="round">
                            <img src="<?php echo "assets/gambar/" . $tutor['foto'] ?>" />
                        </div>
                        <p><?php echo $tutor['nama'] ?></p>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="News">
    <div class="tengah">
        <div class="kolom">
            <p class="deskripsi">Our Top News</p>
            <h2>News</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, optio!</p>
        </div>
        <div class="regular slider">
            <?php foreach ($halaman as $post) { ?>
                <div class="card">
                    <a href="<?= $post['url'] ?>" style="color: black; text-decoration: none;">
                        <img style="max-height: 10rem;" src="<?php echo $post['gambar']; ?>" class="card-img-top" alt="Image 1">
                        <div class="card-body">
                            <h5 class="card-title"><?= substr($post['judul'], 0, 17) ?></h5>
                            <p class="card-text"><?= substr($post['kutipan'], 0, 25)  ?></p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- untuk partners -->
<section id="partners">
    <div class="tengah">
        <div class="kolom">
            <h2>Partners</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi magni tempore expedita sequi. Similique rerum doloremque impedit saepe atque maxime.</p>
        </div>
        <div class="partner-list">
            <?php foreach ($partners as $partner) { ?>
                <div class="kartu-partner">
                    <a href="<?php echo $partner['url'] ?>">
                        <div class="round">
                            <img src="<?php echo "assets/gambar/" . $partner['foto'] ?>" />
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script src=<?php echo base_url("assets/slick/slick.js") ?> type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $('.regular').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
</script>