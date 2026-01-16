<?php

    require_once __DIR__ . '/config.php';

    class API {
        // ลบ parameter ออก เพราะเราจะดึงจาก $_GET ข้างในเอง
        function Select() {
            
            // รับค่า id หรือถ้าไม่มีให้ใช้ default (เพื่อการทดสอบ)
            $id = isset($_GET['id']) ? $_GET['id'] : 41172008;

            $db = new Connect;
            
            // เตรียม SQL
            $stmt = $db->prepare("SELECT * FROM faculty WHERE id = :id");
            $stmt->execute(['id' => $id]);

            // ใช้ fetch ธรรมดา (ไม่ loop) เพราะเอาแค่คนเดียว
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // สร้าง array ก้อนเดียว (ไม่ต้องมี [] ต่อท้าย $user)
                $user = array(
                    'id' => $result['id'],
                    'title' => $result['title'],
                    'first_name' => $result['first_name_th'],
                    'last_name' => $result['last_name_th'],
                );
                return json_encode($user);
            } else {
                return json_encode(null); // ถ้าไม่เจอให้ส่ง null
            }
        }
    }

    $API = new API;

    // Headers
    header("Access-Control-Allow-Origin: http://localhost:8080"); 
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        exit(0);
    }

    // เรียกใช้ฟังก์ชันเปล่าๆ ไม่ต้องส่ง $id เข้าไป
    echo $API->Select();

?>