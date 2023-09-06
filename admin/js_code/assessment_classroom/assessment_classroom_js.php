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

//$YYYY=date("y");
?>
<?php check_login('admin_username_aba', 'login.php'); ?>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

<script>
var DatatableButtons_STD = function() {
    // Basic Datatable examples
    var _componentDatatableButtons_STD = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }
        // Setting datatable defaults
        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Search:</span> _INPUT_',
                searchPlaceholder: 'Type to search...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
            }
        });

        // Apply custom style to select
        $.extend($.fn.dataTableExt.oStdClasses, {
            "sLengthSelect": "custom-select"
        });


        // Basic initialization
        $('.datatable-button-html5-basic').DataTable({
            /*buttons: {            
                dom: {
                    button: {
                        className: 'btn btn-light'
                    }
                },
                buttons: [
                    'copyHtml5',
                    'excelHtml5'
                ]
            }*/
        });

        // Column selectors
        $('.datatable-button-html5-columns-STD').DataTable({
            /*buttons: {            
                buttons: [
                    {
                        extend: 'copyHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        className: 'btn btn-light',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="icon-three-bars"></i>',
                        className: 'btn btn-primary btn-icon dropdown-toggle'
                    }
                ]
            }*/

            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            }],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25 ,50, 100,"All"]
            ]

        });

    };

    return {
        init: function() {
            _componentDatatableButtons_STD();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    DatatableButtons_STD.init();
});
</script>

<script>
var Select2Selects = function() {
    // Select2 examples
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Default initialization
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });

        $('.select-search').select2();


    };

    return {
        init: function() {
            _componentSelect2();
        }
    }
}();

document.addEventListener('DOMContentLoaded', function() {
    Select2Selects.init();
});
</script>

<script>
    $(document).ready(function() {
        $('#check_term').on('change', function() {
            var check_term = $("#check_term").val();
            var copy_list=$("#copy_list").val();
            var list=btoa(copy_list);
            var check_term_key=btoa(check_term);
            document.location ="<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom&list="+list+"&check_term="+check_term_key;
        })
    })
</script>

<!--Add-->
<script>
	var ABA_Addassessment_classroom = function () {
            var _componentABA_Addassessment_classroom = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitAddAssessmentClassroom = swal.mixin({
                    buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-light',
                            denyButton: 'btn btn-light',
                            input: 'form-control'
                        }
                });
// Defaults End

//--------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------
		$('#Add_assessment_classroom').on('click', function() {
            swalInitAddAssessmentClassroom.fire({
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
                if(result.value) {
                   
					var action="create";
                    
                    var classroomid=$("#classroomid").val();
                    var teacher1=$("#teacher1").val();
                    var position1=$("#position1").val();
                    var teacher2=$("#teacher2").val();
                    var teacher_esl=$("#teacher_esl").val();
                    var teacher3=$("#teacher3").val();

                    var term=$("#term").val();
                    var grade=$("#grade").val();

                    var list=$("#Add_assessment_classroom").val();
                        //td_id=btoa(list);


                        if(action=="" && term=="" && grade==""){
                            swalInitAddAssessmentClassroom.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else if(action=="" || term=="" || grade==""){
                            swalInitAddAssessmentClassroom.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });                            
                        }else{
                            
                        if(classroomid==""){
                            document.getElementById("classroomid-null").innerHTML='<span style="color: red;">กรุณาเลือก ห้องเรียน</span>';
                        }else{
                            document.getElementById("classroomid-null").innerHTML='<span></span>';
                        }    

                        if(teacher1==""){
                            document.getElementById("teacher1-null").innerHTML='<span style="color: red;">กรุณาเลือก ครูประจำชั้น(Eng)</span>';
                        }else{
                            document.getElementById("teacher1-null").innerHTML='<span></span>';
                        }

                        if(position1==""){
                            document.getElementById("position1-null").innerHTML='<span style="color: red;">กรุณาเลือก ตำแหน่งครูประจำชั้น</span>';
                        }else{
                            document.getElementById("position1-null").innerHTML='<span></span>';
                        }

                        if(teacher2==""){
                            document.getElementById("teacher2-null").innerHTML='<span style="color: red;">กรุณาเลือก ครูประจำชั้น(Tha)</span>';
                        }else{
                            document.getElementById("teacher2-null").innerHTML='<span></span>';
                        }

                        if(teacher_esl==""){
                            document.getElementById("teacher_esl-null").innerHTML='<span style="color: red;">กรุณาเลือก ครูผู้สอน(ESL)</span>';
                        }else{
                            document.getElementById("teacher_esl-null").innerHTML='<span></span>';
                        }

                        if(teacher3==""){
                            document.getElementById("teacher3-null").innerHTML='<span style="color: red;">กรุณาเลือก ฝ่ายวิชาการ</span>';
                        }else{
                            document.getElementById("teacher3-null").innerHTML='<span></span>';
                        }
                            
                        


                            if(classroomid!="" && teacher1!="" && position1!="" && teacher2!="" && teacher_esl!="" && teacher3!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_classroom/assessment_classroom_process.php",{
                                    action:action,
                                    classroomid:classroomid,
                                    teacher1:teacher1,
                                    position1:position1,
                                    teacher2:teacher2,
                                    teacher_esl:teacher_esl,
                                    teacher3:teacher3,
                                    term:term,
                                    grade:grade

                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitAddAssessmentClassroom.fire({
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
                                                            const b_assessment_classroom = content.querySelector('b_assessment_classroom')
                                                            if (b_assessment_classroom) {
                                                                b_assessment_classroom.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom&list="+btoa(list)+"&check_term="+btoa(term); 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitAddAssessmentClassroom.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitAddAssessmentClassroom.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddAssessmentClassroom.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddAssessmentClassroom.fire(
                        //'Cancelled',
                        //'Your imaginary file is safe :)',
                        //'error'
                    //);
                }else{
//--------------------------------------------------------------------------------------					
				}
            });
        });

//--------------------------------------------------------------------------------------
            };
//--------------------------------------------------------------------------------------
        return {
            initComponentsAddAssessmentClassroom: function() {
                _componentABA_Addassessment_classroom();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Addassessment_classroom.initComponentsAddAssessmentClassroom();
    });
</script>
<!--Add End-->

<!--Up-->
<script>
	var ABA_Upassessment_classroom = function () {
            var _componentABA_Upassessment_classroom = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpAssessmentClassroom = swal.mixin({
                    buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-light',
                            denyButton: 'btn btn-light',
                            input: 'form-control'
                        }
                });
// Defaults End

//--------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------
		$('#Up_assessment_classroom').on('click', function() {
            swalInitUpAssessmentClassroom.fire({
                title: 'ต้องการแก้ไขข้อมูลหรือไม่',
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
                if(result.value) {
                   
					var action="update";
                    
                    var classroomid=$("#classroomid").val();
                    var teacher1=$("#teacher1").val();
                    var position1=$("#position1").val();
                    var teacher2=$("#teacher2").val();
                    var teacher_esl=$("#teacher_esl").val();
                    var teacher3=$("#teacher3").val();

                    var term=$("#term").val();
                    var grade=$("#grade").val();
                    var a_classroom_id=$("#a_classroom_id").val();


                    var list=$("#Up_assessment_classroom").val();
                        //td_id=btoa(list);

                        if(action=="" && term=="" && grade==""){
                            swalInitUpAssessmentClassroom.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else if(action=="" || term=="" || grade==""){
                            swalInitUpAssessmentClassroom.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });                            
                        }else{
                            
                        if(classroomid==""){
                            document.getElementById("classroomid-null").innerHTML='<span style="color: red;">กรุณาเลือก ห้องเรียน</span>';
                        }else{
                            document.getElementById("classroomid-null").innerHTML='<span></span>';
                        }    

                        if(teacher1==""){
                            document.getElementById("teacher1-null").innerHTML='<span style="color: red;">กรุณาเลือก ครูประจำชั้น(Eng)</span>';
                        }else{
                            document.getElementById("teacher1-null").innerHTML='<span></span>';
                        }

                        if(position1==""){
                            document.getElementById("position1-null").innerHTML='<span style="color: red;">กรุณาเลือก ตำแหน่งครูประจำชั้น</span>';
                        }else{
                            document.getElementById("position1-null").innerHTML='<span></span>';
                        }

                        if(teacher2==""){
                            document.getElementById("teacher2-null").innerHTML='<span style="color: red;">กรุณาเลือก ครูประจำชั้น(Tha)</span>';
                        }else{
                            document.getElementById("teacher2-null").innerHTML='<span></span>';
                        }

                        if(teacher_esl==""){
                            document.getElementById("teacher_esl-null").innerHTML='<span style="color: red;">กรุณาเลือก ครูผู้สอน(ESL)</span>';
                        }else{
                            document.getElementById("teacher_esl-null").innerHTML='<span></span>';
                        }

                        if(teacher3==""){
                            document.getElementById("teacher3-null").innerHTML='<span style="color: red;">กรุณาเลือก ฝ่ายวิชาการ</span>';
                        }else{
                            document.getElementById("teacher3-null").innerHTML='<span></span>';
                        }
                            
                        


                            if(classroomid!="" && teacher1!="" && position1!="" && teacher2!="" && teacher_esl!="" && teacher3!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_classroom/assessment_classroom_process.php",{
                                    action:action,
                                    classroomid:classroomid,
                                    teacher1:teacher1,
                                    position1:position1,
                                    teacher2:teacher2,
                                    teacher_esl:teacher_esl,
                                    teacher3:teacher3,
                                    term:term,
                                    grade:grade,
                                    a_classroom_id:a_classroom_id

                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitUpAssessmentClassroom.fire({
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
                                                            const b_assessment_classroom = content.querySelector('b_assessment_classroom')
                                                            if (b_assessment_classroom) {
                                                                b_assessment_classroom.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=assessment_classroom&list="+btoa(list)+"&check_term="+btoa(term);
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitUpAssessmentClassroom.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitUpAssessmentClassroom.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitUpAssessmentClassroom.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitUpAssessmentClassroom.fire(
                        //'Cancelled',
                        //'Your imaginary file is safe :)',
                        //'error'
                    //);
                }else{
//--------------------------------------------------------------------------------------					
				}
            });
        });

//--------------------------------------------------------------------------------------
            };
//--------------------------------------------------------------------------------------
        return {
            initComponentsUpAssessmentClassroom: function() {
                _componentABA_Upassessment_classroom();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Upassessment_classroom.initComponentsUpAssessmentClassroom();
    });
</script>
<!--Up End-->