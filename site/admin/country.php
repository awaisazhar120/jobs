   
  <?php
  $title="Country";
 include('header.php');
  include('dbconnection.php');
    if(isset($regmsg)){
      echo $regmsg;
    }
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
        <h4 class="modal-title">Add New Country</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" class="col-md-12 form shadow-lg p-5">
            <div class="form-group">
            <label for="cName">Name</label>
            <input type="text" class="form-control" placeholder="Enter country" name="cName">
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
          $dname=$_POST['cName'];
          $sql="insert into country(country_name) values('$dname')";
          $run=mysqli_query($con, $sql);
          if($run){
           echo "<script>location.href='country.php';</script>";
          }
          else{
           echo 'Query Falied';
          }
      }
  ?>

      <div class="container mt-3">
        <input type="text" name="" id="myInput" placeholder="Search Designation" class="form-control" onkeyup="searchFun()">
        <div class="row">
          <div class="col-12"> 
           <table class="table table-striped table-hover" id="myTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
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
                $que="select *from country order by country_id desc limit {$offset}, {$limit}";
                $run1=mysqli_query($con, $que);
                while($row=mysqli_fetch_assoc($run1)){
                ?>
              <tr>
                <td><?php echo $row['country_id']; ?></td>
                <td><?php echo $row['country_name']; ?></td>
                <td>
                  <form action="editCountry.php" method="post">
                   <input type="hidden" name="dEditID" value="<?php echo $row['country_id'];?>">
                    <button type="submit" name="edit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                  </form>
                </td>
              </tr><?php } ?>
            </tbody>
         </table>
         <div style="display: flex; justify-content: center; align-items: center;">
          <?php
              echo '<ul class="pagination">';
              $q="select *from `country`";
              $r=mysqli_query($con, $q);
              if(mysqli_num_rows($r)>0){
                $totalRecord=mysqli_num_rows($r);
                $totalPages=ceil($totalRecord/$limit);
                for($i=1; $i<=$totalPages; $i++){
                  echo '<li class="page-item"><a class="page-link" href="country.php?page='.$i.'">'.$i.'</a></li>';
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

</body>

</html>
