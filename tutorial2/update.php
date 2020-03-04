<?php
include 'connect.php';

$id = $_POST['id'];
$password = $_POST['password'];
$email = $_POST['Email'];
// $phone = $_POST['phone'];
// $address = $_POST['address'];

$query = mysqli_query($conn, "UPDATE tblusers SET Email = '$email', Password = '$password' WHERE id = '$id' ");

//$queryActionLog = mysqli_query($conn,"INSERT INTO `tblactionLog`( `Description`, `Data_Affected`, `On_Table`,`Action_Date`,`Action_Time`) VALUES('Updated','$email','Users','".date("Y-m-d")."','".date("h:i:sa")."')");

if($query){
  $response['success'] = 'true';
  $response['message'] = 'Data Updated Successfully';
}else{
  $response['success'] = 'false';
  $response['message'] = 'Data Updation Failed';
}

echo json_encode($response);
?>