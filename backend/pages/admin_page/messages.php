<?php
class messages{

public function display_message_table(){//not ready yet ! 
	    $connect=new connect();
        $conn=$connect->getConn();
		$id=$_SESSION['admin_id'];
        $user_query = "SELECT * from users JOIN messages where receiver_id='$id'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?>
		<!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Message List </a></li>

		</ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif;">
        <h2>Messages</h2>
        <div class="table-responsive" >
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
		<th>#ID</th>
        <th>Sender Name</th>
        <th>Sender Email</th>
        <th>Message Content</th>
        <th>Date of Message</th>
         <th>Actions</th>
        </tr>
        </thead>
		<tfoot>
        <tr>
		<th>#ID</th>
        <th>Sender Name</th>
        <th>Sender Email</th>
        <th>Message Content</th>
        <th>Date of Message</th>
         <th>Actions</th>
        </tr>
        </tfoot>
        <tbody><?php 
                while($row= mysqli_fetch_array($result)){?>
                <tr>
				<td><?php echo $row["user_id"];?></td>
                <td><?php echo $row["fname"]." " .$row["lname"];?></td>
                <td><?php echo $row["email"];?></td>
                <td><?php echo $row["content"];?></td>
                <td><?php echo $row["date"];?></td>
                <td class="text-center" > 
				<a href="index.php?p=display_send_message&amp;user_id=<?php echo $row["user_id"];?>&amp;user_email=<?php echo $row["email"];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="REPLY!">
				<i class="fas fa-paper-plane"></i></i>
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
						</ol> <?php echo "no message found";} 
}
public function send_msg(){
				$receiver_id = $_GET['receiver_id'];
				$sender_email = $_GET['email'];
				$sender_id= $_SESSION['admin_id'];
				$msg_content=filter_input(INPUT_POST, 'content');
				$msg_subject=filter_input(INPUT_POST, 'subject');
				date_default_timezone_set("Asia/Beirut");
				$msg_date=date("Y:m:j H:i:s", time());
				$connect=new connect();
				$conn=$connect->getConn();
				$msg_query = "INSERT into messages VALUES(NULL,'".$sender_id."','".$receiver_id."','".$msg_content."','1','new','".$msg_date."')";
				$result = $conn->query($msg_query);
				if($result){
					echo "<script>
                Swal.fire('Good job!','Message Sent !','success')</script>";
				}
				else{
					echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
				}
				//$row=mysqli_fetch_array($result);
					
	
}
public function viewMessage(){
	    $connect=new connect();
        $conn=$connect->getConn();
		$id=$_SESSION['admin_id'];
        $user_query = "SELECT * from messages  where receiver_id='$id'";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
        ?><!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Message List </a></li>
		</ol>
		<div class="container-fluid">
        <?php  	
        while($row= mysqli_fetch_array($result)){
         $msg_date=$row['date'];
         $msg_content=$row['content'];	
        ?>
		<div class="media p-2">
        <?php 
       	 $sender_id=$row['sender_id'];
         $user_query_2 = "SELECT * from users where user_id='$sender_id'";
       	 $result_2 = $conn->query($user_query_2);
       	 $row_2=mysqli_fetch_array($result_2);
       	 $profile=$row_2['user_profile'];
       	 $name=$row_2['fname'];
                if ( $profile != null) {
                                echo "<img src=\"..\backend\image\uploadedProfiles/" .$profile. "\"
                                alt=\"defImage\" style=\"width:55px;\" class=\"mr-3 mt-3  rounded-circle\">";
                            } else {
                                echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"mr-3 mt-3  rounded-circle\" alt=\"defImage\" style=\"width:55px;\">";}
                     
        ?>
        
        <div class="media-body ml-2 border p-3 bg-white">
        <h6><?php echo " ".ucwords($name);?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <small><i class="fas fa-clock"><?php echo " ".substr($msg_date, 11,-3);?></i></small></h6>
        <p><?php echo $msg_content;?>
        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href="index.php?p=reply&amp;id_1=<?php echo $row['message_id'];?>&amp;id_2=<?php echo $row['sender_id'];?>" data-toggle="tooltip" data-placement="bottom" title="REPLY!">
				<i class="fas fa-reply fa-2x"></i>
        	


        </p>

        </div>
		</div>
		<?php } ?>
		</div>
		<?php } 
		else {
			?>	<!-- Breadcrumbs-->
						<ol class="breadcrumb" style="font-family: 'Exo', sans-serif;">
						<li class="breadcrumb-item active">
						<a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
						</li>
						</ol> <?php echo "no message found";} }

public function display_send_message(){
		$connect=new connect();
        $conn=$connect->getConn();
		$rec_msg_id=$_GET['id_1'];
		$sender_id=$_GET['id_2'];
		$id=$_SESSION['admin_id'];
		$msg_content_query="SELECT * from messages  where message_id='$rec_msg_id'";
		$msg_content_result = $conn->query($msg_content_query);
		$row=mysqli_fetch_assoc($msg_content_result);
		?><!-- Breadcrumbs-->
        <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item active">
        <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
        </li>
		<li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Reply to sended messages! </a></li>
		</ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;">
        <form method="post" action="#"><br>
        <div class="form-group">
    	<label for="exampleFormControlTextarea1">
    	<?php
        $sql="SELECT * from users  where user_id='$sender_id'";
		$sql_result = $conn->query($sql);
		$sql_row=mysqli_fetch_assoc($sql_result);
        echo "<b>".ucwords($sql_row['fname'])." ".ucwords($sql_row['lname'])."</b>"; ?> <b>send you :</b>	
    	</label>
		<input type="text" value="<?php echo $row['content'];?>" class="form-control"  disabled/>
  		</div>
  		<div class="form-group">
    	<label for="exampleFormControlTextarea1">
    	 <b>Relpy</b>
    	</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="msg_send" rows="5" placeholder="type your message ..."></textarea>
  		</div>
        <input type="hidden" id="send_to_id" name="send_to_id" value="<?php echo $row['sender_id'];?>">
		<div class="input-group">
		<div class="col-md-10 mb-8"></div>
		<div class="col-md-2 mb-4">
        <button type="submit" class="btn btn-primary" name="reply" id="reply">Reply! 
        <i class="fas fa-reply"></i>
        </button></div>
		</div><?php
						$reply= filter_input(INPUT_POST, "reply");
						if(isset($reply)){
						$msg=new messages();
						$msg->reply();}
	 
}

public function reply(){
	     $connect=new connect();
		 $conn=$connect->getConn();
		 $sender_id=$_SESSION['admin_id'];
		 $msg=filter_input(INPUT_POST,'msg_send');
         $receiver_id=$_POST['send_to_id'];
		 date_default_timezone_set("Asia/Beirut");
		 $msg_date=date("Y:m:j H:i:s", time());
		 $msg_query = "INSERT into messages VALUES(NULL,'".$sender_id."','".$receiver_id."','".$msg."','1','reply','".$msg_date."')";
				$result = $conn->query($msg_query);
				if($result){
					echo "<script>
                Swal.fire('Good job!','Message Sent !','success')</script>";
				}
				else{
					echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
				}
}



}

