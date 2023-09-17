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

    <script type="text/javascript">
		function setScreenHWCookie() {
			$.cookie('sw', screen.width);
			//$.cookie('sh',screen.height);
			return true;
		}
		setScreenHWCookie();
	</script>

	<?php
        $width_system = filter_input(INPUT_COOKIE, 'sw');
            if (($width_system >= 1200)) {
                $grid = "xl";
            } elseif (($width_system >= 992)) {
                $grid = "lg";
            } elseif (($width_system <= 768)) {
                $grid = "md";
            } elseif (($width_system <= 576)) {
                $grid = "sm";
            } else {
                $grid = "xs";
            }
	?>


<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script>
    $(document).ready(function(){
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });
    })
</script>
	
<!--Show Data All-->
    <script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();
                if(run_show==="show"){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/manage_video/manage_video_show.php",{
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

    <script>
        $(document).ready(function(){
            $('.summernote').summernote();
        })
    </script>

<!--Add-->
    <script>
        $(document).ready(function(){

// Defaults
            var swalInitManageVideoData = swal.mixin({
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
                swalInitManageVideoData.fire({
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
                    if(result.value){
                        var action=$("#action").val();
                        var videos_topic=$("#videos_topic").val();
                        var videos_youtube=$("#videos_youtube").val();
                        var videos_detail=$("#videos_detail").val();
                        var videos_status=$("#videos_status").val();

                            if(action==="add"){

                                if(videos_topic===""){
                                    document.getElementById("videos_topic-null").innerHTML=
                                    '<div class="form-group row">'
                                    +'  <label class="col-form-label col-<?php echo $grid; ?>-2 font-weight-semibold text-danger">หัวข้อเรื่อง</label>'
                                    +'  <div class="col-<?php echo $grid; ?>-10">'
                                    +'      <input type="text" name="videos_topic" id="videos_topic" class="form-control is-invalid" value="'+videos_topic+'" placeholder="หัวข้อเรื่อง" reduired="reduired">'
                                    +'      <span class="invalid-feedback">กรุณากรอก หัวข้อเรื่อง</span>'
                                    +'  </div>'
                                    +'</div>';
                                }else{
                                    

                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/manage_video/manage_video_process.php",{
                                    action:action,
                                    videos_topic:videos_topic,
                                    videos_youtube:videos_youtube,
                                    videos_detail:videos_detail,
                                    videos_status:videos_status
                                },function(process_up){
                                    var test_process=process_up;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitManageVideoData.fire({
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
                                                            const b_student_data = content.querySelector('b_student_data')
                                                            if (b_student_data) {
                                                                b_student_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=manage_video"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitManageVideoData.fire({
                                                title:'บันทึกไม่สำเร็จ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitManageVideoData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                               

                                }                             
                            }else{
                                swalInitManageVideoData.fire({
                                    title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                    icon:'error'
                                });
                            }

                    }else if(result.dismiss === swal.DismissReason.cancel){

                    }else{}
                })
            })

        })
    </script>
<!--Add end-->


<!--edit-->
    <script>
        $(document).ready(function(){

// Defaults
            var swalInitManageVideoData = swal.mixin({
                buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
            });
// Defaults End

            $('#sub_edit').on('click', function() {
                swalInitManageVideoData.fire({
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
                    if(result.value){
                        var videos_id=$("#videos_id").val();
                        var action=$("#action").val();
                        var videos_topic=$("#videos_topic").val();
                        var videos_youtube=$("#videos_youtube").val();
                        var videos_detail=$("#videos_detail").val();
                        var videos_status=$("#videos_status").val();

                            if(action==="edit"){

                                if(videos_topic===""){
                                    document.getElementById("videos_topic-null").innerHTML=
                                    '<div class="form-group row">'
                                    +'  <label class="col-form-label col-<?php echo $grid; ?>-2 font-weight-semibold text-danger">หัวข้อเรื่อง</label>'
                                    +'  <div class="col-<?php echo $grid; ?>-10">'
                                    +'      <input type="text" name="videos_topic" id="videos_topic" class="form-control is-invalid" value="'+videos_topic+'" placeholder="หัวข้อเรื่อง" reduired="reduired">'
                                    +'      <span class="invalid-feedback">กรุณากรอก หัวข้อเรื่อง</span>'
                                    +'  </div>'
                                    +'</div>';
                                }else{
                                    

                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/manage_video/manage_video_process.php",{
                                    action:action,
                                    videos_id:videos_id,
                                    videos_topic:videos_topic,
                                    videos_youtube:videos_youtube,
                                    videos_detail:videos_detail,
                                    videos_status:videos_status
                                },function(process_up){
                                    var test_process=process_up;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitManageVideoData.fire({
                                                title: 'แก้ไขข้อมูลสำเร็จ',
                                                //html: 'I will close in <b></b> milliseconds.',
                                                timer: 1200,
                                                icon: 'success',
                                                timerProgressBar: true,
                                                didOpen: function() {
                                                    Swal.showLoading()
                                                    timerInterval = setInterval(function() {
                                                        const content = Swal.getContent();
                                                        if (content) {
                                                            const b_student_data = content.querySelector('b_student_data')
                                                            if (b_student_data) {
                                                                b_student_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=manage_video"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitManageVideoData.fire({
                                                title:'แก้ไขข้อมูลไม่สำเร็จ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitManageVideoData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                               

                                }                             
                            }else{
                                swalInitManageVideoData.fire({
                                    title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                    icon:'error'
                                });
                            }

                    }else if(result.dismiss === swal.DismissReason.cancel){

                    }else{}
                })
            })

        })
    </script>
<!--edit end-->