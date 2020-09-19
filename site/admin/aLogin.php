
<?php
$title="Admin Login";
    include('dbconnection.php');
    session_start();
    if(!isset($_SESSION['is_aLogin']))
    {
    if(isset($_REQUEST['aLogin'])){
        if($_REQUEST['aEmail']=="" || $_REQUEST['aPassword']==""){
            $loginmsg='<div class="alert mt-3" style="background-color:orange;
            color:white;" role="alert">Fill all Fields</div>';
        }
        else{
            $email=$_REQUEST['aEmail'];
            $password=$_REQUEST['aPassword'];
            $query="SELECT admin_email, admin_password from login where admin_email='".$email."' 
            and admin_password='".$password."' limit 1";
            $run=mysqli_query($con, $query);
            if(mysqli_num_rows($run)==1){
                $_SESSION['is_aLogin']=TRUE;
                $_SESSION['aEmail']=$email;
                $_SESSION['time']=time();
                echo "<script> location.href='index.php'</script>";
            }
            else{
                $loginmsg='<div class="alert mt-3" role="alert" style="background-color:red;
                color:white;">Invalid User</div>';
            }

        }
    }
    }
    else{
        echo "<script> location.href='index.php'</script>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="Login/css/bootstrap.min.css">

    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="Login/css/all.min.css">

    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    
    <!--Custome CSS-->
    <link rel="stylesheet" href="css/custom.css">
    <style>
        @media screen and (max-width: 800px){
            h2{
                font-size: 1.3rem;
            }
        }
    </style>
    <title>Login</title>
</head>

<body style="background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url('background.jpg');">
<div class="container text-white text-center mt-5">
    <i class="fa fa-2x fa-phone text-success mr-2"></i>
    <h2 class="d-inline-block">Admin Login</h2>
</div>
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6">
            <form action="" method="post" class="shadow-lg p-5 mt-5">
                <div class="form-group">
                    <li class="fa fa-user text-white"></li>
                   <label for="aEmail" class="text-white font-weight-bold" >Email</label>
                   <input type="email" name="aEmail" class="form-control">
                </div>
                <div class="form-group">
                    <li class="fa fa-key text-white"></li>
                   <label for="aPassword" class="text-white font-weight-bold" >Password</label>
                   <input type="password" name="aPassword" class="form-control">
                </div>
                <input type="submit" value="Login" class="btn btn-outline-primary btn-block mt-4" name="aLogin">
                <?php if(isset($loginmsg)){ echo $loginmsg;}?>
            </form>
        </div>
    </div>
</div>
    <!-- JavaScript Codes -->
    <script src="Login/js/jquery.js"></script>
    <script src="Login/js/popper.min.js"></script>
    <script src="Login/js/bootstrap.min.js"></script>
    <script src="Login/js/all.min.js"></script>
</body>
</html>