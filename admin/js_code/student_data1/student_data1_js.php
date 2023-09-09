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
check_login('admin_username_lcm', 'login.php');
?>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

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
                    [10, 25, 50, 100, "All"]
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
                selectYears: 70,
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
                min: [7, 30],
                max: [14, 0]
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
                    [0, 30],
                    [2, 0],
                    [8, 30],
                    [9, 0]
                ]
            });

            // Disabling ranges
            $('.pickatime-range').pickatime({
                disable: [
                    1,
                    [1, 30, 'inverted'],
                    {
                        from: [4, 30],
                        to: [10, 30]
                    },
                    [6, 30, 'inverted'],
                    {
                        from: [8, 0],
                        to: [9, 0],
                        inverted: true
                    }
                ]
            });

            // Disable all with exeption
            $('.pickatime-disableall').pickatime({
                disable: [
                    true,
                    3, 5, 7,
                    [0, 30],
                    [2, 0],
                    [8, 30],
                    [9, 0]
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

<!--Add-->
<script>
    var ABA_AddStudent_Data = function() {
        var _componentABA_AddStudent_Data = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddStudentData = swal.mixin({
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
            $('#Add_Student_Data').on('click', function() {
                swalInitAddStudentData.fire({
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
                        var idcard = $("#idcard").val();
                        var name = $("#name").val(); //*
                        var surname = $("#surname").val(); //*
                        var ename = $("#ename").val(); //*
                        var esurname = $("#esurname").val(); //*
                        var gender = $("#gender").val();
                        var birthday = $("#birthday").val();
                        var username = $("#username").val(); //*
                        var password = $("#password").val(); //*
                        var grade = $("#grade").val();
                        var classroom = $("#classroom").val();
                        var nickname = $("#nickname").val();
                        var status = $("#status").val();

                        var ename_error = "yes";
                        var esurname_error = "yes";
                        var password_error = "yes";

                        if (action == "") {
                            swalInitAddStudentData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (name == "") {
                                document.getElementById("name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลชื่อ" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอบข้อมูล ชื่อ</span>'
                            } else {
                                document.getElementById("name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="กรอกข้อมูลชื่อ" required="required">' +
                                    '<span>กรอกข้อมูลชื่อ</span>'
                            }


                            if (ename != "") {
                                if (!ename.match(/^([a-z A-Z 0-9. -])+$/i)) {
                                    document.getElementById("ename-null").innerHTML =
                                        '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="' + ename + '" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">' +
                                        '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'
                                    ename_error = "yes";
                                } else {
                                    document.getElementById("ename-null").innerHTML =
                                        '<input type="text" name="ename" id="ename" class="form-control" value="' + ename + '" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">' +
                                        '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'
                                    ename_error = "no";
                                }
                            } else {
                                ename_error = "no";
                            }

                            if (esurname != "") {
                                if (!esurname.match(/^([a-z A-Z 0-9. -])+$/i)) {
                                    document.getElementById("esurname-null").innerHTML =
                                        '<input type="text" name="esurname" id="esurname" class="form-control is-invalid" value="' + esurname + '" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">' +
                                        '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'
                                    esurname_error = "yes";
                                } else {
                                    document.getElementById("esurname-null").innerHTML =
                                        '<input type="text" name="esurname" id="esurname" class="form-control" value="' + esurname + '" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">' +
                                        '<span>กรอกข้อมูลนามสกุลภาษาอังกฤษ</span>'
                                    esurname_error = "no";
                                }
                            } else {
                                esurname_error = "no";
                            }


                            if (username == "") {
                                document.getElementById("username-null").innerHTML =
                                    '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลรหัสนักเรียน ใช่เป็น Username" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูลรหัสนักเรียน ใช่เป็น Username</span>'
                            } else {
                                document.getElementById("username-null").innerHTML =
                                    '<input type="text" name="username" id="username" class="form-control" value="' + username + '" placeholder="กรอกข้อมูลรหัสนักเรียน ใช่เป็น Username" required="required">' +
                                    '<span>กรอกข้อมูลรหัสนักเรียน ใช่เป็น Username</span>'
                            }

                            if (password != "") {
                                if (password.length >= 6) {
                                    if (password.match(/^([0-9])+$/i)) {
                                        document.getElementById("password-null").innerHTML =
                                            '<input type="text" name="password" id="password" class="form-control is-invalid" value="' + password + '" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">' +
                                            '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                        password_error = "yes";
                                    } else {
                                        document.getElementById("password-null").innerHTML =
                                            '<input type="text" name="password" id="password" class="form-control" value="' + password + '" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">' +
                                            '<span class="invalid-feedback">ข้อมูล Password เบื้องต้น aba@123456</span>'
                                        password_error = "no";
                                    }
                                } else {
                                    document.getElementById("password-null").innerHTML =
                                        '<input type="text" name="password" id="password" class="form-control is-invalid" value="' + password + '" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">' +
                                        '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                    password_error = "yes";
                                }
                            } else {
                                document.getElementById("password-null").innerHTML =
                                    '<input type="text" name="password" id="password" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">' +
                                    '<span class="invalid-feedback">กรุณาข้อมูล Password เบื้องต้น aba@123456</span>'
                                password_error = "yes";
                            }


                            if (grade == "") {
                                document.getElementById("grade-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ระดับชั้น</span>';
                            } else {
                                document.getElementById("grade-null").innerHTML = '<span></span>';
                            }

                            if (classroom == "") {
                                document.getElementById("classroom-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ห้องเรียน</span>';
                            } else {
                                document.getElementById("classroom-null").innerHTML = '<span></span>';
                            }

                            if (status == "") {
                                document.getElementById("status-null").innerHTML = '<span style="color: red;">กรอกข้อมูล สถานะ</span>';
                            } else {
                                document.getElementById("status-null").innerHTML = '<span></span>';
                            }


                            if (name != "" && ename_error != "yes" && esurname_error != "yes" && username != "" && password_error != "yes" && grade != "" && classroom != "" && status != "") {
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/student_data1/student_data1_process.php", {
                                    action: action,
                                    idcard: idcard,
                                    name: name,
                                    surname: surname,
                                    ename: ename,
                                    esurname: esurname,
                                    gender: gender,
                                    birthday: birthday,
                                    username: username,
                                    password: password,
                                    grade: grade,
                                    classroom: classroom,
                                    nickname: nickname,
                                    status: status
                                }, function(process_add) {
                                    var test_process = process_add;
                                    if (test_process.trim() === "no_error") {
                                        /*document.getElementById("test_set").innerHTML=
                                        idcard+'<br>'+
                                        name+'<br>'+
                                        surname+'<br>'+
                                        ename+'<br>'+
                                        esurname+'<br>'+
                                        gender+'<br>'+
                                        birthday+'<br>'+
                                        username+'<br>'+
                                        password+'<br>'+
                                        grade+'<br>'+
                                        classroom+'<br>'*/
                                        let timerInterval;
                                        swalInitAddStudentData.fire({
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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1";
                                            } else {}
                                        });

                                    } else if (test_process.trim() === "it_error") {
                                        swalInitAddStudentData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else if (test_process.trim() === "error_classroom") {
                                        swalInitAddStudentData.fire({
                                            title: 'จัดห้องก่อน จัดเองนะ',
                                            icon: 'warning'
                                        });
                                    } else {
                                        swalInitAddStudentData.fire({
                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                            icon: 'error'
                                        });
                                    }
                                })
                            } else {
                                /* swalInitAddStudentData.fire(
                                     'Cancelled',
                                     'Your imaginary file is safe :)',
                                     'error'
                                 );  */
                            }
                        }
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        //swalInitAddStudentData.fire(
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
            initComponentsAddStudentData: function() {
                _componentABA_AddStudent_Data();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_AddStudent_Data.initComponentsAddStudentData();
    });
</script>
<!--Add End-->

<!--Update-->
<script>
    var ABA_UpStudent_Data = function() {
        var _componentABA_UpStudent_Data = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
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
            //--------------------------------------------------------------------------------------
            $('#edit_teacher_data1').on('click', function() {
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

                        var action = "update";
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

                        var student_key = $("#student_key").val();
                        var id_key = btoa(student_key);

                        var status = $("#status").val();

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
                                    '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลรหัสนักเรียน ใช่เป็น Username" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูลรหัสนักเรียน ใช่เป็น Username</span>'
                            } else {
                                document.getElementById("username-edit").innerHTML =
                                    '<input type="text" name="username" id="username" class="form-control" value="' + username + '" placeholder="กรอกข้อมูลรหัสนักเรียน ใช่เป็น Username" required="required">' +
                                    '<span>กรอกข้อมูลรหัสนักเรียน ใช่เป็น Username</span>'
                            }

                            /*if(password!=""){
                                if(password.length>=6){
                                    if(password.match(/^([0-9])+$/i)){
                                        document.getElementById("password-edit").innerHTML=
                                        '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                        password_error="yes";
                                    }else{
                                        document.getElementById("password-edit").innerHTML=
                                        '<input type="text" name="password" id="password" class="form-control" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ข้อมูล Password เบื้องต้น aba@123456</span>'
                                        password_error="no";
                                    }
                                }else{
                                    document.getElementById("password-edit").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                    password_error="yes";
                                }
                            }else{
                                document.getElementById("password-edit").innerHTML=
                                '<input type="text" name="password" id="password" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                '<span class="invalid-feedback">กรุณาข้อมูล Password เบื้องต้น aba@123456</span>'
                                password_error="yes";
                            }*/

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
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/student_data1/student_data1_process.php", {
                                    action: action,
                                    idcard: idcard,
                                    name: name,
                                    surname: surname,
                                    ename: ename,
                                    esurname: esurname,
                                    gender: gender,
                                    birthday: birthday,
                                    username: username,
                                    student_key: student_key,
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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=form_edit";
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
        };
        //--------------------------------------------------------------------------------------
        return {
            initComponentsUpStudentData: function() {
                _componentABA_UpStudent_Data();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_UpStudent_Data.initComponentsUpStudentData();
    });
</script>
<!--Updata end-->


<!--password-->
<script>
    var ABA_PasswordStudent_Data = function() {
        var _componentABA_PasswordStudent_Data = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitPasswordStudentData = swal.mixin({
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
            $('#StudentDataPassword').on('click', function() {
                swalInitPasswordStudentData.fire({
                    title: 'ต้องการแก้ไขรหัสผ่านหรือไม่',
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

                        var action = "password";
                        var student_password = $("#student_password").val();
                        var password_error = "yes";
                        var student_key = $("#student_key").val();
                        var id_key = btoa(student_key);
                        if (action == "") {
                            swalInitPasswordStudentData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (student_password != "") {
                                if (student_password.length > 6) {
                                    if (student_password.match(/^([0-9])+$/i)) {
                                        document.getElementById("password-edit").innerHTML =
                                            '<div class="form-group form-group-feedback form-group-feedback-left">' +
                                            '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg is-invalid" value="' + student_password + '" required="required">' +
                                            '   <span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ(รหัสผ่านเบื้องต้น aba@123456)</span>' +
                                            '<div class="form-control-feedback form-control-feedback-lg">' +
                                            '   <i class="icon-key"></i>' +
                                            '</div>'
                                        password_error = "yes";
                                    } else {
                                        document.getElementById("password-edit").innerHTML =
                                            '<div class="form-group form-group-feedback form-group-feedback-left">' +
                                            '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg" value="' + student_password + '" required="required">' +
                                            '   <span>กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร ต้องมีตัวเลขและตัวอังกฤษ(รหัสผ่านเบื้องต้น aba@123456)</span>' +
                                            '<div class="form-control-feedback form-control-feedback-lg">' +
                                            '   <i class="icon-key"></i>' +
                                            '</div>'
                                        password_error = "no";
                                    }
                                } else {
                                    document.getElementById("password-edit").innerHTML =
                                        '<div class="form-group form-group-feedback form-group-feedback-left">' +
                                        '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg is-invalid" value="' + student_password + '" required="required">' +
                                        '   <span class="invalid-feedback">รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร</span>' +
                                        '<div class="form-control-feedback form-control-feedback-lg">' +
                                        '   <i class="icon-key"></i>' +
                                        '</div>'
                                    password_error = "yes";
                                }
                            } else {
                                document.getElementById("password-edit").innerHTML =
                                    '<div class="form-group form-group-feedback form-group-feedback-left">' +
                                    '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg is-invalid" value="" required="required">' +
                                    '   <span class="invalid-feedback">กรุณากรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร ต้องมีตัวเลขและตัวอังกฤษ</span>' +
                                    '<div class="form-control-feedback form-control-feedback-lg">' +
                                    '   <i class="icon-key"></i>' +
                                    '</div>'
                                password_error = "yes";
                            }

                            if (password_error != "yes" && student_password != "" && student_key != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/student_data1/student_data1_process.php", {
                                    action: action,
                                    student_password: student_password,
                                    student_key: student_key
                                }, function(process_add) {
                                    var test_process = process_add;
                                    if (test_process.trim() === "no_error") {
                                        let timerInterval;
                                        swalInitPasswordStudentData.fire({
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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&manage=password&student_key=" + id_key;
                                            } else {}
                                        });

                                    } else if (test_process.trim() === "it_error") {
                                        swalInitPasswordStudentData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitPasswordStudentData.fire({
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
        };
        //--------------------------------------------------------------------------------------
        return {
            intComponentsPasswordStudentData: function() {
                _componentABA_PasswordStudent_Data();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_PasswordStudent_Data.intComponentsPasswordStudentData();
    });
</script>
<!--password end-->

<script>
    $(document).ready(function() {
        $('#classroom_Reset').on('change', function() {
            var classroom = $("#classroom_Reset").val();
            var classroom_key = btoa(classroom);
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=student_data1&classroom=" + classroom_key;
        })
    })
</script>