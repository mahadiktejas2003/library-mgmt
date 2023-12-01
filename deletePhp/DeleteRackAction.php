<?php

    try
    {

    include '../dbcon.php';

    $id = $_GET['id'];

    $deletequery = " DELETE FROM `rack` WHERE rackid='$id' ";

    $query = mysqli_query($con,$deletequery);

    if ($query) {
        echo "<script> window.location.href = '../manage_rack.php'; </script>";
    } else {
        echo "<script> alert('Cant Delete Author Because It Is Foregin Key'); window.location.href = '../manage_rack.php'; </script>";
    }
    }
    catch(Exception $e) {
        echo "<script> window.location.href = '../manage_rack.php'; </script>";
    }


 ?>
