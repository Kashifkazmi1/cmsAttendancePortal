


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
<span class="font-weight-bold ms-1 text-info"> <?=$_SESSION['username']?>!</span>  Sure that you read notification from Users .
</p>
</div>
<div class="col-lg-6 col-5 my-auto text-end">
<div class="dropdown float-lg-end pe-4">
<a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa fa-ellipsis-v text-secondary"></i>
</a>
<ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
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
<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
<th  class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Exel file </th>
</tr>
</thead>

<!-- body  -->

<?php 
include 'partials/_dbconect.php';
$username = $_SESSION['username'];

$sql = "SELECT * FROM `users`";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)){
   
  $name = $row['username'];
  echo '  <tbody>
 <tr>
   <td>
     <div class="d-flex px-2 py-1">
       <div>
         <img src="uploads/'.$row['pp'].'" class="avatar avatar-sm me-3" alt="xd">
       </div>
       <div class="d-flex flex-column justify-content-center">
       <a href="view_profile.php?username='.$name.'"> <h6 class="mb-0 text-sm"> '.$row['username'].'</h6></a>
       </div>
     </div>
   </td>
   <td>
     <div class="avatar-group mt-2 text-xs">
     '.$row [ 'date' ].'
     </div>
   </td>
   <td>
  
   <div style="padding-left: 107px!important;" class="avatar-group mt-2 text-xs"> 
   <a href="view_page.php?catid='.$name.'" class="text-warning">   View all  </a>
   </div>
    
   <td>
   <div style="padding-left: 107px!important;" class="avatar-group mt-2 text-xs"> 
   <a href="partials/admin_export.php?catid='.$name.'" class="btn btn-sm bg-gradient-info btn-sm w-50 " > Export </a>
   </div>
 </td>
 <td>

   </td>
 </tr>';
         
 }



?>