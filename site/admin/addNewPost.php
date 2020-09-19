<?php include('header.php'); 
include('dbconnection.php')?>

<div class="container mt-5">
	<form class="form shadow-lg p-3" action="formValues.php" method="post" enctype="multipart/form-data" >

                            <!----Filed One for Job Title----->

		<div class="form-group">
			<label for="title" class="font-weight-bold text-uppercase">Job Title</label> 
			<input type="text" name="title" class="form-control">
		</div>


                            <!----Second One for Job Description----->

		<div class="form-group">
			<label for="pdescription" class="font-weight-bold text-uppercase">Job Description</label>
			<textarea type="text" name="pdescription" class="form-control"></textarea> 
		</div><hr>
    <div class="container text-center my-5">
          <h1>Job Specification</h1>
        </div>
		<div class="form-row">

                            <!----Third One for Job Designation----->


            <div class="col-md-4 form-group">
                <label for="designation" class="font-weight-bold text-uppercase">Designation</label>
                <?php
                	$query="SELECT * FROM `designation`";
                	$run=mysqli_query($con, $query);

                	echo '<select class="form-control selectTwo" data-width="100%" name="designation[]" multiple="multiple">';
                  echo '<option selected>Select Designation</option>';
                	while($row=mysqli_fetch_assoc($run)){
                		echo '<option value="'.$row['designation_name'].'">'.$row['designation_name'].'</option>';
                	}
                	echo '</select>';
                ?>
            </div>


                            <!----Fourth One for Job Organization----->

            <div class="col-md-4 form-group">
                <label for="Organization" class="font-weight-bold text-uppercase">Organization</label>
                <?php
                  $query="SELECT * FROM `Organization`";
                  $run=mysqli_query($con, $query);

                  echo '<select class="form-control selectTwo" name="organization">';
                  echo '<option selected>Select Organization</option>';
                  while($row=mysqli_fetch_assoc($run)){
                    echo '<option value="'.$row['organization_name'].'">'.$row['organization_name'].'</option>';
                  }
                  echo '</select>';
                ?>
            </div>
            <div class="col-md-4 form-group"><!--Start Vanancies-->


                            <!----Fifth One for Job Experience----->

                <label for="experience" class="font-weight-bold text-uppercase">Experience</label>
                <input type="number" name="experience" id="vacancies" class="form-control">
            </div><!--End Vanancies-->
        </div>
    <div class="form-row"><!--Second Form Row From Education to -->


                            <!----Second One for  Education----->

            <div class="col-md-4 form-group">
                <label for="education" class="font-weight-bold text-uppercase">Education</label>
                <select class="form-control selectTwo" name="education">
                  <option value="" selected>Select Education</option>
                  <option value="primary">Primary</option>
                  <option value="middle">Middle</option>
                  <option value="secondary">Secondary</option>
                  <option value="intermediate">Intermediate</option>
                  <option value="graduate">Graduate</option>
                  <option value="postgraduate">Post Graduate</option>
                </select>
            </div>
            <div class="col-md-4 form-group"><!--Start Gender-->


                            <!----Second One for Gender----->

                <label for="gender" class="font-weight-bold text-uppercase">Gender</label>
                <select class="form-control selectTwo" name="gender">
                  <option value="" selected>Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="both">Both</option>
                </select>
            </div><!--End Gender-->


                            <!----Second One for Gender----->

            <div class="col-md-4 form-group">
                <label for="vacancies" class="font-weight-bold text-uppercase">Vacancies</label>
                <input type="number" name="vacancies" id="vacancies" class="form-control">
            </div>
        </div><!--Till Vanancies End Second Row--><hr>
        <div class="container text-center my-5">
          <h1>Add Location</h1>
        </div>
         <div class="form-row"><!--Third Row -->


                            <!----Second One for Country----->

             <div class=" col-md-4 form-group">
              <label for="country" class=" font-weight-bold text-uppercase">Select Country</label>
              <?php
                  $query="SELECT * FROM `country`";
                  $run=mysqli_query($con, $query);

                  echo '<select class="form-control selectTwo" style="width: 100% !important;" name="country"  onchange="myfun(this.value)">';
                  echo '<option>Select Country</option>';
                  while($row=mysqli_fetch_assoc($run)){
                     echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
                  }
                  echo '</select>';
                ?>
            </div>
            <div class="col-md-4 form-group"><!--Start Province-->
                <label for="province" class="font-weight-bold text-uppercase">Province</label>
                <select class="form-control selectTwo" name="province" id="dataget" onchange="setCity(this.value)">
                  <option>Select Province</option>
                </select>
            </div><!--End Provincer-->
            <div class="col-md-4 form-group">
                <label for="city" class="font-weight-bold text-uppercase">City</label>
                <select class="form-control selectTwo" name="city" id="cityget">
                  <option>Select Province</option>
                </select>
            </div>
        </div><hr>
        <div class="form-row"><!--Fourth Row -->


                            <!----Second One for Opening Date----->

             <div class=" col-md-4 form-group">
              <label for="aDate" class=" font-weight-bold text-uppercase">Posting date</label>
              <input type="date" name="aDate" class="form-control">
            </div>


                            <!----Second One for Closing Date----->

            <div class=" col-md-4 form-group">
              <label for="cDate" class=" font-weight-bold text-uppercase">closing date</label>
              <input type="date" name="cDate" class="form-control">
            </div><!--End date-->


                            <!----Second One for Test Vendor----->

            <div class="col-md-4 form-group">
                <label for="testVendor" class="font-weight-bold text-uppercase">test vendor</label>
                <?php
                  $query="SELECT * FROM `vendor`";
                  $run=mysqli_query($con, $query);

                  echo '<select class="form-control selectTwo" name="testVendor">';
                  echo '<option selected>Select Vendor</option>';
                  while($row=mysqli_fetch_assoc($run)){
                    echo '<option value="'.$row['vendor_name'].'">'.$row['vendor_name'].'</option>';
                  }
                  echo '</select>';
                ?>
            </div>
        </div><hr>
        <div class="form-row mt-4"><!--Fifth Row for Form Attachement-->


                            <!----Second One for Newspaper----->

          <div class="row-md-4 form-group">
            <label for="image" class=" font-weight-bold text-uppercase">Attach File</label>
            <input type="file" name="image" class="form-control">
          </div>
        </div><hr>
        <input type="reset" name="reset" value="Reset" class="btn btn-dark">
        <input type="submit" name="submit" value="Submit" class="btn btn-success ml-3">
        
	</form>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   
   											<!----Code Below is Footer Part-->
	  
 </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  <script>
  	CKEDITOR.replace('pdescription');
  </script>
  <script>

    $(document).ready(function(){
      $('.selectTwo').select2();
    });
  </script>
  <script type="text/javascript">
    function myfun(datavalue){
     $.ajax({
        url: 'getProvince.php',
        method: 'POST',
        data: {datapost : datavalue},
        success: function(result){
          $('#dataget').html(result);
        }
      });
   }
  </script>
  <script type="text/javascript">
    function setCity(value){
     $.ajax({
        url: 'getCity.php',
        method: 'POST',
        data: {postvalue : value},
        success: function(result){
          $('#cityget').html(result);
        }
      });
   }
  </script>
</body>

</html>
