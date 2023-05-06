<?php
include("../include/connect.php");
session_start();

$query = "SELECT * FROM doctors WHERE status='Pendding' ORDER BY date_reg ASC";
$res = mysqli_query($conn, $query);

$output = "";
while ($row = mysqli_fetch_array($res)) {
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
        <th>Ngày Nộp Đơn</th>
        <th>Hoạt Động</th>
    </tr>

    ";

if (mysqli_num_rows($res) < 1) {
    $output .= "
            <tr>
                <td colspan='8' class='text-center'>
                    Không Có Dơn Xin Việc
                </td>
            </tr>
        ";
}


    $output .= "
        <tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['fullname'] . "</td>
        <td>" . $row['username'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['gender'] . "</td>
        <td>" . $row['phone'] . "</td>
        <td>" . $row['country'] . "</td>
        <td>" . $row['date_reg'] . "</td>
        <td>
        <div class='col-md-12'>
        <div class='row'>
            <div class='col-md-6'>
                <button id='" . $row['id'] . "' class='btn btn-success approve' >Chấp Nhận</button>
            </div>
            <div class='col-md-6'>
            <button id='" . $row['id'] . "' class='btn btn-danger reject' >Từ Chối</button>
            </div>
        </div>
    </div>
        </td>
    
        ";

    $output .= "
        </tr>
        </table>
    ";
}
    echo $output;

