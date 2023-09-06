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
            "paging" : false,
            "lengehChange": false,
            "searching": true,
            "ordering": false,
            "autoWidth": false

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

<!--Addclassroom_acs-->
<script>
	var ABA_Addclassroom_acs = function () {
            var _componentABA_Addclassroom_acs = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitAddClassroomAcs = swal.mixin({
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
		$('#Add_classroom_acs').on('click', function() {
            swalInitAddClassroomAcs.fire({
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
                   
					var action="create_form_classroom";
                    var classroom=$("#classroom").val();
                    var id=$("#id").val();
                    var cid=$("#cid").val();
                    var term=$("#term").val();
                    var grade=$("#grade").val();

                    var term_key=btoa(term);
                    var grade_key=btoa(grade);
                    var id_key=btoa(id);

                   
                        if(action==""){
                            swalInitAddClassroomAcs.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{

                            if(classroom==""){
                                document.getElementById("classroom-null").innerHTML='<span style="color: red;">กรุณาเลือก ห้องเรียน</span>';
                            }else{
                                document.getElementById("classroom-null").innerHTML='<span></span>';
                            }

                            if(classroom!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_classroom_show/assessment_classroom_show_process.php",{
                                    action:action,
                                    id:id,
                                    cid:cid,
                                    term:term,
                                    grade:grade,
                                    classroom:classroom

                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitAddClassroomAcs.fire({
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
                                                            const b_classroom_acs = content.querySelector('b_classroom_acs')
                                                            if (b_classroom_acs) {
                                                                b_classroom_acs.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom_show&id="+id_key+"&check_term="+term_key+"&check_grade="+grade_key+""; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitAddClassroomAcs.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitAddClassroomAcs.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddClassroomAcs.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddClassroomAcs.fire(
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
            initComponentsAddClassroomAcs: function() {
                _componentABA_Addclassroom_acs();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Addclassroom_acs.initComponentsAddClassroomAcs();
    });
</script>
<!--Addclassroom_acs End-->

<!--Addstudent_acs-->
<script>
	var ABA_Addstudent_acs = function () {
            var _componentABA_Addstudent_acs = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitAddStudentAcs = swal.mixin({
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
		$('#Add_student_acs').on('click', function() {
            swalInitAddStudentAcs.fire({
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
                   
					var action="create_form_student";
                    var student_id=$("#student_id").val();
                    var id=$("#id").val();
                    var class_id=$("#class_id").val();
                    var term=$("#term").val();
                    var grade=$("#grade").val();
                    var memo=$("#memo").val();
                    var term_key=btoa(term);
                    var grade_key=btoa(grade);
                    var id_key=btoa(id);

                   
                        if(action==""){
                            swalInitAddStudentAcs.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{

                            if(student_id==""){
                                document.getElementById("student_id-null").innerHTML='<span style="color: red;">กรุณาเลือก นักเรียน</span>';
                            }else{
                                document.getElementById("student_id-null").innerHTML='<span></span>';
                            }

                            if(student_id!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_classroom_show/assessment_classroom_show_process.php",{
                                    action:action,
                                    id:id,
                                    class_id:class_id,
                                    term:term,
                                    grade:grade,
                                    student_id:student_id,
                                    memo:memo

                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitAddStudentAcs.fire({
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
                                                            const b_student_acs = content.querySelector('b_student_acs')
                                                            if (b_student_acs) {
                                                                b_student_acs.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom_show&id="+id_key+"&check_term="+term_key+"&check_grade="+grade_key+""; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitAddStudentAcs.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitAddStudentAcs.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddStudentAcs.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }

                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddStudentAcs.fire(
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
            initComponentsAddStudentAcs: function() {
                _componentABA_Addstudent_acs();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Addstudent_acs.initComponentsAddStudentAcs();
    });
</script>
<!--Addstudent_acs End-->



<!--Updata_student-->
<script>
	var ABA_Updata_student = function () {
            var _componentABA_Updata_student = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpDataStudent = swal.mixin({
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
		$('#Up_student_acs').on('click', function() {
            swalInitUpDataStudent.fire({
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
                   
					var action="create_form_student_class";
                    var classroom=$("#classroom").val();
                    var id=$("#id").val();
                    var cid=$("#cid").val();
                    var check_term=$("#check_term").val();
                    var check_grade=$("#check_grade").val();
                    var status=$("#status").val();

                    var term_key=btoa(check_term);
                    var grade_key=btoa(check_grade);
                    var id_key=btoa(id);

                    var dateout=$("#dateout").val();
                    var stu_no=$("#stu_no").val();
                    var student_id=$("#student_id").val();

                        if(action==""){
                            swalInitUpDataStudent.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{

                            if(status==""){
                                document.getElementById("status-null").innerHTML='<span style="color: red;">กรุณาเลือก สถานะนักเรียน</span>';
                            }else{
                                document.getElementById("status-null").innerHTML='<span></span>';
                            }

                            if(status!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/assessment_classroom_show/assessment_classroom_show_process.php",{
                                    action:action,
                                    classroom:classroom,
                                    cid:cid,
                                    check_term:check_term,
                                    check_grade:check_grade,
                                    status:status,
                                    dateout:dateout,
                                    stu_no:stu_no,
                                    student_id:student_id

                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitUpDataStudent.fire({
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
                                                            const b_student_acs = content.querySelector('b_student_acs')
                                                            if (b_student_acs) {
                                                                b_student_acs.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>?modules=assessment_classroom_show&list="+btoa('data_student')+"&student_id="+btoa(student_id)+"&id="+id_key+"&check_term="+term_key+"&check_grade="+grade_key; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitUpDataStudent.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitUpDataStudent.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitUpDataStudent.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitUpDataStudent.fire(
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
            initComponentsUpDataStudent: function() {
                _componentABA_Updata_student();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Updata_student.initComponentsUpDataStudent();
    });
</script>
<!--Updata_student End-->



<script>
var DateTimePickers = function() {
// Daterange picker
_componentDaterange

var _componentDaterange = function() {
    if (!$().daterangepicker) {
        console.warn('Warning - daterangepicker.js is not loaded.');
        return;
    }
};

// Pickadate picker
var _componentPickadate = function() {
    if (!$().pickadate) {
        console.warn('Warning - picker.js and/or picker.date.js is not loaded.');
        return;
    }

    // Accessibility labels
    $('.pickadate-accessibility').pickadate({
        labelMonthNext: 'Go to the next month',
        labelMonthPrev: 'Go to the previous month',
        labelMonthSelect: 'Pick a month from the dropdown',
        labelYearSelect: 'Pick a year from the dropdown',
        selectMonths: true,
        selectYears: true,
        //selectYears: 70,
        format: 'yyyy-mm-dd'
    });

};

// Pickatime picker
var _componentPickatime = function() {
    if (!$().pickatime) {
        console.warn('Warning - picker.js and/or picker.time.js is not loaded.');
        return;
    }

    // Default functionality
    $('.pickatime').pickatime();

    // Clear button
    $('.pickatime-clear').pickatime({
        clear: ''
    });

    // Time formats
    $('.pickatime-format').pickatime({

        // Escape any “rule” characters with an exclamation mark (!).
        format: 'T!ime selected: h:i a',
        formatLabel: '<b>h</b>:i <!i>a</!i>',
        formatSubmit: 'HH:i',
        hiddenPrefix: 'prefix__',
        hiddenSuffix: '__suffix'
    });

    // Send hidden value
    $('.pickatime-hidden').pickatime({
        formatSubmit: 'HH:i',
        hiddenName: true
    });

    // Editable input
    $('.pickatime-editable').pickatime({
        editable: true
    });

    // Time intervals
    $('.pickatime-intervals').pickatime({
        interval: 150
    });


    // Time limits
    $('.pickatime-limits').pickatime({
        min: [7,30],
        max: [14,0]
    });

    // Using integers as hours
    $('.pickatime-limits-integers').pickatime({
        disable: [
            3, 5, 7
        ]
    });

    // Disable times
    $('.pickatime-disabled').pickatime({
        disable: [
            [0,30],
            [2,0],
            [8,30],
            [9,0]
        ]
    });

    // Disabling ranges
    $('.pickatime-range').pickatime({
        disable: [
            1,
            [1, 30, 'inverted'],
            { from: [4, 30], to: [10, 30] },
            [6, 30, 'inverted'],
            { from: [8, 0], to: [9, 0], inverted: true }
        ]
    });

    // Disable all with exeption
    $('.pickatime-disableall').pickatime({
        disable: [
            true,
            3, 5, 7,
            [0,30],
            [2,0],
            [8,30],
            [9,0]
        ]
    });

    // Events
    $('.pickatime-events').pickatime({
        onStart: function() {
            console.log('Hello there :)')
        },
        onRender: function() {
            console.log('Whoa.. rendered anew')
        },
        onOpen: function() {
            console.log('Opened up')
        },
        onClose: function() {
            console.log('Closed now')
        },
        onStop: function() {
            console.log('See ya.')
        },
        onSet: function(context) {
            console.log('Just set stuff:', context)
        }
    });
};

return {
    init: function() {
        _componentDaterange();
        _componentPickadate();
        _componentPickatime();
    }
}

}();

document.addEventListener('DOMContentLoaded', function() {
DateTimePickers.init();
});
</script>