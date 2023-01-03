<?php
 include '_dbconect.php';
// total present 
 $todaydate = date("m-d-y"); 
 $sql = "SELECT * FROM `attendance` WHERE `date`= '$todaydate' AND `status` = 'ABSENT'
 ";
 $result = mysqli_query($conn,$sql);
 $number_present_rows = mysqli_num_rows($result);
  
//  total user 
// $sql_user = "SELECT * FROM `users` ";

// $result = mysqli_query($conn,$sql_user);
// $number_user_rows = mysqli_num_rows($result);

// $absent = $number_user_rows - $number_present_rows - 1 ;
echo $number_present_rows  ;

?>