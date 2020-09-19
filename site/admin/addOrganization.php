   
  <?php
  $title="Add Organization";
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
        <h4 class="modal-title">Add New organization</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form action="" method="post" class="col-12 form shadow-lg p-5 ">
          <div class="form-group">
          <label for="oName">Name</label>
          <input type="text" class="form-control" placeholder="Enter Name" name="oName">
          </div>
           <div class="form-group">
          <label for="oType">Organization Type</label>
          <input type="text" class="form-control" placeholder="Gov or Private" name="oType">
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
    $oName=$_POST['oName'];
    $oType=$_POST['oType'];
    $sql="INSERT INTO `organization`(`organization_name`, `organization_type`) VALUES ('$oName', '$oType')";
    $run=mysqli_query($con, $sql);
    if($run){
    $regmsg='<div class="alert alert-warning" role="alert">Data Inserted</div>';
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
                $que="select *from organization order by organization_id desc limit {$offset}, {$limit}";
                $run1=mysqli_query($con, $que);
                while($row=mysqli_fetch_assoc($run1)){
                ?>
              <tr>
                <td><?php echo $row['organization_id']; ?></td>
                <td><?php echo $row['organization_name']; ?></td>
                <td>
                  <form action="editorganization.php" method="post">
                   <input type="hidden" name="dEditID" value="<?php echo $row['organization_id'];?>">
                    <button type="submit" name="edit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                  </form>
                </td>
              </tr><?php } ?>
            </tbody>
         </table>
         <div style="display: flex; justify-content: center; align-items: center;">
          <?php
              echo '<ul class="pagination">';
              $q="select *from organization";
              $r=mysqli_query($con, $q);
              if(mysqli_num_rows($r)>0){
                $totalRecord=mysqli_num_rows($r);
                $totalPages=ceil($totalRecord/$limit);
                for($i=1; $i<=$totalPages; $i++){
                  echo '<li class="page-item"><a class="page-link" href="addOrganization.php?page='.$i.'">'.$i.'</a></li>';
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
