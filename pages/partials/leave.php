<?php
 include '_dbconect.php';


 $sql = "SELECT * FROM `attendance` WHERE status = 'Leave'
 ";
 $result = mysqli_query($conn,$sql);
 $number_rows = mysqli_num_rows($result);
echo $number_rows;

?>