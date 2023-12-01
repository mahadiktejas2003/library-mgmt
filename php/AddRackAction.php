
  <?php
   include '../dbcon.php';

   if (isset($_POST['submit'])) {
     $rack_name = $_POST['rack_name'];
     $status = $_POST['status'];

     // Fetching Today's Date
     $timezone = date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d');
     $time = date('H:i:s');
     $time_stamp = $date . "," . $time;
     
     //inserting query
    $insertquery = "INSERT INTO `rack`(`name`) VALUES ('$rack_name')";

     //firing the $query
     $res = mysqli_query($con,$insertquery);

     if(!$res){
       ?>
       <script type="text/javascript">
         alert('Data inserted not Successful !');
         echo "<script> window.location.href = '../manage_rack.php'; </script>";
       </script>
       <?php

     }
     else {
       echo "<script> window.location.href = '../manage_rack.php'; </script>";
     }
   }

  ?>
