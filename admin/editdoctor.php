<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Bác Sĩ</title>
</head>

<body>
    <?php
    include '../include/header.php';
    include '../include/connect.php';
    session_start();
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php
                    include 'sidenav.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">Thông Tin Bác Sĩ</h5>
                    <?php
                        if(isset($_GET['id']))
                        {
                            $id = $_GET['id'];

                            $query = "SELECT * FROM doctors WHERE id='$id'";
                            $res = mysqli_query($conn,$query);

                            $row = mysqli_fetch_array($res);
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Bác Sĩ</h5>
                            <h5 class="my-3">Họ Và Tên: <?php echo $row['fullname']; ?></h5>
                            <h5 class="my-3">Username: <?php echo $row['username']; ?></h5>
                            <h5 class="my-3">Email: <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Điện Thoại: <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Giới Tính: <?php echo $row['gender']; ?></h5>
                            <h5 class="my-3">Tỉnh/Thành Phố: <?php echo $row['country']; ?></h5>
                            <h5 class="my-3">Ngày Gia Nhập: <?php echo $row['date_reg']; ?></h5>
                            <h5 class="my-3">Tiền Lương: <?php echo $row['salary']; ?> đồng</h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Cập Nhật Tiền Lương</h5>
                                <?php
                                    if(isset($_POST['update']))
                                    {
                                        $salary = $_POST['salary'];
                                        $query = "UPDATE doctors SET salary='$salary' WHERE id ='$id'";
                                        mysqli_query($conn,$query);
                                    }
                                ?>

                            <form method="POST">
                                <label for="">Nhập Tiền Lương</label>
                                <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Nhập Tiền Lương"
                                value="<?php echo $row['salary'] ;?>">
                                <input type="submit" name="update" class="btn btn-info my-3" value="Cập Nhật Tiền Lương">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>