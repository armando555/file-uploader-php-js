

<?php

$filesInput = $_FILES['file']['name'];
//print_r($filesInput);
$extension = pathinfo($filesInput, PATHINFO_EXTENSION);
$name = uniqid() . '____' . $filesInput;
$location = "uploads/" . $name;
if (($extension == 'jpeg' || $extension == 'jpg') && move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    $file = fopen('images.txt','a');
    fwrite($file,$name."\n");
    fclose($file);
    $jsonObj->success = true;
    $jsonObj->message = "The file had been uploaded";
    $jsonObj = json_encode($jsonObj);
    echo $jsonObj;
} else {
    $jsonObj->success = false;
    $jsonObj->message = "Error: The file had not been uploaded";
    $jsonObj = json_encode($jsonObj);
    echo $jsonObj;
}
