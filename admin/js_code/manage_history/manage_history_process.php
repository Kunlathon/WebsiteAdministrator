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
    include("../../structure/link.php");

    $RunLink = new link_system();
    check_login('admin_username_lcm', 'login.php');
    $aid = check_session("admin_id_lcm");
    $update_date = date('Y-m-d H:i:s');
    $image_date=date("YmdHis");
    $action = filter_input(INPUT_POST, 'action');

    if(($action=="edit")){
        $information_topic=filter_input(INPUT_POST, 'information_topic');
        $information_detail=filter_input(INPUT_POST, 'information_detail');
        
        $Data = array(
            "information_topic"=>$information_topic,
            "information_detail"=>$information_detail,
            "post_date"=>$update_date,
            "update_date"=>$update_date,
            "information_status"=>'1'
        );
        update("tb_information", $Data, "information_id  = '1'"); 
        exit("<script>window.location='../../?modules=manage_history';</script>");
    }else{}