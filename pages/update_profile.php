<?php
session_start();
include 'notificationPHP.php';
$showAlert = false;
$showEror = false ;
if($_SERVER["REQUEST_METHOD"]=="POST"){

//  store email 
include 'partials/_dbconect.php';
$email = $_POST["useremail"];




   if(isset($_FILES['pp']['name'])){
       
//image name temp_name and and info store in there corresponding variables  
       $img_name = $_FILES['pp']['name'];
       $tmp_name = $_FILES['pp']['tmp_name'];
       $error = $_FILES['pp']['error'];
     //check if eror is 0 
         if($error === 0){
          $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
          $img_ex_to_lc = strtolower($img_ex);
    
          $allowed_exs = array("jpg", "jpeg", "png"); 

            if(in_array($img_ex_to_lc,$allowed_exs)) {

// storing file with its username
              $new_img_name = uniqid($username, true).'.'.$img_ex_to_lc;
              //upload file anf move file to uplaod folder 
              $img_upload_path = 'uploads/'.$new_img_name;
              move_uploaded_file($tmp_name, $img_upload_path);
   

              // update data in  database 
              session_start();
              $username = $_SESSION['username'];
          $sql = "UPDATE `users` SET `email` = '$email' , `pp` = '$new_img_name' WHERE `users`.`username` = '$username'"; 

          
          
        $result = mysqli_query($conn , $sql);
        //  if result true send user to index beacase its need to refresh  
          if($result){
         header('location:index.php');
         
           }
          

}
}
   }}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/cross-favicon.png">
  <title>
    update-profile 
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
   
            <div class="col-12 ">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0 text-info">Update your Profile </h6>
                      </div>
                      <div class="container">
                       
                 
    
  
                      <!-- ------------------atandance table--------  -->
<div class="container fluid ">

                      <div class="row mb-4">
        <div class="col-lg-12 col-md-10 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <p> Add a new email and profile picture</p>
                 
                </div>
                
              </div>
            </div>


            

                    
<!-- --------------------tables------------------  -->

<div style="padding-top: 2rem!important;" class="container">

        <table class="table table-hover" id="myTable">
            <tbody>
                
      
                <div class="card-body">
                <!-- ---------------form------------- -->
          <form  action="/cms/pages/update_profile.php" method="post"  role="form"  enctype="multipart/form-data">
                    
                  
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email"  id="useremail" name="useremail"  class="form-control">
                    </div>
                   
                        <!--  input image   -->
                        <?php//require('partials/upload.php') ; ?>  
                    <div class="mb-3">
                         <label for="formFile" class="form-label text-info">Select Profile picture</label>
                         <input class="form-control " type="file" id="pp" name="pp" >
                       </div>
                       
                    

                    <div class="form-check form-check-info text-start ps-0 ">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit"  name="submit"  
                  value="Upload" class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0">Update Profile</button>
                    </div>
                  </form>
          
        

        
            </tbody> 
        </table>


                 

        <?php include 'notificationJs.php'; ?>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
   
 
 </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>


