<?php
include '../layout/header.php';
?>
<div class="container">
    <div class="col-12 mt-3 mb-5">
        <a href="makeThread.php" type="button" class="btn btn-success btn-sm">
            <i data-feather="plus"></i>
            Buat Thread
        </a>
        <div class="resvonsive mt-2">
            <table id="komunitas" class="table table-bordered table-hover table-fixed-header dt-responsive wrap"
                style="width: 100%;" cellspacing="0">
                <thead>
                    <tr>
                        <th class="header-materi text-center bg-secondary text-light"
                            style="height: 40px; font-size:27px">Threads
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a class="text-decoration-none" href="issues.php">
                                <div class="judul-thread">
                                    <span class="text-dark">Solusi Tidak bisa menginstall software di ubuntu
                                        22.04.</span>
                                    <span class="badge bg-danger text-decoration-none">Bug(error)</span>
                                    <span class="badge bg-light text-decoration-none text-muted"> <i
                                            data-feather="message-square"></i>
                                        2</span>
                                    <span class="badge bg-info text-decoration-none text-light"> Solved</span>
                                </div>
                                <div class="day-created text-muted">
                                    #1141 Di buat 1 hari yang lalu oleh yudah0122
                                </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="judul-thread">
                                cara mengistall sistem oprasi ubuntu 22.04?
                                <span class="badge bg-success text-decoration-none">Diskusi</span>
                                <span class="badge bg-info text-decoration-none text-light"> Solved</span>
                            </div>
                            <div class="day-created text-muted">
                                #1141 Di buat 1 hari yang lalu oleh fitra0210
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="judul-thread">
                                Aplikasi error saat di jalankan ?
                                <span class="badge text-bg-warning">Pertanyaan</span>
                                <span class="badge bg-light text-decoration-none text-muted"> <i
                                        data-feather="message-square"></i>
                                    2</span>
                            </div>
                            <div class="day-created text-muted">
                                #1141 Di buat 1 hari yang lalu oleh yudah0122
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="judul-thread">
                                Solusi Tidak bisa menginstall software di ubuntu 22.04.
                                <span class="badge bg-danger text-decoration-none">bug(error)</span>
                                <span class="badge bg-light text-decoration-none text-muted"> <i
                                        data-feather="message-square"></i>
                                    7</span>
                            </div>
                            <div class="day-created text-muted">
                                #1141 Di buat 1 hari yang lalu oleh yudah0122
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="judul-thread">
                                Aplikasi error saat di jalankan ?
                                <span class="badge text-bg-warning">Pertanyaan</span>
                            </div>
                            <div class="day-created text-muted">
                                #1141 Di buat 1 hari yang lalu oleh yudah0122
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade in" id="modal-theard" data-bs-keyboard="false" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Thread</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="login" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    $.fn.dataTable.ext.errMode = 'none';
    $(document).ready(function() {
        $("#komunitas").DataTable({
            lengthChange: false,
            pageLength: 4,
            searching: true,
            pagingType: 'simple',
            scrollX: true,
            ordering: false,
            info: false,
        });
    });
    </script>
    <?php
    include '../layout/footer.php';
    ?>