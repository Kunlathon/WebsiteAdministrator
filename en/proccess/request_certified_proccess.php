<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	

include("../../config/connect.ini.php");
include("../../config/fnc.php");

    $date=date("Y-m-d");
    $datetime=date("Y-m-d H:i:s");

    $user_name=filter_input(INPUT_POST,'user_name');
    $user_name_buddhist=filter_input(INPUT_POST,'user_name_buddhist');
    $user_surname=filter_input(INPUT_POST,'user_surname');



	$user_blood=filter_input(INPUT_POST,'user_blood');
    $user_department=filter_input(INPUT_POST,'user_department');
    $user_faculty=filter_input(INPUT_POST,'user_faculty');
    $user_study=filter_input(INPUT_POST,'user_study');
    $user_cash=filter_input(INPUT_POST,'user_cash');
    $user_idcard=filter_input(INPUT_POST,'user_idcard');
    $user_student_id=filter_input(INPUT_POST,'user_student_id');

    $user_certified=filter_input(INPUT_POST,'user_certified');


    $request_certifed_data = array(

        "user_name"=>$user_name,
        "user_name_buddhist"=>$user_name_buddhist,
        "user_surname"=>$user_surname,
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
        "user_certified"=>$user_certified,
        "user_status"=>'1'

    );
    insert("tb_certified", $request_certifed_data);

    echo "<meta charset='utf-8'/><script>alert('ส่งคำร้องสำเร็จ');location.href='../?modules=request_certified';</script>";

?>

