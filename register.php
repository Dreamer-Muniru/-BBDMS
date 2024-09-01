<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .register_btn{
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }
        .register_btn h3{
            text-align: center
        }
        .register_btn h3 a{
            padding-left: 10px;
            text-decoration: none;
        }
        body{
            background-image: url("image/banner14.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body background="admin_image/banner10.jpeg">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container" style="margin-top:200px;">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="mt-4 mb-3" style="color:#000;">
                        Blood Bank & Management<br>User Registration
                    </h1>
                </div>
            </div>
            <div class="card" style="height:400px;">
                <div class="card-body">
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-6 mb-6">
                            <div class="font-italic" style="font-weight:bold">Username<span style="color:red">*</span></div>
                            <div><input type="text" name="username" placeholder="Enter your username" class="form-control" required></div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-6 mb-6"><br>
                            <div class="font-italic" style="font-weight:bold">Password<span style="color:red">*</span></div>
                            <div><input type="password" name="password" placeholder="Enter your Password" class="form-control" required></div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-6 mb-6"><br>
                            <div class="font-italic" style="font-weight:bold">Confirm Password<span style="color:red">*</span></div>
                            <div><input type="password" name="confirm_password" placeholder="Confirm your Password" class="form-control" required></div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center">
                        <div class="col-lg-4 mb-4" style="text-align:center"><br>
                            <div><input type="submit" name="register" class="btn btn-primary" value="REGISTER" style="cursor:pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="register_btn">
                <h3>Already have an Account?<a href="login.php">Login</a></h3>
            </div>
        </div>
        <br>
        <?php
        include 'conn.php';

        if (isset($_POST['register'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
        
            // Check if passwords match
            if ($password !== $confirm_password) {
                echo '<div class="alert alert-danger" style="font-weight:bold">Passwords do not match!</div>';
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Check if username already exists
                $checkUser = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $checkUser);
        
                if (mysqli_num_rows($result) > 0) {
                    echo '<div class="alert alert-danger" style="font-weight:bold">Username already exists!</div>';
                } else {
                    // Insert new user
                    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
                    if (mysqli_query($conn, $sql)) {
                        echo '<div class="alert alert-success" style="font-weight:bold">Registration successful! Redirecting to home page...</div>';
                        header("Refresh: 3; url=home.php"); // Redirect to home page after 3 seconds
                    } else {
                        echo '<div class="alert alert-danger" style="font-weight:bold">Error: ' . mysqli_error($conn) . '</div>';
                    }
                }
            }
        }
        ?>
    </form>
</body>
</html>
