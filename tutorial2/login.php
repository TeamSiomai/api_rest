<?php

include_once 'connect.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    

    $sql = "SELECT * FROM tblusers WHERE Email='$email' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['login'] = array();
    
    if ( mysqli_num_rows($response) === 1 ) {
        
        $row = mysqli_fetch_assoc($response);

        if ($password == $row['Password'] ) {
            
            $index['password'] = $row['Password'];
            $index['email'] = $row['Email'];
            $index['id'] = $row['id'];

            array_push($result['login'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($conn);

        } else {

            $result['success'] = "0";
            $result['message'] = "error";
            echo json_encode($result);

            mysqli_close($conn);

        }

    }

}

?>