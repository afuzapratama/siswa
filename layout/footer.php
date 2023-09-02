<footer class="fixed-bottom bg-success">
    <div class="row">
        <div class="col-3">
        <script language="JavaScript" type="text/javascript">
TrustLogo("https://siswa.life/assets/img/positivessl_trust.png", "CL1", "none");
</script>
<a  href="https://www.positivessl.com/" id="comodoTL" style="text-decoration: none; color:white;">Positive SSL Wildcard</a>
        </div>
        <div class="col-6">
        <div class="container text-center">
        <span class="text-light">Made with <i class="text-danger">♥</i></span>
    </div>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});
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