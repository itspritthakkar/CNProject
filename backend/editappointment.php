<?php 
require 'security.php';

extract($_POST);

$ai_query=$conn->prepare("UPDATE `cars` SET `doctor` = :doctor, `date` = :date, `time` = :time, WHERE `id` = :id");
$ai_execution=$ai_query->execute([
    'doctor' => $doctor,
    'date' => $date,
    'time' => $time,
    'id' => $ap_id
]);
if($ai_execution){
    echo "Appointment Edited Successfully";

    header("Location: ../dashboard.php");
    die();
}
?>