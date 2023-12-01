<?php
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BookGuardian | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<?php
      include 'dbcon.php';

      if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $password = $_POST['pass'];

        $user_search = " select * from login where userid = '$user' ";
        $query = mysqli_query($con,$user_search);



        $user_count =   mysqli_num_rows($query);

        if($user_count){
            $user_pass = mysqli_fetch_assoc($query);
            $db_pass = $user_pass['password'];

            $_SESSION['username'] = $user_pass['name'];
            $_SESSION['login'] = $user_pass['userid'];

            if($password==$db_pass){
              ?>
                <script>
                  location.replace("index.php")
                </script>
              <?php
            }else {
              ?>
                <script>
                  alert('Incorrect Userid or Password !');
                </script>
              <?php
            }
        }else{
          ?>
            <script>
              alert('Incorrect Userid or Password !');
            </script>
          <?php
        }
      }
      
     ?>

<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Book</b>Guardian</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Library Staff Login</p>

      <form action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="pass" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt mr-2"></i>Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
