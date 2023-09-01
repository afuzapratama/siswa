<?php
include 'layout/header.php';
?>

<div class="container">
    <div class="text-center mt-5">
        <h1>STUDENT LEARNING</h1>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <div class="col text-center">
            <a type="button" class="btn btn-light fw-bold" data-bs-toggle="modal" data-bs-target="#modal-login">Login</a>
            <a href="register/index.php" class="btn btn-primary fw-bold">Register</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-sm-12 col-lg-5 mt-5 mx-auto">
        <div class="helo">
            <h5 class="card-title ">Halo...</h5>
            <div class="">
                Setelah Anda sampai di halaman ini, Anda sudah memiliki hubungan yang akrab dengan guru Anda.
                Sekarang, jika Anda ingin menjalin kedekatan yang lebih erat, kunjungilah halaman berikutnya untuk
                memulai perjalanan belajar bersama sang mentor tercinta.
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade in" id="modal-login" data-bs-keyboard="false" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">STUDENT LOGIN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="alert-login"></div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" autocomplete="true">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="********">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="" id="remember">
                        <span class="form-check-label">
                            Remember me
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="login" class="btn btn-primary">Login</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#login').click(function() {
            var loginButton = $('#login');
            var username = $('#username').val();
            var password = $('#password').val();
            var remember = $('#remember').prop('checked'); 
            var alertLogin = $('#alert-login');

            if (remember == true) {
                remember = 1;
            } else {
                remember = 0;
            }

            //spiner
            loginButton.html(
                "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading..."
            );
            loginButton.prop('disabled', true);

            if (username != '' && password != '') {
                $.ajax({
                    url: "function/login.php",
                    method: "POST",
                    data: {
                        username: username,
                        password: password,
                        savelogin: remember
                    },
                    success: function(data) {
                        
                        if (data.status === "setup") {
                            // Arahkan pengguna ke halaman setup
                            window.location.href = "/dashboard/setup-wizard.php";

                        } else if (data.status === "dashboard") {
                            // Arahkan pengguna ke halaman dashboard
                            window.location.href = "/dashboard/index.php";
                        } else {
                            alertLogin.html(
                                "<div class='alert alert-danger text-center'>" +
                                data.message + "</div>"
                            );
                            loginButton.html('Login');
                        }
                    },
                    error: function(xhr, texStatus, errorThrown) {
                        alertLogin.html(
                            "<div class='alert alert-danger text-center'>Error: " +
                            errorThrown + "</div>"
                        );
                    },
                    complete: function(data) {
                        loginButton.html('Login');
                        loginButton.prop('disabled', false);
                    }
                });
            } else {
                alertLogin.html(
                    "<div class='alert alert-danger text-center'>isi semua data</div>"
                );
                loginButton.html('Login');
                loginButton.prop('disabled', false);
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYXN0g5QHOjwm8ROCNHqMaokfRkogYyXI&callback=getLocation" async defer></script>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;

                var geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(lat, lng);

                geocoder.geocode({'latLng': latlng}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#alamat').text('Alamat: ' + results[0].formatted_address);
                        } else {
                            $('#alamat').text('Alamat tidak ditemukan');
                        }
                    } else {
                        $('#alamat').text('Gagal mendapatkan alamat');
                    }
                });
            }, function(error) {
                $('#alamat').text('Lokasi tidak tersedia: ' + error.message);
            });
        } else {
            $('#alamat').text('Geolokasi tidak didukung di browser Anda');
        }
    }
</script>
<script>
    $(document).ready(function() {
        function alignModal() {
            var modalDialog = $(this).find(".modal-dialog");

            // Applying the top margin on modal to align it vertically center
            modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
        }
        // Align modal when it is displayed
        $(".modal").on("shown.bs.modal", alignModal);

        // Align modal when user resize the window
        $(window).on("resize", function() {
            $(".modal:visible").each(alignModal);
        });
    });
</script>
<?php
include 'layout/footer.php';
?>