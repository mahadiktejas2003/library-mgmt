<?php
session_start();

if(!isset($_SESSION['username'])){
  header('Location: login.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BookGuardian | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <style>
    #send_reminder_btn{
      border:1px solid; border-radius:8px; line-height:20px; margin-left:10px; background: #2193b0;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      color: white;
      transition: .3s;
    }
    #send_reminder_btn:hover{
      transform:scale(1.03);
      background: #FDC830;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #F37335, #FDC830);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #F37335, #FDC830); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" style="color: brown;" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="issue_books.php" class="nav-link">Issue Book</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_author.php" class="nav-link">Authors</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_books.php" class="nav-link">Books</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_category.php" class="nav-link">Categories</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_publisher.php" class="nav-link">Publishers</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_rack.php" class="nav-link">Racks</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_users.php" class="nav-link">Users</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a id="send_reminder_btn" name="submit" type="submit" href="php/SendEmailNotification.php" class="nav-link">Send Reminders</a>
        </li>
      </ul>



      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Book Guardian</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Tejas</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./index.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Home</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="issue_books.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Issue Book</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manage_author.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Authors</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manage_books.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Books</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manage_category.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manage_publisher.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Publishers</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manage_rack.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Racks</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manage_users.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="php/SendEmailNotification.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Send Reminders</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Logout
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="logout.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Click to Logout</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation + Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Boxed</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar <small>+ Custom Area</small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-topnav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Navbar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-footer.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Footer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Collapsed Sidebar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Home</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- TABLE CONNECTION -->
      <?php
      include 'dbcon.php';

      // Query to count total books
      $sql1 = "SELECT COUNT(*) as total_rows FROM book ";
      $result1 = $con->query($sql1);

      // Total Available Books
      $sql2 = 'SELECT COUNT(*) as total_rows FROM book b
          JOIN category c ON b.categoryid = c.categoryid
          WHERE c.`status`=\'Enable\'';

      $result2 = $con->query($sql2);

      // Total Student Registered
      $sql3 = "SELECT COUNT(*) as total_rows FROM users";
      $result3 = $con->query($sql3);

      // Total Student Registered
      $sql4 = "SELECT COUNT(*) as total_rows FROM issued_book ";
      $result4 = $con->query($sql4);
      
      ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <?php
                    
                      $selectqueryp = " select * from book ";

                      $queryp = mysqli_query($con,$selectqueryp);

                      $total_books = 0;

                      // Calculating total books
                      while ($resp = mysqli_fetch_array($queryp)) {
                        $total_books = $total_books + $resp['no_of_copy']; 
                      }

                      echo $total_books;
                    ?>
                  </h3>
                  <p>Total Books</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>
                    <?php
                      
                      $selectqueryq = " select * from book ";

                      $queryq = mysqli_query($con,$selectqueryq);

                      $total_avl_books = 0;

                      // Calculating total books
                      while ($resq = mysqli_fetch_array($queryq)) {
                        $total_avl_books = $total_avl_books + $resq['available_copy']; 
                      }

                      echo $total_avl_books;
                    ?>
                  </h3>

                  <p>Available Books</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php
                        // Get total number of rows
                        if ($result3->num_rows > 0) {
                          $row = $result3->fetch_assoc();
                          $total_rows = $row["total_rows"];
                          echo $total_rows;
                        } else {
                          echo "0";
                        }
                      ?>
                  </h3>

                  <p>Total Students</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>
                    <?php
                    
                    $selectqueryj = " select * from issued_book WHERE status='Issued' ";

                    $queryj = mysqli_query($con,$selectqueryj);

                    $total_issued_books = 0;

                    // Calculating total books
                    while ($resj = mysqli_fetch_array($queryj)) {
                      $total_issued_books = $total_issued_books + 1; 
                    }

                    echo $total_issued_books;
                  ?>
                  </h3>

                  <p>Issued Books</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <?php
                    
                    $selectqueryi = " select * from issued_book WHERE status='Returned' ";

                    $queryi = mysqli_query($con,$selectqueryi);

                    $total_issued_books = 0;

                    // Calculating total books
                    while ($resi = mysqli_fetch_array($queryi)) {
                      $total_issued_books = $total_issued_books + 1; 
                    }

                    echo $total_issued_books;
                  ?>
                  </h3>

                  <p>Returned Books</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            
            <!-- ./col -->
          </div>
          <!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-4 connectedSortable">
              <!-- PRODUCT LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Added Students</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    
                    <?php

                      include 'dbcon.php';

                      $selectquery = " SELECT * FROM users ORDER BY stud_prn DESC LIMIT 4 ";

                      $query = mysqli_query($con,$selectquery);
                      
                      $i = 4;
                      while ($res = mysqli_fetch_array($query)) {
                      ?>
                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title"><?php echo $res['first_name'] . " ". $res['last_name'] ; ?>
                            <span class="product-description">
                              <?php echo "PRN:" . $res['stud_prn'] ?>
                            </span>
                          </div>
                        </li>
                      <?php
                      }
                    ?>
                    <!-- /.item -->
                  </ul>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </section>
            <!-- right col -->
            <section class="col-lg-4 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->

              <!-- PRODUCT LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Issued Books</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                  
                  <?php

                      include 'dbcon.php';

                      $selectquery = " SELECT * FROM issued_book WHERE `status`='Issued' ORDER BY id DESC LIMIT 4";

                      $query = mysqli_query($con,$selectquery);

                      $i = 4;
                      while ($res = mysqli_fetch_array($query)) {
                        $bookIds = $res['book_id']; 
                        $selectquery2 = "SELECT * FROM book WHERE bookid = $bookIds";
                        $query2 = mysqli_query($con,$selectquery2);
                        $res2 = mysqli_fetch_array($query2)['name'];
                      ?>
                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title"><?php echo $res2; ?>
                            <span class="product-description">
                              <?php echo "Issude To (PRN): " . $res['student_prn'] ?>
                            </span>
                          </div>
                        </li>
                      <?php
                      }
                      ?>
                  </ul>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </section>

            <section class="col-lg-4 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->

              <!-- PRODUCT LIST -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Returned Books</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php

                      include 'dbcon.php';

                      $selectquery = " SELECT * FROM issued_book WHERE `status`='Returned' ORDER BY id DESC LIMIT 4 ";

                      $query = mysqli_query($con,$selectquery);

                      $i = 4;
                      while ($res = mysqli_fetch_array($query)) {
                        $bookIds = $res['book_id']; 
                        $selectquery2 = "SELECT * FROM book WHERE bookid = $bookIds";
                        $query2 = mysqli_query($con,$selectquery2);
                        $res2 = mysqli_fetch_array($query2)['name'];
                      ?>
                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title"><?php echo $res2; ?>
                            <span class="product-description">
                              <?php echo "Returned By(PRN): " . $res['student_prn'] ?>
                            </span>
                          </div>
                        </li>
                      <?php
                      }
                      ?>
                  </ul>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </section>
          </div>


        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer> -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!-- Page specific script -->
  <script>
    $(function () {

      // PIE CHART 1
      var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
      var pieData = {
        labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
        ],
        datasets: [
          {
            data: [700, 500, 400, 600, 300, 100],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      });

      // PIE CHART 2
      var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
      var pieData = {
        labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
        ],
        datasets: [
          {
            data: [700, 500, 400, 600, 300, 100],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      });

      // PIE CHART 3
      var pieChartCanvas = $('#pieChart3').get(0).getContext('2d')
      var pieData = {
        labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
        ],
        datasets: [
          {
            data: [700, 500, 400, 600, 300, 100],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      });

      // PIE CHART 4
      var pieChartCanvas = $('#pieChart4').get(0).getContext('2d')
      var pieData = {
        labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
        ],
        datasets: [
          {
            data: [700, 500, 400, 600, 300, 100],
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })

    });
  </script>
</body>

</html>