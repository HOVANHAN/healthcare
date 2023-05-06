<?php

    include '../include/connect.php';
    session_start();

    $id = $_POST['id'];
    $query = "UPDATE doctors SET status='Rejected' WHERE id='$id' ";

    mysqli_query($conn,$query);
?>