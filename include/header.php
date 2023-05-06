<!DOCTYPE html>
<html lang="vi">

<head>
  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/312fb88a28.js" crossorigin="anonymous"></script>
  <!-- Link to Bootstrap JS -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="logo">
      Hospital Managerment System
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <?php
        // Nếu đăng nhập, hiển thị tên đăng nhập và nút đăng xuất
        if (isset($_SESSION['admin'])) {
          $user = $_SESSION['admin'];
          echo '<li class="nav-item">
                    <a class="nav-link" href="#">Xin chào, ' . $_SESSION['admin'] . '</a>
                  </li>';
          echo '<li class="nav-item">
                    <a class="nav-link" href="adminlogout.php">Đăng xuất</a>
                  </li>';
        }
        elseif(isset($_SESSION['doctors'])) {
            $user = $_SESSION['doctors'];
            echo '<li class="nav-item">
                      <a class="nav-link" href="#">Xin chào, ' . $_SESSION['doctors'] . '</a>
                    </li>';
            echo '<li class="nav-item">
                      <a class="nav-link" href="adminlogout.php">Đăng xuất</a>
                    </li>';
        }

        // Nếu chưa đăng nhập, hiển thị nút đăng nhập
        else {
          echo '<li class="nav-item">
          <a class="nav-link" href="../user/index.php">Home</a>
        </li>';
          echo '<li class="nav-item">
                    <a class="nav-link" href="../admin/adminlogin.php">Admin</a>
                  </li>';
          echo '<li class="nav-item">
                  <a class="nav-link" href="../doctor/doctorlogin.php">Bác Sĩ</a>
                </li>';
          echo '<li class="nav-item">
                <a class="nav-link" href="userlogin.php">Bệnh Nhân</a>
                  </li>';
        }
        ?>


    </div>
  </nav>