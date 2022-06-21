<?php
  class home{

  public function display_home($page){
  $connect=new connect();
  $conn=$connect->getConn();   
?>
	    
	<!--================ Start Service Area =================-->
        <section class="causes_area">
            <div class="container">
                <div class="main_title">
                    <h2>Our major services</h2>
                    <p>Alumni association in the Lebanese International University seeks to provide help and assistance to students graduates in many fields </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_causes">
                            <h4>Alumni Community</h4>
                            <img src="images/alumnicomm.png" alt="">
                            <p>
                                You can communicate with your fellow alumni and ask them all the questions that come to mind.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_causes">
                            <h4>Finest locations</h4><br>
                            <img src="images/location1.jpg" alt=""><br><br>
                            <p>
                                Dear graduate student, From now on you can find employment places available in the North region accurately<br>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_causes">
                            <h4>Specialized companies</h4><br>
                            <img src="images/company.png" alt=""><br><br>
                            <p>
                                You can search and take a look for the company that is specialized in the major that you are 
                                interested in. 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End Services Area =================-->
   
        <!--================ Start About Us Area =================-->
        <section class="about_area section_gap_bottom">
            <div class="container"> 	
                <div class="row">	
                    <div class="single_about row">
                        <div class="col-lg-6 col-md-12 text-center about_left">
                            <div class="about_thumb">
                                <img src="images/" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 about_right">
                            <div class="about_content">
                                <h2>
                                    We are graduate students<br>
                                    We work to serve our colleagues
                                </h2>
                                <p>
                                    Their multiply doesn't behold shall appear living heaven second 
                                    roo lights. Itself hath thing for won't herb forth gathered good 
                                    bear fowl kind give fly form winged for reason
                                </p>
                                <p>
                                    Land their given the seasons herb lights fowl beast whales it 
                                    after multiply fifth under to it waters waters created heaven 
                                    very fill agenc to. Dry creepeth subdue them kind night behold 
                                    rule stars him grass waters our without 
                                </p>
								<br>
                                <a href="#" class="btn btn-primary">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ End About Us Area =================-->
		<!--================ٍSupporter Area =================-->
        <section class="team_area section_gap">
            <div class="container">
                <div class="main_title">
                    <h2>Meet our supporters</h2>
                    <p>They said : Instead of cursing the darkness lit candle </p>
                </div>
                <div class="row team_inner">
                    <div class="col-lg-4 col-md-6">
                        <div class="team_item" id="1">
                            <div class="team_img">
                                <img class="img-fluid" src="images/user.png" alt="">
                            </div>
                            <div class="team_name">
                                <h4>Zaher Merhi</h4>
                                <p>Associate Professor, CCE Department at  <br> Lebanese International University</p>
                                <p class="mt-20">
                                    There is no greater challenge than improving and developing yourself.
                                </p>
                               <div style="margin-top:25px;">           
								<a class="" href="#1"><i class="fab fa-facebook fa-2x"></i></a>
                                &nbsp;&nbsp;
								<a class="" href="#1"><i class="fab fa-twitter fa-2x"></i></a>
                                &nbsp;&nbsp;
								<a class="" href="#1"><i class="fab fa-instagram fa-2x"></i></a>
                                &nbsp;&nbsp;
								<a class="" href="#1"><i class="fas fa-envelope fa-2x"></i></a>
								</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="team_item" id="2">
                            <div class="team_img">
                                <img class="img-fluid" src="images/user.png" alt="">
                            </div>
                            <div class="team_name">
                                <h4>Oussama Tahan</h4>
                                <p>Assistant Professor, CCE Department  at <br> Lebanese International Universityr</p>
                                <p class="mt-20">
                                    Success is not an achievement as much as an ongoing ability to accomplish.
                                </p>
                               <div style="margin-top:25px;">           
                                <a class="" href="#2"><i class="fab fa-facebook fa-2x"></i></a>
                                &nbsp;&nbsp;
                                <a class="" href="#2"><i class="fab fa-twitter fa-2x"></i></a>
                                &nbsp;&nbsp;
                                <a class="" href="#2"><i class="fab fa-instagram fa-2x"></i></a>
                                &nbsp;&nbsp;
                                <a class="" href="#2"><i class="fas fa-envelope fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="team_item" id="3">
                            <div class="team_img">
                                <img class="img-fluid" src="images/user.png" alt="">
                            </div>
                            <div class="team_name">
                                <h4>Milad Ghantous</h4>
                                <p>Assistant Professor, CCE Department  at <br> Lebanese International Universityr</p>
                                <p class="mt-20">
                                    Always remember what you accomplished it and stick with it.
                                </p>
								<div style="margin-top:25px;">           
                                <a class="" href="#3"><i class="fab fa-facebook fa-2x"></i></a>
                                &nbsp;&nbsp;
                                <a class="" href="#3"><i class="fab fa-twitter fa-2x"></i></a>
                                &nbsp;&nbsp;
                                <a class="" href="#3"><i class="fab fa-instagram fa-2x"></i></a>
                                &nbsp;&nbsp;
                                <a class="" href="#3"><i class="fas fa-envelope fa-2x"></i></a>
                                </div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Team Area =================-->

        <!--================ Start LeaderShips Area =================-->
      
        <!--================ End LeaderShips Area =================-->

        
<br><br>

			
           
			
                
        

        



<?php }
}


?>
