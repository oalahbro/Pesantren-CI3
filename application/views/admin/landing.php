<style>
    .article-image {
        border-radius: 2%;
        /* Makes the image circular */
        overflow: hidden;
        /* Ensures the image doesn't overflow the rounded corners */
    }

    .article {
        transition: transform 0.3s;
    }

    .article:hover {
        transform: scale(1.012);
    }

    .article-title h2 a {
        color: #ffffff;
        text-decoration: none;
    }

    .article-title h2 a:hover {
        color: #f8f9fa;
    }

    .article-details {
        padding: 20px;
        border-radius: 10px;
        background: linear-gradient(145deg, #1f1f1f, #566573);
        box-shadow: 3px 3px 6px #1a1a1a, -3px -3px 6px #2e2e2e;
        color: #ffffff;
    }

    .article-title h2 {
        margin-bottom: 10px;
    }

    .article p {
        color: #ffffff !important;
        margin: 0;

    }

    .article-header {
        position: relative;
    }

    .delete-button {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1;
    }
</style>

<div class="main-content bg-primary">
    <!-- Section for Landing Page Post -->
    <section class="section">
        <div class="section-header">
            <h1>LANDING PAGE POST</h1>
        </div>
        <div class="row">
            <!-- Toggle Button -->
            <div class="col-md-12 btn-group btn-group-toggle mb-2">
                <label class="btn btn-success active" id="btn-show-post">
                    <input type="radio" onclick="toggleSection('post')" name="options" id="option1" autocomplete="off"> Show Post
                </label>
                <label class="btn btn-success" id="btn-show-tutor">
                    <input type="radio" onclick="toggleSection('tutor')" name="options" id="option2" autocomplete="off"> Show Tutor
                </label>
                <label class="btn btn-success" id="btn-show-partners">
                    <input type="radio" onclick="toggleSection('partners')" name="options" id="option3" autocomplete="off">Show Partners
                </label><label class="btn btn-success" id="btn-show-info">
                    <input type="radio" onclick="toggleSection('info')" name="options" id="option4" autocomplete="off">Show Info
                </label>
            </div>
            <div class="col-md-12" id="post-section">
                <div class="card">
                    <div class="card-header">
                        <h4>ARTIKEL</h4>
                    </div>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success mx-4">
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($halaman as $artikel) { ?>
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image rounded-image" data-background="<?php echo $artikel['gambar'] ?>" style="background-image: url(&quot;<?php echo $artikel['gambar'] ?>&quot;);">
                                            </div>
                                        </div>
                                        <a href="<?php echo base_url("Admin/update_articel?id=" . $artikel['id']) ?>">
                                            <div class="article-details">
                                                <div class="article-title">
                                                    <h5><?php echo $artikel['judul'] ?></h5>
                                                </div>
                                                <p><?php echo $artikel['kutipan'] ?> </p>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display: none;" id="tutor-section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>GURU</h4>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url('Admin/add_tutor'); ?>'">Add Guru</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($tutors as $tutor) { ?>
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header position-relative">
                                            <div class="article-image rounded-image" data-background="<?php echo base_url('assets/gambar/' . $tutor['foto']) ?>" style="background-image: url(&quot;<?php echo base_url('assets/gambar/' . $tutor['foto']) ?>&quot;);">
                                            </div>
                                            <button class="btn btn-danger btn-sm delete-button" onclick="deletePost('<?php echo $tutor['id']; ?>','tutors')">Delete</button>
                                        </div>
                                        <a href="<?php echo base_url("Admin/update_tutor?id=" . $tutor['id']) ?>">
                                            <div class="article-details">
                                                <div class="article-title">
                                                    <h5><?php echo $tutor['nama'] ?></h5>
                                                </div>
                                                <p><?php echo str_replace('<p>', ' ', str_replace('</p>', ' ', $tutor['isi'])) ?> </p>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" style="display: none;" id="partners-section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>PARTNERS</h4>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo base_url('Admin/add_partner'); ?>'">Add Partners</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($partners as $partner) { ?>
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image rounded-image" data-background="<?php echo base_url('assets/gambar/' . $partner['foto']) ?>" style="background-image: url(&quot;<?php echo base_url('assets/gambar/' . $partner['foto']) ?>&quot;);">
                                            </div>
                                            <button class="btn btn-danger btn-sm delete-button" onclick="deletePost('<?php echo $partner['id']; ?>','partners')">Delete</button>
                                        </div>
                                        <a href="<?php echo base_url("Admin/update_partner?id=" . $partner['id']) ?>">
                                            <div class="article-details">
                                                <div class="article-title">
                                                    <h5><?php echo $partner['nama'] ?></h5>
                                                </div>
                                                <p><?php echo str_replace('<p>', ' ', str_replace('</p>', ' ', $partner['isi'])) ?> </p>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display: none;" id="info-section">
                <div class="card">
                    <div class="card-header">
                        <h4>INFORMATION</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($information as $info) { ?>
                                <div class="col-12 col-md-4 col-lg-4 mb-4">
                                    <article class="article article-style-c">
                                        <a href="<?php echo base_url("Admin/update_info?id=" . $info['id']) ?>">
                                            <div class="article-details">
                                                <div class="article-title">
                                                    <h5> <?php echo $info['judul'] ?> </h5>
                                                </div>
                                                <p><?php echo str_replace('<p>', ' ', str_replace('</p>', ' ', $info['isi'])) ?></p>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function toggleSection(section) {
        var postSection = document.getElementById('post-section');
        var tutorSection = document.getElementById('tutor-section');
        var partnersSection = document.getElementById('partners-section');
        var infoSection = document.getElementById('info-section');
        var btnShowPost = document.getElementById('btn-show-post');
        var btnShowTutor = document.getElementById('btn-show-tutor');
        var btnShowPartners = document.getElementById('btn-show-partners');
        var btnShowInfo = document.getElementById('btn-show-info');

        postSection.style.display = 'none';
        tutorSection.style.display = 'none';
        partnersSection.style.display = 'none';
        infoSection.style.display = 'none';
        btnShowPost.classList.remove('active');
        btnShowTutor.classList.remove('active');
        btnShowPartners.classList.remove('active');
        btnShowInfo.classList.remove('active');

        if (section === 'post') {
            postSection.style.display = 'block';
            btnShowPost.classList.add('active');
        } else if (section === 'tutor') {
            tutorSection.style.display = 'block';
            btnShowTutor.classList.add('active');
        } else if (section === 'partners') {
            partnersSection.style.display = 'block';
            btnShowPartners.classList.add('active');
        } else if (section === 'info') {
            infoSection.style.display = 'block';
            btnShowInfo.classList.add('active');
        }
    }

    function deletePost(tutorId, table) {
        if (confirm("Are you sure you want to delete this post?")) {
            // Buat permintaan AJAX untuk menghapus tutor
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo base_url('Admin/delete_post'); ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("Tutor deleted successfully.");
                        // Anda bisa melakukan refresh atau menghapus elemen yang bersangkutan dari DOM
                        location.reload();

                    } else {
                        alert("An error occurred while deleting the tutor.");
                    }
                }
            };
            xhr.send("id=" + tutorId + "&table=" + table);
        }
    }
</script>