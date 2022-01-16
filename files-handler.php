<?php

$filesInput = $_FILES['file']['name'];
//print_r($filesInput);
$extension = pathinfo($filesInput, PATHINFO_EXTENSION);
$location = "uploads/".uniqid().'____'.$filesInput;
if( ($extension == 'jpeg' || $extension == 'jpg') && move_uploaded_file($_FILES['file']['tmp_name'],$location) ){
    $jsonObj->success = true;
    $jsonObj->message = "The file had been uploaded";
    $jsonObj = json_encode($jsonObj);
    echo $jsonObj;
}else{
    $jsonObj->success = false;
    $jsonObj->message = "Error: The file had not been uploaded";
    $jsonObj = json_encode($jsonObj);
    echo $jsonObj;
}

