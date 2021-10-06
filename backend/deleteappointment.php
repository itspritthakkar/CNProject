<?php 
require 'security.php';

extract($_POST);

if(isset($_GET["ap_id"])){
    $ap_id=$_GET["ap_id"];
    $ci_query=$conn->prepare("DELETE FROM `appointments` WHERE `id` = :id");
    $ci_execution=$ci_query->execute([
        'id' => $ap_id
    ]);
    if($ci_execution){
        header("Location: ../dashboard.php");
        die();
    }
}
?>