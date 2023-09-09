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
<?php check_login('admin_username_lcm', 'login.php'); ?>

<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>-->
<!-- <script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script> -->


<script>
    var DatatableCourseData = function() {


        //
        // Setup module components
        //

        // Basic Datatable examples
        var _componentDatatableCourseData = function() {
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
                    columnDefs: [{
                    "targets": '_all',
                    "createdCell": function(td, cellData, rowData, row, col) {
                        $(td).css('padding', '4px')
                    }
                }],
                "paging" : false,
                "lengehChange": false,
                "searching": false,
                "ordering": false,
                "autoWidth": false
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
                    [10, 25, 50, 100, "All"]
                ]



            });



        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentDatatableCourseData();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        DatatableCourseData.init();
    });
</script>
<!-- /theme JS files -->


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

<!--Add-->
<script>
    var SA_AddCourseData = function() {
        var _componentSA_AddCourseData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
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

            //--------------------------------------------------------------------------------------
            //--------------------------------------------------------------------------------------
            $('#Add_check_subject').on('click', function() {
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

                        var action = "create";
                        var name = $("#name").val();
                        var ename = $("#ename").val();
                        var grade = $("#grade").val();
                        var cy = $("#cy").val();
                        var cy_error = "error";
                        var note = $("#note").val();

                        if (action == "") {
                            swalInitAddCourseData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (name == "") {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล เช็ครายวิชา</span>';
                            } else {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลเช็ครายวิชา</span>';
                            }

                            if (cy == "") {
                                document.getElementById("add-cy-null").innerHTML =
                                    '<input type="text" name="cy" id="cy" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูลปี เช่น 1 , 2 , 3</span>';
                            } else {
                                if (!cy.match(/^([0-9])+$/i)) {
                                    document.getElementById("add-cy-null").innerHTML =
                                        '<input type="text" name="cy" id="cy" class="form-control is-invalid" value="' + cy + '" placeholder="" required="required">' +
                                        '<span class="invalid-feedback">กรอกข้อมูลปี เช่น 1 , 2 , 3 เป็นตัวเลข</span>';
                                    cy_error = "error";
                                } else {
                                    document.getElementById("add-cy-null").innerHTML =
                                        '<input type="text" name="cy" id="cy" class="form-control" value="' + cy + '" placeholder="" required="required">' +
                                        '<span>กรอกข้อมูลปี เช่น 1 , 2 , 3</span>';
                                    cy_error = "no_error";
                                }
                            }

                            if (grade == "") {
                                document.getElementById("add-grade-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ระดับชั้น</span>';
                            } else {
                                document.getElementById("add-grade-null").innerHTML = '<span></span>';
                            }

                            if (name != "" && cy != "" && cy_error != "error" && grade != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/check_subject/check_subject_process.php", {
                                    action: action,
                                    name: name,
                                    ename: ename,
                                    grade: grade,
                                    cy: cy,
                                    note: note
                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

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
                                                        const b_check_subject = content.querySelector('b_check_subject')
                                                        if (b_check_subject) {
                                                            b_check_subject.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject";
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitAddCourseData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitAddCourseData.fire({
                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + process_add.trim(),
                                            icon: 'error'
                                        });
                                    }
                                })
                            } else {}
                        }
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        //swalInitLogout.fire(
                        //'Cancelled',
                        //'Your imaginary file is safe :)',
                        //'error'
                        //);
                    } else {
                        //--------------------------------------------------------------------------------------					
                    }
                });
            });

            //--------------------------------------------------------------------------------------
        };
        //--------------------------------------------------------------------------------------
        return {
            initComponentsAddCourseData: function() {
                _componentSA_AddCourseData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_AddCourseData.initComponentsAddCourseData();
    });
</script>
<!--Add End-->

<!--Add Subject Data -->
<script>
    var SA_AddSubjectData = function() {
        var _componentSA_AddSubjectData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddSubjectData = swal.mixin({
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
            $('#Add_Subject_Data').on('click', function() {
                swalInitAddSubjectData.fire({
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

                        var action = "create_subject";
                        var course_key = $("#course_key").val();
                        var subjectid = $("#subjectid").val();
                        var id_key = btoa(course_key);

                        if (action == "") {
                            swalInitAddSubjectData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {


                            if (subjectid != "") {
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/check_subject/check_subject_process.php", {
                                    action: action,
                                    course_key: course_key,
                                    subjectid: subjectid

                                }, function(process_edit) {

                                    let timerInterval;
                                    swalInitAddSubjectData.fire({
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
                                                    const b_subject_data = content.querySelector('b_subject_data')
                                                    if (b_subject_data) {
                                                        b_subject_data.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=show&id=" + id_key;
                                        } else {}
                                    });


                                })
                            } else {}
                        }
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        //swalInitLogout.fire(
                        //'Cancelled',
                        //'Your imaginary file is safe :)',
                        //'error'
                        //);
                    } else {
                        //--------------------------------------------------------------------------------------					
                    }
                });
            });

            //--------------------------------------------------------------------------------------
        };
        //--------------------------------------------------------------------------------------
        return {
            initComponentsAddSubjectData: function() {
                _componentSA_AddSubjectData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_AddSubjectData.initComponentsAddSubjectData();
    });
</script>
<!--Add Subject Data End-->

<!--Update-->
<script>
    var SA_UpCourseData = function() {
        var _componentSA_UpCourseData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitUpCourseData = swal.mixin({
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
            $('#Update_check_subject').on('click', function() {

                swalInitUpCourseData.fire({
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
                    if (result.value) {
                        var action = "update";
                        var name = $("#name").val();
                        var ename = $("#ename").val();
                        var grade = $("#grade").val();
                        var cy = $("#cy").val();
                        var cy_error = "error";
                        var note = $("#note").val();
                        var course_key = $("#course_key").val();
                        var id_key = btoa(course_key);

                        // document.getElementById("test1").innerHTML=""+name+" "+ename+" "+grade+" "+cy+" "+note+" "+course_key;

                        if (action == "") {
                            swalInitUpCourseData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (name == "") {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล เช็ครายวิชา</span>';
                            } else {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลเช็ครายวิชา</span>';
                            }

                            if (cy == "") {
                                document.getElementById("add-cy-null").innerHTML =
                                    '<input type="text" name="cy" id="cy" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูลปี เช่น 1 , 2 , 3</span>';
                            } else {
                                if (!cy.match(/^([0-9])+$/i)) {
                                    document.getElementById("add-cy-null").innerHTML =
                                        '<input type="text" name="cy" id="cy" class="form-control is-invalid" value="' + cy + '" placeholder="" required="required">' +
                                        '<span class="invalid-feedback">กรอกข้อมูลปี เช่น 1 , 2 , 3 เป็นตัวเลข</span>';
                                    cy_error = "error";
                                } else {
                                    document.getElementById("add-cy-null").innerHTML =
                                        '<input type="text" name="cy" id="cy" class="form-control" value="' + cy + '" placeholder="" required="required">' +
                                        '<span>กรอกข้อมูลปี เช่น 1 , 2 , 3</span>';
                                    cy_error = "no_error";
                                }
                            }

                            if (grade == "") {
                                document.getElementById("add-grade-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ระดับชั้น</span>';
                            } else {
                                document.getElementById("add-grade-null").innerHTML = '<span></span>';
                            }

                            if (name != "" && cy != "" && cy_error != "error" && grade != "") {

                                // document.getElementById("test2").innerHTML=""+name+" "+ename+" "+grade+" "+cy+" "+cy_error+" "+note+" "+course_key;

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/check_subject/check_subject_process.php", {
                                    action: action,
                                    name: name,
                                    ename: ename,
                                    grade: grade,
                                    cy: cy,
                                    cy_error: cy_error,
                                    note: note,
                                    course_key: course_key
                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitUpCourseData.fire({
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
                                                        const b_check_subject = content.querySelector('b_check_subject')
                                                        if (b_check_subject) {
                                                            b_check_subject.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=" + grade;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitUpCourseData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitUpCourseData.fire({
                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                            icon: 'error'
                                        });
                                    }
                                })
                            } else {}
                        }
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        //swalInitLogout.fire(
                        //'Cancelled',
                        //'Your imaginary file is safe :)',
                        //'error'
                        //);
                    } else {
                        //--------------------------------------------------------------------------------------					
                    }
                });
            });

            //--------------------------------------------------------------------------------------
        };
        //--------------------------------------------------------------------------------------
        return {
            initComponentsUpCourseData: function() {
                _componentSA_UpCourseData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_UpCourseData.initComponentsUpCourseData();
    });
</script>
<!--Update End-->


<script>
    $(document).ready(function() {
        $('#button_add').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=form_add&gid" + $list;
        })
    })

    $(document).ready(function() {
        $('#teach_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=teach_data";
        })
    })

    $(document).ready(function() {
        $('#check_subject').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject";
        })
    })
</script>


<script>
    $(document).ready(function() {
        $('#classSD').on('change', function() {
            var classSD = $("#classSD").val();
            if (classSD != "") {
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=" + classSD;
            } else {}
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#term_key').on('change', function() {
            var GK = $("#grade_key").val();
            var TK = $("#term_key").val();
            var LT = $("#list").val();
            // TK = btoa(TK);
            if (TK != "") {
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=check_subject&list=" + LT + "&grade_key=" + GK + "&term_key=" + TK;
            } else {}
        })
    })
</script>