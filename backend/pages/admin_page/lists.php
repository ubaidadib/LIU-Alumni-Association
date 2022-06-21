
<?php

class lists {

public function user_list(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN user_role where user_role_id='1'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Users List </a></li>
		<li class="breadcrumb-item active "> <a href="index.php?p=add_user" style="text-decoration:none;color:red;">Add Users</a></li>
		</ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
        <h2>Users</h2>
        <div class="table-responsive" >
        <table id="dataTable" class="table  table-bordered" cellspacing="0" width="100%" style="padding:10px; margin:5px;">
        <thead>
        <tr>
		<th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>PhoneNumber</th>
        <th>User Role</th>
         <th>Actions</th>
        </tr>
        </thead>
		<tfoot>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>User Role </th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_assoc($result)){?>
                <tr>
				<td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["phone_number"];?></td>
                <td><?php echo $row["role"];?></td>
                <td > 
	       <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
				<i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Delete Modal-->
				<div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Do you want to delete the user</div>
				<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
				<!-- Delete Modal End -->
				</div>
				</div>
				</div>
				</div>
                <a href="index.php?p=edit_user&amp;user_id=<?php echo $row["user_id"]; ?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Edit User Role!">
				<i class="fas fa-edit"></i></a>
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php } else {
					?>	<!-- Breadcrumbs-->
						<ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
						<li class="breadcrumb-item active">
						<a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
						</li>
						<li class="breadcrumb-item active "> <a href="index.php?p=add_user" style="text-decoration:none;color:#579E77;">Add Users</a></li>
						</ol> <?php echo "<h2>No Users Yet! </h2>";
						}}
                        

public function users(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN user_role";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
         <!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active ">Users </li>
        </ol>   
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>PhoneNumber</th>
        <th>User Role</th>
         <th>Actions</th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>User Role </th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_assoc($result)){?>
                <tr>
                <td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["phone_number"];?></td>
                <td><?php echo $row["role"];?></td>
                <td > 
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Delete Modal-->
                <div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete the user</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
                <!-- Delete Modal End -->
                </div>
                </div>
                </div>
                </div>
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php } else {
                    ?>  <!-- Breadcrumbs-->
                        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                        <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                        </li>
                        </ol> <?php echo "<h2>No Users Yet! </h2>";
                        }}
public function alumni(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN user_role where user_role_id='2'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
        <!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Alumni List </a></li>
        </ol>
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>PhoneNumber</th>
        <th>User Role</th>
         <th>Actions</th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>User Role </th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_assoc($result)){?>
                <tr>
                <td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["phone_number"];?></td>
                <td><?php echo $row["role"];?></td>
                <td > 
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Delete Modal-->
                <div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete this alumni</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
                <!-- Delete Modal End -->
                </div>
                </div>
                </div>
                </div>
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php } else {
                    ?>  <!-- Breadcrumbs-->
                        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                        <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                        </li>
                        </ol> <?php echo "<h2>No Alumni Yet! </h2>";
                        }}

public function admin(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN user_role where user_role_id='3'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
        <h2>Administrators</h2>
        <!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Administrator List </a></li>
        </ol>
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="padding:10px; margin:5px;">
        <thead>
        <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>PhoneNumber</th>
        <th>User Role</th>
         <th>Actions</th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>User Role </th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_assoc($result)){?>
                <tr>
                <td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["phone_number"];?></td>
                <td><?php echo $row["role"];?></td>
                <td > 
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Delete Modal-->
                <div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete the user</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
                <!-- Delete Modal End -->
                </div>
                </div>
                </div>
                </div>
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php } else {
                    ?>  <!-- Breadcrumbs-->
                        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                        <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                        </li>
                        </ol> <?php echo "<h2>No Administrator Yet! </h2>";
                        }}
public function ceo(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN user_role where user_role_id='4'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">CEO List </a></li>
        </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
        <h2>Users</h2>
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%" style="padding:10px; margin:5px;">
        <thead>
        <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>PhoneNumber</th>
        <th>User Role</th>
         <th>Actions</th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>User Role </th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_assoc($result)){?>
                <tr>
                <td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["phone_number"];?></td>
                <td><?php echo $row["role"];?></td>
                <td > 
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Delete Modal-->
                <div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete the user</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
                <!-- Delete Modal End -->
                </div>
                </div>
                </div>
                </div>
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php } else {
                    ?>  <!-- Breadcrumbs-->
                        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                        <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                        </li>
                        </ol> <?php echo "<h2>No CEO  Yet! </h2>";
                        }}
public function companies(){
                $connect=new connect();
                $conn=$connect->getConn();
                $user_query = "SELECT * FROM `companies`NATURAL Join `company_spec_relation`NATURAL Join `specialization` WHERE 1";
                $result = $conn->query($user_query);
                if ($result->num_rows > 0) {?>
                <div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
				<!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Companies List </a></li>
                </ol>
                <div class="row" style="margin:10px;">
                <?php   
                while($row= mysqli_fetch_array($result)){?>
                <div class="col-md-4">
                <div class="card  border-primary " style="height:400px;" >
                <div class="card-header"><?php //echo "Manages By :" ." ".ucwords($row['fname'])." ".ucwords($row['lname']);?></div>
                <div class="card-body text-primary">
                <h4 class="card-title" style="color:darkred;"><?php echo $row['company_name'];?></h4><hr>
                <p class="card-text" ><?php echo '<i class="fas  fa-map-marker-alt"> &nbsp; &nbsp;</i>' .$row['company_address'];?></p>
                <p class="card-text"><?php echo '<i class="fas fa-mobile-alt"> &nbsp; &nbsp;</i>'.$row['company_phonenumber'];?></p>
                <p class="card-text"><?php echo '<i class="fas fa-briefcase"> &nbsp; &nbsp;</i>'.substr($row['spec_name'],0,55)?></p>
                </div>
                <div class="card-footer text-muted text-center">
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["company_id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>        
                <div class="modal fade" id="delete_it<?php echo $row["company_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete this company!</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "companies"; ?>','company_id','<?php echo $row["company_id"]; ?>')" class="btn btn-primary" >Delete</button>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div><br>
                </div>
                <?php } ?>
                <hr>
                </div>
                
                </div><?php } else { ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
                        <li class="breadcrumb-item active">
                        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                        </li>
                        </ol><?php echo "<h2>No Companies Yet! </h2>";}}
public function admin_list(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN user_role where user_role_id='3'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?>
		<div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
       <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Admin List </a></li>
        <li class="breadcrumb-item active "> <a href="index.php?p=add_admin" style="text-decoration:none;color:#ff0000;">Add Administrator  </a></li>
        </ol>
                   
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
		<th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Phone Number</th>
        <th>Email</th>
         <th>Actions</th>
        </tr>
        </thead>
		<tfoot>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>Email </th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_array($result)){?>
                <tr>
				<td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["phone_number"];?></td>
                <td><?php echo $row["email"];?></td>
                <td >   
               
				<a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
				<i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Logout Modal-->
				<div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Do you want to delete the user</div>
				<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
				</div>
				</div>
				</div>
				</div>
				<a href="index.php?p=appoint_user&amp;user_id=<?=$row["user_id"];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Appoint as Public User!">
				<i class="fas fa-edit" aria-hidden="true"></i></a>
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php }else {	
				?><!-- Breadcrumbs-->
				<ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
				<li class="breadcrumb-item active">
				<a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
				</li>
				<li class="breadcrumb-item active "> <a href="index.php?p=add_admin" style="text-decoration:none;color:#007CF8;">Add Administrator  </a></li>
				</ol><?php
				echo "<h2>No Administrator Yet! </h2>";} }
public function alumni_list(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN alumni_users where user_role_id='2'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?>
		<div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif; margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Alumni List </a></li>
        <li class="breadcrumb-item active "> <a href="index.php?p=add_alumni" style="text-decoration:none;color:#ff0000;">Add Alumni</a></li>
        </ol>          
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
		<th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>PhoneNumber</th>
		<th>Email</th>
		
         <th>Actions</th>
        </tr>
        </thead>
		<tfoot>
        <tr>
		<th>#ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>PhoneNumber</th>
		<th>Email</th>
		<th>Actions</th>
        </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_array($result)){?>
                <tr>
				<td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                <td><?php echo $row["username"];?></td>
                <td><?php echo $row["phone_number"];?></td>
				<td><?php echo $row["email"];?></td>
				
                <td >   
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
				<i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Logout Modal-->
				<div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Do you want to delete the alumni ?</div>
				<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
				</div>
				</div>
				</div>
				</div>
				<a href="index.php?p=appoint_admin&amp;user_id=<?=$row["user_id"];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Appoint as Administrator ?">
                <i class="fas fa-edit" aria-hidden="true"></i></a>	
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php } else {?>
				<!-- Breadcrumbs-->
				<ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
				<li class="breadcrumb-item active">
				<a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
				</li>
				<li class="breadcrumb-item active "> <a href="index.php?p=add_alumni" style="text-decoration:none;color:#007CF8;">Add Alumni</a></li>
				</ol><?php echo "<h2>No Alumni Yet! </h2>";}	
				}				
public function degree_list(){
        $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from degree ";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?>
		<!-- Breadcrumbs-->
        <div class="container" style="padding:15px;font-family: 'Exo', sans-serif;">
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Degree Lists </a></li>
        <li class="breadcrumb-item active "> <a href="index.php?p=display_add_degree" style="text-decoration:none;color:red;">Add Degree  </a></li>
        </ol>
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
		<th>#ID</th>
        <th>Degree Abbreviation</th>
        <th>Degree Title</th>
		<th>Credits</th>
        <th>Actions</th>
        </tr>
        </thead>
		<tfoot>
         <tr>
		<th>#ID</th>
        <th>Degree Abbreviation</th>
        <th>Degree Title</th>
		<th>Credits</th>
        <th>Actions</th>
        </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_array($result)){?>
                <tr>
				<td><?php echo $row["degree_id"];?></td>
                <td><?php echo $row["degree_abbreviation"];?></td>
                <td><?php echo $row["degree_title"];?></td>
				<td><?php echo $row["credits_number"];?></td>

                <td> 
								
				<a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["degree_id"]; ?>">
				<i class="fas fa-trash" aria-hidden="true"></i></a>       
				<div class="modal fade" id="delete_it<?php echo $row["degree_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Do you want to delete this degree?</div>
				<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button onclick="delete_from_table('<?php echo "degree"; ?>','degree_id','<?php echo $row["degree_id"]; ?>')" class="btn btn-primary" >Delete</button>
				</div>
				</div>
				</div>
				</div>
                <a href="index.php?p=edit_degree_info&amp;degree_id=<?=$row['degree_id'];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Edit Major?">
                <i class="fas fa-edit" aria-hidden="true"></i></a>
				</td>
			    </tr><?php } ?>
                </tbody>
                </table>
                </div></div><?php } else {
					?>	<!-- Breadcrumbs-->
						<ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
						<li class="breadcrumb-item active">
						<a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
						</li>
						<li class="breadcrumb-item active "> <a href="index.php?p=display_add_degree" style="text-decoration:none;color:green;">Add Degree  </a></li>
						</ol><?php 
						echo "<h2>No Degree's Yet! </h2>";} }	
public function companies_list(){
				$connect=new connect();
				$conn=$connect->getConn();
				$user_query ="SELECT * FROM `companies`NATURAL Join `company_spec_relation`NATURAL Join `specialization` WHERE 1";
				$result = $conn->query($user_query);
				if ($result->num_rows > 0) {?>
				<div class="container" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
				<!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Companies List </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=add_company" style="text-decoration:none;color:#007CF8;">Add Company </a></li>
                </ol>
				<div class="row" style="margin:10px;">
				
				<?php  	
                while($row= mysqli_fetch_array($result)){
                        $comp_id=$row['company_id'];?>
				<div class="col-md-4">
				<div class="card  border-primary " style="height:400px;" >
				<div class="card-header"><?php echo "#ID :" ." ".$row['company_id'];?></div>
				<div class="card-body text-primary">
				<h4 class="card-title" style="color:darkred;"><?php echo $row['company_name'];?></h4><hr>
                <p class="card-text" style="color:black;" ><?php echo '<i class="fas  fa-map-marker-alt"> &nbsp; &nbsp;</i>' .$row['company_address'];?></p>
                <p class="card-text"><?php echo '<i class="fas fa-mobile-alt"> &nbsp; &nbsp;</i>'.$row['company_phonenumber'];?></p>
                <p class="card-text" style="color:darkgreen;">
                    <?php echo '<i class="fas fa-briefcase"> &nbsp; &nbsp;</i>'.substr($row['spec_name'],0,55)?></p>
                </div>
				<div class="card-footer text-muted text-center">
				<a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["company_id"]; ?>">
				<i class="fas fa-trash" aria-hidden="true"></i></a>        
				<div class="modal fade" id="delete_it<?php echo $row["company_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Do you want to delete this company!</div>
				<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button onclick="delete_from_table('<?php echo "companies"; ?>','company_id','<?php echo $row["company_id"]; ?>')" class="btn btn-primary" >Delete</button>
				</div>
				</div>
				</div>
				</div>
				<a href="index.php?p=dispaly_edit_company&amp;company_id=<?= $row['company_id'];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Edit Company Details!">
				<i class="fas fa-edit" aria-hidden="true"></i></a> 
                </div>
				</div><br>
				</div>
				<?php } ?>
				<hr>
                </div>
				
				</div><?php } else { ?><!-- Breadcrumbs--><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
						<li class="breadcrumb-item active">
						<a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
						</li>
						<li class="breadcrumb-item active "> <a href="index.php?p=add_company" style="text-decoration:none;color:#007CF8;">Add Company </a></li>
						</ol><?php echo "<h2>No Companies Yet! </h2>";}}						
public function ceo_list(){
	    $connect=new connect();
        $conn=$connect->getConn();
        $user_query = "SELECT * from users NATURAL JOIN ceo_users where user_role_id='4'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?>
		<!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">CEO's List </a></li>
		<li class="breadcrumb-item active "> <a href="index.php?p=add_ceo" style="text-decoration:none;color:#007CF8;">Add CEO </a></li>
		</ol>
        
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
		<th>#ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Gender</th>
        <th>PhoneNumber</th>
        <th>Email</th>
		<th>CEO since </th>
        <th>Actions</th>
        </tr>
        </thead>
		
        <tbody><?php 
                while($row= mysqli_fetch_array($result)){?>
                <tr>
				<td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." ".$row['lname'];?></td>
                <td><?php echo $row["address"];?></td>
                <td><?php echo $row["gender"];?></td>
                <td><?php echo $row["phone_number"];?></td>
                <td><?php echo $row["email"];?></td>
				<td><?php echo $row["date"];?></td>
                <td >   
				<a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["user_id"]; ?>">
				<i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Logout Modal-->
				<div class="modal fade" id="delete_it<?php echo $row["user_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Do you want to delete the ceo  ?</div>
				<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button onclick="delete_from_table('<?php echo "users"; ?>','user_id','<?php echo $row["user_id"]; ?>')" class="btn btn-primary" >Delete</button>
				</div>
				</div>
				</div>
				</div>
				<a href="index.php?p=appoint_admin&amp;user_id=<?=$row["user_id"];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Appoint as Administrator ?">
                <i class="fas fa-edit" aria-hidden="true"></i></a>	
					
                </td>
                </tr><?php } ?>
                </tbody>
                <tfooter>
                <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Gender</th>
                <th>PhoneNumber</th>
                <th>Email</th>
                <th>CEO since </th>
                 <th>Actions</th>
                </tr>
                </tfooter>
                </table>
				</div><?php }
		else {?><!-- Breadcrumbs-->
		<ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
		<li class="breadcrumb-item active"><a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a></li>
        			<li class="breadcrumb-item active "> <a href="index.php?p=add_ceo" style="text-decoration:none;color:#007CF8;">Add CEO </a></li>
		</ol><?php echo "<h2>No CEO Yet! </h2>";}}

 
public function display_comment_table(){
      $connect=new connect();
        $conn=$connect->getConn();
        $comment_query = "SELECT * from comments ";
        $result = $conn->query($comment_query);
        if ($result->num_rows > 0) {
        ?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
        <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Comments Table </a></li>
        </ol>
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
        <th>Post ID</th>
        <th>Post Title</th>
        <th>Whom Comment</th>
        <th>Content</th>
        <th>Date</th>
        <th>Action</th>
        </tr>
        </thead>
        
        <tbody><?php 
                while($row= mysqli_fetch_array($result)){
                 $user_id=$row['user_id'];
                 $post_id=$row['post_id'];   ?>
                <tr>
                <td><?php  echo $row['post_id'];?></td>
                <td>
                <?php 
                    $post_query="SELECT post_title from posts where post_id='$post_id'";
                    $post_result=$conn->query($post_query);
                    while ($post_row=mysqli_fetch_assoc($post_result)) {
                        $post_title=$post_row["post_title"];
                    }
                    echo $post_title;?>
                </td>
                <td><?php 
                    $user_query="SELECT fname from users where user_id='$user_id'";
                    $user_result=$conn->query($user_query);
                    while ($user_row=mysqli_fetch_assoc($user_result)) {
                        $fname=$user_row["fname"];
                    }
                    echo $fname;?></td>
                <td><?php echo $row['content'];?></td>
                <td><?php echo $row['date'];?></td>
                <td > 
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>
                <!-- Delete Modal-->
                <div class="modal fade" id="delete_it<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete this comment </div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "comments"; ?>','id','<?php echo $row["id"]; ?>')" class="btn btn-primary" >Delete</button>
                <!-- Delete Modal End -->
                </div>
                </div>
                </div>
                </div>
                
                </td>
                </tr><?php } ?>
                </tbody>
                </table>
                </div><?php }
        else {?><!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
        <li class="breadcrumb-item active"><a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a></li>          
        </ol><?php echo "<h2>No Post's Comments Yet! </h2>";}
}





}      

				