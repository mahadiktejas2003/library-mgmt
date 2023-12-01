<?php
// Connect to your database (replace DB_HOST, DB_USER, DB_PASSWORD, and DB_NAME with your own values)
include '../dbcon.php';

// Get the current date/time
$current_date = date('Y-m-d H:i:s');


// Query the database for users whose expected_return_date has passed
// First Select PRNS of student whose date has passed


$sql = "SELECT student_prn FROM issued_book WHERE expected_return_date < '$current_date'";
$result = $con->query($sql);

// Loop through the results and send an email to each user
while ($row = mysqli_fetch_array($result)) {
echo "hi";
    $prn = $row['student_prn'];
    $sql2 = "SELECT email FROM users WHERE stud_prn = '$prn'";
    $rs2 = $con->query($sql2);

    while($row2 = $rs2->fetch_assoc()) {
        $to = $row2['email'];
        $subject = 'Reminder: Your book is overdue!';
        $message = 'Hello, your book is overdue. Please return it as soon as possible.';
        $headers = 'From: service@northenmed.com' . "\r\n" .
                   'Reply-To: service@northenmed.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();
    
        // Send the email
        mail($to, $subject, $message, $headers);
    }
    
    echo "<script>alert('Reminder Sent Successfully');</script>";
    echo "<script> window.location.href = '../index.php'; </script>";
}

// Close the database connection
$con->close();
?>
