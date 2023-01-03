<?php
include '_dbconect.php';

session_start();
$name = $_GET['catid'];
$sql="SELECT * FROM `attendance` WHERE name = '$name' ORDER BY sno DESC LIMIT 30";
$result=mysqli_query($conn,$sql);


$html = '<table>
 <tr> <td> Name </td> 
 <td> Attendace </td>
 <td> Date </td>
  <td>  Time </td>
   <td> massage </td>
    <td> status </td>
    </tr> ' ;
 echo $html;
    while($row=mysqli_fetch_array($result)){
        echo  '<table>
        <tr> <td> '.$row['name'].' </td> 
        <td> '.$row['status'].' </td>
        <td> '.$row['date'].'</td>
         <td> '.$row [ 'time' ].' </td>
          <td> '.$row [ 'massage' ].' </td>
           <td> '.$row [ 'late' ].'</td>
           </tr>' ;
                
        }

        $html.='</table>';
        header('Content-Type:application/xls');
        header('Content-Disposition:attachment;filename=record.xls');
        

       
  

?>