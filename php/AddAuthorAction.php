
  <?php
   include '../dbcon.php';

   if (isset($_POST['submit'])) {
     $author_name = $_POST['author_name'];
    //  $status = $_POST['status'];

     // Fetching Today's Date
     $timezone = date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d');
     $time = date('H:i:s');
     $time_stamp = $date . "," . $time;
     
     //inserting query
    // $insertquery = "INSERT INTO `author`(`name`, `status`) VALUES ('$author_name','$status')";
    $insertquery = "INSERT INTO `author`(`name`) VALUES ('$author_name')";

     //firing the $query
     $res = mysqli_query($con,$insertquery);

     if(!$res){
       ?>
       <script type="text/javascript">
         alert('Data inserted not Successful !');
         echo "<script> window.location.href = '../manage_author.php'; </script>";
       </script>
       <?php

     }
     else {
       echo "<script> window.location.href = '../manage_author.php'; </script>";
     }
   }

  ?>
