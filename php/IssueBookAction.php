<?php
   include '../dbcon.php';

   if (isset($_POST['submit'])) {
     $book_id = $_POST['book_id'];
     $stud_prn = $_POST['stud_prn'];
     $status = $_POST['status'];

     // Fetching Today's Date
     $timezone = date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d');
     $time = date('H:i:s');
     $time_stamp = $date . "," . $time;
     // Here Iam calculating date after 8 days
     $expected_return_date = date('Y-m-d', strtotime($date . ' +8 day'));

     if($status == "issued") {
        // Before Issuing Book, check whether the student already have that book or not.
        $book_check_query = "SELECT * FROM `issued_book` WHERE book_id = '$book_id' AND `student_prn` = '$stud_prn' AND `status` = 'Issued' ";
        $book_check_result = $con->query($book_check_query);

        if($book_check_result->num_rows > 0) {
          echo "<script>alert('Book Already issued !');</script>";
          echo "<script> window.location.href = '../issue_books.php'; </script>";
          return;
        }
    }
    else {
        // Before Issuing Book, check whether the student already have that book or not.
        $book_check_query = "SELECT * FROM `issued_book` WHERE book_id = '$book_id' AND `student_prn` = '$stud_prn' AND `status` = 'Issued' ";
        $book_check_result = $con->query($book_check_query);

        if($book_check_result->num_rows >= 1) {
          // Update issued_book status to returned
          $update_status_query = "UPDATE `issued_book` SET `status`='Returned', return_date_time='$time_stamp' WHERE book_id = '$book_id' AND `student_prn` = '$stud_prn' AND `status` = 'Issued'" ;
          $update_status_rs = mysqli_query($con, $update_status_query);
          if(!$update_status_rs){
            echo "<script>alert('Something Wents Wrong !');</script>";
            echo "<script> window.location.href = '../issue_books.php'; </script>";
            return;
          }
          $bookCount = $bookCount + 1;
          $updateBookCountQuery = "UPDATE `book` SET `available_copy`='$bookCount' WHERE `bookid`=$book_id" ;
          $update_book_table = mysqli_query($con, $updateBookCountQuery);

          echo "<script>alert('Book Returned Successfully !');</script>";
          echo "<script> window.location.href = '../issue_books.php'; </script>";
          return;
        }
        else {
          echo "<script>alert('Book Not Issued To This Student !');</script>";
          echo "<script> window.location.href = '../issue_books.php'; </script>";
          return;
        }
    }
     
     //inserting query
    $insertquery = "INSERT INTO `issued_book`(`book_id`, `student_prn`, `issue_date_time`, `expected_return_date`, `return_date_time`, `status`, `return_quantity`) 
    VALUES ('$book_id','$stud_prn','$time_stamp','$expected_return_date','NA','$status','0')";

    // Fetch available copies of book !
    $fetchBookCount = "SELECT available_copy FROM book WHERE bookid = '$book_id' ";
    $fetchCountResult = $con->query($fetchBookCount);

    if($fetchCountResult->num_rows > 0){
      $fetchBookCountRow = $fetchCountResult->fetch_assoc();
      $bookCount = $fetchBookCountRow['available_copy'];

      if($bookCount <= 0) {
        echo "<script>alert('Currently book copy is not available !');</script>";
        echo "<script> window.location.href = '../issue_books.php'; </script>";
        return;
      }
    }

    if($status == "returned"){
      // Decremented book count in variable
      $bookCount = $bookCount + 1;
    }
    else {
      // Decremented book count in variable
      $bookCount = $bookCount - 1;
    }
    

    // Decrement the count of available book from books table
    $updateBookCountQuery = "UPDATE `book` SET `available_copy`='$bookCount' WHERE `bookid`=$book_id" ;
    
     //firing the $query
     $res = mysqli_query($con,$insertquery);
     // Updating the new book count of available books in books table
     $update_book_table = mysqli_query($con, $updateBookCountQuery);
        
     if(!$res || !$update_book_table){
       ?>
       <script type="text/javascript">
         alert('Data inserted not Successful !');
         window.location.href = '../issue_books.php'; 
       </script>
       <?php

     }
     else {
       echo "<script> window.location.href = '../issue_books.php'; </script>";
     }
   }

  ?>