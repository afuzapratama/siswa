<?php
include '../layout/header.php';
?>
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 col-lg-5 offset-md-2 mx-auto mb-5">
            <div class="card">
                <div class="card-body">
                    <form id="wizardForm" enctype="multipart/form-data">
                        <div class="mb-3 step">
                            <h3>Tahap 1</h3>
                            <p>Foto Terbaik Kamu</p>
                            <hr>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="file-input text-center">
                                            <label for="file" class="d-block">
                                                <i class="feather-32" data-feather="camera"></i>
                                                <p>Upload Foto</p>
                                            </label>
                                            <input type="file" id="file" accept="image/*" class="d-none">
                                            <div class="image-preview mt-3">
                                                <img id="preview-image" src="#" alt="Preview" class="img-fluid d-none">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 step">
                            <h3>Tahap 2</h3>
                            <p>Data Diri Kamu</p>
                            <hr>
                            <div id="alert-data-2"></div>
                            <div class="mb-3">
                                <label for="sekolah" class="form-label fw-bold">Sekolah</label>
                                <input type="text" class="form-control" id="Sekolah" name="Sekolah" value="Sekolah" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="sekolah" class="form-label fw-bold">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="kelas" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="sekolah" class="form-label fw-bold">Nama Lengkap *</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="sekolah" class="form-label fw-bold">Tanggal Lahir *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="datepicker" placeholder="Select a date" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 step">
                            <h3>Tahap 3</h3>
                            <p>Alamat Rumah Kamu</p>
                            <hr>
                            <div id="alert-data-3"></div>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat"></textarea>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="" id="check">
                                <label class="form-check-label" for="defaultCheck1">
                                    Semua Data Sudah benar
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary" id="prevBtn">Previous</button>
                            <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        const form = $('#wizardForm');
        const steps = form.find('.step');
        const prevBtn = $('#prevBtn');
        const nextBtn = $('#nextBtn');
        let currentStep = 0;

        function showStep(stepIndex) {
            steps.hide();
            $(steps[stepIndex]).show();
            currentStep = stepIndex;

            prevBtn.prop('disabled', currentStep === 0);

            if (currentStep === steps.length - 1) {
                nextBtn.text('Submit');
            } else {
                nextBtn.text('Next');
            }
        }

        prevBtn.click(function() {
            showStep(currentStep - 1);
        });

        nextBtn.click(function() {
            if (currentStep === 1) { // Step 2
                if (validateStep2()) {
                    showStep(currentStep + 1);
                } else {
                    // Show an error message or highlight the fields that need attention
                    $('#alert-data-2').html(
                        '<div class="alert alert-danger" role="alert">Data Tidak Boleh Kosong</div>');
                }
            } else if (currentStep === 2) { // Step 3
                if (validateStep3()) {
                    form.submit();
                } else {
                    $('#alert-data-3').html(
                        '<div class="alert alert-danger" role="alert">Silahkah klik check box jika sudah benar</div>'
                    );
                }
            } else if (currentStep === steps.length - 1) {
                form.submit();
            } else {
                showStep(currentStep + 1);
            }
        });

        showStep(currentStep); // Show the initial step

        function validateStep2() {
            const namaInput = $('#nama');
            const datepickerInput = $('#datepicker');
            const isValid = namaInput.val().trim() !== '' && datepickerInput.val().trim() !== '';
            return isValid;
        }

        function validateStep3() {
            const checkBox = $('#check');
            return checkBox.prop('checked');
        }

        form.submit(function(envent) {
            envent.preventDefault();

            nextBtn.prop('disabled', true);
            nextBtn.html(
                "<span class='spinner-border spinner-border-sm text-wrap' role='status' aria-hidden='true'></span> Loading..."
            );
            prevBtn.prop('disabled', true);

            var formData = new FormData(this);

            $.ajax({
                url: '../function/submitData.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    // Handle the response here
                    if (data === 'success') {
                        $('#alert-data-3').html(
                            '<div class="alert alert-success" role="alert">Data Berhasil Di Simpan</div>'
                        );
                        setInterval(function() {
                            window.location.href = 'index.php';
                        }, 3000);
                    } else {
                        $('#alert-data-3').html(
                            '<div class="alert alert-danger" role="alert">Data Gagal Di Simpan</div>'
                        );
                        nextBtn.prop('disabled', false);
                        nextBtn.text('submit');
                        prevBtn.prop('disabled', false);
                    }
                }
            });
        });

    });


    $(document).ready(function() {
        const fileInput = $('#file');
        const previewImage = $('#preview-image');
        let previousFile = null;

        fileInput.on('change', function() {
            const file = fileInput[0].files[0];

            if (file && file !== previousFile) {
                previousFile = file;

                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.attr('src', e.target.result);
                    previewImage.removeClass('d-none');
                }

                reader.readAsDataURL(file);
            }
        });
    });
</script>
<?php
include '../layout/footer.php';
?>