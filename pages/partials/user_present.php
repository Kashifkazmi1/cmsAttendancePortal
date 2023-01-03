<?php
 include '_dbconect.php';

 $name = $_SESSION['username']; 
 
 $sql = "SELECT * FROM `attendance` WHERE (`name` , `status`) = ('$name' , 'present')
 ";
 $result = mysqli_query($conn,$sql);
 $number_rows = mysqli_num_rows($result);
echo $number_rows;

?>