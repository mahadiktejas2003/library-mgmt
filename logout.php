<?php
session_start();
$user_name = $_SESSION['username'] ;
$user_id = $_SESSION['login'];

session_destroy();

// header('location:98327454387.php');
?>
<script type="text/javascript">
  location.replace("login.php")
</script>
<?php
?>
