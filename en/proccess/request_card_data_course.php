<?php
    include("../../config/connect.ini.php");
    include("../../config/fnc.php");

       if((isset($_POST["course_key"]))){
            $course_key=filter_input(INPUT_POST,'course_key'); ?>

<select  class="form-select" placeholder="เลือกช่วงเวลา (Select Course)" name="course_detail" id="course_detail" required="required">
                <option value="">เลือกช่วงเวลา (Select Course)</option> 
<?php           $course_sql="SELECT * 
                             FROM `tb_course_detail`                              
                             WHERE  `course_id`='{$course_key}'
                             AND `course_detail_status`='2'
                             ORDER BY `course_detail_id` ASC;";
                $course_rs=result_array($course_sql);
                foreach($course_rs as $key=>$course_row){ 
                    if((is_array($course_row) and count($course_row))){
                        
                        if((isset($course_row["course_detail_date_start"]))){
                            $cdrds_start=date($course_row["course_detail_date_start"]);
                        }else{
                            $cdrds_start="0000-00-00";
                        }   
                        
                        if((isset($course_row["course_detail_date_finnish"]))){
                            $cdrds_finnish=date($course_row["course_detail_date_finnish"]);
                           
                        }else{
                            $cdrds_finnish="0000-00-00";
                            $cddf=null;
                        }


                        /*$datetime_start=date($cdrds_start);//Time Start
                        $datetime_start_cr=date("Y-m-d H:i:s");
                        $datatime_start_notrun=strtotime($datetime_start);
                        $datatime_start_run=strtotime($datetime_start_cr);
                        
                        if($datatime_start_run>=$datatime_start_notrun){
                            $print_runtime_start="ON";
                        }else{
                            $print_runtime_start="OFF";
                        }*/

                        $print_runtime_start="ON";

                        $datetime_end=date($cdrds_finnish);//Time End
                        $datetime_end_cr=date("Y-m-d H:i:s");
                        $datatime_end_notrun=strtotime($datetime_end);
                        $datatime_end_run=strtotime($datetime_end_cr);
                        
                        if($datatime_end_run>=$datatime_end_notrun){
                            $print_runtime_end="OFF";
                        }else{
                            $print_runtime_end="ON";
                        }

                        if((isset($course_row["course_detail_date_start"]))){
                            $date_course_start=date_en($course_row["course_detail_date_start"]);
                        }else{
                            $date_course_start=$course_row="0000-00-00";
                        }

                        if((isset($course_row["course_detail_date_finnish"]))){
                            $date_course_finnish=date_en($course_row["course_detail_date_finnish"]);
                        }else{
                            $date_course_finnish="0000-00-00";
                        }


                            if(($print_runtime_start=="ON")){
                                if(($print_runtime_end=="ON")){ ?>

                <option value="<?php echo $course_row["course_detail_id"];?>"> <?php echo $date_course_start." - ".$date_course_finnish;?> </option> 

    <?php                       }else{
                                    $course_detail_key=$course_row["course_detail_id"];
                                    $up_time_end_sql=array(
                                        "course_detail_status"=>'0'
                                    );
                                    update("tb_course_detail", $up_time_end_sql ,"course_detail_id = '$course_detail_key'");
                                }
                            }else{}

                    }else{}
                }   ?>
            </select> 

<?php    }else{} ?> 