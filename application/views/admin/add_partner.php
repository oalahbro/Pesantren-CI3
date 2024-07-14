<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>LANDING PAGE POST</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Partner</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="<?php echo base_url('admin/addPartner'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="title">Nama Partner</label>
                                    <input type="text" class="form-control" id="title" name="nama" placeholder="Masukkan nama partner" required>
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
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('currentImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>