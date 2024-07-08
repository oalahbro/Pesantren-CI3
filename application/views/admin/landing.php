<style>
    .article-image {
        border-radius: 2%;
        /* Makes the image circular */
        overflow: hidden;
        /* Ensures the image doesn't overflow the rounded corners */
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
            <div class="col-md-12 btn-group btn-group-toggle">
                <label class="btn btn-success active" id="btn-show-post">
                    <input type="radio" onclick="toggleSection('post')" name="options" id="option1" autocomplete="off"> Show Post
                </label>
                <label class="btn btn-success" id="btn-show-tutor">
                    <input type="radio" onclick="toggleSection('tutor')" name="options" id="option2" autocomplete="off"> Show Tutor
                </label>
                <label class="btn btn-success" id="btn-show-partners">
                    <input type="radio" onclick="toggleSection('partners')" name="options" id="option3" autocomplete="off">Show Partners
                </label>
            </div>
            <div class="col-md-12" id="post-section">
                <div class="card">
                    <div class="card-header">
                        <h4>ARTIKEL</h4>
                    </div>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success">
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
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h2><a href="<?php echo base_url("Admin/update_articel?id=" . $artikel['id']) ?>"><?php echo $artikel['judul'] ?></a></h2>
                                            </div>
                                            <p><?php echo $artikel['kutipan'] ?> </p>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display: none;" id="tutor-section">
                <div class="card">
                    <div class="card-header">
                        <h4>GURU</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($tutors as $tutor) { ?>
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image rounded-image" data-background="<?php echo base_url('assets/gambar/' . $tutor['foto']) ?>" style="background-image: url(&quot;<?php echo base_url('assets/gambar/' . $tutor['foto']) ?>&quot;);">
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h2><a href="<?php echo base_url("Admin/update_tutor?id=" . $tutor['id']) ?>"><?php echo $tutor['nama'] ?></a></h2>
                                            </div>
                                            <p><?php echo str_replace('<p>', ' ', str_replace('</p>', ' ', $tutor['isi'])) ?> </p>
                                        </div>
                                    </article>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="display: none;" id="partners-section">
                <div class="card">
                    <div class="card-header">
                        <h4>PARTNERS</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($partners as $partner) { ?>
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image rounded-image" data-background="<?php echo base_url('assets/gambar/' . $partner['foto']) ?>" style="background-image: url(&quot;<?php echo base_url('assets/gambar/' . $partner['foto']) ?>&quot;);">
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-title">
                                                <h2><a href="<?php echo base_url("Admin/update_partner?id=" . $partner['id']) ?>"><?php echo $partner['nama'] ?></a></h2>
                                            </div>
                                            <p><?php echo str_replace('<p>', ' ', str_replace('</p>', ' ', $partner['isi'])) ?> </p>
                                        </div>
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
        var btnShowPost = document.getElementById('btn-show-post');
        var btnShowTutor = document.getElementById('btn-show-tutor');
        var btnShowPartners = document.getElementById('btn-show-partners');

        postSection.style.display = 'none';
        tutorSection.style.display = 'none';
        partnersSection.style.display = 'none';
        btnShowPost.classList.remove('active');
        btnShowTutor.classList.remove('active');
        btnShowPartners.classList.remove('active');

        if (section === 'post') {
            postSection.style.display = 'block';
            btnShowPost.classList.add('active');
        } else if (section === 'tutor') {
            tutorSection.style.display = 'block';
            btnShowTutor.classList.add('active');
        } else if (section === 'partners') {
            partnersSection.style.display = 'block';
            btnShowPartners.classList.add('active');
        }
    }
</script>