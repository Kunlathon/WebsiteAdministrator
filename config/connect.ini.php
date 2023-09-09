<?php 
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//โทร 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com
//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//โทร 0932670639
//Email: mpamese.pc2001@gmail.com

if (preg_match("/connect.ini.php/",$_SERVER['PHP_SELF'])) {
    Header("Location: ../index.php");
    die();
}

date_default_timezone_set("Asia/Bangkok");

function connect(){

	if(isset($_SERVER['REMOTE_ADDR'])) 

		$Server=$_SERVER['REMOTE_ADDR'];

		if (($Server=='127.0.0.1' or $Server=='::1')){
			//MySQL Connect
			$db_config = array(
				"host" => "localhost",  // กำหนด host
				"user" => "root", // กำหนดชื่อ user
				"pass" => "1234",   // กำหนดรหัสผ่าน
				"dbname" => "mcucm_languagecenter_db2023",  // กำหนดชื่อฐานข้อมูล
				"charset" => "utf8"  // กำหนด charset
			);

		} else {
			//MySQL Connect
			$db_config = array(
				"host" => "localhost",  // กำหนด host
				"user" => "phothitech_lc_usr", // กำหนดชื่อ user
				"pass" => "Phothitech2019",   // กำหนดรหัสผ่าน
				"dbname" => "phothitech_lc_db2023",  // กำหนดชื่อฐานข้อมูล
				//"dbname" => "abaacademic_db2023",  // กำหนดชื่อฐานข้อมูล
				"charset" => "utf8"  // กำหนด charset
			);

		}

    $mysqli = @new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["dbname"]);
    if ((mysqli_connect_error())) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        exit;
    }else{}

    if (!$mysqli->set_charset($db_config["charset"])) { // เปลี่ยน charset เป้น utf8 พร้อมตรวจสอบการเปลี่ยน
        printf("Error loading character set utf8: %sn", $mysqli->error);  // ถ้าเปลี่ยนไม่ได้
    }else{}

    return $mysqli;
}

function query($sql){
    $db = connect();

    if($db->query($sql)) { return true; }
    else { die("SQL Error: <br>".$sql."<br>".$db->error); return false; }
}

function result_array($sql){
    $data = array();
    $db = connect();

    $result = $db->query($sql) or die($db->error);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row;
    }

    return $data;
}

function row_array($sql){
    $data = array();
    $db = connect();

    $result = $db->query($sql) or die($db->error);
    $data = $result->fetch_array(MYSQLI_ASSOC);

    return $data;
}

// ฟังก์ชันสำหรับการ insert ข้อมูล
function insert($table, $data){
    $db = connect();

    $fields = "";
    $values = "";
    $i = 1;
    foreach ($data as $key => $val) {
        if ($i != 1) {
            $fields .= ", ";
            $values .= ", ";
        }
        $fields .= "$key";
        $values .= "'$val'";
        $i++;
    }
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    if ($db->query($sql)) {
        return true;
    } else {
        die("SQL Error: <br>" . $sql . "<br>" . $db->error);
        return false;
    }
}

class coding_sql{
    public $txt_sql;
    public $txt_error;
    function __construct($txt_sql){
        $db = connect();
        $this->txt_sql=$txt_sql;
        $sql=$this->txt_sql;
            if(($db->query($sql)===TRUE)){
                $txt_error="yes";
            }else{
                $txt_error="no";
            }
        $this->txt_error=$txt_error;
        $db->close();
    }function run_coding_sql(){
        return $this->txt_error;
    }
}


// ฟังก์ชันสำหรับการ update ข้อมูล
function update($table, $data, $where)
{
    $db = connect();

    $modifs = "";
    $i = 1;
    foreach ($data as $key => $val) {
        if ($i != 1) {
            $modifs .= ", ";
        }
        $modifs .= $key . " = '" . $val . "'";
        $i++;
    }
    $sql = ("UPDATE $table SET $modifs WHERE $where");
    if ($db->query($sql)) {
        return true;
    } else {
        die("SQL Error: <br>" . $sql . "<br>" . $db->error);
        return false;
    }
}

// ฟังก์ชันสำหรับการ delete ข้อมูล
function delete($table, $where)
{
    $db = connect();

    $sql = "DELETE FROM $table WHERE $where";
    if ($db->query($sql)) {
        return true;
    } else {
        die("SQL Error: <br>" . $sql . "<br>" . $db->error);
        return false;
    }
}

?>