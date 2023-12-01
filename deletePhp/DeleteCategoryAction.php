<?php

    try
    {

    include '../dbcon.php';

    $id = $_GET['id'];

    $deletequery = " DELETE FROM `category` WHERE categoryid='$id' ";

    $query = mysqli_query($con,$deletequery);

    if ($query) {
        echo "<script> window.location.href = '../manage_category.php'; </script>";
    } else {
        echo "<script> alert('Cant Delete Category Because It Is A Foreign key'); window.location.href = '../manage_category.php'; </script>";
    }
    }
    catch(Exception $e) {
        echo "<script> window.location.href = '../manage_category.php'; </script>";
    }


 ?>
