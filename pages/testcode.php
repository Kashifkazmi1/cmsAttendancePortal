
<?php

// $sql = "INSERT INTO `attendance` (`sno`, `name`, `status`, `date`, `time`, `massage`) VALUES ('2', 'kashif', 'present', '10.7.2022', current_timestamp(), 'no massage')";


$sql = "INSERT INTO `attendance` (`name`, `status`, `date`, `time`,  `massage`) VALUES ('$name', '$status', '$todaydate',`$time`, '$massage')";

date_default_timezone_set('Asia/Karachi');

echo date("g:iA");


?>