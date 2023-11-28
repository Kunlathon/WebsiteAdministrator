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
<form name="form_student_card" id="form_student_card" method="post" enctype="multipart/form-data" action="proccess/request_card_proccess.php">
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
                                                            <label>ชื่อ (Name) <font style="color: #FF0000;">*</font></label>
                                                            <div id="user_name-null">
                                                            <input name="user_name" id="user_name" type="text" class="form-control" required="required" placeholder="ชื่อ (Name)">
                                                            </div>
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
                                                            <label >นามสกุล (Surname) <font style="color: #FF0000;">*</font></label>
                                                            <div id="user_surname-null">
                                                            <input name="user_surname" id="user_surname" type="text" class="form-control"required="required" placeholder="นามสกุล (Surname)">
                                                            </div>
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
                                                            <label >รหัสประจำตัวประชาชน (ID Card / Passport No.) <font style="color: #FF0000;">*</font></label>
                                                            <div id="user_idcard-null">
                                                            <input name="user_idcard" id="user_idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน (ID Card / Passport No.)">
                                                            </div>
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
                                                            <label >รหัสประจำตัว (Student ID) <font style="color: #FF0000;">*</font></label>
                                                            <div id="user_student_id-null">
                                                            <input name="user_student_id" id="user_student_id" type="text" class="form-control" placeholder="รหัสประจำตัว (Student ID)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >รูปภาพ (Photo) <font style="color: red;">รูปถ่ายขนาด 1 นิ้วครึ่ง / Photo Size 1.5 inch(300X450 px. )</font></label>
                                                            <input name="img1" id="img1" type="file" class="form-control" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <label >Passport <font style="color: red;">*</font></label>
                                                        <input name="passport_img" id="passport_img" type="file" class="form-control" required="required">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label >Visa Page <font style="color: red;">*</font></label>
                                                        <input name="visa_page_img" id="visa_page_img" type="file" class="form-control" required="required">
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
                                                            <label >เบอร์โทรศัพท์ (Phone) </label>
                                                            <div id="user_tel-null">
                                                            <input name="user_tel" id="user_tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์ (Phone)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >E-mail </label>
                                                            <div id="user_email-null">
                                                            <input name="user_email" id="user_email" type="email" class="form-control" placeholder="E-mail" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-status-top bg-red"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;">
                                                <div>ที่อยู่ที่สามารถติดต่อได้ (Present Address)</div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >วัด/บ้านเลขที่ (House No.)</label>
                                                            <div id="address2-null">
                                                            <input name="address2" id="address2" type="text" class="form-control" placeholder="วัด/บ้านเลขที่ (House No.)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >หมู่ที่ (Section No.)</label>
                                                            <input name="moo2" id="moo2" type="text" class="form-control" placeholder="หมู่ที่ (Section No.)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ซอย (Avenue)</label>
                                                            <input name="soi2" id="soi2" type="text" class="form-control" placeholder="ซอย (Avenue)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ถนน (Road)</label>
                                                            <input name="road2" id="road2" type="text" class="form-control" placeholder="ถนน (Road)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ตำบล/แขวง (Sub-District)</label>
                                                            <div id="subdistrict2-null">
                                                            <input name="subdistrict2" id="subdistrict2" type="text" class="form-control" placeholder="ตำบล/แขวง (Sub-District)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >อำเภอ/เขต (District)</label>
                                                            <div id="district2-null">
                                                            <input name="district2" id="district2" type="text" class="form-control" placeholder="อำเภอ/เขต (District)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >จังหวัด (Province)</label>
                                                            <div id="province2-null">
                                                            <input name="province2" id="province2" type="text" class="form-control" placeholder="จังหวัด (Province)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >รหัสไปรษณีย์ (Post Code)</label>
                                                            <div id="citycode2-null">
                                                            <input name="citycode2" id="citycode2" type="text" class="form-control" placeholder="รหัสไปรษณีย์ (Post Code)" required="required">
                                                            </div>
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
            $course_Sql="SELECT * FROM `tb_course_detail` 
                         LEFT JOIN `tb_course` 
                         ON(`tb_course_detail`.`course_id`=`tb_course`.`course_id`) 
                         WHERE `tb_course_detail`.`course_detail_status`='2' 
                         AND `tb_course`.`course_status`='1' 
                         GROUP BY `tb_course_detail`.`course_id` 
                         ORDER BY `tb_course_detail`.`course_id` ASC;";
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
                                                                    <span class="form-check-label">ยอมรับเงื่อนไข (Agreement)</span>
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
                                                    <font id="but_form_register-null">
                                                    <button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>
                                                    </font>
                                                    <button type="button" onclick="location.href='?modules=request_card'" class="btn btn-danger">ยกเลิก</button>
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
        $("#but_backspace").on("click",function(){
            $backspace=$("#but_backspace").val();
                if($backspace==="backspace"){
                    document.location="?modules=request_card";
                }else{}
        })
    })
</script>

<script>
    $(document).ready(function(){
        $("#course").on('change',function(){
            var course_key=$("#course").val();
                if(course_key!==""){
                    $.post("proccess/request_card_data_course.php",{
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

<script>
    $(document).ready(function(){
        $("#check_register").on('change',function(){
            var user_name=$("#user_name").val();
            var user_surname=$("#user_surname").val();
            var user_idcard=$("#user_idcard").val();
            var course=$("#course").val();
            var user_student_id=$("#user_student_id").val();

            var img1=$("#user_student_id").val();
            var passport_img=$("#user_student_id").val();
            var visa_page_img=$("#user_student_id").val();

            //var tel=$("#tel").val();
            //var email=$("#email").val();
            var address2=$("#address2").val();
            var subdistrict2=$("#subdistrict2").val();
            var district2=$("#district2").val();
            var province2=$("#province2").val();
            var citycode2=$("#citycode2").val();

            var course_detail=$("#course_detail").val();

            var check_error="yes";
            var check_register=$("#check_register").val();

            var user_tel=$("#user_tel").val();
            var user_email=$("#user_email").val();

            var count_error=0;

              if(check_register==="1"){

                  /*if(tel===""){
                    document.getElementById("tel-null").innerHTML=
                      '<input name="tel" id="tel" type="text" class="form-control is-invalid" value="" placeholder="เบอร์โทรศัพท์ (Contact No.)">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("tel-null").innerHTML=
                      '<input name="tel" id="tel" type="text" class="form-control is-valid" value="'+tel+'" placeholder="เบอร์โทรศัพท์ (Contact No.)">';                   
                    count_error=count_error+0;
                  }*/

                  /*if(email===""){
                    document.getElementById("email-null").innerHTML=
                      '<input name="email" id="email" type="text" class="form-control is-invalid" value="" placeholder="E-mail">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("email-null").innerHTML=
                      '<input name="email" id="email" type="text" class="form-control is-valid" value="'+email+'" placeholder="E-mail">';
                    count_error=count_error+0;
                  }*/


                  if(user_tel===""){
                    document.getElementById("user_tel-null").innerHTML=
                    '<input name="user_tel" id="user_tel" type="text" class="form-control is-invalid" placeholder="เบอร์โทรศัพท์ (Phone)" value="'+user_tel+'" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("user_tel-null").innerHTML=
                    '<input name="user_tel" id="user_tel" type="text" class="form-control is-valid" placeholder="เบอร์โทรศัพท์ (Phone)" value="'+user_tel+'" required="required" >';
                    count_error=count_error+0;
                  }

                  if(user_email===""){
                    document.getElementById("user_email-null").innerHTML=
                    '<input name="user_email" id="user_email" type="email" class="form-control is-invalid" placeholder="E-mail" value="'+user_email+'" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("user_email-null").innerHTML=
                    '<input name="user_email" id="user_email" type="email" class="form-control is-valid" placeholder="E-mail" value="'+user_email+'" required="required">';
                    count_error=count_error+0;
                  }

                  if(user_student_id===""){
                    document.getElementById("user_student_id-null").innerHTML=
                    '<input name="user_student_id" id="user_student_id" type="text" class="form-control is-invalid" placeholder="รหัสประจำตัว (Student ID)" value="'+user_student_id+'" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("user_student_id-null").innerHTML=
                    '<input name="user_student_id" id="user_student_id" type="text" class="form-control is-valid" placeholder="รหัสประจำตัว (Student ID)" value="'+user_student_id+'" required="required">';
                    count_error=count_error+0;
                  }

                  if(address2===""){
                    document.getElementById("address2-null").innerHTML=
                      '<input name="address2" id="address2" type="text" class="form-control is-invalid" value="'+address2+'" placeholder="วัด/บ้านเลขที่ (House No.)" required="required" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("address2-null").innerHTML=
                      '<input name="address2" id="address2" type="text" class="form-control is-valid" value="'+address2+'" placeholder="วัด/บ้านเลขที่ (House No.)" required="required">';
                    count_error=count_error+0;
                  }

                  if(subdistrict2===""){
                    document.getElementById("subdistrict2-null").innerHTML=
                      '<input name="subdistrict2" id="subdistrict2" type="text" class="form-control is-invalid" value="'+subdistrict2+'" placeholder="ตำบล/แขวง (Sub-District)" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("subdistrict2-null").innerHTML=
                      '<input name="subdistrict2" id="subdistrict2" type="text" class="form-control is-valid" value="'+subdistrict2+'" placeholder="ตำบล/แขวง (Sub-District)" required="required">';
                    count_error=count_error+0;
                  }

                  if(district2===""){
                    document.getElementById("district2-null").innerHTML=
                      '<input name="district2" id="district2" type="text" class="form-control is-invalid" value="'+district2+'" placeholder="อำเภอ/เขต (District)" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("district2-null").innerHTML=
                      '<input name="district2" id="district2" type="text" class="form-control is-valid" value="'+district2+'" placeholder="อำเภอ/เขต (District)" required="required">';
                    count_error=count_error+0;
                  }

                  if(province2===""){
                    document.getElementById("province2-null").innerHTML=
                      '<input name="province2" id="province2" type="text" class="form-control is-invalid" value="'+province2+'" placeholder="จังหวัด (Province)" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("province2-null").innerHTML=
                      '<input name="province2" id="province2" type="text" class="form-control is-valid" value="'+province2+'" placeholder="จังหวัด (Province)" required="required">';
                    count_error=count_error+0;
                  }

                  if(citycode2===""){
                    document.getElementById("citycode2-null").innerHTML=
                      '<input name="citycode2" id="citycode2" type="text" class="form-control is-invalid" value="" placeholder="รหัสไปรษณีย์ (Post Code)" required="required">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("citycode2-null").innerHTML=
                      '<input name="citycode2" id="citycode2" type="text" class="form-control is-valid" value="'+citycode2+'" placeholder="รหัสไปรษณีย์ (Post Code)" required="required">';
                    count_error=count_error+0;
                  }

                  if(user_name===""){
                      document.getElementById("user_name-null").innerHTML=
                      '<input name="user_name" id="user_name" type="text" class="form-control is-invalid" value="" placeholder="ชื่อ (Name)" required="required">';
                      count_error=count_error+1;
                  }else{
                      document.getElementById("user_name-null").innerHTML=
                      '<input name="user_name" id="user_name" type="text" class="form-control is-valid mb-2" value="'+user_name+'" placeholder="ชื่อ (Name)" required="required">';
                      count_error=count_error+0;
                  }

                  if(user_surname===""){
                    document.getElementById("user_surname-null").innerHTML=
                      '<input name="user_surname" id="user_surname" type="text" class="form-control is-invalid" value="" placeholder="นามสกุล (Surname)" required="required">';
                      count_error=count_error+1;
                  }else{
                    document.getElementById("user_surname-null").innerHTML=
                      '<input name="user_surname" id="user_surname" type="text" class="form-control is-valid mb-2" value="'+user_surname+'" placeholder="นามสกุล (Surname)" required="required">';
                      count_error=count_error+0;
                  }

                  if(user_idcard===""){
                    document.getElementById("user_idcard-null").innerHTML=
                      '<input name="user_idcard" id="user_idcard" type="text" class="form-control is-invalid" value="'+user_idcard+'" placeholder="รหัสประจำตัวประชาชน" required="required">';
                      count_error=count_error+1;
                  }else{
                    document.getElementById("user_idcard-null").innerHTML=
                      '<input name="user_idcard" id="user_idcard" type="text" class="form-control is-valid mb-2" value="'+user_idcard+'" placeholder="รหัสประจำตัวประชาชน" required="required">';
                      count_error=count_error+0;
                  }

                  if(course===""){
                    document.getElementById("course-null").innerHTML='<font style="color: red;">กรุณาเลือก รายการนี้</font>';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("course-null").innerHTML='<font>&nbsp;</font>';
                    count_error=count_error+0;
                  }

                  if(course_detail===""){
                    document.getElementById("course_detail-null").innerHTML='<font style="color: red;">กรุณาเลือก รายการนี้</font>';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("course_detail-null").innerHTML='<font>&nbsp;</font>';
                    count_error=count_error+0;
                  }



                  if(img1===""){
                    count_error=count_error+1;
                  }else{
                    count_error=count_error+0;
                  }

                  if(passport_img===""){
                    count_error=count_error+1;
                  }else{
                    count_error=count_error+0;
                  }

                  if(visa_page_img===""){
                    count_error=count_error+1;
                  }else{
                    count_error=count_error+0;
                  }

                  if(count_error>=1){

                    document.getElementById("but_form_register-null").innerHTML=
                    '<font id="but_form_register-null">'
                    +'  <button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>'
                    +'</font>';

                  }else{

                    document.getElementById("but_form_register-null").innerHTML=
                    '<font id="but_form_register-null">'
                    +'  <button type="submit" name="but_form_register" id="but_form_register" class="btn btn-success">ลงทะเบียน</button>'
                    +'</font>';
                  }

              }else{

                    document.getElementById("but_form_register-null").innerHTML=
                    '<font id="but_form_register-null">'
                    +'  <button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>'
                    +'</font>';
              }

        })
    })

</script>
