<?php
 include '_dbconect.php';

 $name = $_SESSION['username']; 

 $sql_late = "SELECT * FROM `attendance` WHERE (`name` , `late`) = ('$name' , 'late')
 ";
$result = mysqli_query($conn,$sql_late);
$number_rows = mysqli_num_rows($result);
echo $number_rows;

?>