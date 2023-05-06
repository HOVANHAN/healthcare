<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php include '../include/header.php'; include '../include/connect.php' ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <!-- Side-nav -->
                    <?php include 'sidenav.php'; ?>
                    <!-- end -->
                </div>
                <div class="col-md-10">
                    <h4 class="my-2">Admin Dashboard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2"style="height:130px;">
                            
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php  $ad = mysqli_query($conn,"SELECT * FROM admin");
                                                    $num = mysqli_num_rows($ad)
                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php

                                                $doctor = mysqli_query($conn,"SELECT * FROM doctors WHERE status='Approved'");
                                                
                                                $num = mysqli_num_rows($doctor);


                                            ?>
                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $num ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Bác Sĩ</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="doctor.php"><i class="fa fa-user-md fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white" style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Bệnh Nhân</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a><i class="fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-danger mx-2 my-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white" style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Báo Cáo</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#"><i class="fa fa-flag fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2 my-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <?php
                                                $job = mysqli_query($conn,"SELECT * FROM doctors WHERE status='Pendding'");
                                                $nums = mysqli_num_rows($job);
                                            ?>

                                            <h5 class="my-2 text-white" style="font-size:30px;"><?php echo $nums;    ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Đơn Xin Việc</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="job_request.php"><i class="fa fa-book-open fa-3x my-4" style="color:white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-success mx-2 my-2" style="height:130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="my-2 text-white" style="font-size:30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Tổng Tiền</h5>
                                        </div>
                                        <div class="col-md-3">
                                            <a><i class="fa fa-money fa-3x my-4" style="color:white;"></i></a>
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
    </div>
    </div>



</body>

</html>




</body>

</html>