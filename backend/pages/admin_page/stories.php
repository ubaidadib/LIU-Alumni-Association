    <?php
class stories{

public function display_success_stories(){
                $connect=new connect();
                $conn=$connect->getConn();
                $user_query = "SELECT * FROM `success_stories` ";
                $result = $conn->query($user_query);
                if ($result->num_rows > 0) {?>
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                <a href="index.php?p=home" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "> <a href="#" style="text-decoration:none;color:#007CF8;">Success Stories </a></li>
                <li class="breadcrumb-item active "> <a href="index.php?p=str_add" style="text-decoration:none;color:red;">Add Success Stories </a></li>
                </ol><div class="container-fluid" style="padding:15px;font-family: 'Exo', sans-serif; padding:10px;">
                <div class="row">
                <?php   
                while($row= mysqli_fetch_array($result)){$profile=$row['image_path'];?>
                <div class="col-md-4">
                <div class="card  border-info " style="height: 650px;" >
                <div class="card-img-top">
                        <?php if ($profile != null) {
                                echo "<img src=\"..\backend\image\imageStories/" . $row['image_path'] . "\"
                                alt=\"defImage\" style=\"padding:3px;width:100%;\" name=\"output\">";
                            } 
                            ?>
                        
                        <?php //echo "Manages By :" ." ".ucwords($row['fname'])." ".ucwords($row['lname']);?>
                </div>
                
                <div class="card-body text-primary">
                <h1 class="text-center" style="color: black;font-size: 33px;"><?php echo ucwords($row['story_title']);?></h1><br>
                <h5 class="text-center" style="color: grey;font-size: 25px;">
                <?php echo $row['story_id'];?></h5><br>
                <h5 class="text-center" style="color: black;"><?php echo $row['story_content'];?></h5><br>
                <h5 class="text-center" style="color: grey;font-size: 25px;"><?php echo $row['image_path'];?></h5><br>
                </div>
                <div class="card-footer text-muted text-center">
                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#delete_it<?php echo $row["story_id"]; ?>">
                <i class="fas fa-trash" aria-hidden="true"></i></a>        
                <div class="modal fade" id="delete_it<?php echo $row["story_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Do you want to delete this story!</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button onclick="delete_from_table('<?php echo "success_stories"; ?>','story_id','<?php echo $row["story_id"]; ?>')" class="btn btn-primary" >Delete</button>
                </div>
                </div>
                </div>
                </div>
                <a href="index.php?p=str_edit&amp;story_id=<?= $row['story_id'];?>" class="btn btn-default btn-lg" data-toggle="tooltip" data-placement="bottom" title="Edit Story Details!">
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
                        <a href="index.php?p=str_add" style="text-decoration:none;color:red;">Add Success Story</a>
                        </li>
                        </ol><?php echo "<h2>No Success Stories Yet! </h2>       ";}
}

public function display_add_stories(){
        ?><ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
        <li class="breadcrumb-item">
        <a href="index.php?p=home">Home</a>
        </li><li class="breadcrumb-item active">Add New Story </li>
        </ol><div class="container-fluid" style="background-image: linear-gradient(to left top, #d0e3ff, #dfe9ff, #ecf0ff, #f7f7ff, #ffffff);padding:15px;font-family: 'Exo', sans-serif;padding:7px;"> 
        <form method="post" action="#" enctype="multipart/form-data">
        <h3>New Story</h3><br>
        <div class="form-wrapper">
        <label> <b>Story Title :</b></label>
        </div>
        <div class="form-wrapper" style="margin: 5px;">
        <input type="text" placeholder="" class="form-control" name="story_title" id="story_title" required="required" style="border: 2px solid #ddd; padding:7px;height: 10%;
        font-family: 'Exo', sans-serif;color:black;font-size:14px;"/>
        </div>
        <div class="form-wrapper" style="margin: 5px;">
        <label> <b>Story Content   :</b></label>
        </div>
        <div class="form-wrapper" style="margin: 5px;">
        <textarea  required placeholder= "" class="form-control" cols="30" rows="5"  name="story_content" id="story_content" style="border: 2px solid #ddd; padding:7px;
        font-family: 'Exo', sans-serif;color:black;font-size:14px;height: 15%;"></textarea>
        </div>
        
        <div class="form-wrapper" style="margin: 5px;">
        <label for="fileToUpload"> <b> Select Your Post Image to Upload :</b></label><br/><br/></div>
        <div class="form-wrapper" style="margin: 5px;">
        <label for="uploadedImage" class=" btn border border-primary">Upload  Image</label>
        <input type="file" name="uploadedImage" id="uploadedImage" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none;margin:5px; " />&nbsp;&nbsp;&nbsp;
        <img id="output" width="250" />
        </div>
        <div class="input-group">
        <div class="col-md-10 mb-8"></div>
        <div class="col-md-2 mb-4">
        <button type="submit" class="btn btn-primary" name="story_btn" id="story_btn">ADD 
        <i class="fas fa-arrow-right"></i>
        </button></div>
        </div>
        </form> </div><script>
                var loadFile = function(event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
                };
              </script> <?php
                        $add_story= filter_input(INPUT_POST, "story_btn");
                        if(isset($add_story)){
                        $story=new stories();
                        $story->add_story();
                    }
}
public function add_story(){
             $connect=new connect();
             $conn=$connect->getConn();
             
             $story_title= filter_input(INPUT_POST, 'story_title');
             $story_content= filter_input(INPUT_POST, 'story_content');
             //uploaded file info's
             $n = $_FILES["uploadedImage"]['name'];
             $s = $_FILES["uploadedImage"]['size'];
             $t = $_FILES["uploadedImage"]['tmp_name'];
             $e = $_FILES["uploadedImage"]['error'];
             $ty = $_FILES["uploadedImage"]['type'];
             move_uploaded_file($t, "../backend/image/imageStories/".$n);
             $path =$n;
              if($path!=null){
             $path = $n;
             $new_post_query = "INSERT INTO `success_stories`(`story_id`, `story_title`,`story_content`, `image_path`)VALUES (NULL,'".$story_title."','".$story_content."','".$path."')";
             $new_result = $conn->query($new_post_query);
             if($new_result){
             echo "<script>
                Swal.fire('Good job!','Your story is added','success')</script>";     
             //$header_process=new header_process();
             //$header_process->header("index.php?p=success_stories");
              }else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong upon image insertion!'})</script>";}
              }else{
             $new_post_query = "INSERT INTO `success_stories`(`story_id`, `story_title`,`story_content`, `image_path`)VALUES (NULL,'".$story_title."','".$story_content."','')";
             $new_result = $conn->query($new_post_query);
             if($new_result){

             echo "<script>
                Swal.fire('Good job!','Your story is added','success')</script>";   
             //$header_process=new header_process();
             //$header_process->header("index.php?p=success_stories");
             }else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
             }
}
public function display_edit_stories(){
                $connect=new connect();
                $conn=$connect->getConn();
                $story_id = $_GET['story_id'];
                $new_query = "select * from success_stories where story_id=$story_id";
                $result = $conn->query($new_query);
                $row=mysqli_fetch_array($result);
                if ($result->num_rows > 0) {
                ?>
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" style="font-family: 'Exo', sans-serif;margin: 7px;">
                <li class="breadcrumb-item active">
                <a href="index.php?p=success_stories" style="text-decoration:none;color:black;">Home</a>
                </li>
                <li class="breadcrumb-item active "><a href="#" style="text-decoration:none;color:#007CF8;">Update Story Details </a></li>
                </ol><div class="container-fluid">
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                <br>
                <div class="form-row">
                <div class="form-group col-md-6">
                <?php  
                if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\imageStories/". $row['image_path'] ."\"
                                alt=\"Image\" style=\"padding:3px;height:150px;width:150px;\" id=\"output\">";
                            } else {
                                echo "<img src=\"..\backend\image\imageStories\defImage.jpg\" class=\"img-responsive\" alt=\"defImage\" style=\"padding:3px;\" id=\"output\">";}?>
                </div>
                <div class="form-group col-md-6">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>Story ID </b></label>
                <input type="text" value="<?=$row['story_id']?>" class="form-control" name="id" disabled id="inputPassword4" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4"><b>Story Title </b></label>
                <input type="text" value="<?=$row['story_title']?>"  class="form-control" name="story_title" id="inputEmail4">
                </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4"><b>Story Content</b></label>
                <input type="text" value="<?=$row['story_content']?>" class="form-control" name="story_content"  id="inputPassword4" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4"><b>Story Image</b></label><br>
                <label for="story_image" class=" btn border border-primary">Upload New Image</label>
                                <input type="file" value="<?=$row['image_path']?>"  name="story_image" id="story_image" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none" />&nbsp;&nbsp;&nbsp;
                                <img id="output" width="250" />
                </div>
                </div>
                <input type="hidden" name="story_id" value="<?=$_GET['story_id'];?>" />
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
                                $new_story=new stories();
                                $new_story->update_story_info();} 
                                }
}
public function update_story_info(){
        $connect=new connect();
        $conn=$connect->getConn();
        $story_id=$_POST['story_id'];
        $new_title=filter_input(INPUT_POST, 'story_title');
        $new_content=filter_input(INPUT_POST, 'story_content');
        //uploaded file info's
                $n = $_FILES['story_image']['name'];
                $s = $_FILES['story_image']['size'];
                $t = $_FILES['story_image']['tmp_name'];
                $e = $_FILES['story_image']['error'];
                $ty = $_FILES['story_image']['type'];
                move_uploaded_file($t, "../backend/image/imageStories/".$n);
                $path =$n;
                $query = "UPDATE `success_stories` SET `story_title`='".$new_title."',`story_content`='".$new_content."',`image_path`='".$path."'  WHERE `story_id`='".$story_id."'";
                $result = $conn->query($query);
                 if($result){
              echo "<script>
                Swal.fire('Good job!','Your Informations is updated','success')</script>";
                //$header=new header_process();
                //$header->header("index.php?p=success_stories");
              
             }
             else{echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";}
                
}




}


	
