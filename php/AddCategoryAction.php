
  <?php
   include '../dbcon.php';

   if (isset($_POST['submit'])) {
     $category_name = $_POST['category_name'];
     $status = $_POST['status'];

     // Fetching Today's Date
     $timezone = date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d');
     $time = date('H:i:s');
     $time_stamp = $date . "," . $time;
     
     //inserting query
    $insertquery = "INSERT INTO `category`(`name`) VALUES ('$category_name')";

     //firing the $query
     $res = mysqli_query($con,$insertquery);

     if(!$res){
       ?>
       <script type="text/javascript">
         alert('Data inserted not Successful !');
         echo "<script> window.location.href = '../manage_category.php'; </script>";
       </script>
       <?php

     }
     else {
       echo "<script> window.location.href = '../manage_category.php'; </script>";
     }
   }

  ?>
