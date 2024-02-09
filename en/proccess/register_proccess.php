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

    $Date=date("Y-m-d");
    $DateTime=date("Y-m-d H:i:s");
    $Dateimg=date("YmdHis");

    $title_t=filter_input(INPUT_POST,'title_t');
    $title_e=filter_input(INPUT_POST,'title_e');
    $fname=filter_input(INPUT_POST,'fname');
    $bname=filter_input(INPUT_POST,'bname');
    $sname=filter_input(INPUT_POST,'sname');

        if(($_POST["a_day"]!=null and $_POST["a_month"]!=null and $_POST["a_year"]!=null)){
            $a_day=filter_input(INPUT_POST,'a_day');
            $a_month=filter_input(INPUT_POST,'a_month');
            $a_year=filter_input(INPUT_POST,'a_year');
            $bdate=$a_year."-".$a_month."-".$a_day;
        }else{
            $bdate='';
        }

        if(($_POST["b_day"]!=null and $_POST["b_month"]!=null and $_POST["b_year"]!=null)){
            $b_day=filter_input(INPUT_POST,'a_year'); 
            $b_month=filter_input(INPUT_POST,'a_year'); 
            $b_year=filter_input(INPUT_POST,'a_year');
            $odate=$b_year."-".$b_month."-".$b_day;
        }else{
            $odate='';
        }
   
    $tel=filter_input(INPUT_POST,'tel');
    $email=filter_input(INPUT_POST,'email');
    $race=filter_input(INPUT_POST,'race');
    $nationality=filter_input(INPUT_POST,'nationality');
    $religion=filter_input(INPUT_POST,'religion');
    $idcard=filter_input(INPUT_POST,'idcard');
    $height=filter_input(INPUT_POST,'height');
    $weight=filter_input(INPUT_POST,'weight');

    //img1=filter_input(INPUT_POST,'sname');

    $fathername=filter_input(INPUT_POST,'fathername');
    $father_occupation=filter_input(INPUT_POST,'father_occupation');
    $father_idcard=filter_input(INPUT_POST,'father_idcard');
    $mother_idcard=filter_input(INPUT_POST,'mother_idcard');
    $mothername=filter_input(INPUT_POST,'mothername');
    $mother_occupation=filter_input(INPUT_POST,'mother_occupation');
    $address2=filter_input(INPUT_POST,'address2');
    $moo2=filter_input(INPUT_POST,'moo2');
    $soi2=filter_input(INPUT_POST,'soi2');
    $road2=filter_input(INPUT_POST,'road2');
    $subdistrict2=filter_input(INPUT_POST,'subdistrict2');
    $district2=filter_input(INPUT_POST,'district2');
    $province2=filter_input(INPUT_POST,'province2');
    $citycode2=filter_input(INPUT_POST,'citycode2');

    $course_detail_id=filter_input(INPUT_POST,'course_detail');



    /*if(($_FILES["promptpay"]["name"]!=null)){

        $promptpay_nameNew=$Dateimg."_register_promptpay";
        $promptpay_name = $_FILES["promptpay"]["name"];
        $promptpay_type = $_FILES["promptpay"]["type"];

        //new file Name
        $imgFile = explode('.', $promptpay_name);
        $fileType = $imgFile[count($imgFile) - 1];
        //new file Name end

        $promptpay_new_name = $promptpay_nameNew.".".$fileType;
        $promptpay_tmp = $_FILES["promptpay"]["tmp_name"];
        $promptpay_size = $_FILES["promptpay"]["size"];

        move_uploaded_file($promptpay_tmp, '../../uploads/payments/register_promptpay/' . $promptpay_new_name);
        //up image end

    }else{

        $promptpay_new_name="";

    }*/


    
        if(($_FILES["img1"]["name"]!=null)){

            $register_nameNew=$Dateimg."_register";
            $register_name = $_FILES["img1"]["name"];
            $register_type = $_FILES["img1"]["type"];

            //new file Name
            $imgFile = explode('.', $register_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end

            $register_new_name = $register_nameNew.".".$fileType;
            $register_tmp = $_FILES["img1"]["tmp_name"];
            $register_size = $_FILES["img1"]["size"];

            move_uploaded_file($register_tmp, '../../uploads/student/' . $register_new_name);
            //up image end
            
            $register_data = array(
                "user_idcard"=>$idcard,
                "user_pic"=>$register_new_name,
                "user_prefix_th"=>$title_t,
                "user_prefix_en"=>$title_e,
                "user_name"=>$fname,
                "user_name_buddhist"=>$bname,
                "user_surname"=>$sname,
                "user_birthday"=>$bdate,
                "user_ordination"=>$odate,
                "user_address_no"=>$address2,
                "user_address_moo"=>$moo2,
                "user_address_soi"=>$soi2,
                "user_address_road"=>$road2,
                "user_address_subdistrict"=>$subdistrict2,
                "user_address_district"=>$district2,
                "user_address_province"=>$province2,
                "user_address_citycode"=>$citycode2,
                "user_tel"=>$tel,
                "user_email"=>$email,
                "user_height"=>$height,
                "user_weight"=>$weight,
                "user_race"=>$race,
                "user_nationality"=>$nationality,
                "user_religion"=>$religion,
                "user_father_idcard"=>$father_idcard,
                "user_father_occupation"=>$father_occupation,
                "user_fathername"=>$fathername,
                "user_mother_idcard"=>$mother_idcard,
                "user_mothername"=>$mothername,
                "user_mother_occupation"=>$mother_occupation,
                "course_detail_id"=>$course_detail_id,
                "user_date"=>$Date,
                "user_update"=>$Date,
                "user_lastlogin"=>$DateTime,
                "user_status"=>'1'

            );
            insert("tb_register", $register_data);

            $student_data = array(
                "user_idcard"=>$idcard,
                "user_prefix_th"=>$title_t,
                "user_prefix_en"=>$title_e,
                "user_name"=>$fname,
                "user_name_buddhist"=>$bname,
                "user_surname"=>$sname,
                "user_birthday"=>$bdate,
                "user_ordination"=>$odate,
                "user_address_no"=>$address2,
                "user_address_moo"=>$moo2,
                "user_address_soi"=>$soi2,
                "user_address_road"=>$road2,
                "user_address_subdistrict"=>$subdistrict2,
                "user_address_district"=>$district2,
                "user_address_province"=>$province2,
                "user_address_citycode"=>$citycode2,
                "user_tel"=>$tel,
                "user_email"=>$email,
                "user_height"=>$height,
                "user_weight"=>$weight,
                "user_race"=>$race,
                "user_nationality"=>$nationality,
                "user_religion"=>$religion,
                "user_father_idcard"=>$father_idcard,
                "user_father_occupation"=>$father_occupation,
                "user_fathername"=>$fathername,
                "user_mother_idcard"=>$mother_idcard,
                "user_mothername"=>$mothername,
                "user_mother_occupation"=>$mother_occupation,
                "user_date"=>$Date,
                "user_update"=>$Date,
                "user_lastlogin"=>$DateTime,
                "user_status"=>'2'

            );
            insert("tb_student", $student_data);

            echo "<meta charset='utf-8'/><script>alert('ลงทะเบียนเรียนสำเร็จ');location.href='../?modules=announce_list';</script>";
        }else{

            $register_data = array(
                "user_idcard"=>$idcard,
                "user_prefix_th"=>$title_t,
                "user_prefix_en"=>$title_e,
                "user_name"=>$fname,
                "user_name_buddhist"=>$bname,
                "user_surname"=>$sname,
                "user_birthday"=>$bdate,
                "user_ordination"=>$odate,
                "user_address_no"=>$address2,
                "user_address_moo"=>$moo2,
                "user_address_soi"=>$soi2,
                "user_address_road"=>$road2,
                "user_address_subdistrict"=>$subdistrict2,
                "user_address_district"=>$district2,
                "user_address_province"=>$province2,
                "user_address_citycode"=>$citycode2,
                "user_tel"=>$tel,
                "user_email"=>$email,
                "user_height"=>$height,
                "user_weight"=>$weight,
                "user_race"=>$race,
                "user_nationality"=>$nationality,
                "user_religion"=>$religion,
                "user_father_idcard"=>$father_idcard,
                "user_father_occupation"=>$father_occupation,
                "user_fathername"=>$fathername,
                "user_mother_idcard"=>$mother_idcard,
                "user_mothername"=>$mothername,
                "user_mother_occupation"=>$mother_occupation,
                "course_detail_id"=>$course_detail_id,
                "user_date"=>$Date,
                "user_update"=>$Date,
                "user_lastlogin"=>$DateTime,
                "user_status"=>'1'

            );
            insert("tb_register", $register_data);

            $student_data = array(
                "user_idcard"=>$idcard,
                "user_prefix_th"=>$title_t,
                "user_prefix_en"=>$title_e,
                "user_name"=>$fname,
                "user_name_buddhist"=>$bname,
                "user_surname"=>$sname,
                "user_birthday"=>$bdate,
                "user_ordination"=>$odate,
                "user_address_no"=>$address2,
                "user_address_moo"=>$moo2,
                "user_address_soi"=>$soi2,
                "user_address_road"=>$road2,
                "user_address_subdistrict"=>$subdistrict2,
                "user_address_district"=>$district2,
                "user_address_province"=>$province2,
                "user_address_citycode"=>$citycode2,
                "user_tel"=>$tel,
                "user_email"=>$email,
                "user_height"=>$height,
                "user_weight"=>$weight,
                "user_race"=>$race,
                "user_nationality"=>$nationality,
                "user_religion"=>$religion,
                "user_father_idcard"=>$father_idcard,
                "user_father_occupation"=>$father_occupation,
                "user_fathername"=>$fathername,
                "user_mother_idcard"=>$mother_idcard,
                "user_mothername"=>$mothername,
                "user_mother_occupation"=>$mother_occupation,
                "user_date"=>$Date,
                "user_update"=>$Date,
                "user_lastlogin"=>$DateTime,
                "user_status"=>'2'

            );
            insert("tb_student", $student_data);

            echo "<meta charset='utf-8'/><script>alert('ลงทะเบียนเรียนสำเร็จ');location.href='../?modules=announce_list';</script>";
        }



?>


    
   

