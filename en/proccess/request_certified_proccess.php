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

    if((isset($_POST["user_name"]))){
        $user_name=filter_input(INPUT_POST,'user_name');
    }else{
        $user_name="-";
    }

    if((isset($_POST["user_name_buddhist"]))){
        $user_name_buddhist=filter_input(INPUT_POST,'user_name_buddhist');
    }else{
        $user_name_buddhist="-";
    }

    if((isset($_POST["user_surname"]))){
        $user_surname=filter_input(INPUT_POST,'user_surname');
    }else{
        $user_surname="-";
    }

	$user_blood=filter_input(INPUT_POST,'user_blood');
    $user_department=filter_input(INPUT_POST,'user_department');
    $user_faculty=filter_input(INPUT_POST,'user_faculty');
    $user_study=filter_input(INPUT_POST,'user_study');
    $user_cash=filter_input(INPUT_POST,'user_cash');
    $user_idcard=filter_input(INPUT_POST,'user_idcard');
    $user_student_id=filter_input(INPUT_POST,'user_student_id');

    $user_certified=filter_input(INPUT_POST,'user_certified');

    if((isset($_POST["address2"]))){
        $user_address_no=filter_input(INPUT_POST,'address2');
    }else{
        $user_address_no="-";
    }

    if((isset($_POST["moo2"]))){
        $user_address_moo=filter_input(INPUT_POST,'moo2');
    }else{
        $user_address_moo="-";
    }

    if((isset($_POST["soi2"]))){
        $user_address_soi=filter_input(INPUT_POST,'soi2');
    }else{
        $user_address_soi="-";
    }

    if((isset($_POST["road2"]))){
        $user_address_road=filter_input(INPUT_POST,'road2');
    }else{
        $user_address_road="-";
    }

    if((isset($_POST["subdistrict2"]))){
        $user_address_subdistrict=filter_input(INPUT_POST,'subdistrict2');
    }else{
        $user_address_subdistrict="-";
    }

    if((isset($_POST["district2"]))){
        $user_address_district=filter_input(INPUT_POST,'district2');
    }else{
        $user_address_district="-";
    }

    if((isset($_POST["province2"]))){
        $user_address_province=filter_input(INPUT_POST,'province2');
    }else{
        $user_address_province="-";
    }

    if((isset($_POST["citycode2"]))){
        $user_address_citycode=filter_input(INPUT_POST,'citycode2');
    }else{
        $user_address_citycode="-";
    }

    if((isset($_POST["user_certified"]))){
        $user_certified=filter_input(INPUT_POST,'user_certified');
    }else{
        $user_certified="-";
    }

    if((isset($_POST["user_bank_account"]))){
        $user_bank_account=filter_input(INPUT_POST,'user_bank_account');
    }else{
        $user_bank_account="-";
    }



    if((isset($_POST["course_detail"]))){
        $course_detail=filter_input(INPUT_POST,'course_detail');
    }else{
        $course_detail="-";
    }

        if(($_FILES["img1"]["name"]!=null)){

            $register_nameNew=$Dateimg."_register_certified";
            $register_name = $_FILES["img1"]["name"];
            $register_type = $_FILES["img1"]["type"];

            //new file Name
            $imgFile = explode('.', $register_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $register_new_name = $register_nameNew.".".$fileType;
            $register_tmp = $_FILES["img1"]["tmp_name"];
            $register_size = $_FILES["img1"]["size"];

            move_uploaded_file($register_tmp, '../uploads/certified/' . $register_new_name);
            //up image end

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
                "user_address_no_now"=>$user_address_no,
                "user_address_moo_now"=>$user_address_moo,
                "user_address_soi_now"=>$user_address_soi,
                "user_address_road_now"=>$user_address_road,
                "user_address_subdistrict_now"=>$user_address_subdistrict,
                "user_address_district_now"=>$user_address_district,
                "user_address_province_now"=>$user_address_province,
                "user_address_citycode_now"=>$user_address_citycode,
                "user_bank_account"=>$user_bank_account,
                "course_detail_id"=>$course_detail,
                "user_pic"=>$register_new_name,
                "user_status"=>'1'
            );
            insert("tb_certified", $request_certifed_data);

            echo "<meta charset='utf-8'/><script>alert('ส่งคำร้องสำเร็จ');location.href='../?modules=request_certified';</script>"; 

        }else{

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
                "user_address_no_now"=>$user_address_no,
                "user_address_moo_now"=>$user_address_moo,
                "user_address_soi_now"=>$user_address_soi,
                "user_address_road_now"=>$user_address_road,
                "user_address_subdistrict_now"=>$user_address_subdistrict,
                "user_address_district_now"=>$user_address_district,
                "user_address_province_now"=>$user_address_province,
                "user_address_citycode_now"=>$user_address_citycode,
                "user_bank_account"=>$user_bank_account,
                "course_detail_id"=>$course_detail,
                "user_status"=>'1'
            );
            insert("tb_certified", $request_certifed_data);

            echo "<meta charset='utf-8'/><script>alert('ส่งคำร้องสำเร็จ');location.href='../?modules=request_certified';</script>"; 

        }



?>

