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

?>

<?php

    $register_id=filter_input(INPUT_POST,'register_id');
    $register_idcard=filter_input(INPUT_POST,'register_idcard');
    $prefix_id=filter_input(INPUT_POST,'prefix_id');
    $register_name=filter_input(INPUT_POST,'register_name');
    $register_surname=filter_input(INPUT_POST,'register_surname');
//-------------------------------------------------------------------------------------
        if(($_POST["birth_day"]=="0000-00-00")){
            $birth_day="";
        }else{
            $birth_day=filter_input(INPUT_POST,'birth_day');
        }
//-------------------------------------------------------------------------------------
    $time_update=date("Y-m-d H:i:s");
    function fnc_count($register_idcard){
        $s = "SELECT * FROM `tb_register` WHERE `register_idcard`='{$register_idcard}'";
        $q = row_array($s);
    
        return is_array($q) ? "0" : "1";
    }

    $check = fnc_count($register_idcard);
    
    if(($check)){
        $register_data = array(
            "register_id" => $register_id,
            "register_idcard" =>$register_idcard,
            "prefix_id" =>$prefix_id,
            "register_name" =>$register_name,
            "register_surname" =>$register_surname,
            "register_name_eng" =>$register_name,	
            "register_surname_eng" =>$register_surname,
            "birth_day" =>$birth_day,
            "register_update" =>$time_update,	
            "register_status" =>'1'
        );
        insert("tb_register", $register_data);
        echo "no_error";
    }else{
        echo "it_error";
    }
    

    
   

?>