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

    session_destroy();
    echo "<meta charset='utf-8'/><script>alert('ออกจากระบบสำเร็จ');location.href='../?modules=verify_registration';</script>";
?>