<?php
  include('header.php');
  include('dbconnection.php');
  ?>
  <?php
  if(isset($_POST['edit'])){
  	$query="SELECT * FROM `designation` WHERE `designation_id`={$_POST['dEditID']} ";
  	$result=mysqli_query($con, $query);
  	$row=mysqli_fetch_assoc($result);
  }
  ?>
	<div class="containe m-5">
		<div class="row ml=5">
			<div class="col-md-4">
				<form action="" method="post" class="form shadow-lg p-3">
					Designation ID
					<input type="text" name="id" class="form-control my-3" value="<?php
						if(isset($row['designation_id'])){echo $row['designation_id'];}?>" readonly>
					Designation Name
					<input type="text" class="form-control mt-2" name="dName" value="<?php
						if(isset($row['designation_name'])){echo $row['designation_name'];}?>">
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
	  		$q="UPDATE `designation` SET `designation_name`='$dName' WHERE designation_id='$id'";
	  		if(mysqli_query($con, $q)){
	  			$msg="Data Has Been Updated";
	  		}
	}?>
<?php include('footer.php'); ?>
