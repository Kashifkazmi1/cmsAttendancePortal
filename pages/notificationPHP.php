<?php

include 'partials/_dbconect.php';

$uid=$_SESSION['UID'];
if(isset($_POST['submit'])){
  include 'partials/_dbconect.php';
	$to_id=mysqli_real_escape_string($conn,$_POST['to_id']);
	$massage=mysqli_real_escape_string($conn,$_POST['massage']);
  $result =	mysqli_query($conn,"insert into massage(from_id,to_id,massage) values('$uid','$to_id','$massage')");
  if($result){
              header('location:massage_thankyou.php');
                }
}

  
$res_massage=mysqli_query($conn,"select users.username,users.pp,massage.massage from massage,users where massage.status=0 and massage.to_id='$uid' and users.user_id=massage.from_id");
$unread_count=mysqli_num_rows($res_massage);

$sql_users="select user_id,username from users order by username asc";
$res_users=mysqli_query($conn,$sql_users);
           
?>