<?php

include("db.php");
$data = json_decode(file_get_contents("php://input"));

$name= $data->name;
$email = $data->email;
$username  = $data-> username;
$password = password_hash($data->password,PASSWORD_DEFAULT);

$sql = "INSERT INTO users(name, email, username,password,created_at,updated_at) VALUES ('$name', '$email', '$username','$password',NOW(),NOW())";
if($conn->query($sql) === TRUE){
    echo json_encode(["message" => "มีข้อผิดพลาดในการสมัครสมาชิก".$sql."<br>".$conn->error]);
}



$conn ->close();