<?php 
  include('dbconnection.php');
 ?>

  <?php 
  	$nameid=$_POST['postvalue'];
  	$qu="SELECT * FROM `city` WHERE `province_name_id`= '$nameid'";
  	$ru=mysqli_query($con, $qu);
  	while($ro=mysqli_fetch_assoc($ru)){
  		echo '<option value="'.$ro['city_id'].'">'.$ro['city_name'].'</option>';
  	}

 ?>

