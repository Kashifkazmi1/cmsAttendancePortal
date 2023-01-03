<?php
 include '_dbconect.php';

 
 $todaydate = date("m-d-y"); 
 $sql_late = "SELECT * FROM `attendance` WHERE (`date`, `late`) = ('$todaydate', 'late')
 ";
$result = mysqli_query($conn,$sql_late);
$number_rows = mysqli_num_rows($result);
echo $number_rows;

?>