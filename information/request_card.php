<div class="page-body">
    <div class="container-xl">

        <div class="row row-cards">
            <div class="col-md-12">
                <div class="page-body">
                    <div class="container-xl">

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="row row-cards">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <div class="row g-5">
                                            <div class="row g-2 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">
                                                        <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">
                                                                    <div col-md-12>
                                                                        <div class="page-title" style="font-size: 20px;">คำร้องขอบัตรประจำตัวนิสิต (Request for Student Card)</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
<form name="form_student_card" id="form_student_card" method="post" action="proccess/request_card_proccess.php">
                                    <div class="card">
                                        <div class="card-status-top bg-green"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;" >ข้อมูลส่วนตัว (Personal Information) </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>ชื่อ (Name) *</label>
                                                            <input name="user_name" id="user_name" type="text" class="form-control" required="required" placeholder="ชื่อ (Name)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ฉายา (Buddhist Name / Middle Name)</label>
                                                            <input name="user_name_buddhist" id="user_name_buddhist" type="text" class="form-control" placeholder="ฉายา (Buddhist Name / Middle Name)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >นามสกุล (Surname)*</label>
                                                            <input name="user_surname" id="user_surname" type="text" class="form-control"required="required" placeholder="นามสกุล (Surname)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >วันเดือนปีเกิด (Date of Birth)</label>

                                                                <div class="row row-cards">
                                                                    <div class="col-md-3">
                                                                        <select name="register_day" id="register_day" class="form-select">
                                                                        <option value="">Day</option>
                                                                        <option value="01" >1</option>
                                                                        <option value="02" >2</option>
                                                                        <option value="03" >3</option>
                                                                        <option value="04" >4</option>
                                                                        <option value="05" >5</option>
                                                                        <option value="06" >6</option>
                                                                        <option value="07" >7</option>
                                                                        <option value="08" >8</option>
                                                                        <option value="09" >9</option>
                                                                        <option value="10" >10</option>
                                                                        <option value="11" >11</option>
                                                                        <option value="12" >12</option>
                                                                        <option value="13" >13</option>
                                                                        <option value="14" >14</option>
                                                                        <option value="15" >15</option>
                                                                        <option value="16" >16</option>
                                                                        <option value="17" >17</option>
                                                                        <option value="18" >18</option>
                                                                        <option value="19" >19</option>
                                                                        <option value="20" >20</option>
                                                                        <option value="21" >21</option>
                                                                        <option value="22" >22</option>
                                                                        <option value="23" >23</option>
                                                                        <option value="24" >24</option>
                                                                        <option value="25" >25</option>
                                                                        <option value="26" >26</option>
                                                                        <option value="27" >27</option>
                                                                        <option value="28" >28</option>
                                                                        <option value="29" >29</option>
                                                                        <option value="30" >30</option>
                                                                        <option value="31" >31</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <select name="register_month" id="register_month" class="form-select">
                                                                        <option value="">Month</option>
                                                                        <option value="01">January</option>
                                                                        <option value="02">February</option>
                                                                        <option value="03">March</option>
                                                                        <option value="04">April</option>
                                                                        <option value="05">May</option>
                                                                        <option value="06">June</option>
                                                                        <option value="07">July</option>
                                                                        <option value="08">August</option>
                                                                        <option value="09">September</option>
                                                                        <option value="10">October</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">December</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <select name="register_year" id="register_year" class="form-select">
                                                                        <option value="">Year</option>
																		<?php 
																			$nn_year1 = date('Y');
																			$nn_year2 = date('Y') - 80;

																		?>
																		<?php for ($yy = $nn_year1; $yy >= $nn_year2; $yy--) { ?>
																			 <option value="<?php echo $yy; ?>"><?php echo $yy; ?></option>
																		<?php } ?>
																		</select>
                                                                    </div>
                                                                </div>                                                              

                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >สัญชาติ (Nationality)</label>
                                                            <input name="" id="" type="text" class="form-control" placeholder="สัญชาติ (Nationality)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card / Passport No.)</label>
                                                            <input name="user_idcard" id="user_idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน (ID Card / Passport No.)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >หมู่โลหิต (Blood Type)</label>
                                                            <input name="user_blood" id="user_blood" type="text" class="form-control" placeholder="หมู่โลหิต (Blood Type)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัว (Student ID)</label>
                                                            <input name="user_student_id" id="user_student_id" type="text" class="form-control" placeholder="รหัสประจำตัว (Student ID)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!--<div class="form-group">
                                                            <label >ชั้นปีที่ (Studying in)</label>
                                                            <input name="user_study" id="user_study" type="text" class="form-control" placeholder="ชั้นปีที่ (Studying in)">
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >คณะ (Faculy of)</label>
                                                            <select name="user_faculty" id="user_faculty" class="form-select">
                                                                <option value="">คณะ (Faculy of)</option>
    <?php
            $faculty_Sql="SELECT `faculty_id`,`faculty_name`,`faculty_name_eng` FROM `tb_faculty` ORDER BY `faculty_id` ASC";
            $faculty_List=result_array($faculty_Sql);
            foreach($faculty_List as $key=>$faculty_Row){   ?>
                                                                <option value="<?php echo $faculty_Row["faculty_id"];?>"><?php echo $faculty_Row["faculty_name"];?>(<?php echo $faculty_Row["faculty_name_eng"];?>)</option>     
    <?php    } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >สาขาวิชา (Major In)</label>
                                                            <select name="user_department" id="user_department" class="form-select">
                                                                <option value="">สาขาวิชา (Major In)</option>
    <?php
            $department_Sql="SELECT `department_id`,`department_name`,`department_name_eng` FROM `tb_department` ORDER BY `department_id` ASC";
            $department_List=result_array($department_Sql);
            foreach($department_List as $key=>$department_Row){   ?>
                                                                <option value="<?php echo $department_Row["department_id"];?>"><?php echo $department_Row["department_name"];?>(<?php echo $department_Row["department_name_eng"];?>)</option>     
    <?php    } ?>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <!--<div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label><input type="radio" name="user_class" id="" value="1"> ปริญญาตรี (Bachelor's Degree)</label>
                                                        </div>                                                  
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label><input type="radio" name="user_class" id="" value="2"> ปริญญาโท (Master's Degree)</label>
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="checkbox">
                                                            <label><input type="radio" name="user_class" id="" value="3"> ปริญญาเอก (Ph.D.)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                   
                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >เบอร์โทรศัพท์ (Phone)</label>
                                                            <input name="" id="" type="text" class="form-control" placeholder="เบอร์โทรศัพท์ (Phone)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >E-mail</label>
                                                            <input name="" id="" type="email" class="form-control" placeholder="E-mail">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         





                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-status-top bg-blue"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;">
                                                <div>มีความประสงค์ขอมีบัตรประจำตัวนิสิตใหม่ เนื่องจาก</div>
                                                    <div>(Your reason to request for Student ID)</div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-check">
                                                                <input class="form-check-input" name="user_new_card" id="user_new_card" type="checkbox" value="1">
                                                                <span class="form-check-label">ขอมีบัตรครั้งแรก (Request for First Student ID Card)</span>
                                                            </label>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="alert alert-success" role="alert">
                                                        (ขอมีบัตรครั้งแรก / Request for First Student ID Card)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                            <label class="form-check">
                                                                <input class="form-check-input" name="user_lost_card" id="user_lost_card" type="checkbox" value="1">
                                                                <span class="form-check-label">บัตรหาย (Lost Card)</span>
                                                            </label>
         
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="alert alert-success" role="alert">
                                                        (ขอรับรองว่าทำหายจริง / I want to certify that you really lost it.)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                            <label class="form-check">
                                                                <input class="form-check-input" name="user_defective_card" id="user_defective_card" type="checkbox" value="1">
                                                                <span class="form-check-label">บัตรชำรุด (Defective Card)</span>
                                                            </label>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="alert alert-success" role="alert">
                                                       ( เตรียมเอกสารบัตรประจำตัวนิสิตติดมาด้วยแล้ว / Prepare your student identification document.)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                            <label class="form-check">
                                                                <input class="form-check-input" name="user_expired_card" id="user_expired_card" type="checkbox" value="1">
                                                                <span class="form-check-label">บัตรหมดอายุ (Expired Card)</span>
                                                            </label>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="alert alert-success" role="alert">
                                                        (เตรียมเอกสารบัตรประจำตัวนิสิตติดมาด้วยแล้ว / Prepare your student identification document.)
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                            <label class="form-check">
                                                                <input class="form-check-input" name="user_change_name" id="user_change_name" type="checkbox" value="1">
                                                                <span class="form-check-label"> เปลี่ยนชื่อ / นามสกุลใหม่ (Change Name/Surname)</span>
                                                            </label>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="alert alert-success" role="alert">
                                                        (เตรียมเอกสารหลักฐานพร้อมบัตรประจำตัวนิสิตติดมาด้วยแล้ว / Prepare evidence documents with your student ID card attached.)
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="card">
                                        <div class="card-status-top bg-blue"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;">
                                                <div>กรุณาเลือกช่วงเวลาการเรียนของคุณ / Choose your schedule perious</div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-12">
                                                        <label class="form-check">
                                                            <select  class="form-select" placeholder="เลือกเรียนหลักสูตร (Select your Course)" name="course" id="course" required="required">
                                                                <option value="">เลือกเรียนหลักสูตร (Select your Course)</option>
                                                                
    <?php
            $course_Sql="SELECT * 
                        FROM `tb_course_detail` 
                        LEFT JOIN `tb_course` 
                        ON(`tb_course_detail`.`course_id`=`tb_course`.`course_id`) 
                        WHERE `tb_course_detail`.`course_detail_status`='2'
                        AND  `tb_course`.`course_status`='1'
                        ORDER BY `tb_course_detail`.`course_detail_id` ASC;";
            $course_List=result_array($course_Sql);
            foreach($course_List as $key=>$course_Row){  
                
                
                if((isset($course_Row["course_id"]))){
                    $course_id=$course_Row["course_id"];
                    if(($course_key==$course_id)){
                        $selected_course='selected="selected"';
                    }else{
                        $selected_course=null;
                    }
                }else{
                    $selected_course=null;
                }             
                
                if((isset($course_Row["course_name_en"]))){
                    $course_name_en=$course_Row["course_name_en"];
                }else{
                    $course_name_en=null;
                }

                if((isset($course_Row["course_name"]))){
                    $course_name=$course_Row["course_name"];
                }else{
                    $course_name=null;
                }
                


                ?>
                                                                <option value="<?php echo $course_Row["course_detail_id"];?>"><?php echo $course_name." (".$course_name_en.")";?></option>     
    <?php    } ?>

                                                            </select>
                                                        </label>
                                                        <div id="course-null"></div>
                                                    </div>

                                                </div>

                                                <div class="row g-5">
                                                    <div class="col-md-12">
                                                        <label class="form-check">
                                                            <select  class="form-select" placeholder="เลือกช่วงเวลา (Select Course)" name="course_detail" id="course_detail" required="required">
                                                                <option value="">เลือกช่วงเวลา (Select Course)</option>   
                                                            </select>
                                                        </label>
                                                        <div id="course_detail-null"></div>
                                                    </div>
                                                </div>


                                            </div>

   

                                        </div>
                                    </div>






                                    <!--<div class="card">
                                        <div class="card-status-top bg-green"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;">
                                                <div>เลือกการชำระเงิน (Payment)</div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="card-body">

                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label><input type="radio" name="user_cash" id="" value="1"> เงินสด (Cash)</label>
                                                        </div>                                                  
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="checkbox">
                                                            <label><input type="radio" name="user_cash" id="" value="2"> โอนเงิน (Transfer)</label>
                                                        </div>                                                  
                                                    </div>
                                                </div>

                                                <div class="row g-5">
                                                    <div class="col-md-12" style="color: red;">
                                                    *** ข้าพเจ้ายินยอมให้ข้อมูลแก่ มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่
จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในการขอบัตรประจำตัวนิสิตเท่านั้น ***
*** I agree to provide information to Mahachulalongkornrajavidyalaya University Chiang Mai Campus.
For collect, use and disclose my personal information for the purpose of requesting for student card only. ***                                                 
                                                    </div>
                                                </div>

                                                <div class="row g-5">
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                                <label><input type="checkbox" name="test_chec" id="test_chec" value=""> ยอมรับเงื่อนไข (Accept Terms)</label>
                                                        </div> 
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="card">
                                        <div class="card-status-top bg-green"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;">
                                                <div></div>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="card-body">

                                                <div class="row g-5">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-warning" role="alert" style="color: red;">
                                                            
                                                    *** ข้าพเจ้ายินยอมให้ข้อมูลแก่ มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่
จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในการขอบัตรประจำตัวนิสิตเท่านั้น ***<br>
*** I agree to provide information to Mahachulalongkornrajavidyalaya University Chiang Mai Campus.
For collect, use and disclose my personal information for the purpose of requesting for student card only. ***                                                           
                                                         
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="col-md-6" >
                                                        <div class="form-group"></div>
                                                    </div>
                                                    <div class="col-md-6" >
                                                        <div class="form-group">
                                                            <div class="input-group mb-2">
                                                                <label class="form-check">
                                                                    <div id="check_register-null">
                                                                    <input class="form-check-input" name="check_register" id="check_register" type="checkbox" value="1" required="required">
                                                                    <span class="form-check-label">ยอมรับเงื่อนไข  (Agreement)</span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="card">
                                        <div class="mb-3">
                                            <div class="row g-5">                        
                                            <div class="col-md-12">
                                                <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                                <center>
                                                    <button type="submit" name="but_form_student_card" id="but_form_student_card" class="btn btn-success">ลงทะเบียน</button>
                                                    <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>
                                                </center>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
</form>
                                </div>
                            </div>
                        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="dist/uploaders/fileinput/plugins/purify.min.js"></script>
<script src="dist/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="dist/uploaders/fileinput/fileinput.min.js"></script>

<script>
    $(document).ready(function(){
        $("#course").on('change',function(){
            var course_key=$("#course").val();
                if(course_key!==""){
                    $.post("proccess/register_card_data_course.php",{
                        course_key:course_key
                    },function(run_course_js){
                        if(run_course_js!=""){
                            $("#course_detail").html(run_course_js);
                        }else{}
                    })
                }else{
                    document.getElementById("course_detail").innerHTML=
                    '<select  class="form-select" placeholder="เลือกช่วงเวลา (Select Course)" name="course_detail" id="course_detail" required="required">'
                    +'  <option value="">เลือกช่วงเวลา (Select Course)</option> '
                    +'</select>';
                }
        })
    })
</script>