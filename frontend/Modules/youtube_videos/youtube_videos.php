<?php
  class youtube_videos_Module{
 
  function Draw(){
		$querie="select Title,content from pages where ID=1";
	    $Resultat=mysql_query($querie);
		  $resu=mysql_fetch_array($Resultat);

 ?>
	   <div>
	   <h1>فيديو</h1>
	   </div>
	   <div>
	   <table>
	   <tr>
	   	         <?php  
		 $query="select Id,Title,description,link,hits,date from   youtube_videos where Status=1 and language_id=2    Order By Id desc limit 6 ";
         $resultat=mysql_query($query);
         $i=1;
         while($resu=mysql_fetch_array($resultat)){
                        list ($Id,$Title,$description,$link,$hits,$date)=$resu;
						?>
	   <td>
	   <div><?php echo $Title; ?></div>
	   <br>
	   <object width="213" height="190"
data="<?php echo $link; ?>">
</object> 

<div><br><?php echo $description;  ?></div>
<?php 
        if($i==4){
		echo "</tr></tr>";
		$i=1;
		} 
		$i=$i+1;
}
?>
	   </tr>
	   </table>
	   </div>
	   <p style="font-size:15px;">
	 
	   </p>
	   <?php
  }
  
  
  }


?>