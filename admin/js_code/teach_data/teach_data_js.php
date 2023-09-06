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

<!--App-->
<script>
    $(document).ready(function() {
   

 // Defaults
            var swalInitAPPTeacherData1 = swal.mixin({
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
            });
// Defaults End

            $('#Add_Teach_Data1').on('click', function() {
                
                swalInitPassTeacherAll.fire({
                    title: 'ต้องการเปลี่ยนรหัสผ่านหรือไม่',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonText: 'ใช้',
                    cancelButtonText: 'ไม่',
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    }
                }).then(function(result) {})

            })

        
    })
</script>
<!--App-->

<!--Update-->
<script>
	var ABA_Upteach_data = function () {
            var _componentABA_Upteach_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpTeacherData1 = swal.mixin({
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
		$('#Edit_teach_data').on('click', function() {
            swalInitUpTeacherData1.fire({
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
                    var teacher_key=$("#teacher_key").val();
                    var name=$("#name").val();//*
                    var surname=$("#surname").val();
                    var gender=$("#gender").val();
                    var position=$("#position").val();
                    var section=$("#section").val();
                    var ttype=$("#ttype").val();
                    var tclass=$("#tclass").val();
                    var tteach=$("#tteach").val();
                    var username=$("#username").val(); //*
                    var password=$("#password").val(); //*
                    var status_work=$("#status_work").val();//*
                    var teacher_key=$("#teacher_key").val();//*

                    var id_key=btoa(teacher_key);

                    var td_id=$("#td_id").val();  
                        td_id=btoa(td_id);

                        if(action==""){
                            swalInitUpTeacherData1.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{
                            
                        if(name==""){
                            document.getElementById("name-edit").innerHTML=
                            '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                            '<span class="invalid-feedback">กรุณากรอกข้อมูลชื่อ</span>'
                        }else{
                            document.getElementById("name-edit").innerHTML=
                            '<input type="text" name="name" id="name" class="form-control" value="'+name+'" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                            '<span>กรอกข้อมูลชื่อ</span>'
                        }
                            
                        if(username==""){
                            document.getElementById("username-edit").innerHTML=
                            '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอก Username" required="required">'+
                            '<span class="invalid-feedback">กรอก Username</span>'
                        }else{
                            document.getElementById("username-edit").innerHTML=
                            '<input type="text" name="username" id="username" class="form-control" value="'+username+'" placeholder="กรอก Username" required="required">'+
                            '<span>กรอก Username</span>'
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

                        if(status_work==""){
                            document.getElementById("status_work-edit").innerHTML='<span style="color: red;">กรอกข้อมูล สถานะการทำงาน</span>';
                        }else{
                            document.getElementById("status_work-edit").innerHTML='<span"></span>';
                        }

                            if(name!="" && username!="" && status_work!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/teach_data/teach_data_process.php",{
                                    action:action,
                                    name:name,
                                    surname:surname,
                                    gender:gender,
                                    position:position,
                                    section:section,
                                    ttype:ttype,
                                    tclass:tclass,
                                    tteach:tteach,
                                    username:username,
                                    //password:password,
                                    teacher_key:teacher_key,
                                    status_work:status_work
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitUpTeacherData1.fire({
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
                                                            const b_teach_data = content.querySelector('b_teach_data')
                                                            if (b_teach_data) {
                                                                b_teach_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=teach_data&list="+td_id; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitUpTeacherData1.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitUpTeacherData1.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitUpTeacherData1.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitUpTeacherData1.fire(
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
            initComponentsUpTeacherData1: function() {
                _componentABA_Upteach_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Upteach_data.initComponentsUpTeacherData1();
    });
</script>
<!--Update End-->

<!--Password-->
<script>
	var ABA_Passteach_data = function () {
            var _componentABA_Passteach_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitPassTeacherData1 = swal.mixin({
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
		$('#password_teach_data').on('click', function() {
            swalInitPassTeacherData1.fire({
                title: 'ต้องการเปลี่ยนรหัสผ่านหรือไม่',
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
                   
					var action="password";
                    var teacher_key=$("#teacher_key").val();
                    var id_key=btoa(teacher_key);
                    var password=$("#password").val(); //*
                    var password_error="yes";

                    var td_id=$("#td_id").val();  
                        td_id=btoa(td_id);

                        if(action==""){
                            swalInitPassTeacherData1.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{
                            
                        if(password!=""){
                            if(password.length>=6){
                                if(password.match(/^([0-9])+$/i)){
                                    document.getElementById("password-pass").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                    password_error="yes";
                                }else{
                                    document.getElementById("password-pass").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">ข้อมูล Password เบื้องต้น aba@123456</span>'
                                    password_error="no";
                                }
                            }else{
                                document.getElementById("password-pass").innerHTML=
                                '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                password_error="yes";
                            }
                        }else{
                            document.getElementById("password-pass").innerHTML=
                            '<input type="text" name="password" id="password" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                            '<span class="invalid-feedback">กรุณาข้อมูล Password เบื้องต้น aba@123456</span>'
                            password_error="yes";
                        }

                            if(password_error!="yes" && password!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/teach_data/teach_data_process.php",{
                                    action:action,
                                    teacher_key:teacher_key,
                                    password:password
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitPassTeacherData1.fire({
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
                                                            const b_teach_data = content.querySelector('b_teach_data')
                                                            if (b_teach_data) {
                                                                b_teach_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=teach_data&list="+td_id; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitPassTeacherData1.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitPassTeacherData1.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitPassTeacherData1.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitPassTeacherData1.fire(
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
            initComponentsPassTeacherData1: function() {
                _componentABA_Passteach_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Passteach_data.initComponentsPassTeacherData1();
    });
</script>
<!--Password End-->

<!--Add2-->
<script>
	var ABA_Addteacher_data2 = function () {
            var _componentABA_Addteacher_data2 = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitAddTeacherData2 = swal.mixin({
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
		$('#Add_teacher_data2').on('click', function() {
            swalInitAddTeacherData2.fire({
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
                    var name=$("#name").val();//*
                    var surname=$("#surname").val();
                    var gender=$("#gender").val();
                    var position=$("#position").val();
                    var section=$("#section").val();
                    var ttype=$("#ttype").val();
                    var tclass=$("#tclass").val();
                    var tteach=$("#tteach").val();
                    var username=$("#username").val(); //*
                    var password=$("#password").val(); //*
                    var password_error="yes";
                
                    var td_id=$("#td_id").val();  
                        td_id=btoa(td_id);

                        if(action==""){
                            swalInitAddTeacherData2.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{
                            
                        if(name==""){
                            document.getElementById("name-null").innerHTML=
                            '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                            '<span class="invalid-feedback">กรุณากรอกข้อมูลชื่อ</span>'
                        }else{
                            document.getElementById("name-null").innerHTML=
                            '<input type="text" name="name" id="name" class="form-control" value="'+name+'" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                            '<span>กรอกข้อมูลชื่อ</span>'
                        }
                            
                        if(username==""){
                            document.getElementById("username-null").innerHTML=
                            '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอก Username" required="required">'+
                            '<span class="invalid-feedback">กรอก Username</span>'
                        }else{
                            document.getElementById("username-null").innerHTML=
                            '<input type="text" name="username" id="username" class="form-control" value="'+username+'" placeholder="กรอก Username" required="required">'+
                            '<span>กรอก Username</span>'
                        }

                        if(password!=""){
                            if(password.length>=6){
                                if(password.match(/^([0-9])+$/i)){
                                    document.getElementById("password-null").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                    password_error="yes";
                                }else{
                                    document.getElementById("password-null").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">ข้อมูล Password เบื้องต้น aba@123456</span>'
                                    password_error="no";
                                }
                            }else{
                                document.getElementById("password-null").innerHTML=
                                '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                password_error="yes";
                            }
                        }else{
                            document.getElementById("password-null").innerHTML=
                            '<input type="text" name="password" id="password" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                            '<span class="invalid-feedback">กรุณาข้อมูล Password เบื้องต้น aba@123456</span>'
                            password_error="yes";
                        }

                            if(name!="" && username!="" && password_error!="yes" && password!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/teach_data/teach_data_process.php",{
                                    action:action,
                                    name:name,
                                    surname:surname,
                                    gender:gender,
                                    position:position,
                                    section:section,
                                    ttype:ttype,
                                    tclass:tclass,
                                    tteach:tteach,
                                    username:username,
                                    password:password
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitAddTeacherData2.fire({
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
                                                            const b_teacher_data2 = content.querySelector('b_teacher_data2')
                                                            if (b_teacher_data2) {
                                                                b_teacher_data2.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=teach_data&list="+td_id; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitAddTeacherData2.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitAddTeacherData2.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddTeacherData2.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddTeacherData2.fire(
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
            initComponentsAddTeacherData2: function() {
                _componentABA_Addteacher_data2();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Addteacher_data2.initComponentsAddTeacherData2();
    });
</script>
<!--Add2 End-->

<!--Update2-->
<script>
	var ABA_Upteacher_data2 = function () {
            var _componentABA_Upteacher_data2 = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpTeacherData2 = swal.mixin({
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
		$('#Edit_teacher_data2').on('click', function() {
            swalInitUpTeacherData2.fire({
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
                    var teacher_key=$("#teacher_key").val();
                    var name=$("#name").val();//*
                    var surname=$("#surname").val();
                    var gender=$("#gender").val();
                    var position=$("#position").val();
                    var section=$("#section").val();
                    var ttype=$("#ttype").val();
                    var tclass=$("#tclass").val();
                    var tteach=$("#tteach").val();
                    var username=$("#username").val(); //*
                    var password=$("#password").val(); //*
                    var status_work=$("#status_work").val();//*
                    var teacher_key=$("#teacher_key").val();//*

                    var id_key=btoa(teacher_key);

                    var td_id=$("#td_id").val();  
                        td_id=btoa(td_id);

                        if(action==""){
                            swalInitUpTeacherData2.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{
                            
                        if(name==""){
                            document.getElementById("name-edit").innerHTML=
                            '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                            '<span class="invalid-feedback">กรุณากรอกข้อมูลชื่อ</span>'
                        }else{
                            document.getElementById("name-edit").innerHTML=
                            '<input type="text" name="name" id="name" class="form-control" value="'+name+'" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                            '<span>กรอกข้อมูลชื่อ</span>'
                        }
                            
                        if(username==""){
                            document.getElementById("username-edit").innerHTML=
                            '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอก Username" required="required">'+
                            '<span class="invalid-feedback">กรอก Username</span>'
                        }else{
                            document.getElementById("username-edit").innerHTML=
                            '<input type="text" name="username" id="username" class="form-control" value="'+username+'" placeholder="กรอก Username" required="required">'+
                            '<span>กรอก Username</span>'
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

                        if(status_work==""){
                            document.getElementById("status_work-edit").innerHTML='<span style="color: red;">กรอกข้อมูล สถานะการทำงาน</span>';
                        }else{
                            document.getElementById("status_work-edit").innerHTML='<span"></span>';
                        }

                            if(name!="" && username!="" && status_work!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/teach_data/teach_data_process.php",{
                                    action:action,
                                    name:name,
                                    surname:surname,
                                    gender:gender,
                                    position:position,
                                    section:section,
                                    ttype:ttype,
                                    tclass:tclass,
                                    tteach:tteach,
                                    username:username,
                                    //password:password,
                                    teacher_key:teacher_key,
                                    status_work:status_work
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitUpTeacherData2.fire({
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
                                                            const b_teacher_data2 = content.querySelector('b_teacher_data2')
                                                            if (b_teacher_data2) {
                                                                b_teacher_data2.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=teach_data&list="+td_id; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitUpTeacherData2.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitUpTeacherData2.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitUpTeacherData1.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitUpTeacherData1.fire(
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
            initComponentsUpTeacherData2: function() {
                _componentABA_Upteacher_data2();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Upteacher_data2.initComponentsUpTeacherData2();
    });
</script>
<!--Update2 End-->

<!--Password2-->
<script>
	var ABA_Passteacher_data2 = function () {
            var _componentABA_Passteacher_data2 = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitPassTeacherData2 = swal.mixin({
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
		$('#password_teacher_data2').on('click', function() {
            swalInitPassTeacherData2.fire({
                title: 'ต้องการเปลี่ยนรหัสผ่านหรือไม่',
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
                   
					var action="password";
                    var teacher_key=$("#teacher_key").val();
                    var id_key=btoa(teacher_key);
                    var password=$("#password").val(); //*
                    var password_error="yes";

                    var td_id=$("#td_id").val();  
                        td_id=btoa(td_id);

                        if(action==""){
                            swalInitPassTeacherData2.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{
                            
                        if(password!=""){
                            if(password.length>=6){
                                if(password.match(/^([0-9])+$/i)){
                                    document.getElementById("password-pass").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                    password_error="yes";
                                }else{
                                    document.getElementById("password-pass").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">ข้อมูล Password เบื้องต้น aba@123456</span>'
                                    password_error="no";
                                }
                            }else{
                                document.getElementById("password-pass").innerHTML=
                                '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                password_error="yes";
                            }
                        }else{
                            document.getElementById("password-pass").innerHTML=
                            '<input type="text" name="password" id="password" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                            '<span class="invalid-feedback">กรุณาข้อมูล Password เบื้องต้น aba@123456</span>'
                            password_error="yes";
                        }

                            if(password_error!="yes" && password!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/teach_data/teach_data_process.php",{
                                    action:action,
                                    teacher_key:teacher_key,
                                    password:password
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitPassTeacherData2.fire({
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
                                                            const b_teacher_data2 = content.querySelector('b_teacher_data2')
                                                            if (b_teacher_data2) {
                                                                b_teacher_data2.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=teach_data&list="+td_id; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitPassTeacherData2.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitPassTeacherData2.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitPassTeacherData2.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitPassTeacherData2.fire(
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
            initComponentsPassTeacherData2: function() {
                _componentABA_Passteacher_data2();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Passteacher_data2.initComponentsPassTeacherData2();
    });
</script>
<!--Password2 End-->


<script>
    $(document).ready(function() {
        $('#check_term,#check_test').on('change', function() {
            var check_test=$("#check_test").val();
            var check_term=$("#check_term").val();
            var id=$("#id").val();
            var tid=$("#tid").val();
            var exam_no=$("#exam_no").val();
           /*var key_list="dGVhY2hfZGF0YV9zaG93";
            var key_test=btoa(check_test);
            var key_term=btoa(check_term);
            var key_id=btoa(id);
            var key_tid=btoa(tid);*/

                if(check_test!="" && check_term!="" && tid!="" && id!="" && exam_no!=""){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/teach_data/teach_data_show.php",{
                        check_test:check_test,
                        check_term:check_term,
                        tid:tid,
                        id:id,
                        exam_no:exam_no
                    },function(run_teach_data){
                        if(run_teach_data!=""){
                            $("#run_teach_data").html(run_teach_data);
                        }else{}
                       // document.location="<?php //echo $RunLink->Call_Link_System();?>/?modules=teach_data&list="+key_list+"&check_test="+key_test+"&check_term="+key_term+"&id="+key_id+"&tid="+key_tid; 
                    })
                }else{}
        })
    })
</script>