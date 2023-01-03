<?php 
session_start();
include 'notificationPHP.php';
if (isset($_SESSION['loggedin']) && isset($_SESSION['username'])) {
  $name = $_GET['username'];
 
 
}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/cross-favicon.png">
  <title>
    Profile-Attendance 
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
  <style>
  .boder{
    border: 1px solid lightgray !important;
    border-radius: 7px !important;
    padding-left: 8px !important;

  } 
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
<?php  include 'partials/side_bar.php'; ?> 
<?php  include 'notification.php'; ?> 
    
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/profile3.jpg');">
        <span class="mask  bg-gradient-info  opacity-2"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">

               <!-- get data of this user  -->

               
               <?php 
                    include'partials/_dbconect.php';
                   
                    $name = $_GET['username'];

                    
                    $sql="select users.pp from users where  users.username = '$name'";
                    $result=mysqli_query($conn,$sql);
 
                    while($row=mysqli_fetch_array($result)){ 


             echo '<div class="avatar avatar-xl position-relative">
              <img src="uploads/'.$row['pp'].'" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>'; }
            
            ?>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?php echo $name ; ?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                Developer 
              </p>
            </div>
          </div>
         
            
    
        

                      
<div class="container fluid ">

                      <div class="row mb-4">
        <div class="col-lg-12 col-md-10 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6> Daily Attendance Of <?php echo $_GET['username'];?></h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1 text-info"> <?=$_SESSION['username']?>!</span>   Attendance record listed blow .
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;"><del>delete</del></a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;"> <del>insert</del> </a></li>
                      <li><a href="partials/export.php" class="dropdown-item border-radius-md text-info" href="javascript:;"> Export </a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>


            <!-- table  -->


            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Attendance </th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status </th>
                    </tr>
                  </thead>

                  <!-- body  -->

                  <?php 
                    include'partials/_dbconect.php';
                   
                    $name = $_GET['username'];

                    
                    $sql="select users.username,users.pp,attendance.name ,attendance.status,attendance.status,attendance.date,attendance.time,attendance.late from attendance,users where users.username = '$name' AND attendance.name = '$name'";
                    $result=mysqli_query($conn,$sql);
 
                    while($row=mysqli_fetch_array($result)){ 

                       echo '  <tbody>
                       <tr>
                         <td>
                           <div class="d-flex px-2 py-1">
                             <div>
                               <img src="uploads/'.$row['pp'].'" class="avatar avatar-sm me-3" alt="xd">
                             </div>
                             <div class="d-flex flex-column justify-content-center">
                               <h6 class="mb-0 text-sm"> '.$name.'</h6>
                             </div>
                           </div>
                         </td>
                         <td>
                           <div class="avatar-group mt-2 text-xs">
                           '.$row [ 'time' ].'
                           </div>
                         </td>
                         <td class="align-middle text-center text-sm">
                           <span class="text-xs font-weight-bold"> '.$row [ 'date' ].'</span>
                         </td>
                         <td class="align-middle text-center text-sm">
                           
                               <div class="progress-percentage">
                                 <span class="text-xs font-weight-bold text-info">'.$row [ 'status' ].'</span>
                               </div>
                     
                         </td>
                         <td class="align-middle text-center text-sm">
                           
                               <div class="progress-percentage">
                                 <span class="text-xs font-weight-bold text-danger">('.$row [ 'late' ].')</span>
                               </div>
                     
                         </td>
                       </tr>';
                               
                       }
                      
                    
            
                    ?>
                    
                 

   <?php include 'notificationJs.php'; ?>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>