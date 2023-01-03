<?php
 include '_dbconect.php';
 //let late time is 03
 $latetime = "02";
 $absentOnLate = "10"; //when absent on late 
 $time = date("g:iA");
 //set time zone of pakistan
 date_default_timezone_set('Asia/Karachi');
 //let current time in only hours
 $currenttime = date("h");
//  echo $currenttime;
//system time
$time = date("h:i");
//concate with 00 in time
$time_with_secounds = $time.':00';
// echo $time_with_secounds;
 if ($currenttime > $latetime) {
   
//check how many rows are effected in late time
 $sql = "SELECT * FROM `attendance` WHERE time = '$time_with_secounds';
 ";
 $result = mysqli_query($conn,$sql);
 

if ($result) {
 //update query with normal to late 
 $sql_update = "UPDATE `attendance` SET `late` = 'Late' WHERE `attendance`.`time` = '$time_with_secounds'";

 $result2 = mysqli_query($conn,$sql_update);
 
      //if condition lagao

 }else{
     echo " not updated";
 }
//  $number_rows = mysqli_num_rows($result);
//  echo $number_rows;
}

?>