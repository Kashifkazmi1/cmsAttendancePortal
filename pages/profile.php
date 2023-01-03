<?php 
session_start();
include 'notificationPHP.php';
if (isset($_SESSION['loggedin']) && isset($_SESSION['username'])) {
 
  if($_SERVER["REQUEST_METHOD"]=="POST"){

    // storing values in variable 
    include 'partials/_dbconect.php';
    $name = $_SESSION['username'];
    $status = $_POST["status"];
    $massage = $_POST["massage"];
    
    // insert data into databse 
    date_default_timezone_set('pakistan');
    $todaydate = date("m-d-y");
    date_default_timezone_set('Asia/Karachi');
    
    $time = date("g:iA");
                // check attendace phelay lagi toh nahi 
          $sql_check = "SELECT * FROM `attendance` WHERE `date` = '$todaydate' AND `name` = '$name'";
          $res_check = mysqli_query($conn , $sql_check);
          $num = mysqli_num_rows($res_check);
          if($num > 0){
            header("location:already_attendance.php");
          }else{  
    $sql = "INSERT INTO `attendance` (`name`, `status`, `date`, `time`,  `massage`) VALUES ('$name', '$status', '$todaydate','$time', '$massage')";

    
   $result = mysqli_query($conn,$sql);
   if($result){


      // ager update status normal to late if user is late 
     include 'partials/late.php';

    header("location:thankyou.php");
   }else{
    echo "failed to insert data ";
   }
  
  
  
  }

}
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
            <div class="avatar avatar-xl position-relative">
              <img src="uploads/<?=$_SESSION['pp']?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?=$_SESSION['username']?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                Developer 
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">App</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 "  href="Application.php" role="tab" >
                    <i class="material-icons text-lg position-relative">email</i>
                    <span class="ms-1">Application</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 "  href="update_profile.php" role="tab" >
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
       
            <div class="col-12 ">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">CMS-Attendance </h6>
                      </div>
                      <div class="container">
                        <!-- ------------form-------------  -->
                        <form action="/cms/pages/profile.php" method="post" role="form">
                          
                            
                           
                          <div class="input-group input-group-outline mb-3 pt-3 ">
                         
                  <select class="form-select boder" name="status" id="status"> 
                    
                          <option>Present</option> 
                    
                          
                        </select>

                          <div class="input-group input-group-outline mb-3 pt-3 ">
                            <label class="form-label pt-3"  >Massage (optional)</label>
                            <input type="text" class="form-control" name="massage" id="massage">
                          </div>
                          
                         
                          <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Present</button>
                          </div>
                          
                        </form>
                      </div>
                 
    
        

                      <!-- ------------------atandance table--------  -->
<div class="container fluid ">

                      <div class="row mb-4">
        <div class="col-lg-12 col-md-10 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6> Daily Attendance </h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1 text-info"> <?=$_SESSION['username']?>!</span>  Your attendance record listed blow .
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
                    include 'partials/_dbconect.php';
                    $username = $_SESSION['username'];
                    $sql="SELECT * FROM `attendance` WHERE name = '$username' ORDER BY sno DESC LIMIT 30";
                    $result=mysqli_query($conn,$sql);
                    
                    while($row=mysqli_fetch_array($result)){
                       echo '  <tbody>
                       <tr>
                         <td>
                           <div class="d-flex px-2 py-1">
                             <div>
                               <img src="uploads/'.$_SESSION['pp'].'" class="avatar avatar-sm me-3" alt="xd">
                             </div>
                             <div class="d-flex flex-column justify-content-center">
                               <h6 class="mb-0 text-sm"> '.$username.'</h6>
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
                                 <span class="text-xs font-weight-bold text-danger">'.$row [ 'late' ].'</span>
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