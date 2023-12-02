<?php

    $server = "localhost";
    $user = "root";
    $password = "" ;
    $db = "library" ;

    $con = mysqli_connect($server,$user,$password,$db,3300);

    if(!$con){
      ?>
      <script>
          alert("Connection Failed !");
      </script>
      <?php
    }
    mysqli_set_charset($con,"utf8mb4")
?>
