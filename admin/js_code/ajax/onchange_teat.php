<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_lcm','login.php');

    $data = $_GET['data'];
    $val = $_GET['val'];


         if ($data=='teat') { 
              echo "<select name='teat' onChange=\"dochange2('teacher1', this.value)\">";
              echo "<option value='' disabled selected>เลือกประเภทบุคลากร</option>";
              $sql = "SELECT * FROM tb_teacher_type WHERE teacher_type_id != '3' ORDER BY teacher_type_name ASC";
			  $ttt = result_array($sql);
              foreach ($ttt as $_ttt) {
                   echo "<option value='$_ttt[teacher_type_id]'>$_ttt[teacher_type_name]</option>" ;
              }
			  echo "</select>";
         } else if ($data=='teacher1') {
			  echo "<select name='teacher1'\">";
              echo "<option value='' disabled selected>เลือกอาจารย์ผู้สอน</option>";                        
              $sql = "SELECT * FROM tb_teacher WHERE teacher_type_id= '$val' ORDER BY teacher_name ASC";
			  $tt = result_array($sql);
              foreach ($tt as $_tt) {
                   echo "<option value='$_tt[teacher_id]' >$_tt[teacher_name]&nbsp;$_tt[teacher_surname]</option>" ;
              }
			  echo "</select>";

         } 
?>			
