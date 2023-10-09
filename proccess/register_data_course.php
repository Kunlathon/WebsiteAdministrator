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
                        
                        ?>
                <option value="<?php echo $course_row["course_detail_id"];?>"> <?php echo $course_row["course_name"]; ?></option> 
<?php               }else{}
                }   ?>
            </select> 
<?php    }else{} ?> 
                
