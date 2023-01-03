
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
<span class="font-weight-bold ms-1 text-info"> <?=$_SESSION['username']?>!</span>  Sure that you read notification from Saqib .
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
$sql="SELECT * FROM `attendance` WHERE name = '$username' ORDER BY sno DESC ";
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