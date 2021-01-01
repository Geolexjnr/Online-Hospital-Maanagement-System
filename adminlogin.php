<?php

session_start();

include("include/connection.php");

if (isset($_POST['login'])) {
    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    if (empty($username)) {
        $error['admin'] = "Enter Username";
    } else if (empty($password)) {
        $error['admin'] = "Enter Password";
    }

    if (count($error) == 0) {
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";

        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script> alert('You have Successfully logged in as an Administrator') </script>";
            $_SESSION['admin'] = $username;

            header("Location:admin/index.php ");
            exit();
        } else {
            echo "<script> alert('Invalid Username or Password') </script>";
        }
    }
}
?>
<html>

<head>
    <title>Admin Login Page</title>
</head>

<body style="background-image: url(img/Hospital-exterior.jpg);">
    <?php
    include("include/header.php");
    ?>

    <div style="margin-top: 20px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron">
                    <img src="img/adminlogin.jpg" alt="admin login" class="col-md-12">
                    <form method="post" class="my-2">

                        <div>
                            <?php
                            //error Handling
                            if (isset($error['admin'])) {

                                $showErrorMessage = $error['admin'];

                                $errorMessage = "<h4 class='alert alert-danger'>$showErrorMessage</h4>";
                            } else {
                                $errorMessage = "";
                            }

                            echo $errorMessage;
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                        </div>

                        <input type="submit" name="login" class="btn btn-success" value="login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>