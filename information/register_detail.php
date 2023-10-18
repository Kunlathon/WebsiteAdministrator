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
                
                ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

   
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

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="page-title" style="font-size: 20px;">รายละเอียดนิสิต
                                                                            &nbsp;     
                                                                                <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                                                    <button type="button" name="sub_student_detail" onclick="location.href='?modules=register_edit'" id="sub_student_detail" class="btn btn-purple w-100">
                                                                                        แก้ไขข้อมูล
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
                                    </div>

                                    <div class="card">
                                        <div class="card-status-top bg-green"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;" >ข้อมูลส่วนตัว (Personal Information) </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6" align="right">
                                                        <div class="form-group">
                                                        
        <?php
            $user_pic=$verify_row["user_pic"];
                if((isset($verify_row["user_pic"]))){
                    if((file_exists("uploads/student/".$user_pic))){   ?>
                      <div><img src="uploads/student/<?php echo $user_pic; ?>" class="img-thumbnail" alt="<?php echo  $verify_row["user_pic"]; ?>" style="width:152px; height:168px;"></div>
            <?php	}else{  ?>
                        <div><img src="uploads/student/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:152px; height:168px;"></div>					
        <?php	    } ?>
        <?php  }else{ ?>
                    <div><img src="uploads/student/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:152px; height:168px;"></div>
        <?php  }?>



                                                        </div>
                                                       
                                                    </div>
                                                    <div class="col-md-6" align="left">
    <?php
             if((isset($verify_row["user_student_no"]))){   ?>
                    <div><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://www.mse-exam.net/qr/chk_std.php?std_id=<?php echo $verify_row["user_student_no"]; ?>&choe=UTF-8"; class="img-thumbnail" style="width:152px; height:168px;"></div>
    <?php    }else{ ?>
                    <div><img src="uploads/student/no-image-icon-0.jpg" class="img-thumbnail" alt="no image" style="width:152px; height:168px;"></div>
    <?php    } ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <label>ชื่อภาษาไทย  (Name TH) : <?php echo $verify_row["user_prefix_th"]." ".$verify_row["user_name"]." ".$verify_row["user_surname"];?></label>
                                                        <!--<input name="title_t" id="title_t" type="text" class="form-control"  placeholder="คำนำหน้าชื่อภาษาไทย">-->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <!--<label>ชื่อภาษาอังกฤษ : <?php echo $verify_row["user_prefix_en"]." ".$verify_row["user_name_en"]." ".$verify_row["user_surname_en"];?></label>
                                                        <input name="title_e" id="title_e" type="text" class="form-control"  placeholder="คำนำหน้าชื่อภาษาอังกฤษ">-->
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="mb-3">
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
                                                            <label >ฉายา (Buddhist Name)</label>
                                                            <input name="bname" id="bname" type="text" class="form-control" placeholder="ฉายา (Buddhist Name)">
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
                                            </div>-->




                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >วัน/เดือน/ปี ที่เกิด (Date of Birth) : <?php echo $verify_row["user_birthday"];?></label>
                
                                                            <!--<div class="row row-cards">
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
                                                                </div>-->

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >วัน/เดือน/ปี ที่บรรพชา/อุปสมบท  (Date of Ordination) (Monk Only) : </label>
                                                            
                                                                <!--<div class="row row-cards">
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
                                                                </div>-->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >เบอร์โทรศัพท์ (Contact No.) : <?php echo $verify_row["user_tel"];?></label>
                                                            <!--<input name="tel" id="tel" type="text" class="form-control" placeholder="เบอร์โทรศัพท์">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >E-mail : <?php echo $verify_row["user_email"];?></label>
                                                            <!--<input name="email" id="email" type="email" class="form-control" placeholder="E-mail ">-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >เชื้อชาติ (Nationality) : <?php echo $verify_row["user_nationality"];?></label>
                                                            <!--<input name="race" id="race" type="text" class="form-control" placeholder="เชื้อชาติ">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >สัญชาติ (Nation) : <?php echo $verify_row["user_religion"];?></label>
                                                            <!--<input name="nationality" id="nationality" type="text" class="form-control" placeholder="สัญชาติ">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ศาสนา (Religion) : <?php echo $verify_row["user_religion"];?></label>
                                                            <!--<input name="religion" id="religion" type="text" class="form-control" placeholder="ศาสนา">-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน / Passport No : <?php echo $verify_row["user_idcard"];?></label>
                                                            <div id="idcard-null">
                                                            <!--<input name="idcard" id="idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน" required="required">-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label >ส่วนสูง (Height) : <?php echo $verify_row["user_height"];?></label>
                                                                    <!--<input name="height" id="height" type="text" class="form-control" placeholder="ส่วนสูง">-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                  <label >น้ำหนัก (Weight) : <?php echo $verify_row["user_weight"];?></label>
                                                                  <!--<input name="weight" id="weight" type="text" class="form-control" placeholder="น้ำหนัก">-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--<div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label >รูปภาพ <font style="color: red;">รูปถ่ายขนาด 1 นิ้วครึ่ง</font></label>
                                                            <input name="img1" id="img1" type="file" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ชื่อ/นามสกุลบิดา (Father's Name) : <?php echo $verify_row["user_father_idcard"];?></label>
                                                            <!--<input name="fathername" id="fathername" type="text" class="form-control" placeholder="ชื่อ/นามสกุลบิดา">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >อาชีพ (Occupation) : <?php echo $verify_row["user_fathername"];?></label>
                                                            <!--<input name="father_occupation" id="father_occupation" type="text" class="form-control" placeholder="อาชีพ">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card) : <?php echo $verify_row["user_father_occupation"];?></label>
                                                            <!--<input name="father_idcard" id="father_idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน">-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
             
                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >ชื่อ/นามสกุลมารดา (Mother's Name) : <?php echo $verify_row["user_mother_idcard"];?></label>
                                                            <!--<input name="mothername" id="mothername" type="text" class="form-control" placeholder="ชื่อ/นามสกุลมารดา">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >อาชีพ  (Occupation) : <?php echo $verify_row["user_mothername"];?></label>
                                                            <!--<input name="mother_occupation" id="mother_occupation" type="text" class="form-control" placeholder="อาชีพ">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label >รหัสประจำตัวประชาชน (ID Card) : <?php echo $verify_row["user_mother_occupation"];?></label>
                                                           <!-- <input name="mother_idcard" id="mother_idcard" type="text" class="form-control" placeholder="รหัสประจำตัวประชาชน">-->
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
                                                <div>ที่อยู่ที่สามารถติดต่อได้  (Present Address)</div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >วัด/บ้านเลขที่  (House No.) : <?php echo $verify_row["user_address_no_now"];?></label>
                                                           <!--<input name="address2" id="address2" type="text" class="form-control" placeholder="วัด/บ้านเลขที่">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >หมู่ที่ (Section No.) : <?php echo $verify_row["user_address_moo_now"];?></label>
                                                            <!--<input name="moo2" id="moo2" type="text" class="form-control" placeholder="หมู่ที่">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ซอย (Avenue) : <?php echo $verify_row["user_address_soi_now"];?></label>
                                                            <!--<input name="soi2" id="soi2" type="text" class="form-control" placeholder="ซอย">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ถนน (Road) : <?php echo $verify_row["user_address_road_now"];?></label>
                                                            <!--<input name="road2" id="road2" type="text" class="form-control" placeholder="ถนน">-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >ตำบล/แขวง (Sub-District) : <?php echo $verify_row["user_address_subdistrict_now"];?></label>
                                                            <!--<input name="subdistrict2" id="subdistrict2" type="text" class="form-control" placeholder="ตำบล/แขวง">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >อำเภอ/เขต (District) : <?php echo $verify_row["user_address_district_now"];?></label>
                                                            <!--<input name="district2" id="district2" type="text" class="form-control" placeholder="อำเภอ/เขต">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >จังหวัด (Province) : <?php echo $verify_row["user_address_province_now"];?></label>
                                                            <!--<input name="province2" id="province2" type="text" class="form-control" placeholder="จังหวัด">-->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >รหัสไปรษณีย์ (Post Code) : <?php echo $verify_row["user_address_citycode_now"];?></label>
                                                            <!--<input name="citycode2" id="citycode2" type="text" class="form-control" placeholder="รหัสไปรษณีย์">-->
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
                                                <div>เรียนหลักสูตร</div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-12">

                                                        <div class="table-responsive">
                                                                
                                                                <table class="table table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th><div>ลำดับ (No.)</div></th>
                                                                            <!--<th><div>รายชื่อ (Name-Surname)</div></th>-->
                                                                            <th><div>หลักสูตร (Course)</div></th>
                                                                            <th><div>สถานะ (Status)</div></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
    <?php
    $annouuce_Sql="SELECT * FROM `tb_register` WHERE user_idcard='{$verify_row['user_idcard']}'";
    $annouuce_Rs=result_array($annouuce_Sql);
    $requset_count=0;
    foreach($annouuce_Rs as $key=>$annouuce_Row){ 
        $requset_count=$requset_count+1;
        $myname=$annouuce_Row["user_name"]." ".$annouuce_Row["user_surname"];

        
            $course_sql="SELECT `course_name`,`course_name_en` FROM `tb_course` WHERE `course_id`='{$annouuce_Row["user_status"]}';";
            $course_rs=result_array($course_sql);
            foreach($course_rs as $key=>$course_row){
                if((is_array($course_row) and count($course_row))){
                    $txt_course_name=$course_row["course_name"]." ".$course_row["course_name_en"];
                }else{
                    $txt_course_name=null;
                }
            }

        


        ?>

                                                                        <tr>
                                                                            <td><div><?php echo $requset_count;?></div></td>

                                                                            <!--<td><div><?php echo $myname;?></div></td>-->

                                                                            <td><div><?php echo $txt_course_name;?></div></td>

                                                                            <td>
        <?php
                if(($annouuce_Row["user_status"]=="1")){    ?>
                                                                                <span class="badge bg-orange-lt">กำลังดำเนินการ</span>
        <?php    }elseif(($annouuce_Row["user_status"]=="2")){  ?>
                                                                                <span class="badge bg-teal-lt" >ดำเนินเรียบร้อย</span>
        <?php    }else{}    ?>
                                                                                
                                                                            </td>
                                                                        </tr>
    <?php   } ?>


                                                                    </tbody>
                                                            </table>

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
                                                <div>การขอบัตรนิสิต (REQUEST FOR STUDENT CARD)</div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-12">


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
   $request_Sql="SELECT * FROM `tb_student_card` WHERE user_idcard='{$verify_row['user_idcard']}'";
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


                                                    </div>
                                                </div>
                                            </div>

   

                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-status-top bg-blue"></div>
                                        <div class="card-header">
                                            <div class="card-title" style="font-size: 18px;">
                                                <div>ขอเอกสารรับรอง ()</div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="mb-3">
                                                <div class="row g-5">
                                                    <div class="col-md-12">

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
   $request_Sql="SELECT * FROM `tb_certified` WHERE user_idcard='{$verify_row['user_idcard']}'";
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
                                                    
                                                    </div>
                                                </div>
                                            </div>

   

                                        </div>
                                    </div>


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
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php       }else{
                exit("<script>window.location='?modules=verify_registration';</script>");
            }
    } ?>


          



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



