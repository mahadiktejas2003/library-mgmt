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
  <title>BookGuardian | Manage Books</title>

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
          <a href="index.php" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="issue_books.php" class="nav-link">Issue Book</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_author.php" class="nav-link">Authors</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="manage_books.php" style="color: brown;" class="nav-link">Books</a>
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
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
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
                  <a href="./index.php" class="nav-link">
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
                  <a href="manage_books.php" class="nav-link active">
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
                  <a href="./index.html" class="nav-link">
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
                <li class="breadcrumb-item active">Manage Books</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Book</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="php/AddBookAction.php" method="POST"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Book Name</label>
                    <input type="text" name="book_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Book Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ISBN Number</label>
                    <input type="text" name="isbn_number" class="form-control" id="exampleInputEmail1" placeholder="Enter ISBN">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Author</label>
                    <select class="custom-select" name="author" id="exampleSelectBorder">
                      <?php

                            include 'dbcon.php';

                            $selectquery = " select * from author ";

                            $query = mysqli_query($con,$selectquery);

                            while ($res = mysqli_fetch_array($query)) {
                              ?>
                                <option value="<?php echo $res['authorid']?>"><?php echo $res['name']?></option>
                              <?php
                            }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Publisher</label>
                    <select class="custom-select" name="publisher" id="exampleSelectBorder">
                    <?php

                        include 'dbcon.php';

                        $selectquery = " select * from publisher ";

                        $query = mysqli_query($con,$selectquery);

                        while ($res = mysqli_fetch_array($query)) {
                          ?>
                            <option value="<?php echo $res['publisherid']?>"><?php echo $res['name']?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Category</label>
                    <select class="custom-select" name="category" id="exampleSelectBorder">
                    <?php

                        include 'dbcon.php';

                        $selectquery = " select * from category ";

                        $query = mysqli_query($con,$selectquery);

                        while ($res = mysqli_fetch_array($query)) {
                          ?>
                            <option value="<?php echo $res['categoryid']?>"><?php echo $res['name']?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectBorder">Select Rack</label>
                    <select class="custom-select" name="rack" id="exampleSelectBorder">
                    <?php

                        include 'dbcon.php';

                        $selectquery = " select * from rack ";

                        $query = mysqli_query($con,$selectquery);

                        while ($res = mysqli_fetch_array($query)) {
                          ?>
                            <option value="<?php echo $res['rackid']?>"><?php echo $res['name']?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number Of Book Copies Available</label>
                    <input type="number" name="qty" class="form-control" id="exampleInputEmail1" placeholder="Enter No. Of. Copies">
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleSelectBorder">Select Status</label>
                    <select class="custom-select" name="status" id="exampleSelectBorder">
                      <option value="enable">Enable</option>
                      <option value="disable">Disable</option>
                    </select>
                  </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Add Book  </button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.card -->
      </section>

      <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Current Books</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Book Id</th>
                  <th>Book Name</th>
                  <th>ISBN</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Category</th>
                  <th>Rack</th>
                  <th>Total Copies</th>
                  <th>Available Copies</th>
                  <th>Updated</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                  <?php

                      include 'dbcon.php';

                      $selectquery = " select * from book ";

                      $query = mysqli_query($con,$selectquery);

                      while ($res = mysqli_fetch_array($query)) {
                        ?>
                          <tr>
                            <td><?php echo $res['bookid']; ?></td>
                            <td><?php echo $res['name']; ?></td>
                            <td><?php echo $res['isbn']; ?></td>
                            <td>
                              <?php
                                $athr_id = $res['authorid'];
                                $qr1 = mysqli_query($con, "SELECT * FROM author WHERE authorid='$athr_id' "); 
                                $rs1 = mysqli_fetch_array($qr1);
                                echo $rs1['name']; 
                              ?>
                            </td>
                            <td>
                              <?php
                                $pub_id = $res['publisherid'];
                                $qr2 = mysqli_query($con, "SELECT * FROM publisher WHERE publisherid='$pub_id' "); 
                                $rs2 = mysqli_fetch_array($qr2);
                                echo $rs2['name']; 
                              ?>
                            </td>
                            <td>
                              <?php
                                $cat_id = $res['categoryid'];
                                $qr3 = mysqli_query($con, "SELECT * FROM category WHERE categoryid='$cat_id' "); 
                                $rs3 = mysqli_fetch_array($qr3);
                                echo $rs3['name']; 
                              ?>
                            </td>
                            <td>
                              <?php
                                $rk_id = $res['rackid'];
                                $qr4 = mysqli_query($con, "SELECT * FROM rack WHERE rackid='$rk_id' "); 
                                $rs4 = mysqli_fetch_array($qr4);
                                echo $rs4['name']; 
                              ?>
                            </td>
                            <td><?php echo $res['no_of_copy']; ?></td>
                            <td><?php echo $res['available_copy']; ?></td>
                            <td><?php echo $res['updated_on']; ?></td>
                            <td><a href="deletePhp/DeleteBookAction.php?id=<?php echo $res['bookid']; ?>"  title="delete"><i class="fa fa-trash"></i></a></td>
                            <td><a href="update_books.php?id=<?php echo $res['bookid']; ?>"  title="Update"><i class="fa fa-edit"></i></a></td>
                      </tr>
                        <?php
                      }
                  ?>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th>Book Id</th>
                  <th>Book Name</th>
                  <th>ISBN</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Category</th>
                  <th>Rack</th>
                  <th>Total Copies</th>
                  <th>Available Copy</th>
                  <th>Updated</th>
                  <th>Delete</th>
                  <th>Edit</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>



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
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- <script src="dist/js/pages/dashboard.js"></script> -->

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
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>