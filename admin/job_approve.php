<?php

    include '../include/connect.php';
    session_start();

    $id = $_POST['id'];
    $query = "UPDATE doctors SET status='Approved' WHERE id='$id' ";

    mysqli_query($conn,$query);
?>