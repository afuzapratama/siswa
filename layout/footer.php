<footer class="fixed-bottom bg-success">
    <div class="container text-center">
        <span class="text-light">Made with <i class="text-danger">♥</i> <a class="text-decoration-none text-light" href="https://afuza.dev">afuza.dev</a></span>
    </div>
</footer>

<!-- Include Bootstrap JS (Popper.js is required) -->
<script>
    $(document).ready(function() {
        $(".nav-link-dropdown").on("click", function() {
            $(".nav-link-dropdown").removeClass("highlighted");
            $(this).addClass("highlighted");
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".navbar-toggler").click(function() {
            $(".navbar-toggler-icon").toggleClass("collapsed");
            $("#menu-icon").toggleClass("menu-opened");

            var menuOpened = $("#menu-icon").hasClass("menu-opened");
            if (menuOpened) {
                $("#menu-icon").attr("data-feather", "x");
                $("#btn-menu").text(" tutup");
            } else {
                $("#menu-icon").attr("data-feather", "menu");
                $("#btn-menu").text(" menu");
            }

            feather.replace(); // Reapply Feather Icons styling
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<!-- Include Bootstrap Datepicker JS -->
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js"></script>
<script>
    feather.replace()
</script>
<script>
    // Initialize the datepicker
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5'
    });
</script>
<?php
if ($curretPage == 'makeThread.php') {
?>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/xml/xml.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.2.7/purify.min.js"></script>

    <script type="text/javascript" src="../assets/js/froala_editor.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/align.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/char_counter.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/code_view.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/colors.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/draggable.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/emoticons.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/entities.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/file.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/fullscreen.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/image.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/image_manager.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/line_breaker.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/inline_style.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/link.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/lists.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/paragraph_format.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/paragraph_style.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/quick_insert.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/quote.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/table.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/save.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/url.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/video.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/help.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/print.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/special_characters.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/word_paste.min.js"></script>
    <script>
        (function() {
            new FroalaEditor("#edit", {
                spellcheck: false,
                heightMin: 100,
                heightMax: 300
            });
        })()
    </script>
<?php
}
?>

<script>
        $(document).ready(function() {
            $("#logoutButton").click(function() {
                // Mengirim permintaan logout ke server
                $.ajax({
                    url: "../function/logout.php", // Ganti dengan URL yang sesuai
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            alert(response.message);
                            window.location.reload(); // Refresh halaman setelah logout sukses
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert("Terjadi kesalahan saat melakukan logout.");
                    }
                });
            });
        });
</script>


</body>

</html>