<?php
include '../layout/header.php';
?>
<div class="container">
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-header bg-success text-center text-white">
                <h5 class="fw-bold">Daftar Materi</h5>
            </div>
            <div class="card-body">
                <table id="materiTabel"
                    class="table table-striped table-bordered table-fixed-header dt-responsive wrap text-center"
                    style="width: 100%;" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center header-materi">Materi</th>
                            <th class="text-center header-materi">Jenis File</th>
                            <th class="text-center header-materi">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="judul-materi">Algoritma</span></td>
                            <td><span class="badge bg-info">PDF</span></td>
                            <td><a href="#" class="badge bg-success text-decoration-none">Download</a></td>
                        </tr>
                        <tr>
                            <td><span class="judul-materi">Desain web Dasar</span></td>
                            <td><span class="badge bg-info">PPT</span></td>
                            <td><a href="#" class="badge bg-success text-decoration-none">Download</a></td>
                        </tr>
                        <tr>
                            <td><span class="judul-materi">Mengistall Sistem Oprasi Ubuntu 22.04</span></td>
                            <td><span class="badge bg-info">PPT</span></td>
                            <td><a href="#" class="badge bg-success text-decoration-none">Download</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$.fn.dataTable.ext.errMode = 'none';
$(document).ready(function() {
    $("#materiTabel").DataTable({
        lengthChange: false,
        pageLength: 4,
        searching: true,
        pagingType: 'simple',
        scrollX: true,
        ordering: false,
    });
});
</script>
<?php
include '../layout/footer.php';
?>