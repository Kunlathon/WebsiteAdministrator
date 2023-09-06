<?php
header("Content-type:text/html; charset=UTF-8");   
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 

include '../../config/connect.ini.php';
include '../../config/fnc.php';
check_login('admin_username_aba','login.php');

    $data = $_GET['data'];
    $val = $_GET['val'];


         if ($data=='subt_e') { 
              echo "<select name='subt' onChange=\"dochange_edit('subject_e', this.value)\">";
              echo "<option value='' disabled selected>เลือกหมวดรายวิชา</option>";
              $sql = "SELECT * FROM tb_subject_type ORDER BY subt_name ASC";
			  $sjt = result_array($sql);
              foreach ($sjt as $_sjt) {
                   echo "<option value='$_sjt[subt_id]' >$_sjt[subt_name]</option>" ;
              }
			  echo "</select>";
         } else if ($data=='subject_e') {
			  echo "<select name='subject'\">";
              echo "<option value='' disabled selected>เลือกรายวิชา</option>";                        
              $sql = "SELECT * FROM tb_subject WHERE subt_id= '$val' OR subt_id2= '$val' ORDER BY subject_name ASC";
			  $sj = result_array($sql);
              foreach ($sj as $_sj) {
                   echo "<option value='$_sj[subject_id]' >$_sj[subject_code] - $_sj[subject_name]</option>" ;
              }
			  echo "</select>";
         } 
?>			
