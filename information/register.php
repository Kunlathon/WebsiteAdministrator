<?php
    if((isset($_GET["id"]))){
        $course_key=filter_input(INPUT_GET,'id');
    }else{
        if((isset($_POST["id"]))){
            $course_key=filter_input(INPUT_POST,'id');
        }else{
            $course_key=null;
        }
    }
?>

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
                                                                        <div class="page-title" style="font-size: 20px;">ลงทะเบียนเรียนออนไลน์ (Online Enrollment)</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
<form name="form_student_card" id="form_student_card" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="proccess/register_proccess.php">
                                    <div class="card">
                                        <div class="card-status-top bg-green"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;" >ข้อมูลส่วนตัว (Personal Information) </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <label>คำนำหน้าชื่อภาษาไทย (Title Name in Thai)</label>
                                                        <input name="title_t" id="title_t" type="text" class="form-control"  placeholder="คำนำหน้าชื่อภาษาไทย (Title Name in Thai)">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>คำนำหน้าชื่อภาษาอังกฤษ (Title Name in English)</label>
                                                        <input name="title_e" id="title_e" type="text" class="form-control"  placeholder="คำนำหน้าชื่อภาษาอังกฤษ (Title Name in English)">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>ชื่อ (Name) <font style="color: red;">*</font></label>
                                                            <div id="fname-null">
                                                            <input name="fname" id="fname" type="text" class="form-control"  placeholder="ชื่อ (Name)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ฉายา (Buddhist Name / Middle Name)</label>
                                                            <input name="bname" id="bname" type="text" class="form-control" placeholder="ฉายา (Buddhist Name / Middle Name)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >นามสกุล (Surname) <font style="color: red;">*</font></label>
                                                            <div id="sname-null">
                                                            <input name="sname" id="sname" type="text" class="form-control" placeholder="นามสกุล (Surname)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >วัน/เดือน/ปี ที่เกิด (Date of Birth)</label>
                
                                                            <div class="row row-cards">
                                                                    <div class="col-md-3">
                                                                        <select name="a_day" id="register_day" class="form-select">
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
                                                                        <select name="a_month" id="a_month" class="form-select">
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
                                                                        <select name="a_year" id="a_year" class="form-select">
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
                                                            <label >วัน/เดือน/ปี ที่บรรพชา/อุปสมบท (Date of Ordination) (Monk Only)</label>
                                                            
                                                            <div class="row row-cards">
                                                                    <div class="col-md-3">
                                                                        <select name="b_day" id="b_day" class="form-select">
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
                                                                        <select name="b_month" id="b_month" class="form-select">
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
                                                                        <select name="b_year" id="b_year" class="form-select">
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
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >เบอร์โทรศัพท์ (Contact No.)</label>
                                                            <input name="tel" id="tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์ (Contact No.)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >E-mail </label>
                                                            <input name="email" id="email" type="email" class="form-control" placeholder="E-mail ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >เชื้อชาติ (Nationality)</label>
                                                            <input name="race" id="race" type="text" class="form-control" placeholder="เชื้อชาติ (Nationality)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >สัญชาติ (Nation)</label>
                                                            <input name="nationality" id="nationality" type="text" class="form-control" placeholder="สัญชาติ (Nation)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ศาสนา (Religion)</label>
                                                            <input name="religion" id="religion" type="text" class="form-control" placeholder="ศาสนา (Religion)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card / Passport No.)<font style="color: red;">*</font></label>
                                                            <div id="idcard-null">
                                                            <input name="idcard" id="idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน (ID Card / Passport No.)" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label >ส่วนสูง (Height)</label>
                                                                    <input name="height" id="height" type="text" class="form-control" placeholder="ส่วนสูง (Height)">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label >น้ำหนัก (Weight)</label>
                                                                  <input name="weight" id="weight" type="text" class="form-control" placeholder="น้ำหนัก (Weight)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label >รูปภาพ (Photo) <font style="color: red;">รูปถ่ายขนาด 1 นิ้วครึ่ง / Photo Size 1.5 inch(300X450 px. )</font></label>
                                                            <input name="img1" id="img1" type="file" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ชื่อ/นามสกุลบิดา (Father's Name)</label>
                                                            <input name="fathername" id="fathername" type="text" class="form-control" placeholder="ชื่อ/นามสกุลบิดา (Father's Name)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >อาชีพ (Occupation)</label>
                                                            <input name="father_occupation" id="father_occupation" type="text" class="form-control" placeholder="อาชีพ (Occupation)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card)</label>
                                                            <input name="father_idcard" id="father_idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน (ID Card)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
             
                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ชื่อ/นามสกุลมารดา (Mother's Name)</label>
                                                            <input name="mothername" id="mothername" type="text" class="form-control" placeholder="ชื่อ/นามสกุลมารดา (Mother's Name)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >อาชีพ (Occupation)</label>
                                                            <input name="mother_occupation" id="mother_occupation" type="text" class="form-control" placeholder="อาชีพ (Occupation)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card)</label>
                                                            <input name="mother_idcard" id="mother_idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน (ID Card)">
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
                                                            <input name="address2" id="address2" type="text" class="form-control" placeholder="วัด/บ้านเลขที่ (House No.)">
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
                                                            <input name="subdistrict2" id="subdistrict2" type="text" class="form-control" placeholder="ตำบล/แขวง (Sub-District)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >อำเภอ/เขต (District)</label>
                                                            <input name="district2" id="district2" type="text" class="form-control" placeholder="อำเภอ/เขต (District)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >จังหวัด (Province)</label>
                                                            <input name="province2" id="province2" type="text" class="form-control" placeholder="จังหวัด (Province)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >รหัสไปรษณีย์ (Post Code)</label>
                                                            <input name="citycode2" id="citycode2" type="text" class="form-control" placeholder="รหัสไปรษณีย์ (Post Code)">
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
                                                <div>เลือกเรียนหลักสูตร (Select your Course)</div>
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
            $course_Sql="SELECT `course_id`,`course_name`,`course_name_en` FROM `tb_course`  ORDER BY `course_id` ASC";
            $course_List=result_array($course_Sql);
            foreach($course_List as $key=>$course_Row){  
                
                if(($course_key==$course_Row["course_id"])){
                    $selected_course='selected="selected"';
                }else{
                    $selected_course=null;
                }
                
                ?>
                                                                <option value="<?php echo $course_Row["course_id"];?>" <?php echo $selected_course;?> ><?php echo $course_Row["course_name"];?> (<?php echo $course_Row["course_name_en"];?>)</option>     
    <?php    } ?>

                                                            </select>
                                                        </label>
                                                        <div id="course-null"></div>
                                                    </div>

                                                </div>
                                            </div>

   

                                        </div>
                                    </div>


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
จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในการลงทะเบียนเรียนออนไลน์เท่านั้น *** <br>
*** I agree to provide information to Mahachulalongkornrajavidyalaya University Chiang Mai Campus.
For collect, use and disclose my personal information for Online Enrollment only. ***                                                           
                                                         
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
                                                    <div id="but_form_register-null">
                                                    <button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>
                                                    <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>
                                                    </div>
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
          



<script src="dist/uploaders/fileinput/plugins/purify.min.js"></script>
<script src="dist/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="dist/uploaders/fileinput/fileinput.min.js"></script>



<script>
    $(document).ready(function(){
        $("#check_register").on('change',function(){
            var fname=$("#fname").val();
            var sname=$("#sname").val();
            var idcard=$("#idcard").val();
            var course=$("#course").val();
            var check_error="yes";
            var check_register=$("#check_register").val();

              if(check_register==="1"){
                  if(fname===""){
                      document.getElementById("fname-null").innerHTML=
                      '<input name="fname" id="fname" type="text" class="form-control is-invalid" value="'+fname+'" placeholder="ชื่อ (Name)">';
                      check_error="yes";
                  }else{
                    document.getElementById("fname-null").innerHTML=
                      '<input name="fname" id="fname" type="text" class="form-control is-valid mb-2" value="'+fname+'" placeholder="ชื่อ (Name)">';
                      check_error="no";
                  }

                  if(sname===""){
                    document.getElementById("sname-null").innerHTML=
                      '<input name="sname" id="sname" type="text" class="form-control is-invalid" value="'+sname+'" placeholder="นามสกุล (Surname)">';
                      check_error="yes";
                  }else{
                    document.getElementById("sname-null").innerHTML=
                      '<input name="sname" id="sname" type="text" class="form-control is-valid mb-2" value="'+sname+'" placeholder="นามสกุล (Surname)">';
                      check_error="no";
                  }

                  if(idcard===""){
                    document.getElementById("idcard-null").innerHTML=
                      '<input name="idcard" id="idcard" type="text" class="form-control is-invalid" value="'+idcard+'" placeholder="รหัสประจำตัวประชาชน">';
                      check_error="yes";
                  }else{
                    document.getElementById("idcard-null").innerHTML=
                      '<input name="idcard" id="idcard" type="text" class="form-control is-valid mb-2" value="'+idcard+'" placeholder="รหัสประจำตัวประชาชน">';
                      check_error="no";
                  }

                  if(course===""){
                    document.getElementById("course-null").innerHTML='<font style="color: red;">กรุณาเลือก รายการนี้</font>';
                    check_error="yes";
                  }else{
                    document.getElementById("course-null").innerHTML='<font>&nbsp;</font>';
                    check_error="no";
                  }

                  if(check_error!="yes"){

                    document.getElementById("but_form_register-null").innerHTML=
                    '<button type="submit" name="but_form_register" id="but_form_register" class="btn btn-success">ลงทะเบียน</button>'
                    +' <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>';

                  }else{

                    document.getElementById("but_form_register-null").innerHTML=
                    '<button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>'
                    +' <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>';

                  }

              }else{

                    document.getElementById("but_form_register-null").innerHTML=
                    '<button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>'
                    +' <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>';

              }

        })
    })

</script>



