<?php
session_start();
include 'partials/_dbconect.php';

$uid=$_SESSION['UID'];
if(isset($_POST['submit'])){
  include 'partials/_dbconect.php';
	$to_id=mysqli_real_escape_string($conn,$_POST['to_id']);
	$massage=mysqli_real_escape_string($conn,$_POST['massage']);
  $result =	mysqli_query($conn,"insert into massage(from_id,to_id,massage) values('$uid','$to_id','$massage')");
  if($result){
              header('location:massage_thankyou.php');
                }
}

  
$res_massage=mysqli_query($conn,"select users.username,users.pp,massage.massage from massage,users where massage.status=0 and massage.to_id='$uid' and users.user_id=massage.from_id");
$unread_count=mysqli_num_rows($res_massage);

$sql_users="select user_id,username from users order by username asc";
$res_users=mysqli_query($conn,$sql_users);
           
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/cross-favicon.png">
  <title>
    Success-Application
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
                      <h6 class="mb-0 text-info">CMS-Appication Request </h6>
                      </div>
                      <div class="container">
                       
                 
    
  
                      <!-- ------------------atandance table--------  -->
<div class="container fluid ">

                      <div class="row mb-4">
        <div class="col-lg-12 col-md-10 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
               
                
              </div>
            </div>



                    
<!-- --------------------tables------------------  -->

<div style="padding-top: 2rem!important;" class="container">

        <table class="table table-hover" id="myTable">
            <tbody>
                
      
                <div class="card-body">
                <!-- ---------------form------------- -->
                <form  action="/cms/pages/application.php" method="post"  role="form"  >
                        
               
                <label class="form-label">Send a leave Application to Admin .</label>
                 
                   
                
                  <select value="" class="form-select boder" name="to_id" id="to_id" > 
                  <?php  while ($row = mysqli_fetch_assoc($res_users)) { ?>
                    <option value = "<?php echo $row['user_id']; ?>"><?php echo $row['username'];  ?></option> 
              
                  <?php } ?>
                  </select>



                <label class="form-label">Write an Appication</label>
                  <div class="input-group input-group-outline mb-3 ">
                    
                    <textarea type="text"  id="massage" name="massage"  class="form-control" rows="7" cols="50" required>
   
                    </textarea >
                  </div>
                
        
                  </div>
                  <div class="text-left">
                    <button type="submit"  name="submit"  
                 class="btn btn-md bg-gradient-info btn-md w-20 mt-4 mb-0">Send </button>
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