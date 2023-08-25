<?php
include '../layout/header.php';
?>
<div class="container">
    <div class="text-center mt-3">
        <h1>STUDENT REGISTER</h1>
    </div>
    <div class="col-sm-12 col-lg-4 mx-auto">
        <hr>
        <div id="alert-register"></div>
        <div class="form-input">
            <div class="mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode">
            </div>
            <div class="mb-3">
                <button type="submit" id="register" class="btn btn-primary w-100 fw-bold">Register</button>
            </div>
            <div class="mb-2">
                <a href="../index.php" class="text-decoration-none">Back To Home</a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#register').click(function() {
        var registerButton = $('#register');
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var kode = $('#kode').val();
        var alertRegister = $('#alert-register'); // Store the alert container for easier access

        registerButton.html(
            "<span class='spinner-border spinner-border-sm text-wrap' role='status' aria-hidden='true'></span> Loading..."
        );
        registerButton.prop("disabled", true);

        if (username === "" || email === "" || password === "" || kode === "") {
            displayError("Semua field harus diisi.");
        } else if (!isValidEmail(email)) {
            displayError("Format email tidak valid.");
        } else {
            $.ajax({
                url: "../function/register.php",
                method: "POST",
                data: {
                    username: username,
                    email: email,
                    password: password,
                    kode: kode
                },
                success: function(data) {
                    try {
                        var jsonData = data;
                        if (jsonData.status === "success") {
                            $('#form-input').hide();
                        }
                        displayMessage(jsonData.status, jsonData.message, jsonData.alert);
                    } catch (error) {
                        displayError("Error parsing JSON response.");
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    displayError("Error: " + errorThrown);
                },
                complete: function() {
                    registerButton.prop("disabled", false);
                    registerButton.html("Register");
                }
            });
        }

        function displayError(message) {
            alertRegister.html("<div class='alert alert-danger text-center'>" + message + "</div>");
            $('#register').prop("disabled", false).html("Register");
        }

        function displayMessage(status, message, alertClass) {
            alertRegister.html("<div class='alert " + alertClass + " text-center'>" + message + "</div>");
            if (status === "success") {
                $('#username, #email, #password, #kode').prop('disabled', false);
            } else {
                $('#form-input').show();
            }
        }

    });

    // Function to check valid email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
</script>

<?php
include '../layout/footer.php';
?>