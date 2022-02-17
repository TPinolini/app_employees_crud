<?php
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$firstName = $data['firstName'];
$lastName = $data['lastName'];
$email = $data['email'];
$salary = $data['salary'];
$sex = $data['sex'];

$q = mysqli_query($con, "INSERT INTO `employee` (`firstName`, `lastName`, `email`, `salary`, `sex`) VALUES ('$firstName', '$lastName', '$email', '$salary', '$sex');");

if ($q) {
    http_response_code(201);
    $message['status'] = 'Success';
}else{
    http_response_code(422);
    $message['status'] = 'Error';
}

echo json_encode($message);
echo mysqli_error($con);

?>



