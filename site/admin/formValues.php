<?php
include('dbconnection.php');
	if(isset($_POST['submit'])){
		$title=$_POST['title'];
		$pdescription=$_POST['pdescription'];
		$organization=$_POST['organization'];
		$experience=$_POST['experience'];
		$education=$_POST['education'];
		$gender=$_POST['gender'];
		$vacancies=$_POST['vacancies'];
		$country=$_POST['country'];
		$province=$_POST['province'];
		$city=$_POST['city'];
		$aDate=$_POST['aDate'];
		$cDate=$_POST['cDate'];
		$testVendor=$_POST['testVendor'];

		$fileName=$_FILES['image']['name'];
		$tmp_name=$_FILES['image']['tmp_name'];

		$folder="images/".$fileName;
		move_uploaded_file($tmp_name, $folder);

		//Multiple Designation values Storing in database
		foreach ($_POST['designation'] as $value) {
            $designation.= $value.", ";
        }

		$query="INSERT INTO `post`(`post_title`, `post_pdescription`, `post_designation`, `post_organization`, `post_experience`, `post_education`, `post_gender`, `post_vacancies`, `post_country`, `post_province`, `post_city`, `post_adate`, `post_cdate`, `post_vendor`, `post_file`) VALUES('$title','$pdescription','$designation','$organization','$experience','$education','$gender','$vacancies','$country','$province','$city','$aDate','$cDate','$testVendor','$fileName')";
		$run=mysqli_query($con, $query);
		if($run){
			header("Location: addNewPost.php");
		}
	}
?>