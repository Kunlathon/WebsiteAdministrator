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
?>
<?php

if (preg_match("/fnc.php/",$_SERVER['PHP_SELF'])) {
    Header("Location: ../index.php");
    die();
}

//session
session_start();

function check_session($key)
{
    return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
}

function del_session($key)
{
    unset($_SESSION[$key]);
}

function check_login($SS, $url)
{
    if (check_session($SS)) {

    } else {
        header('Location:' . $url);
    }
}

function _print_r($arr)
{
    echo '<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />';
    echo '<pre>';
    print_r($arr);
    echo '<pre>';
    exit;
}

function date_th($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

function date_en($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

function date_short_th($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
	$strYear = substr($strYear, 2);
    return "$strDay $strMonthThai $strYear";
}

function date_full_en($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthEng = $strMonthCut[$strMonth];
    //return "$strDay $strMonthThai $strYear";
	return "$strMonthEng $strDay, $strYear";
}

function date_full_th($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

function datetime_th($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear, $strHour:$strMinute น.";
}

function date_full_time_th($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear, $strHour:$strMinute น.";
}

function admin_status($num)
{
    $status = "ไม่มีตำแหน่ง";

    if ($num == "1") {
        $status = "ผู้ดูแลระบบ";
    } elseif ($num == "2") {
        $status = "วิชาการไทย";
    } elseif ($num == "3") {
        $status = "วิชาการต่างประเทศ";
    } elseif ($num == "4") {
        $status = "นายทะเบียน";
    } elseif ($num == "5") {
        $status = "เจ้าหน้าที่ทะเบียน";
    }

    return $status;
}

function teacher_type($num)
{
    $status = "ไม่มีตำแหน่ง";

    if ($num == "1") {
        $status = "School Registrar";
    } elseif ($num == "2") {
        $status = "Academic Affairs";
    } elseif ($num == "3") {
        $status = "School Director";
    } elseif ($num == "4") {
        $status = "Deputy  Director";
    } 

    return $status;
}

function teacher_status($num)
{
    $status = "ไม่มีตำแหน่ง";

    if ($num == "1") {
        $status = "ครูไทย";
    } elseif ($num == "2") {
        $status = "ครูต่างประเทศ";
    } elseif ($num == "3") {
        $status = "ฝ่ายวิชาการ";
    } elseif ($num == "4") {
        $status = "ผู้บริหาร";
    }

    return $status;
}

function teacher_gender($num)
{
    $status = "ไม่มีเพศ";

    if ($num == "1") {
        $status = "ชาย";
    } elseif ($num == "2") {
        $status = "หญิง";
    } 

    return $status;
}

function marital_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "โสด";
    } elseif ($num == "2") {
        $status = "สมรส";
    } elseif ($num == "3") {
        $status = "หม้าย";
    } elseif ($num == "4") {
        $status = "หย่า";
    } elseif ($num == "5") {
        $status = "แยกกันอยู่";
    } 

    return $status;
}

function student_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "ปกติ";
    } elseif ($num == "2") {
        $status = "ลาออก";
    } elseif ($num == "3") {
        $status = "จบการศึกษา";
    } elseif ($num == "4") {
        $status = "ลาพัก";
    }  

    return $status;
}

function term_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "<font color=blue>ปกติ</font>";
    } elseif ($num == "2") {
        $status = "<font color=red>สิ้นสุด</font>";
    }  elseif ($num == 0) {
        $status = "-";
    }

    return $status;
}

function score_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "<font color=blue>เปิด</font>";
    } elseif ($num == "0") {
        $status = "<font color=red>ปิด</font>";
    } 

    return $status;
}

function score2_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "<font color=#000000>ปิด</font>";
    } elseif ($num == "0") {
        $status = "<font color=#000000>เปิด</font>";
    } 

    return $status;
}

function class_status($num)
{
    $status = "0";

    if ($num == "1") {
        $status = "1";
    } elseif ($num == "2") {
        $status = "2";
    } elseif ($num == "3") {
        $status = "3";
    } elseif ($num == "4") {
        $status = "4";
    } elseif ($num == "5") {
        $status = "5";
    } elseif ($num == "6") {
        $status = "6";
    } elseif ($num == "7") {
        $status = "1";
    } elseif ($num == "8") {
        $status = "2";
    } elseif ($num == "9") {
        $status = "3";
    } elseif ($num == "10") {
        $status = "4";
    } elseif ($num == "11") {
        $status = "5";
    } elseif ($num == "12") {
        $status = "6";
    } 

    return $status;
}

function work_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "<font color=#000000>ทำงาน</font>";
    } elseif ($num == 0) {
        $status = "<font color=#000000>ออกแล้ว</font>";
    } 

    return $status;
}

function teacher_class_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "<font color=#000000>เป็น</font>";
    } elseif ($num == 0) {
        $status = "<font color=#000000>ไม่เป็น</font>";
    } 

    return $status;
}

function teacher_teach_status($num)
{
    $status = "ไม่มีระบุ";

    if ($num == "1") {
        $status = "<font color=#000000>เป็น</font>";
    } elseif ($num == 0) {
        $status = "<font color=#000000>ไม่เป็น</font>";
    } 

    return $status;
}
?>