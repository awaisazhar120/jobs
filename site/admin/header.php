
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php if (isset($title)){echo $title;} {
    # code...
  } ?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

   <!--Font Awesome CSS-->
    <link rel="stylesheet" href="..//font/css/all.min.css">

  <!-- Custom styles-->
  <link href="simple-sidebar.css" rel="stylesheet">

  <style type="text/css">
    @media screen and (max-width: 767px) {
    .select2 {
        width: 100% !important;
    }
}
  </style>

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" style="background: rgb(36,46,59);" id="sidebar-wrapper">
      <div class="sidebar-heading text-white font-weight-bold text-center" style="background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);">JOBSGUIDER</div>
      <div class="list-group list-group-flush">
        <a href="addDesignation.php" class="list-group-item list-group-item-action text-white" style="background: rgb(31,46,67);">Designation</a>
        <a href="addOrganization.php" class="list-group-item list-group-item-action text-white" style="background: rgb(31,46,67);">Organization</a>
        <a href="posts.php" class="list-group-item list-group-item-action text-white" style="background: rgb(31,46,67);">Posts</a>
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action text-white" style="background: rgb(31,46,67);">Location</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li class="list-group-item list-group-item-action" style="background: rgb(31,46,60);">
                            <a href="country.php" class="text-white text-decoration-none">Country</a>
                        </li>
                        <li class="list-group-item list-group-item-action" style="background: rgb(31,46,60);">
                            <a href="province.php" class="text-white text-decoration-none">Province</a>
                        </li>
                        <li class="list-group-item list-group-item-action" style="background: rgb(31,46,60);">
                            <a href="city.php" class="text-white text-decoration-none"> City</a>
                        </li>
                    </ul>
        <a href="testVendor.php" class="list-group-item list-group-item-action text-white" style="background: rgb(31,46,67);">Test Vendor</a>
        <a href="logout.php" class="list-group-item list-group-item-action text-white" style="background: rgb(31,46,67);">Logout</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="background: rgb(242,243,244);">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" style="background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%)!important;">
        <button class="btn btn-primary" id="menu-toggle"><i class="navbar-toggler-icon"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
          <!-- <ul class="navbar-nav ml-auto mt-2 mt-lg-0"> -->
            <!-- <li class="nav-item active"> -->
              <!-- <a class="nav-link" href="addDesignation.html">Home <span class="sr-only">(current)</span></a> -->
            <!-- </li> -->
            <!-- <li class="nav-item"> -->
              <!-- <a class="nav-link" href="#">Link</a> -->
            <!-- </li> -->
            <!-- <li class="nav-item dropdown"> -->
              <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                <!-- Dropdown -->
              <!-- </a> -->
              <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> -->
                <!-- <a class="dropdown-item" href="#">Action</a> -->
                <!-- <a class="dropdown-item" href="#">Another action</a> -->
                <!-- <div class="dropdown-divider"></div> -->
                <!-- <a class="dropdown-item" href="#">Something else here</a> -->
              <!-- </div> -->
            <!-- </li> -->
          <!-- </ul> -->
        <!-- </div> -->
      </nav>