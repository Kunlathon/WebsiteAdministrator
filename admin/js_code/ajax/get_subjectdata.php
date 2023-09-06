<?php
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

if(isset($_GET['q']) && $_GET['q']!=""){
    $q = urldecode($_GET["q"]);
    $q = real_escape_string($q);
     
    $pagesize = 50; // จำนวนรายการที่ต้องการแสดง
    $table_db="tb_subject"; // ตารางที่ต้องการค้นหา
    $find_field="subject_name"; // ฟิลที่ต้องการค้นหา
    $sql = "
    SELECT 
    subject_id,
    subject_name
    FROM $table_db WHERE LOCATE('$q', $find_field) > 0 
    ORDER BY LOCATE('$q', $find_field), $find_field LIMIT $pagesize
    ";
    $result = result_array($sql);

    if($result > 0){
        while($result as $row){
            // กำหนดฟิลด์ที่ต้องการส่ง่กลับ ปกติจะใช้ primary key ของ ตารางนั้น
            $id = $row["subject_id"]; // 
             
            // จัดการกับค่า ที่ต้องการแสดง 
            $name = trim($row["subject_name"]);// ตัดช่องวางหน้าหลัง
            $name = addslashes($name); // ป้องกันรายการที่ ' ไม่ให้แสดง error
            $name = htmlspecialchars($name); // ป้องกันอักขระพิเศษ
 
            // กำหนดรูปแบบข้อความที่แใดงใน li ลิสรายการตัวเลือก
            $display_name = preg_replace("/(" .$q. ")/i", "<b>$1</b>", $name);
            echo "
                <li onselect=\"this.setText('$name').setValue('$id')\">
                    $display_name
                </li>
            ";  
        }
    }
    //$mysqli->close();
}
?>