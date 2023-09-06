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

<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>-->



<script>
    var DatatableButtons_TD = function() {


        //
        // Setup module components
        //

        // Basic Datatable examples
        var _componentDatatableButtons_TD = function() {
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
                _componentDatatableButtons_TD();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        DatatableButtons_TD.init();
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

<!--Add All-->
<script>
    var SA_AddTermDataAll = function() {
        var _componentSA_AddTermDataAll = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddTermDataAll = swal.mixin({
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
            $('#Add_term_data_all').on('click', function() {
                swalInitAddTermDataAll.fire({
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

                        var action = "createall";
                        var term = $("#term").val();
                        var term_year = $("#term_year").val();
                        var term_year_error = "error";
                        var date_start = $("#date_start").val();
                        var date_end = $("#date_end").val();

                        if (action == "") {
                            swalInitAddTermDataAll.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (term == "") {
                                document.getElementById("add-term-null").innerHTML = '<span style="color: red;">กรอกข้อมูลภาคเรียน</span>';
                            } else {
                                document.getElementById("add-term-null").innerHTML = '<span></span>';
                            }

                            if (term_year == "") {
                                document.getElementById("add-term-year-null").innerHTML =
                                    '<input type="text" name="term_year" id="term_year" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรอกข้อมูลปีการศึกษา เช่น 2566</span>';
                            } else {
                                if (!term_year.match(/^([0-9])+$/i)) {
                                    document.getElementById("add-term-year-null").innerHTML =
                                        '<input type="text" name="term_year" id="term_year" class="form-control is-invalid" value="' + term_year + '" placeholder="" required="required">' +
                                        '<span class="invalid-feedback">กรุณากรอบข้อมูลปีการศึกษา เป็นตัวเลข</span>';
                                    term_year_error = "error";
                                } else {
                                    document.getElementById("add-term-year-null").innerHTML =
                                        '<input type="text" name="term_year" id="term_year" class="form-control" value="' + term_year + '" placeholder="" required="required">' +
                                        '<span>กรอกข้อมูลปีการศึกษา เช่น 2566</span>';
                                    term_year_error = "no_error";
                                }
                            }

                            if (date_start == "") {
                                document.getElementById("add-date-start-all-null").innerHTML = '<span style="color: red;">เลือกข้อมูลวันที่เปิดเรียน</span>';
                            } else {
                                document.getElementById("add-date-start-all-null").innerHTML = '<span></span>';
                            }

                            if (date_end == "") {
                                document.getElementById("add-date-end-all-null").innerHTML = '<span style="color: red;">เลือกข้อมูลวันที่ปิดเรียน</span>';
                            } else {
                                document.getElementById("add-date-end-all-null").innerHTML = '<span></span>';
                            }


                            if (term != "" && term_year != "" && term_year_error != "" && date_start != "" && date_end != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/term_data/term_data_process.php", {
                                    action: action,
                                    term: term,
                                    term_year: term_year,
                                    date_start: date_start,
                                    date_end: date_end
                                }, function(process_add_all) {
                                    var process_add_all = process_add_all;
                                    if (process_add_all.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitAddTermDataAll.fire({
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
                                                        const b_term_data = content.querySelector('b_term_data')
                                                        if (b_term_data) {
                                                            b_term_data.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data";
                                            } else {}
                                        });

                                    } else if (process_add_all.trim() === "it_error") {
                                        swalInitAddTermDataAll.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitAddTermDataAll.fire({
                                            title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + process_add_all.trim(),
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
            initComponentsAddTermDataAll: function() {
                _componentSA_AddTermDataAll();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_AddTermDataAll.initComponentsAddTermDataAll();
    });
</script>
<!--Add All End-->

<!--Add-->
<script>
    var SA_AddTermData = function() {
        var _componentSA_AddTermData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddTermData = swal.mixin({
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
            $('#Add_term_data').on('click', function() {
                swalInitAddTermData.fire({
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
                        var term = $("#term").val();
                        var term_year = $("#term_year").val();
                        var term_year_error = "error";
                        var grade = $("#grade").val();
                        var date_start = $("#date_start").val();
                        var date_end = $("#date_end").val();

                        if (action == "") {
                            swalInitAddTermData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (term == "") {
                                document.getElementById("add-term-null").innerHTML = '<span style="color: red;">กรอกข้อมูลภาคเรียน</span>';
                            } else {
                                document.getElementById("add-term-null").innerHTML = '<span></span>';
                            }

                            if (term_year == "") {
                                document.getElementById("add-term-year-null").innerHTML =
                                    '<input type="text" name="term_year" id="term_year" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรอกข้อมูลปีการศึกษา เช่น 2566</span>';
                            } else {
                                if (!term_year.match(/^([0-9])+$/i)) {
                                    document.getElementById("add-term-year-null").innerHTML =
                                        '<input type="text" name="term_year" id="term_year" class="form-control is-invalid" value="' + term_year + '" placeholder="" required="required">' +
                                        '<span class="invalid-feedback">กรุณากรอบข้อมูลปีการศึกษา เป็นตัวเลข</span>';
                                    term_year_error = "error";
                                } else {
                                    document.getElementById("add-term-year-null").innerHTML =
                                        '<input type="text" name="term_year" id="term_year" class="form-control" value="' + term_year + '" placeholder="" required="required">' +
                                        '<span>กรอกข้อมูลปีการศึกษา เช่น 2566</span>';
                                    term_year_error = "no_error";
                                }
                            }
                            
                            if (grade == "") {
                                document.getElementById("add-grade-null").innerHTML = '<span style="color: red;">เลือกข้อมูลระดับชั้น</span>';
                            } else {
                                document.getElementById("add-grade-null").innerHTML = '<span></span>';
                            }

                            if (date_start == "") {
                                document.getElementById("add-date-start-null").innerHTML = '<span style="color: red;">เลือกข้อมูลวันที่เปิดเรียน</span>';
                            } else {
                                document.getElementById("add-date-start-null").innerHTML = '<span></span>';
                            }

                            if (date_end == "") {
                                document.getElementById("add-date-end-null").innerHTML = '<span style="color: red;">เลือกข้อมูลวันที่ปิดเรียน</span>';
                            } else {
                                document.getElementById("add-date-end-null").innerHTML = '<span></span>';
                            }


                            if (term != "" && term_year != "" && term_year_error != "" && date_start != "" && date_end != "" && grade != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/term_data/term_data_process.php", {
                                    action: action,
                                    term: term,
                                    term_year: term_year,
                                    grade: grade,
                                    date_start: date_start,
                                    date_end: date_end
                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitAddTermData.fire({
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
                                                        const b_term_data = content.querySelector('b_term_data')
                                                        if (b_term_data) {
                                                            b_term_data.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=" + grade;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitAddTermData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitAddTermData.fire({
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
            initComponentsAddTermData: function() {
                _componentSA_AddTermData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_AddTermData.initComponentsAddTermData();
    });
</script>
<!--Add End-->

<!--Update-->
<script>
    var SA_UpTermData = function() {
        var _componentSA_UpTermData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitUpTermData = swal.mixin({
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
            $('#Update_term_data').on('click', function() {

                swalInitUpTermData.fire({
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
                        var id = $("#Update_term_data").val();
                        var action = "update";
                        var term = $("#term").val();
                        var term_year = $("#term_year").val();                        
                        var term_year_error = "error";
                        var grade = $("#grade").val();
                        var date_start = $("#date_start").val();
                        var date_end = $("#date_end").val();
                        var status = $("#status").val();
                        var checkgrade_st = $("#checkgrade_st").val();
                        var term_key = $("#term_key").val();
                        var id_key = btoa(term_key);
                        
                        // document.getElementById("test").innerHTML = ""+action+' '+term+' '+term_year+' '+grade+' '+date_start+' '+date_end+' '+status+' '+checkgrade_st+' '+term_key;

                        if (action == "") {
                            swalInitUpTermData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {
                            
                            if (grade == "") {
                                document.getElementById("add-grade-null").innerHTML = '<span style="color: red;">เลือกข้อมูลระดับชั้น</span>';
                            } else {
                                document.getElementById("add-grade-null").innerHTML = '<span></span>';
                            }

                            if (date_start == "") {
                                document.getElementById("add-date-start-null").innerHTML = '<span style="color: red;">เลือกข้อมูลวันที่เปิดเรียน</span>';
                            } else {
                                document.getElementById("add-date-start-null").innerHTML = '<span></span>';
                            }

                            if (date_end == "") {
                                document.getElementById("add-date-end-null").innerHTML = '<span style="color: red;">เลือกข้อมูลวันที่ปิดเรียน</span>';
                            } else {
                                document.getElementById("add-date-end-null").innerHTML = '<span></span>';
                            }                            
                            
                            if (status == "") {
                                document.getElementById("add-status-null").innerHTML = '<span style="color: red;">เลือกข้อมูลการใช่งาน</span>';
                            } else {
                                document.getElementById("add-status-null").innerHTML = '<span></span>';
                            }
                            
                            if (checkgrade_st == "") {
                                document.getElementById("add-checkgrade-st-null").innerHTML = '<span style="color: red;">เลือกข้อมูลผลการเรียน</span>';
                            } else {
                                document.getElementById("add-checkgrade-st-null").innerHTML = '<span></span>';
                            }

                            if (term != "" && term_year != "" && date_start != "" && date_end != "" && grade != "") {
                                // document.getElementById("test2").innerHTML = ""+action+' '+term+' '+term_year+' '+grade+' '+date_start+' '+date_end+' '+status+' '+checkgrade_st+' '+term_key;

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/term_data/term_data_process.php", {
                                    action: action,
                                    term: term,
                                    term_year: term_year,
                                    grade: grade,
                                    date_start: date_start,
                                    date_end: date_end,
                                    status: status,
                                    checkgrade_st: checkgrade_st,
                                    term_key: term_key
                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitUpTermData.fire({
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
                                                        const b_term_data = content.querySelector('b_term_data')
                                                        if (b_term_data) {
                                                            b_term_data.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=" + grade;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitUpTermData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitUpTermData.fire({
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
            initComponentsUpTermData: function() {
                _componentSA_UpTermData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_UpTermData.initComponentsUpTermData();
    });
</script>
<!--Update End-->

<!--Update Detail-->
<script>
    var SA_UpTermDetailData = function() {
        var _componentSA_UpTermDetailData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitUpTermDetailData = swal.mixin({
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
            $('#Update_term_detail_data').on('click', function() {

                swalInitUpTermDetailData.fire({
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
                        var action = "update_detail";
                        var date_start1 = $("#date_start1").val();
                        var date_end1 = $("#date_end1").val();    
                        var date_start2 = $("#date_start2").val();
                        var date_end2 = $("#date_end2").val();                       
                        var date_score_1 = $("#date_score_1").val();
                        var date_score_2 = $("#date_score_2").val();
                        var date_score_f = $("#date_score_f").val();
                        var date_score_g = $("#date_score_g").val();
                        var term_key = $("#term_key").val();
                        var id_key = btoa(term_key);
                        
                        // document.getElementById("test1").innerHTML = ""+action+' '+date_start1+' '+date_end1+' '+date_start2+' '+date_end2;

                        if (action == "") {
                            swalInitUpTermDetailData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {
                            
                            if (date_start1 == "") {
                                document.getElementById("add-date-start1-null").innerHTML = '<span style="color: red;">เลือกเลือกวันที่เริ่ม</span>';
                            } else {
                                document.getElementById("add-date-start1-null").innerHTML = '<span></span>';
                            }

                            if (date_end1 == "") {
                                document.getElementById("add-date-end1-null").innerHTML = '<span style="color: red;">เลือกวันที่สิ้นสุด</span>';
                            } else {
                                document.getElementById("add-date-end1-null").innerHTML = '<span></span>';
                            }

                            if (date_start1 != "" && date_end1 != "") {

                                // document.getElementById("test2").innerHTML = ""+action+' '+date_start1+' '+date_end1+' '+date_start2+' '+date_end2;

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/term_data/term_data_process.php", {
                                    action: action,
                                    date_start1: date_start1,
                                    date_end1: date_end1,
                                    date_start2: date_start2,
                                    date_end2: date_end2,
                                    date_score_1: date_score_1,
                                    date_score_2: date_score_2,
                                    date_score_f: date_score_f,
                                    date_score_g: date_score_g,
                                    term_key: term_key

                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitUpTermDetailData.fire({
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
                                                        const b_term_detail_data = content.querySelector('b_term_detail_data')
                                                        if (b_term_detail_data) {
                                                            b_term_detail_data.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=setting&id=" + id_key;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitUpTermDetailData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitUpTermDetailData.fire({
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
            initComponentsUpTermDetailData: function() {
                _componentSA_UpTermDetailData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_UpTermDetailData.initComponentsUpTermDetailData();
    });
</script>
<!--Update Detail End-->


<script>
    $(document).ready(function() {
        $('#button_add').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=form_add_all";
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
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=term_data&list=" + classSD;
            } else {}
        })
    })
</script>