<?php

//fetch_data.php
$conn = new mysqli('localhost', 'root','','senior');


if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM `companies`NATURAL Join `company_spec_relation`NATURAL Join `specialization` WHERE 1
			 ";
	
	if(isset($_POST["name"]))
	{
		$name_filter = implode("','", $_POST["name"]);
		$query .= "
		 AND company_name IN('".$name_filter."')
		";
	}
	if(isset($_POST["address"]))
	{
		$address_filter = implode("','", $_POST["address"]);
		$query .= "
		 AND company_address IN('".$address_filter."')
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
                 <div class="card border border-primary" style="height:350px;"  >
                 <div class="card-body">
                 <h4 class="card-title">'.$row['company_name'].'</h4>
                 <p class="card-text" style="font-size: 15px;"><i class="fas  fa-map-marker-alt"> &nbsp; &nbsp;</i>'.$row['company_address'].'</p>
                 <p class="card-text" style="font-size: 15px;"><i class="fas fa-mobile-alt"> &nbsp; &nbsp;</i>'.$row['company_phonenumber'].'</p>
                 <p class="card-text" style="font-size: 15px;"><i class="fas fa-briefcase"> &nbsp; &nbsp;</i>'.substr($row['spec_name'],0,22)." etc..".'</p>
                 </div>
                 <div class="card-footer">
                 <p class="card-text" style="font-size: 15px;"><i class="fas  fa-user-secret"> &nbsp; &nbsp;</i></p>
                 </div>
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