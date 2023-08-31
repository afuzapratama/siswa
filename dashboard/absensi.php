<?php
include '../layout/header.php';

?>

<div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>Scan ABSEN</h1>
        <img class="qrAbsen"  alt="QR Code" />
      </div>
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="row">
            <div class="col-6">Nama :</div>
            <div class="col-6"><?= $_SESSION['username']?></div>
        </div>
      </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $.ajax({
        url: '../function/datasiswa.php', // Sesuaikan dengan path ke data-siswa.php
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('.qrAbsen').attr('src', data.qrUrl); // Ganti URL gambar QR
            $('#namaSiswa').text(data.nama); // Ganti teks nama
        },
        error: function() {
            alert('Error while fetching data.');
        }
    });
});
</script>

<?php
include '../layout/footer.php';
?>