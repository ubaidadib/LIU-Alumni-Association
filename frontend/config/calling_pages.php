<?php
    
if (isset($_GET["p"])){
  $page=$_GET["p"];  

}
else{
    $page="home";
}
// echo $page;
class switch_pages  {

public function pages($page){
    
switch ($page){
    
    case "home":
        $home=new home();
        $home->display_home($page);
        break;
  
	case "userHome":
        $home=new userHome();
        $home->display_user_home($page);
        break;
    case "companies":
        $company=new userHome();
        $company->display_companies($page);
        break;
    case "success_stories":
        $story=new userHome();
        $story->display_success_stories();
        break;      
    case "photos":
        $photos=new userHome();
        $photos->display_photos($page);
        break;    
    case "alumni":
        $alumni=new userHome();
        $alumni->display_alumni($page);
        break;
        
    case "availableCV":
        $cv=new userHome();
        $cv->display_availableCV($page);
        break;
	case "alumniHome":
        $home=new alumni();
        $home->display_alumni_home($page);
        break;
     case "directMessage":
        $chatbox=new userHome();
        $chatbox->display_direct_chatbox($page);
        break;
    case "postcomment":
        $cmtPost=new userHome();
        $cmtPost->display_comment_posts($page);
        break;
     case "messages":
        $chatbox=new userHome();
        $chatbox->message($page);
        break;        
		
	case "admin":
        $home=new admin();
        $home->display_admin_home($page);
        break;
		
    case "about_us":
        $about_us=new about_us();
        $about_us->display_about_us($page);
        break;
   
    
     
    
        
     case "contact_us":
        $contact_us=new contact_us();
        $contact_us->display_contact_us($page);
        break;
    
  
    
    case "login":
        $users=new users();
        $users->display_login($page);
        break;
		
     case "register":
        $users=new users();
        $users->display_register($page);
        break; 
		
    case "account":
        $users=new users();
        $users->display_account($page);
        break;

    case "profile":
        $users=new userHome();
        $users->display_profile($page);
        break;    
         
    case "setting":
        $users=new users();
        $users->display_account($page);
        break;    
    
    case "logout":
        $users=new users();
        $users->logout();
        break;
	 case "post_edit":
         $post= new userHome();
         $post->display_edit_post();
        break;
     case "post_del":
         $post=new userHome();
         $post->delete_post();
        break;	

    default :
        $notfound=new notfound();
        $notfound->notfound404($page);
        break;
}
}
}
