   
  <?php
$title='City';
include('dbconnection.php');
session_start();
if(isset($_SESSION['is_aLogin'])){
    if(time()- $_SESSION['time']>30){
        session_unset();
        session_destroy();
        echo "<script>location.href='aLogin.php'</script>";
    }else{
    $email=$_SESSION['aEmail'];}
}
else{
    echo "<script>location.href='aLogin.php'</script>";
}

include('header.php');
?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-auto ml-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Add New
          </button>
        </div>
       </div>

<!-- The Modal -->
<div class="modal fade" id="myModal" >
  <div class="modal-dialog" >
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New City</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" class="col-md-12 form shadow-lg p-5">
             <div class="form-group">
              <label for="sCountry">Select Country</label>
              <?php
                  $query="SELECT * FROM `country`";
                  $run=mysqli_query($con, $query);

                  echo '<select class="form-control selectTwo" style="width: 100% !important;" name="sCountry" onchange="myfun(this.value)">';
                  echo '<option selected>Select Country</option>';
                  while($row=mysqli_fetch_assoc($run)){
                    echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
                  }
                  echo '</select>';
                ?>
            </div>
            <div class="form-group"><!--Start Province-->
                <label for="sProvince">Select Province</label>
                <select class="form-control selectTwo" name="sProvince" id="dataget" style="width: 100% !important;">
                  <option>Select Province</option>
                </select>
            </div>
            <div class="form-group">
              <label for="cityName">City Name</label>
              <input type="text" class="form-control" placeholder="Enter city" name="cityName">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
  <?php
      if(isset($_POST['submit'])){
          $sCountry=$_POST['sCountry'];
          $sProvince=$_POST['sProvince'];
          $cityName=$_POST['cityName'];
          $sql="insert into city(city_name , country_name_id, province_name_id) values('$cityName', '$sCountry', '$sProvince')";
          $run=mysqli_query($con, $sql);
          if($run){
           echo "<script>location.href='city.php';</script>";
          }
          else{
           echo 'Query Falied';
          }
      }
  ?>

      <div class="container mt-3">
        <input type="text" name="" id="myInput" placeholder="Search city" class="form-control" onkeyup="searchFun()">
        <div class="row">
          <div class="col-12"> 
           <table class="table table-striped table-hover" id="myTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>City Name</th>
                <th>Province</th>
                <td>Country</td>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $limit=5;
                if(isset($_GET['page'])){
                $page=$_GET['page'];
              }else{
                $page=1;
              }
                $offset=($page-1)*$limit;
                $que="SELECT city.city_id, city.city_name, city.country_name_id, city.province_name_id, country.country_name, province.province_id, province.province_name
                FROM `city`
                LEFT JOIN `country`
                ON city.country_name_id = country.country_id 
                LEFT JOIN `province`
                ON city.province_name_id=province.province_id
                order by city_id desc limit {$offset}, {$limit}";
                $run1=mysqli_query($con, $que);
                while($row=mysqli_fetch_assoc($run1)){
                ?>
              <tr>
                <td><?php echo $row['city_id']; ?></td>
                <td><?php echo $row['city_name']; ?></td>
                <td><?php echo $row['province_name']?></td>
                <td><?php echo $row['country_name']; ?></td>
                <td>
                  <form action="editcity.php" method="post">
                   <input type="hidden" name="dEditID" value="<?php echo $row['city_id'];?>">
                    <button type="submit" name="edit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                  </form>
                </td>
              </tr><?php } ?>
            </tbody>
         </table>
         <div style="display: flex; justify-content: center; align-items: center;">
          <?php
              echo '<ul class="pagination">';
              $q="select *from `city`";
              $r=mysqli_query($con, $q);
              if(mysqli_num_rows($r)>0){
                $totalRecord=mysqli_num_rows($r);
                $totalPages=ceil($totalRecord/$limit);
                for($i=1; $i<=$totalPages; $i++){
                  echo '<li class="page-item"><a class="page-link" href="city.php?page='.$i.'">'.$i.'</a></li>';
              }
              echo '</ul>';
                }
          ?>
         </div><!--Pagination div-->
        </div>
        </div>
      </div>
    </div><!--End Container-->
      </div>
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

    const searchFun=()=>{
      let filter=document.getElementById('myInput').value.toUpperCase();
      let myTable=document.getElementById('myTable');
      let tr=myTable.getElementsByTagName('tr');

      for(var i=0; i<tr.length; i++){
        let td=tr[i].getElementsByTagName('td')[1];
        if(td){
          let textValue=td.textContent || td.innerHTML;
          if(textValue.toUpperCase().indexOf(filter)>-1){
            tr[i].style.display="";
          }
          else{
            tr[i].style.display="none";
          }
        }
      }
    }
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

</body>

</html>
