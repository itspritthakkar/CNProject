<?php 

require 'security.php';
// print_r($_POST);
// exit;
extract($_POST);
// $password_hash = password_hash($password, PASSWORD_DEFAULT);

$ei_query=$conn->prepare("SELECT * from `patients` WHERE `email` = :email");
$ei_execution=$ei_query->execute([
    'email' => $email
]);
$cred_check = $ei_query->fetchAll();
// print_r($cred_arr);
// exit;
if(count($cred_check) === 0){
    echo json_encode(['status' => 'failed', 'type' => 'credentialerror', 'msg' => 'Credentials didn\'t match our records']); exit;
} else {
    $cred_arr = $cred_check[0];
    $db_hash = $cred_arr['password'];
    if (password_verify($password, $db_hash)) {
        session_start();
            echo json_encode(['status' => 'success', 'type' => '', 'msg' => 'Login Successful']);
            $_SESSION['uid']=$cred_arr['id'];
            $_SESSION['uname']=$cred_arr['name'];
            $_SESSION['email']=$email;
            // header("location:dashboard.php");
            exit;
    } else {
        echo json_encode(['status' => 'failed', 'type' => 'credentialerror', 'msg' => 'Credentials didn\'t match our records']); exit;
    }
}

echo json_encode(['status' => 'success', 'type' => '', 'msg' => 'Login Successful']);

if (!$ei_execution) {
    echo "Query Execution Failed";
}