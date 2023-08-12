<?php
include '../layout/header.php';
?>
<div class="container">
    <form id="newthread">
        <div class="col-12 mt-3">
            <div class="mb-3">
                <input type="text" class="form-control form-control-sm" placeholder="Title">
            </div>
            <div class="mb-3">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                    <option selected>Pilih Topik</option>
                    <option value="1">Diskusi</option>
                    <option value="2">Pertanyaan</option>
                    <option value="3">Bug(error)</option>
                </select>
            </div>
            <div id='edit' style="margin-top: 30px;">
            </div>
            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-primary btn-sm">Buat Theard</button>
            </div>
        </div>
    </form>
</div>
<?php
include '../layout/footer.php';
?>