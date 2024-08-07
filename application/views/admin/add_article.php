<div class="main-content bg-primary">
    <section class="section">
        <div class="section-header">
            <h1>LANDING PAGE POST</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Artikel</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form action="<?php echo base_url('admin/addArticle'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" id="title" name="judul" placeholder="Masukkan judul" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Kutipan</label>
                                    <input type="text" class="form-control" id="kutipan" name="kutipan" placeholder="Masukkan kutipan" required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Konten</label>
                                    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Masukkan konten artikel" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <p>Your URL is: <span id="url"></span></p>
                                    <div class="btn btn-primary copy" onclick="copyContent()">Copy URL</div>
                                    <input type="file" id="imageUpload" class="form-control">
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
                url: '<?php echo base_url('admin/imageUp?') ?>', // Replace with your server upload endpoint
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.success) {
                        currentImage.src = response.newImagePath;
                        $('#url').html('<i>' + response.newImagePath + '</i>');
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

    // Get the text field
    function copyContent() {

        /* Select text area by id*/
        var text = document.getElementById("url").textContent;
        navigator.clipboard.writeText(text);
        alert('URL copied to clipboard: ' + text);
    }
</script>