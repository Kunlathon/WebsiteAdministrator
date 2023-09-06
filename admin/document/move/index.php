<?php
/* 
Develop By Arnon Manomuang
พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
Tel 0814729965
โทร 0814729965
Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com
*/


if (preg_match("/index.php/",$_SERVER['PHP_SELF'])) {
    Header("Location: ../index.php");
    die();
}
?>