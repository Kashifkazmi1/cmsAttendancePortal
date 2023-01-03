<?php
 include '_dbconect.php';

 $todaydate = date("m-d-y"); 
 $sql = "SELECT * FROM `attendance` WHERE `date`= '$todaydate' and `status` = 'Present'
 ";
 $result = mysqli_query($conn,$sql);
 $number_rows = mysqli_num_rows($result);
echo $number_rows;

?>