 <?php
$ob_start = ob_start();
  $session_start = session_start(); 
$ob_end_flush = ob_end_flush();
  

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LIU Alumni - Dashboard</title>
     <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
   
    <!-- MultipleSelectList library -->
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.js"></script>
    <script src="js/actions.js"></script>

    <!-- Sweet Alert link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
  <style type="text/css">
    body{
      font-size:15px;
    }
    
    .card{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      font-family: arial;
    }
        .img-xs, .table td img,
        .table th img {
         width: 30px;
         height: 30px;}
    .bgimg {
    background-image: url('../backend/image/background.jpg');
    }
   
    .card-body-icon {
      position: absolute;
      z-index: 0;
      top: -0.85rem;
      right: -0.85rem;
      opacity: 0.4;
      font-size: 5.5rem;
      -webkit-transform: rotate(15deg);
      transform: rotate(15deg);
    }
    .breadcrumb-item + .breadcrumb-item::before {
      display: inline-block;
      padding-right: 0.95rem;
      padding-left: 0.95rem;
      color: #6c757d;
      content: "||"; }   
  </style>
  </head>

   <?php 
    include 'config/included_functions.php';
    
    if (!isset($_SESSION["isAdminloggedin"])){
    ?>
  

   <?php 
      header("location:../frontend/index.php?p=login");
     }
    elseif (isset($_SESSION["isAdminloggedin"])){?>
  <body id ="page-top">
    <!-- Page Wrapper -->
   <div id="wrapper">
     <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-secret"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="index.php?p=home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Charts
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Tables:</h6>
               <a class="collapse-item" href="index.php?p=Users"> Clients Table </a>
              <a class="collapse-item" href="index.php?p=admin_table"> Administrator Table  </a>
              <a class="collapse-item" href="index.php?p=alumni_table"> Alumni Table </a>
              <a class="collapse-item" href="index.php?p=ceo_table"> CEO Table </a>
              <a class="collapse-item" href="index.php?p=company_table"> COmpanies Table  </a>
            </div>
          </div>
        </li>
       <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <a id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars" style="margin-top: 5px;"></i>
            </a>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>

              <!-- Nav Item - Users -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user-plus fa-fw" style="font-size: 23px;"></i>
                  <!-- Counter - Users -->
                  <span class="badge badge-danger badge-counter"> <?php   
                    $like_count=new admin();
                    $like_count->usersRegisterd();  ?></span>
                </a>
                <!-- Dropdown - users -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Users Center
                  </h6>
                  
                  <a class="dropdown-item text-center small text-gray-500" href="index.php?p=Users">Show All Users</a>
                </div>
              </li>
              <!-- Nav Item - Likes -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-thumbs-up fa-fw" style="font-size: 23px;"></i>
                  <!-- Counter - likes -->
                  <span class="badge badge-danger badge-counter"><?php   
                    $like_count=new admin();
                    $like_count->likesCount();  ?></span>
                </a>
                <!-- Dropdown - likes -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Likes Center
                  </h6>
                  <a class="dropdown-item text-center small text-gray-500"  href="#">You have
                    <?php   
                    $like_count=new admin();
                    $like_count->likesCount();  ?>
                   Likes</a>
                </div>
              </li>
              <!-- Nav Item - Comments -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-comment-dots fa-fw" style="font-size: 23px;"></i>
                  <!-- Counter - Comments -->
                  <span class="badge badge-danger badge-counter"><?php   
                    $like_count=new admin();
                    $like_count->commentCount();  ?></span>
                </a>
                <!-- Dropdown - Comments -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Comments Center
                  </h6>
                 
                  <a class="dropdown-item text-center small text-gray-500"  href="index.php?p=comments">Show All Comments</a>
                </div>
              </li>

              <!-- Nav Item - Messages -->
              <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-envelope fa-fw" style="font-size: 23px;"></i>
                  <!-- Counter - Messages -->
                  <span class="badge badge-danger badge-counter"><?php 
                                      $count= new admin();
                                      $count->messagesCount()?></span>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                  <h6 class="dropdown-header">
                   You have <?php 
                                      $count= new admin();
                                      $count->messagesCount()?>  unreaded private message

                  </h6>
                  
                    <?php
                   $connect=new connect();
                   $conn=$connect->getConn();
                   $admin_id=$_SESSION['admin_id'];
                   $msg_query ="SELECT * from messages where receiver_id='$admin_id' AND type='new' ORDER BY date ASC";
                   $result = $conn->query($msg_query);
                    ?>
              
                  <?php
                  while($row=mysqli_fetch_assoc($result)) {
                  $date=$row['date'];
                  $receiver_id=$row['receiver_id'];
                  $sender_id= $row['sender_id'];
                  //echo $sender_id;
                  $sender_query="SELECT * from users where user_id='$sender_id'";
                  $sender_result = $conn->query($sender_query);
                  $sender_row=mysqli_fetch_assoc($sender_result);
                  $sender_name=$sender_row['fname'];
                  //echo $sender_name;
                  $sender_profile=$sender_row['user_profile']; 
                  ?>
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <?php
                      if ($sender_profile!= null) {
                                echo "<img src=\"..\backend\image\uploadedProfiles/" . $sender_profile. "\"
                                alt=\"defImage\" style=\"padding:3px;height:45px;width:45px;\" class=\"img-rounded\">";
                            } else {
                                echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-responsive\" alt=\"defImage\" style=\"padding:3px;height:45px;width:45px;\" class=\"img-rounded\">";}
                            ?>                      <div class="status-indicator bg-success"></div>
                      </div>
                    <div class="font-weight-bold">
                      <div class="text-truncate"><?php echo "  " .$row['content'];?></div>
                      <div class="small text-gray-500"><?php echo ucwords($sender_name) ?> </div>
                    </div>
                    </a>
                  <?php } ?>
                  
                  
                  <a class="dropdown-item text-center small text-gray-500" href="index.php?p=display_message_table">Read More Messages</a>
                </div>
              </li>

              <div class="topbar-divider d-none d-sm-block"></div>

              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php  
                  $connect=new connect();
                  $conn=$connect->getConn();
                  $id = $_SESSION['admin_id'];
                  $query = "SELECT * FROM users where user_id='".$id."'";
                  $result = $conn->query($query);
                  $profile=null;
                  if ($result->num_rows > 0) {
                  $row= mysqli_fetch_array($result);
                  $profile = $row['user_profile'];
                  }
                  if ($profile != null) {
                  echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\" class=\"img-profile rounded-circle\" alt=\"\" style=\"height: 30px;\" name=\"output\">";
                  } else {
                  echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-profile rounded-circle\" alt=\"Profile\" style=\"height: 30px;\" name=\"output\">";
                  }
                  ?>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucwords($_SESSION['admin_name'])?> </span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="../backend/index.php?p=profile">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <a class="dropdown-item" href="index.php?p=display_message_table">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Check Inbox
                  </a>
                  <a class="dropdown-item" href="index.php?p=forgot_password">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Forgot password
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->
        <div class="row">
        <div class="col-lg-12 ">
        <div class="card" style="padding: 15px;">
         <?php
         if ((!isset($_SESSION["isAdminloggedin"]))){
         header("location:index.php");
         exit;
         }
        else {
        $switch_page=new switch_pages();
        $switch_page->pages($page);
        }
        ?>
        </div>
        </div>
        
        </div>

        </div>
        <!-- End of Main Content -->
        <!-- partial -->
        
       
         
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block" style="font-size:15px;">Copyright © 2019
              <a href="#">LIU ALUMNI ASSOCIATION</a>. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
        

      </div>
      <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <a class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            <a class="btn btn-primary" href="index.php?p=logout">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/actions.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
   <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
   
      <script src="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.js"></script>

<?php } ?>
  </body>

  </html>
