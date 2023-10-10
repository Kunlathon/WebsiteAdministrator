<?php
    include("../config/connect.ini.php");
    include("../config/fnc.php");

        if((isset($_POST["course_key"]))){
            $course_key=filter_input(INPUT_POST,'course_key'); ?>

            <select  class="form-select" placeholder="เลือกช่วงเวลา (Select Course)" name="course_detail" id="course_detail" required="required">
                <option value="">เลือกช่วงเวลา (Select Course)</option> 
<?php           $course_sql="SELECT * 
                             FROM `tb_course_detail` 
                             LEFT JOIN `tb_course` 
                             ON(`tb_course_detail`.`course_id`=`tb_course`.`course_id`) 
                             WHERE `tb_course_detail`.`course_id`='{$course_key}' 
                             ORDER BY `tb_course_detail`.`course_detail_id` ASC;";
                $course_rs=result_array($course_sql);
                foreach($course_rs as $key=>$course_row){ 
                    if((is_array($course_row) and count($course_row))){
                        
                        if((isset($course_row["course_detail_register_date_start"]))){
                            $cdrds_start=$course_row["course_detail_register_date_start"];
                            $cdds=date_en($course_row["course_detail_register_date_start"]);
                        }else{
                            $cdrds_start="0000-00-00";
                            $cdds=null;
                        }   
                        
                        if((isset($course_row["course_detail_register_date_finnish"]))){
                            $cdrds_finnish=$course_row["course_detail_register_date_finnish"];
                            $cddf=date_en($course_row["course_detail_register_date_finnish"]);
                        }else{
                            $cdrds_finnish="0000-00-00";
                            $cddf=null;
                        }

                        $datetime_start=date($cdrds_start);//Time Start
                        $datetime_start_cr=date("Y-m-d H:i:s");
                        $datatime_start_notrun=strtotime($datetime_start);
                        $datatime_start_run=strtotime($datetime_start_cr);
                        
                        if($datatime_start_run>=$datatime_start_notrun){
                            $print_runtime_start="ON";
                        }else{
                            $print_runtime_start="OFF";
                        }

                        $datetime_end=date($cdrds_finnish);//Time End
                        $datetime_end_cr=date("Y-m-d H:i:s");
                        $datatime_end_notrun=strtotime($datetime_end);
                        $datatime_end_run=strtotime($datetime_end_cr);
                        
                        if($datatime_end_run>=$datatime_end_notrun){
                            $print_runtime_end="OFF";
                        }else{
                            $print_runtime_end="ON";
                        }

                            if(($print_runtime_start=="ON")){
                                if(($print_runtime_end=="ON")){ ?>

                <option value="<?php echo $course_row["course_detail_id"];?>"> <?php echo $course_row["course_name"]." (".$course_row["course_name_en"].") ".$cdds." - ".$cddf;?> </option> 

    <?php                       }else{}
                            }else{}

                    }else{}
                }   ?>
            </select> 
<?php    }else{} ?> 
                
