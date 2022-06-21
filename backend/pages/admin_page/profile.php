<?php

class profile{
  
public function display_account(){
		
		$connect=new connect();
        $conn=$connect->getConn();
		$user_id=$_SESSION['admin_id'];
        $user_query = "SELECT * from users where user_id='$user_id'";
        $result = $conn->query($user_query);
		$row=mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
        ?>
		<!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="index.php?p=profile" style="text-decoration:none;color:#007CF8;">General Information </a></li>
		<li class="breadcrumb-item active "> <a href="index.php?p=security" style="text-decoration:none;color:red;">Security</a></li>
		</ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
		<form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                <div class="form-group row" style="margin-left:10px;">
					<?php  
					        $connect=new connect();
							$conn=$connect->getConn();
							$id = $_SESSION['admin_id'];
                            $query = "SELECT * FROM users where user_id='".$id."'";
							$result = $conn->query($query);
                             if ($result->num_rows > 0) {
								$row= mysqli_fetch_array($result);
                                $profile = $row['user_profile'];
                            }
                             if ($profile != null) {
                                echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\" class=\"img-xs rounded-circle\" id=\"output\" alt=\"\" style=\"height: 200px; width: 200px;\" name=\"output\">";
                            } else {
                                echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-xs rounded-circle\" alt=\"Profile\" style=\"height: 27px;\" name=\"output\" id=\"output\">";
                            }?>
                </div>
                <div class="form-row">
    			<div class="form-group col-md-6">
     			 <label for="inputEmail4"><b>#ID </b></label>
      			 <input type="text" value="<?=$row['user_id']?>" id="inputEmail4" 
      			 class="form-control" name="id" disabled style="border: 2px solid #ddd; padding:7px;
				 font-family: 'Exo', sans-serif;color:black;font-size:14px;" />
    			</div>
    			<div class="form-group col-md-6">
     			 <label for="inputEmail4"><b>Address </b></label>
      			 <input type="text" value="<?=$row['address']?>" value="<?=$row['address']?>"
      			 id="inputEmail4"  value="" class="form-control" name="address" style="border: 2px solid #ddd; padding:7px;
				 font-family: 'Exo', sans-serif;color:black;font-size:14px;"/>
    			</div>
    			</div>
    			 <div class="form-row">
    			<div class="form-group col-md-6">
     			 <label for="inputEmail4"><b>First name </b></label>
      			 <input type="text" value="<?=$row['fname']?>"  class="form-control" name="fname"
      			 id="inputEmail4"   style="border: 2px solid #ddd; padding:7px;
				 font-family: 'Exo', sans-serif;color:black;font-size:14px;"/>
    			</div>
    			<div class="form-group col-md-6">
     			 <label for="inputEmail4"><b>Last name </b></label>
      			 <input type="text" value="<?=$row['lname']?>"  class="form-control"
      			 id="inputEmail4"  name="lname"  style="border: 2px solid #ddd; padding:7px;
				 font-family: 'Exo', sans-serif;color:black;font-size:14px;" />
    			</div>
    			</div>

    			 <div class="form-row">
    			<div class="form-group col-md-6">
     			 <label for="inputEmail4"><b>Birthdate</b></label>
      			 <input type="text" id="inputEmail4" 
      			  value="<?=$row['birthdate']?>"   class="form-control" name="birthdate"/>
    			</div>
    			<div class="form-group col-md-6">
     			 <label for="inputEmail4"><b>Phone number</b></label>
				<input type="text" value="<?=$row['phone_number']?>"id="inputEmail4"   class="form-control" name="phone_number" />
				</div>
    			</div>

    			 <div class="form-row">
    			<div class="form-group col-md-6">
     			 <label><b>Gender</b></label>
 				 <select name="admin_gender" id="" class="form-control" required="required" style="border:2px solid   #ddd; padding:7px;
				 font-family: 'Exo', sans-serif;color:black;font-size:14px;" >
					 <option value="" disabled selected>Gender</option>
					 <option value="male">Male</option>
					 <option value="femal">Female</option>
					 <option value="other">Other</option>
					 </select>
    			</div>
    			<div class="form-group col-md-6">
     			 <label for="inputEmail4"><b>Profile photo</b></label>
				<input type="file" name="profileImages" id="uploadedImage" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none" />&nbsp;&nbsp;&nbsp;
				<img id="output" width="250" />
				<label for="uploadedImage"  class="form-control btn border border-primary">Upload  Image</label>
				</div>
    			</div>

    			 <div class="form-row">
    			<div class="form-group col-md-6">
     			</div>
    			<div class="form-group col-md-6">
     			 <button type="submit" class="btn btn-primary" name="update_profile" id="update_profile">UPDATE
				 <i class="fas fa-arrow-right"></i>
				 </button>
				</div>
    			</div>
				</form></div>
				<script>
				var loadFile = function(event) {
				var image = document.getElementById('output');
				image.src = URL.createObjectURL(event.target.files[0]);
				};
			  </script><?php 
							$genInfo_update= filter_input(INPUT_POST, "update_profile");
							if(isset($genInfo_update)){
							$admin=new profile();
							$admin->update_profile();}
							}
}  
public function update_profile(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_id=$_SESSION["admin_id"];
        $f_name=filter_input(INPUT_POST, 'fname');
        $l_name=filter_input(INPUT_POST, 'lname');
        $user_address=filter_input(INPUT_POST, 'address');
		$user_gender= $_POST['admin_gender'];
		//uploaded file info's
		$n = $_FILES['profileImages']['name'];
		$s = $_FILES['profileImages']['size'];
		$t = $_FILES['profileImages']['tmp_name'];
		$e = $_FILES['profileImages']['error'];
		$ty = $_FILES['profileImages']['type'];
		move_uploaded_file($t, "../backend/image/uploadedProfiles/".$user_id. "_" .$n);
		$path =$user_id."_".$n;
		$query = "UPDATE `users` SET `fname` ='".$f_name."', `lname` = '".$l_name."',`phone_number`='".$_POST['phone_number']."',`address`='".$user_address."',`user_profile`='".$path."',`gender`='".$user_gender."',`birthdate`='".$_POST['birthdate']."'  WHERE `user_id`='".$user_id."'";
        $result = $conn->query($query);
         if($result){
              echo "<script>
                Swal.fire('Good job!','Your General Information is updated','success')</script>";
               //$header=new header_process();
       			 //$header->header("index.php?p=profile");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
       
}
public function display_security(){
		$connect=new connect();
        $conn=$connect->getConn();
		$user_id=$_SESSION['admin_id'];
        $user_query = "SELECT * from users where user_id='$user_id'";
        $result = $conn->query($user_query);
		$row=mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
        ?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="index.php?p=admin_profile" style="text-decoration:none;color:#007CF8;">General Information </a></li>
		<li class="breadcrumb-item active "> <a href="index.php?p=security" style="text-decoration:none;color:#ff2626;">Security</a></li>
		</ol>
		<div class="container-fluid">
			
		<form method="POST" action="">
				<div class="form-row">
	    		<div class="form-group col-md-6">
	      		<label for="inputEmail4">Username</label>
	      		<input type="text" value="<?=$row['username']?>" class="form-control" name="username" disabled id="inputEmail4"/>
	    		</div>
	    		<div class="form-group col-md-6">
	      		<label for="inputPassword4">Email</label>
	      		 <input type="email" value="<?=$row['email']?>" class="form-control" name="email" id="inputEmail4"/>
	    		</div>
	  			</div>
	  			<div class="form-row">
	    		<div class="form-group col-md-6">
	      		<label for="inputEmail4">New Username</label>
	      		<input type="text" value="<?=$row['username']?>"  class="form-control" name="new_username" id="inputEmail4"  />
	    		</div>
	    		<div class="form-group col-md-6">
	      		<label for="inputPassword4">Old Password</label>
	      		 <input type="password" value="<?=$row['password']?>" class="form-control" name="pass0" disabled id="inputEmail4"/>
	    		</div>
	  			</div>
	  			<div class="form-row">
	    		<div class="form-group col-md-6">
	      		<label for="inputEmail4">New Password</label>
	      		<input type="password" placeholder="********************" class="form-control" name="pass1" id="inputEmail4"  />
	    		</div>
	    		<div class="form-group col-md-6">
	      		<label for="inputPassword4">Confirmed Password</label>
	      		 <input type="password" placeholder="********************" class="form-control" name="pass2`" disabled id="inputEmail4"/>
	    		</div>
	  			</div>
	  			<div class="form-row">
	    		<div class="form-group col-md-6">
	      		
	    		</div>
	    		<div class="form-group col-md-6">
	      		<button type="submit" class="btn btn-primary" name="update_security" id="update_security">UPDATE
				 <i class="fas fa-arrow-right"></i>
				 </button>
	    		</div>
	  			</div>
				</form>
				</div><?php $admin_update= filter_input(INPUT_POST, "update_security");
							if(isset($admin_update)){
							$admin=new profile();
							$admin->update_security();} 
							}
}
public function update_security(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_id=$_SESSION["admin_id"];
        $email=filter_input(INPUT_POST, 'email');
        $new_username=filter_input(INPUT_POST, 'new_username');
        $new_pass=filter_input(INPUT_POST, 'pass1');
        $new_pass_conf= filter_input(INPUT_POST, 'pass2');
		$query = "UPDATE `users` SET `username`='".$new_username."',`email`='".$email."',`password`='".$new_pass."'  WHERE `user_id`='".$user_id."'";
		$result = $conn->query($query);
		 if($result){
              echo "<script>
                Swal.fire('Good job!','Your Security Informations is updated','success')</script>";
               // $header=new header_process();
				//$header->header("index.php?p=security");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
		
}	
public function display_image_profile(){
	
							$connect=new connect();
							$conn=$connect->getConn();
							$id = $_SESSION['admin_id'];
                            $query = "SELECT * FROM users where user_id='".$id."'";
							$result = $conn->query($query);
                             if ($result->num_rows > 0) {
								$row= mysqli_fetch_array($result);
                                $profile = $row['user_profile'];
                            }
                             if ($profile != null) {
                                echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\" class=\"img-xs rounded-circle\" alt=\"\" style=\"height: 200px; width: 200px;\" name=\"output\">";
                            } else {
                             echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-xs rounded-circle\" alt=\"Profile\" style=\"height: 27px;\" name=\"output\">";
                            }
}

public function display_forgot_password(){
	    $connect=new connect();
        $conn=$connect->getConn();
		$user_id=$_SESSION['admin_id'];
        $user_query = "SELECT * from users where user_id='$user_id'";
        $result = $conn->query($user_query);
		$row=mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
        ?>
		<!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:red;">Forgot Password</a></li>
		</ol><div class="container-fluid">
		<form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
			<div class="form-group">
    		<label for="exampleInputEmail1"><b>Username</b></label>
    		<input type="text" placeholder="<?=$row['username']?>" id="exampleInputEmail1"  class="form-control" name="username">
    		</div>
    		<div class="form-group">
    		<label for="exampleInputEmail1"><b>Email</b></label>
    		<input type="text" placeholder="<?=$row['email']?>"  class="form-control" name="email"  id="exampleInputEmail1">
    		</div><br>
			<div class="input-group row  ">
				 <div class="col-md-10 "></div>
				 <div class="col-md-2 ">
				 <button type="submit" class="btn btn-primary" name="forget_pass" id="forget_pass">Forgot ! 
				 <i class="fas fa-arrow-right"></i>
				 </button></div>
				 </div>
				</form>
				<?php 
							$forget_pass= filter_input(INPUT_POST, "forget_pass");
							if(isset($forget_pass)){
							$admin=new profile();
							$admin->forgot_password();}
							}
}							
public function forgot_password(){//how to activate mail() on a local server
	    $connect=new connect();
        $conn=$connect->getConn();
        $email=filter_input(INPUT_POST, 'email');
        $username=$_POST['username'];
		$user_query = "SELECT * from users  where username='$username' and email='$email'";
		$result = $conn->query($user_query);
		$row = mysqli_fetch_assoc($result);
		$pass=($row['password']);
		if($result){
              echo "<script>
                Swal.fire('Your Password is :','$pass','success')</script>";
               // $header=new header_process();
				//$header->header("index.php?p=security");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
		
}

}
