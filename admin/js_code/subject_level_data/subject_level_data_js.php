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
                    [10, 25, 50, 100, 'All']
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
    $(document).ready(function(){
// Defaults
        var swalInitAddSubjectTypeData = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
// Defaults End

            $('#Add_Subject_Level_Data').on('click', function() {
                swalInitAddSubjectTypeData.fire({
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

                        if (action == "") {
                            swalInitAddSubjectTypeData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {

                            if (name == "") {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="ระดับรายวิชา" required="required">' +
                                    '<span class="invalid-feedback">กรุณากรอกข้อมูล ระดับรายวิชา</span>';
                            } else {
                                document.getElementById("add-name-null").innerHTML =
                                    '<input type="text" name="name" id="name" class="form-control" value="' + name + '" placeholder="ระดับรายวิชา" required="required">';
                            }

                            if(ename!=""){
                                if(!ename.match(/^([a-z A-Z 0-9 .+-.+_.])+$/i)){
                                    document.getElementById("add-ename-null").innerHTML=
                                    '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="'+ename+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'                                    
                                    ename_error="yes";                                    
                                }else{
                                    document.getElementById("add-ename-null").innerHTML=
                                    '<input type="text" name="ename" id="ename" class="form-control" value="'+ename+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                                    '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'                                    
                                    ename_error="no";
                                }
                            }else{
                                document.getElementById("add-ename-null").innerHTML=
                                '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="'+ename+'" placeholder="กรอกข้อมูลภาษาอังกฤษ" required="required">'+
                                '<span class="invalid-feedback">กรอกข้อมูลระดับรายวิชาภาษาอังกฤษ</span>'                            
                                ename_error="yes";
                            }


                            if (name != "" && ename_error != "yes") {

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/subject_level_data/subject_level_process.php", {
                                    action: action,
                                    name: name,
                                    ename: ename
                                }, function(process_add) {

                                    let timerInterval;
                                    swalInitAddSubjectTypeData.fire({
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
                                                    const b_subject_level_data = content.querySelector('b_subject_level_data')
                                                    if (b_subject_level_data) {
                                                        b_subject_level_data.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data";
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

    })
</script>
<!--Add End-->

<script>
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

    $(document).ready(function() {
        $('#button_add').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data&list=form_add";
        })
    })
</script>



<script>
    $(document).ready(function() {
        $('#SD').on('change', function() {
            var SD = $("#SD").val();
            SD = btoa(SD);
            if (SD != "") {
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=subject_level_data&list=" + SD;
            } else {}
        })
    })
</script>