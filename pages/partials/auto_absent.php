<?php
 include '_dbconect.php';
 //let late time is 03

 $absentOnLate = "02"; //when absent on late 
 $time = date("g:iA");
 //set time zone of pakistan
 date_default_timezone_set('Asia/Karachi');
 //let current time in only hours
 $currenttime = date("h");
//  echo $currenttime;
//system date
$todaydate = date("m-d-y");
//system time
$time = date("h:i");
//concate with 00 in time
$time_with_secounds = $time.':00';
// echo $time_with_secounds;
 if ($currenttime > $absentOnLate) {
   
//present user
 $sql_pres = "SELECT * FROM `attendance` where `date` = '$todaydate'";
 $res_pres= mysqli_query($conn , $sql_pres);
   
//total user
 $sql_user = "SELECT * FROM `users`";
 $res_user= mysqli_query($conn , $sql_user);

  
 while ($row_user = mysqli_fetch_assoc($res_user)) {
    while ($row_pres = mysqli_fetch_assoc($res_pres)) {                 
         $name = $row_pres['name'];
         $user = $row_user['username'];
         $status = $row_pres['status'];
           if ($user == $name) {
                if ($status == 'Present') {
                  echo 'present user query run';   
                }else {
                    $sql = "INSERT INTO `attendance` (`name`, `status`, `date`, `massage`) VALUES ('$name', 'Absent', '$todaydate', 'Auto Absent')  ";
                     $result = mysqli_query($conn,$sql);
                     echo $result;
                }
           }        
    
    
    }
}
             

     }
//  $sql = "SELECT `users`.`username` , `attendance`.`name` , `attendance`.`status` , `attendance`.`date` FROM `attendance`,`users` WHERE `users`.`username` = `attendance`.`name`
//  ";
//  $res= mysqli_query($conn , $sql);
  
//  while ($row = mysqli_fetch_assoc($res)) {
//      $name = $row['name'];
//      $username = $row['username'];
//      $status = $row['status'];
        
//           if($status == "Present" && $name == $username){
                  
//             $sql = "INSERT INTO `attendance` (`name`, `status`, `date`, `massage`) VALUES ('$name', 'Absent', '$todaydate', 'Auto Absent')
//         ";
//         $result = mysqli_query($conn,$sql);
//      }
             

//      }else{
       
//  }
// }

?>                    +