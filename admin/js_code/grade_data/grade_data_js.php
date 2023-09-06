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
?>
<?php check_login('admin_username_aba', 'login.php'); ?>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!--<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>-->



<!--Add-->
<script>
    $(document).ready(function(){

// Defaults
        var swalInitAddGradeData = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
// Defaults End


        $('#Add_Grade_data').on('click',function(){

            swalInitAddGradeData.fire({
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
                if(result.value){
                    var action = "create";
                    var grade_name=$("#grade_name").val();
                    var grade_name_eng=$("#grade_name_eng").val();
                    var grade_detail=$("#grade_detail").val();

                    if(action=="") {
                        swalInitAddGradeData.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            icon: 'error'
                        });
                    }else{

                        if(grade_name==""){
                            document.getElementById("grade_name-null").innerHTML =
                            '<input type="text" name="grade_name" id="grade_name" class="form-control is-invalid" value="'+grade_name+'" placeholder="กรอกข้อมูลระดับชั้น" required="required">'+
                            '<span class="invalid-feedback">กรอกข้อมูลระดับชั้น</span>'
                        }else{
                            document.getElementById("grade_name-null").innerHTML =
                            '<input type="text" name="grade_name" id="grade_name" class="form-control" value="'+grade_name+'" placeholder="กรอกข้อมูลระดับชั้น" required="required">'+
                            '<span>กรอกข้อมูลระดับชั้น</span>'
                        }

                        if(grade_name_eng!=""){
                            if(!grade_name_eng.match(/^([a-z A-Z 0-9 .+-.+/.+_.+*.])+$/i)){
                                document.getElementById("grade_name_eng-null").innerHTML=
                                '<input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control is-invalid" value="'+grade_name_eng+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                                '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'                                    
                                grade_name_eng_error="yes";                                    
                            }else{
                                document.getElementById("grade_name_eng-null").innerHTML=
                                '<input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control" value="'+grade_name_eng+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                                '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'                                    
                                grade_name_eng_error="no";
                            }
                        }else{
                            document.getElementById("grade_name_eng-null").innerHTML=
                            '<input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control is-invalid" value="'+grade_name_eng+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                            '<span class="invalid-feedback">กรอกข้อมูลระดับชั้นภาษาอังกฤษ</span>'                            
                            grade_name_eng_error="yes";
                        }                        

                        if(grade_detail==""){
                            document.getElementById("grade_detail-null").innerHTML =
                            '<input type="text" name="grade_detail" id="grade_detail" class="form-control is-invalid" value="'+grade_detail+'" placeholder="กรอกข้อมูลรายละเอียด" required="required">'+
                            '<span class="invalid-feedback">กรอกข้อมูลระดับชั้น</span>'
                        }else{
                            document.getElementById("grade_detail-null").innerHTML =
                            '<input type="text" name="grade_detail" id="grade_detail" class="form-control" value="'+grade_detail+'" placeholder="กรอกข้อมูลรายละเอียด" required="required">'+
                            '<span>กรอกข้อมูลระดับชั้น</span>'
                        }

                        if(grade_name!="" && grade_name_eng_error!="yes" && grade_detail!=""){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/grade_data/grade_data_process.php",{
                                    action:action,
                                    grade_name:grade_name,
                                    grade_name_eng:grade_name_eng,
                                    grade_detail:grade_detail
                            },function(process_add){
                                var test_process=process_add;
                                    if(test_process.trim()==="no_error"){
                                        let timerInterval;
                                        swalInitAddGradeData.fire({
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
                                                        const b_grade_data = content.querySelector('b_grade_data')
                                                        if (b_grade_data) {
                                                            b_grade_data.textContent = Swal.getTimerLeft();
                                                        }else{}
                                                    }else{}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=grade_data"; 
                                                }else{}
                                            });

                                    }else if(test_process.trim()==="it_error"){
                                        swalInitAddGradeData.fire({
                                            title:'ข้อมูลซ้ำ',
                                            icon:'error'
                                        });                                        
                                    }else{
                                        swalInitAddGradeData.fire({
                                            title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                            icon:'error'
                                        });
                                    }
                                })
                        }else{}

                    }
                }else if (result.dismiss === swal.DismissReason.cancel){
                    //swalInitAddGradeData.fire(
                    //'Cancelled',
                    //'Your imaginary file is safe :)',
                    //'error'
                    //);
                }else{}
            })            
        })   
    })
</script>
<!--Add End-->

<!--Up-->
<script>
    $(document).ready(function(){

// Defaults
        var swalInitUpGradeData = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
// Defaults End


        $('#Up_Grade_data').on('click',function(){

            swalInitUpGradeData.fire({
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
                if(result.value){
                    var action = "update";
                    var grade_name=$("#grade_name").val();
                    var grade_name_eng=$("#grade_name_eng").val();
                    var grade_detail=$("#grade_detail").val();
                    var grade_key=$("#grade_key").val();

                    if(action=="") {
                        swalInitUpGradeData.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            icon: 'error'
                        });
                    }else{

                        if(grade_name==""){
                            document.getElementById("grade_name-null").innerHTML =
                            '<input type="text" name="grade_name" id="grade_name" class="form-control is-invalid" value="'+grade_name+'" placeholder="กรอกข้อมูลระดับชั้น" required="required">'+
                            '<span class="invalid-feedback">กรอกข้อมูลระดับชั้น</span>'
                        }else{
                            document.getElementById("grade_name-null").innerHTML =
                            '<input type="text" name="grade_name" id="grade_name" class="form-control" value="'+grade_name+'" placeholder="กรอกข้อมูลระดับชั้น" required="required">'+
                            '<span>กรอกข้อมูลระดับชั้น</span>'
                        }

                        if(grade_name_eng!=""){
                            if(!grade_name_eng.match(/^([a-z A-Z 0-9 .+-.+/.+_.+*.])+$/i)){
                                document.getElementById("grade_name_eng-null").innerHTML=
                                '<input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control is-invalid" value="'+grade_name_eng+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                                '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'                                    
                                grade_name_eng_error="yes";                                    
                            }else{
                                document.getElementById("grade_name_eng-null").innerHTML=
                                '<input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control" value="'+grade_name_eng+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                                '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'                                    
                                grade_name_eng_error="no";
                            }
                        }else{
                            document.getElementById("grade_name_eng-null").innerHTML=
                            '<input type="text" name="grade_name_eng" id="grade_name_eng" class="form-control is-invalid" value="'+grade_name_eng+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                            '<span class="invalid-feedback">กรอกข้อมูลระดับชั้นภาษาอังกฤษ</span>'                            
                            grade_name_eng_error="yes";
                        }                        

                        if(grade_detail==""){
                            document.getElementById("grade_detail-null").innerHTML =
                            '<input type="text" name="grade_detail" id="grade_detail" class="form-control is-invalid" value="'+grade_detail+'" placeholder="กรอกข้อมูลรายละเอียด" required="required">'+
                            '<span class="invalid-feedback">กรอกข้อมูลระดับชั้น</span>'
                        }else{
                            document.getElementById("grade_detail-null").innerHTML =
                            '<input type="text" name="grade_detail" id="grade_detail" class="form-control" value="'+grade_detail+'" placeholder="กรอกข้อมูลรายละเอียด" required="required">'+
                            '<span>กรอกข้อมูลระดับชั้น</span>'
                        }

                        if(grade_name!="" && grade_name_eng_error!="yes" && grade_detail!=""){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/grade_data/grade_data_process.php",{
                                    action:action,
                                    grade_name:grade_name,
                                    grade_name_eng:grade_name_eng,
                                    grade_detail:grade_detail,
                                    grade_key:grade_key
                            },function(process_add){
                                var test_process=process_add;
                                    if(test_process.trim()==="no_error"){
                                        let timerInterval;
                                        swalInitUpGradeData.fire({
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
                                                        const b_grade_data = content.querySelector('b_grade_data')
                                                        if (b_grade_data) {
                                                            b_grade_data.textContent = Swal.getTimerLeft();
                                                        }else{}
                                                    }else{}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=grade_data"; 
                                                }else{}
                                            });

                                    }else if(test_process.trim()==="it_error"){
                                        swalInitUpGradeData.fire({
                                            title:'ข้อมูลซ้ำ',
                                            icon:'error'
                                        });                                        
                                    }else{
                                        swalInitUpGradeData.fire({
                                            title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                            icon:'error'
                                        });
                                    }
                                })
                        }else{}

                    }
                }else if (result.dismiss === swal.DismissReason.cancel){
                    //swalInitUpGradeData.fire(
                    //'Cancelled',
                    //'Your imaginary file is safe :)',
                    //'error'
                    //);
                }else{}
            })            
        })   
    })
</script>
<!--Up End-->

<!--Show Data-->
<script>
        $(document).ready(function(){
            
            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/grade_data/grade_data_show.php",{

            },function(run_data_gd){
                $("#run_data_sd").html(run_data_gd)
            })
        })
</script>
<!--Show Data End-->

<script>
    
$(document).ready(function() {
        $('#term_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data";
        })
    })

    $(document).ready(function() {
        $('#grade_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_data";
        })
    })

    $(document).ready(function() {
        $('#course_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_data";
        })
    })

    $(document).ready(function() {
        $('#classroom_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data";
        })
    })
</script>