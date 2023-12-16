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
            var swalInitAddCourseData = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
            // Defaults End

            $('#button_course_add').on('click', function() {
                swalInitAddCourseData.fire({
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
                }).then(function(result) {
                    if (result.value) {
                        var action=$("#button_course_add").val();
                        var txtname=$("#txtname").val();
                        var txtnameen=$("#txtnameen").val();
                        var txtnamecn=$("#txtnamecn").val();

                        var error_add=0;

                            if(txtname===""){
                                document.getElementById("txtname-null").innerHTML =
                                '<div id="txtname-null">'+
                                '   <div class="form-group row">'+
                                '       <label class="col-form-label col-<?php echo $grid;?>-2 font-weight-semibold text-danger">หลักสูตร (TH)</label>'+
                                '           <div class="col-<?php echo $grid;?>-10">'+
                                '               <input name="txtname" id="txtname" type="text" class="form-control is-invalid" placeholder="กรอกข้อมูลหลักสูตร (TH)..." value="'+txtname+'">'+
                                '               <span class="text-danger"> กรุณากรอกข้อมูลหลักสูตร (TH)</span>'+
                                '           </div>'+
                                '   </div>'+
                                '</div>';
                                error_add=error_add+1;
                            }else{
                                document.getElementById("txtname-null").innerHTML =
                                '<div id="txtname-null">'+
                                '   <div class="form-group row">'+
                                '       <label class="col-form-label col-<?php echo $grid;?>-2 font-weight-semibold text-success">หลักสูตร (TH)</label>'+
                                '           <div class="col-<?php echo $grid;?>-10">'+
                                '               <input name="txtname" id="txtname" type="text" class="form-control is-valid" placeholder="กรอกข้อมูลหลักสูตร (TH)..." value="'+txtname+'">'+
                                '           </div>'+
                                '   </div>'+
                                '</div>';
                                error_add=error_add+0;
                            }

                            if(action!=="create"){
                                swalInitAddCourseData.fire({
                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                    icon: 'error'
                                });
                            }else{
                                if(error_add>=1){

                                }else{
                                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/course/course_process.php",{
                                        action:action,
                                        txtname:txtname,
                                        txtnameen:txtnameen,
                                        txtnamecn:txtnamecn
                                    },function(txt_add){
                                        var txt_add=txt_add.trim();
                                            if(txt_add==="NotError"){

                                                let timerInterval;
                                                    swalInitAddCourseData.fire({
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
                                                                    const b_course = content.querySelector('b_course')
                                                                    if (b_course) {
                                                                        b_course.textContent = Swal.getTimerLeft();
                                                                    } else {}
                                                                } else {}
                                                            }, 100);
                                                        },
                                                        willClose: function() {
                                                            clearInterval(timerInterval)
                                                        }
                                                    }).then(function(result) {
                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course";
                                                        } else {}
                                                    });

                                            }else if(txt_add==="Error"){
                                                swalInitAddCourseData.fire({
                                                    title: 'บันทึกไม่สำเร็จ',
                                                    icon: 'error'
                                                });                                               
                                            }else{}
                                    })
                                }
                            }
                    }else if(result.dismiss === swal.DismissReason.cancel){
                        swalInitAddCourseData.fire({
                            title: 'พบข้อผิดพลาดไมาสามารถดำเนินการได้',
                            icon: 'error'
                        });  
                    }else{}

                });

            })

         })
    </script>

    <script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();
                if(run_show==="show"){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/course/course_show.php",{
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