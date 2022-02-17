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

$id = $_GET['id']; 

$q = mysqli_query($con, "UPDATE employee SET `firstName` = '$firstName',`lastName` = '$lastName',`email` = '$email', `salary` = '$salary', `sex` = '$sex' WHERE `id` = '{$id}' LIMIT 1");

if ($q) {
    $message['status'] = "Success";
}else{
    http_response_code(422);
    $message['status'] = "Error";
}

echo json_encode($message);
echo mysqli_error($con);