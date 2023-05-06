<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tất Cả Bác Sĩ</title>
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
                    <?php
                    $query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY date_reg ASC";
                    $res = mysqli_query($conn, $query);
                    $output = "";

                    $output .= "
    <table class='table table-bordered'>
    <tr>
        <th>ID</th>
        <th>Họ Và Tên</th>
        <th>Username</th>
        <th>Email</th>
        <th>Giới Tính</th>
        <th>Số Điện Thoại</th>
        <th>Tỉnh/Thành Phố</th>
        <th>Tiền Lương</th>
        <th>Ngày Nộp Đơn</th>
        <th>Hoạt Động</th>
    </tr>

    ";



                    while ($row = mysqli_fetch_array($res)) {
                        $output .= "
        <tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['fullname'] . "</td>
        <td>" . $row['username'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['gender'] . "</td>
        <td>" . $row['phone'] . "</td>
        <td>" . $row['country'] . "</td>
        <td>" . $row['salary'] . "</td>
        <td>" . $row['date_reg'] . "</td>
        <td>
            <a href='editdoctor.php?id=" . $row['id'] . "'>
                <button class='btn btn-info'>Edit</button>
            </a>
        </td>
    
        ";

                        $output .= "
        </tr>
        </table>
    ";
                    }
                    echo $output;
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>