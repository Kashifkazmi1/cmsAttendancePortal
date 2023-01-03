<?php
$login = false;
$showEror = false ;
if($_SERVER["REQUEST_METHOD"]=="POST"){


include 'partials/_dbconect.php';
$username = $_POST["username"];
$password = $_POST["password"];

//store username with username = in database

$data = "username=".$username;

  $sql = "Select * from users where `username` ='$username' ";
  
  $result = mysqli_query($conn , $sql);
  $num = mysqli_num_rows($result);
  
    

    // fetch data from data base 
    while($row = mysqli_fetch_assoc($result))
   


    // password verify 

      if(password_verify($password,$row['password'])){
           
           $login = true ;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['username'] = $username ;
           $_SESSION['pp'] = $row['pp'];
           $_SESSION['UID'] = $row['user_id'];
          //  echo $_SESSION['pp'];
          header("location:dashboard.php");
          exit;
            
 }else{
   
  $showEror = " Password do not match " ;
}
$showEror = " Password do not match " ;
    
  }




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/cross-favicon.png">
  <title>
login-Attendence 
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>
<body>
  

  <main class="main-content  mt-0">
    
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/login.png');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      
      <div class="container my-auto">
<!-- alert show kerne kay liay  -->
<?php
 if($login){
 echo '<div class="alert alert-info text-light alert-dismissible fade show" role="alert">
  <strong>sucessfuly! </strong> you are loged in
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' ;
 }
 if($showEror){
 echo '<div class="alert alert-info text-light alert-dismissible fade show" role="alert">
  <strong>Please Try again  </strong> '.$showEror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>' ;
 }
?>



  
        <div class="row">
          
          
          <div class="col-lg-4 col-md-8 col-12 mx-auto">

            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header ">
                <div class="">
                  <h4 class="text-info text-shadow-info font-weight-bolder text-center mt-2 mb-0">Sign in </h4>
                 
                </div>
              </div>
              <!-- -----------------login form------------------- -->
              <div class="card-body">
                <form action="/cms/pages/index.php" method="post" role="form" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">username</label>
                    <input type="text"  id="username" name="username"  class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"  id="password" name="password"  class="form-control">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" >
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
              
                  <i class="fa fa-heart" aria-hidden="true"></i>
                Made by
                <img src="assets/img/cms-logo.png" alt="" height="20px"  > <b> Cross Media sol  </b>
               
                <script>
                  document.write(new Date().getFullYear())
                </script>
               
                   
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
             
            </div>
           
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!-- preloader  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>