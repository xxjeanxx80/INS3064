<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User login and Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
        // Hiển thị thông báo nếu có query string
        if (isset($_GET['reg']) && $_GET['reg'] == 'success') {
            echo '<div class="alert alert-success">Registration successful! Please login.</div>';
        }
        if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
            echo '<div class="alert alert-danger">Invalid username or password!</div>';
        }
        if (isset($_GET['error']) && $_GET['error'] == 'exists') {
            echo '<div class="alert alert-danger">Username already exists!</div>';
        }
        ?>

        <div class="login-box">
            <div class="row">
                <div class="col-md-6 login-left">
                    <h2>Login Here</h2>
                    <form action="validation.php" method="post">
                        <div class="form-group">
                            <label for="login_user">Username</label>
                            <input type="text" id="login_user" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="login_pass">Password</label>
                            <input type="password" id="login_pass" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="col-md-6 login-right">
                    <h2>Registration Here</h2>
                    <form action="registration.php" method="post">
                        <div class="form-group">
                            <label for="reg_user">Username</label>
                            <input type="text" id="reg_user" name="user" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="reg_pass">Password</label>
                            <input type="password" id="reg_pass" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>