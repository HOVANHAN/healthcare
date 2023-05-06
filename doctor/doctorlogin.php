<?php include '../include/header.php' ?>

<?php
include '../include/connect.php';
session_start();

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $error = array();

    $query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($res);

    if(empty($username)){$error['login']="Nhập Username";}
    elseif(empty($password)){$error['login']="Nhập Mật Khẩu";}
    elseif($row['status']=='Pendding'){$error['login']="Vui Lòng Đợi Admin Xác Nhận";}
    elseif($row['status']=='Rejected'){$error['login']="Apply Thất Bại";}

    if(count($error)==0)
    {
        $query = "SELECT * FROM doctors WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn,$query);
        if(mysqli_num_rows($res))
        {
            $_SESSION['doctors']=$username;
            header("Location:index.php");
            exit();
        }
        else{echo "<script>alert('Tài Khoản Không Tồn Tại')</script>";}
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Bác Sĩ</title>
</head>
<body>
    

    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Đăng nhập Bác Sĩ</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($error['login'])): ?>
                    <div class="alert alert-danger"><?php echo $error['login']; ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Đăng nhập</button>
                        <br>
                        <p>Không Có Tài Khoản<a href="apply.php">Nộp Đơn Ngay</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>