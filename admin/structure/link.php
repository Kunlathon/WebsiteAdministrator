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
//Email: mpamese.pc2001@gmail.com

if(preg_match("/link.php/",$_SERVER['PHP_SELF'])) {
    Header("Location: ../index.php");
    die();
}else{

    class link_web{
        public $link_txt;
        function __construct(){
            switch($_SERVER['REMOTE_ADDR']){
                case "127.0.0.1":
                    // $link_txt="http://127.0.0.1/sys-abaacademic-2023";
                    $link_txt="http://languagecenter.test:8010/mcucm-languagecenter-2023";
                    break;
                case "::1":
                    // $link_txt="http://127.0.0.1/sys-abaacademic-2023";
                    $link_txt="http://languagecenter.test:8010/mcucm-languagecenter-2023";
                    break;
                case "localhost":
                    // $link_txt="http://127.0.0.1/sys-abaacademic-2023";
                    $link_txt="http://languagecenter.test:8010/mcucm-languagecenter-2023";
                    break;
                default:
                    $link_txt="https://www.phothitech.net/languagecenter";
            }
            $this->link_txt=$link_txt;
        }function Call_link_web(){
           return $this->link_txt;
        }
    }

    class link_system{
        public $link_txt;
        function __construct(){
            switch($_SERVER['REMOTE_ADDR']){
                case "127.0.0.1":
                    // $link_txt="http://127.0.0.1/sys-abaacademic-2023/admin/";
                    $link_txt="http://languagecenter.test:8010/mcucm-languagecenter-2023/admin";
                    break;
                case "::1":
                    // $link_txt="http://127.0.0.1/sys-abaacademic-2023/admin/";
                    $link_txt="http://languagecenter.test:8010/mcucm-languagecenter-2023/admin";
                    break;
                case "localhost":
                    // $link_txt="http://127.0.0.1/sys-abaacademic-2023/admin/";
                    $link_txt="http://languagecenter.test:8010/mcucm-languagecenter-2023/admin";
                    break;
                default:
                    $link_txt="https://www.phothitech.net/languagecenter/admin";
            }
            $this->link_txt=$link_txt;
        }function Call_Link_System(){
           return $this->link_txt;
        }
    }    
}
?>

