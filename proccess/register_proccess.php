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
    $birth_day=filter_input(INPUT_POST,'birth_day');

    echo "it_error";
   

?>