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

/*error_reporting (E_ALL ^ E_NOTICE);
ini_set('display_errors', 'On');*/

?>
<?php check_login('admin_username_aba', 'login.php'); ?>
<script src="<?php echo $RunLink->Call_Link_System(); ?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<!--<script src="<?php //echo $RunLink->Call_Link_System();
                    ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>-->
<!--<script src="<?php //echo $RunLink->Call_Link_System();
                    ?>/template/global_assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>-->
<!--<script src="<?php //echo $RunLink->Call_Link_System();
                    ?>/template/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>-->

<script>
    $(document).ready(function() {
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });

        $('.select-search').select2();
    })
</script>


<script>
    $(document).ready(function() {

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

        $('#datatable-button-html5-columns-STDA1').DataTable({
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

        $('#datatable-button-html5-columns-STDA').DataTable({
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

    })
</script>



<!--add_class_student-->
<!-- by beer -->
    <script>
        $(document).ready(function() {

            // Defaults
            var swalInitAddClassStudent = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
            // Defaults End

            $('#add_class_student').on('click',function(){

                swalInitAddClassStudent.fire({

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

                }).then(function(result){

                    if (result.value){

                        var action="create_class_student";
                        var student1=$("#student1").val();
                        var memo1=$("#memo1").val();
//test null
                        var cid1=$("#cid1").val();
                        var classid1=$("#classid1").val();
                        var class1=$("#class1").val();
                        var term_key1=$("#term_key1").val();
                        var grade_key1=$("#grade_key1").val();
//test null end

                            if(action==""){
                                swalInitAddClassStudent.fire({
                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง '+cid1,
                                    icon: 'error'
                                });
                            }else{

                                if(cid1!="" && classid1!="" && class1!="" && term_key1!="" && grade_key1!=""){

                                    if(student1==""){
                                        document.getElementById("student1-null").innerHTML =
                                        '<span style="color: red;">เลือกข้อมูล นักเรียน</span>'
                                    }else{
                                        document.getElementById("student1-null").innerHTML =
                                        '<span style="color: red;"></span>'                                        
                                    }

                                    var ck=btoa(classid1);
                                    var gk=btoa(grade_key1);
                                    var tk=btoa(term_key1);

                                    // if(memo1==""){
                                    //     document.getElementById("memo1-null").innerHTML =
                                    //     '<textarea class="form-control is-invalid" cols="100%" rows="5" name="memo1" id="memo1"></textarea>'+
                                    //     '<span class="invalid-feedback">กรุณากรอกข้อมูลหมายเหตุ</span>'
                                    // }else{
                                    //     '<textarea class="form-control" cols="100%" rows="5" name="memo1" id="memo1"></textarea>'+
                                    //     '<span>ข้อมูลหมายเหตุ</span>'
                                    // }

                                    if(student1!=""){
                                    //if(student1!="" && memo1!=""){
                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/grade_classroom_data/grade_classroom_data_process.php", {
                                                action: action,
                                                student1:student1,
                                                memo1:memo1,
                                                cid1:cid1,
                                                classid1:classid1,
                                                class1:class1,
                                                term_key1:term_key1,
                                                grade_key1:grade_key1
                                        }, function(process_add) {
                                            var test_process = process_add;
                                            if (test_process.trim() === "no_error") {
                                                let timerInterval;
                                                swalInitAddClassStudent.fire({
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
                                                                const b_grade_classroom_data = content.querySelector('b_grade_classroom_data')
                                                                if (b_grade_classroom_data) {
                                                                    b_grade_classroom_data.textContent = Swal.getTimerLeft();
                                                                } else {}
                                                            } else {}
                                                        }, 100);
                                                    },
                                                    willClose: function() {
                                                        clearInterval(timerInterval)
                                                    }
                                                }).then(function(result) {
                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                        document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data&manage=classroom_show&classroom_key="+ck+"&grade_key="+gk+"&term_key="+tk;
                                                    } else {}
                                                });

                                            } else if (test_process.trim() === "it_error") {
                                                swalInitAddClassStudent.fire({
                                                    title: 'ข้อมูลซ้ำ',
                                                    icon: 'error'
                                                });
                                            } else {
                                                swalInitAddClassStudent.fire({
                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                                    icon: 'error'
                                                });
                                            }
                                        })
                                    }else{}

                                }else{
                                    swalInitAddClassStudent.fire({
                                        title: 'พบข้อผิดพลาด',
                                        text: 'พบข้อผิดพลาดในส่วนข้อมูลสำคัญ ไม่สามารถดำเนินการได้',
                                        icon: 'error'
                                     });                                    
                                }

                            }

                    }else if (result.dismiss === swal.DismissReason.cancel){
                        /*swalInitAddClassStudent.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        );*/
                    }else{}

                })


            })
        })
    </script>
<!-- by beer end-->
<!--add_class_student end-->

<!--add_classroom_student-->
<!-- by beer-->

    <script>
        $(document).ready(function() {

            // Defaults
            var swalInitAddClassStudent = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
            // Defaults End

            $('#add_classroom_student').on('click',function(){

                swalInitAddClassStudent.fire({

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

                }).then(function(result){

                    if (result.value){

                        var action="create_classroom_student";
                        var classroom2=$("#classroom2").val();
//test null
                        var cid1=$("#cid1").val();
                        var ccid1=$("#ccid1").val();
                        var classid1=$("#classid1").val();
                        var class1=$("#class1").val();
                        var term_key1=$("#term_key1").val();
                        var grade_key1=$("#grade_key1").val();
//test null end

                            if(action==""){
                                swalInitAddClassStudent.fire({
                                    title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง '+cid1,
                                    icon: 'error'
                                });
                            }else{

                                if(cid1!="" && ccid1!="" && classid1!="" && class1!="" && term_key1!="" && grade_key1!=""){

                                    if(classroom2==""){
                                        document.getElementById("classroom2-null").innerHTML =
                                        '<span style="color: red;">เลือกข้อมูล ห้องเรียน</span>'
                                    }else{
                                        document.getElementById("classroom2-null").innerHTML =
                                        '<span style="color: red;"></span>'                                        
                                    }

                                    var ck=btoa(classid1);
                                    var gk=btoa(grade_key1);
                                    var tk=btoa(term_key1);

                                    if(classroom2!=""){
                                  
                                        $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/grade_classroom_data/grade_classroom_data_process.php", {
                                                action: action,
                                                classroom2:classroom2,
                                                cid1:cid1,
                                                ccid1:ccid1,
                                                classid1:classid1,
                                                class1:class1,
                                                term_key1:term_key1,
                                                grade_key1:grade_key1
                                        }, function(process_add) {
                                            var test_process = process_add;

                                            swalInitAddClassStudent.fire({
                                                title: 'รายงานผลการจัดห้องเรียน',
                                                html:  '<h5 >'+test_process.trim()+'</h5>',
                                                icon: 'success'
                                            }).then(function(result){
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data&manage=classroom_show&classroom_key="+ck+"&grade_key="+gk+"&term_key="+tk;
                                            });

                                            /*if (test_process.trim() === "no_error") {
                                                let timerInterval;
                                                swalInitAddClassStudent.fire({
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
                                                                const b_grade_classroom_data = content.querySelector('b_grade_classroom_data')
                                                                if (b_grade_classroom_data) {
                                                                    b_grade_classroom_data.textContent = Swal.getTimerLeft();
                                                                } else {}
                                                            } else {}
                                                        }, 100);
                                                    },
                                                    willClose: function() {
                                                        clearInterval(timerInterval)
                                                    }
                                                }).then(function(result) {
                                                    if (result.dismiss === Swal.DismissReason.timer) {
                                                        document.location = "<?php //echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data";
                                                    } else {}
                                                });

                                            } else if (test_process.trim() === "it_error") {
                                                swalInitAddClassStudent.fire({
                                                    title: 'ข้อมูลซ้ำ',
                                                    icon: 'error'
                                                });
                                            } else {
                                                swalInitAddClassStudent.fire({
                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                                    icon: 'error'
                                                });
                                            }*/
                                        })
                                    }else{}

                                }else{
                                    /*swalInitAddClassStudent.fire({
                                        title: 'พบข้อผิดพลาด',
                                        text: 'พบข้อผิดพลาดในส่วนข้อมูลสำคัญ ไม่สามารถดำเนินการได้',
                                        icon: 'error'
                                     });*/                                    
                                }

                            }

                    }else if (result.dismiss === swal.DismissReason.cancel){
                        swalInitAddClassStudent.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        );
                    }else{}

                })


            })
        })
    </script>

<!-- by beer end-->
<!--add_classroom_student end-->



<!--Add-->
<script>
    $(document).ready(function() {

        // Defaults
        var swalInitAddGradeClassroomData = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        // Defaults End


        $('#Add_grade_classroom_data').on('click', function() {

            swalInitAddGradeClassroomData.fire({
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
                    var class_name = $("#class_name").val();
                    var grade_key = $("#grade").val();

                    // document.getElementById("test1").innerHTML =""+class_name + " " +grade_key;


                    if (action == "") {
                        swalInitAddGradeClassroomData.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            icon: 'error'
                        });
                    } else {

                        if (class_name == "") {
                            document.getElementById("class_name-null").innerHTML =
                                '<input type="text" name="class_name" id="class_name" class="form-control is-invalid" value="' + class_name + '" placeholder="กรอกข้อมูลห้องเรียน" required="required">' +
                                '<span class="invalid-feedback">กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>'
                        } else {
                            document.getElementById("class_name-null").innerHTML =
                                '<input type="text" name="class_name" id="class_name" class="form-control" value="' + class_name + '" placeholder="กรอกข้อมูลห้องเรียน" required="required">' +
                                '<span>กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>'
                        }

                        if (grade_key == "") {
                            document.getElementById("grade_key-null").innerHTML = '<span style="color: red;">กรอกข้อมูลห้องเรียน</span>'
                        } else {
                            document.getElementById("grade_key-null").innerHTML = '<span>กรอกข้อมูลห้องเรียน</span>'
                        }

                        if (class_name != "" && grade_key != "") {
                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/grade_classroom_data/grade_classroom_data_process.php", {
                                action: action,
                                class_name: class_name,
                                grade_key: grade_key
                            }, function(process_add) {
                                var test_process = process_add;
                                if (test_process.trim() === "no_error") {
                                    let timerInterval;
                                    swalInitAddGradeClassroomData.fire({
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
                                                    const b_grade_classroom_data = content.querySelector('b_grade_classroom_data')
                                                    if (b_grade_classroom_data) {
                                                        b_grade_classroom_data.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data&grade_key=" + btoa(grade_key);
                                        } else {}
                                    });

                                } else if (test_process.trim() === "it_error") {
                                    swalInitAddGradeClassroomData.fire({
                                        title: 'ข้อมูลซ้ำ',
                                        icon: 'error'
                                    });
                                } else {
                                    swalInitAddGradeClassroomData.fire({
                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                        icon: 'error'
                                    });
                                }
                            })
                        } else {}

                    }
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    //swalInitAddGradeClassroomData.fire(
                    //'Cancelled',
                    //'Your imaginary file is safe :)',
                    //'error'
                    //);
                } else {}
            })
        })
    })
</script>
<!--Add End-->

<!--Update-->
<script>
    $(document).ready(function() {

        // Defaults
        var swalInitUpdataGradeClassroomData = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        // Defaults End


        $('#Up_grade_classroom_data').on('click', function() {

            swalInitUpdataGradeClassroomData.fire({
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
                    var action = "update";
                    var class_name = $("#class_name").val();
                    var grade_key = $("#grade").val();
                    var classroom_key = $("#classroom_key").val();
                    if (action == "") {
                        swalInitUpdataGradeClassroomData.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            icon: 'error'
                        });
                    } else {

                        if (class_name == "") {
                            document.getElementById("class_name-null").innerHTML =
                                '<input type="text" name="class_name" id="class_name" class="form-control is-invalid" value="' + class_name + '" placeholder="กรอกข้อมูลห้องเรียน" required="required">' +
                                '<span class="invalid-feedback">กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>'
                        } else {
                            document.getElementById("class_name-null").innerHTML =
                                '<input type="text" name="class_name" id="class_name" class="form-control" value="' + class_name + '" placeholder="กรอกข้อมูลห้องเรียน" required="required">' +
                                '<span>กรอกข้อมูลห้องเรียน เช่น Grade 1A , Grade 2A</span>'
                        }

                        if (grade_key == "") {
                            document.getElementById("grade_key-null").innerHTML = '<span style="color: red;">กรอกข้อมูลห้องเรียน</span>'
                        } else {
                            document.getElementById("grade_key-null").innerHTML = '<span>กรอกข้อมูลห้องเรียน</span>'
                        }

                        if (class_name != "" && grade_key != "") {
                            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/grade_classroom_data/grade_classroom_data_process.php", {
                                action: action,
                                class_name: class_name,
                                grade_key: grade_key,
                                classroom_key: classroom_key
                            }, function(process_add) {
                                var test_process = process_add;
                                if (test_process.trim() === "no_error") {
                                    let timerInterval;
                                    swalInitUpdataGradeClassroomData.fire({
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
                                                    const b_grade_classroom_data = content.querySelector('b_grade_classroom_data')
                                                    if (b_grade_classroom_data) {
                                                        b_grade_classroom_data.textContent = Swal.getTimerLeft();
                                                    } else {}
                                                } else {}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function(result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data&grade_key=" + btoa(grade_key);
                                        } else {}
                                    });

                                } else if (test_process.trim() === "it_error") {
                                    swalInitUpdataGradeClassroomData.fire({
                                        title: 'ข้อมูลซ้ำ',
                                        icon: 'error'
                                    });
                                } else {
                                    swalInitUpdataGradeClassroomData.fire({
                                        title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ ' + test_process.trim(),
                                        icon: 'error'
                                    });
                                }
                            })
                        } else {}

                    }
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    //swalInitAddGradeClassroomData.fire(
                    //'Cancelled',
                    //'Your imaginary file is safe :)',
                    //'error'
                    //);
                } else {}
            })
        })
    })
</script>
<!--Update End-->

<!--Show Data-->
<script>
    $(document).ready(function() {
        var grade_key = $("#grade_key").val();
        var grade_name = $("#grade_name").val();
        if (grade_key != "" && grade_name != "") {
            $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/grade_classroom_data/grade_classroom_data_show.php", {
                grade_key: grade_key,
                grade_name: grade_name
            }, function(run_data_gd) {
                $("#run_data_sd").html(run_data_gd)
            })
        } else {}
    })
</script>
<!--Show Data End-->

<script>
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
        $('#term_key').on('change', function() {
            var CK = $("#classroom_key").val();
            var GK = $("#grade_key").val();
            var TK = $("#term_key").val();
            var MA = $("#manage").val();
            // TK = btoa(TK);
            if (TK != "") {
                CK=btoa(CK);
                GK=btoa(GK);
                TK=btoa(TK);
                //MA=btoa(MA);
                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=grade_classroom_data&manage=" + MA + "&classroom_key=" + CK + "&grade_key=" + GK + "&term_key=" + TK;
            } else {}
        })
    })
</script>