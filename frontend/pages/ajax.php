<?php 
include '../config/connection.php';

$getConn=new connect();
$getConn=$getConn->getConn();

if(isset($_POST['action'])){
	$action = $_POST['action'];
}else{
	$action = 'noaction';
}

switch ($action) {
	case 'toggleLike':
		if(isset($_GET['status'])){
			$status = $_GET['status'];
		}else{
			$status = -1;
		}
		if(isset($_POST['post_id'])){
			$post_id = $_POST['post_id'];
		}else{
			$post_id = -1;
		}
		if(isset($_POST['user_id'])){
			$user_id = $_POST['user_id'];
		}else{
			$user_id = -1;
		}
		$ajax = new ajax();
		$ajax->toggleLike($getConn,$user_id,$post_id,$status);
		break;
	
	default:
		# code...
		break;
}
/**
 * 
 */
class ajax{
	
	function toggleLike($getConn,$user_id,$post_id,$status){
		$check_user_like_post = 'select * from likes where user_id = "'.$user_id.'" and post_id = "'.$post_id.'"';
		$result_check_user = $getConn->query($check_user_like_post);
		// echo $check_user_like_post;
		// die();
		if($result_check_user->num_rows > 0){
			if($status == 1){
				$update_query = 'update likes set status="0" where user_id="'.$user_id.'" and post_id="'.$post_id.'"';
				$update_result = $getConn->query($update_query);
				if($update_result){
					$response = 0;
				}else{
					echo ('error');
				}
			}else if($status == 0){
				$update_query = 'update likes set status="1" where user_id="'.$user_id.'" and post_id="'.$post_id.'"';
				$update_result =  $getConn->query($update_query);
				if($update_result){
					$response = 1;
				}else{
					echo ('error');
				}
			}
			$query_status = 'updat';
			
		}else{
			$insert_query = "insert into likes (user_id,post_id,status) values ('$user_id','$post_id',1) ";
			$insert_result = 	$getConn->query($insert_query);
			if($insert_result){
				$response = 1;
				$query_status = 'insert';
			}else{
				trigger_error('Invalid query: ' . $getConn->error);
			}
		}
		$r = ['response' => $response,'data'=>$query_status];
		$r = [$r];
		echo ($response);
	}
}