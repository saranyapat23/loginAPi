<?php

include("db.php");
$table = "CREATE TABLE users(id int(6) AUTO_INCREMENT COMMENT 'รหัสผู้ใช้งาน',
name varchar(100) COMMENT 'ชื่อ-นามสกุล',email varchar(100) COMMENT 'อีเมล',
username varchar(100) COMMENT 'ชื่อผู้ใช้', password varchar(100) COMMENT 'รหัสผ่าน',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT ';วันที่วมัครสมาชิก',
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่อัพเดต',
PRIMARY KEY (id) )";


    if ($conn->query($table) === TRUE) {
        echo "Successfully";
    }else{
        echo "ERROR: ". $conn->error;
    }

    $conn->close();
?>