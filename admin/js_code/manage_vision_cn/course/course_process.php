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

    if(($action=="create")){
        
        $count_error=0;

        if((isset($_POST["txtname"]))){
            $txtname=filter_input(INPUT_POST, 'txtname'); 
            $count_error=$count_error+0;
        }else{
            $txtname=null;
            $count_error=$count_error+1; 
        }
        
        if((isset($_POST["txtnameen"]))){
            $txtnameen=filter_input(INPUT_POST, 'txtnameen');
        }else{
            $txtnameen=null;
        }

        if((isset($_POST["txtnamecn"]))){
            $txtnamecn=filter_input(INPUT_POST, 'txtnamecn');
        }else{
            $txtnamecn=null; 
        }
        
       
        if(($count_error>=1)){
            echo "Error";
        }else{
            $sqlCou = "SELECT *,MAX(course_id) AS ID FROM tb_course";
            $tcrCou = row_array($sqlCou);

            $Cou_ID = $tcrCou['ID'] + 1;

                $data = array(
                    "course_id" => $Cou_ID ,
                    "course_name" => $txtname ,
                    "course_name_en" => $txtnameen ,
                    "course_name_cn" => $txtnamecn ,
                    "course_status" => 1
                    
                );

                insert("tb_course", $data);
                echo "NotError";
        }



    }elseif(($action=="delete")){

        $count_error=0;

        if((isset($_POST["course_id"]))){
            $course_id=filter_input(INPUT_POST, 'course_id');
            $count_error=$count_error+0;
        }else{
            $course_id=null;
            $count_error=$count_error+1;
        }

        if((isset($_POST["table"]))){
            $table=filter_input(INPUT_POST, 'table');
            $count_error=$count_error+0;
        }else{
            $table=null;
            $count_error=$count_error+1;
        }

        if((isset($_POST["ff"]))){
            $ff=filter_input(INPUT_POST, 'ff');
            $count_error=$count_error+0;
        }else{
            $ff=null;
            $count_error=$count_error+1;
        }

        if(($count_error>=1)){
            echo "Error";
        }else{
            delete($table,"{$ff} = '{$course_id}'");
            echo "NotError";
        }

        
    }else{

    }

?>