<?php

require '../config/database.php';
function sanitize($conn,$post){
    foreach($post as $key => $value){
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
    }
}

sanitize($conn,$_POST);