<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Registration Form</h2>
                <form id="registration-form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password-repeat">Repeat Password</label>
                        <input type="password" class="form-control" id="password-repeat" name="password-repeat">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div id="success-message" class="mt-3" style="display: none;">Registration successful</div>
                <div id="error-message" class="mt-3" style="display: none;">Registration failed. Please try again.</div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#registration-form').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'registration.php',
                    type: 'post',
                    data: $('#registration-form').serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == "success") {
                            $('#success-message').show();
                            $('#registration-form').hide();
                        } else {
                            $('#error-message').show();
                        }
                    },
                    error: function() {
                        $('#error-message').show();
                    }
                });
            });
        });
    </script>
</body>
</html>
