<?php
session_start();
?>
<html lang="en">

<head>
    <title>Admin Profile</title>
</head>

<body>
    <?php

    include("../include/header.php");
    include("../include/connection.php");

    $ad = $_SESSION['admin'];

    $query = "SELECT * from admin WHERE username = '$ad'";

    $res = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_array($res)) {
        $username = $row['username'];
        $profiles = $row['profile'];
    }

    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>

                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="card h-100 border-0 shadow" style="width: 30rem; margin-top:20px;">
                                <div class="card-body card-img-top">
                                    <h4 class="text-info text-center"><?php echo $username; ?>'s Profile</h4>

                                    <?php
                                    if (isset($_POST['update'])) {
                                        $profile = $_FILES['profile']['name'];

                                        if (empty($profile)) {
                                        } else {
                                            $query = "UPDATE admin SET profile='$profile' WHERE username='$ad'";

                                            $result = mysqli_query($connect, $query);

                                            if ($result) {
                                                move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                                            }
                                        }
                                    }
                                    ?>

                                    <form method="POST" enctype="multipart/form-data">
                                        <?php

                                        echo " <img src='img/$profiles' class='col-md-12' style='height:390px;'>";

                                        ?>

                                        <br>

                                        <div class="form-group">
                                            <br>
                                            <label style="margin-left: 15px;">UPDATE PROFILE PICTURE</label>
                                            <input type="file" name="profile" class="form-control">
                                        </div>
                                        <input type="submit" name="update" value="Update" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-left: 70px;">
                                <div class="card h-100 border-0 shadow" style="width: 30rem; margin-top:3px;">
                                    <div class="card-body card-img-top">
                                        <?php
                                        if (isset($_POST['change'])) {
                                            $uname = $_POST['uname'];

                                            if (empty($uname)) {
                                            } else {
                                                $query = "UPDATE admin SET username = '$uname' WHERE  username ='$ad'";

                                                $res = mysqli_query($connect, $query);

                                                if ($res) {

                                                    $_SESSION['admin'] = $uname;
                                                }
                                            }
                                        }
                                        ?>
                                        <form method="POST">
                                            <h4 class="text-center my-4">Change Username</h4>
                                            <input type="text" name="uname" class="form-control" autocomplete="off">
                                            <br>
                                            <div class="col text-center">
                                                <input type="submit" name="change" value="Change Username" class="btn btn-success">
                                            </div>
                                        </form>

                                        <br>

                                        <?php

                                        if (isset($_POST['update_pass'])) {

                                            $old_pass = $_POST['old_pass'];
                                            $new_pass = $_POST['new_pass'];
                                            $con_pass = $_POST['con_pass'];

                                            $error = array();

                                            $old = mysqli_query($connect, "SELECT * FROM 
                                            admin WHERE username='$ad'");

                                            $row = mysqli_fetch_array($old);

                                            $pass = $row['password'];

                                            if (empty($old_pass)) {
                                                $error['p'] = "Enter old password";
                                            } else if (empty($new_pass)) {
                                                $error['p'] = "Enter new password";
                                            } else if (empty($con_pass)) {
                                                $error['p'] = "Enter new again to confirm password";
                                            } else if ($old_pass != $pass) {
                                                $error['p'] = "Invalid Old password";
                                            } else if ($new_pass != $con_pass) {
                                                $error['p'] = "new passwords do not match";
                                            }

                                            if (count($error) == 0) {
                                                $query = "UPDATE admin SET password = '$new_pass'
                                                    WHERE username = '$ad'";

                                                mysqli_query($connect, $query);
                                            }
                                        }

                                        if (isset($error['p'])) {

                                            $e = $error['p'];

                                            $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                        } else {
                                            $show = "";
                                        }

                                        ?>

                                        <form method="POST">
                                            <h4 class="text-center my-4">Change Password</h4>
                                            <div>
                                                <?php

                                                echo $show;

                                                ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Old Password</label>
                                                <input type="password" name="old_pass" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" name="new_pass" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="con_pass" class="form-control">
                                            </div>

                                            <div class="col text-center">
                                                <input type="submit" name="update_pass" value="Change Password" class="btn btn-success">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>