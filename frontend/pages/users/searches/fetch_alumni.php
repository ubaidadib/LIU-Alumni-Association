<?php

//fetch_data.php
$conn = new mysqli('localhost', 'root','','senior');


if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM `alumni_users` NATURAL JOIN users
                NATURAL join studies NATURAL JOIN degree  WHERE user_role_id='2'
			 ";
	
	if(isset($_POST["fname"]))
	{
		$name_filter = implode("','", $_POST["fname"]);
		$query .= "
		 AND fname IN('".$name_filter."')
		";
	}
	if(isset($_POST["lname"]))
	{
		$address_filter = implode("','", $_POST["lname"]);
		$query .= "
		 AND lname IN('".$address_filter."')
		";
	}
	if(isset($_POST["degree_title"]))
	{
		$address_filter = implode("','", $_POST["degree_title"]);
		$query .= "
		 AND degree_title IN('".$address_filter."')
		";
	}
	
	$result =$conn->query($query);
	$total_row = $result->num_rows;
	$output = '';

	
	if($total_row > 0)
	{
		foreach($result as $row)
		{
		
			$output .= '
			   
			     <div class="col-lg-4 col-md-6 mb-4" id="myCards">
                 <div class="card border-warning" style="height:520px;">
                 <div class="card-body">
                 <img class="card-img-top"

                      src= "../backend/image/uploadedProfiles/'.$row['user_profile'].'" alt="Card image" style="height:220px;width:100%;">
                <br><br>
                 <h6 class="card-title">'.ucwords($row["fname"])." " .ucwords($row["lname"]).'</h6>
                 <p class="card-text" style="font-size: 15px;"><i class="fas  fa-graduation-cap"> &nbsp;</i>'.$row["degree_title"].'</p>
                 <p class="card-text" style="font-size: 15px;"><i class="fas  fa-inbox">
                  &nbsp; </i>'.$row["email"].'</p>
                 <p class="card-text" style="font-size: 15px;"><i class="fas  fa-mobile-alt"> &nbsp; &nbsp;</i>'.$row["phone_number"].'</p>
                 <p class="card-text" style="font-size: 15px;"><i class="fas  fa-map-marker-alt"> &nbsp; &nbsp;</i>'.$row["address"].'</p>
                 </div>
                 <div style="padding:15px;">
                 <a onclick="openForm()"  class="btn btn-primary" ondblclick="closeForm()">Contact him/her</a></div>
                 <br>
                 </div>
                 </div>

			
			';

		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>