</div>

<div id="contact">
    <div class="wrapper">
        <div class="footer">
            <div class="footer-section">
                <h3><?php echo $footer[0]['judul'] ?></h3>
                <?php echo $footer[0]['isi'] ?>
            </div>
            <div class="footer-section">
                <h3><?php echo $footer[1]['judul'] ?></h3>
                <?php echo $footer[1]['isi'] ?>
            </div>
            <div class="footer-section">
                <h3><?php echo $footer[2]['judul'] ?></h3>
                <?php echo $footer[2]['isi'] ?>
            </div>
            <div class="footer-section">
                <h3><?php echo $footer[3]['judul'] ?></h3>
                <?php echo $footer[3]['isi'] ?>
            </div>
        </div>
    </div>
</div>

<div id="copyright">
    <div class="wrapper">
        &copy; 2016. <b>Wahdi Center</b> Hak Cipta.
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
</body>

</html>