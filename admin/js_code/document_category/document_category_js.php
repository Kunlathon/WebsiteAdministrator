<?php
//Develop By Arnon Manomuang
//พัฒนาเว็บไซต์โดย นายอานนท์ มะโนเมือง
//Tel 0631146517 , 0946164461
//โทร 0631146517 , 0946164461
//Email: manomuang@hotmail.com , manomuang11@gmail.com , manomuang@gmail.com

//Develop By Kunlathon Saowakhon
//พัฒนาเว็บไซต์โดย นายกุลธร เสาวคนธ์
//Tel 0932670639
//โทร 0932670639
//Email: mpamese.pc2001@gmail.com , missing_yrc2014@hotmail.com	
//$RunLink->Call_Link_System();

//OFF File Js
//sweet_alert.min.js
//select2.min.js
//bootstrap_multiselect.js
//OFF File Js end
//form_inputs.html
//components_alerts.html

//Data: datatables_extension_buttons_html5.js

    check_login('admin_username_lcm','login.php');

?>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>


<script>
        $(document).ready(function(){

// Defaults
            var swalInitDocumentData = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
// Defaults End

            $('#sub_add').on('click', function() {

                swalInitDocumentData.fire({
                    title: 'ต้องการบันทึกข้อมูลหรือไม่',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: 'ไม่',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    }
                }).then(function(result){
                    var action=$("#action").val();
                    var document_error="error";
                    var document_category_name=$("#document_category_name").val();
                    var document_category_name_en=$("#document_category_name_en").val();
                    var document_category_name_cn=$("#document_category_name_cn").val();

                    if(result.value){

                        if (action==="") {
                            swalInitDocumentData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                            document_error="error";
                        }else{
                            document_error="no_error";
                        }

                        if(document_category_name===""){
                            document.getElementById("document_category_name-null").innerHTML=
                                    '<div class="form-group row">'
                                    +'  <label class="col-form-label col-<?php echo $grid; ?>-2 font-weight-semibold text-danger">ชื่อประเภทเอกสาร</label>'
                                    +'  <div class="col-<?php echo $grid; ?>-10">'
                                    +'      <input type="text" name="document_category_name" id="document_category_name" class="form-control is-invalid" value="'+document_category_name+'" placeholder="ชื่อประเภทเอกสาร" reduired="reduired"  maxlength="100">'
                                    +'      <span class="invalid-feedback">กรุณากรอก ชื่อประเภทเอกสาร</span>'
                                    +'  </div>'
                                    +'</div>';
                            document_error="error";
                        }else{
                            document.getElementById("document_category_name-null").innerHTML=
                                    '<div class="form-group row">'
                                    +'  <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร</label>'
                                    +'      <div class="col-<?php echo $grid; ?>-10">'
                                    +'          <input type="text" name="document_category_name" id="document_category_name" class="form-control" value="'+document_category_name+'" placeholder="ชื่อประเภทเอกสาร" required="required" maxlength="100">'
                                    +'      <div>'
                                    +'</div>';
                            document_error="no_error";
                        }

                        if(document_error!="error"){

                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/document_category/document_category_process.php",{
                                action:action,
                                document_category_name:document_category_name,
                                document_category_name_en:document_category_name_en,
                                document_category_name_cn:document_category_name_cn

                            },function(process){
                                var process=process.trim();
                                    if(process==="no_error"){

                                        let timerInterval;
                                            swalInitDocumentData.fire({
                                                title: 'บันทึกสำเร็จ',
                                                //html: 'I will close in <b></b> milliseconds.',
                                                timer: 1200,
                                                icon: 'success',
                                                timerProgressBar: true,
                                                didOpen: function() {
                                                    Swal.showLoading()
                                                    timerInterval = setInterval(function() {
                                                        const content = Swal.getContent();
                                                        if (content) {
                                                            const b_document_category = content.querySelector('b_document_category')
                                                            if (b_document_category) {
                                                                b_document_category.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=document_category"; 
                                                }else{}
                                            });


                                    }else if(process==="it_error"){
                                            swalInitDocumentData.fire({
                                                title:'บันทึกไม่สำเร็จ ข้อมูลซ้ำ',
                                                icon:'error'
                                            }); 
                                    }else{
                                            swalInitDocumentData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                icon:'error'
                                            });
                                    }
                            })

                        }else{}

                    }else if (result.dismiss === swal.DismissReason.cancel){

                    }else{}
                })

            })
    
        })
    </script>  


    <script>
        $(document).ready(function(){

// Defaults
            var swalInitDocumentData = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
// Defaults End

            $('#sub_up').on('click', function() {

                swalInitDocumentData.fire({
                    title: 'ต้องการบันทึกข้อมูลหรือไม่',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonText: 'ใช่',
                    cancelButtonText: 'ไม่',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    }
                }).then(function(result){
                    var action=$("#action").val();
                    var document_error="error";
                    var category_id=$("#category_id").val();
                    var document_category_name=$("#document_category_name").val();
                    var document_category_name_en=$("#document_category_name_en").val();
                    var document_category_name_cn=$("#document_category_name_cn").val();

                    if(result.value){

                        if (action==="") {
                            swalInitDocumentData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                            document_error="error";
                        }else{
                            document_error="no_error";
                        }

                        if(document_category_name===""){
                            document.getElementById("document_category_name-null").innerHTML=
                                    '<div class="form-group row">'
                                    +'  <label class="col-form-label col-<?php echo $grid; ?>-2 font-weight-semibold text-danger">ชื่อประเภทเอกสาร</label>'
                                    +'  <div class="col-<?php echo $grid; ?>-10">'
                                    +'      <input type="text" name="document_category_name" id="document_category_name" class="form-control is-invalid" value="'+document_category_name+'" placeholder="ชื่อประเภทเอกสาร" reduired="reduired"  maxlength="100">'
                                    +'      <span class="invalid-feedback">กรุณากรอก ชื่อประเภทเอกสาร</span>'
                                    +'  </div>'
                                    +'</div>';
                            document_error="error";
                        }else{
                            document.getElementById("document_category_name-null").innerHTML=
                                    '<div class="form-group row">'
                                    +'  <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อประเภทเอกสาร</label>'
                                    +'      <div class="col-<?php echo $grid; ?>-10">'
                                    +'          <input type="text" name="document_category_name" id="document_category_name" class="form-control" value="'+document_category_name+'" placeholder="ชื่อประเภทเอกสาร" required="required" maxlength="100">'
                                    +'      <div>'
                                    +'</div>';
                            document_error="no_error";
                        }

                        if(document_error!="error"){

                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/document_category/document_category_process.php",{
                                action:action,
                                category_id:category_id,
                                document_category_name:document_category_name,
                                document_category_name_en:document_category_name_en,
                                document_category_name_cn:document_category_name_cn

                            },function(process){
                                var process=process.trim();
                                    if(process==="no_error"){

                                        let timerInterval;
                                            swalInitDocumentData.fire({
                                                title: 'บันทึกสำเร็จ',
                                                //html: 'I will close in <b></b> milliseconds.',
                                                timer: 1200,
                                                icon: 'success',
                                                timerProgressBar: true,
                                                didOpen: function() {
                                                    Swal.showLoading()
                                                    timerInterval = setInterval(function() {
                                                        const content = Swal.getContent();
                                                        if (content) {
                                                            const b_document_category = content.querySelector('b_document_category')
                                                            if (b_document_category) {
                                                                b_document_category.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=document_category"; 
                                                }else{}
                                            });


                                    }else if(process==="it_error"){
                                            swalInitDocumentData.fire({
                                                title:'บันทึกไม่สำเร็จ ข้อมูลซ้ำ',
                                                icon:'error'
                                            }); 
                                    }else{
                                            swalInitDocumentData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                icon:'error'
                                            });
                                    }
                            })

                        }else{}

                    }else if (result.dismiss === swal.DismissReason.cancel){

                    }else{}
                })

            })
    
        })
    </script>  


<!--Show Data All-->
<script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();
                if(run_show==="show"){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/document_category/document_category_show.php",{
                        run_show:run_show
                    },function(RunShow){
                        if(RunShow!=""){
                            $("#Run_Show_All").html(RunShow);
                        }else{}
                    })
                }else{
                    document.getElementById("Run_Show_All").innerHTML=
                    '<span style="font-weight: bold; color:red;">ไม่สามารถดำเนินการได้</span>';
                }
        })
    </script>
<!--Show Date All End-->