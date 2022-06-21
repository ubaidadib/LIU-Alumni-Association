
<?php

class admin {
public function display_overview(){
        ?><div class="card mb-4">
        <div class="card-header ">
          <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="index.php?p=home" style="text-decoration: none;">Home</a>
        </li>
        <li class="breadcrumb-item active">Overview !</li></ol>
        </div>
        <div class="card-body">
        <!-- Icon Cards row 1-->
        <div class="row">
        <div class="col-xl-4 col-sm-8 mb-4">
        <a class="text-white clearfix  z-1" href="index.php?p=show_posts" style="text-decoration:none;">
        <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-fw fa-sticky-note"></i>
        </div>
        <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:white;font-size:18px;">Posts!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="index.php?p=show_posts">
        <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">sharing post </span>
        <span class="float-right">
        <i class="fas fa-angle-right"></i>
        </span>
        </a>
        </div>
        </a>
        </div>
        <div class="col-xl-4 col-sm-8 mb-4">
        <a class="text-white clearfix  z-1" href="index.php?p=UsersList" style="text-decoration:none;">
        <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-fw fa-users "></i>
        </div>
        <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Public Users!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="index.php?p=UsersList">
        <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Users</span>
        <span class="float-right">
        <i class="fas fa-angle-right"></i>
        </span>
        </a>
        </div>
        </a>
        </div>
        <div class="col-xl-4 col-sm-8 mb-4">
        <a class="text-white clearfix  z-1" href="index.php?p=success_stories" style="text-decoration:none;">
        <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-fw fa-award"></i>
        </div>
        <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Success Stories!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="index.php?p=success_stories">
        <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">add a new success story</span>
        <span class="float-right">
        <i class="fas fa-angle-right"></i>
        </span>
        </a>
        </div>
        </a>
        </div>
        
        </div>
          <!-- Icon Cards row 2-->
        <div class="row">
          <div class="col-xl-4 col-sm-8 mb-4">
            <a class="text-white clearfix  z-1" href="index.php?p=admins" style="text-decoration:none;">
            <div class="card text-white  bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-secret"></i>
                </div>
                <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Administrator's!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?p=admins">
                <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Admin Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
            </a>
          </div>
    
          <div class="col-xl-4 col-sm-8 mb-4">
             <a class="text-white clearfix  z-1" href="index.php?p=alumni" style="text-decoration:none;">
            <div class="card text-white bg-secondary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-graduate"></i>
                </div>
                <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Alumni Students!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?p=alumni">
                <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Alumni Students</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
            </a>
          </div>
           <div class="col-xl-4 col-sm-8 mb-4">
           <a class="text-white clearfix  z-1" href="index.php?p=ceo" style="text-decoration:none;">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-user-tie "></i>
                </div>
                <div class="mr-5"style="font-family: 'Oswald', sans-serif;color:white;font-size:18px;"  >CEO's!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?p=ceo">
                <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View CEO's Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
            </a>
          </div>
        </div>
        <!-- Icon Cards row 3-->
        <div class="row">
          <div class="col-xl-4 col-sm-8 mb-4">
          <a class="text-white clearfix  z-1" href="index.php?p=companies" style="text-decoration:none;">
            <div class="card text-white bg-dark o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-building "></i>
                </div>
                <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:white;font-size:18px;">Companies!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="index.php?p=companies">
                <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Companies Details</span>
                <span class="float-right">
                <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
            </a>
          </div>
             <div class="col-xl-4 col-sm-8 mb-4">
        <a class="text-white clearfix  z-1" href="index.php?p=degree" style="text-decoration:none;">
        <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-fw fa-list-ol"></i>
        </div>
        <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Degree's!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="index.php?p=degree">
        <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Degree's</span>
        <span class="float-right">
        <i class="fas fa-angle-right"></i>
        </span>
        </a>
        </div>
        </a>
        </div>
                 <div class="col-xl-4 col-sm-8 mb-4">
        <a class="text-white clearfix  z-1" href="index.php?p=display_message_table" style="text-decoration:none;">
        <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-fw fa-list-ol"></i>
        </div>
        <div class="mr-5" style="font-family: 'Oswald', sans-serif;color:black;font-size:18px;">Messages!</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="index.php?p=display_message_table">
        <span class="float-left" style="font-family: 'Oswald', sans-serif;color:black;font-size:13px;">View Messages</span>
        <span class="float-right">
        <i class="fas fa-angle-right"></i>
        </span>
        </a>
        </div>
        </a>
        </div>
         
        </div>
        </div>
        
        </div><?php
}  

public function logout(){
			unset($_SESSION['isAdminloggedin']);
			$header_process=new header_process();
			$header_process->header("../frontend/index.php");
			exit;
       
}
public function appoint_admin(){
		$connect=new connect();
		$user_id = $_GET['user_id'];
        $conn=$connect->getConn();
        $appoint_admin_query = "UPDATE `users` SET `user_role_id`='3' WHERE `user_id`='".$user_id."'";
        $result = $conn->query($appoint_admin_query);
		if($result){
      echo "<script>
                Swal.fire('Good job!','A new admininstrator is appointed','success')</script>";
             echo "<a href='index.php?p=admins' style='text-center'>Admin Tables</a>";
             
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
		
}
public function appoint_user(){
		$connect=new connect();
		$user_id = $_GET['user_id'];
        $conn=$connect->getConn();
        $appoint_admin_query = "UPDATE `users` SET `user_role_id`='1' WHERE `user_id`='".$user_id."'";
        $result = $conn->query($appoint_admin_query);
		if($result){
      echo "<script>
                Swal.fire('Good job!','A new user is appointed','success')</script>";
               echo "<a href='index.php?p=UsersList' style='text-center'>User Tables</a>";
                //$header_process=new header_process();
                 //$header_process->header("index.php?p=UsersList");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
			
		
}			
public function edit_degree_info(){
			  $connect=new connect();
		      $conn=$connect->getConn();
			  $degree_id = $_GET['degree_id'];
			  $new_query = "select * from degree where degree_id=$degree_id";
			  $result = $conn->query($new_query);
			  $row=mysqli_fetch_array($result);
			  if ($result->num_rows > 0) {
              ?>
			  <!-- Breadcrumbs-->
			  <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
			  <li class="breadcrumb-item active">
              <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
              </li>
			  <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">Update Degree Details </a></li>
			  </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
			  <form method="POST" action="">
                 <div class="form-row">
                 <div class="form-group col-md-6">
                 <label for="inputEmail4">Degree ID</label>
                 <input type="text" value="<?=$row['degree_id']?>" class="form-control" name="id" id="inputPassword4" disabled>
                 </div>
                 <div class="form-group col-md-6">
                 <label for="inputPassword4">Degree Abbreviation</label>
                 <input type="text" placeholder="<?=$row['degree_abbreviation']?>"  class="form-control" name="degree_abbreviation" id="inputPassword4">
                 </div>
                 </div>
                 <div class="form-row">
                 <div class="form-group col-md-6">
                 <label for="inputEmail4">Degree Title</label>
                 <input type="text" placeholder="<?=$row['degree_title']?>" class="form-control" name="degree_title" id="inputPassword4">
                 </div>
                 <div class="form-group col-md-6">
                 <label for="inputPassword4">Credits Number</label>
                 <input type="text" placeholder="<?=$row['credits_number']?>" class="form-control" name="credits_number" id="inputPassword4">
                 </div>
                 </div>
                 <div class="form-row">
                 <div class="form-group col-md-6">
                 </div>
                 <div class="form-group col-md-6">
                 <button type="submit" class="btn btn-primary" name="update_info" id="update_info">UPDATE
                 <i class="fas fa-arrow-right"></i>
                 </button>
                 </div>
                 </div>
				 </form>
                 </div><?php $admin_update= filter_input(INPUT_POST, "update_info");
        							if(isset($admin_update)){
        							$comp_edit=new admin();
        							$comp_edit->update_degree_info();} 
        							}
}
public function update_degree_info(){
	        $connect=new connect();
            $conn=$connect->getConn();
            $degree_id=$_POST['degree_id'];
            $abbreviation=filter_input(INPUT_POST, 'degree_abbreviation');
            $title=filter_input(INPUT_POST, 'degree_title');
            $cnum= filter_input(INPUT_POST, 'credits_number');
    		    $query = "UPDATE `degree` SET `degree_abbreviation`='".$abbreviation."',`degree_title`='".$title."',`credits_number`='".$cnum."'  WHERE `degree_id`='".$degree_id."'";
    		    $result = $conn->query($query);
            if($result){
                  echo "<script>
                    Swal.fire('Good job!','Your degree Informations  is updated','success')</script>";
                  //$header=new header_process();
                 // $header->header("index.php?p=degree");
                 }
                 else{echo "<script>
                   Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
}
public function display_add_degree(){
	
	 ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item">
        <a href="index.php?p=degree">Home</a>
        </li><li class="breadcrumb-item active">Add New Degree </li>
		</ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;padding:7px;"> 
		<form method="post" action="#">
      <br>
         <div class="form-group">
         <label for="inputAddress">Degree Abbreviation</label>
         <input type="text" placeholder="B.S." class="form-control" name="degree_abb" id="degree_abb" required="required" id="inputAddress" >
         </div>
        <div class="form-group">
         <label for="inputAddress">Degree Title</label>
         <input type="text"  placeholder= "Bachelor of Science in..." class="form-control"  name="degree_title" id="degree_title" required="required" id="inputAddress" >
         </div>
         <div class="form-group">
         <label for="inputAddress">Credits Number</label>
         <input type="text"  placeholder= "number of credits" class="form-control"  name="credit_num" id="credit_num" required="required" id="inputAddress" >
         </div>
       
        <div class="input-group">
		<div class="col-md-10 mb-8"></div>
		<div class="col-md-2 mb-4">
        <button type="submit" class="btn btn-primary" name="degree_btn" id="degree_btn">ADD 
        <i class="fas fa-arrow-right"></i>
        </button></div>
        </div>
		</form> </div> <?php
						$add_degree= filter_input(INPUT_POST, "degree_btn");
						if(isset($add_degree)){
						$major=new admin();
						$major->add_degree();
					}
}
public function add_degree(){
	        $connect=new connect();
          $conn=$connect->getConn();
          $deg_abb=filter_input(INPUT_POST, 'degree_abb');
		      $deg_title=filter_input(INPUT_POST, 'degree_title');
          $credit_numb= filter_input(INPUT_POST, 'credit_num');
          $new_major_query ="INSERT INTO `degree` (`degree_id`, `degree_abbreviation`, `degree_title`, `credits_number`)
		      VALUES (NULL,'".$deg_abb."','".$deg_title."', '".$credit_numb."')";
          $result = $conn->query($new_major_query);
          if($result){
              echo "<script>
                Swal.fire('Good job!','Your degree  is added','success')</script>";
               //$header_process=new header_process();
                //$header_process->header("index.php?p=degree");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
		     
}
public function display_add_company(){
		?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item">
        <a href="index.php?p=companies">Home</a>
        </li><li class="breadcrumb-item active">Add New Company </li>
		</ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
		<form method="post" action="#" style="padding: 5px;">
        <h3>New Company</h3><br>
		    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Comapny Name </label>
        <input type="text" placeholder="" class="form-control" name="company_name" required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Comapny Address</label>
        <input type="text"  placeholder= "" class="form-control"  name="company_address" required="required"  id="inputPassword4" >
        </div>
        </div>
		    <div class="form-group">
        <label for="inputAddress"> Comapny Phone Number</label>
        <input type="text"  placeholder= "" class="form-control"  name="company_phone_number" id="inputAddress" required="required">
        </div>
        <div class="form-group">
        <label for="inputAddress">Comapny Specialization</label><br>
        <?php 
        $connect=new connect();
        $conn=$connect->getConn();
        $query = "SELECT * FROM `specialization`";
        $result = mysqli_query($conn, $query);
        ?>
        <select id="select" multiple="multiple" name="specOpt[]" class="form-custom">
        <?php while($row = mysqli_fetch_array($result)):;?>
        <option value="<?php echo $row['spec_id'];?>"><?php echo $row['spec_name'];?></option>
        <?php endwhile;?>
        </select>
        <script>
          $(function () {
            $('#select').multipleSelect({
              width: 520,
              placeholder: 'Select Company Specialization'
            })
          })
        </script>
        </div>
		    <div class="form-row">
        <div class="form-group col-md-6">
        </div>
        <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary" name="company_btn" id="register">ADD 
        <i class="fas fa-arrow-right"></i>
        </button>
        </div>
        </div>
        </form>
        </div> <?php
						$add_company= filter_input(INPUT_POST, "company_btn");
						if(isset($add_company)){
						$company=new admin();
						$company->add_company();
					}
}

public function dispaly_edit_company(){
                      $connect=new connect();
        		      $conn=$connect->getConn();
        			  $company_id = $_GET['company_id'];
        			  $new_query = "select * from companies where company_id=$company_id";
        			  $result = $conn->query($new_query);
        			  $row=mysqli_fetch_array($result);
        			  if ($result->num_rows > 0) {
                        ?>
			         <!-- Breadcrumbs-->
			         <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
			         <li class="breadcrumb-item active">
                     <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                     </li>
			         <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">        Update Company Details </a></li>
			         </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
			         <form method="POST" action="">
                     <br>
                     <div class="form-row">
                     <div class="form-group col-md-6">
                     <label for="inputEmail4">Company ID</label>
                     <input type="text" value="<?=$row['company_id']?>" class="form-control" name="id" disabled id="inputEmail4">
                     </div>
                     <div class="form-group col-md-6">
                     <label for="inputPassword4">Company Name</label>
                     <input type="text" value="<?=$row['company_name']?>"  class="form-control" name="company_name" id="inputPassword4">
                     </div>
                     </div>
                     <div class="form-row">
                     <div class="form-group col-md-6">
                     <label for="inputEmail4">Company Address</label>
                     <input value="<?=$row['company_address']?>" class="form-control" name="company_address" id="inputEmail4">
                     </div>
                     <div class="form-group col-md-6">
                     <label for="inputPassword4">Company Phone Number</label>
                     <input type="text" value="<?=$row['company_phonenumber']?>" class="form-control" name="company_phonenumber" id="inputPassword4">
                     </div>
                     </div>
				     <div class="form-group">
                     <label for="inputAddress">Company Specialization</label><br>
                      <?php 
                          $connect=new connect();
                          $conn=$connect->getConn();
                          $query = "SELECT * FROM `specialization`";
                          $result = mysqli_query($conn, $query);
                          ?>
                          <select id="select" multiple="multiple" name="specOpt[]" class="form-custom">
                          <?php while($row = mysqli_fetch_array($result)):;?>
                          <option value="<?php echo $row['spec_id'];?>"><?php echo $row['spec_name'];?></option>
                          <?php endwhile;?>
                          </select>
                          <script>
                            $(function () {
                              $('#select').multipleSelect({
                                width: 520,
                                placeholder: 'Select Company Specialization'
                      })
                     })
                     </script>
                     </div>
				     <input type="hidden" name="company_id" value="<?=$_GET['company_id'];?>" />
				     <div class="input-group">
				     <div class="col-md-10 mb-8"></div>
				     <div class="col-md-2 mb-4">
				     <button type="submit" class="btn btn-primary" name="update_info" id="update_info">UPDATE
				     <i class="fas fa-arrow-right"></i>
				     </button></div>
				     </div>
				 
				     </form></div><?php $admin_update= filter_input(INPUT_POST, "update_info");
							if(isset($admin_update)){
							$comp_edit=new admin();
							$comp_edit->update_company_info();} 
							}	
}
public function update_company_info(){
	         $connect=new connect();
             $conn=$connect->getConn();
             $company_id=$_POST['company_id'];
             $new_name=filter_input(INPUT_POST, 'company_name');
             $new_address=filter_input(INPUT_POST, 'company_address');
             $new_number= filter_input(INPUT_POST, 'company_phonenumber');
		     $query = "UPDATE `companies` SET `company_name`='".$new_name."',`company_address`='".$new_address."',`company_phonenumber`='".$new_number."'  WHERE `company_id`='".$company_id."'";
    		 $result = $conn->query($query);
             if($result){
              echo "<script>
                Swal.fire('Good job!','Your company information  is updated','success')</script>";
               $header=new header_process();
               $header->header("index.php?p=companies");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
    		
}
public function add_company(){
		        $connect=new connect();
                $conn=$connect->getConn();
                $comp_name=filter_input(INPUT_POST, 'company_name');
                $comp_address= filter_input(INPUT_POST, 'company_address');
		        $comp_numb=filter_input(INPUT_POST, 'company_phone_number');
                $new_company_query ="INSERT INTO `companies` (`company_id`,`company_name`, `company_phonenumber`, `company_address`)
                VALUES (NULL,'".$comp_name."','".$comp_numb."', '".$comp_address."')";
                $result = $conn->query($new_company_query);
                $get_comp_id="SELECT * from companies where company_name='".$comp_name."'";
                $get_comp_id_result=$conn->query($get_comp_id);
                while($row= mysqli_fetch_array($get_comp_id_result)){
                $comp_id=$row['company_id'];
                }
                foreach ($_POST['specOpt'] as $selectedOption){
                $new_company_relation_query ="INSERT INTO `company_spec_relation` (`company_id`,`spec_id`)
                VALUES ('".$comp_id."','".$selectedOption."' )";
                $result2 = $conn->query($new_company_relation_query);
                }
                if($result2){

                echo "<script>
                Swal.fire('Good job!','A New Company is Added','success')</script>";
                // $header_process=new header_process();
                //$header_process->header("index.php?p=companies");
                 }
                else{echo "<script>
                Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
		      
}
public function display_add_user(){
	
	 ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> Add User</li>
		</ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
		<form method="POST" action="#">
        <h3>New User</h3><br>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">First name</label>
        <input type="text" class="form-control" name="f_name" required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Last Name</label>
        <input type="text" class="form-control" name="l_name" required="required" id="inputPassword4" >
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Username</label>
        <input type="text" class="form-control" name="user_name" required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password"  class="form-control"  name="password" required="required" id="inputPassword4" >
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Gender</label>
        <select name="gender" id="" class="form-control" required="required"style="border: 2px solid #ddd; padding:7px;
        font-family: 'Exo', sans-serif;color:black;font-size:14px;">
        <option value="" disabled selected>Gender</option>
        <option value="male">Male</option>
        <option value="femal">Female</option>
        <option value="other">Other</option>
        </select>        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Phone number</label>
        <input type="text"  class="form-control"  name="phone_number" required="required" id="inputPassword4" >
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        </div>
        <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary" name="register" id="register">Register
        <i class="fas fa-arrow-right"></i>
        </button></div>
        </div>
        <input type="hidden" id="user_role_id" name="user_role_id" value="1">
        </form> 
        </div> <?php
						$user_register= filter_input(INPUT_POST, "register");
						if(isset($user_register)){
						$user=new admin();
						$user->add_user();
					}
}
public function display_add_admin(){
	?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> Add Administrator</li>
		</ol>
        <div class="container-fluid"> 
		<form method="POST" action="#">
        <br>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">First Name</label>
        <input type="text"  class="form-control" name="f_name" required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Last Name</label>
        <input type="text"  class="form-control" name="l_name" required="required" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Username</label>
        <input type="text"  class="form-control" name="user_name"  required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control"  name="password" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Gender</label>
        <select name="gender"  class="form-control" required="required" id="inputPassword4">
        <option value="" disabled selected>Gender</option>
        <option value="male">Male</option>
        <option value="femal">Female</option>
        <option value="other">Other</option>
        </select>
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Phone Number </label>
        <input type="text" class="form-control"  name="phone_number" id="inputPassword4">
        </div>
        </div>
        
        <input type="hidden" id="user_role_id" name="user_role_id" value="3">
        <div class="input-group">
		<div class="col-md-10 mb-8"></div>
		<div class="col-md-2 mb-4">
        <button type="submit" class="btn btn-primary" name="register" id="register">Register
        <i class="fas fa-arrow-right"></i>
        </button></div>
        </div>
		</form> </div> <?php
						$user_register= filter_input(INPUT_POST, "register");
						if(isset($user_register)){
						$user=new admin();
						$user->add_admin();
					}
}
public function display_add_alumni(){
	    ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item">
        <a href="index.php?p=home" style="text-decoration: none;">Home</a>
        </li><li class="breadcrumb-item active" ><a href="#" style="color: black;text-decoration: none;">General Information </a>
        </li>
        <li class="breadcrumb-item active">
        <a href="index.php?p=education" style="color: red; text-decoration: none;">Education Information</a>
        </li>
		</ol>
        <div class="container-fluid">
		<form method="post" action="#">
        <br>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">First Name</label>
        <input type="text"  class="form-control" name="f_name" required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Last Name</label>
        <input type="text"  class="form-control" name="l_name" required="required" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Username</label>
        <input type="text"  class="form-control" name="user_name"  required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control"  name="password" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Gender</label>
        <select name="gender"  class="form-control" required="required" id="inputPassword4">
        <option value="" disabled selected>Gender</option>
        <option value="male">Male</option>
        <option value="femal">Female</option>
        <option value="other">Other</option>
        </select>
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Phone Number </label>
        <input type="text" class="form-control"  name="phone_number" id="inputPassword4">
        </div>
        </div>
        <input type="hidden" id="user_role_id" name="user_role_id" value="2"><br>
		<div class="input-group">
		<div class="col-md-10 mb-8"></div>
		<div class="col-md-2 mb-4">
        <button type="submit" class="btn btn-primary" name="register" id="register">Continue
        <i class="fas fa-arrow-right"></i>
        </button>
        </div>
        </div>
		</form>
        </div><?php
            $user_register= filter_input(INPUT_POST, "register");
            if(isset($user_register)){
            $alumni=new admin();
            $alumni->add_alumni_gen();
          }
}

public function display_alumni_education(){
        $connect=new connect();
        $conn=$connect->getConn();
        $query = "SELECT * FROM `degree`";
        $result = mysqli_query($conn, $query);
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item">
        <a href="index.php?p=home" style="text-decoration: none;">Home</a>
        </li><li class="breadcrumb-item active" ><a href="index.php?p=add_alumni" style="color: black;text-decoration: none;">General Information </a>
        </li>
        <li class="breadcrumb-item active">
        <a href="#" style="color: red;text-decoration: none;">Education Information</a>
        </li>
        </ol><div class="container-fluid">
        <form method="post" action="#" enctype="multipart/form-data">
        <br>
        <div class="form-group">
        <label for="inputAddress">Graduation date</label>
        <input type="date" class="form-control"  name="graduation_date" id="inputAddress">
        </div>
        <div class="form-group">
        <label for="inputAddress">Major Title</label>
        <select class="form-control" id="inputAddress" name="degree">
        <option selected disabled>Choose  Alumni  Major Title </option>
        <?php while($row = mysqli_fetch_array($result)):;?>
        <option value="<?php echo $row['degree_id'];?>"><?php echo $row['degree_title'];?></option>
        <?php endwhile;?>
        </select>
        </div>
        <br>
        <input type="hidden" id="user_role_id" name="user_role_id" value="2">
        <div class="input-group">
        <div class="col-md-10 mb-8"></div>
        <div class="col-md-2 mb-4">
        <button type="submit" class="btn btn-primary" name="register" id="register">Register
        <i class="fas fa-arrow-right"></i>
        </button></div>
        </div>
        </form>
        </div> <?php
            $user_register= filter_input(INPUT_POST, "register");
            if(isset($user_register)){
            $alumni=new admin();
            $alumni->add_alumni_edu();
          }
}
public function display_add_ceo(){
	?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item">
        <a href="index.php?p=home">Home</a>
        </li><li class="breadcrumb-item active">Add New CEO </li>
		</ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;"> 
		<form method="POST" action="#">
        <h3>New CEO</h3><br>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">First Name</label>
        <input type="text"  class="form-control" name="f_name" required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Last Name</label>
        <input type="text"  class="form-control" name="l_name" required="required" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Username</label>
        <input type="text"  class="form-control" name="user_name"  required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control"  name="password" id="inputPassword4">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputEmail4">Date of Working</label>
        <input type="date" class="form-control"  name="working_since"  required="required" id="inputEmail4">
        </div>
        <div class="form-group col-md-6">
        <label for="inputPassword4">Gender</label>
        <select name="gender" id="inputPassword4" class="form-control" required="required">
        <option value="" disabled selected>Gender</option>
        <option value="male">Male</option>
        <option value="femal">Female</option>
        <option value="other">Other</option>
        </select>
        </div>
        </div>
		
        <div class="form-group">
        <label for="inputAddress">Companies </label>
        <?php 
         $connect=new connect();
         $conn=$connect->getConn();
         $query = "SELECT * FROM `companies`";
         $result = $conn->query($query);?>
         <select class="form-control" id="inputAddress" name="companies" >
         <option selected disabled>Choose CEO  Company name  ...</option>
         <?php while($row = mysqli_fetch_array($result)):;?>
         <option value="<?php echo $row['company_id'];?>"><?php echo $row['company_name'];?></option>
         <?php endwhile;?>
         </select>
		 </div>
		<input type="hidden" id="user_role_id" name="user_role_id" value="4">
        <div class="input-group">
		<div class="col-md-10 mb-8"></div>
		<div class="col-md-2 mb-4">
        <button type="submit" class="btn btn-primary" name="register" id="register">Register
        <i class="fas fa-arrow-right"></i>
        </button></div>
        </div>
		</form> </div> <?php
						$user_register= filter_input(INPUT_POST, "register");
						if(isset($user_register)){
						$ceo=new admin();
						$ceo->add_ceo();
					}
}
public function add_user(){
		 $connect=new connect();
		 $conn=$connect->getConn();
		 $user_role=filter_input(INPUT_POST,'user_role_id');
         $f_name=filter_input(INPUT_POST, 'f_name');
         $l_name=filter_input(INPUT_POST, 'l_name');
         $user_name=filter_input(INPUT_POST, 'user_name');
		 $user_password= filter_input(INPUT_POST, 'password');
         $user_nb= filter_input(INPUT_POST, 'phone_number');
         $user_gender= filter_input(INPUT_POST, 'gender');

         $password=md5($user_password);
		 $new_user_query ="INSERT INTO `users` (`user_id`, `user_role_id`, `fname`, `lname`, `gender`, `email`, `uni_email`, `username`, `password`, `birthdate`, `phone_number`, `user_profile`, `description`, `address`)
		 VALUES (NULL, '".$user_role."', '".$f_name."', '".$l_name."', '".$user_gender."', 'null', 'null', '".$user_name."', '".$password."', 'null', '".$user_nb."', '', 'null', 'null')";
		 $new_result = $conn->query($new_user_query); 
			 if($new_result){
            echo "<script>
                Swal.fire('Good job!','A New User is Added','success')</script>";
              //$header_process=new header_process();
              //$header_process->header("index.php?p=UsersList");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
}
public function add_admin(){
		     $connect=new connect();
		     $conn=$connect->getConn();
		     $user_role=filter_input(INPUT_POST,'user_role_id');
             $f_name=filter_input(INPUT_POST, 'f_name');
             $l_name=filter_input(INPUT_POST, 'l_name');
             $user_name=filter_input(INPUT_POST, 'user_name');
    		 $user_password= filter_input(INPUT_POST, 'password');
             $user_nb= filter_input(INPUT_POST, 'phone_number');
    		 $password=md5($user_password);
    		 $new_user_query ="INSERT INTO `users` (`user_id`, `user_role_id`, `fname`, `lname`, `gender`, `email`, `uni_email`, `username`, `password`, `birthdate`, `phone_number`, `user_profile`, `description`, `address`)
             VALUES (NULL, '".$user_role."', '".$f_name."', '".$l_name."', '".$user_gender."', 'null', 'null', '".$user_name."', '".$password."', 'null', '".$user_nb."', '', 'null', 'null')";
    		 $new_result = $conn->query($new_user_query); 
    			 if($new_result){
             echo "<script>
                Swal.fire('Good job!','A New Administrator is Added','success')</script>";
             // $header_process=new header_process();
              //$header_process->header("index.php?p=admins");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
}
public function add_alumni_gen(){
	            $connect=new connect();
		        $conn=$connect->getConn();
                $user_role=filter_input(INPUT_POST,'user_role_id');
		        $f_name=filter_input(INPUT_POST, 'f_name');
                $l_name=filter_input(INPUT_POST, 'l_name');
                $phone_number=filter_input(INPUT_POST, 'phone_number');
                $address=filter_input(INPUT_POST, 'address');
                $user_name=filter_input(INPUT_POST, 'user_name');
		        $user_password= filter_input(INPUT_POST, 'password');
                $password=md5($user_password);
		        $gn = $_POST['gender'];
		        $new_user_query ="INSERT INTO `users` (`user_id`, `user_role_id`, `fname`, `lname`, `gender`, `email`, `uni_email`, `username`, `password`, `birthdate`, `phone_number`, `user_profile`, `description`, `address`)
		        VALUES (NULL, '".$user_role."', '".$f_name."', '".$l_name."', '".$gn."', 'null', 'null', '".$user_name."', '".$password."', 'null', '".$phone_number."', '', 'null', '".$address."')";
		        $new_result = $conn->query($new_user_query);
		        if($new_result){
                $get_inserted_userID = "SELECT user_id from users WHERE phone_number='". $phone_number."'";
                $get_inserted_userID_result= $conn->query($get_inserted_userID);
                while($row= mysqli_fetch_array($get_inserted_userID_result)){
                 $user_id = $row['user_id'];
                }
                $header_process=new header_process();
                $header_process->header("index.php?p=education&id=$user_id");}
			    else{echo "<script>
                Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
}
public function add_alumni_edu(){
                $connect=new connect();
                $conn=$connect->getConn();
                $user_id=$_GET['id'];
                $grad_date=filter_input(INPUT_POST, 'graduation_date');
                $degree=$_POST['degree'];
                $alumni_query ="INSERT into alumni_users VALUES (NULL,'".$user_id."','null','".$grad_date."')";
                $alumni_result = $conn->query($alumni_query);
                if($alumni_result){
                //echo " alumni  inserted";
                }
                else{echo "<script>
                Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
                $get_inserted_alumniID = "SELECT user_id from alumni_users WHERE user_id='".$user_id."'";
                $get_inserted_alumniID_result= $conn->query($get_inserted_alumniID);
                while($row= mysqli_fetch_array($get_inserted_alumniID_result)){
                 $alumni_id = $row['user_id'];
                }
                 $studies_query ="INSERT into studies VALUES ('".$degree."','".$alumni_id."')";
                 $studies_result = $conn->query($studies_query);
                 if($studies_result){
                 echo "<script>
                 Swal.fire('Good job!','A New Alumni is Added','success')</script>";
                 } else{echo "<script>
                 Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
            
}
public function add_ceo(){
		 $connect=new connect();
		 $conn=$connect->getConn();
		 $user_role=filter_input(INPUT_POST,'user_role_id');
         $f_name=filter_input(INPUT_POST, 'f_name');
         $l_name=filter_input(INPUT_POST, 'l_name');
         $user_name=filter_input(INPUT_POST, 'user_name');
		 $user_password= filter_input(INPUT_POST, 'password');
		 $password=md5($user_password);
		 $work_from = $_POST['working_since'];
		 $available_comp = $_POST['companies'];
		 $gn = $_POST['gender'];
		 $new_user_query ="INSERT INTO `users` (`user_id`, `user_role_id`, `fname`, `lname`, `gender`, `email`, `uni_email`, `username`, `password`, `birthdate`, `phone_number`, `user_profile`, `description`, `address`)
		 VALUES (NULL, '".$user_role."', '".$f_name."', '".$l_name."', '".$gn."', 'null', 'null', '".$user_name."', '".$password."', 'null', 'null', '', 'null', 'null')";
			 $new_user_result = $conn->query($new_user_query); 
			 if($new_user_result){ echo "user  inserted";header("Refresh:0");}
			 else echo "user not inserted";
			 $get_inserted_userID = "SELECT user_id from users WHERE user_role_id='4'";
			 $get_inserted_userID_result= $conn->query($get_inserted_userID);
			 while($row= mysqli_fetch_array($get_inserted_userID_result)){
				 $user_id = $row['user_id'];
			 }
				 $ceo_query ="INSERT into ceo_users VALUES (NULL,'".$user_id."','".$available_comp."','".$work_from."')";
				 $ceo_result = $conn->query($ceo_query);
			 
			 if($ceo_result){
         echo "<script>
                Swal.fire('Good job!','A New CEO is Added','success')</script>";
             // $header_process=new header_process();
              //$header_process->header("index.php?p=ceo");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
}

public function likesCount(){
      $connect=new connect();
      $conn=$connect->getConn();
      $count=0;

      $query = "SELECT * from likes ";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         while($row= mysqli_fetch_assoc($result)){
          $count++;
         }
         echo $count ;
      }
      else{echo "0";}
}
public function commentCount(){
      $connect=new connect();
      $conn=$connect->getConn();
      $count=0;
      $query = "SELECT * from comments";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         while($row= mysqli_fetch_assoc($result)){
          $count++;
         }
         echo $count ;
      }
      else{echo "0";}
}
public function usersRegisterd(){
      $connect=new connect();
      $conn=$connect->getConn();
      $count=0;
      $query = "SELECT * from users";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         while($row= mysqli_fetch_assoc($result)){
          $count++;
         }
         echo $count ;
      }
      else{echo "0";}
}
public function messagesCount(){
   $connect=new connect();
      $conn=$connect->getConn();
      $count=0;
      $admin_id=$_SESSION['admin_id'];
      $query = "SELECT * from messages where receiver_id='$admin_id' and type='new'";
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
         while($row= mysqli_fetch_assoc($result)){
          $count++;
         }
         echo $count ;
      }
      else{echo "0";}
}
public function display_edit_user_role(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_id=$_GET['user_id'];
        $user_query = "SELECT * from users NATURAL JOIN user_role where user_id='$user_id'";
        $result = $conn->query($user_query);
        $row=mysqli_fetch_assoc($result);
        if ($result->num_rows > 0) {
          
             ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Edit User Details</a></li>
        </ol>
        <div class="container-fluid">
        <form method="POST" action=""  style="padding:5px;">
            <br><br>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>User ID </b></label>
                <input  type="text" value="<?=$row['user_id']?>" class="form-control" name="id" disabled id="inputPassword4" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4"><b>User Role</b></label>
                <?php 
                     $connect=new connect();
                     $conn=$connect->getConn();
                     $query = "SELECT * FROM `user_role`";
                     $result = $conn->query($query);?>
                     <div class="input-group mb-4">
                     <select class="form-control" id="user_role_id" required="required" name="user_role_id">
                     <option selected disabled>Choose User Role  ...</option>
                     <?php while($row2 = mysqli_fetch_array($result)):;?>
                     <option value="<?php echo $row2['user_role_id'];?>"><?php echo $row2['role'];?></option>
                     <?php endwhile;?>
                     </select>
                    </div>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>User First Name  </b></label>
                <input type="text" value="<?=$row['fname'];?>"  class="form-control" name="fname" id="inputPassword4" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4"><b>User Last Name</b></label>
                <input type="text" value="<?=$row['lname'];?>"  class="form-control" name="lname" id="inputPassword4" >
                </div>
                </div><br>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>Username  </b></label>
                <input type="text" value="<?=$row['username']?>" class="form-control" name="username" id="inputPassword4" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4"><b>Phone number</b></label>
                <input type="text" value="<?=$row['phone_number']?>" class="form-control" name="phone_number" id="inputPassword4" >
                </div>
                </div>
              
              
                <input type="hidden" name="user_id" value="<?=$_GET['user_id'];?>" />
                <div class="input-group">
                <div class="col-md-10 mb-8"></div>
                <div class="col-md-2 mb-4">
                <button type="submit" class="btn btn-primary" name="update_info" id="update_info">UPDATE
                <i class="fas fa-arrow-right"></i>
                </button>
                </div>
                </div>
                </form></div><?php 
                                $user_role= filter_input(INPUT_POST, "update_info");
                                if(isset($user_role)){
                                $new_role=new admin();
                                $new_role->edit_user_role();} 
                                }
}
public function edit_user_role(){
        $connect=new connect();
        $user_id = $_GET['user_id'];
        $conn=$connect->getConn();
        $role_id=$_POST['user_role_id'];
        echo $role_id;
        $new_fname=filter_input(INPUT_POST, 'fname');
        $new_lname=filter_input(INPUT_POST, 'lname');
        $new_username=filter_input(INPUT_POST, 'username');
        $new_number= filter_input(INPUT_POST, 'phone_number');
        if($role_id!=null){
           $user_edit_query = "UPDATE `users` SET  `fname`='".$new_fname."',`lname`='".$new_lname."',`username`='".$new_username."',`phone_number`='".$new_number."',`user_role_id`='".$role_id."' WHERE `user_id`='".$user_id."'";
        $result = $conn->query($user_edit_query);
        if($result){
          echo "<script>
                Swal.fire('Good job!','User Role is Updated Successfully','success')</script>";
             // $header_process=new header_process();
        //$header_process->header("index.php?p=UsersList");
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
        
        }else
        echo"<h2>You have to specify User Role!</h2>";
}


}
