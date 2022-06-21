 

<?php

class userHome {

    public function display_user_home() {
        ?><div class="col-md-3">
        </div>
        <div class="col-md-6 " >
            <?php
            $display_post = new userHome();
            $display_post->display_add_post();
            ?>
            <br>
            <div><?php
                $display_post = new userHome();
                $display_post->display_specific_posts();
                $display_post->display_user_post();
                ?>
            </div>
        </div>
        <div class="col-md-3">
            <div>
                <?php
                $display_post = new userHome();
                $display_post->display_search_area();
                ?> 
            </div>

            <br><br>


        </div><?php
    }

    public function display_add_post() {
        ?><div class="card shadow p-4 mb-4 bg-white" >
        <?php
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from users where user_id='" . $user_id . "'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        ?>
            <div class="card-header" style="height: 30px;padding: 5px;font-size: 14px;">
                <i class="far fa-edit"></i>&nbsp;<b>Create Post </b></div>
            <div class="card-body text-primary">
                <h5 class="card-title" style="margin-top: 15px;" >
                    <a  data-toggle="modal" data-target="#Post" style="color: lightgrey;font-size: 15px;text-decoration: none;">
                        <?php
                        if ($row['user_profile'] != null) {
                            echo "<img src=\"..\backend\image\uploadedProfiles/" . $row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
                                alt=\"Image\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                        } else {
                            echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                        }
                        ?>
                        Whats's on your mind ,<?= ucwords($row['fname']); ?>?
                    </a>
                </h5>
            </div>
        </div>
        <br><br>
        <!-- The Modal -->
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="modal" id="Post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="far fa-edit"></i>Creating Post </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->

                        <div class="modal-body" style="color: lightgrey;font-size: 15px;">
                            <img id="output" width="200" /> <br>  
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="post_title">Post Title:</label></div>
                                <div class="col-md-6">
                                    <label for="post_title">Post Status:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">   
                                    <input type="text" class="form-control" id="post_title" name="post_title"></div>
                                <div class="col-md-6">
                                    <select class="form-control" id="sel1" name="status">
                                        <optgroup label="Who should see this?">
                                            <option value="0">Public</option>
                                            <option value="1">Only me</option>
                                    </select>   
                                </div>
                            </div><br>
                            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Whats's on your mind ,<?= ucwords($row['fname']); ?>?" name="post_content"></textarea><br>
                            <div class="custom-control custom-checkbox" style="color: black;"  id="showhidetarget">
                                <label for="email" >Post Audience:</label><br>
                                <?php
                                $connect = new connect();
                                $conn = $connect->getConn();
                                $query = "SELECT * FROM `degree`";
                                $result = mysqli_query($conn, $query);
                                ?>
                                <select id="select" multiple="multiple" name="degree[]">
                                    <?php while ($row = mysqli_fetch_array($result)):; ?>
                                        <option value="<?php echo $row['degree_id']; ?>"><?php echo $row['degree_title']; ?></option>
                                    <?php endwhile; ?>
                                </select>

                                <script>
                                    $(function () {
                                        $('#select').multipleSelect({
                                            width: 400,
                                            placeholder: 'Select Your Post Audience'
                                        })
                                    })
                                </script>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <label for="uploadedImage" class="btn btn-outline-info mr-auto" 
                                   style="border-radius: 30px;color:black;font-size: 13px;">
                                <span class="fas fa-file-image" data-toggle="tooltip" title="Choose an image to upload!">&nbsp;&nbsp; Photo</span>
                            </label>
                            <input 
                                type="file"
                                name="uploadedImage" 
                                id="uploadedImage" 
                                multiple="multiple" 
                                accept="image/*"  
                                onchange="loadFile(event)" 
                                style="display: none;" />


                            <a id="showhidetrigger" class="btn btn-outline-primary mr-auto" 
                               style="border-radius: 30px;color:black;font-size: 13px;">
                                <i class="fas fa-users">&nbsp;&nbsp;Audience</i></a>
                            <!--Script code for show/hide audience field -->
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#showhidetarget').hide();
                                    $('a#showhidetrigger').click(function () {
                                        $('#showhidetarget').toggle(400);
                                    });
                                });
                            </script>                
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <label for="share_btn" class="btn btn-outline-warning mr-auto" 
                                   style="border-radius: 30px;color:black;font-size: 13px;">
                                <span class="fas fa-paper-plane" >&nbsp;&nbsp; Share</span></label>
                            <input 
                                type="submit"
                                name="share_btn" 
                                id="share_btn" 
                                style="display: none" />
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            var loadFile = function (event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script><?php
        $share_btn = filter_input(INPUT_POST, "share_btn");
        if (isset($share_btn)) {
            $new_post = new userHome();
            $new_post->add_post();
        }
    }

    public function add_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $publisher_id = $_SESSION['user_id'];
        $post_content = filter_input(INPUT_POST, 'post_content');
        $post_title = filter_input(INPUT_POST, 'post_title');
        $post_status = $_POST['status'];
        date_default_timezone_set("Asia/Beirut");
        $post_date = date("Y:m:j H:i:s", time());
        //uploaded file info's
        $n = $_FILES["uploadedImage"]['name'];
        $s = $_FILES["uploadedImage"]['size'];
        $t = $_FILES["uploadedImage"]['tmp_name'];
        $e = $_FILES["uploadedImage"]['error'];
        $ty = $_FILES["uploadedImage"]['type'];
        move_uploaded_file($t, "../backend/image/postsImage/" . $publisher_id . "_" . $n);
        $path = $publisher_id . "_" . $n;

        //if(isset($_POST["degree[]"])){ 

        if (substr($path, 2) != null) {
            $new_post_query = "INSERT INTO `posts`(`post_id`, `user_id`,`post_title`, `post_content`, `post_status`, `post_date`,`image_path`)
             VALUES (NULL,'" . $publisher_id . "','" . $post_title . "', '" . $post_content . "','" . $post_status . "','" . $post_date . "','" . $path . "')";
            $new_result = $conn->query($new_post_query);
            if ($new_result) {
                
            } else {
                echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
            }
        } else {
            $new_post_query = "INSERT INTO `posts`(`post_id`, `user_id`,`post_title`, `post_content`, `post_status`, `post_date`,`image_path`)
             VALUES (NULL,'" . $publisher_id . "','" . $post_title . "', '" . $post_content . "','" . $post_status . "','" . $post_date . "','')";
            $new_result = $conn->query($new_post_query);
            if ($new_result) {
                
            } else {
                echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
            }
            //echo post_category;
        }
        //get post id 
        $post_id_query = "SELECT post_id from posts where user_id='" . $publisher_id . "'";
        $post_id_result = $conn->query($post_id_query);
        while ($row = mysqli_fetch_array($post_id_result)) {
            $post_id = $row['post_id'];
        }
        //echo $post_id;
        if (!isset($_POST["degree"])) {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Audience',text: 'Please Specify Your Audience..'})</script>";
        } else {
            foreach ($_POST['degree'] as $selectedOption) {
                $new_post_relation_query = "INSERT INTO `categories_relation` (`post_id`,`degree_id`)
             VALUES ('" . $post_id . "','" . $selectedOption . "' )";
                $result2 = $conn->query($new_post_relation_query);
            }
            if ($result2) {
                echo "<script>
                Swal.fire('Good job!','You post is added','success')</script>";
            } else {
                
            }
        }
    }

    public function display_comments() {
        ?>
        <?php
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from users where user_id='" . $user_id . "'";
        $result = $conn->query($user_query);
        $row = mysqli_fetch_array($result);
        ?>
        <a  data-toggle="modal" data-target="#Post" style="color: lightgrey;font-size: 15px;text-decoration: none;">
        </a>
        </div>
        <br><br>
        <!-- The Modal -->
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="modal" id="Post">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"><i class="far fa-comment"></i>View Comments </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->

                        <div class="modal-body" style="color: lightgrey;font-size: 15px;">
                            <img id="output" width="200" /> <br>  
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">   
                                    <input type="text" class="form-control" id="post_title" name="post_title"></div>
                                <div class="col-md-6">

                                </div>
                            </div><br>
                            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Whats's on your mind ,?" name="post_content"></textarea><br>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php
    }

    public function display_specific_posts() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `categories_relation`  NATURAL JOIN posts"
                . " NATURAL JOIN degree Natural Join users"
                . " WHERE post_status='0' AND degree_title IN(SELECT degree_title FROM `studies` NATURAL JOIN degree NATURAL JOIN users WHERE user_id=user_id)ORDER BY post_date DESC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            ?>
            <form action="" method="POST">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    $status = $row['post_status'];
                    //echo $status;
                    ?>
                    <div class="card  border-info " >
                        <div class="card-body text-primary">
                            <h5 class="card-title" style="margin-top: 15px;font-size: 15px;" >
                                <?php
                                if ($row['user_profile'] != null) {
                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
                                alt=\"Image\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                                } else {
                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                                }
                                ?>
                                <?= ucwords($row['fname'] . " " . $row['lname']);
                                ?>


                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php if ($row['user_id'] == $_SESSION['user_id']) {
                                    ?>
                                    <i class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" href="index.php?p=post_del&amp;post_id=<?= $row['post_id']; ?>" onclick="return confirm('Are you sure to delete this post?')">
                                            <i class="fas fa-trash" aria-hidden="true">&nbsp;Delete Post</i></a>        

                                        <a class="dropdown-item" href="index.php?p=post_edit&amp;post_id=<?= $row['post_id']; ?>">
                                            <i class="fas fa-edit" aria-hidden="true">&nbsp;Edit Post</i></a>
                                    </div>
                                <?php } ?>
                                <br>

                                <p class="card-text" style="margin-left: 10.5%;"><?php echo $row['post_date']; ?>

                                    <?php if ($row['post_status'] == 0) { ?>
                                        <i class="fas fa-globe" data-toggle="tooltip" title="Public!"></i>                     
                                    <?php } else { ?>
                                        <i class="fas fa-lock" data-toggle="tooltip" title="Private!"></i>
                                    <?php } ?>    
                                </p>

                            </h5>
                            <br>
                            <p class="card-text" style="margin-left: 2%;color: black;"><?php echo $row['post_content']; ?></p>
                            <br>
                            <?php
                            if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"
                                alt=\"Image\" style=\"padding:3px;width:500px;\" name=\"output\" class=\"img-fluid\">";
                            }
                            ?>

                        </div>
                        <div class="clearfix"></div>
                        <div class="like_panel">

                            <?php
                            $connect = new connect();
                            $conn = $connect->getConn();
                            $count = 0;
                            $like_query = "SELECT * from likes where post_id='" . $row['post_id'] . "' and status='1' ";
                            $like_result = $conn->query($like_query);
                            if ($like_result->num_rows > 0) {
                                while ($like_row = mysqli_fetch_assoc($like_result)) {
                                    $count++;
                                }
                                // echo $count ;
                            } else {
                                $count = 0;
                            }
                            ?>
                            <i class="far fa-thumbs-up float-left like_count"  data-likes="<?= $count; ?>" id="" style="margin-left: 5%;"><?= $count; ?></i>

                            <a  data-toggle="modal" data-target="#Comments<?php echo $row['post_id']; ?>">
                                <label class="float-right" style="margin-right: 3.5%;">
                                    <?php
                                    $connect = new connect();
                                    $conn = $connect->getConn();
                                    $count = 0;
                                    $comment_query = "SELECT * from comments where post_id='" . $row['post_id'] . "'";
                                    $comment_result = $conn->query($comment_query);
                                    if ($comment_result->num_rows > 0) {
                                        while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                                            $count++;
                                        }
                                        echo $count;
                                    } else {
                                        echo "0";
                                    }
                                    ?> Comments
                                </label>
                            </a>
                            <br>
                            <hr>
                            <div class="clearfix"></div>

                            <?php
                            $post_id = $row["post_id"];
                            // echo $post_id;
                            $like_query = 'select * from posts p, users u, likes l where p.post_id=l.post_id'
                                    . ' and p.post_id ="' . $post_id . '" and u.user_id = l.user_id and u.user_id ="' . $_SESSION['user_id'] . '"';
                            $result_query = $conn->query($like_query);
                            //echo $like_query;

                            if ($result_query->num_rows > 0) {
                                $row_like = mysqli_fetch_array($result_query);


                                $status = $row_like['status'];
                                if ($status == 1) {
                                    $active = 'active-like';
                                }
                            }
                            ?>

                            <button type="submit" class="btn btn-outline-light text-dark like_button <?= $active; ?>" style="margin-left: 5%;" id='like_button' name="like"><i class='far fa-thumbs-up' style="font-size:18px"> like</i></button>

                            <button type="button" class="btn btn-outline-light text-dark " id="showhidetrigger<?php echo $row["post_id"]; ?>"><i class='far fa-comment' style="font-size:18px"> Comment</i></button>

                            <input type="hidden" value="<?= $status; ?>" id="status" >
                            <input type="hidden" value="<?= $row["post_id"]; ?>" id="post_id" >
                            <input type="hidden" value="<?= $_SESSION['user_id']; ?>" id="user_id" >
                        </div>
                        <hr> 
                        <div style="margin-left:3%;margin-bottom:1.5%;" id="showhidecomment<?php echo $row["post_id"]; ?>">
                            <form method="POST">
                                <?php
                                $user_info = "SELECT user_profile FROM `users` where user_id='$user_id'";
                                $user_result = $conn->query($user_info);
                                $user_row = mysqli_fetch_assoc($user_result);
                                if ($row['user_profile'] != null) {
                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $user_row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
                                alt=\"Image\" style=\"padding:3px;width:40px;height:40px;\" name=\"output\">";
                                } else {
                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:40px;height:40px;\" name=\"output\">";
                                }
                                ?>

                                <input type="text" class="rounded-lg" name="comments" placeholder="Write a comment ..." style="width: 75%; padding: 5px;">
                                <input type="submit" class="btn btn-outline-light text-dark " name="comment" value="Push">
                                <input type="hidden" name="post_id" value="<?php echo $row["post_id"]; ?>">
                            </form>  
                        </div>

                    </div><br>
                    <!-- The Modal -->
                    <div class="modal" id="Comments<?php echo $row['post_id']; ?>">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"><i class="far fa-comment"></i> Post Comments </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" style="">
                    <ul class="list-group list-group-flush">
                    <?php
                    $connect = new connect();
                    $conn = $connect->getConn();
                    $comment_query = "SELECT * from comments Natural join users where post_id='" . $row['post_id'] . "'";
                    $comment_result = $conn->query($comment_query);
                    if ($comment_result->num_rows > 0) {
                    while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                    $comment_id = $comment_row['id'];
                    ?>
                    <li class="list-group-item">
                    <div class="media border-bottom">
                    <?php
                    if ($comment_row['user_profile'] != null) {
                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $comment_row['user_profile'] . "\" alt=\"Image\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                    } else {
                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" alt=\"defImage\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                    }
                    ?>&nbsp;&nbsp;
                    <div class="media-body">
                    <p><?php echo ucwords($comment_row['fname']) . "  " . ucwords($comment_row['lname']); ?> <small>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fas fa-clock"><?php echo substr($comment_row['date'], 11); ?></i></small></p>
                    <p><?php echo $comment_row['content']; ?></p><hr>
                     <?php
                    $sender_id=$_SESSION['user_id'];
                    //getting the profile of sender
                    $sender_profile = "SELECT * from users where user_id='$sender_id'";
                    $sender_profile_result = $conn->query($sender_profile);
                    $row_profile = mysqli_fetch_assoc($sender_profile_result);
                    $profile = $row_profile['user_profile'];
                    $name = $row_profile['fname'];
                    // !/getting the profile of sender
                    //getting the messages
                    $replied_msg = "SELECT * from reply_comment where comment_id='$comment_id'"
                    . "ORDER BY date ASC";
                    $replied_result = $conn->query($replied_msg);
                    while ($row_reply_msg = mysqli_fetch_assoc($replied_result)) {
                    $reply_date = $row_reply_msg['date'];
                    $reply_content = $row_reply_msg['replied_message'];
                    ?>
                    <div class="media">
                    <div class="media-body ml-2  p-3 bg-white">
                    <p><?php echo "<b style='color:black;'> " . ucwords($row_profile['fname'] . " " . $row_profile['lname']). "</b>"."" ?>
                    <small>&nbsp;<i class="fas fa-clock"><?php echo " " . substr($reply_date, 11, -3); ?></i></small>
                    </p>
                     <p style="font-size:16px;color:black;"><i class="fas fa-reply"></i>
                       <?php echo $reply_content; ?></p>      
                    </div>
                    <?php
                    if ($profile != null) {
                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\"
                    alt=\"defImage\" style=\"width:55px;height:55px;\" class=\"ml-3 mt-3 rounded-circle\">";
                    } else {
                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"ml-3 mt-3  rounded-circle\" alt=\"defImage\" style=\"width:55px;height:55px;\">";
                    }
                    ?>    
                        </div>

                    <?php }?>
                    
                    
                    </div></div>   
                    <?php }}?> 
                        
                    </li>
                    
                                    </ul>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Script code for show/hide audience field -->
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#showhidecomment<?php echo $row["post_id"]; ?>').hide();
                            $('button#showhidetrigger<?php echo $row["post_id"]; ?>').click(function () {
                                $('#showhidecomment<?php echo $row["post_id"]; ?>').toggle(400);
                            });
                        });
                    </script>

                    <!--end while -->
            <?php } ?>

                <!--end if -->
            </form>
            <?php
        }
        $push_btn = filter_input(INPUT_POST, "comment");
        if (isset($push_btn)) {
            $new_comment = new userHome();
            $new_comment->add_comment();
        }
    }

    public function display_user_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM posts NATURAL JOIN degree  Natural Join users WHERE post_status='0' AND user_id!='$user_id'"
                . " AND post_id NOT IN(SELECT post_id FROM `categories_relation`)"
                . " GROUP BY post_id ORDER BY post_id "
        ;
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            ?>
            <form action="#" method="post">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="card  border-info " >
                        <div class="card-body text-primary" style="width: 100%;">
                            <h5 class="card-title" style="margin-top: 15px;font-size: 15px;" >
                                <?php
                                if ($row['user_profile'] != null) {
                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
                                alt=\"Image\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                                } else {
                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                                }
                                ?>
                                <?= ucwords($row['fname'] . " " . $row['lname']); ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if ($row['user_id'] == $_SESSION['user_id']) {
                    ?>
                                    <i class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" href="index.php?p=post_del&amp;post_id=<?= $row['post_id']; ?>" class="dropdown-item">
                                            <i class="fas fa-trash" aria-hidden="true">&nbsp;Delete Post</i></a>        

                                        <a class="dropdown-item" href="index.php?p=post_edit&amp;post_id=<?= $row['post_id']; ?>">
                                            <i class="fas fa-edit" aria-hidden="true">&nbsp;Edit Post</i></a>
                                    </div>
                <?php } ?>
                                <br>
                                <p class="card-text" style="margin-left: 11.5%;"><?php echo $row['post_date']; ?>
                                    &nbsp;&nbsp;
                                    <?php if ($row['post_status'] == 0) { ?>
                                        <i class="fas fa-globe" data-toggle="tooltip" title="Public!"></i>                     
                                    <?php } else { ?>
                                        <i class="fas fa-lock" data-toggle="tooltip" title="Private!"></i>
                <?php } ?>    
                                </p>

                            </h5>
                            <br>
                            <p class="card-text" style="margin-left: 2%;color: black;"><?php echo $row['post_content']; ?></p>
                            <br>
                            <?php
                            if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"
                                alt=\"Image\" style=\"padding:3px;width:100%;\" name=\"output\" class=\"img-fluid\">";
                            }
                            ?>

                        </div>
                        <div class="clearfix"></div>
                        <div class="like_panel">

                            <?php
                            $connect = new connect();
                            $conn = $connect->getConn();
                            $count = 0;
                            $like_query = "SELECT * from likes where post_id='" . $row['post_id'] . "' and status='1' ";
                            $like_result = $conn->query($like_query);
                            if ($like_result->num_rows > 0) {
                                while ($like_row = mysqli_fetch_assoc($like_result)) {
                                    $count++;
                                }
                                // echo $count ;
                            } else {
                                $count = 0;
                            }
                            ?>
                            <i class="far fa-thumbs-up float-left like_count"  data-likes="<?= $count; ?>" id="" style="margin-left: 5%;"><?= $count; ?></i>

                            <a  data-toggle="modal" data-target="#Comments<?php echo $row['post_id']; ?>">
                                <label class="float-right" style="margin-right: 3.5%;">
                                    <?php
                                    $connect = new connect();
                                    $conn = $connect->getConn();
                                    $count = 0;
                                    $comment_query = "SELECT * from comments where post_id='" . $row['post_id'] . "'";
                                    $comment_result = $conn->query($comment_query);
                                    if ($comment_result->num_rows > 0) {
                                        while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                                            $count++;
                                        }
                                        echo $count;
                                    } else {
                                        echo "0";
                                    }
                                    ?> Comments
                                </label>
                            </a>
                            <br>
                            <hr>
                            <div class="clearfix"></div>

                            <?php
                            $post_id = $row["post_id"];
                            // echo $post_id;
                            $like_query = 'select * from posts p, users u, likes l where p.post_id=l.post_id'
                                    . ' and p.post_id ="' . $post_id . '" and u.user_id = l.user_id and u.user_id ="' . $_SESSION['user_id'] . '"';
                            $result_query = $conn->query($like_query);
                            //echo $like_query;

                            if ($result_query->num_rows > 0) {
                                $row_like = mysqli_fetch_array($result_query);


                                $status = $row_like['status'];
                                if ($status == 1) {
                                    $active = 'active-like';
                                }
                            }
                            ?>

                            <button type="submit" class="btn btn-outline-light text-dark like_button <?= $active; ?>" style="margin-left: 5%;" id='like_button' name="like"><i class='far fa-thumbs-up' style="font-size:18px"> like</i></button>

                            <button type="button" class="btn btn-outline-light text-dark " id="showhidetrigger<?php echo $row["post_id"]; ?>"><i class='far fa-comment' style="font-size:18px"> Comment</i></button>

                            <input type="hidden" value="<?= $status; ?>" id="status" >
                            <input type="hidden" value="<?= $row["post_id"]; ?>" id="post_id" >
                            <input type="hidden" value="<?= $_SESSION['user_id']; ?>" id="user_id" >
                        </div>
                        <hr> 
                        <div style="margin-left:3%;margin-bottom:1.5%;" id="showhidecomment<?php echo $row["post_id"]; ?>">
                            <form method="POST">
                                <?php
                                $user_info = "SELECT user_profile FROM `users` where user_id='$user_id'";
                                $user_result = $conn->query($user_info);
                                $user_row = mysqli_fetch_assoc($user_result);
                                if ($row['user_profile'] != null) {
                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $user_row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
                                alt=\"Image\" style=\"padding:3px;width:40px;height:40px;\" name=\"output\">";
                                } else {
                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:40px;height:40px;\" name=\"output\">";
                                }
                                ?>

                                <input type="text" class="rounded-lg" name="comments" placeholder="Write a comment ..." style="width: 75%; padding: 5px;">
                                <input type="submit" class="btn btn-outline-light text-dark " name="push" value="Push">

                                <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">

                            </form>
                        </div>

                        <div>

                        </div> 

                    </div><br>
                    <!-- The Modal -->
                    <div class="modal" id="Comments<?php echo $row['post_id']; ?>">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="far fa-comment"></i> Post Comments </h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body" style="">
                                <ul class="list-group list-group-flush">
                                <?php
                                 $connect = new connect();
                                 $conn = $connect->getConn();
                                 $comment_query = "SELECT * from comments Natural join users where post_id='" . $row['post_id'] . "'";
                                 $comment_result = $conn->query($comment_query);
                                 if ($comment_result->num_rows > 0) {
                                 while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                                 ?>
                                 <li class="list-group-item">
                                  <div class="media">
                                  <?php
                                  if ($comment_row['user_profile'] != null) {
                                  echo "<img src=\"..\backend\image\uploadedProfiles/" . $comment_row['user_profile'] . "\" alt=\"Image\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                                  } else {
                                  echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" alt=\"defImage\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                                  }
                                  ?>&nbsp;&nbsp;
                                  <div class="media-body">
                                  <p><?php echo ucwords($comment_row['fname']) . "  " . ucwords($comment_row['lname']); ?> <small>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  <i class="fas fa-clock"><?php echo substr($comment_row['date'], 11); ?></i></small></p>
                                  <p><?php echo $comment_row['content']; ?></p>
                                  </div><hr>
                                   <?php
                    $sender_id=$_SESSION['user_id'];
                    //getting the profile of sender
                    $sender_profile = "SELECT * from users where user_id='$sender_id'";
                    $sender_profile_result = $conn->query($sender_profile);
                    $row_profile = mysqli_fetch_assoc($sender_profile_result);
                    $profile = $row_profile['user_profile'];
                    $name = $row_profile['fname'];
                    // !/getting the profile of sender
                    //getting the messages
                    $replied_msg = "SELECT * from reply_comment where comment_id='$comment_id'"
                    . "ORDER BY date ASC";
                    $replied_result = $conn->query($replied_msg);
                    while ($row_reply_msg = mysqli_fetch_assoc($replied_result)) {
                    $reply_date = $row_reply_msg['date'];
                    $reply_content = $row_reply_msg['replied_message'];
                    ?>
                    <div class="media">
                    <div class="media-body ml-2  p-3 bg-white">
                    <p><?php echo "<b style='color:black;'> " . ucwords($row_profile['fname'] . " " . $row_profile['lname']). "</b>"."" ?>
                    <small>&nbsp;<i class="fas fa-clock"><?php echo " " . substr($reply_date, 11, -3); ?></i></small>
                    </p>
                     <p style="font-size:16px;color:black;"><i class="fas fa-reply"></i>
                       <?php echo $reply_content; ?></p>      
                    </div>
                    <?php
                    if ($profile != null) {
                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\"
                    alt=\"defImage\" style=\"width:55px;height:55px;\" class=\"ml-3 mt-3 rounded-circle\">";
                    } else {
                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"ml-3 mt-3  rounded-circle\" alt=\"defImage\" style=\"width:55px;height:55px;\">";
                    }
                    ?>  
                    </div>   
                    </li>
                    <?php } } }?> 
                    </ul>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    </div>
                    </div>
                    </div>
                    </div>

                    <!--Script code for show/hide audience field -->
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#showhidecomment<?php echo $row["post_id"]; ?>').hide();
                            $('button#showhidetrigger<?php echo $row["post_id"]; ?>').click(function () {
                                $('#showhidecomment<?php echo $row["post_id"]; ?>').toggle(400);
                            });
                        });
                    </script>

                    <!--end while -->
            <?php } ?>

                <!--end if -->
            </form>
            <?php
        }
        $push_btn = filter_input(INPUT_POST, "push");
        if (isset($push_btn)) {
            $new_comment = new userHome();
            $new_comment->add_comment_2();
        }
    }

    public function display_own_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM `posts` NATURAL JOIN users WHERE user_id='$user_id' ORDER BY post_date DESC";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            ?>
            <form action="#" method="post">
            <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <div class="card  border-info " >
                        <div class="card-body text-primary">
                            <h5 class="card-title" style="margin-top: 15px;font-size: 15px;" >
                                <?php
                                if ($row['user_profile'] != null) {
                                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
                                alt=\"Image\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                                } else {
                                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
                                }
                                ?>
                                <?= ucwords($row['fname'] . " " . $row['lname']); ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if ($row['user_id'] == $_SESSION['user_id']) {
                    ?>
                                    <i class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></i>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <a class="dropdown-item" href="index.php?p=post_del&amp;post_id=<?= $row['post_id']; ?>">
                                            <i class="fas fa-trash" aria-hidden="true">&nbsp;Delete Post</i></a>        

                                        <a class="dropdown-item" href="index.php?p=post_edit&amp;post_id=<?= $row['post_id']; ?>">
                                            <i class="fas fa-edit" aria-hidden="true">&nbsp;Edit Post</i></a>

                                    </div>
                <?php } ?>
                                <br>
                                <p class="card-text" style="margin-left: 11.5%;"><?php echo $row['post_date']; ?>
                                    &nbsp;&nbsp;
                                    <?php if ($row['post_status'] == 0) { ?>
                                        <i class="fas fa-globe" data-toggle="tooltip" title="Public!"></i>                     
                                    <?php } else { ?>
                                        <i class="fas fa-lock" data-toggle="tooltip" title="Private!"></i>
                <?php } ?>    
                                </p>

                            </h5>
                            <br>
                            <p class="card-text" style="margin-left: 2%;color: black;"><?php echo $row['post_content']; ?></p>
                            <br>
                            <?php
                            if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"
                                alt=\"Image\" style=\"padding:3px;width:500px;\" name=\"output\" class=\"img-fluid\">";
                            }
                            ?>

                        </div>
                        <div class="clearfix"></div>
                        <div class="like_panel">

                            <?php
                            $connect = new connect();
                            $conn = $connect->getConn();
                            $count = 0;
                            $like_query = "SELECT * from likes where post_id='" . $row['post_id'] . "' and status='1' ";
                            $like_result = $conn->query($like_query);
                            if ($like_result->num_rows > 0) {
                                while ($like_row = mysqli_fetch_assoc($like_result)) {
                                    $count++;
                                }
                                // echo $count ;
                            } else {
                                $count = 0;
                            }
                            ?>
                            <div>
                                <i class="far fa-thumbs-up float-left like_count"  data-likes="<?= $count; ?>" id="" style="margin-left: 5%;"><?= $count; ?></i>

                                <a  data-toggle="modal" data-target="#Comments<?php echo $row['post_id']; ?>">
                                    <label class="float-right" style="margin-right: 3.5%;">
                                        <?php
                                        $connect = new connect();
                                        $conn = $connect->getConn();
                                        $count = 0;
                                        $comment_query = "SELECT * from comments where post_id='" . $row['post_id'] . "'";
                                        $comment_result = $conn->query($comment_query);
                                        if ($comment_result->num_rows > 0) {
                                            while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                                                $count++;
                                            }
                                            echo $count;
                                        } else {
                                            echo "0";
                                        }
                                        ?> Comments
                                    </label>
                                </a>
                            </div><br>

                            <hr>
                            <div class="clearfix"></div>

                            <?php
                            $post_id = $row["post_id"];
                            // echo $post_id;
                            $like_query = 'select * from posts p, users u, likes l where p.post_id=l.post_id'
                                    . ' and p.post_id ="' . $post_id . '" and u.user_id = l.user_id and u.user_id ="' . $_SESSION['user_id'] . '"';
                            $result_query = $conn->query($like_query);
                            //echo $like_query;

                            if ($result_query->num_rows > 0) {
                                $row_like = mysqli_fetch_array($result_query);


                                $status = $row_like['status'];
                                if ($status == 1) {
                                    $active = 'active-like';
                                }
                            }
                            ?>
                            <button type="submit" class="btn btn-outline-light text-dark like_button <?= $active; ?>" style="margin-left: 5%;" id='like_button' name="like"><i class='far fa-thumbs-up' style="font-size:18px"> like</i></button>

                            <button type="button" class="btn btn-outline-light text-dark " id="showhidetrigger<?php echo $row["post_id"]; ?>"><i class='far fa-comment' style="font-size:18px"> Comment</i></button>

                            <input type="hidden" value="<?= $status; ?>" id="status" >
                            <input type="hidden" value="<?= $row["post_id"]; ?>" id="post_id" >
                            <input type="hidden" value="<?= $_SESSION['user_id']; ?>" id="user_id" >
                        </div>
                        <div style="margin-left:3%;margin-bottom:1.5%;" id="showhidecomment<?php echo $row["post_id"]; ?>">
                            <?php
                            $user_info = "SELECT user_profile FROM `users` where user_id='$user_id'";
                            $user_result = $conn->query($user_info);
                            $user_row = mysqli_fetch_assoc($user_result);
                            if ($row['user_profile'] != null) {
                                echo "<img src=\"..\backend\image\uploadedProfiles/" . $user_row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
                                alt=\"Image\" style=\"padding:3px;width:40px;height:40px;\" name=\"output\">";
                            } else {
                                echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:40px;height:40px;\" name=\"output\">";
                            }
                            ?>
                            <form method="POST">         
                                <input type="text" class="rounded-lg" name="comments" placeholder="Write a comment ..." style="width: 75%; padding: 5px;">
                                <input type="submit" class="btn btn-outline-light text-dark " name="comment" value="Push">
                                <input type="hidden" name="post_id" value="<?php echo $row["post_id"]; ?>">
                            </form> 
                        </div>

                        <div>

                        </div>   
                    </div><br>
                    <!-- The Modal -->
                    <div class="modal" id="Comments<?php echo $row['post_id']; ?>">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title"><i class="far fa-comment"></i> Post Comments </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body" style="">
                    <ul class="list-group list-group-flush">
                     <?php
                     $connect = new connect();
                     $conn = $connect->getConn();
                     $comment_query = "SELECT * from comments Natural join users where post_id='" . $row['post_id'] . "'";
                     $comment_result = $conn->query($comment_query);
                     if ($comment_result->num_rows > 0) {
                     while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                     $comment_id=$comment_row['id'];
                     ?>
                     <li class="list-group-item">
                     <div class="media border-bottom">
                     <?php
                     if ($comment_row['user_profile'] != null) {
                     echo "<img src=\"..\backend\image\uploadedProfiles/" . $comment_row['user_profile'] . "\" alt=\"Image\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                     } else {
                     echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" alt=\"defImage\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                     }
                     ?>&nbsp;&nbsp;
                     <div class="media-body">
                    <p><?php echo "<b style='color:black;'> " . ucwords($comment_row['fname'] . " " . $comment_row['lname']). "</b>"."" ?>
                    <small>&nbsp;<i class="fas fa-clock"><?php echo " " . substr($comment_row['date'], 11, -3); ?></i></small>
                    </p>
                     <p style="font-size:16px;color:black;"><i class="fas fa-comment-dots"></i>
                       <?php echo $comment_row['content']; ?></p>  <hr>    
                    
                     <?php
                        $sender_id=$_SESSION['user_id'];
                    //getting the profile of sender
                    $sender_profile = "SELECT * from users where user_id='$sender_id'";
                    $sender_profile_result = $conn->query($sender_profile);
                    $row_profile = mysqli_fetch_assoc($sender_profile_result);
                    $profile = $row_profile['user_profile'];
                    $name = $row_profile['fname'];
                    // !/getting the profile of sender
                    //getting the messages
                    $replied_msg = "SELECT * from reply_comment where comment_id='$comment_id'"
                    . "ORDER BY date ASC";
                    $replied_result = $conn->query($replied_msg);
                    while ($row_reply_msg = mysqli_fetch_assoc($replied_result)) {
                    $reply_date = $row_reply_msg['date'];
                    $reply_content = $row_reply_msg['replied_message'];
                    ?>
                    <div class="media">
                    <div class="media-body ml-2  p-3 bg-white">
                    <p><?php echo "<b style='color:black;'> " . ucwords($row_profile['fname'] . " " . $row_profile['lname']). "</b>"."" ?>
                    <small>&nbsp;<i class="fas fa-clock"><?php echo " " . substr($reply_date, 11, -3); ?></i></small>
                    </p>
                     <p style="font-size:16px;color:black;"><i class="fas fa-reply"></i>
                       <?php echo $reply_content; ?></p>      
                    </div>
                    <?php
                    if ($profile != null) {
                    echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\"
                    alt=\"defImage\" style=\"width:55px;height:55px;\" class=\"ml-3 mt-3 rounded-circle\">";
                    } else {
                    echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"ml-3 mt-3  rounded-circle\" alt=\"defImage\" style=\"width:55px;height:55px;\">";
                    }
                    ?>
                        </div>
                    </div> 
                    </div>
                    <?php } } }?>
                    </li>
                    </ul>
                    </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    </div>
                    </div>
                    </div>
                    <!--Script code for show/hide audience field -->
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#showhidecomment<?php echo $row["post_id"]; ?>').hide();
                            $('button#showhidetrigger<?php echo $row["post_id"]; ?>').click(function () {
                                $('#showhidecomment<?php echo $row["post_id"]; ?>').toggle(400);
                            });
                        });
                    </script>

                    <!--end while -->
            <?php } ?>

                <!--end if -->
            </form>
            <?php
        }
        $push_btn = filter_input(INPUT_POST, "comment");
        if (isset($push_btn)) {
            $new_comment = new userHome();
            $new_comment->add_comment_3();
        }
    }

    public function display_edit_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $post_id = $_GET['post_id'];
        $new_query = "select * from posts where post_id=$post_id";
        $result = $conn->query($new_query);
        $row = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <div class="container-fluid">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php?p=userHome" style="text-decoration: none;color: black;font-size: 18px;">Home</a></li>
                        <li class="breadcrumb-item"><a href="#" style="text-decoration: none;color: red;font-size: 18px;">Edit Post</a></li>
                    </ol>
                </nav>   
                <form method="POST" action="" enctype="multipart/form-data" style="padding:5px;">
                    <h3>Post  Details :</h3><br>
                    <div class="form-row">
                        <div class="form-group row col-md-6" style="margin-left:10px;">
                            <?php
                            if ($row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"
                                alt=\"Image\" style=\"padding:3px;height:300px;width:300px;\" id=\"output\">";
                            }
                            ?>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label style="font-size: 18px;"><b>Post ID </b></label>
                            <input type="text" value="<?= $row['post_id'] ?>" class="form-control" name="id" disabled style="border: 2px solid #ddd; padding:7px;
                                   font-family: 'Exo', sans-serif;color:black;font-size:14px;"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label style="font-size: 18px;"><b>Post Title </b></label>
                            <input type="text" value="<?= $row['post_title'] ?>"  class="form-control" name="post_title" style="border: 2px solid #ddd; padding:7px;
                                   font-family: 'Exo', sans-serif;color:black;font-size:14px;"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label style="font-size: 18px;"><b>Post Status </b></label>
                            <select class="form-control" id="status" name="status"  style="border: 2px solid #ddd;">
                                <option selected disabled>Choose ... </option>
                                <option value="0">Public</option>
                                <option value="1">Private</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label style="font-size: 18px;"><b>Post Image</b></label><br>
                            <label for="post_image" class=" btn border border-primary">Upload New Image</label>
                            <input type="file"  value="<?php echo $row['image_path'] ?>" name="post_image" id="post_image" multiple="multiple" accept="image/*"  onchange="loadFile(event)" style="display: none" />&nbsp;&nbsp;&nbsp;<img src="" id="output">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="post_content" style="font-size: 18px;"><b>Post Content</b></label>
                        <textarea value="" class="form-control" id="post_content" name="post_content" style="border: 2px solid #ddd; padding:7px;font-family: 'Exo', sans-serif;color:black;font-size:14px;"><?= $row['post_content'] ?></textarea>   
                    </div>

                    <input type="hidden" name="post_id" value="<?= $_GET['post_id']; ?>" />
                    <div class="form-group" style="margin-left: 4px;">
                        <button type="submit" class="btn btn-primary" name="update_info" id="update_info">UPDATE
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </form></div><script>
                    var loadFile = function (event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
            </script><?php
            $story_update = filter_input(INPUT_POST, "update_info");
            if (isset($story_update)) {
                $new_story = new userHome();
                $new_story->update_post_info();
            }
        }
    }

    public function update_post_info() {
        $connect = new connect();
        $conn = $connect->getConn();
        $post_id = $_POST['post_id'];
        $new_title = filter_input(INPUT_POST, 'post_title');
        $new_content = filter_input(INPUT_POST, 'post_content');
        $new_status = $_POST['status'];
        //uploaded file info's
        $n = $_FILES['post_image']['name'];
        $s = $_FILES['post_image']['size'];
        $t = $_FILES['post_image']['tmp_name'];
        $e = $_FILES['post_image']['error'];
        $ty = $_FILES['post_image']['type'];
        move_uploaded_file($t, "../backend/image/postsImage/" . $n);
        $path = $n;
        $query = "UPDATE `posts` SET `post_title`='" . $new_title . "',`post_content`='" . $new_content . "',`post_status`='" . $new_status . "',`image_path`='" . $path . "'  WHERE `post_id`='" . $post_id . "'";
        $result = $conn->query($query);
        if ($result) {
            echo "<script>
                    Swal.fire('Good job!','You post is edited','success')</script>";
            //$header=new header_process();
            //$header->header("index.php?p=show_posts");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_search_area() {
        ?><div class="container-fluid" style="margin-left: 25%;margin-top: 5%;">
            <div class="row">
                <h6 style="color:#2196F3">Popular Search Categories</h6>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <a href="index.php?p=alumni" style="text-decoration: none;color:black;">
                        <i class="fas fa-graduation-cap fa-2x text-center" ></i><br>
                        <p style="font-size: 15px;">Alumni</p>
                    </a> 
                </div>
                <div class="col-sm-6">
                    <a href="index.php?p=companies" style="text-decoration: none;color:black;">
                        <i class="fas fa-building fa-2x text-center"  ></i><br>
                        <p style="font-size: 15px;">Companies</p>
                    </a> 
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-6">
                    <a href="index.php?p=availableCV" style="text-decoration: none;color:black;">
                        <i class="fas fa-file-alt fa-2x text-center" ></i><br>
                        <p style="font-size: 15px;">Curriculum Vitae(CV)</p>   
                    </a>

                </div>
                <div class="col-sm-6">
                    <a href="index.php?p=success_stories" style="text-decoration: none;color:black;">
                        <i class="fas fa-chess-queen fa-2x  "></i><br>
                        <p style="font-size: 15px;">Success Storiess</p>   
                    </a>

                </div>
            </div>

            <br><br>

        </div>


        <?php
    }

    public function display_success_stories() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM `success_stories` ";
        $result = $conn->query($user_query);
        ?>

        <div class="container-fluid" style="margin-top: 5%;">
            <h2 style="color:#2196F3" class="text-center">Our Success Stories</h2><hr>
            <!-- Actual search box -->
            <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" id="myFilter" placeholder="Search..." onkeyup="myFunction()" >
            </div>


            <br>
            <div class="row" id="myItems"> 
                <?php
                while (($row = mysqli_fetch_array($result))) {
                    $profile = $row['image_path'];
                    ?>
                    <div class="col-lg-3 col-md-6 mb-4 card_fillter">
                        <div class="card  border-info " >
                            <?php
                            if ($profile != null) {
                                echo "<img src=\"..\backend\image\imgStories/" . $row['image_path'] . "\"
                                alt=\"defImage\" style=\"padding:3px;height:250px;\" class=\"card-img-top\" name=\"output\">";
                            }
                            ?>

            <?php ?>

                            <div class="card-body text-primary">
                                <h1 class="card-title" style="color: black;font-size: 33px;"><?php echo ucwords($row['story_title']); ?></h1><br>
                                <p class="" style="color: grey;font-size: 25px;">
            <?php echo $row['story_id']; ?></p>
                                <p class="" style="color: black;"><?php echo $row['story_content']; ?></p>
                            </div>
                            <div class="card-footer text-muted text-center">

                            </div>
                        </div>
                    </div>

                    <!--while end -->
        <?php } ?>
            </div>
        </div>
        <script type="text/javascript">
            function myFunction() {
                var input, filter, cards, cardContainer, h1, title, i;
                input = document.getElementById("myFilter");
                filter = input.value.toUpperCase();
                cardContainer = document.getElementById("myItems");
                cards = cardContainer.getElementsByClassName("card_fillter");
                for (i = 0; i < cards.length; i++) {
                    title = cards[i].querySelector(".card-body h1.card-title");
                    if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                        cards[i].style.display = "";
                    } else {
                        cards[i].style.display = "none";
                    }
                }
            }
        </script>

        <?php
    }
  
    public function message(){
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $sender_id=$_GET['snd'];
        $message_id=$_GET['msg_id'];
        //getting the profile of sender
        $sender_profile = "SELECT * from users where user_id='$sender_id'";
        $sender_profile_result = $conn->query($sender_profile);
        $row_profile = mysqli_fetch_assoc($sender_profile_result);
        $profile = $row_profile['user_profile'];
        $name = $row_profile['fname']." ".$row_profile['lname'];
        // !/getting the profile of sender
        $msg_query = "SELECT * from messages  where message_id='$message_id'"
                   . " ORDER BY date DESC ";
        $result = $conn->query($msg_query);
        if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        ?>
        <div class ="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="modal-body" style="">
        <div class="card  border-info " >
        <div class="card-body text-primary" style="width: 100%;">
        <h5 class="card-title" style="margin-top: 15px;font-size: 15px;" >
        <?= ucwords($name); ?>
        </h5><hr>
        <div class="media border-bottom p-3">
        <?php
        if ($profile!= null) {
        echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile. "\"
        alt=\"defImage\" style=\"width:55px;height:55px;\" class=\"mr-3 rounded-circle\">";
        } else {
        echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"mr-3 rounded-circle\" alt=\defImage\" style=\"width:55px;\">";
        }
        ?>
        <div class="media-body">
        <p><?php echo "<b style='color:black;'> " . ucwords($name). "</b>"."" ?>
        <small>&nbsp;<i class="fas fa-clock"><?php echo " " . substr($row['date'], 11, -3); ?></i></small>
        </p>    
        <p style="font-size:16px;color:black;"><i class="fas fa-comment-dots"></i>
        <?php echo " ". $row['content'] ?>
        <a href="" data-toggle="collapse" data-target="#demo<?=$message_id?>">relpy</a>
        </p>
        <div id="demo<?=$message_id?>" class="collapse">
        <form method="post">
        <div class="container-fluid">
        <div class="row">
        <input type="hidden" name="receiver_id" value="<?php echo $sender_id; ?>">
        <input type="hidden" name="type" value="<?php echo 'reply' ?>">
        <input type="hidden" name="msg_id" value="<?php echo $message_id; ?>">
        <div class="col-md-8"><input type="text" class="form-control" name="msg_reply" placeholder="reply ... "><?php echo $message_id; ?></div>
        <div class="col-md-4"><input type="submit" class="form-control btn-primary" name="reply_msg"></div>
        </div>
        </div>
        </form>
        </div>
        </div>
            <?php } ?>
        </div>
        
        
        <?php
        $sender_id=$_SESSION['user_id'];
        $msg_id = $_GET['msg_id'];
        $receiver_id = $_GET['snd'];
        //getting the profile of sender
        $sender_profile = "SELECT * from users where user_id='$sender_id'";
        $sender_profile_result = $conn->query($sender_profile);
        $row_profile = mysqli_fetch_assoc($sender_profile_result);
        $profile = $row_profile['user_profile'];
        $name = $row_profile['fname'];
        // !/getting the profile of sender
        //getting the messages
        $sender_msg = "SELECT * from messages"
        . " where sender_id='$sender_id' AND receiver_id='$receiver_id' "
        . "AND type='reply' ORDER BY date ASC";
        $sender_msg_result = $conn->query($sender_msg);
        while ($row_msg = mysqli_fetch_assoc($sender_msg_result)) {
        $msg_date = $row_msg['date'];
        $msg_content = $row_msg['content'];
        ?>
        <div class="media border-bottom p-3">
        <div class="media-body ml-2 border-bottom p-3 bg-white">
        <p><?php echo "<b style='color:black;'> " . ucwords($row_profile['fname'] . " " . $row_profile['lname']). "</b>"."" ?>
        <small>&nbsp;<i class="fas fa-clock"><?php echo " " . substr($row_msg['date'], 11, -3); ?></i></small>
        </p>
         <p style="font-size:16px;color:black;"><i class="fas fa-reply"></i>
           <?php echo $msg_content; ?></p>      
        </div>
        <?php
        if ($profile != null) {
        echo "<img src=\"..\backend\image\uploadedProfiles/" . $profile . "\"
        alt=\"defImage\" style=\"width:55px;height:55px;\" class=\"ml-3 mt-3 rounded-circle\">";
        } else {
        echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"ml-3 mt-3  rounded-circle\" alt=\"defImage\" style=\"width:55px;height:55px;\">";
        }
        ?>    
            </div>
        
        <?php }?>
        
        
        
        
        </div>
        </div>
        </div>
        </div>
        <div class="col-md-3"></div>
        </div> 
        </div>    
        <?php  
        $reply_btn = filter_input(INPUT_POST, "reply_msg");
        if (isset($reply_btn)) {
            $reply_msg = new userHome();
            $reply_msg->reply_msg();
        }
          
        
    }

    public function reply_msg() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $msg = filter_input(INPUT_POST, 'msg_reply');
        $type = filter_input(INPUT_POST, 'type');
        $msg_id = filter_input(INPUT_POST, 'msg_id');
        $receiver_id = filter_input(INPUT_POST, 'receiver_id    ');
        date_default_timezone_set("Asia/Beirut");
        $msg_date = date("Y:m:j H:i:s", time());
        $new_msg = "INSERT INTO `messages`(`message_id`, `sender_id`, `receiver_id`, `content`, `status`, `type`, `date`) VALUES (NULL,'" . $user_id . "','" . $receiver_id . "','" . $msg . "','1','" . $type . "','" . $msg_date . "')";
        $new_msg_result = $conn->query($new_msg);
        $update_type = "UPDATE `messages` SET `type`='reply' WHERE message_id='$msg_id'";
        $update_result = $conn->query($update_type);
        if ($update_result) {
            $header = new header_process();
            $header->header("index.php?p=messages&msg_id=$msg_id&snd=$receiver_id");
        } else {
            echo "<script>
                 Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_companies() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "SELECT * FROM `companies`NATURAL Join `company_spec_relation`NATURAL Join `specialization` WHERE 1";
        $result = $conn->query($user_query);
        if ($result->num_rows > 0) {
            ?>
            <!-- Page Content -->
            <div class="container">

                <hr style="border-width: 2px;border-color:black;">
                <br>
                <div class="row">
                    <div class="col-md-3">  
                        <!-- Default unchecked -->
                        <div class="list-group">
                            <h5 class="text-left">Companies Name</h5><br>
                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $company_name_query = "SELECT DISTINCT(company_name) FROM companies  ORDER BY company_id ASC";
                                $company_name_result = $conn->query($company_name_query);
                                foreach ($company_name_result as $row) {
                                    ?>
                                    <div class="list-group-item text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input common_selector name" id="<?php echo $row['company_name']; ?>" value="<?php echo $row['company_name']; ?>">
                                            <label class="custom-control-label" for="<?php echo $row['company_name']; ?>"><?php echo $row['company_name']; ?></label>
                                        </div>
                                    </div>
                <?php
            }
            ?>
                            </div>
                        </div><br><br>
                        <div class="list-group">
                            <h5 class="text-left">Companies Address</h5><br>
                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $company_name_query = "SELECT DISTINCT(company_address) FROM companies  ORDER BY company_id ASC";
                                $company_name_result = $conn->query($company_name_query);
                                foreach ($company_name_result as $row) {
                                    ?>
                                    <div class="list-group-item text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input common_selector address" id="<?php echo $row['company_address']; ?>" value="<?php echo $row['company_address']; ?>">
                                            <label class="custom-control-label" for="<?php echo $row['company_address']; ?>"><?php echo $row['company_address']; ?></label>
                                        </div>
                                    </div>
                <?php
            }
            ?>
                            </div>
                        </div><br><br>

                    </div>
                    <div class="col-md-9">
                        <br />
                        <div class="row filter_data">

                        </div>
                    </div>
                </div>

            </div>
            <script>
                $(document).ready(function () {

                    filter_data();

                    function filter_data()
                    {
                        $('.filter_data').html('<div id="loading" style="" ></div>');
                        var action = 'fetch_data';
                        var name = get_filter('name');
                        var address = get_filter('address');

                        $.ajax({
                            url: "../frontend/pages/users/searches/fetch_data.php",
                            method: "POST",
                            data: {action: action, name: name, address: address},
                            success: function (data) {
                                $('.filter_data').html(data);
                            }
                        });
                    }

                    function get_filter(class_name)
                    {
                        var filter = [];
                        $('.' + class_name + ':checked').each(function () {
                            filter.push($(this).val());
                        });
                        return filter;
                    }

                    $('.common_selector').click(function () {
                        filter_data();
                    });


                });
            </script>
            <?php
        }
    }

    public function display_alumni() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_query = "
                SELECT * FROM `alumni_users` NATURAL JOIN users
                NATURAL join studies NATURAL JOIN degree  WHERE user_role_id='2'
                                ";
        $result = $conn->query($user_query);

        if ($row = mysqli_fetch_assoc($result)) {
            $receiver_id = $row['user_id'];
            ?>
            <!-- Page Content -->
            <div class="container">

                <hr style="border-width: 2px;border-color:black;">
                <br>
                <div class="row">
                    <div class="col-md-3">  
                        <!-- Default unchecked -->
                        <div class="list-group">
                            <h5 class="text-left">Alumni First Name</h5><br>
                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $fname_query = "SELECT DISTINCT(fname) FROM users where user_role_id='2' ORDER BY user_id ASC";
                                $fname_result = $conn->query($fname_query);
                                foreach ($fname_result as $row) {
                                    ?>
                                    <div class="list-group-item text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input common_selector fname" id="<?php echo $row['fname']; ?>" value="<?php echo $row['fname']; ?>">
                                            <label class="custom-control-label" for="<?php echo $row['fname']; ?>"><?php echo $row['fname']; ?></label>
                                        </div>
                                    </div>
                <?php
            }
            ?>
                            </div>
                        </div>
                        <div class="list-group">
                            <h5 class="text-left">Alumni Last Name</h5><br>
                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $lname_query = "SELECT DISTINCT(lname) FROM users where user_role_id='2'  ORDER BY user_id ASC";
                                $lname_result = $conn->query($lname_query);
                                foreach ($lname_result as $row) {
                                    ?>
                                    <div class="list-group-item text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input common_selector lname" id="<?php echo $row['lname']; ?>" value="<?php echo $row['lname']; ?>">
                                            <label class="custom-control-label" for="<?php echo $row['lname']; ?>"><?php echo $row['lname']; ?></label>
                                        </div>
                                    </div>
                <?php
            }
            ?>
                            </div>
                        </div>
                        <div class="list-group">
                            <h5 class="text-left">Alumni Major</h5><br>
                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $fname_query = "SELECT DISTINCT(degree_title) from users NATURAL JOIN user_role NATURAL JOIN alumni_users NATURAL JOIN studies NATURAL JOIN degree  where user_role_id='2' ORDER BY user_id ASC";
                                $fname_result = $conn->query($fname_query);
                                foreach ($fname_result as $row) {
                                    ?>
                                    <div class="list-group-item text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input common_selector degree_title" id="<?php echo $row['degree_title']; ?>" value="<?php echo $row['degree_title']; ?>">
                                            <label class="custom-control-label" for="<?php echo $row['degree_title']; ?>"><?php echo $row['degree_title']; ?></label>
                                        </div>
                                    </div>
                <?php
            }
            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <br />
                        <form method="POST">
                            <div class="row filter_data">

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <script>
                $(document).ready(function () {

                    filter_data();

                    function filter_data()
                    {
                        $('.filter_data').html('<div id="loading" style="" ></div>');
                        var action = 'fetch_data';
                        var fname = get_filter('fname');
                        var lname = get_filter('lname');
                        var degree_title = get_filter('degree_title');

                        $.ajax({
                            url: "../frontend/pages/users/searches/fetch_alumni.php",
                            method: "POST",
                            data: {action: action, fname: fname, lname: lname, degree_title: degree_title},
                            success: function (data) {
                                $('.filter_data').html(data);
                            }
                        });
                    }

                    function get_filter(class_name)
                    {
                        var filter = [];
                        $('.' + class_name + ':checked').each(function () {
                            filter.push($(this).val());
                        });
                        return filter;
                    }

                    $('.common_selector').click(function () {
                        filter_data();
                    });
                });
            </script>
            <div class="chat-popup" id="myForm">
                <form action="" method="POST" class="form-container">
                    <h1>Chat</h1>
                    <?php
                    echo "id:" . $receiver_id;
                    echo $sender_id = $_SESSION['user_id'];
                    ?>
                    <label for="msg"><b>Message</b></label>
                    <textarea placeholder="Type message.." name="msg" required></textarea>
                    <button type="submit" name="message"class="btn">Send</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    <input type="hidden" name="receiver_id" value="<?php echo $receiver_id; ?>">
                </form>
            </div>
            <script>
                function openForm() {
                    document.getElementById("myForm").style.display = "block";
                }
                function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                }
            </script>
            <?php
        }
        $send_btn = filter_input(INPUT_POST, "message");
        if (isset($send_btn)) {
            $send_msg = new userHome();
            $send_msg->send_msg();
        }
    }

    public function display_comment_posts() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $post_id = $_GET['post_id'];
        $commentator_id = $_GET['id_2'];
        $query = "SELECT * FROM `posts` Natural join users  where post_id='$post_id'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        ?><div class="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <div class="modal-body" style="">
        <div class="card  border-info " >
        <div class="card-body text-primary" style="width: 100%;">
        <h5 class="card-title" style="margin-top: 15px;font-size: 15px;" >
        <?php
        if ($row['user_profile'] != null) {
        echo "<img src=\"..\backend\image\uploadedProfiles/" . $row['user_profile'] . "\" class=\"img-fluid rounded-circle\"
        alt=\"Image\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
        } else {
        echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" class=\"img-fluid rounded-circle\" alt=\"defImage\" style=\"padding:3px;width:45px;height:45px;\" name=\"output\">";
         }
        ?>
        <?= ucwords($row['fname'] . " " . $row['lname']); ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php if ($row['user_id'] == $_SESSION['user_id']) {
        ?>
        <i class="dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></i>
        <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="index.php?p=post_del&amp;post_id=<?= $row['post_id']; ?>" class="dropdown-item">
         <i class="fas fa-trash" aria-hidden="true">&nbsp;Delete Post</i></a>        
        <a class="dropdown-item" href="index.php?p=post_edit&amp;post_id=<?= $row['post_id']; ?>">
        <i class="fas fa-edit" aria-hidden="true">&nbsp;Edit Post</i></a>
        </div>
        <?php } ?>
        <br>
         <p class="card-text" style="margin-left: 11.5%;"><?php echo $row['post_date']; ?>
         &nbsp;&nbsp;
        <?php if ($row['post_status'] == 0) { ?>
       <i class="fas fa-globe" data-toggle="tooltip" title="Public!"></i>                     
       <?php } else { ?>
        <i class="fas fa-lock" data-toggle="tooltip" title="Private!"></i>
        <?php } ?></p></h5><br>
       <p class="card-text" style="margin-left: 2%;color: black;"><?php echo $row['post_content']; ?></p>
        <br>
        <?php
       if ($row['image_path'] != null) {
        echo "<img src=\"..\backend\image\postsImage/" . $row['image_path'] . "\"alt=\"Image\" style=\"padding:3px;width:100%;\" name=\"output\" class=\"img-fluid\">";
        }?>
        </div>
        <div class="clearfix">
        <i class="far fa-thumbs-up float-left" id="" style="margin-left: 5%;">
         <?php
        $connect = new connect();
        $conn = $connect->getConn();
        $count = 0;
        $like_query = "SELECT * from likes where post_id='" . $post_id . "'";
        $like_result = $conn->query($like_query);
        if ($like_result->num_rows > 0) {
        while ($like_row = mysqli_fetch_assoc($like_result)) {
        $count++;
        }
        echo $count;
        } else {
        echo "0";
        }
        ?>
        </i>              
        <a>
        <label class="float-right" style="margin-right: 3.5%;">
        <?php
        $connect = new connect();
        $conn = $connect->getConn();
        $count = 0;
        $comment_query = "SELECT * from comments where post_id='" . $post_id . "'";
        $comment_result = $conn->query($comment_query);
        if ($comment_result->num_rows > 0) {
        while ($comment_row = mysqli_fetch_assoc($comment_result)) {
        $count++;
        }
        echo $count;
        } else {
        echo "0";
        }
        ?> Comments
        </label>
        </a>
       </div>
       <hr>
        <ul class="list-group list-group-flush">
        <?php
        $connect = new connect();
        $conn = $connect->getConn();
        $comment_query = "SELECT * from comments Natural join users where  user_id='" . $commentator_id . "' and post_id='" . $post_id . "' ";
        $comment_result = $conn->query($comment_query);
        if ($comment_result->num_rows > 0) {
        while ($comment_row = mysqli_fetch_assoc($comment_result)) {
         ?>
        <li class="list-group-item">
        <div class="media">
        <div class="ml-4">  
        <?php
                                                        if ($comment_row['user_profile'] != null) {
                                                            echo "<img src=\"..\backend\image\uploadedProfiles/" . $comment_row['user_profile'] . "\" alt=\"Image\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                                                        } else {
                                                            echo "<img src=\"..\backend\image\uploadedProfiles\profile.jpg\" alt=\"defImage\" class=\" mr-2 mt-2 rounded-circle\" style=\"width:50px;height:50px;\">";
                                                        }
                                                        ?></div>
                                                    &nbsp;&nbsp;
                                                    <div class="media-body">
                                                        <p><b style="color:black;"><?php echo ucwords($comment_row['fname']) . "  " . ucwords($comment_row['lname']); ?></b> <small>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <i class="fas fa-clock"><?php echo substr($comment_row['date'], 11); ?></i></small></p>
                                                        <p><?php echo $comment_row['content'] . "  "; ?><a href="" data-toggle="collapse" data-target="#demo<?php echo $comment_row['id']; ?>">relpy</a></p>

                                                        <div id="demo<?php echo $comment_row['id']; ?>" class="collapse">
                                                            <form method="POST">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <input type="hidden" name="receiver_id" value="<?php echo $comment_row['user_id']; ?>">
                                                                        <input type="hidden" name="comment_id" value="<?php echo $comment_row['id']; ?>">  
                                                                         <input type="hidden" name="post_id" value="<?php echo $comment_row['post_id']; ?>"> 
                                                                        <div class="col-md-8"><input type="text" class="form-control" name="replied_text" placeholder="reply ... "></div>
                                                                        <div class="col-md-4"><input type="submit" class="form-control btn-primary" name="reply_comment"></div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <?php
                                                        $connect = new connect();
                                                        $conn = $connect->getConn();
                                                        $cmt_id = $comment_row['id'];
                                                        $replied_query = "SELECT * from reply_comment,users   where user_id=sender_id and comment_id='$cmt_id'";
                                                        $replied_result = $conn->query($replied_query);
                                                        if ($replied_result->num_rows) {
                                                            while ($replied_row = mysqli_fetch_assoc($replied_result)){
                                                            echo '<hr>
          <div class="media">
          <div class="media-body">
          <p><b style="color:black;">' . $replied_row['fname'] . '&nbsp;' . $replied_row['lname'] . '</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small><i class="fas fa-clock">
           ' . substr($replied_row['date'], 11) . '</i></small></p>
          <p>' . $replied_row['replied_message'] . '</p>
          </div>
          <img src="../backend/image/uploadedProfiles/' . $replied_row['user_profile'] . '" alt="' . $replied_row['fname'] . '" class="mr-3 mt-2 rounded-circle" style="width:50px;height:50px;">
          </div>';
                                                        }}
                                                        ?>

                                                    </div>

                                                </div>

                                            </li>
                                            <?php
                                        }
                                    }
                                    ?> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>  
            </div>

            <?php
        }
        $reply_btn = filter_input(INPUT_POST, "reply_comment");
        if (isset($reply_btn)) {
            $reply_msg = new userHome();
            $reply_msg->reply_comment();
        }
    }

    public function reply_comment() {
        $connect = new connect();
        $conn = $connect->getConn();
        $sender_id = $_SESSION['user_id'];
        $receiver_id = $_POST['receiver_id'];
        $cmt_id = $_POST['comment_id'];
        $post_id=$_POST['post_id'];
        $replied_content = $_POST['replied_text'];
        date_default_timezone_set("Asia/Beirut");
        $replied_date = date("Y:m:j H:i:s", time());
        $reply_comment_query = "INSERT INTO `reply_comment`(`id`, `comment_id`, `sender_id`, `receiver_id`, `replied_message`, `date`)"
                . " VALUES (NULL,'$cmt_id','$sender_id','$receiver_id','$replied_content','$replied_date')";
        $reply_comment_result = $conn->query($reply_comment_query);
        if ($reply_comment_result) {
            $update_type = "UPDATE `comments` SET `type`='1' WHERE id='$cmt_id'";
            $update_result = $conn->query($update_type);
            $header = new header_process();
            $header->header("index.php?p=postcomment&post_id=$post_id&id_2=$receiver_id");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Your are not able to use (commas,dots,underscore,etc..)!'})</script>";
             
        }
    }

    public function send_msg() {

        $connect = new connect();
        $conn = $connect->getConn();
        $receiver_id = $_POST['receiver_id'];

        $sender_id = $_SESSION['user_id'];
        $msg = filter_input(INPUT_POST, 'msg');
        date_default_timezone_set("Asia/Beirut");
        $msg_date = date("Y:m:j H:i:s", time());
        $new_msg = "INSERT INTO `messages`(`message_id`, `sender_id`, `receiver_id`, `content`, `status`, `type`, `date`) VALUES (NULL,'" . $sender_id . "','" . $receiver_id . "','" . $msg . "','1','new','" . $msg_date . "')";
        $new_msg_result = $conn->query($new_msg);
        if ($new_msg_result) {
            echo "message sent!";
        } else {
            echo "<script>
                 Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_profile() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * FROM `users` WHERE user_id='$user_id'";
        $result = $conn->query($user_query);
        while ($row = mysqli_fetch_assoc($result)) {
            $user_desc = $row['description'];
        }
        ?><div class="col-md-1">

        </div>
        <div class="col-md-9" >

            <nav class="navbar navbar-expand-md  bg-light navbar-light " style="font-size: 15px;font-weight: bold;">
                <!-- Brand -->
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar2">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar2">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bio">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?p=photos">Photos</a>
                        </li>

                    </ul>
            </nav> 
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <br>
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="card" id="bio">
                                    <div class="card-body">
                                        <p style="font-size: 18px;"><i class="fas fa-globe fa-fw" style="color: blue;"></i>Intro</p><hr style="border-color: red;">    
                                        <a href="#demo" data-toggle="collapse" style="text-decoration: none;color:black; "> 
                                            <p class="card-text"> <?php echo $user_desc; ?> </p>
                                        </a> 

                                    </div>
                                    <div id="demo" class="card-footer collapse">
                                        <form method="POST">
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">    
                                                <div class="col-md-8"><textarea rows="3" class="form-control" placeholder="type a new bio" name="bio"></textarea></div>
                                                <div class="col-md-4"><button class="btn btn-primary" name="description">Save</button>
                                                </div>
                                            </div>
                                        </form>    

                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <?php
                        $display_post = new userHome();
                        $display_post->display_own_image();
                        ?>
                    </div>
                    <div class="col-md-7 p-2"><?php
                        $display_post = new userHome();
                        $display_post->display_add_post();
                        $display_post->display_own_post();
                        ?></div>
                </div>
            </div>

        </div>
        <div class="col-md-2"></div>
        <script>
            var loadFile = function (event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <?php
        $change_desc = filter_input(INPUT_POST, "description");
        if (isset($change_desc)) {
            $change_desc = new userHome();
            $change_desc->update_description();
        }
    }

    public function update_description() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = filter_input(INPUT_POST, 'user_id');
        $description = filter_input(INPUT_POST, 'bio');
        $sql = "UPDATE `users` SET `description`='$description' WHERE user_id='$user_id'";
        $result = $conn->query($sql);
        if ($result) {
            $header = new header_process();
            $header->header("index.php?p=profile");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function add_like() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = filter_input(INPUT_POST, 'userID');
        $post_id = filter_input(INPUT_POST, 'postID');
        $new_like_query = "INSERT INTO `likes`(`id`, `user_id`, `post_id`) VALUES (NULL,'" . $user_id . "','" . $post_id . "')";
        $new_like_result = $conn->query($new_like_query);

        if ($new_like_result) {
            
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function add_comment() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];
        $comment_content = filter_input(INPUT_POST, 'comments');
        date_default_timezone_set("Asia/Beirut");
        $comment_date = date("Y:m:j H:i:s", time());
        $new_comment_query = "INSERT INTO `comments`(`id`, `user_id`, `post_id`, `content`, `date`, `type`) VALUES (NULL,'" . $user_id . "','" . $post_id . "','" . $comment_content . "','" . $comment_date . "','0')";
        $new_comment_result = $conn->query($new_comment_query);

        if ($new_comment_result) {
            $header = new header_process();
            $header->header("index.php?p=userHome");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function add_comment_2() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];
        $comment_content = filter_input(INPUT_POST, 'comments');
        date_default_timezone_set("Asia/Beirut");
        $comment_date = date("Y:m:j H:i:s", time());
        $new_comment_query = "INSERT INTO `comments`(`id`, `user_id`, `post_id`, `content`, `date`, `type`) VALUES (NULL,'" . $user_id . "','" . $post_id . "','" . $comment_content . "','" . $comment_date . "','0')";
        $new_comment_result = $conn->query($new_comment_query);

        if ($new_comment_result) {
            $header = new header_process();
            $header->header("index.php?p=userHome");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function add_comment_3() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $post_id = $_POST['post_id'];
        $comment_content = filter_input(INPUT_POST, 'comments');
        date_default_timezone_set("Asia/Beirut");
        $comment_date = date("Y:m:j H:i:s", time());
        $new_comment_query = "INSERT INTO `comments`(`id`, `user_id`, `post_id`, `content`, `date`, `type`) VALUES (NULL,'" . $user_id . "','" . $post_id . "','" . $comment_content . "','" . $comment_date . "','0')";
        $new_comment_result = $conn->query($new_comment_query);

        if ($new_comment_result) {
            $header = new header_process();
            $header->header("index.php?p=userHome");
        } else {
            echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong!'})</script>";
        }
    }

    public function display_photos() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from users where user_id='" . $user_id . "'";
        $user_result = $conn->query($user_query);
        $user_row = mysqli_fetch_array($user_result);
        $post_query = "SELECT image_path from posts where user_id='" . $user_id . "'";
        $post_result = $conn->query($post_query);
        ?> <!-- Page Content -->

        <div class="container">
            <h4>Shared Photos</h4>
            <hr class="mt-2 mb-5">
            <div class="row text-center text-lg-left">

                        <?php while ($post_row = mysqli_fetch_array($post_result)) { ?> 
                    <div class="col-lg-4 col-md-4 col-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <?php
                            if ($post_row['image_path'] != null) {
                                echo "<img src=\"..\backend\image\postsImage/" . $post_row['image_path'] . "\"alt=\"Image\" class=\"img-fluid img-thumbnail\" name=\"output\" data-toggle=\"modal\" data-target=\"#lightbox\">";
                            }
                            ?>    
                        </a>
                    </div>

        <?php } ?>
            </div>

        </div>
        <!-- /.container -->


        <?php
    }

    public function display_own_image() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $user_query = "SELECT * from users where user_id='" . $user_id . "'";
        $user_result = $conn->query($user_query);
        $user_row = mysqli_fetch_array($user_result);
        $post_query = "SELECT image_path from posts where user_id='" . $user_id . "'";
        $post_result = $conn->query($post_query);
        $row_cnt = $post_result->num_rows;
        ?> 
        <!-- Page Content -->
        <div class="row">
            <div class="col-md-12" >
                <div class="card" id="bio">
                    <div class="card-body">
                        <p style="font-size: 18px;"><i class="far fa-image" style="color: blue;"></i>  Shared Photos</p><hr style="border-color:lightgrey;">   
                        <div class="row text-center text-lg-left ">
                            <?php
                            if ($row_cnt <= 6) {
                                while ($post_row = mysqli_fetch_array($post_result)) {
                                    ?>

                                    <div class="col-lg-6 col-md-2">
                                        <a href="#" class="d-block mb-4 h-100">
                                            <?php
                                            if ($post_row['image_path'] != null) {
                                                echo"<img src=\"..\backend\image\postsImage/" . $post_row['image_path'] . "\"
                                alt=\"Image\" class=\"img-fluid img-thumbnail\" width=\"100%\" name=\"output\">";
                                            }
                                            ?>    

                                        </a>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<p style=\"padding:5px;margin-left:15px;\">You have been $row_cnt      shared  Photos</p>\n         
                                <a href='index.php?p=photos'style=\"padding:5px;margin-left:17px;text-decoration:none;color:darkblue;\">View All Image</a>";
                            }
                            ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <!-- /.container -->
        <?php
    }

    public function delete_post() {
        $connect = new connect();
        $conn = $connect->getConn();
        $post_id = $_GET['post_id']; //read the value from the URL
        $delQuery = "delete from posts where post_id=$post_id";
        $result = $conn->query($delQuery);
        if ($result) {

            $header = new header_process();
            $header->header("index.php?p=userHome");
        }
    }

    public function display_availableCV() {
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id=$_SESSION['user_id'];
        $new_query = "
                SELECT * FROM `alumni_users` NATURAL JOIN users
                NATURAL join studies NATURAL JOIN degree  WHERE user_role_id='2'
                ";
        $result = $conn->query($new_query);
        if ($result->num_rows > 0) {
            ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Alumni CV </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Major</th>
                                        <th>Credits Number</th>
                                        <th>View/Download</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Major</th>
                                        <th>Credits Number</th>
                                        <th>View/Download</th>
                                    </tr>
                                </tfoot>
                                <tbody><?php while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['cv_file']!='null'){?>
                                        <tr>
                                            <td><?php echo $row["alumni_id"]; ?></td>
                                            <td><?php echo ucwords($row["fname"]) . " " . ucwords($row["lname"]) ?></td>
                                            <td><?php echo $row["degree_title"]; ?></td>
                                            <td><?php echo $row["credits_number"]; ?></td>

                                            <td class="text-center">
                                                <a href="view.php?filename=<?php echo $row["cv_file"]; ?>" class="btn btn-default btn-lg" target="_blank">
                                                    <i class="fas fa-eye"></i></a>
                                            </td>

                                </tr><?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <?php
        }
    }

    public function display_notification_count() {
        $count = 0;
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $comment_count = " SELECT * FROM comments c WHERE c.user_id!='$user_id' AND"
                . " c.type='0' ";
        $comment_result = $conn->query($comment_count);
        if ($comment_result->num_rows > 0) {
            while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                $count++;
            }
            echo $count;
        } else {
            echo "0";
        }
    }

    public function display_message_count() {
        $count = 0;
        $connect = new connect();
        $conn = $connect->getConn();
        $user_id = $_SESSION['user_id'];
        $msg_count = " SELECT * FROM messages m WHERE m.receiver_id='$user_id' AND"
                . " m.type='new' ";
        $msg_count_result = $conn->query($msg_count);
        if ($msg_count_result->num_rows > 0) {
            while ($msg_count_row = mysqli_fetch_assoc($msg_count_result)) {
                $count++;
            }
            echo $count;
        } else {
            echo "0";
        }
    }

}
