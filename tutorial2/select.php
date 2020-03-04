<?php

include_once 'connect.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {

   $SerialNumber = $_POST['SerialNumber'];
   $Hours = $_POST['Hours'];
   $Minutes = $_POST['Minutes'];
   $Seconds = $_POST['Seconds'];
   $CurrentWeight = $_POST['CurrentWeight'];
   $CapacityLevel = $_POST['CapacityLevel'];
   $RemainingDays = $_POST['RemainingDays'];

    

    $sql = "SELECT * FROM tblusers WHERE SerialNumber='$SerialNumber' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        // if ($password == $row['password'] ) {
            
            // $index['password'] = $row['password'];
            // $index['email'] = $row['email'];
            $index['SerialNumber'] = $row['SerialNumber'];
            $index['Hours'] = $row['Hours'];
            $index['Minutes'] = $row['Minutes'];
            $index['Seconds'] = $row['Seconds'];
            $index['CurrentWeight'] = $row['CurrentWeight'];
            $index['CapacityLevel']=$row['CapacityLevel'];
            $index['RemainingDays'] = $row['RemainingDays'];

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);
            
          


        }
        else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($conn);

        }

}

?>