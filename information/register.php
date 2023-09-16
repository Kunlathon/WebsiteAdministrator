<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

		  <?php
                    $sqlStr = "SELECT * FROM tb_information WHERE information_id='5' AND information_status='1'";
                    $rowStr= row_array($sqlStr);
			?>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row row-cards">
              <div class="col-md-12">
                <div class="page-body">
                  <div class="container-xl">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row row-cards">
                      <div class="col-md-12">
<!--==============================================================================================-->
                        <div id="RunRegister"></div>                          
<!--==============================================================================================-->
                      </div>
                    </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                    <div class="row row-cards">
                      <div class="col-md-12">
<form name="form_register" action="#" method="post" class="card" charset="utf-8">
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
                                            <div class="page-title" style="font-size: 20px;">ลงทะเบียน</div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>                            
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">
                              <label class="col-form-label col-md-2" style="font-size: 16px;">รหัสนักศึกษา</label>                              
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="register_id" id="register_id" placeholder="รหัสนักศึกษา" style="font-size: 16px;">
                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">
                              <label class="col-form-label col-md-2 required" style="font-size: 16px;">เลขประจำตัวประชาชน หรือ Passport No</label>                              
                              <div class="col-md-10">
                                <div id="register_idcard_null">
                                <input type="text" class="form-control" name="register_idcard" id="register_idcard" placeholder="เลขประจำตัวประชาชน หรือ Passport No" style="font-size: 16px;" required="required">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">
                              <label class="col-form-label col-md-2" style="font-size: 16px;">คำนำหน้า</label>                              
                              <div class="col-md-10">
                                <select type="text" name="prefix_id" id="prefix_id" class="form-select" id="select-users" value="">
                                  <option value="">คำนำหน้า</option>
                                  <option value="1">นาย</option>
                                  <option value="2">นาง</option>
                                  <option value="3">นางสาว</option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">
                              <label class="col-form-label col-md-2" style="font-size: 16px;">ชื่อ</label>                              
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="register_name" id="register_name" placeholder="ชื่อ" style="font-size: 16px;">
                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">
                              <label class="col-form-label col-md-2" style="font-size: 16px;">นามสกุล</label>                              
                              <div class="col-md-10">
                                <input type="text" class="form-control" name="register_surname" id="register_surname" placeholder="นามสกุล" style="font-size: 16px;">
                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">
                              <label class="col-form-label col-md-2" style="font-size: 16px;">วันเดือนปีเกิด</label>                              
                              <div class="col-md-10">
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
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">                        
                              <div class="col-md-12">
                                <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                  <center>
                                    <button type="button" name="but_form_register" id="but_form_register" class="btn btn-success">ลงทะเบียน</button>
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
                </div>
              </div>
            </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

<!--js code-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#but_form_register').on('click',function(){
        var register_id=$("#register_id").val();
        var register_idcard=$("#register_idcard").val();
        var prefix_id=$("#prefix_id").val();
        var register_name=$("#register_name").val();
        var register_surname=$("#register_surname").val();
        var register_day=$("#register_day").val();
        var register_month=$("#register_month").val();
        var register_year=$("#register_year").val();
        var null_idcard="yes";
        var birth_day="0000-00-00";
          if(register_idcard==""){
            document.getElementById("register_idcard_null").innerHTML=
            '<input type="text" class="form-control is-invalid" name="register_idcard" id="register_idcard" placeholder="เลขประจำตัวประชาชน หรือ Passport No" style="font-size: 16px;" required="required" value="'+register_idcard+'">'
            +'<div class="invalid-feedback">กรุณา กรอกข้อมูล</div>';
            null_idcard="yes";
          }else{
            document.getElementById("register_idcard_null").innerHTML=
            '<input type="text" class="form-control is-valid mb-2" name="register_idcard" id="register_idcard" placeholder="เลขประจำตัวประชาชน หรือ Passport No" style="font-size: 16px;" required="required" value="'+register_idcard+'">';
            null_idcard="no";
          }
//test null : if it's null will not working
            if(null_idcard=="no"){
//set form date Ex : 2008-03-27  
              if(register_day=="" && register_month=="" && register_year==""){
                birth_day="0000-00-00";
              }else if(register_day=="" || register_month=="" || register_year==""){
                birth_day="0000-00-00";
              }else{
                birth_day=register_year+'-'+register_month+'-'+register_day;
              }
//set form date Ex : 2008-03-27 end

              $.post("proccess/register_proccess.php",{
                  register_id:register_id,
                  register_idcard:register_idcard,
                  prefix_id:prefix_id,
                  register_name:register_name,
                  register_surname:register_surname,
                  birth_day:birth_day
              },function(run_register){
                  var txt_run_register=run_register;
                      txt_run_register=txt_run_register.trim();
                        if(txt_run_register==="no_error"){
                          document.getElementById("RunRegister").innerHTML=
                            '<div class="alert alert-success" role="alert">'
                          + ' <div class="d-flex">'
                          + '   <div>'
                          + '     <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>'
                          + '   </div>'
                          + '   <div>'
                          + '     <h4 class="alert-title">ลงทะเบียนสำเร็จ</h4>'
                          + '   </div>'
                          + ' </div>'
                          + '</div>';
                        }else if(txt_run_register==="it_error"){
                          document.getElementById("RunRegister").innerHTML=
                            '<div class="alert alert-danger" role="alert">'
                          + ' <div class="d-flex">'
                          + '   <div>'
                          + '     <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>'
                          + '   </div>'
                          + '   <div>'
                          + '     <h4 class="alert-title">ลงทะเบียนไม่สำเร็จ</h4>'
                          + '   </div>'
                          + ' </div>'
                          + '</div>';
                        }else{
                          document.getElementById("RunRegister").innerHTML=
                            '<div class="alert alert-warning" role="alert">'
                          + ' <div class="d-flex">'
                          + '   <div>'
                          + '     <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>'
                          + '   </div>'
                          + '   <div>'
                          + '     <h4 class="alert-title">พบข้อผิดพลาดไม่สามารถลงทะเบียนได้</h4>'
                          + '   </div>'
                          + ' </div>'
                          + '</div>';                          
                        }

              })

            }else{}
      })
    })
  </script>
<!--js code end-->

   