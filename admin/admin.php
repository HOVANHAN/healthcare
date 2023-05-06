<?php include '../include/header.php' ?>
<!DOCTYPE html>
<html>

<head>

    <title>Thêm Admin</title>

</head>

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px">
                    <?php include 'sidenav.php';
                    include '../include/connect.php';
                    session_start(); ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">
                                    Tất Cả Admin
                                </h5>
                                <?php
                                $ad = $_SESSION['admin'];
                                $query = "SELECT * FROM admin WHERE username !='$ad'";
                                $res = mysqli_query($conn, $query);
                                $output = "
                                    <table class='table table-bordered '>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th style='width:20%'>Hoạt Động</th>
                                    ";
                                if (mysqli_num_rows($res) < 1) {
                                    $output = "<h5 class='text-center'>Không Có Admin</h5>";
                                }
                                while ($row = mysqli_fetch_array($res)) {
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $output .=
                                        "<tr>
                                        <td>$id</td>
                                        <td>$username</td>
                                        <td>
                                        <a href='admin.php?id=$id'><button id='remove' class='btn btn-danger remove '>Loại Bỏ</button></a>
                                        </td>
                                        </tr>
                                        ";
                                        
                                }
                                $output .= "
                                </table>";
                                echo $output;

                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $query = "DELETE FROM admin WHERE id='$id'";
                                    mysqli_query($conn, $query);
                                }

                                ?>




                            </div>
                            <?php
                            if (isset($_POST['add'])) {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $image = $_FILES['img']['name'];

                                $error = array();
                                if (empty($username)) {
                                    $error['u'] = "Điển username";
                                } elseif (empty($password)) {
                                    $error['u'] = "Điền Mật Khẩu";
                                } elseif (empty($image)) {
                                    $error['u'] = "Thêm Hình Ảnh";
                                }

                                if (count($error) == 0) {
                                    $q = "INSERT INTO admin(username,password,profile) VALUES('$username','$password','$image')";
                                    $result = mysqli_query($conn, $q);
                                    if ($result) {
                                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                    }
                                }
                            }

                            ?>



                            <div class="col-md-6">
                                <h5 class="text-center">Add Admin</h5>
                                <form method="post" enctype="multipart/form-data">
                                    <?php if (isset($error['u'])) : ?>
                                        <div class="alert alert-danger"><?php echo $error['u']; ?></div>
                                    <?php endif; ?>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" autocomplete="off">

                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Thêm Hình Ảnh</label>
                                        <input type="file" name="img" class="form-control">

                                    </div>
                                    <input type="submit" name="add" value="Thêm Admin" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>