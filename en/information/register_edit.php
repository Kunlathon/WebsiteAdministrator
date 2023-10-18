<?php

        $idcard=$_SESSION["idcard"];
        $student_id=$_SESSION["student_id"];

        $verify_sql="SELECT * 
                    FROM `tb_student` 
                    WHERE `user_idcard`='{$idcard}' 
                    AND `user_student_no`='{$student_id}'";
        //echo "$verify_sql";
        $verify_rs=result_array($verify_sql);
        foreach($verify_rs as $key=>$verify_row){

            if(((is_array($verify_row) && count($verify_row)))){
                
                if(($verify_row["user_prefix_th"]!=null)){
                    $user_prefix_th=$verify_row["user_prefix_th"];
                }else{
                    $user_prefix_th=null;
                }

                if(($verify_row["user_prefix_en"]!=null)){
                    $user_prefix_en=$verify_row["user_prefix_en"];
                }else{
                    $user_prefix_en=null;
                }

                if(($verify_row["user_name"]!=null)){
                    $user_name=$verify_row["user_name"];
                }else{
                    $user_name=null;
                } 

                if(($verify_row["user_surname"]!=null)){
                    $user_surname=$verify_row["user_surname"];
                }else{
                    $user_surname=null;
                }

                if(($verify_row["user_birthday"]!=null)){
                    $user_birthday=$verify_row["user_birthday"];
                }else{
                    $user_birthday=null;
                }

                if(($verify_row["user_tel"]!=null)){
                    $user_tel=$verify_row["user_tel"];
                }else{
                    $user_tel=null;
                }

                if(($verify_row["user_email"]!=null)){
                    $user_email=$verify_row["user_email"];
                }else{
                    $user_email=null;
                }

                if(($verify_row["user_race"]!=null)){
                    $user_race=$verify_row["user_race"];
                }else{
                    $user_race=null;
                }

                if(($verify_row["user_nationality"]!=null)){
                    $user_nationality=$verify_row["user_nationality"];
                }else{
                    $user_nationality=null;
                }

                if(($verify_row["user_religion"]!=null)){
                    $user_religion=$verify_row["user_religion"];
                }else{
                    $user_religion=null;
                }

                if(($verify_row["user_idcard"]!=null)){
                    $user_idcard=$verify_row["user_idcard"];
                }else{
                    $user_idcard=null;
                }

                if(($verify_row["user_height"]!=null)){
                    $user_height=$verify_row["user_height"];
                }else{
                    $user_height=null;
                }

                if(($verify_row["user_weight"]!=null)){
                    $user_weight=$verify_row["user_weight"];
                }else{
                    $user_weight=null;
                }

                if(($verify_row["user_fathername"]!=null)){
                    $user_fathername=$verify_row["user_fathername"];
                }else{
                    $user_fathername=null;
                }

                if(($verify_row["user_father_occupation"]!=null)){
                    $user_father_occupation=$verify_row["user_father_occupation"];
                }else{
                    $user_father_occupation=null;
                }

                if(($verify_row["user_father_idcard"]!=null)){
                    $user_father_idcard=$verify_row["user_father_idcard"];
                }else{
                    $user_father_idcard=null;
                }

                if(($verify_row["user_mothername"]!=null)){
                    $user_mothername=$verify_row["user_mothername"];
                }else{
                    $user_mothername=null;
                }

                if(($verify_row["user_mother_occupation"]!=null)){
                    $user_mother_occupation=$verify_row["user_mother_occupation"];
                }else{
                    $user_mother_occupation=null;
                }

                if(($verify_row["user_mother_idcard"]!=null)){
                    $user_mother_idcard=$verify_row["user_mother_idcard"];
                }else{
                    $user_mother_idcard=null;
                }

                if(($verify_row["user_address_no_now"]!=null)){
                    $user_address_no_now=$verify_row["user_address_no_now"];
                }else{
                    $user_address_no_now=null;
                }

                if(($verify_row["user_address_moo_now"]!=null)){
                    $user_address_moo_now=$verify_row["user_address_moo_now"];
                }else{
                    $user_address_moo_now=null;
                }

                if(($verify_row["user_address_soi_now"]!=null)){
                    $user_address_soi_now=$verify_row["user_address_soi_now"];
                }else{
                    $user_address_soi_now=null;
                }

                if(($verify_row["user_address_road_now"]!=null)){
                    $user_address_road_now=$verify_row["user_address_road_now"];
                }else{
                    $user_address_road_now=null;
                }

                if(($verify_row["user_address_subdistrict_now"]!=null)){
                    $user_address_subdistrict_now=$verify_row["user_address_subdistrict_now"];
                }else{
                    $user_address_subdistrict_now=null;
                }

                if(($verify_row["user_address_district_now"]!=null)){
                    $user_address_district_now=$verify_row["user_address_district_now"];
                }else{
                    $user_address_district_now=null;
                }

                if(($verify_row["user_address_province_now"]!=null)){
                    $user_address_province_now=$verify_row["user_address_province_now"];
                }else{
                    $user_address_province_now=null;
                }

                if(($verify_row["user_address_citycode_now"]!=null)){
                    $user_address_citycode_now=$verify_row["user_address_citycode_now"];
                }else{
                    $user_address_citycode_now=null;
                }

                if(($verify_row["user_pic"]!=null)){
                    $user_pic=$verify_row["user_pic"];
                }else{
                    $user_pic=null;
                }

                if(($verify_row["user_studentid"]!=null)){
                    $user_studentid=$verify_row["user_studentid"];
                }else{
                    $user_studentid=null;
                }

                //$course_key=$verify_row["course_id"];
                
                ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
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

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="page-title" style="font-size: 20px;">แก้ไขลงทะเบียนเรียนออนไลน์
                                                                        &nbsp;     
                                                                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                                <button type="button" name="sub_student_detail" onclick="location.href='?modules=register_detail'" id="sub_student_detail" class="btn btn-purple w-100">
                                                                                    รายละเอียดนิสิต
                                                                                </button>
                                                                            </div>
                                                                            
                                                                            <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                                <button type="button" name="sub_student_detail" onclick="location.href='proccess/verify_registration_logout.php'" id="sub_student_detail" class="btn btn-lime w-100">
                                                                                    ออกจากระบบ
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6"></div>
                                                                </div>

                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
<form name="form_student_card" id="form_student_card" method="post" accept-charset="utf-8" enctype="multipart/form-data" action="proccess/register_proccess_edit.php">
                                    
<input type="hidden" name="idcard" id="idcard" value="<?php echo $idcard;?>">
    <input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id;?>">

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
                                                        <input name="title_t" id="title_t" type="text" class="form-control" value="<?php echo $user_prefix_th;?>"  placeholder="คำนำหน้าชื่อภาษาไทย">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>คำนำหน้าชื่อภาษาอังกฤษ (Title Name in English)</label>
                                                        <input name="title_e" id="title_e" type="text" class="form-control" value="<?php echo $user_prefix_en;?>" placeholder="คำนำหน้าชื่อภาษาอังกฤษ">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>ชื่อ (Name) <font style="color: red;">*</font></label>
                                                            <div id="fname-null">
                                                            <input name="fname" id="fname" type="text" class="form-control"  placeholder="ชื่อ (Name)" value="<?php echo $user_name;?>" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ฉายา (Buddhist Name)</label>
                                                            <input name="bname" id="bname" type="text" class="form-control" placeholder="ฉายา (Buddhist Name)" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >นามสกุล (Surname) <font style="color: red;">*</font></label>
                                                            <div id="sname-null">
                                                            <input name="sname" id="sname" type="text" class="form-control" placeholder="นามสกุล (Surname)" value="<?php echo $user_surname;?>" required="required">
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
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >เบอร์โทรศัพท์ (Contact No.) </label>
                                                            <input name="tel" id="tel" type="text" class="form-control" value="<?php echo $user_tel;?>" placeholder="เบอร์โทรศัพท์">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >E-mail </label>
                                                            <input name="email" id="email" type="email" class="form-control" value="<?php echo $user_email;?>" placeholder="E-mail ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >เชื้อชาติ (Nationality)</label>
                                                            <input name="race" id="race" type="text" class="form-control" value="<?php echo $user_race;?>" placeholder="เชื้อชาติ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >สัญชาติ (Nation)</label>
                                                            <input name="nationality" id="nationality" type="text" class="form-control" value="<?php echo $user_nationality;?>" placeholder="สัญชาติ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ศาสนา (Religion)</label>
                                                            <input name="religion" id="religion" type="text" class="form-control" value="<?php echo $user_religion;?>" placeholder="ศาสนา">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="required">รหัสประจำตัวประชาชน / Passport No</label>
                                                            <div id="idcard-null">
                                                            <input name="idcard" id="idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน" value="<?php echo $user_idcard;?>" required="required">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label >ส่วนสูง (Height)</label>
                                                                    <input name="height" id="height" type="text" class="form-control" value="<?php echo $user_height;?>" placeholder="ส่วนสูง">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label >น้ำหนัก (Weight)</label>
                                                                  <input name="weight" id="weight" type="text" class="form-control" value="<?php echo $user_weight;?>" placeholder="น้ำหนัก">
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

        <?php
            $user_pic=$verify_row["user_pic"];
                if((isset($verify_row["user_pic"]))){
                    if((file_exists("../uploads/student/".$user_pic))){   ?>
                      <div><img src="../../languagecenter/uploads/student/<?php echo $user_pic; ?>" class="img-thumbnail" alt="<?php echo  $verify_row["user_pic"]; ?>" style="width:152px; height:168px;"></div>
            <?php	}else{  ?>
                        <div><img src="../../languagecenter/uploads/student/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:152px; height:168px;"></div>					
        <?php	    } ?>
        <?php  }else{ ?>
                    <div><img src="../../languagecenter/uploads/student/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:152px; height:168px;"></div>
        <?php  }?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
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
                                                            <input name="fathername" id="fathername" type="text" class="form-control" value="<?php echo $user_fathername;?>"  placeholder="ชื่อ/นามสกุลบิดา">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >อาชีพ (Occupation)</label>
                                                            <input name="father_occupation" id="father_occupation" type="text" class="form-control"  value="<?php echo $user_father_occupation;?>" placeholder="อาชีพ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card)</label>
                                                            <input name="father_idcard" id="father_idcard" type="text" class="form-control"  value="<?php echo $user_father_idcard;?>" placeholder="รหัสประจำตัวประชาชน">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
             
                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ชื่อ/นามสกุลมารดา (Mother's Name)</label>
                                                            <input name="mothername" id="mothername" type="text" class="form-control" value="<?php echo $user_mothername;?>" placeholder="ชื่อ/นามสกุลมารดา">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >อาชีพ (Occupation)</label>
                                                            <input name="mother_occupation" id="mother_occupation" type="text" class="form-control" value="<?php echo $user_mother_occupation;?>" placeholder="อาชีพ">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card)</label>
                                                            <input name="mother_idcard" id="mother_idcard" type="text" class="form-control" value="<?php echo $user_mother_idcard;?>" placeholder="รหัสประจำตัวประชาชน">
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
                                                            <input name="address2" id="address2" type="text" class="form-control" value="<?php echo $user_address_no_now;?>" placeholder="วัด/บ้านเลขที่">
                                                            </div>                                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >หมู่ที่ (Section No.)</label>
                                                            <input name="moo2" id="moo2" type="text" class="form-control" value="<?php echo $user_address_moo_now;?>" placeholder="หมู่ที่">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ซอย (Avenue)</label>
                                                            <input name="soi2" id="soi2" type="text" class="form-control" value="<?php echo $user_address_soi_now;?>" placeholder="ซอย">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ถนน (Road)</label>
                                                            <input name="road2" id="road2" type="text" class="form-control" value="<?php echo $user_address_road_now;?>" placeholder="ถนน">
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
                                                            <input name="subdistrict2" id="subdistrict2" type="text" class="form-control" value="<?php echo $user_address_subdistrict_now;?>" placeholder="ตำบล/แขวง">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >อำเภอ/เขต (District)</label>
                                                            <div id="district2-null">
                                                            <input name="district2" id="district2" type="text" class="form-control" value="<?php echo $user_address_district_now;?>" placeholder="อำเภอ/เขต">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >จังหวัด (Province)</label>
                                                            <div id="province2-null">
                                                            <input name="province2" id="province2" type="text" class="form-control" value="<?php echo $user_address_province_now;?>" placeholder="จังหวัด">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >รหัสไปรษณีย์ (Post Code)</label>
                                                            <div id="citycode2-null">
                                                            <input name="citycode2" id="citycode2" type="text" class="form-control" value="<?php echo $user_address_citycode_now;?>" placeholder="รหัสไปรษณีย์">
                                                            </div>
                                                        </div>
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
                                                    <div id="but_form_register-null">
                                                    <button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>
                                                    <button type="button" name="but_delete" id="but_delete" class="btn btn-danger" value="delete">ยกเลิก</button>
                                                    </div>
                                                </center>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

    <input type="hidden" name="student_key" id="student_key" value="<?php echo $user_studentid;?>">
    <input type="hidden" name="idcard" id="idcard" value="<?php echo $idcard;?>">
    <input type="hidden" name="student_name" id="student_name" value="<?php echo $student_name;?>">
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
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
 <?php      }else{
                exit("<script>window.location='?modules=verify_registration';</script>");
            }

    }
?>





          



<script src="dist/uploaders/fileinput/plugins/purify.min.js"></script>
<script src="dist/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="dist/uploaders/fileinput/fileinput.min.js"></script>

<script>
  $(document).ready(function(){
    $("#but_delete").on('click',function(){
      var but_delete=$("#but_delete").val();
        if(but_delete==="delete"){
          document.location="?modules=register_edit";
        }else{}
    })
  })
</script>

<script>
    $(document).ready(function(){
        $("#check_register").on('change',function(){
            var fname=$("#fname").val();
            var sname=$("#sname").val();
            var idcard=$("#idcard").val();
            var check_error="yes";
            var count_error=0;
            var check_register=$("#check_register").val();

            var address2=$("#address2").val();
            var subdistrict2=$("#subdistrict2").val();
            var district2=$("#district2").val();
            var province2=$("#province2").val();
            var citycode2=$("#citycode2").val();

              if(check_register==="1"){

                  if(fname===""){
                      document.getElementById("fname-null").innerHTML=
                      '<input name="fname" id="fname" type="text" class="form-control is-invalid" value="'+fname+'" placeholder="ชื่อ (Name)">';
                      count_error=count_error+1;
                  }else{
                    document.getElementById("fname-null").innerHTML=
                      '<input name="fname" id="fname" type="text" class="form-control is-valid mb-2" value="'+fname+'" placeholder="ชื่อ (Name)">';
                      count_error=count_error+0;
                  }

                  if(sname===""){
                    document.getElementById("sname-null").innerHTML=
                      '<input name="sname" id="sname" type="text" class="form-control is-invalid" value="'+sname+'" placeholder="นามสกุล (Surname)">';
                      count_error=count_error+1;
                  }else{
                    document.getElementById("sname-null").innerHTML=
                      '<input name="sname" id="sname" type="text" class="form-control is-valid mb-2" value="'+sname+'" placeholder="นามสกุล (Surname)">';
                      count_error=count_error+0;
                  }

                  if(idcard===""){
                    document.getElementById("idcard-null").innerHTML=
                      '<input name="idcard" id="idcard" type="text" class="form-control is-invalid" value="'+idcard+'" placeholder="รหัสประจำตัวประชาชน">';
                      count_error=count_error+1;
                  }else{
                    document.getElementById("idcard-null").innerHTML=
                      '<input name="idcard" id="idcard" type="text" class="form-control is-valid mb-2" value="'+idcard+'" placeholder="รหัสประจำตัวประชาชน">';
                      count_error=count_error+0;
                  }


                  if(address2===""){
                    document.getElementById("address2-null").innerHTML=
                      '<input name="address2" id="address2" type="text" class="form-control is-invalid" value="'+address2+'" placeholder="วัด/บ้านเลขที่ (House No.)">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("address2-null").innerHTML=
                      '<input name="address2" id="address2" type="text" class="form-control is-valid" value="'+address2+'" placeholder="วัด/บ้านเลขที่ (House No.)">';
                    count_error=count_error+0;
                  }

                  if(subdistrict2===""){
                    document.getElementById("subdistrict2-null").innerHTML=
                      '<input name="subdistrict2" id="subdistrict2" type="text" class="form-control is-invalid" value="'+subdistrict2+'" placeholder="ตำบล/แขวง (Sub-District)">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("subdistrict2-null").innerHTML=
                      '<input name="subdistrict2" id="subdistrict2" type="text" class="form-control is-valid" value="'+subdistrict2+'" placeholder="ตำบล/แขวง (Sub-District)">';
                    count_error=count_error+0;
                  }

                  if(district2===""){
                    document.getElementById("district2-null").innerHTML=
                      '<input name="district2" id="district2" type="text" class="form-control is-invalid" value="'+district2+'" placeholder="อำเภอ/เขต (District)">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("district2-null").innerHTML=
                      '<input name="district2" id="district2" type="text" class="form-control is-valid" value="'+district2+'" placeholder="อำเภอ/เขต (District)">';
                    count_error=count_error+0;
                  }

                  if(province2===""){
                    document.getElementById("province2-null").innerHTML=
                      '<input name="province2" id="province2" type="text" class="form-control is-invalid" value="'+province2+'" placeholder="จังหวัด (Province)">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("province2-null").innerHTML=
                      '<input name="province2" id="province2" type="text" class="form-control is-valid" value="'+province2+'" placeholder="จังหวัด (Province)">';
                    count_error=count_error+0;
                  }

                  if(citycode2===""){
                    document.getElementById("citycode2-null").innerHTML=
                      '<input name="citycode2" id="citycode2" type="text" class="form-control is-invalid" value="'+citycode2+'" placeholder="รหัสไปรษณีย์ (Post Code)">';
                    count_error=count_error+1;
                  }else{
                    document.getElementById("citycode2-null").innerHTML=
                      '<input name="citycode2" id="citycode2" type="text" class="form-control is-valid" value="'+citycode2+'" placeholder="รหัสไปรษณีย์ (Post Code)">';
                    count_error=count_error+0;
                  }


                  if(count_error>=1){

                    document.getElementById("but_form_register-null").innerHTML=
                    '<button type="button" name="but_form_register" id="but_form_register" class="btn btn-success disabled">ลงทะเบียน</button>'
                    +' <button type="button" name="" id="" class="btn btn-danger">ยกเลิก</button>';

                  }else{

                    document.getElementById("but_form_register-null").innerHTML=
                    '<button type="submit" name="but_form_register" id="but_form_register" class="btn btn-success ">ลงทะเบียน</button>'
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



