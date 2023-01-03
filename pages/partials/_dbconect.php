<?php
// conection with database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "attend";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    
    die ("eror".mysqli_connect_eror($conn));
}



?>