Backend - config.php
สร้างไฟล์ config.php เพิ่มด้วย

----- โค้ด -----
<?php

    class Connect extends PDO {
        public function __construct() {
            parent::__construct("mysql:host=localhost;dbname=ชื่อดาต้าเบสที่ตัวเองตั้ง","root","");
            array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
    }

?>


Frontend - .env
สร้างไฟล์ .env ตรงที่ไฟล์ระดับเดียวกันกับพวก package.json

----- โค้ด -----

VITE_API_BASE_URL = http://localhost/ชื่อโฟลเดอร์ไฟล์ backend ของตัวเอง/api.php

ลองก๊อป http ไปวางใน chrome ดู ถ้าเชื่อมได้จะขึ้นแบบนี้
{"id":"41172008","title":"\u0e19\u0e32\u0e07","first_name":"\u0e08\u0e23\u0e31\u0e2a\u0e14\u0e32\u0e27","last_name":"\u0e40\u0e23\u0e42\u0e19\u0e25\u0e14\u0e4c"}
