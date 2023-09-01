<?php
include '../layout/header.php';
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-header bg-success text-center text-white fw-bold">
                    <h5>Daftar Materi</h5>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12 mb-4">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari materi...">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                            <div class="custom-card">
                                <img src="/assets/img/thumbnail/pdf.png" alt="Thumbnail">
                                <h5 class="card-title">Algoritma</h5>
                                <p class="card-text"><span class="badge bg-info">PDF</span></p>
                                <a href="#" class="badge bg-success text-decoration-none">Download</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                            <div class="custom-card">
                                <img src="/assets/img/thumbnail/pdf.png" alt="Thumbnail">
                                <h5 class="card-title">Desain Web Dasar</h5>
                                <p class="card-text"><span class="badge bg-info">PPT</span></p>
                                <a href="#" class="badge bg-success text-decoration-none">Download</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                            <div class="custom-card">
                                <img src="/assets/img/thumbnail/ppt.png" alt="Thumbnail">
                                <h5 class="card-title">Menginstall Sistem Operasi Ubuntu 22.04</h5>
                                <p class="card-text"><span class="badge bg-info">PPT</span></p>
                                <a href="#" class="badge bg-success text-decoration-none">Download</a>
                            </div>
                        </div>
                        <!-- Add more card elements as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".custom-card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<?php
include '../layout/footer.php';
?>