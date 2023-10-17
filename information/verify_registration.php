<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">

            <div id="login-error"></div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row row-cards">
              <div class="col-md-12">
                <div class="page-body">
                  <div class="container-xl">
                    <div class="row row-cards">
                      <div class="col-md-12">
<form name="form_verify_registration" id="form_verify_registration"  method="post" class="card" charset="utf-8">
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
                                            <div class="page-title" style="font-size: 20px;">ค้นหาข้อมูลผู้สมัคร (Search for Applicant Information)</div>
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
                              <label class="col-form-label col-md-4 required" style="font-size: 16px;">รหัสประจำตัว Student ID </label>                              
                              <div class="col-md-8">
                                <div id="student_id-null">
                                <input type="text" class="form-control" name="student_id" id="student_id" placeholder="รหัสประจำตัว Student ID" style="font-size: 16px;" >
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="mb-3">
                            <div class="row g-5">
                              <label class="col-form-label col-md-4 required" style="font-size: 16px;">เลขประจำตัวประชาชน หรือ Passport No </label>     <!-- -->                         
                              <div class="col-md-8">
                                <div id="idcard-null">
                                <input type="text" class="form-control" name="idcard" id="idcard" placeholder="เลขประจำตัวประชาชน หรือ Passport No" style="font-size: 16px;" >
                                </div>
                              </div>
                            </div>
                          </div>                

                          <div class="mb-3">
                            <div class="row g-5">                        
                              <div class="col-md-12">
                                <div class="card-footer text-end" style="margin: 0 auto; text-align: center;">
                                  <center>
                                    <button type="button" name="sum_vefify" id="sum_vefify" class="btn btn-success">ค้นหา</button>
                                    <button type="button" name="but_delete" id="but_delete" class="btn btn-danger" value="delete">ยกเลิก</button>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  $(document).ready(function(){
    $("#but_delete").on('click',function(){
      var but_delete=$("#but_delete").val();
        if(but_delete==="delete"){
          document.location="?modules=verify_registration";
        }else{}
    })
  })
</script>



<script>
  $(document).ready(function(){
      $("#sum_vefify").on('click',function(){
        var student_id=$("#student_id").val();
        var idcard=$("#idcard").val();
        var int_error=0;

            if(student_id===""){
                document.getElementById("student_id-null").innerHTML
                ='<div id="student_id-null">'
                +'  <input type="text" class="form-control is-invalid" name="student_id" id="student_id" value="'+student_id+'" placeholder="รหัสประจำตัว Student ID"  style="font-size: 16px;" >'
                +'  <div></div>'
                +'</div>';
                int_error=int_error+1;
            }else{
                if(student_id.length>=101){
                  document.getElementById("student_id-null").innerHTML
                  ='<div id="student_id-null">'
                  +'  <input type="text" class="form-control is-invalid" name="student_id" id="student_id" value="'+student_id+'" placeholder="รหัสประจำตัว Student ID"  style="font-size: 16px;" >'
                  +'  <div class="invalid-feedback">จำนวนตัวอักษรจำกัดไม่เกิน 100 ตัวอักษร</div>'
                  +'</div>';
                  int_error=int_error+1;
                }else{
                  if(student_id.length<=5){
                    document.getElementById("student_id-null").innerHTML
                    ='<div id="student_id-null">'
                    +'  <input type="text" class="form-control is-invalid" name="student_id" id="student_id" value="'+student_id+'" placeholder="รหัสประจำตัว Student ID"  style="font-size: 16px;" >'
                    +'  <div class="invalid-feedback">จำนวนตัวอักษรอย่างน้อย 5 ตัวอักษรขึ้นไป</div>'
                    +'</div>';
                    int_error=int_error+1;
                  }else{
                    document.getElementById("student_id-null").innerHTML
                    ='<div id="student_id-null">'
                    +'  <input type="text" class="form-control" name="student_id" id="student_id" value="'+student_id+'" placeholder="รหัสประจำตัว Student ID"  style="font-size: 16px;" >'
                    +'  <div></div>'
                    +'</div>';
                    int_error=int_error+0;
                  }
                }
            }

            if(idcard===""){
                document.getElementById("idcard-null").innerHTML
                ='<div id="idcard-null">'
                +'  <input type="text" class="form-control is-invalid" name="idcard" id="idcard" value="'+idcard+'" placeholder="เลขประจำตัวประชาชน หรือ Passport No"  style="font-size: 16px;" >'
                +'  <div></div>'
                +'</div>';
                int_error=int_error+1;
            }else{
                if(idcard.length>=101){
                  document.getElementById("idcard-null").innerHTML
                  ='<div id="idcard-null">'
                  +'  <input type="text" class="form-control is-invalid" name="idcard" id="idcard" value="'+idcard+'" placeholder="เลขประจำตัวประชาชน หรือ Passport No"  style="font-size: 16px;" >'
                  +'  <div class="invalid-feedback">จำนวนตัวอักษรจำกัดไม่เกิน 100 ตัวอักษร</div>'
                  +'</div>';
                  int_error=int_error+1;
                }else{
                  if(idcard.length<=5){
                    document.getElementById("idcard-null").innerHTML
                    ='<div id="idcard-null">'
                    +'  <input type="text" class="form-control is-invalid" name="idcard" id="idcard" value="'+idcard+'" placeholder="เลขประจำตัวประชาชน หรือ Passport No"  style="font-size: 16px;" >'
                    +'  <div class="invalid-feedback">จำนวนตัวอักษรอย่างน้อย 5 ตัวอักษรขึ้นไป</div>'
                    +'</div>';
                    int_error=int_error+1;
                  }else{
                    document.getElementById("idcard-null").innerHTML
                    ='<div id="idcard-null">'
                    +'  <input type="text" class="form-control" name="idcard" id="idcard" value="'+idcard+'" placeholder="เลขประจำตัวประชาชน หรือ Passport No"  style="font-size: 16px;" >'
                    +'  <div></div>'
                    +'</div>';
                    int_error=int_error+0;
                  }
                }
            }



            if(int_error>=1){
              /*document.getElementById("login-error").innerHTML
              ='<div class="alert alert-warning alert-dismissible" role="alert">'
              +'  <div class="d-flex">'
              +'    <div>'
              +'      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>'
              +'    </div>'
              +'    <div>'
              +'      พบข้อผิดพลาดไม่สามารถดำเนินการได้'
              +'    </div>'
              +'  </div>'
              +'  <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>'
              +'</div>';*/
            }else{
                $.post("proccess/verify_registration_login.php",{
                  student_id:student_id,
                  idcard:idcard
                },function(Runlogin){
                    if(Runlogin!=""){
                        var DataLogin=Runlogin.trim();
                    }else{
                        var DataLogin="";
                    }

                    if(DataLogin==="error_user"){
                      document.getElementById("login-error").innerHTML
                      ='<div class="alert alert-danger alert-dismissible" role="alert">'
                      +'  <div class="d-flex">'
                      +'    <div>'
                      +'      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>'
                      +'    </div>'
                      +'    <div>'
                      +'      ไม่พบรายการบัญชีผู้ใช้งาน จากฐานข้อมูล'
                      +'    </div>'
                      +'  </div>'
                      +'  <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>'
                      +'</div>';
                    }else if(DataLogin==="noerror"){
                      document.location="?modules=register_detail";
                    }else{
                      document.getElementById("login-error").innerHTML
                      ='<div class="alert alert-warning alert-dismissible" role="alert">'
                      +'  <div class="d-flex">'
                      +'    <div>'
                      +'      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" /><path d="M12 9v4" /><path d="M12 17h.01" /></svg>'
                      +'    </div>'
                      +'    <div>'
                      +'      ไม่พบรายการบัญชีผู้ใช้งาน'
                      +'    </div>'
                      +'  </div>'
                      +'  <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>'
                      +'</div>';
                    }

                })
            }



      })
  })

</script>


