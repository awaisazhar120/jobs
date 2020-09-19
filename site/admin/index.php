
<?php
$title='Jobsguider';
include('dbconnection.php');
session_start();
include('header.php');
if(isset($_SESSION['is_aLogin'])){
    if(time()- $_SESSION['time']>3){
        session_unset();
        session_destroy();
        echo "<script>location.href='alogin.php'</script>";
    }else{
    $email=$_SESSION['aEmail'];}
}
else{
    echo "<script>location.href='alogin.php'</script>";
}
?>

      <div class="container-fluid">
        <h1 class="mt-4">Jobsguider Homepage</h1>
      </div>
	  
  <?php include('footer.php'); ?>
