<?php
include '../include/connect.php';
session_start();

if(isset($_POST['apply'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['password'];
    $confirm_password = $_POST['con-password'];

    $error = array();
    if(empty($fullname)){$error['apply']="Nhập Họ Và Tên";}
    elseif(empty($username)){$error['apply']="Nhập Username";}
    elseif(empty($email)){$error['apply']="Nhập Email";}
    elseif(empty($gender)){$error['apply']="Nhập Giới Tính";}
    elseif(empty($phone)){$error['apply']="Nhập Số Điện";}
    elseif(empty($country)){$error['apply']="Nhập Tỉnh/Thành Phố";}
    elseif(empty($password)){$error['apply']="Nhập Mật Khẩu";}
    elseif(empty($confirm_password)){$error['apply']="Nhập Lại Mật Khẩu";}
    elseif($password!=$confirm_password){$error['apply']="Vui Lòng Xác Nhận Lại Mật Khẩu";}

    if(count($error)==0)
    {
        $query = "INSERT INTO doctors(fullname, username, email, gender,phone, country, password, salary, date_reg, status, profile)
        VALUES('$fullname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','') ";
        $res = mysqli_query($conn,$query);
        if($res)
        {
            echo "<script>alert('Bạn đã apply thành công')</script>";
            header("Location: doctorlogin.php");
        }else{
            echo "<script>alert('Vui lòng kiểm tra lại')</script>";
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nộp Đơn Bác Sĩ</title>
</head>
<body>
    <?php include '../include/header.php' ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center">Nộp Đơn Ngay</h5>
                    <?php if (isset($error['apply'])): ?>
                    <div class="alert alert-danger"><?php echo $error['apply']; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="">Họ Và Tên</label>
                            <input type="text" name="fullname" class="form-control" autocomplete="off" placeholder="Họ Và Tên" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>"> 
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Username"value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Giới Tính</label>
                            <select name="gender" class="form-control">
                                <option value="">Chọn Giới Tính</option>
                                <option value="Male">Nam</option>
                                <option value="Female">Nữ</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Số Điện Thoại</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Số Điện Thoại" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Tỉnh/Thành Phố</label>
                            <input type="text" name="country" class="form-control" autocomplete="off" placeholder="Tỉnh/Thành Phố" value="<?php if(isset($_POST['country'])) echo $_POST['country']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Mật Khẩu</label>
                            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Mật Khẩu">
                        </div>
                        <div class="form-group">
                            <label for="">Xác Nhận Lại Mật Khẩu</label>
                            <input type="password" name="con-password" class="form-control" autocomplete="off" placeholder="Xác Nhận Mật Khẩu">
                        </div>
                        <input type="submit" name="apply" class="btn btn-success" >
                        <p>Bạn đã có tài khoản rồi <a href="doctorlogin.php">Nhấn Vào Đây</a></p>
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>