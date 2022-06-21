<?php
 if (isset($_GET["p"])){
	$page=$_GET["p"];}
  
	elseif(isset($_SESSION["isAdminloggedin"])){
    $page="home";}
	
	
	// echo $page;


 class switch_pages  {

	public function pages($page){
    
	switch ($page){
	
	case "home":
        $home=new admin();
        $home->display_overview($page);
        break;
    
	case "forgot_password":
		$pass= new profile();
		$pass->display_forgot_password();
		break;
		
	 case "profile":
        $sec=new profile();
        $sec->display_account();
        break;

       

    case "add_user":
        $new_user=new admin();
        $new_user->display_add_user();
        break;
	case "add_alumni":
        $new_user=new admin();
        $new_user->display_add_alumni();
        break;
    case "education":
        $new_user=new admin();
        $new_user->display_alumni_education();
        break;
	case "add_admin":
        $new_user=new admin();
        $new_user->display_add_admin();
        break;
	case "add_ceo":
        $new_user=new admin();
        $new_user->display_add_ceo();
        break;
    case "logout":
        $logout=new admin();
        $logout->logout();
        break;
    case "welcome_page":
        $welcome=new welcome_page();
        $welcome->welcome();
        break;
		
    case "edit_user":
        $edit_user=new admin();
        $edit_user->display_edit_user_role();
        break;

	case "appoint_user":
        $appoint_users=new admin();
        $appoint_users->appoint_user();
        break;
	case "dispaly_edit_company":
        $edit_comp=new admin();
        $edit_comp->dispaly_edit_company();
        break;
	
	case "delete":
        $users=new admin();
        $users->delete();
        break;

	case "appoint_admin":
        $set_admin=new admin();
        $set_admin->appoint_admin();
        break;
	case "add_company":
        $company=new admin();
        $company->display_add_company();
        break;

    //lists.php class 
    case "UsersList":
        $users=new lists();
        $users->user_list();
        break;
    case "Users":
        $users=new lists();
        $users->users();
        break;
    case "alumni_table":
        $users=new lists();
        $users->alumni();
        break;
    case "admin_table":
        $users=new lists();
        $users->admin();
        break;
    case "ceo_table":
        $users=new lists();
        $users->ceo();
        break;
    case "company_table":
        $users=new lists();
        $users->companies();
        break;
        
    case "admins":
        $adminlist=new lists();
        $adminlist->admin_list();
        break;    	
	case "companies":
        $company=new lists();
        $company->companies_list();
        break;	
	case "alumni":
        $alumni=new lists();
        $alumni->alumni_list();
        break;
	case "ceo":
        $ceoList=new lists();
        $ceoList->ceo_list();
        break;
	case "degree":
        $degree_list=new lists();
        $degree_list->degree_list($page);
        break;
    
    case "comments":
        $comments_list=new lists();
        $comments_list->display_comment_table($page);
        break;
    // end of lists.php 
        
	case "edit_degree_info":
        $edit_degree=new admin();
        $edit_degree->edit_degree_info($page);
        break;
		
	case "display_add_degree":
        $degree=new admin();
        $degree->display_add_degree($page);
        break;	
			
	case "display_message_table":
        $msg=new messages();
        $msg->viewMessage($page);
        break;
		
	case "reply":
        $msg=new messages();
        $msg->display_send_message($page);
        break;	
	case "security":
        $sec=new profile();
        $sec->display_security($page);
        break; 
    case "show_posts":
        $post=new post();
        $post->display_post_area();
        break;    
	case "add_post":
        $post=new post();
        $post->display_add_post();
        break; 
	case "success_stories":
        $story=new stories();
        $story->display_success_stories();
        break;
    case "str_add":
        $story=new stories();
        $story->display_add_stories();
        break;		
   case "str_edit":
         $story=new stories();
         $story->display_edit_stories();
        break;

    case "post_edit":
         $post=new post();
         $post->display_edit_post();
        break;
   

   
}
}
}