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
                                                                                <th><div>เรียนหลักสูตร (Your Course)</div></th>
                                                                                <th><div>สถานะ (Status)</div></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
<?php
   $request_Sql="
   SELECT * FROM `tb_register` 
                       INNER JOIN `tb_course_detail` 
                       ON (`tb_register`.`course_detail_id`=`tb_course_detail`.`course_detail_id`)
                       JOIN `tb_course` ON(`tb_course_detail`.`course_id`=`tb_course`.`course_id`)
                       WHERE `tb_course_detail`.`course_detail_status`='1' AND
                       `tb_register`.`user_name` LIKE '%{$text_key}%' OR `tb_register`.`user_surname` LIKE '%{$text_key}%'";
   $request_Rs=result_array($request_Sql);
   $requset_count=0;
   foreach($request_Rs as $key=>$request_Row){ 
       $requset_count=$requset_count+1;
       $myname=$request_Row["user_name"]." ".$request_Row["user_surname"];

        if((isset($request_Row["course_name"]))){
            $course_name=$request_Row["course_name"];
        }else{
            $course_name=null;
        }

        if((isset($request_Row["course_name_en"]))){
            $course_name_en=$request_Row["course_name_en"];
        }else{
            $course_name_en=null;
        }

        if((isset($request_Row["course_detail_date_start"]))){
            $cdds=date_en($request_Row["course_detail_date_start"]);
        }else{
            $cdds=null;
        }

        if((isset($request_Row["course_detail_date_finnish"]))){
            $cddf=date_en($request_Row["course_detail_date_finnish"]);
        }else{
            $cddf=null;
        }


       ?>

                                                                            <tr>
                                                                                <td><div><?php echo $requset_count;?></div></td>

                                                                                <td><div><?php echo $myname;?></div></td>
                                                                                <td style="width: 50%">

                                                                                    <div><span ><?php echo $course_name;?></span></div>
                                                                                    <div><span ><?php echo $course_name_en;?></span></div>
                                                                                    <div><span ><?php echo $cdds." - ".$cddf;?></span></div>
                                                                                
                                                                                </td>

                                                                                <td>
            <?php
                    if(($request_Row["user_status"]=="1")){    ?>
                                                                                    <span class="badge bg-orange-lt">กำลังดำเนินการ / In Progress</span>
            <?php    }elseif(($request_Row["user_status"]=="2")){  ?>
                                                                                    <span class="badge bg-teal-lt" >ดำเนินเรียบร้อย / Completed</span>
            <?php    }else{}    ?>
                                                                                    
                                                                                </td>
                                                                            </tr>
<?php   } ?>


                                                                   </tbody>
                                                           </table>

                                                         </div>