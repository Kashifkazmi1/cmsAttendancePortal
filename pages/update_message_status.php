<?php
include('partials/_dbconect.php');
session_start();
$uid=$_SESSION['UID'];
mysqli_query($conn,"update massage set status=1 where to_id=$uid");
?>