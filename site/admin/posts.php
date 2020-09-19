   
  <?php
  $title="Post";
 include('header.php');
  include('dbconnection.php');
    if(isset($regmsg)){
      echo $regmsg;
    }
    ?>
      <div class="container mt-5">
        <div class="row">
          <div class="col-auto ml-auto">
            <a href="addNewPost.php" class="btn btn-primary">Add New Post</a>
           
        </div>
       </div>

      <div class="container mt-3">
        <input type="text" name="" id="myInput" placeholder="Search Province" class="form-control" onkeyup="searchFun()">
        <div class="row">
          <div class="col-12"> 
           <table class="table table-striped table-hover" id="myTable">
            <thead>
              <tr>
                <th>Designation</th>
                <th>Organization</th>
                <th>Country</th>
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
                $que="SELECT post.post_designation, post.post_organization, post.post_country,  country.country_name
                FROM `post`
                LEFT JOIN `country`
                ON post.post_country = country.country_id
                order by post_id desc limit {$offset}, {$limit}";
                $run1=mysqli_query($con, $que);
                while($row=mysqli_fetch_assoc($run1)){
                ?>
              <tr>
                <td><?php echo $row['post_designation']; ?></td>
                <td><?php echo $row['post_organization']; ?></td>
                <td><?php echo $row['country_name']; ?></td>
                <td>
                  <form action="editPost.php" method="post">
                   <input type="hidden" name="dEditID" value="<?php echo $row['post_id'];?>">
                    <button type="submit" name="edit" class="btn btn-info"><i class="fas fa-edit"></i></button>
                  </form>
                </td>
              </tr><?php } ?>
            </tbody>
         </table>
         <div style="display: flex; justify-content: center; align-items: center;">
          <?php
              echo '<ul class="pagination">';
              $q="select *from `post`";
              $r=mysqli_query($con, $q);
              if(mysqli_num_rows($r)>0){
                $totalRecord=mysqli_num_rows($r);
                $totalPages=ceil($totalRecord/$limit);
                for($i=1; $i<=$totalPages; $i++){
                  echo '<li class="page-item"><a class="page-link" href="post.php?page='.$i.'">'.$i.'</a></li>';
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

</body>

</html>
