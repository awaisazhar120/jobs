<?php 
  include('dbconnection.php');
 ?>

  <?php 
  	$nameid=$_POST['datapost'];
  	$qu="SELECT * FROM `province` WHERE `c_name_id`= '$nameid'";
  	$ru=mysqli_query($con, $qu);
  	while($ro=mysqli_fetch_assoc($ru)){
  		echo '<option value="'.$ro['province_id'].'">'.$ro['province_name'].'</option>';
  	}

 ?>

