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
                        <div class="form-group">
                            <form action="<?php echo base_url('admin/update_article'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Judul Artikel</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul artikel" required value='<?php echo $halaman[0]['judul'] ?>'>
                                </div>
                                <div class="form-group">
                                    <label for="content">Konten Artikel</label>
                                    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Masukkan konten artikel" required><?php echo $halaman[0]['isi'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" id="imageUpload" class="form-control">
                                </div>
                                <div class="form-group" style="margin-top: 20px;">
                                    <img id="currentImage" src="<?php echo $halaman[0]['gambar'] ?>" alt="Current Image" class="img-responsive" hidden>
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
    CKEDITOR.replace('content');
    $(document).ready(function() {
        $('#imageUpload').on('change', function() {
            var fileInput = $('#imageUpload')[0];
            var currentImage = document.getElementById('currentImage');
            if (fileInput.files.length === 0) {
                alert('Please select a file to upload.');
                return;
            }

            var formData = new FormData();
            formData.append('file', fileInput.files[0]);

            $.ajax({
                url: '<?php echo base_url('admin/imageUp?id=') . $halaman[0]['gambar'] ?>', // Replace with your server upload endpoint
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.success) {
                        // Assuming the server returns the new image URL
                        // $('#currentImage').attr('src', response.newImageUrl);
                        currentImage.src = response.newImagePath;
                        console.log(response)
                    } else {
                        alert('Image upload failed.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('An error occurred while uploading the image.');
                }
            });
        });
    });
</script>