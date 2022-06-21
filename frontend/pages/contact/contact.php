<?php  
	class contact_us{
	
	public function display_contact_us($page){
	
	?>
		<section class="contact_area section_gap">
            <div class="container">
               
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact_info">
                            <div class="info_item">
                              <i class="fas fa-mobile-alt"></i>
                                <h6><a href="#">Darren Kirakossian</a></h6>
                                <h6><a href="#">00961 76 18 86 45</a></h6>
                                <p>Mon to Fri 9am to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="fas fa-headphones"></i>
                                <h6><a href="#">Ubaida Dib</a></h6>

                                <h6><a href="#">00961 76 57 47 80</a></h6>
                                <p>Mon to Fri 9am to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="fas fa-envelope" disabled></i>
                                <h6><a href="#">alumni-association@gmail.com</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form
                            class="row contact_form"
                            action="#"
                            method="post"
                            id="contactForm"
                            novalidate="novalidate"
                            >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        placeholder="Enter your name"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter your name'"
                                        required=""
										style="border: 2px solid #ddd;"
                                        />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                        placeholder="Enter email address"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'"
                                        required=""
										style="border: 2px solid #ddd;"
                                        />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="subject"
                                        name="subject"
                                        placeholder="Enter Subject"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter Subject'"
                                        required=""
										style="border: 2px solid #ddd;"
                                        />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea
									class="form-control"
									name="message"
									id="message"
									rows="1"
									placeholder="Enter Message"
									onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Enter Message'"
									required="" 
									style="border: 2px solid #ddd;"
									></textarea>
								</div>
                            </div>
							<input type="hidden" id="sender_id" name="sender_id" value="<?php echo $_SESSION['user_id'];?>">
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn btn-primary" name="send_smg">
                                    Send Message
                                </button>
                            </div>
                        </form> <?php
                        $send_msg= filter_input(INPUT_POST, "send_smg");
                        if(isset($send_msg)){
                        $msg=new contact_us();
                        $msg->send_msg();
                    }?>
						<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42851.04214386394!2d35.811355742442885!3d34.42776775723449!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1521f6ab9db89d33%3A0x323c52527dde8578!2sTripoli%2C+Lebanon!5e1!3m2!1sen!2sus!4v1556422350986!5m2!1sen!2sus"width="100%" height="175" frameborder="0" style="border:0" allowfullscreen></iframe>
						
				</div>
                    </div>
                </div>
            </div>
        </section>
	
	
	<?php
	
	}
	
	public function send_msg(){
			 $connect=new connect();
             $conn=$connect->getConn();
			 $sender_id= filter_input(INPUT_POST, 'sender_id');
             $sender_name= filter_input(INPUT_POST, 'name');
             $sender_email= filter_input(INPUT_POST, 'email');
			 $msg_subject= filter_input(INPUT_POST, 'subject');
			 $msg_content= filter_input(INPUT_POST, 'message');
			  date_default_timezone_set("Asia/Beirut");
		      $msg_date=date("Y:m:j H:i:s", time());
			  $msg_query="INSERT INTO `messages`(`message_id`, `sender_id`, `receiver_id`, `content`, `status`, `type`, `date`)
			  VALUES (NULL,'".$sender_id."','1','".$msg_content."','1','new','". $msg_date."')";
			   $msg_result = $conn->query($msg_query);
			   if($msg_result){
				   echo "<script>
                   Swal.fire('Good job!','Message Sent !','success')</script>";
			   }
			   else{ echo "<script>
               Swal.fire({ type: 'error',title: 'Oops...',text: 'Something went wrong,try again!'})</script>";}
            
	}
	
	}

?>