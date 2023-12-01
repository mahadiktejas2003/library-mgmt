
  <?php
   include '../dbcon.php';

   if (isset($_POST['submit'])) {
     $book_name = $_POST['book_name'];
     $isbn_number = $_POST['isbn_number'];
     $author = $_POST['author'];
     $publisher = $_POST['publisher'];
     $category = $_POST['category'];
     $rack = $_POST['rack'];
     $qty = $_POST['qty'];

     // Fetching Today's Date
     $timezone = date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d');
     $time = date('H:i:s');
     $time_stamp = $date . "," . $time;
     
     //inserting query
    $insertquery = "INSERT INTO `book`(`categoryid`, `authorid`, `rackid`, `name`, `publisherid`, `isbn`, `no_of_copy`, `available_copy` ,`added_on`, `updated_on`) 
    VALUES ('$category','$author','$rack','$book_name','$publisher','$isbn_number','$qty', '$qty','$time_stamp','$time_stamp')";

     //firing the $query
     $res = mysqli_query($con,$insertquery);

     if(!$res){
       ?>
       <script type="text/javascript">
         alert('Data inserted not Successful !');
         window.location.href = '../manage_books.php';
       </script>
       <?php

     }
     else {
       echo "<script> window.location.href = '../manage_books.php'; </script>";
     }
   }

  ?>
