<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	

include("../config/connect.ini.php");
include("../config/fnc.php");

    $date=date("Y-m-d");
    $datetime=date("Y-m-d H:i:s");

    $user_name=filter_input(INPUT_POST,'user_name');
    $user_name_buddhist=filter_input(INPUT_POST,'user_name_buddhist');
    $user_surname=filter_input(INPUT_POST,'user_surname');

    $register_day =filter_input(INPUT_POST,'register_day');
    $register_month=filter_input(INPUT_POST,'register_month');
    $register_year=filter_input(INPUT_POST,'register_year');

    $user_birthday=$register_year."-".$register_month."-".$register_day;

	$user_blood=filter_input(INPUT_POST,'user_blood');
    $user_department=filter_input(INPUT_POST,'user_department');
    $user_faculty=filter_input(INPUT_POST,'user_faculty');
    $user_study=filter_input(INPUT_POST,'user_study');
    $user_cash=filter_input(INPUT_POST,'user_cash');
    $user_idcard=filter_input(INPUT_POST,'user_idcard');
    $user_student_id=filter_input(INPUT_POST,'user_student_id');

    $user_new_card=filter_input(INPUT_POST,'user_new_card');
    $user_lost_card=filter_input(INPUT_POST,'user_lost_card');
    $user_defective_card=filter_input(INPUT_POST,'user_defective_card');
    $user_expired_card=filter_input(INPUT_POST,'user_expired_card');
    $user_change_name=filter_input(INPUT_POST,'user_change_name');
    $course_detail_id=filter_input(INPUT_POST,'course_detail');

    $student_card_data = array(

        "user_name"=>$user_name,
        "user_name_buddhist"=>$user_name_buddhist,
        "user_surname"=>$user_surname,
        "user_birthday"=>$user_birthday,
        "user_blood"=>$user_blood,
        "user_department"=>$user_department,
        "user_faculty"=>$user_faculty,
        "user_study"=>$user_study,
        "user_cash"=>$user_cash,
        "user_idcard"=>$user_idcard,
        "user_student_id"=>$user_student_id,
        "user_date"=>$date,
        "user_update"=>$date,
        "user_lastlogin"=>$datetime,
        "user_new_card"=>$user_new_card,
        "user_lost_card"=>$user_lost_card,
        "user_defective_card"=>$user_defective_card,
        "user_expired_card"=>$user_expired_card,
        "user_change_name"=>$user_change_name,
        "course_detail_id"=>$course_detail_id,
        "user_status"=>'1'

    );
    insert("tb_student_card", $student_card_data);

    echo "<meta charset='utf-8'/><script>alert('ส่งคำร้องสำเร็จ');location.href='../?modules=request_card_list';</script>";

?>

