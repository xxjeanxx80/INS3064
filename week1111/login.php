<?php
session_start();
include("db_connect.php");

// Nếu người dùng đã đăng nhập, chuyển đến home.php
if (isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<head>
    <title>User login and Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="login-box">
        <div class="row">
           <div class="col-md-6 login-left">
               <h2>Login Here</h2>
               <form action="validation.php" method="post">
                   <div class="form-group">
                       <label>Username</label>
                       <input type="text" name="user" class="form-control" required>
                   </div>
                   <div class="form-group">
                       <label>Password</label>
                       <input type="password" name="password" class="form-control" required>
                   </div>
                   <button type="submit" class="btn btn-primary">Login</button>
               </form>
           </div>

            <div class="col-md-6 login-right">
                <h2>Registration Here</h2>
                <form action="registration.php" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="student_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
