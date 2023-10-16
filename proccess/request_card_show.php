<?php

    include("../config/connect.ini.php");
    include("../config/fnc.php");

    $Date=date("Y-m-d");
    $DateTime=date("Y-m-d H:i:s");
    $Dateimg=date("YmdHis");

    $text_key=filter_input(INPUT_POST,'text_key');


 ?>                                                        
                                                         <div class="table-responsive">
                                                               
                                                               <table class="table table-bordered">
                                                                   <thead>
                                                                       <tr>
                                                                           <th><div>ลำดับ (No.)</div></th>
                                                                           <th><div>รายชื่อ (Name-Surname)</div></th>
                                                                           <th><div>สถานะ (Status)</div></th>
                                                                       </tr>
                                                                   </thead>
                                                                   <tbody>
<?php
   $request_Sql="SELECT * 
                FROM `tb_course_detail` 
                LEFT JOIN `tb_course` 
                ON(`tb_course_detail`.`course_id`=`tb_course`.`course_id`) 
                join `tb_student_card` ON(`tb_course_detail`.`course_detail_id`=`tb_student_card`.`course_detail_id`)
                WHERE `tb_course_detail`.`course_detail_status`='2'
                AND  `tb_course`.`course_status`='1'
                AND `tb_student_card`.`user_name` LIKE '%{$text_key}%' OR `tb_student_card`.`user_surname` LIKE '%{$text_key}%' 
                ORDER BY `tb_course_detail`.`course_detail_id` ASC;";
   $request_Rs=result_array($request_Sql);
   $requset_count=0;
   foreach($request_Rs as $key=>$request_Row){ 
       $requset_count=$requset_count+1;
       $myname=$request_Row["user_name"]." ".$request_Row["user_surname"];

      


       ?>

                                                                       <tr>
                                                                           <td><div><?php echo $requset_count;?></div></td>
                                                                           <td><div><?php echo $myname;?></div></td>
                                                                           <td>
       <?php
               if(($request_Row["user_status"]=="1")){    ?>
                                                                               <span class="badge bg-orange-lt">กำลังดำเนินการ</span>
       <?php    }elseif(($request_Row["user_status"]=="2")){  ?>
                                                                               <span class="badge bg-teal-lt" >ดำเนินเรียบร้อย</span>
       <?php    }else{}    ?>
                                                                               
                                                                           </td>
                                                                       </tr>
<?php   } ?>


                                                                   </tbody>
                                                           </table>

                                                         </div>