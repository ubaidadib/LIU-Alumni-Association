<?php
include 'config/included_functions.php';
$ob_start = ob_start();
$session_start = session_start();
$ob_end_flush = ob_end_flush();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>LIU ALUMNI ASSOCIATION</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="css/return-to-top.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/extraStyle.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- font awesome link -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- css style for home page -->
        <link href="css/list-group-item.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.css">
        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Sweet Alert link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MultipleSelectList library -->

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.js"></script>
        <style>
            .count-notif{
                vertical-align:middle;
                margin-left:-15px;
                margin-top: -18px;
                font-size:11px;
            }
        </style>
    </head>


    <body>
        <!--<header class="home_banner_area"></header>--> 

        <nav class="navbar navbar-expand-md  bg-light navbar-light sticky-top" >
            <!-- Brand -->
            <a class="navbar-brand" href="index.php?p=home">
                <h4> LIU ALUMNI ASSOCIATION</h4>
            </a>
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mr-auto">
                    <?php if (!(isset($_SESSION["isUserloggedin"]) && ($_SESSION['isUserloggedin']) == 1)) {
                        ?>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav">
                    <?php if (!(isset($_SESSION["isUserloggedin"]) && ($_SESSION['isUserloggedin']) == 1)) { ?>
                        <li class="nav-item <?php
                        if ($page == "home") {
                            echo "active";
                        }
                        ?>">
                            <a class="nav-link" href="index.php?p=home"><span class="fas fa-home"></span>&nbsp;Home</a>
                        </li>
                        <li class="nav-item <?php
                        if ($page == "login") {
                            echo "active";
                        }
                        ?>" >
                            <a class="nav-link" href="index.php?p=login"><span class="fas fa-sign-in-alt"></span>&nbsp; Log In</a></li>
                    <?php } else { ?>

                        <li class="nav-item <?php
                        if ($page == "userHome") {
                            echo "active";
                        }
                        ?>" >
                            <a class="nav-link" href="index.php?p=userHome" data-toggle="tooltip" title="Home" >
                                <i class="fas fa-home" style="font-size: 25px;margin-top: 2px;"></i></a>
                        </li>
                        <li class="nav-item dropdown" >
                            <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="fab fa-facebook-messenger" style="font-size: 25px;margin-top: 2px;">
                                    <span class="badge badge-pill badge-danger count-notif">
                                        <?php
                                        $msg_count = new userHome();
                                        $msg_count->display_message_count();
                                        ?>  
                                    </span>
                                </i>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right ">
                                <h6 class="dropdown-header">You have
                                  <?php
                                        $msg_count = new userHome();
                                        $msg_count->display_message_count();
                                        ?> Messages
                                </h6>
                                <div class="dropdown-divider"></div>
                                <?php
                                $connect = new connect();
                                $conn = $connect->getConn();
                                $user_id = $_SESSION['user_id'];
                                $msg_query = "SELECT * from messages where receiver_id='$user_id' GROUP BY date ORDER BY date ASC";
                                $result = $conn->query($msg_query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date = $row['date'];
                                    $msg_id = $row['message_id'];
                                    $receiver_id = $row['receiver_id'];
                                    $sender_id = $row['sender_id'];
                                    $msg = $row['content'];
                                    //echo $sender_id;
                                    $sender_query = "SELECT * from users where user_id='$sender_id'";
                                    $sender_result = $conn->query($sender_query);
                                    $sender_row = mysqli_fetch_assoc($sender_result);
                                    $sender_name = $sender_row['fname'];
                                    //echo $sender_name;
                                    $sender_profile = $sender_row['user_profile'];
                                    ?>
                                <!-- member list -->
                                    <a  data-toggle="tooltip" title="View Message!" 
                                        href="index.php?p=messages&amp;msg_id=<?= $msg_id; ?>&amp;snd=<?php echo $sender_id; ?>" 
                                    class="dropdown-item"
                                    style="text-decoration: none;color: black;"
                                    >
                                    <div class="media p-2 border-bottom">

                                                <?php
                                                if ($sender_profile != null) {
                                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $sender_profile . "\"
                                                alt=\"Image\" style=\"width:55px;height:55px;\" class=\"mr-3 rounded-circle\">";
                                                } else {
                                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"mr-3 rounded-circle\" alt=\defImage\" style=\"width:55px;\">";
                                                }
                                                ?><br>
                                                <div class="media-body">
                                                    <p>
                                                    </p>
                                                    <p><?php echo "<b style='color:black;'> " . ucwords($sender_name) . "</b>"."<small>&nbsp;&nbsp;sended you a message at</small>" ?>
                                                        <small>&nbsp;<i class="fas fa-clock"><?php echo " " . substr($date, 11, -3); ?></i></small>
                                                    </p>
                                                    <br>
                                                   
                                                </div>
                                                <br>
                                            </div>
                                        </a><br>

                                <?php } ?>


                            </div>
                        </li> 




                        <!-- Notifications -->

                        <li class="nav-item dropdown" >
                            <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell fa-fw" style="font-size: 25px;margin-top: 2px;"> </i>
                                <span class="badge badge-pill badge-danger count-notif">
                                    <?php
                                    $notif_count = new userHome();
                                    $notif_count->display_notification_count();
                                    ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right ">
                            <h6 class="dropdown-header">You have
                                           <?php
                                           $msg_count = new userHome();
                                           $msg_count->display_notification_count();
                                           ?> Notifications
                                                            </h6>
                                <div class="dropdown-divider"></div>
                                <?php
                                $connect = new connect();
                                $conn = $connect->getConn();
                                $user_id = $_SESSION['user_id'];
                                $post_query = "SELECT * from posts  where user_id='$user_id' ";
                                $post_result = $conn->query($post_query);
                                while ($post_row = mysqli_fetch_assoc($post_result)) {
                                    $post_id = $post_row['post_id'];
                                    $msg_query = "SELECT * from comments Natural join users   where post_id='$post_id' and user_id!='$user_id' GROUP BY user_id ";
                                    $result = $conn->query($msg_query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $comment_id = $row['id'];
                                        $comment_date = $row['date'];
                                        $user_name = $row['fname'] . " " . $row['lname'];
                                        $commentator_id = $row['user_id'];
                                        $sender_profile = $row['user_profile'];

                                        //echo $sender_name;
                                        ?>
                                        <!-- =============================================================== -->
                                        <!-- member list -->
                                        <a   href="index.php?p=postcomment&amp;post_id=<?php echo $post_id; ?>&amp;id_2=<?php echo $commentator_id; ?>" 
                                             class="dropdown-item"
                                             style="text-decoration: none;color: black;"

                                             >

                                            <div class="media">

                                                <?php
                                                if ($sender_profile != null) {
                                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $sender_profile . "\"
                                                alt=\"defImage\" style=\"width:55px;height:55px;\" class=\"mt-3 mr-1 rounded-circle\">";
                                                } else {
                                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"mt-3 mr-1 rounded-circle\" alt=\defImage\" style=\"width:55px;\">";
                                                }
                                                ?>
                                                <div class="media-body">
                                                    <p><?php echo " " . ucwords($user_name) . " " . "<small>commented on your post </small>" ?>
                                                        <?php
                                                        if ($post_row['image_path'] != null) {
                                                            echo "<img src=\"..\backend\image\postsImage/" . $post_row['image_path'] . "\"alt=\"Image\" style=\"width:75px;height:50px;\" name=\"output\" class=\"mt-3 mr-1\">";
                                                        }
                                                        ?><br>
                                                        <small><i class="fas fa-clock"><?php echo " " . substr($comment_date, 11, -3); ?></i></small>
                                                    </p>
                                                </div>
                                                <br>
                                            </div>
                                        </a><br>

                                        <?php
                                    }
                                }
                                ?>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li> 

                        <li class="nav-item avatar <?php
                        if ($page == "profile") {
                            echo "active";
                        }
                        ?>" >
                            <a  class="nav-link" href="index.php?p=profile" data-toggle="tooltip" title="Profile" style="margin-top: 1px;" >
                                <?php
                                $connect = new connect();
                                $conn = $connect->getConn();
                                $id = $_SESSION['user_id'];
                                $query = "SELECT * FROM users where user_id='" . $id . "'";
                                $result = $conn->query($query);
                                if ($result->num_rows > 0) {
                                    $row = mysqli_fetch_array($result);
                                    $profile = $row['user_profile'];
                                }
                                if ($profile != null) {
                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\" class=\"rounded-circle z-depth-0\" alt=\"\" style=\"width:30px;height:30px;\" name=\"output\">";
                                } else {
                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-xs rounded-circle z-depth-0\" alt=\"defProfile\" style=\"width:30px;height:30px;\" name=\"output\">";
                                }
                                ?>
                                <?= ucwords($row['fname']) ?></a></li>
                        <!-- MORE Options  Dropdown -->
                        <li class="nav-item dropdown " style="margin-top:3px;font-size: 17px;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" >
                                <span>More</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left ">
                                <a class="dropdown-item <?php
                                if ($page == "contact_us") {
                                    echo "active";
                                }
                                ?>"href="index.php?p=contact_us"><span class="fas fa-mobile-alt"></span>&nbsp;Contact us </a>
                                <a class="dropdown-item <?php
                                if ($page == "setting") {
                                    echo "active";
                                }
                                ?>" href="index.php?p=account">
                                    <span class="fas fa-cog"></span> Settings</a>
                                <a class="dropdown-item <?php
                                if ($page == "logout") {
                                    echo "active";
                                }
                                ?>"href="#" data-toggle="modal" data-target="#logoutModal">
                                    <span class="fas fa-sign-out-alt"></span> Sign out </a>
                            </div>
                        </li>
                    <?php } ?> 
                </ul>
            </div> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </nav>
        <div class="container" style="margin-top:1%;" >    
            <div class="row">
                <?php
                $switch_pages = new switch_pages();
                $switch_pages->pages($page);
                ?>
            </div>
        </div>
        <br><br><br>
        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex text-center">
                    <p class="col-lg-12 footer-text ">© 2019 Lebanese International University. All Rights Reserved. <br><br></p>
                </div>
                <div class="text-center">
                    <a class="" href="#"><i class="fab fa-facebook fa-2x"></i></a>&nbsp;&nbsp;
                    <a class="" href="#"><i class="fab fa-twitter fa-2x"></i></a>&nbsp;&nbsp;
                    <a class="" href="#"><i class="fab fa-instagram fa-2x" ></i></a>&nbsp;&nbsp;
                    <a class="" href="#"><i class="fas fa-envelope fa-2x"></i></a>
                </div>
            </div>
        </div>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Sign out" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary"  data-dismiss="modal">Cancel</a>
                        <a class="btn btn-primary" href="index.php?p=logout">Sign Out</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Return to Top -->
        <a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i></a>
        <!-- for scroll up animation -->	
        <!-- Page level plugin JavaScript-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/multiple-select@1.3.0/dist/multiple-select.min.js"></script>
        <script src="../frontend/pages/users/js/actions.js" type="text/javascript"></script>
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/datatables-demo.js"></script>

        <script src="js/script.js"></script>
        <script>
            // ===== Scroll to Top ==== 
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                    $('#return-to-top').fadeIn(200);    // Fade in the arrow
                } else {
                    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
                }
            });
            $('#return-to-top').click(function () {      // When arrow is clicked
                $('body,html').animate({
                    scrollTop: 0                       // Scroll to top of body
                }, 500);
            });
        </script>

    </body>	
</html>