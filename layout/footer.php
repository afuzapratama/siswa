<footer class="fixed-bottom bg-success">
    <div class="container text-center">
        <span class="text-light">Made with <i class="text-danger">♥</i> <a class="text-decoration-none text-light"
                href="https://afuza.dev">afuza.dev</a></span>
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
</body>

</html>