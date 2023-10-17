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

    if((isset($_POST["idcard"]))){
        $card_id=filter_input(INPUT_POST,'idcard');
    }else{
        if((isset($_GET["idcard"]))){
            $card_id=filter_input(INPUT_GET,'idcard');
        }else{
            $card_id="-";
        }
    }

    if((isset($_POST["student_id"]))){
        $id_student=filter_input(INPUT_POST,'student_id');
    }else{
        if((isset($_GET["student_id"]))){
            $id_student=filter_input(INPUT_GET,'student_id');
        }else{
            $id_student="-";
        }
    }
   


    $verify_sql="SELECT `user_idcard`,`user_student_no`
                 FROM `tb_student` 
                 WHERE `user_idcard`='{$card_id}' 
                 AND `user_student_no`='{$id_student}'";
	//echo "$verify_sql";
    $verify_rs=result_array($verify_sql);
    foreach($verify_rs as $key=>$verify_row){

        if(((is_array($verify_row) && count($verify_row)))){
            
            if((isset($verify_row["user_idcard"]))){
                $card_id=$verify_row["user_idcard"];
            }else{
                $card_id="-";
            }
            
            if((isset($verify_row["user_student_no"]))){
                $id_student=$verify_row["user_student_no"];
            }else{
                $id_student="-";
            }

            if(($card_id=="-" AND $id_student=="-")){
                echo "error_user";
            }elseif(($card_id=="-" OR $id_student=="-")){
                echo "error_user";
            }else{
                //session_start();
                $_SESSION["idcard"]=$card_id;
                $_SESSION["student_id"]=$id_student;

                $idcard=$_SESSION["idcard"];
                $student_id=$_SESSION["student_id"];
                echo "noerror";
            }

        }else{
            echo "error";
        }

    }

?>

