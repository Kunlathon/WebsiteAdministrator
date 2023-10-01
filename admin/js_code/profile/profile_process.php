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
    //Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com

    include("../../config/connect.ini.php");
    include("../../config/fnc.php");
    check_login('admin_username_lcm', 'login.php');

    $aid = check_session("admin_id_lcm");
    $update = date('Y-m-d H:i:s');
    $now_date = date('Y-m-d');
    $action = filter_input(INPUT_POST, 'action');

        if(($action=="edit")){
           
            $idcard = filter_input(INPUT_POST, 'idcard');
            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $address = filter_input(INPUT_POST, 'address');
            $tel = filter_input(INPUT_POST, 'tel');
            $email = filter_input(INPUT_POST, 'email');

            $data = array(
                "admin_idcard" => $idcard,
                "admin_name" => $firstname,
                "admin_lastname" => $lastname,
                "admin_address" => $address,
                "admin_tel" => $tel,
                "admin_email" => $email,
                "admin_update" => $now_date
            );

            update("tb_admin", $data, "admin_id = '{$aid}'");

        }elseif(($action=="edit_image")){

            $profile_name=date('YmdHis')."_profile";
      
            //$update_file_time = date("Y_m_d_H_i_s", strtotime($update));

            $picture_name = $_FILES["change_picture"]["name"];
            $picture_type = $_FILES["change_picture"]["type"];
            //new file Name
            $imgFile = explode('.', $picture_name);
            $fileType = $imgFile[count($imgFile) - 1];
            //new file Name end
            $picture_new_name = $profile_name.".".$fileType;
            $picture_tmp = $_FILES["change_picture"]["tmp_name"];
            $picture_size = $_FILES["change_picture"]["size"];
            move_uploaded_file($picture_tmp, '../../uploads/profile_picture/' . $picture_new_name);

            $data = array(
                "admin_img" => $picture_new_name,                  
                "admin_update" => $update
            );
            update("tb_admin", $data,"admin_id = {$aid}");

            exit("<script>window.location='../../?modules=profile';</script>");

        }else{}
    
?>