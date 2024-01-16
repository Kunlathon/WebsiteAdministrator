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
    $Dateimg=date("YmdHis");

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

        if((isset($_POST["user_tel"]))){
            $user_tel=filter_input(INPUT_POST,'user_tel');
        }else{
            $user_tel="-";
        }

        if((isset($_POST["user_email"]))){
            $user_email=filter_input(INPUT_POST,'user_email');
        }else{
            $user_email="-";
        }

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


        $register_nameNew=$Dateimg."_register_card";
        $register_name = $_FILES["img1"]["name"];
        $register_type = $_FILES["img1"]["type"];

        //new file Name
        $imgFile = explode('.', $register_name);
        $fileType = $imgFile[count($imgFile) - 1];
        //new file Name end

        $register_new_name = $register_nameNew.".".$fileType;
        $register_tmp = $_FILES["img1"]["tmp_name"];
        $register_size = $_FILES["img1"]["size"];

        move_uploaded_file($register_tmp, '../uploads/card/' . $register_new_name);


        $passport_imgNew=$Dateimg."_passport_card";
        $passport_img = $_FILES["passport_img"]["name"];
        $passport_type = $_FILES["passport_img"]["type"];

        //new file Name
        $imgFile = explode('.', $passport_img);
        $fileType = $imgFile[count($imgFile) - 1];
        //new file Name end

        $passport_new_name = $passport_imgNew.".".$fileType;
        $passport_tmp = $_FILES["passport_img"]["tmp_name"];
        $passport_size = $_FILES["passport_img"]["size"];

        move_uploaded_file($passport_tmp, '../uploads/passport_card/' . $passport_new_name);

        $visa_nameNew=$Dateimg."_visa_card";
        $visa_name = $_FILES["visa_page_img"]["name"];
        $visa_type = $_FILES["visa_page_img"]["type"];

        //new file Name
        $imgFile = explode('.', $visa_name);
        $fileType = $imgFile[count($imgFile) - 1];
        //new file Name end

        $visa_new_name = $visa_nameNew.".".$fileType;
        $visa_tmp = $_FILES["visa_page_img"]["tmp_name"];
        $visa_size = $_FILES["visa_page_img"]["size"];

        move_uploaded_file($visa_tmp, '../uploads/visa_card/' . $visa_new_name);


        if(($_FILES["promptpay"]["name"]!=null)){

            $promptpay_nameNew=$Dateimg."_card_promptpay";
            $promptpay_name = $_FILES["promptpay"]["name"];
            $promptpay_type = $_FILES["promptpay"]["type"];

            //new file Name
            $imgFile = explode('.', $promptpay_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $promptpay_new_name = $promptpay_nameNew.".".$fileType;
            $promptpay_tmp = $_FILES["promptpay"]["tmp_name"];
            $promptpay_size = $_FILES["promptpay"]["size"];

            move_uploaded_file($promptpay_tmp, '../uploads/payments/card_promptpay/' . $promptpay_new_name);
            //up image end

        }else{

            $promptpay_new_name="";

        }




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
            "PromptPay"=>$promptpay_new_name,
            "course_detail_id"=>$course_detail_id,
            "user_address_no"=>$user_address_no,
            "user_address_moo"=>$user_address_moo,
            "user_address_soi"=>$user_address_soi,
            "user_address_road"=>$user_address_road,
            "user_address_subdistrict"=>$user_address_subdistrict,
            "user_address_district"=>$user_address_district,
            "user_address_province"=>$user_address_province,
            "user_address_citycode"=>$user_address_citycode,
            "user_pic"=>$register_new_name,
            "user_pic_passport"=>$passport_new_name,
            "user_pic_visa"=>$visa_new_name,
            "user_tel"=>$user_tel,
            "user_email"=>$user_email,
            "user_status"=>'1'
        );
        insert("tb_student_card", $student_card_data);

        echo "<meta charset='utf-8'/><script>alert('ส่งคำร้องสำเร็จ');location.href='../?modules=request_card_list';</script>"; 


        /*if(($_FILES["img1"]["name"]!=null)){

            $register_nameNew=$Dateimg."_register_card";
            $register_name = $_FILES["img1"]["name"];
            $register_type = $_FILES["img1"]["type"];

            //new file Name
            $imgFile = explode('.', $register_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $register_new_name = $register_nameNew.".".$fileType;
            $register_tmp = $_FILES["img1"]["tmp_name"];
            $register_size = $_FILES["img1"]["size"];

            move_uploaded_file($register_tmp, '../uploads/card/' . $register_new_name);
            //up image end

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
                "user_address_no"=>$user_address_no,
                "user_address_moo"=>$user_address_moo,
                "user_address_soi"=>$user_address_soi,
                "user_address_road"=>$user_address_road,
                "user_address_subdistrict"=>$user_address_subdistrict,
                "user_address_district"=>$user_address_district,
                "user_address_province"=>$user_address_province,
                "user_address_citycode"=>$user_address_citycode,
                "user_pic"=>$register_new_name,
                "user_status"=>'1'
            );
            insert("tb_student_card", $student_card_data);

            echo "<meta charset='utf-8'/><script>alert('ส่งคำร้องสำเร็จ');location.href='../?modules=request_card_list';</script>";            

        }else{

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
                "user_address_no"=>$user_address_no,
                "user_address_moo"=>$user_address_moo,
                "user_address_soi"=>$user_address_soi,
                "user_address_road"=>$user_address_road,
                "user_address_subdistrict"=>$user_address_subdistrict,
                "user_address_district"=>$user_address_district,
                "user_address_province"=>$user_address_province,
                "user_address_citycode"=>$user_address_citycode,
                "user_status"=>'1'
            );
            insert("tb_student_card", $student_card_data);

            echo "<meta charset='utf-8'/><script>alert('ส่งคำร้องสำเร็จ');location.href='../?modules=request_card_list';</script>"; 

        }*/



?>

