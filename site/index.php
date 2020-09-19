<?php include('uHeader.php'); ?>


<?php
  include('dbconnection.php');
  $query="SELECT post.post_id, post.post_title, post.post_city, post.post_adate, post.post_cdate, post.post_designation FROM `post`
  LEFT JOIN `city`
  ON post.post_city=city.city_id
  order by post_id desc";
  $run=mysqli_query($con,$query);
  while($row=mysqli_fetch_assoc($run)){
?>
<div class="container-fluid" data-href="individualPost.php?id=<?php echo $row['post_id'];?>">
	<div class="w3-panel w3-border">
		<div class="row"><!-- Row One-->
		  <div class="col-md-9 col-sm-12" id="jobdetail" style="display: flex; justify-content: space-between; align-items: center;">
			<div>
				<h5><a class="w3-text-red" href="individualPost.php?id=<?php echo $row['post_id'];?>"><?php echo $row['post_title'];?></a></h5>
				-Post On <?php echo $row['post_adate'];?>
			</div>
			<div>
					<p>- Last Date <?php echo $row['post_cdate'];?></p>
			</div>
		  </div>
		  <div class="col-md-3 col-sm-12">
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
		  </div>
		  
		</div>
	</div>
</div>
<?php } ?>


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
