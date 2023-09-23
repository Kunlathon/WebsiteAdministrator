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
    var DatatableClassroomData = function() {


        //
        // Setup module components
        //

        // Basic Datatable examples
        var _componentDatatableClassroomData = function() {
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
                    [10, 25, 50, 100, "All"]
                ]



            });



        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentDatatableClassroomData();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        DatatableClassroomData.init();
    });
</script>
<!-- /theme JS files -->


<script>
	$(document).ready(function() {
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });

 	    $('.select-search2').select2();

	})
</script>

<!--Add-->
<script>
    var SA_AddClassroomData = function() {
        var _componentSA_AddClassroomData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddClassroomData = swal.mixin({
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
            $('#Add_classroom_data').on('click', function() {
                swalInitAddClassroomData.fire({
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
                        var classroomid = $("#classroomid").val();
                        var teacher1 = $("#teacher1").val();
                        var position1 = $("#position1").val();
                        var teacher2 = $("#teacher2").val();
                        var teacher3 = $("#teacher3").val();
                        var grade_key = $("#grade_key").val();
                        var term_key = $("#term_key").val();

                        // document.getElementById("test1").innerHTML = "" + classroomid + " " + teacher1 + " " + position1 + " " + teacher2 + " " + teacher3 + " " + grade_key + " " + term_key;


                        if (action == "") {
                            swalInitAddClassroomData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (classroomid == "") {
                                document.getElementById("add-classroomid-null").innerHTML = '<span style="color: red;">กรุณาเลือกห้องเรียน</span>';
                            } else {
                                document.getElementById("add-classroomid-null").innerHTML = '<span></span>';
                            }

                            if (teacher1 == "") {
                                document.getElementById("add-teacher1-null").innerHTML = '<span style="color: red;">กรุณาเลือกครูประจำชั้น(Eng)</span>';
                            } else {
                                document.getElementById("add-teacher1-null").innerHTML = '<span></span>';
                            }

                            if (position1 == "") {
                                document.getElementById("add-position1-null").innerHTML = '<span style="color: red;">กรุณาเลือกตำแหน่งครูประจำชั้น</span>';
                            } else {
                                document.getElementById("add-position1-null").innerHTML = '<span></span>';
                            }

                            if (teacher2 == "") {
                                document.getElementById("add-teacher2-null").innerHTML = '<span style="color: red;">กรุณาเลือกครูประจำชั้น(Tha)</span>';
                            } else {
                                document.getElementById("add-teacher2-null").innerHTML = '<span></span>';
                            }

                            if (teacher3 == "") {
                                document.getElementById("add-teacher3-null").innerHTML = '<span style="color: red;">กรุณาเลือกฝ่ายวิชาการ</span>';
                            } else {
                                document.getElementById("add-teacher3-null").innerHTML = '<span></span>';
                            }


                            if (classroomid != "" && teacher1 != "" && position1 != "" && teacher2 != "" && teacher3 != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                    action: action,
                                    classroomid: classroomid,
                                    teacher1: teacher1,
                                    position1: position1,
                                    teacher2: teacher2,
                                    teacher3: teacher3,
                                    term_key: term_key,
                                    grade_key: grade_key

                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitAddClassroomData.fire({
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
                                                        const b_classroom_data = content.querySelector('b_classroom_data')
                                                        if (b_classroom_data) {
                                                            b_classroom_data.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=" + grade_key;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitAddClassroomData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitAddClassroomData.fire({
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
            initComponentsAddClassroomData: function() {
                _componentSA_AddClassroomData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_AddClassroomData.initComponentsAddClassroomData();
    });
</script>
<!--Add End-->

<!--Update-->
<script>
    var SA_UpClassroomData = function() {
        var _componentSA_UpClassroomData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitUpClassroomData = swal.mixin({
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
            $('#Update_classroom_data').on('click', function() {

                swalInitUpClassroomData.fire({
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
                        var classroomid = $("#classroomid").val();
                        var teacher1 = $("#teacher1").val();
                        var position1 = $("#position1").val();
                        var teacher2 = $("#teacher2").val();
                        var teacher3 = $("#teacher3").val();
                        var grade_key = $("#grade_key_1").val();
                        var term_key = $("#term_key_1").val();
                        var classroom_t_key = $("#classroom_t_key").val();
                        var id_key = btoa(classroom_t_key);

                        // document.getElementById("test1").innerHTML = "" + classroomid + " " + teacher1 + " " + position1 + " " + teacher2 + " " + teacher3 + " -" + grade_key + " -" +term_key+ " " + classroom_t_key;
                        // exit();

                        if (action == "") {
                            swalInitUpClassroomData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (classroomid == "") {
                                document.getElementById("add-classroomid-null").innerHTML = '<span style="color: red;">กรุณาเลือกห้องเรียน</span>';
                            } else {
                                document.getElementById("add-classroomid-null").innerHTML = '<span></span>';
                            }

                            if (teacher1 == "") {
                                document.getElementById("add-teacher1-null").innerHTML = '<span style="color: red;">กรุณาเลือกครูประจำชั้น(Eng)</span>';
                            } else {
                                document.getElementById("add-teacher1-null").innerHTML = '<span></span>';
                            }

                            if (position1 == "") {
                                document.getElementById("add-position1-null").innerHTML = '<span style="color: red;">กรุณาเลือกตำแหน่งครูประจำชั้น</span>';
                            } else {
                                document.getElementById("add-position1-null").innerHTML = '<span></span>';
                            }

                            if (teacher2 == "") {
                                document.getElementById("add-teacher2-null").innerHTML = '<span style="color: red;">กรุณาเลือกครูประจำชั้น(Tha)</span>';
                            } else {
                                document.getElementById("add-teacher2-null").innerHTML = '<span></span>';
                            }

                            if (teacher3 == "") {
                                document.getElementById("add-teacher3-null").innerHTML = '<span style="color: red;">กรุณาเลือกฝ่ายวิชาการ</span>';
                            } else {
                                document.getElementById("add-teacher3-null").innerHTML = '<span></span>';
                            }

                            if (classroomid != "" && teacher1 != "" && position1 != "" && teacher2 != "" && teacher3 != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                    action: action,
                                    classroomid: classroomid,
                                    teacher1: teacher1,
                                    position1: position1,
                                    teacher2: teacher2,
                                    teacher3: teacher3,
                                    term_key: term_key,
                                    grade_key: grade_key,
                                    classroom_t_key: classroom_t_key

                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitUpClassroomData.fire({
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
                                                        const b_classroom_data = content.querySelector('b_classroom_data')
                                                        if (b_classroom_data) {
                                                            b_classroom_data.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=" + grade_key;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitUpClassroomData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitUpClassroomData.fire({
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
            initComponentsUpClassroomData: function() {
                _componentSA_UpClassroomData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_UpClassroomData.initComponentsUpClassroomData();
    });
</script>
<!--Update End-->

<!--Update Student -->
<script>
    $(document).ready(function() {

        // Defaults
        var swalInitEditStudentData = swal.mixin({
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
        $('#Edit_Student_Data').on('click', function() {
            swalInitEditStudentData.fire({
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

                    var action = "update_student";                    
                    var student_key = $("#student_key").val();                      
                    var idcard = $("#idcard").val();
                    var name = $("#name").val(); //*
                    var surname = $("#surname").val(); //*
                    var ename = $("#ename").val(); //*
                    var esurname = $("#esurname").val(); //*
                    var gender = $("#gender").val();
                    var birthday = $("#birthday").val();
                    var username = $("#username").val(); //*
                    //var password=$("#password").val(); //*
                    var grade = $("#grade").val();
                    var classroom = $("#classroom").val();
                    var nickname = $("#nickname").val();
                    //var id_key=btoa(username);                    
                    var status = $("#status").val();             
                    var classroom_t_key = $("#classroom_t_key").val();

                    var id_key = btoa(classroom_t_key);

                    var esurname_error = "yes";
                    var ename_error = "yes";
                    //var password_error="yes";

                    if (action == "") {
                        swalInitEditStudentData.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            icon: 'error'
                        });
                    } else {

                        if (name == "") {
                            document.getElementById("name-edit").innerHTML =
                                '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลชื่อ" required="required">' +
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล ชื่อ</span>'
                        } else {
                            document.getElementById("name-edit").innerHTML =
                                '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="กรอกข้อมูลชื่อ" required="required">' +
                                '<span>กรอกข้อมูลชื่อ</span>'
                        }


                        if (ename != "") {
                            if (!ename.match(/^([a-z A-Z 0-9 . -])+$/i)) {
                                document.getElementById("ename-edit").innerHTML =
                                    '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="' + ename + '" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">' +
                                    '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'
                                ename_error = "yes";
                            } else {
                                document.getElementById("ename-edit").innerHTML =
                                    '<input type="text" name="ename" id="ename" class="form-control" value="' + ename + '" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">' +
                                    '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'
                                ename_error = "no";
                            }
                        } else {
                            ename_error = "no";
                        }

                        if (esurname != "") {
                            if (!esurname.match(/^([a-z A-Z 0-9 . -])+$/i)) {
                                document.getElementById("esurname-edit").innerHTML =
                                    '<input type="text" name="esurname" id="esurname" class="form-control is-invalid" value="' + esurname + '" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">' +
                                    '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'
                                esurname_error = "yes";
                            } else {
                                document.getElementById("esurname-edit").innerHTML =
                                    '<input type="text" name="esurname" id="esurname" class="form-control" value="' + esurname + '" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">' +
                                    '<span>กรอกข้อมูลนามสกุลภาษาอังกฤษ</span>'
                                esurname_error = "no";
                            }
                        } else {
                            esurname_error = "no";
                        }

                        if (username == "") {
                            document.getElementById("username-edit").innerHTML =
                                '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username" required="required">' +
                                '<span class="invalid-feedback">กรุณากรอกข้อมูลรหัสนักเรียน ใช้เป็น Username</span>'
                        } else {
                            document.getElementById("username-edit").innerHTML =
                                '<input type="text" name="username" id="username" class="form-control" value="' + username + '" placeholder="กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username" required="required">' +
                                '<span>กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username</span>'
                        }

                        if (grade == "") {
                            document.getElementById("grade-edit").innerHTML = '<span style="color: red;">กรุณากรอกข้อมูล ระดับชั้น</span>';
                        } else {
                            document.getElementById("grade-edit").innerHTML = '<span></span>';
                        }

                        if (classroom == "") {
                            document.getElementById("classroom-edit").innerHTML = '<span style="color: red;">กรุณากรอกข้อมูล ห้องเรียน</span>';
                        } else {
                            document.getElementById("classroom-edit").innerHTML = '<span></span>';
                        }

                        if (status == "") {
                            document.getElementById("status-edit").innerHTML = '<span style="color: red;">กรุณากรอกข้อมูล สถานะ</span>';
                        } else {
                            document.getElementById("status-edit").innerHTML = '<span></span>';
                        }

                        if (name != "" && ename_error != "yes" && esurname_error != "yes" && username != "" && grade != "" && classroom != "" && status != "") {
                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                action: action,
                                student_key: student_key,
                                idcard: idcard,
                                name: name,
                                surname: surname,
                                ename: ename,
                                esurname: esurname,
                                gender: gender,
                                birthday: birthday,
                                username: username,
                                grade: grade,
                                classroom: classroom,
                                nickname: nickname,
                                status: status
                            }, function(process_add) {
                                var test_process = process_add;
                                if (test_process.trim() === "no_error") {
                                    let timerInterval;
                                    swalInitEditStudentData.fire({
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
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show&id=" + id_key;
                                        } else {}
                                    });

                                } else if (test_process.trim() === "it_error") {
                                    swalInitEditStudentData.fire({
                                        title: 'ข้อมูลซ้ำ',
                                        icon: 'error'
                                    });
                                } else {
                                    swalInitEditStudentData.fire({
                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
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
    })
</script>
<!--Updata Student end-->

<!--Update Course -->
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
            $('#Update_course_class_data').on('click', function() {

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
                        var action = "update_course_class";
                        var term = $("#term").val();
                        var name = $("#name").val();
                        var ename = $("#ename").val();
                        var grade = $("#grade").val();
                        var cy = $("#cy").val();
                        var cy_error = "error";
                        var note = $("#note").val();
                        var course_class_key = $("#course_class_key").val();
                        var course = $("#course").val();                        
                        var type_course = $("#type_course").val();                        
                        var classroom_t_key = $("#classroom_t_key").val();

                        var id_key = btoa(classroom_t_key);

                        // document.getElementById("test1").innerHTML=""+term+"-"+name+"-"+ename+"-"+grade+"-"+cy+"-"+note+"-"+course_class_key+"-"+course+"-"+classroom_t_key;
                        // exit();

                        if (action == "") {
                            swalInitUpCourseData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (name == "") {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล หลักสูตรหลัก</span>';
                            } else {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลหลักสูตรหลัก</span>';
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

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/classroom_data/classroom_data_process.php", {
                                    action: action,                                    
                                    term: term,
                                    name: name,
                                    ename: ename,
                                    grade: grade,
                                    cy: cy,
                                    cy_error: cy_error,
                                    note: note,
                                    course_class_key: course_class_key,
                                    course: course,
                                    classroom_t_key: classroom_t_key,
                                    type_course: type_course
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
                                                        const b_course_data = content.querySelector('b_course_data')
                                                        if (b_course_data) {
                                                            b_course_data.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=show_level&id=" + id_key;
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
<!--Update Course End-->

<script>
    $(document).ready(function() {
        $('#button_add').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=form_add&gid" + $list;
        })
    })

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


<script>
    $(document).ready(function() {
        $('#classSD').on('change', function() {
            var classSD = $("#classSD").val();
            if (classSD != "") {
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=" + classSD;
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
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=classroom_data&list=" + LT + "&grade_key=" + GK + "&term_key=" + TK;
            } else {}
        })
    })
</script>