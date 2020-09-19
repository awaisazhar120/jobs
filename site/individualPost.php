<?php include('uHeader.php'); ?>



<?php
  include('dbconnection.php');
  $query="SELECT post.post_id, post.post_title, post.post_pdescription, post.post_designation, post.post_organization, post.post_experience, post.post_education, post.post_vacancies, post.post_country, post.post_province, post.post_vendor, post.post_file,  post.post_city, post.post_adate, post.post_cdate, country.country_id, country.country_name, province.province_id, province.province_name, city.city_id, city.city_name FROM `post`
  LEFT JOIN `city`
  ON post.post_city=city.city_id
  LEFT JOIN `country`
  ON post.post_country=country.country_id
  LEFT JOIN `province`
  ON post.post_province=province.province_id
  WHERE post.post_id='{$_GET["id"]}'";
  $run=mysqli_query($con,$query);
  $row=mysqli_fetch_assoc($run);

?>
<div class="container mt-5">
	<h1 class="font-weight-normal"><?php echo $row['post_title'];?></h1>
	<table class="table" style="background-color: #fff;">
    <tbody>
      <tr>
        <td class="font-weight-bold h5">Position Name</td>
        <td class="h5 font-weight-normal">
			<ul class="w3-ul w3-small">
				<?php
				$a= $row['post_designation'];
				$array=explode(",", $a);
				foreach($array as $a){
					echo '<li>';
					echo '<h5 class="font-weight-light">'.$a.'</h5>';
					echo '</li>';
					
				}
				?>
			</ul>
        	
        </td>
      </tr>
      <tr>
        <td class="font-weight-bold h5">Organization Name</td>
        <td><?php echo $row['post_organization']; ?></td>
      </tr>
      <tr>
        <td class="font-weight-bold h5">Qualification</td>
        <td><?php echo $row['post_education']; ?></td>
      </tr>
      <tr>
        <td class="font-weight-bold h5">Required Experience</td>
        <td><?php echo $row['post_experience']; ?></td>
      </tr>
      <tr>
        <td class="font-weight-bold h5">Location</td>
        <td><?php echo $row['country_name']." ". $row['province_name']." ".$row['city_name']; ?></td>
      </tr>
      <tr>
        <td class="font-weight-bold h5">Last Date</td>
        <td><?php echo $row['post_cdate']; ?></td>
      </tr>
    </tbody>
  </table>
  <div class="container-fluid">
  	<h5 style="line-height: 1.6" class="font-weight-normal">
  		<?php  echo $row['post_pdescription'];?>
  	</h5>
  </div>
  <div class="text-center" style="margin-top: 60px;">
  	<h2 class="mb-5">Job Advertisement</h2>
  	<?php
  		$img=$row['post_file'];
  		echo "<img src='admin/images/$img'>";
  	?>
  </div>
</div>

<!--------------------------Footer Starts From Here------------------------->
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
      <script src="frontBoot/js/jquery.js"></script>
    <script src="frontBoot/js/bootstrap.min.js"></script>
</body>
</html>
