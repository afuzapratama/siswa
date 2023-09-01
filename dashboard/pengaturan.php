<?php
include '../layout/header.php';
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-center text-white fw-bold">
                    <h5>Change Password</h5>
                </div>
                <div class="card-body">
                    <form id="changePasswordForm">
                        <div class="form-group mb-3">
                            <label for="oldPassword">Old Password</label>
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="newPassword">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                            <small id="newPasswordHelp" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                            <small id="confirmPasswordHelp" class="form-text text-danger"></small>
                        </div>
                        <button type="submit" class="btn btn-primary" id="changePasswordButton" disabled>Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    function updateChangeButton() {
        var newPassword = $('#newPassword').val();
        var confirmPassword = $('#confirmPassword').val();
        var allFieldsFilled = newPassword && confirmPassword;

        if (newPassword === confirmPassword && allFieldsFilled) {
            $('#newPasswordHelp').text('');
            $('#confirmPasswordHelp').text('');
            $('#changePasswordButton').prop('disabled', false);
        } else {
            $('#changePasswordButton').prop('disabled', true);

            if (allFieldsFilled) {
                $('#newPasswordHelp').text('Passwords do not match.');
                $('#confirmPasswordHelp').text('Passwords do not match.');
            } else {
                $('#newPasswordHelp').text('');
                $('#confirmPasswordHelp').text('');
            }
        }
    }

    $('#newPassword, #confirmPassword').on('keyup', function() {
        updateChangeButton();
    });

    $('#changePasswordForm').submit(function(e) {
        e.preventDefault();

        var oldPassword = $('#oldPassword').val();
        var newPassword = $('#newPassword').val();
        var confirmPassword = $('#confirmPassword').val();

        if (newPassword !== confirmPassword) {
            $('#newPasswordHelp').text('Passwords do not match.');
            $('#confirmPasswordHelp').text('Passwords do not match.');
            return;
        }

        // Lakukan validasi lainnya, dan kirim permintaan AJAX jika validasi berhasil
        // ...

        // Contoh:
        /*
        $.ajax({
            type: 'POST',
            url: 'change_password_endpoint.php',
            data: { oldPassword: oldPassword, newPassword: newPassword },
            success: function(response) {
                alert('Password changed successfully!');
                $('#changePasswordForm')[0].reset();
            },
            error: function(error) {
                alert('An error occurred.');
            }
        });
        */
    });

    updateChangeButton();
});
</script>
<?php
include '../layout/footer.php';
?>