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
                'paging' : false,
                'lengthChange' : false,
                'searching' : false,
                'ordering' : false,
                'info' : true,
                'autoWidth' : false,
                columnDefs: [{
                    "targets": '_all',
                    "createdCell": function(td, cellData, rowData, row, col) {
                        $(td).css('padding', '4px')
                    }
                }]
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
            $('#Add_course_show_class').on('click', function() {
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
                                var code_list=btoa(grade);
                                var manage="show";
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
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
                                                        const b_course_show_class = content.querySelector('b_course_show_class')
                                                        if (b_course_show_class) {
                                                            b_course_show_class.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+code_list+"&id="+code_list;
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



<!--Add_Course_Class-->
<script>
    $(document).ready(function() {

// Defaults
        var swalInitAddCourseClass = swal.mixin({
                buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
// Defaults End

            $('#Add_Course_Class').on('click', function() {
                swalInitAddCourseClass.fire({
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

                        var action = "create_course_class";
                        
                        var level=$("#level").val(); //*
                        var teacher1=$("#teacher1").val(); //*
                        var rate1=$("#rate1").val(); //*
                        var teacher2=$("#teacher2").val();
                        var rate2=$("#rate2").val();
                        var score1_1=$("#score1_1").val(); //*
                        var score1_2=$("#score1_2").val(); //*

                        var score1_1_error="yes";
                        var rate1_error="yes";
                        var score1_2_error="yes";

                        var cdid=$("#cdid").val();

                        if (action == "") {
                            swalInitAddCourseClass.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {


                            if(level==""){
                                document.getElementById("level-null").innerHTML ='<font style="color: red;">เลือกข้อมูล ระดับวิชา</font>';
                            }else{
                                document.getElementById("level-null").innerHTML ='';
                            }

                            if(teacher1==""){
                                document.getElementById("teacher1-null").innerHTML ='<font style="color: red;">เลือกข้อมูล ครูผู้สอน</font>';
                            }else{
                                document.getElementById("teacher1-null").innerHTML ='';
                            }

                            if(rate1==""){
                                document.getElementById("rate1-null").innerHTML =
                                '<input type="text" name="rate1" id="rate1" class="form-control is-invalid" value="'+rate1+'" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">'+
                                '<span class="invalid-feedback">กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>';
                                rate1_error="yes";
                            }else{

                                if(Number(rate1)){
                                    document.getElementById("rate1-null").innerHTML =
                                    '<input type="text" name="rate1" id="rate1" class="form-control" value="'+rate1+'" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">'+
                                    '<span>กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>';
                                    rate1_error="no";
                                }else{
                                    document.getElementById("rate1-null").innerHTML =
                                    '<input type="text" name="rate1" id="rate1" class="form-control is-invalid" value="'+rate1+'" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลเป็นตัวเลข</span>';
                                    rate1_error="yes";                                    
                                }


                            }

                            if(score1_1==""){
                                document.getElementById("score1_1-null").innerHTML =
                                '<input type="text" name="score1_1" id="score1_1" class="form-control is-invalid" value="'+score1_1+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">'+
                                '<span class="invalid-feedback">กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>';
                                score1_1_error="yes";
                            }else{
                              
                                if(Number(score1_1)){
                                    document.getElementById("score1_1-null").innerHTML =
                                    '<input type="text" name="score1_1" id="score1_1" class="form-control" value="'+score1_1+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">'+
                                    '<span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>';
                                    score1_1_error="no";
                                }else{
                                    document.getElementById("score1_1-null").innerHTML =
                                    '<input type="text" name="score1_1" id="score1_1" class="form-control is-invalid" value="'+score1_1+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลเป็นตัวเลข</span>';
                                    score1_1_error="yes";
                                }
                               

                            }

                            if(score1_2==""){
                                document.getElementById("score1_2-null").innerHTML =
                                '<input type="text" name="score1_2" id="score1_2" class="form-control is-invalid" value="'+score1_2+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">'+
                                '<span class="invalid-feedback">กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>';
                                score1_2_error="yes";
                            }else{
                                if(Number(score1_2)){
                                    document.getElementById("score1_2-null").innerHTML =
                                    '<input type="text" name="score1_2" id="score1_2" class="form-control" value="'+score1_2+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">'+
                                    '<span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>';
                                    score1_2_error="no";
                                }else{
                                    document.getElementById("score1_2-null").innerHTML =
                                    '<input type="text" name="score1_2" id="score1_2" class="form-control is-invalid" value="'+score1_2+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลเป็นตัวเลข</span>';
                                    score1_2_error="yes";                                    
                                }

                            }



                            if (level != "" && teacher1!="" && rate1!="" && score1_1!="" && score1_2!="" && score1_1_error!="yes" && rate1_error!="yse" && score1_2_error!="yse") {
                                var manage="form_show_course";
                                /*var cid=btoa(course_key);
                                var id=btoa(id);
                                var list=btoa(list);*/
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                    action: action,
                                    level:level,
                                    teacher1:teacher1,
                                    rate1:rate1,
                                    teacher2:teacher2,
                                    rate2:rate2,
                                    score1_1:score1_1,
                                    score1_2:score1_2,
                                    cdid:cdid

                                }, function(process_add) {

                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitAddCourseClass.fire({
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
                                                        const b_course_show_class = content.querySelector('b_course_show_class')
                                                        if (b_course_show_class) {
                                                            b_course_show_class.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+code_list+"&id="+code_list;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitAddCourseClass.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitAddCourseClass.fire({
                                            //title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+process_add.trim(),
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



    })
</script>

<!--Add_Course_Class End-->


<!--Edit_Course_Class -->
<script>
    $(document).ready(function() {

// Defaults
        var swalInitAddCourseClass = swal.mixin({
                buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
// Defaults End

            $('#Edit_Course_Class').on('click', function() {
                swalInitAddCourseClass.fire({
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

                        var action = "edit_course_class";
                        
                        var level=$("#level").val(); //*
                        var teacher1=$("#teacher1").val(); //*
                        var rate1=$("#rate1").val(); //*
                        var teacher2=$("#teacher2").val();
                        var rate2=$("#rate2").val();
                        var score1_1=$("#score1_1").val(); //*
                        var score1_2=$("#score1_2").val(); //*

                        var score1_1_error="yes";
                        var rate1_error="yes";
                        var score1_2_error="yes";

                        var cdid=$("#cdid").val();
                        var lid=$("#lid").val();

                        if (action == "") {
                            swalInitAddCourseClass.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {


                            if(level==""){
                                document.getElementById("level-null").innerHTML ='<font style="color: red;">เลือกข้อมูล ระดับวิชา</font>';
                            }else{
                                document.getElementById("level-null").innerHTML ='';
                            }

                            if(teacher1==""){
                                document.getElementById("teacher1-null").innerHTML ='<font style="color: red;">เลือกข้อมูล ครูผู้สอน</font>';
                            }else{
                                document.getElementById("teacher1-null").innerHTML ='';
                            }

                            if(rate1==""){
                                document.getElementById("rate1-null").innerHTML =
                                '<input type="text" name="rate1" id="rate1" class="form-control is-invalid" value="'+rate1+'" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">'+
                                '<span class="invalid-feedback">กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>';
                                rate1_error="yes";
                            }else{

                                if(Number(rate1)){
                                    document.getElementById("rate1-null").innerHTML =
                                    '<input type="text" name="rate1" id="rate1" class="form-control" value="'+rate1+'" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">'+
                                    '<span>กรอกเปอร์เซ็นต์การคำนวณหน่วยกิตคะแนน เช่น 100 , 50</span>';
                                    rate1_error="no";
                                }else{
                                    document.getElementById("rate1-null").innerHTML =
                                    '<input type="text" name="rate1" id="rate1" class="form-control is-invalid" value="'+rate1+'" placeholder="กรอกข้อมูลหน่วยกิตคะแนน">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลเป็นตัวเลข</span>';
                                    rate1_error="yes";                                    
                                }


                            }

                            if(score1_1==""){
                                document.getElementById("score1_1-null").innerHTML =
                                '<input type="text" name="score1_1" id="score1_1" class="form-control is-invalid" value="'+score1_1+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">'+
                                '<span class="invalid-feedback">กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>';
                                score1_1_error="yes";
                            }else{
                              
                                if(Number(score1_1)){
                                    document.getElementById("score1_1-null").innerHTML =
                                    '<input type="text" name="score1_1" id="score1_1" class="form-control" value="'+score1_1+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">'+
                                    '<span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนเก็บ เช่น 70</span>';
                                    score1_1_error="no";
                                }else{
                                    document.getElementById("score1_1-null").innerHTML =
                                    '<input type="text" name="score1_1" id="score1_1" class="form-control is-invalid" value="'+score1_1+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนเก็บ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลเป็นตัวเลข</span>';
                                    score1_1_error="yes";
                                }
                               

                            }

                            if(score1_2==""){
                                document.getElementById("score1_2-null").innerHTML =
                                '<input type="text" name="score1_2" id="score1_2" class="form-control is-invalid" value="'+score1_2+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">'+
                                '<span class="invalid-feedback">กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>';
                                score1_2_error="yes";
                            }else{
                                if(Number(score1_2)){
                                    document.getElementById("score1_2-null").innerHTML =
                                    '<input type="text" name="score1_2" id="score1_2" class="form-control" value="'+score1_2+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">'+
                                    '<span>กรอกเปอร์เซ็นต์สัดส่วนคะแนนสอบ เช่น 30</span>';
                                    score1_2_error="no";
                                }else{
                                    document.getElementById("score1_2-null").innerHTML =
                                    '<input type="text" name="score1_2" id="score1_2" class="form-control is-invalid" value="'+score1_2+'" placeholder="กรอกข้อมูลสัดส่วนคะแนนสอบ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลเป็นตัวเลข</span>';
                                    score1_2_error="yes";                                    
                                }

                            }



                            if (level != "" && teacher1!="" && rate1!="" && score1_1!="" && score1_2!="" && score1_1_error!="yes" && rate1_error!="yse" && score1_2_error!="yse") {
                                var manage="form_show_course";
                                /*var cid=btoa(course_key);
                                var id=btoa(id);
                                var list=btoa(list);*/
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                    action: action,
                                    level:level,
                                    teacher1:teacher1,
                                    rate1:rate1,
                                    teacher2:teacher2,
                                    rate2:rate2,
                                    score1_1:score1_1,
                                    score1_2:score1_2,
                                    cdid:cdid,
                                    lid:lid

                                }, function(process_add) {

                                    var process_add = process_add;
                                    if (process_add.trim() === "no_error") {

                                        let timerInterval;
                                        swalInitAddCourseClass.fire({
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
                                                        const b_course_show_class = content.querySelector('b_course_show_class')
                                                        if (b_course_show_class) {
                                                            b_course_show_class.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+code_list+"&id="+code_list;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitAddCourseClass.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitAddCourseClass.fire({
                                            //title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+process_add.trim(),
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



    })
</script>
<!--Edit_Course_Class End-->



<!--Add Subject Data -->
<script>
    var SA_AddSubjectData = function() {
        var _componentSA_AddSubjectData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddCourseClass = swal.mixin({
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
                swalInitAddCourseClass.fire({
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
                        var id=$("#id").val();
                        var list=$("#list").val();

                        if (action == "") {
                            swalInitAddCourseClass.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {


                            if (subjectid != "") {
                                var manage="form_show_course";
                                var cid=btoa(course_key);
                                var id=btoa(id);
                                var list=btoa(list);
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                    action: action,
                                    course_key: course_key,
                                    subjectid: subjectid

                                }, function(process_edit) {

                                    let timerInterval;
                                    swalInitAddCourseClass.fire({
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
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+list+"&id="+id+"&cid="+cid;
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

<!--Add Subject Level -->
<script>
    var SA_AddSubjectLevel = function() {
        var _componentSA_AddSubjectLevel = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddSubjectLevel = swal.mixin({
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
            $('#Add_Subject_Level').on('click', function() {
                swalInitAddSubjectLevel.fire({
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

                        var action = "subject_level";
                        var course_key = $("#course_key").val();
                        var course_detail_key = $("#course_detail_key").val();
                        var subject_key = $("#subject_key").val();
                        var level = $("#level").val();
                        var id_key = btoa(course_key);

                        if (action == "") {
                            swalInitAddSubjectLevel.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {


            
                            if (course_detail_key != "" && subject_key != "" && level!="") {

                                var manage="form_show_level";
                                var list=btoa(level);
                                var id=btoa(level);
                                var sid=btoa(subject_key);
                                var cid=btoa(course_key);
                                
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                    action: action,
                                    course_key: course_key,
                                    course_detail_key: course_detail_key,
                                    subject_key: subject_key,
                                    level: level

                                }, function(process_edit) {

                                    let timerInterval;
                                    swalInitAddSubjectLevel.fire({
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
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+list+"&id="+id+"&sid="+sid+"&cid="+cid;
                                        } else {}
                                    });


                                })
                            } else {
                                swalInitAddSubjectLevel.fire({
                                    title: 'ข้อมูลไม่ถูกต้อง',
                                    text: 'คุณยังไม่ได้เลือกรายการระดับรายวิชา หรือ ข้อมูลมีข้อผิดพลาด',
                                    icon: 'error'
                                });
                            }
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
            initComponentsAddSubjectLevel: function() {
                _componentSA_AddSubjectLevel();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_AddSubjectLevel.initComponentsAddSubjectLevel();
    });
</script>
<!--Add Subject Level End-->

<!--Update-->
<script>
    var SA_UpCourseData = function() {
        var _componentSA_UpCourseData = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitUpCourseClass = swal.mixin({
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
            $('#Update_course_show_class').on('click', function() {

                swalInitUpCourseClass.fire({
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
                            swalInitUpCourseClass.fire({
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

                                var code_list=btoa(grade);
                                var manage="show";

                                // document.getElementById("test2").innerHTML=""+name+" "+ename+" "+grade+" "+cy+" "+cy_error+" "+note+" "+course_key;

                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
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
                                        swalInitUpCourseClass.fire({
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
                                                        const b_course_show_class = content.querySelector('b_course_show_class')
                                                        if (b_course_show_class) {
                                                            b_course_show_class.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+code_list+"&id="+code_list;
                                            } else {}
                                        });

                                    } else if (process_add.trim() === "it_error") {
                                        swalInitUpCourseClass.fire({
                                            title: 'ข้อมูลซ้ำ',
                                            icon: 'error'
                                        });
                                    } else {
                                        swalInitUpCourseClass.fire({
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

<!--Add Course No -->
<script>
    var SA_AddCourseNo = function() {
        var _componentSA_AddCourseNo = function() {
            if (typeof swal == 'undefined') {
                console.warn('Warning - sweet_alert.min.js is not loaded.');
                return;
            }
            // Defaults
            var swalInitAddCourseNo = swal.mixin({
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
            $('#Add_course_no').on('click', function() {
                swalInitAddCourseNo.fire({
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

                        var action = "course_no";
                        var course_key = $("#course_key").val();
                        var course_detail_key = $("#course_detail_key").val();
                        var sort = $("#sort").val();
                        var id_key = btoa(course_key);

                        if (action == "") {
                            swalInitAddCourseNo.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                        } else {


                            if (course_key != "" && course_detail_key != "") {
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                    action: action,
                                    course_key: course_key,
                                    course_detail_key: course_detail_key,
                                    sort: sort

                                }, function(process_edit) {

                                    let timerInterval;
                                    swalInitAddCourseNo.fire({
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
                                                    const b_course_no = content.querySelector('b_course_no')
                                                    if (b_course_no) {
                                                        b_course_no.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&list=show&id=" + id_key;
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
            initComponentsAddCourseNo: function() {
                _componentSA_AddCourseNo();
            }
        }
    }();
    // Initialize module
    // ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_AddCourseNo.initComponentsAddCourseNo();
    });
</script>
<!--Add Course No End-->

<!--Update Subject -->
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
                        var action = "update_subject";
                        var code = $("#code").val();
                        var name = $("#name").val();
                        var ename = $("#ename").val();
                        var unit = $("#unit").val();
                        var unit_error = "error";
                        var weight = $("#weight").val();
                        var subt = $("#subt").val();
                        var grade = $("#grade").val();
                        var course_key = $("#course_key").val();
                        var course_detail_key = $("#course_detail_key").val();
                        //var id_key = btoa(course_key);

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

                            if (weight == "") {
                                document.getElementById("update-weight-null").innerHTML =
                                    '<input type="text" name="weight" id="weight" class="form-control is-invalid" value="" placeholder="" required="required">' +
                                    '<span class="invalid-feedback">กรอกข้อมูลหน่วยกิต เช่น 2</span>';
                            } else {
                                document.getElementById("update-weight-null").innerHTML =
                                    '<input type="text" name="weight" id="weight" class="form-control" value="' + weight + '" placeholder="" required="required">' +
                                    '<span>กรอกข้อมูลหน่วยกิต เช่น 2</span>';
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

                            if (code != "" && name != "" && ename != "" && unit != "" && unit_error != "error" && weight != "" && subt != "" && grade != "") {
                                var manage="form_show_course";
                                var id=btoa(grade);
                                var list=btoa(grade);
                                var cid=btoa(course_key);
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/course_show_class/course_show_class_process.php", {
                                    action: action,           
                                    code: code,
                                    name: name,
                                    ename: ename,
                                    unit: unit,
                                    weight: weight,
                                    subt: subt,
                                    grade: grade,
                                    course_key: course_key,
                                    course_detail_key: course_detail_key
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
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+list+"&id="+id+"&cid="+cid;
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
<!--Update Subject End-->

<script>
    $(document).ready(function() {
        $('#button_add').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&list=form_add&gid" + $list;
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
        $('#course_show_class').on('click', function() {
            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class";
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
                classSD=btoa(classSD);
            var manage="show";
            if (classSD != "") {
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=course_show_class&manage="+manage+"&list="+classSD+"&id="+classSD;
            } else {}
        })
    })
</script>