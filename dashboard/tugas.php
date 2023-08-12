<?php
include '../layout/header.php';
?>
<div class="container mb-3">
    <div class="text-center">
        <h1>Tugas</h1>
        <p class="lead">Tugas yang diberikan oleh guru</p>
    </div>
    <div class="col-12 mb-3">
        <div class="card text-center text-uppercase">
            <div class="card-body">
                <p class="text-center text-lowercase">File di upload dalam bentuk pdf, Kamu mengejerkan file yang di
                    upload untuk
                    tutorial perhatikan guru kamu saat menjelasakan.</p>
                <input type="file" class="form-control mb-3" id="file" name="file" required>
                <input type="text" class="form-control mb-3" id="judul" name="judul" placeholder="kode Tugas" required>
                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="accordion mb-3" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Tugas Baru<span class="badge bg-danger">2</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table id="tableOne" class="table table-striped table-fixed-header dt-responsive wrap" style="width:100%">
                                <thead>
                                    <tr style="font-size:small">
                                        <th>Kode Tugas</th>
                                        <th>Status</th>
                                        <th>Judul Tugas</th>
                                        <th>Tgl Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><span class="badge bg-info">TGS-001</span></th>
                                        <td><span class="badge bg-danger">Belum Dikerjakan</span></td>
                                        <td><span class="badge text-dark">UTS</span></td>
                                        <td>23/11/2021</td>
                                        <td><a href="../online-test/index.php" class="btn btn-primary btn-sm">Kerjakan</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span class="badge bg-info">TGS-001</span></th>
                                        <td><span class="badge bg-danger">Belum Dikerjakan</span></td>
                                        <td><span class="badge text-dark">Kerjakan Terulis Tetang komputer</span></td>
                                        <td>23/11/2021</td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Download</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion mb-3" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Tugas Terlewat<span class="badge bg-warning">2</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table id="tableTwo" class="table table-striped table-border" style="width:100%">
                                <thead>
                                    <tr style="font-size:small">
                                        <th>Kode Tugas</th>
                                        <th>Status</th>
                                        <th>Judul Tugas</th>
                                        <th>Tgl Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><span class="badge bg-info">TGS-001</span></th>
                                        <td><span class="badge bg-danger">Belum Dikerjakan</span></td>
                                        <td><span class="badge text-dark">UTS</span></td>
                                        <td>23/11/2021</td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Kerjakan</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span class="badge bg-info">TGS-001</span></th>
                                        <td><span class="badge bg-danger">Belum Dikerjakan</span></td>
                                        <td><span class="badge text-dark">Kerjakan Terulis Tetang komputer</span></td>
                                        <td>23/11/2021</td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Download</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more accordion items here -->
        </div>
        <div class="accordion mb-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Tugas Selesai<span class="badge bg-success">2</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table id="tableThree" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr style="font-size:small">
                                        <th>Kode Tugas</th>
                                        <th>Status</th>
                                        <th>Judul Tugas</th>
                                        <th>Tgl Akhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><span class="badge bg-info">TGS-001</span></th>
                                        <td><span class="badge bg-danger">Belum Dikerjakan</span></td>
                                        <td><span class="badge text-dark">UTS</span></td>
                                        <td>23/11/2021</td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Kerjakan</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><span class="badge bg-info">TGS-001</span></th>
                                        <td><span class="badge bg-danger">Belum Dikerjakan</span></td>
                                        <td><span class="badge text-dark">Kerjakan Terulis Tetang komputer</span></td>
                                        <td>23/11/2021</td>
                                        <td><a href="#" class="btn btn-primary btn-sm">Download</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add more accordion items here -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tableOne').DataTable({
                "lengthChange": false,
                "searching": false,
                "paging": false,
                "info": false
            });
            $('#tableTwo').DataTable({
                "lengthChange": false,
                "searching": false,
                "paging": false,
                "info": false
            });
            $('#tableThree').DataTable({
                "lengthChange": false,
                "searching": false,
                "paging": false,
                "info": false
            });
        });
    </script>
    <?php
    include '../layout/footer.php';
    ?>