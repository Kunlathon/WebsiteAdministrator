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
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>-->
<!--<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>-->

<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>

<script>
    var DatatableButtons_STD = function() {


        //
        // Setup module components
        //

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


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentDatatableButtons_STD();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        DatatableButtons_STD.init();
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
            $('#Add_Subject_data').on('click', function() {
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

                        var action = "create";
                        var code = $("#code").val();
                        var name = $("#name").val();
                        var ename = $("#ename").val();
                        var unit = $("#unit").val();
                        var unit_error = "error";
                        var subt = $("#subt").val();
                        var grade = $("#grade").val();
                        var id_key = btoa(grade);

                        if (action == "") {
                            swalInitAddSubjectData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (code == "") {
                                document.getElementById("add-code-null").innerHTML =
                                    '<input type="text" name="code" id="code" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล รหัสรายวิชา เช่น ท11101 , ค12101</span>';
                            } else {
                                document.getElementById("add-code-null").innerHTML =
                                    '<input type="text" name="code" id="code" class="form-control" value="' + code + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลรหัสรายวิชา เช่น ท11101 , ค12101</span>';
                            }

                            if (name == "") {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล รายวิชา</span>';
                            } else {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลรายวิชา</span>';
                            }

                            if (ename == "") {
                                document.getElementById("add-ename-null").innerHTML =
                                    '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล รายวิชาภาษาอังกฤษ</span>';
                            } else {
                                document.getElementById("add-ename-null").innerHTML =
                                    '<input type="text" name="ename" id="ename" class="form-control" value="' + ename + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลรายวิชาภาษาอังกฤษ</span>';
                            }


                            if (unit == "") {
                                document.getElementById("add-unit-null").innerHTML =
                                    '<input type="text" name="unit" id="unit" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล เวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)</span>';
                            } else {
                                if (!unit.match(/^([0-9])+$/i)) {
                                    document.getElementById("add-unit-null").innerHTML =
                                        '<input type="text" name="unit" id="unit" class="form-control is-invalid" value="' + unit + '" placeholder="" required="required">' +
                                        '<span class="invalid-feedback">กรุณากรอกข้อมูล เป็นตัวเลข</span>';
                                    unit_error = "error";
                                } else {
                                    document.getElementById("add-unit-null").innerHTML =
                                        '<input type="text" name="unit" id="unit" class="form-control" value="' + unit + '" placeholder="" required="required">' +
                                        '<span>กรอกข้อมูลเวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)</span>';
                                    unit_error = "no_error";
                                }
                            }

                            if (subt == "") {
                                document.getElementById("add-subt-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ประเภทรายวิชา</span>';
                            } else {
                                document.getElementById("add-subt-null").innerHTML = '<span></span>';
                            }

                            if (grade == "") {
                                document.getElementById("add-grade-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ระดับชั้น</span>';
                            } else {
                                document.getElementById("add-grade-null").innerHTML = '<span></span>';
                            }

                            if (code != "" && name != "" && ename != "" && unit != "" && unit_error != "error" && subt != "" && grade != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_data/subject_data_process.php", {
                                    action: action,
                                    code: code,
                                    name: name,
                                    ename: ename,
                                    unit: unit,
                                    subt: subt,
                                    grade: grade
                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=" + id_key;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitAddSubjectData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitAddSubjectData.fire({
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
<!--Add End-->

<!--Update-->
<script>
    var SA_UpSubjectData = function() {
        var _componentSA_UpSubjectData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitUpSubjectData = swal.mixin({
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
            $('#Update_Subject_data').on('click', function() {

                swalInitUpSubjectData.fire({
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
                        var id = $("#Update_Subject_data").val();
                        var action = "update";
                        var code = $("#code").val();
                        var name = $("#name").val();
                        var ename = $("#ename").val();
                        var unit = $("#unit").val();
                        var unit_error = "error";
                        var subt = $("#subt").val();
                        var grade = $("#grade").val();
                        var id_key = btoa(grade);

                        if (action == "") {
                            swalInitUpSubjectData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (code == "") {
                                document.getElementById("update-code-null").innerHTML =
                                    '<input type="text" name="code" id="code" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล รหัสรายวิชา เช่น ท11101 , ค12101</span>';
                            } else {
                                document.getElementById("update-code-null").innerHTML =
                                    '<input type="text" name="code" id="code" class="form-control" value="' + code + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลรหัสรายวิชา เช่น ท11101 , ค12101</span>';
                            }

                            if (name == "") {
                                document.getElementById("update-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล รายวิชา</span>';
                            } else {
                                document.getElementById("update-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลรายวิชา</span>';
                            }

                            if (ename == "") {
                                document.getElementById("update-ename-null").innerHTML =
                                    '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล รายวิชาภาษาอังกฤษ</span>';
                            } else {
                                document.getElementById("update-ename-null").innerHTML =
                                    '<input type="text" name="ename" id="ename" class="form-control" value="' + ename + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลรายวิชาภาษาอังกฤษ</span>';
                            }


                            if (unit == "") {
                                document.getElementById("update-unit-null").innerHTML =
                                    '<input type="text" name="unit" id="unit" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล เวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)</span>';
                            } else {
                                if (!unit.match(/^([0-9])+$/i)) {
                                    document.getElementById("update-unit-null").innerHTML =
                                        '<input type="text" name="unit" id="unit" class="form-control is-invalid" value="' + unit + '" placeholder="" required="required">' +
                                        '<span class="invalid-feedback">กรุณากรอกข้อมูล เป็นตัวเลข</span>';
                                    unit_error = "error";
                                } else {
                                    document.getElementById("update-unit-null").innerHTML =
                                        '<input type="text" name="unit" id="unit" class="form-control" value="' + unit + '" placeholder="" required="required">' +
                                        '<span>กรอกข้อมูลเวลาเรียน/ปี เช่น 40 ชม. (เท่ากับ 1 หน่วยกิต)</span>';
                                    unit_error = "no_error";
                                }
                            }

                            if (subt == "") {
                                document.getElementById("update-subt-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ประเภทรายวิชา</span>';
                            } else {
                                document.getElementById("update-subt-null").innerHTML = '<span></span>';
                            }

                            if (grade == "") {
                                document.getElementById("update-grade-null").innerHTML = '<span style="color: red;">กรอกข้อมูล ระดับชั้น</span>';
                            } else {
                                document.getElementById("update-grade-null").innerHTML = '<span></span>';
                            }

                            if (code != "" && name != "" && ename != "" && unit != "" && unit_error != "error" && subt != "" && grade != "") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_data/subject_data_process.php", {
                                    action: action,
                                    code: code,
                                    name: name,
                                    ename: ename,
                                    unit: unit,
                                    subt: subt,
                                    grade: grade,
                                    id: id
                                }, function(process_add) {
                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitUpSubjectData.fire({
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
                                                        const b_subject_data = content.querySelector('b_subject_data_list')
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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=" + id_key;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitUpSubjectData.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitUpSubjectData.fire({
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
            initComponentsUpSubjectData: function() {
                _componentSA_UpSubjectData();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_UpSubjectData.initComponentsUpSubjectData();
    });
</script>
<!--Update End-->

<!--file up excel-->
<script>
    $(document).ready(function() {

        // Modal template
        var modalTemplate = '<div class="modal-dialog modal-lg" role="document">\n' +
            '  <div class="modal-content">\n' +
            '    <div class="modal-header align-items-center">\n' +
            '      <h6 class="modal-title">{heading} <small><span class="kv-zoom-title"></span></small></h6>\n' +
            '      <div class="kv-zoom-actions btn-group">{toggleheader}{fullscreen}{borderless}{close}</div>\n' +
            '    </div>\n' +
            '    <div class="modal-body">\n' +
            '      <div class="floating-buttons btn-group"></div>\n' +
            '      <div class="kv-zoom-body file-zoom-content"></div>\n' + '{prev} {next}\n' +
            '    </div>\n' +
            '  </div>\n' +
            '</div>\n';

        // Buttons inside zoom modal
        var previewZoomButtonClasses = {
            toggleheader: 'btn btn-light btn-icon btn-header-toggle btn-sm',
            fullscreen: 'btn btn-light btn-icon btn-sm',
            borderless: 'btn btn-light btn-icon btn-sm',
            close: 'btn btn-light btn-icon btn-sm'
        };

        // Icons inside zoom modal classes
        var previewZoomButtonIcons = {
            prev: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-right32"></i>' : '<i class="icon-arrow-left32"></i>',
            next: $('html').attr('dir') == 'rtl' ? '<i class="icon-arrow-left32"></i>' : '<i class="icon-arrow-right32"></i>',
            toggleheader: '<i class="icon-menu-open"></i>',
            fullscreen: '<i class="icon-screen-full"></i>',
            borderless: '<i class="icon-alignment-unalign"></i>',
            close: '<i class="icon-cross2 font-size-base"></i>'
        };

        // File actions
        var fileActionSettings = {
            zoomClass: '',
            zoomIcon: '<i class="icon-zoomin3"></i>',
            dragClass: 'p-2',
            dragIcon: '<i class="icon-three-bars"></i>',
            removeClass: '',
            removeErrorClass: 'text-danger',
            removeIcon: '<i class="icon-bin"></i>',
            indicatorNew: '<i class="icon-file-plus text-success"></i>',
            indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
            indicatorError: '<i class="icon-cross2 text-danger"></i>',
            indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>'
        };

        $('.UpdateFile_StudentDate').fileinput({
            browseLabel: 'Browse',
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialCaption: "No file selected",
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings,
            maxFileSize: 300,
            maxFileCount: 1,
            allowedFileExtensions: ["xls","xlsx","XLS","XLSX"]

        });

    })
</script>
<!--file up excel End-->

<script>
    $(document).ready(function() {
        $('#button_add').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&list=form_add";
        })
    })




    $(document).ready(function() {
        $('#subject_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data";
        })
    })

    $(document).ready(function() {
        $('#subject_type_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_type_data";
        })
    })

    $(document).ready(function() {
        $('#subject_level_data').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data";
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#classSD').on('change', function() {
            var cp_class = $("#classSD").val();
            var id_key = "";
            if (cp_class != "") {
                id_key = btoa(cp_class);
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_data&grade=" + id_key;
            } else {}
        })
    })
</script>

<script>
    $(document).ready(function() {

        var id_grade = $("#id_grade").val();
        if (id_grade != 0) {
            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_data/subject_data_show.php", {
                class_id: id_grade
            }, function(class_subject) {
                $("#run_class_subjectB").html(class_subject);
            })
        } else {}

    })
</script>