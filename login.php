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
            margin-top: 12px;
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
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container" style="margin-top:200px;">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="mt-4 mb-3" style="color:#000;">
                        Blood Bank & Management<br>Login Portal
                    </h1>
                </div>
            </div>
            <div class="card" style="height:250px;">
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
                        <div class="col-lg-4 mb-4" style="text-align:center"><br>
                            <div><input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="register_btn">
                <h3>Don't have an Account?<a href="register.php">Register</a></h3>
            </div>
        </div>
        <br>
        <?php
        include 'conn.php'; // Make sure this file connects to the correct database

        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            // Fetch user data
            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Verify password using password_verify
                if (password_verify($password, $row['password'])) {
                    // Start session and set session variables
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("Location: home.php"); // Redirect to home page
                    exit();
                } else {
                    echo '<div class="alert alert-danger" style="font-weight:bold">Invalid username or password!</div>';
                }
            } else {
                echo '<div class="alert alert-danger" style="font-weight:bold">Invalid username or password!</div>';
            }
        }
        ?>
    </form>
</body>
</html>
