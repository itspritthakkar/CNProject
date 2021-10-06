<?php 

require 'security.php';
// print_r($_POST);
// exit;
extract($_POST);
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$ei_query=$conn->prepare("SELECT `email` from `patients` WHERE `email` = :email");
$ei_execution=$ei_query->execute([
    'email' => $email
]);
if(count($ei_query->fetchAll()) !== 0){echo json_encode(['status' => 'failed', 'type' => 'emailerror', 'msg' => 'Email ID already Exists']); exit;}

$pi_query=$conn->prepare("INSERT INTO `patients` (`name`, `email`, `password`) VALUES (:name, :email, :password)");
$pi_execution=$pi_query->execute([
    'name' => $name,
    'email' => $email,
    'password' => $password_hash
]);
// print_r($conn->errorInfo());
$patient_id = $conn->lastInsertId();

// echo $patient_id;
$ai_query=$conn->prepare("INSERT INTO `appointments` (`patient`, `doctor`, `date`, `time`) VALUES (:patient, :doctor, :date, :time)");
$ai_execution=$ai_query->execute([
    'patient' => $patient_id,
    'doctor' => $doctor,
    'date' => $date,
    'time' => $time
]);

echo json_encode(['status' => 'success', 'type' => '', 'msg' => 'Appointment booked successfully']);

if (!$ai_execution || !$pi_execution) {
    echo "Query Execution Failed";
}