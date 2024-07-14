<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>LANDING PAGE POST</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="<?php echo base_url('admin/addTutor'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="title">Nama Guru</label>
                                    <input type="text" class="form-control" id="title" name="nama" placeholder="Masukkan nama tutor" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Profile Guru</label>
                                    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Masukkan konten artikel" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" id="imageUpload" name="foto" class="form-control" onchange="previewImage(event)">
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                    <img id="currentImage" style="max-width: 200px;" src="<?php echo base_url('assets/gambar/noimage.jpg') ?>" alt="Current Image" class="img-responsive">
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

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('currentImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>