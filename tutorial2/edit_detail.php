<?php
include 'connect.php';

$Serial_Number=$_POST['SerialNumber']; ;
$Hours = $_POST['Hours'];;
$Minutes = $_POST['Minutes'];
$Seconds= $_POST['Seconds'];

$query = mysqli_query($conn, "UPDATE tblusers SET Hours = '$Hours', Minutes = '$Minutes', Seconds = '$Seconds' WHERE SerialNumber = '$Serial_Number' ");

if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Updated Successfully';

}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Updation Failed';
}

echo json_encode($response);
?>