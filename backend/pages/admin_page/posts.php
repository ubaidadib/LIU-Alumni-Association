<?php

class post{
public function display_add_post(){
	
	  ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;color:black;margin: 7px;">
        <li class="breadcrumb-item">
        <a href="index.php?p=home">Home</a>
        </li><li class="breadcrumb-item active">Add Posts</li>
		</ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;margin: 7px;"> 
		<form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <img id="output" width="250" />
        </div>    
		<div class="form-wrapper">
        <label><b>Choose Your Post Category :</b></label></div><br>
		 <?php 
		 $connect=new connect();
         $conn=$connect->getConn();
		 $query = "SELECT * FROM `degree`";
		 $result = mysqli_query($conn, $query);
		 ?>
          <select id="select" multiple="multiple" name="degree[]">
          <?php while($row = mysqli_fetch_array($result)):;?>
          <option value="<?php echo $row['degree_id'];?>"><?php echo $row['degree_title'];?></option>
          <?php endwhile;?>
          </select>
          
          <script>
            $(function () {
            $('#select').multipleSelect({
            width: 500,
            placeholder: 'Select Your Post Category'
            })
            })
            </script>
          
		 <br> <br> <br>
		<div class="form-wrapper">
        <label><b>Post Title :</b></label></div><br>
		<div class="form-group">
		<input type="text" class="form-control"  name="post_title" id="post_title" style="border: 2px solid #ddd; padding:7px;font-family: 'Exo', sans-serif;color:black;height: 10%;font-size:14px;"  placeholder="Computer Engineer Intership" required=""
		oninvalid="this.setCustomValidity('Please Enter A Title For Your Post')" oninput="setCustomValidity('')"></input>
		</div>
		<div class="form-wrapper">
        <label><b>Post Status :</b></label></div><br>
		<div class="form-group">
		<select class="custom-select" id="status" name="status"  style="border: 2px solid #ddd; padding:7px;font-family: 'Exo', sans-serif;color:black;font-size:14px;">
		 <option selected disabled>Choose ... </option>
         <option value="0">Public</option>
		 <option value="1">Private</option>
		 </select>
		</div>
		<div class="form-wrapper">
        <label><b>Post Content :</b></label></div><br>
		<div class="form-group">
		<textarea class="form-control" cols="30"  name="post_content" id="post_content" rows="5" placeholder="types here what's coming in your mind" style="border: 2px solid #ddd;height: 15%; padding:7px;font-family: 'Exo', sans-serif;color:black;font-size:18px;"></textarea>
		</div>
        <div class="form-wrapper">
		<label for="fileToUpload"><b>Select Your Post Image to Upload :</b></label><br/><br/></div>
		<div class="form-wrapper">
		<label for="uploadedImage" class=" btn border border-primary">Upload  Image</label>
		<input type="file" name="uploadedImage" id="uploadedImage" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none" />&nbsp;&nbsp;&nbsp;
		</div><!-- <br> -->
		<div class="form-group">
		<div class="col-md-6 mb-3"></div>
		<div class="col-md-4 mb-3"></div>
		<div class="col-md-6 mb-3">
		<button class="btn btn-primary" type="submit"  name = "publish_btn">Publish Post </button>
		</div>
		</div>
		</form>
		</div><script>
				var loadFile = function(event) {
				var image = document.getElementById('output');
				image.src = URL.createObjectURL(event.target.files[0]);
				};
			  </script><?php
						$publish_btn= filter_input(INPUT_POST, "publish_btn");
						if(isset($publish_btn)){
						$new_post=new post();
						$new_post->add_post();
						}
}//end of display_add_post() function
public function display_post_area(){
                $connect=new connect();
                $conn=$connect->getConn();
                $user_query = "SELECT * FROM posts ";
                $result = $conn->query($user_query);
                if ($result->num_rows > 0) {?>
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Available Posts ! </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=add_post" style="text-decoration:none;color:red;">Add Posts ! </a></li>
                </ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
                <div class="row" style="margin:10px;">
                <?php   
                while($row= mysqli_fetch_array($result)){?>
                <div class="col-md-4">
                <div class="card  border-info " style="height: 650px;">
                <div class="card-img-top" style="padding: 5px;">
                        <?php 
                        
                        if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"
                                alt=\"Image\"  class=\"\" height=\"250px;\"width=\"100%;\" name=\"output\">";
                            }
                            ?>
                </div>
                
                <div class="card-body text-primary">
                <h1 class="text-center" style="color: black;font-size: 33px;"><?php echo ucwords($row['post_title']);?></h1><br>
                <h5 class="text-center" style="color: grey;font-size: 25px;">
                <?php echo $row['post_id'];?></h5><br>
                <h5 class="text-center" style="color: black;"><?php echo $row['post_content'];?></h5><br>
               <br>
                </div>
                <div class="card-footer text-muted text-center">
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["post_id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>        
                <div class="modal fade" id="delete_it<?php echo $row["post_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete this post!</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "posts"; ?>','post_id','<?php echo $row["post_id"]; ?>')" class="btn btn-primary" >Delete</button>
                </div>
                </div>
                </div>
                </div>
                <a href="index.php?p=post_edit&amp;post_id=<?= $row['post_id'];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Edit Post Details!">
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
                        <li class="breadcrumb-item active">
                        <a href="index.php?p=add_post" style="text-decoration:none;color:red;">Add Post</a>
                        </li>
                        </ol><?php echo "<h2>No Posts Yet! </h2>       ";}
}

	
public function add_post(){
		     $connect=new connect();
             $conn=$connect->getConn();
             $publisher_id = $_SESSION['admin_id'];
             $post_content= filter_input(INPUT_POST, 'post_content');
             $post_title= filter_input(INPUT_POST, 'post_title');
             $post_status= $_POST['status'];
             date_default_timezone_set("Asia/Beirut");
             $post_date=date("Y:m:j H:i:s", time());
             //uploaded file info's
             $n = $_FILES["uploadedImage"]['name'];
             $s = $_FILES["uploadedImage"]['size'];
             $t = $_FILES["uploadedImage"]['tmp_name'];
             $e = $_FILES["uploadedImage"]['error'];
             $ty = $_FILES["uploadedImage"]['type'];
             move_uploaded_file($t, "../backend/image/postsImage/".$publisher_id."_".$n);
             $path =$publisher_id."_".$n;
             
             //if(isset($_POST["degree[]"])){ 
               
             if(substr($path,2)!=null){
             $new_post_query = "INSERT INTO `posts`(`post_id`, `user_id`,`post_title`, `post_content`, `post_status`, `post_date`,`image_path`)
             VALUES (NULL,'".$publisher_id."','".$post_title."', '".$post_content."','".$post_status."','".$post_date."','".$path."')";
             $new_result = $conn->query($new_post_query);
              if($new_result){
              }else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
             }
             else{
             $new_post_query = "INSERT INTO `posts`(`post_id`, `user_id`,`post_title`, `post_content`, `post_status`, `post_date`,`image_path`)
             VALUES (NULL,'".$publisher_id."','".$post_title."', '".$post_content."','".$post_status."','".$post_date."','')";
             $new_result = $conn->query($new_post_query);
             if($new_result){
             }else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
             //echo post_category;
             }
              //get post id 
             $post_id_query= "SELECT post_id from posts where user_id='".$publisher_id."'";
             $post_id_result = $conn->query($post_id_query);
             while($row= mysqli_fetch_array($post_id_result)){
             $post_id = $row['post_id'];}
             //echo $post_id;
             if (!isset($_POST["degree"])) {
                echo "<script>
               Swal.fire({ type: 'error',title: 'Audience',text: 'Please Specify Your Audience..'})</script>";
             }
             else{
             foreach ($_POST['degree'] as $selectedOption){
             $new_post_relation_query ="INSERT INTO `categories_relation` (`post_id`,`degree_id`)
             VALUES ('".$post_id."','".$selectedOption."' )";
             $result2 = $conn->query($new_post_relation_query);
             }
             if($result2){
              echo "<script>
                Swal.fire('Good job!','You post is added','success')</script>";
             }
             else{}
         }
			 
			 
}
public function display_edit_post(){
                $connect=new connect();
                $conn=$connect->getConn();
                $post_id = $_GET['post_id'];
                $new_query = "select * from posts where post_id=$post_id";
                $result = $conn->query($new_query);
                $row=mysqli_fetch_array($result);
                if ($result->num_rows > 0) {
                ?>
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                <a href="index.php?p=show_posts" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">Update Post Details </a></li>
                </ol><div class="container-fluid">
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                <br>

                <div class="form-row">
                <div class="form-group col-md-6">
                 <?php  
                if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"
                                alt=\"Image\" style=\"padding:3px;height:200px;width:200px;\" id=\"output\">";
                            }                ?>
                </div>
                <div class="form-group col-md-6">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>Post ID </b></label>
                <input type="text" value="<?=$row['post_id']?>" class="form-control" name="id" disabled id="inputPassword4" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4"><b>Post Title </b></label>
                <input type="text" value="<?=$row['post_title']?>"  class="form-control" name="post_title" id="inputPassword4" >
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>Post Content</b></label>
                <input type="text" value="<?=$row['post_content']?>" class="form-control" name="post_content"  id="inputPassword4" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>Post Status</b></label>
                <select class="custom-select" id="status" name="status"  style="border: 2px solid #ddd; padding:7px;font-family: 'Exo', sans-serif;color:black;font-size:14px;">
                 <option selected disabled>Choose ... </option>
                 <option value="0">Public</option>
                 <option value="1">Private</option>
                 </select>
                </div>
                </div>
                 <div class="form-group col-md-6">
                <label for="inputPassword4"><b>Post Image </b></label><br>
                <label for="post_image" class="form-control btn border border-primary">Upload New Image</label>
                                <input type="file" value="<?=$row['image_path']?>" name="post_image" id="post_image" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none" />&nbsp;&nbsp;&nbsp;
                                
                </div>    
                <input type="hidden" name="post_id" value="<?=$_GET['post_id'];?>" />
                <div class="input-group">
                <div class="col-md-10 mb-8"></div>
                <div class="col-md-2 mb-4">
                <button type="submit" class="btn btn-primary" name="update_info" id="update_info">UPDATE
                <i class="fas fa-arrow-right"></i>
                </button></div>
                </div>
                </form></div><script>
                                var loadFile = function(event) {
                                var image = document.getElementById('output');
                                image.src = URL.createObjectURL(event.target.files[0]);
                                };
                          </script><?php 
                                $story_update= filter_input(INPUT_POST, "update_info");
                                if(isset($story_update)){
                                $new_story=new post();
                                $new_story->update_post_info();} 
                                }
}
public function update_post_info(){
        $connect=new connect();
        $conn=$connect->getConn();
        $post_id=$_POST['post_id'];
        $new_title=filter_input(INPUT_POST, 'post_title');
        $new_content=filter_input(INPUT_POST, 'post_content');
        $new_status=$_POST['status'];
        //uploaded file info's
                $n = $_FILES['post_image']['name'];
                $s = $_FILES['post_image']['size'];
                $t = $_FILES['post_image']['tmp_name'];
                $e = $_FILES['post_image']['error'];
                $ty = $_FILES['post_image']['type'];
                move_uploaded_file($t, "../backend/image/postsImage/".$n);
                $path =$n;
                $query = "UPDATE `posts` SET `post_title`='".$new_title."',`post_content`='".$new_content."',`post_status`='".$new_status."',`image_path`='".$path."'  WHERE `post_id`='".$post_id."'";
                $result = $conn->query($query);
                if ($result) {
                     echo "<script>
                    Swal.fire('Good job!','You post is edited','success')</script>";
                    //$header=new header_process();
                    //$header->header("index.php?p=show_posts");
                }
                 else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
                
}	
	
	
	
	
	
	
}

