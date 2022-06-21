<?php
require('../config/connection.php');
if(isset($_GET['id']))
{
     $sql = "DELETE FROM posts WHERE post_id=".$_GET['id'];
     $mysqli->query($sql);
	 echo 'Deleted successfully.';
}


?>