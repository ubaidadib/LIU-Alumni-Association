 

<?php

class users {

    public function display_login() {
        ?>	
        <div class="container" style="margin-top:15px;">
            <div class="row">
                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-4">
                    <div class="form-box">
                        <div class="form-top" style=" background: #f8f8f8;padding: 5px;" >
                            <div class="form-top">
                                <h3>Login to our site</h3>
                                <p>Enter username and password to log on:</p>
                            </div>
                        </div>
                        <div class="form-bottom" style=" background: #f8f8f8;padding: 5px;">
                            <form role="form" action="#" method="POST" class="login-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Username</label>
                                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" style="border: 2px solid #ddd;">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" style ="border: 2px solid #ddd;">
                                </div>
                                <button type="submit" name="user_login" class="btn btn-primary">Sign in!</button>
                            </form>
                        </div>
                    </div>
                    <div class="social-login">
                    </div>
                </div>
                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-1 middle-border"></div>
                <div class="col-sm-4" style="margin-left:30px; background: #f8f8f8;padding: 5px;">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left"  style="padding: 5px;">
                                <h3>Sign up now</h3>
                                <p>Fill in the form below to get instant access:</p>
                            </div>

                        </div>
                        <div class="form-bottom">
                            <form role="form" action="#" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">First name</label>
                                    <input type="text" name="f_name" placeholder="First name..." class="form-first-name form-control" id="form-first-name" required=""
                                           oninvalid="this.setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')"
                                           style="border: 2px solid #ddd;" >
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Last name</label>
                                    <input type="text" name="l_name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name"
                                           required="" oninvalid="this.setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')"
                                           style="border: 2px solid #ddd;"  >
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-gender">Gender</label>
                                    <select name="gender" class="form-gender form-control" id="form-gender" 
                                            required="" oninvalid="this.setCustomValidity('Please select your gender')" oninput="setCustomValidity('')"
                                            style="border: 2px solid #ddd;" >
                                        <option value="" disabled selected>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="femal">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="email" placeholder="Email..." class="form-control"  
                                           required="" oninvalid="this.setCustomValidity('Please enter your email')" oninput="setCustomValidity('')" 
                                           style="border: 2px solid #ddd;" >
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Username</label>
                                    <input type="text" name="user_name" placeholder="Username..." class="form-control"
                                           required="" oninvalid="this.setCustomValidity('Please enter your username')" oninput="setCustomValidity('')"
                                           style="border: 2px solid #ddd;">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-phone">Password</label>
                                    <input type="password" name="user_password" placeholder="Password..." class="form-control"  
                                           required="" oninvalid="this.setCustomValidity('Please enter your password')" oninput="setCustomValidity('')"
                                           style="border: 2px solid #ddd;" >
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-phone">Confirm Password</label>
                                    <input type="password" name="user_password_2"  placeholder="Confirm Password..." class="form-control" 
                                           required="" oninvalid="this.setCustomValidity('Please enter your confirmed password')" oninput="setCustomValidity('')"
                                           style="border: 2px solid #ddd;">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-phone">Phone</label>
                                    <input type="text" name="user_phone" placeholder="Phone..." class="form-control"  
                                           required="" oninvalid="this.setCustomValidity('Please enter your phone number')" oninput="setCustomValidity('')"
                                           style="border: 2px solid #ddd;" >
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-about-yourself">Address</label>
                                    <textarea name="user_address" placeholder="Address..." 
                                              class="form-about-yourself form-control" id="form-about-yourself" 
                                              required="" oninvalid="this.setCustomValidity('Please enter your address')" oninput="setCustomValidity('')"
                                              style="border: 2px solid #ddd;" ></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="user_register" >Sign me up!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php
        $user_login = filter_input(INPUT_POST, "user_login");
        $user_register = filter_input(INPUT_POST, "user_register");
        if (isset($user_login)) {
            $user = new users();
            $user->Login_page();
        }
        if (isset($user_register)) {
            $user = new users();
            $user->register();
        }
    }

    function Login_page() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_name = filter_input(INPUT_POST, 'username');
        $user_password = filter_input(INPUT_POST, 'password');
        $password = md5($user_password);
        $user_query = "SELECT * FROM users WHERE username='" . $user_name . "' AND password='" . $password . "' LIMIT 1";
        $result = $conn->query($user_query);
        if ($result->num_rows == 1) {
            while ($row = mysqli_fetch_array($result)) {
                $user_id = $row['user_id'];
                $user_role = $row['user_role_id'];
                $user_profile = $row['user_profile'];
                $u_name = ucwords($row['fname'] . " " . $row['lname']);
            }

            switch ($user_role) {
                case '1':
                    session_start();
                    $_SESSION['isUserloggedin'] = 1;
                    $_SESSION["u_name"] = $u_name;
                    $_SESSION["user_id"] = $user_id;
                    $header_process = new header_process();
                    $header_process->header("index.php?p=userHome");
                    break;
                case '2':
                    session_start();
                    $_SESSION['isUserloggedin'] = 1;
                    $_SESSION["u_name"] = $u_name;
                    $_SESSION["user_id"] = $user_id;
                    $header_process = new header_process();
                    $header_process->header("index.php?p=userHome");
                    break;

                case '3':
                    session_start();
                    $_SESSION["isAdminloggedin"] = 1;
                    $_SESSION["admin_name"] = $u_name;
                    $_SESSION["admin_id"] = $user_id;
                    $_SESSION["profile_photo_path"] = $user_profile;
                    $header_process = new header_process();
                    $header_process->header("../backend/index.php");
                    break;
                default:
                    break;
            }
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Username or Password is Incorrect.'})</script>";
        }
    }

    function register() {

        $connect = new connect();
        $conn = $connect->getConn();
        $f_name = filter_input(INPUT_POST, 'f_name');
        $l_name = filter_input(INPUT_POST, 'l_name');
        $user_gender = $_POST['gender'];
        $user_email = filter_input(INPUT_POST, 'email');
        $user_phone = filter_input(INPUT_POST, 'user_phone');
        $user_name = filter_input(INPUT_POST, 'user_name');
        $user_address = filter_input(INPUT_POST, 'user_address');
        $password_1 = filter_input(INPUT_POST, 'user_password');
        $password_2 = filter_input(INPUT_POST, 'user_password_2');


        $user_query = "SELECT * from users where phone_number='$user_phone' ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'This User: $user_name is already registered !'})</script>";
        } else {
            $password = md5($password_1);
            $new_user_query = "INSERT INTO `users`(`user_id`, `user_role_id`, `fname`, `lname`, `gender`, `email`, `uni_email`, `username`, `password`, `birthdate`, `phone_number`, `user_profile`, `description`, `address`)
				VALUES (NULL,'1','" . $f_name . "', '" . $l_name . "','" . $user_gender . "','" . $user_email . "','null', '" . $user_name . "', '" . $password . "','null', '" . $user_phone . "', '', 'null','" . $user_address . "');";
            $new_result = $conn->query($new_user_query);
            if ($new_result) {
                echo "<script>
                Swal.fire('Welcome Dear !',', Now you are able to Sign In and Enjoy your time in our website using $user_name .','success')</script>";
            } else {
                echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
            }
        }
    }

    function display_account() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from users where user_id='" . $user_id . "'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?><div class="container" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#generalInfo" style="color: black;" >General Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#security" style="color: darkblue;">Security & Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#education" style="color: red;">Education</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="generalInfo" class="container tab-pane active"><br>
                        <form method="POST" action="#" class=""  enctype="multipart/form-data">
                            <br>
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
                echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\" class=\"rounded-circle\" alt=\"Profile\" style=\"height: 200px; width: 200px;\"name=\"output\" id=\"output\">";
            } else {
                echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"rounded-circle\" alt=\"defProfile\" style=\"height: 200px; width: 200px;\" name=\"output\" id=\"output\">";
            }
            ?>
                            <br><br><br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">#ID</label>
                                    <input  type="text" value="<?= $row['user_id'] ?>" class="form-control" name="id" disabled />
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Address</label>
                                    <input type="text" value="<?= $row['address'] ?>" class="form-control" name="address"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">First name</label>
                                    <input type="text" value="<?= $row['fname'] ?>" class="form-control" name="fname"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Last name </label>
                                    <input type="text" value="<?= $row['lname'] ?>" class="form-control" name="lname"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Birthdate</label>
                                    <input type="date" value="<?= $row['birthdate'] ?>" class="form-control" name="birthdate"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Phone number</label>
                                    <input type="text" value="<?= $row['phone_number'] ?>" class="form-control" name="phone_number"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Gender</label>
                                    <select name="gender" id="" class="form-control" value="<?= $row['gender'] ?>" required="required"  >
                                        <option value="" disabled selected>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="femal">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Upload  Image</label><br>

                                    <input type="file" name="profileImages" id="profileImages" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: block" />&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary" name="update_profile" id="update_profile">UPDATE
                                        <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="security" class="container tab-pane fade"><br>
                        <form method="POST" action="#" class="" >
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Current Username</label>
                                    <input type="text" value="<?= $row['username'] ?>" class="form-control" name="username" disabled/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Private Email</label>
                                    <input type="email" value="<?= $row['email'] ?>" class="form-control" name="email"/>
                                </div>
                            </div>	
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">New  Username</label>
                                    <input type="text" value="<?= $row['username'] ?>"  class="form-control" name="new_username"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Old Password</label>
                                    <input type="password" value="<?= $row['password'] ?>" class="form-control" name="pass0" disabled/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">New Password</label>
                                    <input type="password" value="<?= $row['password'] ?>" class="form-control" name="pass1"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Confirm New Password </label>
                                    <input type="password" value="<?= $row['password'] ?>" class="form-control" name="pass2"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary" name="update_security" id="update_security">UPDATE
                                        <i class="fas fa-arrow-right"></i></button>
                                </div>
                            </div>	
                        </form>
                    </div>

                    <div id="education" class="container tab-pane fade"><br>
            <?php
            $connect = new connect();
            $conn = $connect->getConn();
            $id = $_SESSION['user_id'];
            $edu_query = "SELECT * from alumni_users NATURAL JOIN studies NATURAL JOIN degree  where user_id='" . $id . "'";
            $edu_result = $conn->query($edu_query);
            $edu_row = mysqli_fetch_array($edu_result);
            $rowcount = mysqli_num_rows($edu_result);
            $query = "SELECT * FROM `degree`";
            $result = mysqli_query($conn, $query);
            $result2 = mysqli_query($conn, $query);
            ?>	
                        <form method="POST" action="#" class=""  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputEmail4"><b>Major Title</b></label>
                                <select class="form-control" id="inputAddress" name="degree">
                                    <option selected disabled>Choose  Your  Major Title </option>
            <?php while ($row2 = mysqli_fetch_array($result2)):; ?>
                                        <option value="<?php echo $row2['degree_id']; ?>"><?php echo $row2['degree_title']; ?></option>
            <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>Graduation Dat</b></label>
                                <input type="date" value="<?= $edu_row['graduation_date'] ?>" class="form-control" name="graduation_date" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>CV File</b></label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="200000" /><br>
                                <input type="file" name="pdfFile"/><br />
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary" name="update_education" id="update_education">UPDATE
                                        <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </div>		
                        </form>
                    </div>
                </div>
            </div>
                <script>
                    var loadFile = function (event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script><?php
            $genInfo_update = filter_input(INPUT_POST, "update_profile");
            $secInfo_update = filter_input(INPUT_POST, "update_security");
            $eduInfo_update = filter_input(INPUT_POST, "update_education");
            if (isset($genInfo_update)) {
                $user = new users();
                $user->update_profile();
            }
            if (isset($secInfo_update)) {
                $admin = new users();
                $admin->update_security();
            }
            if (isset($eduInfo_update)) {
                $admin = new users();
                $admin->update_education();
            }
        }
    }

    public function update_profile() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $f_name = filter_input(INPUT_POST, 'fname');
        $l_name = filter_input(INPUT_POST, 'lname');
        $user_address = filter_input(INPUT_POST, 'address');
        $user_gender = $_POST['user_gender'];
        //uploaded file info's
        $n = $_FILES['profileImages']['name'];
        $s = $_FILES['profileImages']['size'];
        $t = $_FILES['profileImages']['tmp_name'];
        $e = $_FILES['profileImages']['error'];
        $ty = $_FILES['profileImages']['type'];
        move_uploaded_file($t, "../backend\image\uploadedProfiles/" . $user_id . "_" . $n);
        $path = $user_id . "_" . $n;
        $query = "UPDATE `users` SET `fname` ='" . $f_name . "', `lname` = '" . $l_name . "',`phone_number`='" . $_POST['phone_number'] . "',`address`='" . $user_address . "',`user_profile`='" . $path . "',`gender`='" . $user_gender . "',`birthdate`='" . $_POST['birthdate'] . "'  WHERE `user_id`='" . $user_id . "'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                Swal.fire('Good Job !','Your General Informations are added','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function update_education() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $major_id = $_POST['degree'];
        $graduation_date = filter_input(INPUT_POST, 'graduation_date');
        //uploaded file info's
        if (!empty($_FILES['pdfFile']['name'])) {
            $n = $_FILES['pdfFile']['name'];
            $s = $_FILES['pdfFile']['size'];
            $t = $_FILES['pdfFile']['tmp_name'];
            $e = $_FILES['pdfFile']['error'];
            $ty = $_FILES['pdfFile']['type'];
            $source_file = $t;
            $dest_file = "pdf_files/" . $user_id . "_" . $n;
             move_uploaded_file($t, "../frontend\pdf_files/" . $user_id . "_" . $n);
                   
            
        $path = $user_id . "_" . $n;
        $query_1 = "UPDATE `alumni_users` SET "
                . "`cv_file`='$path' WHERE user_id='$user_id'";
        $result_1 = $conn->query($query_1);
        $query_2 = "SELECT * FROM `alumni_users` WHERE user_id='$user_id'";
        $result_2 = $conn->query($query_2);
        $row = mysqli_fetch_assoc($result_2);
        $alumni_id = $row['user_id'];
        $query_3 = "INSERT INTO `studies`(`degree_id`, `user_id`) VALUES ('" . $major_id . "','" . $alumni_id . "')";
        $result_3 = $conn->query($query_3);
        if ($result_3) {
            echo "<script>
                Swal.fire('Good Job !','Your Education Informations are added','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
        } else {
             echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'PDF File Not Exists!'})</script>";
        }
    }

    public function update_security() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION["user_id"];
        $email = filter_input(INPUT_POST, 'email');
        $new_username = filter_input(INPUT_POST, 'new_username');
        $new_pass = filter_input(INPUT_POST, 'pass1');
        $new_pass_conf = filter_input(INPUT_POST, 'pass2');
        $query = "UPDATE `users` SET `username`='" . $new_username . "',`email`='" . $email . "',`password`='" . $new_pass . "'  WHERE `user_id`='" . $user_id . "'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                Swal.fire('Good job!','You Security Informations are added ','success')</script>";
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_image_profile() {

        $connect = new connect();
        $conn = $connect->getConn();
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM users where user_id='" . $id . "'";
        $result = $conn->query($query);
        $profile = '';
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_array($result);
            $profile = $row['user_profile'];
        }
        if ($profile != null) {
            echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\" class=\"img-circle\" alt=\"\" style=\"height: 200px;width: 200px;\" name=\"output\">";
        } else {
            echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-circle\" alt=\"defProfile\" style=\"height: 200px;width: 200px;\" name=\"output\">";
        }
    }

    public function logout() {

        unset($_SESSION['isUserloggedin']);
        $header_process = new header_process();
        $header_process->header("index.php");
        exit;
    }

    public function carousal() {
        ?>
            <!--Carousel Wrapper-->
            <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
                    <li data-target="#video-carousel-example2" data-slide-to="1"></li>
                    <li data-target="#video-carousel-example2" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <!-- First slide -->
                    <div class="carousel-item active">
                        <!--Mask color-->
                        <div class="view">
                            <!--Video source-->
                            <video class="video-fluid" autoplay loop muted>
                                <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
                            </video>
                            <div class="mask rgba-indigo-light"></div>
                        </div>

                        <!--Caption-->
                        <div class="carousel-caption">
                            <div class="animated fadeInDown">
                                <h3 class="h3-responsive">Light mask</h3>
                                <p>First text</p>
                            </div>
                        </div>
                        <!--Caption-->
                    </div>
                    <!-- /.First slide -->

                    <!-- Second slide -->
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                            <!--Video source-->
                            <video class="video-fluid" autoplay loop muted>
                                <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
                            </video>
                            <div class="mask rgba-purple-slight"></div>
                        </div>

                        <!--Caption-->
                        <div class="carousel-caption">
                            <div class="animated fadeInDown">
                                <h3 class="h3-responsive">Super light mask</h3>
                                <p>Secondary text</p>
                            </div>
                        </div>
                        <!--Caption-->
                    </div>
                    <!-- /.Second slide -->

                    <!-- Third slide -->
                    <div class="carousel-item">
                        <!--Mask color-->
                        <div class="view">
                            <!--Video source-->
                            <video class="video-fluid" autoplay loop muted>
                                <source src="https://mdbootstrap.com/img/video/Tropical.mp4" type="video/mp4" />
                            </video>
                            <div class="mask rgba-black-strong"></div>
                        </div>

                        <!--Caption-->
                        <div class="carousel-caption">
                            <div class="animated fadeInDown">
                                <h3 class="h3-responsive">Strong mask</h3>
                                <p>Third text</p>
                            </div>
                        </div>
                        <!--Caption-->
                    </div>
                    <!-- /.Third slide -->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--Carousel Wrapper-->
            <script type="text/javascript">
                $('.carousel').carousel()
            </script>


            <?php
        }

    }
    