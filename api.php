<?php
header('Content-Type: application/json');
$result = ["message"=>"Hello World","code"=>"success"];
echo json_encode($result);
?>