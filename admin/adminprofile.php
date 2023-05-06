<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Admin</title>
</head>
<body>
    <?php include '../include/header.php'; include '../include/connect.php';session_start();
    
    $ad = $_SESSION['admin'];
    $query = "SELECT * FROM admin WHERE username='$ad'";
    $res = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($res))
    {
        $username = $row['username'];
        $profile = $row['profile'];
        
    }
    
    
    ?>
    
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px">
                <?php include 'sidenav.php' ?>

                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php  echo $username ?> Profile</h4>
                                <?php
                                    if(isset($_POST['update']))
                                    {
                                        $profile = $_FILES['profile']['name'];
                                        if(empty($profile))
                                        {

                                        }else{
                                            $query = "UPDATE admin SET profile='$profile' WHERE username='$ad'";
                                            $res = mysqli_query($conn,$query);
                                            if($res)
                                            {
                                                move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
                                            }
                                        }
                                    }
                                ?>

                                <form method="post" enctype="multipart/form-data">
                                    <?php 
                                        echo "<img src='img/$profile'alt='image admin' class='col-md-12' style='height: 250px'>";
                                    
                                    ?>
                                    <br><br>
                                    <div class="form-group">
                                        <label for="">Cập Nhật Thông Tin</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php

                                    if(isset($_POST['change']))
                                    {
                                        $username = $_POST['username'];
                                        if(empty($username))
                                        {

                                        }else{
                                            $query = "UPDATE admin SET username='$username' WHERE username='$ad'";
                                            $res = mysqli_query($conn,$query);
                                            if($res)
                                            {
                                                $_SESSION['admin'] = $username;
                                            }

                                        }
                                    }

                                ?>
                                <form method="POST">
                                    <label for="">Đổi Username</label>
                                    <input type="text" name="username" class="form-control" autocomplete="off"><br>
                                    <input type="submit" name="change" class="btn btn-success">
                                </form>

                                <br>
                                <?php

                                    if(isset($_POST['update_pass']))
                                    {
                                        $old_pass = $_POST['old_pass'];
                                        $new_pass = $_POST['new_pass'];
                                        $con_pass = $_POST['con_pass'];
                                        
                                        $error = array();

                                        $old = mysqli_query($conn, "SELECT * FROM admin WHERE username='$ad'");
                                        $row = mysqli_fetch_array($old);
                                        $pass = $row['password'];

                                        if(empty($old_pass)){$error['p']="Nhập Mật Khẩu Cũ";}
                                        elseif(empty($new_pass)){$error['p']="Nhập Mật Khẩu Mới";}
                                        elseif(empty($con_pass)){$error['p']="Xác Nhận Mật Khẩu ";}
                                        elseif($old_pass!=$pass){$error['p']="Sai Mật Khẩu";}
                                        elseif($new_pass!=$con_pass){$error['p']="Nhập Lại Mật Khẩu Không Chính Xác";}

                                        if(count($error)==0)
                                        {
                                            $query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";
                                            mysqli_query($conn,$query);
                                        }
                                        
                                         
                                    }

                                ?>

                                <form method="POST">
                                    <h5 class="text-center my-4" for="">Đổi Mật Khẩu</h5>
                                    <div>
                                    <?php if (isset($error['p'])): ?>
                    <div class="alert alert-danger"><?php echo $error['p']; ?></div>
                    <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mật Khẩu Cũ</label>
                                        <input type="password" name="old_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mật Khẩu Mới</label>
                                        <input type="password" name="new_pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nhập Lại Mật Khẩu</label>
                                        <input type="password" name="con_pass" class="form-control">
                                    </div>
                                    <input type="submit" name="update_pass" value="Xác Nhận" class="btn btn-info">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>