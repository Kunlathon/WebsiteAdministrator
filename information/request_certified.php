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
                                                                        <div class="page-title" style="font-size: 20px;">ยื่นเรื่องขอเอกสารรับรอง ()</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
<form name="form_student_card" id="form_student_card" method="post" action="proccess/request_certified_proccess.php">
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
                                                            <label >ฉายา (Buddhist Name)</label>
                                                            <input name="user_name_buddhist" id="user_name_buddhist" type="text" class="form-control" placeholder="ฉายา (Buddhist Name)">
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
                                                            <label >วันเดือนปีเกิด</label>

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
                                                                        <option value="2014" >2014</option>
                                                                        <option value="2013" >2013</option>
                                                                        <option value="2012" >2012</option>
                                                                        <option value="2011" >2011</option>
                                                                        <option value="2010" >2010</option>
                                                                        <option value="2009" >2009</option>
                                                                        <option value="2008" >2008</option>
                                                                        <option value="2007" >2007</option>
                                                                        <option value="2006" >2006</option>
                                                                        <option value="2005" >2005</option>
                                                                        <option value="2004" >2004</option>
                                                                        <option value="2003" >2003</option>
                                                                        <option value="2002" >2002</option>
                                                                        <option value="2001" >2001</option>
                                                                        <option value="2000" >2000</option>
                                                                        <option value="1999" >1999</option>
                                                                        <option value="1998" >1998</option>
                                                                        <option value="1997" >1997</option>
                                                                        <option value="1996" >1996</option>
                                                                        <option value="1995" >1995</option>
                                                                        <option value="1994" >1994</option>
                                                                        <option value="1993" >1993</option>
                                                                        <option value="1992" >1992</option>
                                                                        <option value="1991" >1991</option>
                                                                        <option value="1990" >1990</option>
                                                                        <option value="1989" >1989</option>
                                                                        <option value="1988" >1988</option>
                                                                        <option value="1987" >1987</option>
                                                                        <option value="1986" >1986</option>
                                                                        <option value="1985" >1985</option>
                                                                        <option value="1984" >1984</option>
                                                                        <option value="1983" >1983</option>
                                                                        <option value="1982" >1982</option>
                                                                        <option value="1981" >1981</option>
                                                                        <option value="1980" >1980</option>
                                                                        <option value="1979" >1979</option>
                                                                        <option value="1978" >1978</option>
                                                                        <option value="1977" >1977</option>
                                                                        <option value="1976" >1976</option>
                                                                        <option value="1975" >1975</option>
                                                                        <option value="1974" >1974</option>
                                                                        <option value="1973" >1973</option>
                                                                        <option value="1972" >1972</option>
                                                                        <option value="1971" >1971</option>
                                                                        <option value="1970" >1970</option>
                                                                        <option value="1969" >1969</option>
                                                                        <option value="1968" >1968</option>
                                                                        <option value="1967" >1967</option>
                                                                        <option value="1966" >1966</option>
                                                                        <option value="1965" >1965</option>
                                                                        <option value="1964" >1964</option>
                                                                        <option value="1963" >1963</option>
                                                                        <option value="1962" >1962</option>
                                                                        <option value="1961" >1961</option>
                                                                        <option value="1960" >1960</option>
                                                                        <option value="1959" >1959</option>
                                                                        <option value="1958" >1958</option>
                                                                        <option value="1957" >1957</option>
                                                                        <option value="1956" >1956</option>
                                                                        <option value="1955" >1955</option>
                                                                        <option value="1954" >1954</option>
                                                                        <option value="1953" >1953</option>
                                                                        <option value="1952" >1952</option>
                                                                        <option value="1951" >1951</option>
                                                                        <option value="1950" >1950</option>
                                                                        <option value="1949" >1949</option>
                                                                        <option value="1948" >1948</option>
                                                                        <option value="1947" >1947</option>
                                                                        <option value="1946" >1946</option>
                                                                        <option value="1945" >1945</option>
                                                                        <option value="1944" >1944</option>
                                                                        <option value="1943" >1943</option>
                                                                        <option value="1942" >1942</option>
                                                                        <option value="1941" >1941</option>
                                                                        <option value="1940" >1940</option>
                                                                        <option value="1939" >1939</option>
                                                                        <option value="1938" >1938</option>
                                                                        <option value="1937" >1937</option>
                                                                        <option value="1936" >1936</option>
                                                                        <option value="1935" >1935</option>
                                                                        <option value="1934" >1934</option>
                                                                        <option value="1933" >1933</option>
                                                                        <option value="1932" >1932</option>
                                                                        <option value="1931" >1931</option>
                                                                        <option value="1930" >1930</option>
                                                                        <option value="1929" >1929</option>
                                                                        <option value="1928" >1928</option>
                                                                        <option value="1927" >1927</option>
                                                                        <option value="1926" >1926</option>
                                                                        <option value="1925" >1925</option>
                                                                        <option value="1924" >1924</option>
                                                                        <option value="1923" >1923</option>
                                                                        <option value="1922" >1922</option>
                                                                        <option value="1921" >1921</option>
                                                                        <option value="1920" >1920</option>
                                                                        <option value="1919" >1919</option>
                                                                        <option value="1918" >1918</option>
                                                                        <option value="1917" >1917</option>
                                                                        <option value="1916" >1916</option>
                                                                        <option value="1915" >1915</option>
                                                                        <option value="1914" >1914</option>
                                                                        <option value="1913" >1913</option>
                                                                        <option value="1912" >1912</option>
                                                                        <option value="1911" >1911</option>
                                                                        <option value="1910" >1910</option>
                                                                        <option value="1909" >1909</option>
                                                                        <option value="1908" >1908</option>
                                                                        <option value="1907" >1907</option>
                                                                        <option value="1906" >1906</option>
                                                                        <option value="1905" >1905</option>
                                                                        <option value="1904" >1904</option>
                                                                        <option value="1903" >1903</option>
                                                                        <option value="1902" >1902</option>
                                                                        <option value="1901" >1901</option>
                                                                        <option value="1900" >1900</option>
                                                                        <option value="1899" >1899</option>
                                                                        <option value="1898" >1898</option>
                                                                        <option value="1897" >1897</option>
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
                                                            <label >รหัสประจำตัวประชาชน (Id Card)</label>
                                                            <input name="user_idcard" id="user_idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน (Id Card)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >หมู่โลหิต (Blood)</label>
                                                            <input name="user_blood" id="user_blood" type="text" class="form-control" placeholder="หมู่โลหิต (Blood)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัว (ID Code)</label>
                                                            <input name="user_student_id" id="user_student_id" type="text" class="form-control" placeholder="รหัสประจำตัว (ID Code)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"></div>
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
                                                            <input name="user_tel" id="user_tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์ (Phone)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >E-mail</label>
                                                            <input name="user_email" id="user_email" type="email" class="form-control" placeholder="E-mail">
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
                                                <div>มีความประสงค์ขอเอกสารรับรอง</div>
                                                    <div></div>
                                            </div>
                                        </div>
                                        <div class="card-body">


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">

                                                            <label class="form-check">
                                                                <input class="form-check-input" name="user_certified" id="user_certified" type="checkbox" value="1">
                                                                <span class="form-check-label">ยื่นเรื่องคำร้อง</span>
                                                            </label>
                                                            
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="alert alert-success" role="alert">
                                                        ยื่นเรื่องคำร้อง
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>

                                                <!--<div class="row g-5">
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

                                                </div>-->

                                                <div class="row g-5">
                                                    <div class="col-md-12">
                                                        <div class="alert alert-warning" role="alert" style="color: red;">
                                                            
                                                    *** ข้าพเจ้ายินยอมให้ข้อมูลแก่ มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่
จะเก็บรวบรวม ใช้ และเปิดเผยข้อมูลส่วนบุคคลของข้าพเจ้าสำหรับการใช้ในการขอบัตรประจำตัวนิสิตเท่านั้น ***
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
                                                                    <span class="form-check-label">ยอมรับเงื่อนไข</span>
                                                                    </div>
                                                                </label>
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
          