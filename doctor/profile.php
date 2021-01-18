<?php
session_start();

error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Profile Page</title>

</head>

<body>
    <?php
    include("../include/header.php")
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");

                    include("../include/connection.php");

                    ?>
                </div>

                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php

                                    $doc = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctors WHERE username = '$doc'";

                                    $res = mysqli_query($connect, $query);

                                    $row =  mysqli_fetch_array($res);

                                    if (isset($_POST['upload'])) {
                                        $img = $_FILES['img']['name'];

                                        if (empty($img)) {
                                            //code
                                        } else {
                                            $query = "UPDATE doctors SET profile = '$img' WHERE username='$doc'";

                                            $res =  mysqli_query($connect, $query);

                                            if ($res) {
                                                move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                            }
                                        }
                                    }

                                    ?>

                                    <br>
                                    <div class="card  border-0 shadow-lg row d-flex justify-content-center text-center" style="width: 30rem; margin-top:3px;">
                                        <div class="card-body card-img-top ">
                                            <form method="post" enctype="multipart/form-data">

                                                <?php
                                                echo "<img src='img/" . $row['profile'] . "' style='height: 250px; width: 440px' class='col-md-12 my-3'>"
                                                ?>

                                                <br><br>

                                                <input type="file" name="img" class="form-control my-1">

                                                <br>

                                                <input type="submit" name="upload" class="btn btn-success" value="Update Profile">
                                            </form>

                                            <div class="my-3">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th colspan="2" class="text-center">Details</th>
                                                    </tr>

                                                    <tr>
                                                        <td>Firstname</td>
                                                        <td><?php echo $row['firstname']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Surname</td>
                                                        <td><?php echo $row['surname']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Username</td>
                                                        <td><?php echo $row['username']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Email</td>
                                                        <td><?php echo $row['email']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Phone No.</td>
                                                        <td><?php echo $row['phone']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Gender</td>
                                                        <td><?php echo $row['gender']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Country</td>
                                                        <td><?php echo $row['country']; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Salary</td>
                                                        <td><?php echo $row['salary']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div style="margin-top: 20px;">
                                        <div class="card border-0 shadow-lg" style="width: 30rem; margin-top:3px;">
                                            <div class="card-body">
                                                <h5 class="text-center my-2">Change Username</h5>

                                                <?php
                                                if (isset($_POST['change_uname'])) {
                                                    $uname = $_POST['uname'];

                                                    if (empty($uname)) {
                                                    } else {
                                                        $query = "UPDATE doctors SET username = '$uname' WHERE  username ='$doc'";

                                                        $res = mysqli_query($connect, $query);

                                                        if ($res) {

                                                            $_SESSION['doctor'] = $uname;
                                                        }
                                                    }
                                                }
                                                ?>

                                                <form method="post">
                                                    <label>Change Username</label>
                                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                                    <br>
                                                    <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="card  border-0 shadow-lg" style="width: 30rem; margin-top:3px;">
                                        <div class="card-body">
                                            <h5 class="text-center my-2">Change Password</h5>
                                            <?php
                                            if ($_POST['change_pass']) {
                                                $old = $_POST['old_pass'];
                                                $new = $_POST['new_pass'];
                                                $con = $_POST['con_pass'];

                                                $ol = "SELECT * FROM doctors WHERE username = '$doc'";

                                                $ols =  mysqli_query($connect, $ol);
                                                $row = mysqli_fetch_array($ols);

                                                if ($old != $row['password']) {
                                                    //
                                                } else if (empty($new)) {
                                                } else if ($con != $new) {
                                                } else {

                                                    $query = "UPDATE doctors SET password = '$new' WHERE username = '$doc'";

                                                    mysqli_query($connect, $query);
                                                }
                                            }
                                            ?>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                                    <br>
                                                    <label>New Password</label>
                                                    <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
                                                    <br>
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter New Password Again">
                                                    <br>
                                                </div>
                                                <input type="submit" name="change_pass" class="btn btn-info" value="Change Password">
                                            </form>

                                        </div>
                                    </div>


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