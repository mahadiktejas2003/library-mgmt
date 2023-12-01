<?php

    try
    {

    include '../dbcon.php';

    $id = $_GET['id'];

    $deletequery = " DELETE FROM `users` WHERE stud_prn='$id' ";

    $query = mysqli_query($con,$deletequery);

    if ($query) {
        echo "<script> window.location.href = '../manage_users.php'; </script>";
    } else {
        echo "<script> alert('Cant Delete User Because It Is Foregin Key'); window.location.href = '../manage_users.php'; </script>";
    }
    }
    catch(Exception $e) {
        echo "<script> window.location.href = '../manage_users.php'; </script>";
    }


 ?>
