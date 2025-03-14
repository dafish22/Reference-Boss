<?php
include("api.php");

$apiObj = new API();

if($_GET["action" == 'outputData']){
    $data = $apiObj->outputData();
}
if($_GET["action" == 'addNew']){
    $data = $apiObj->addNewEntry();
}
echo json_encode($data);
?>