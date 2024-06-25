<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>LANDING PAGE POST</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>POST</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($halaman as $artikel) {

                            ?>
                                <div class="col-12 col-md-4 col-lg-4">
                                    <article class="article article-style-c">
                                        <div class="article-header">
                                            <div class="article-image" data-background="<?php echo  $artikel['gambar'] ?>" style="background-image: url(&quot;assets/img/news/img13.jpg&quot;);">
                                            </div>
                                        </div>
                                        <div class="article-details">
                                            <div class="article-category"><a href="#">Post</a>
                                                <div class="bullet"></div> <a href="#">5 Days</a>
                                            </div>
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
        </div>
    </section>
</div>
<script>
    CKEDITOR.replace('content');
</script>