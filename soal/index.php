<?php
include '../layout/header.php';
?>
<div class="container mt-3 mb-5">
    <div class="col-12 mt-4">
        <div class="card online-test-soal">
            <div class="card-body">
                <h6 class="fw-bold">Perangkat keras yang berfungsi sebagai otak komputer adalah...</h6>
                <form class="mt-3">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answer" id="answer1" value="A">
                        <label class="form-check-label" for="answer1">
                            A. CPU (Central Processing Unit)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answer" id="answer2" value="B">
                        <label class="form-check-label" for="answer2">
                            B. GPU (Graphics Processing Unit)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answer" id="answer3" value="C">
                        <label class="form-check-label" for="answer3">
                            C. RAM (Random Access Memory)
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="answer" id="answer4" value="D">
                        <label class="form-check-label" for="answer4">
                            D. HDD (Hard Disk Drive)
                        </label>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-white">
                <a href="../soal/selesai.php" class="btn btn-primary float-end">Next</a>
            </div>
        </div>
    </div>
</div>
<?php
include '../layout/footer.php';
?>