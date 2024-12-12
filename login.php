<?php
    include("db.php");
    $data = json_decode(file_get_contents("php://input"));
    $username = $data -> username;
    $password = $data -> password;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn ->prepare ($sql);
    $stmt->bind_param("s",$username);
    $stmt -> execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            echo json_encode([
                "message" => "เข้าสู่ระบบสำเร็จ",
                "success" => true,
                "token" => bin2hex(random_bytes(16))
            ]);
        } else {
            echo json_encode([
                "message" => "รหัสผ่านไม่ถูกต้อง",
                "success" => false
            ]);
        }
    } else {
        echo json_encode([
            "message" => "ไม่พบผู้ใช้",
            "success" => false
        ]);
    }

$conn ->close();

