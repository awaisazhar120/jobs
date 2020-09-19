<?php
  include('header.php');
  include('dbconnection.php');
  ?>
  <?php
  if(isset($_POST['edit'])){
  	$query="SELECT * FROM `country` WHERE `country_id`={$_POST['dEditID']} ";
  	$result=mysqli_query($con, $query);
  	$row=mysqli_fetch_assoc($result);
  }
  ?>
	<div class="containe m-5">
		<div class="row ml=5">
			<div class="col-md-4">
				<form action="" method="post" class="form shadow-lg p-3">
					Country ID
					<input type="text" name="id" class="form-control my-3" value="<?php
						if(isset($row['country_id'])){echo $row['country_id'];}?>" readonly>
					Country Name
					<input type="text" class="form-control mt-2" name="dName" value="<?php
						if(isset($row['country_name'])){echo $row['country_name'];}?>">
					<input type="submit" name="editing" value="Update" class="btn btn-info mt-3">
					<?php if(isset($msg)){echo $msg;} ?>
				</form>
			</div>
		</div>
	</div>
	  <?php
	  if(isset($_POST['editing'])){
	  		$dName=$_POST['dName'];
	  		$id=$_POST['id'];
	  		$q="UPDATE `country` SET `country_name`='$dName' WHERE country_id='$id'";
	  		$r=mysqli_query($con, $q);
	  		if($r){
	  			echo '<script location.href="country.php"></script>';
	  		}
	}?>
<?php include('footer.php'); ?>
