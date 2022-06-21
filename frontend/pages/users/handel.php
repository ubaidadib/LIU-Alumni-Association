<?php
session_start();
include_once("users.php");
include_once("../../config/connection.php");
$action = $_GET["action"];

switch ($action) {
	case'Login_User':
		$username = $_POST['username'];
		$password = $_POST['password'];
		users::Login_User($username,$password);
	break;

	
	case'confirm_registre':
		$Submit=$_POST['Submit'];
		$f_name=$_POST['f_name'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];
		//echo $user_name;
      users::confirm_reg($Submit,$f_name,$address,$email,$password,$confirm_password);
    break;
	
	case'edit_profile':
			$Submit=$_POST['Submit'];
			$user_id=$_POST['user_id'];
			$fname=$_POST['fname'];
			$address=$_POST['address'];
			$password=$_POST['password'];
			$confirm_password=$_POST['confirm_password'];
			//echo $user_name;
		  users::confirm_edit_profile($Submit,$fname,$address,$password,$confirm_password,$user_id);
		break;
		
		case'view_order':
			$order_id=$_POST['order_id'];
                     $user=new users(); 
           $user->see_order_by_id($order_id);
		
		break;
		
		case'view_account':
		  users::see_account();
		break;
		
		case'view_history':
		  users::see_history();
		break;
}
?>