<?php 
session_start();
include 'notificationPHP.php';
if (isset($_SESSION['loggedin']) && isset($_SESSION['username'])) {
  include 'partials/_dbconect.php';
  

  $insert = false;
  $update = false;
  $delete = false;
  

  if(isset($_GET['action'])){
    if($_GET['action']=="delete"){
      $sno = $_GET['id'];
     
      //echo $sno;
      
      $sql = "DELETE FROM `users` WHERE `user_id` = $sno";
      $result = mysqli_query($conn, $sql);
      if($result){
          $delete = true;
         
   
      }
    }
    }
  if ($_SERVER['REQUEST_METHOD']== 'POST'){
    if (isset( $_POST['snoEdit'])){
      // Update the record
        $sno = $_POST["user_id"];
        $name = $_POST["name"];
       
    
      // Sql query to be executed
      $sql = "UPDATE `users` SET `username` = '$name'  WHERE `username`.`user_id` = $sno";
      $result = mysqli_query($conn, $sql);
      if($result){
        $update=true;
      }
      else{
        echo "we could not update the record successfully";
      }
    }
    
  if($result){
      $insert = true;
  }
  else {
      
      echo "the   record was not  inserted  sucessfully  because of this error----->" .mysqli_error($conn);
     
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
    CMS-Attendance 
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
                      <h6 class="mb-0">CMS-Users </h6>
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
                  <h6> All User's Accounts</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1 text-info"> <?=$_SESSION['username']?>!</span>  Your added this users  .
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


            <!-- <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      
                     
                 
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead> -->

                  <!-- body  -->

                    
<!-- --------------------tables------------------  -->

<div style="padding-top: 2rem!important;" class="container">

        <table class="table table-hover" id="myTable">
            <thead class="table-light">
                <tr>
                    <th scope="col">serial no</th>
                    <th scope="col">Name</th>
                    
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'partials/_dbconect.php';
        $sql="SELECT * FROM `users`";
        $result=mysqli_query($conn,$sql);
        $sno=0;
        while($row=mysqli_fetch_array($result)){
            // echo var_dump($row);
            $sno=$sno+1;
            echo "<tr>
            <th scope='row'>" . $sno ."</th>
            <td>" . $row [ 'username' ] ."</td>
            
            <td> <button class= ' edit btn btn-sm btn-warning'id= " . $row [ 'user_id' ] . ">Edit</button>
          
            <a href='?action=delete& id=".$row['user_id']. "' class= 'btn btn-sm btn-danger delete' >Delete</a>
    </tr> ";
                   
           }
          
        

        ?>
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
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            name = tr.getElementsByTagName("td")[0].innerText;
            
            console.log(name);
            nameEdit.value = name;
           
            snoEdit.value = e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle')
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ",);
            sno = e.target.id.substr(1,);

            if (confirm("Are you sure you want to delete this user!")){
                console.log("yes");
                window.location = `/mynotes/index.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
    </script>
 
 </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>