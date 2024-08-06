<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>LANDING PAGE POST</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Info</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="<?php echo base_url('admin/updateInfo'); ?>" method="post" enctype="multipart/form-data">
                                <input type="text" id="id" name="id" value='<?php echo $info[0]['id'] ?>' hidden>
                                <div class="form-group">
                                    <label for="title">Judul Info</label>
                                    <input type="text" class="form-control" id="title" name="judul" placeholder="Masukkan judul artikel" required value='<?php echo $info[0]['judul'] ?>'>
                                </div>
                                <div class="form-group">
                                    <label for="content">Detail</label>
                                    <textarea class="form-control" id="content" name="isi" rows="5" placeholder="Masukkan konten artikel" required><?php echo $info[0]['isi'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    CKEDITOR.replace('content', {
        versionCheck: false
    });
</script>