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

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>

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


<!--Add-->
<script>
	var ABA_Addperson_data = function () {
            var _componentABA_Addperson_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitAddPersonData = swal.mixin({
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
		$('#Add_person_data').on('click', function() {
            swalInitAddPersonData.fire({
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
                    //var ttype=$("#ttype").val();
                    //var tclass=$("#tclass").val();
                    //var tteach=$("#tteach").val();
                    var username=$("#username").val(); //*
                    var password=$("#password").val(); //*
                    var password_error="yes";
                    var type="3";

                        if(action==""){
                            swalInitAddPersonData.fire({
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
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/person_data/person_data_process.php",{
                                    action:action,
                                    name:name,
                                    surname:surname,
                                    gender:gender,
                                    position:position,
                                    section:section,
                                    //ttype:ttype,
                                    //tclass:tclass,
                                    //tteach:tteach,
                                    username:username,
                                    password:password,
                                    type:type
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitAddPersonData.fire({
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
                                                            const b_person_data = content.querySelector('b_person_data')
                                                            if (b_person_data) {
                                                                b_person_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=person_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitAddPersonData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitAddPersonData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddPersonData.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddPersonData.fire(
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
            initComponentsAddPersonData: function() {
                _componentABA_Addperson_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Addperson_data.initComponentsAddPersonData();
    });
</script>
<!--Add End-->

<!--Update-->
<script>
	var ABA_Upperson_data = function () {
            var _componentABA_Upperson_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpPersonData = swal.mixin({
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
		$('#Edit_person_data').on('click', function() {
            swalInitUpPersonData.fire({
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
                    var id=$("#Edit_person_data").val();
                    var name=$("#name").val();//*
                    var surname=$("#surname").val();
                    var gender=$("#gender").val();
                    var position=$("#position").val();
                    var section=$("#section").val();
                    //var ttype=$("#ttype").val();
                    //var tclass=$("#tclass").val();
                    //var tteach=$("#tteach").val();
                    var username=$("#username").val(); //*
                    var password=$("#password").val(); //*
                    var status_work=$("#status_work").val();//*
                    var teacher_key=$("#teacher_key").val();//*

                    var id_key=btoa(teacher_key);

                    var type="3";

                        if(action==""){
                            swalInitUpPersonData.fire({
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
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/person_data/person_data_process.php",{
                                    action:action,
                                    name:name,
                                    surname:surname,
                                    gender:gender,
                                    position:position,
                                    section:section,
                                    //ttype:ttype,
                                    //tclass:tclass,
                                    //tteach:tteach,
                                    username:username,
                                    //password:password,
                                    teacher_key:teacher_key,
                                    status_work:status_work,
                                    type:type
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitUpPersonData.fire({
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
                                                            const b_person_data = content.querySelector('b_person_data')
                                                            if (b_person_data) {
                                                                b_person_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=person_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitUpPersonData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitUpPersonData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitUpPersonData.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitUpPersonData.fire(
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
            initComponentsUpPersonData: function() {
                _componentABA_Upperson_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Upperson_data.initComponentsUpPersonData();
    });
</script>
<!--Update End-->

<!--Password-->
<script>
	var ABA_Passperson_data = function () {
            var _componentABA_Passperson_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitPassPersonData = swal.mixin({
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
		$('#password_person_data').on('click', function() {
            swalInitPassPersonData.fire({
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
                    var id=$("#password_person_data").val();
                    var teacher_key=$("#teacher_key").val();
                    var password=$("#password").val(); //*
                    var password_error="yes";

                        if(action==""){
                            swalInitPassPersonData.fire({
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
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/person_data/person_data_process.php",{
                                    action:action,
                                    teacher_key:teacher_key,
                                    password:password
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitPassPersonData.fire({
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
                                                            const b_person_data = content.querySelector('b_person_data')
                                                            if (b_person_data) {
                                                                b_person_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=person_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitPassPersonData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitPassPersonData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitPassPersonData.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitPassPersonData.fire(
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
            initComponentsPassPersonData: function() {
                _componentABA_Passperson_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Passperson_data.initComponentsPassPersonData();
    });
</script>
<!--Password End-->

<script>
    $(document).ready(function(){

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

        $('.ChangePicture').fileinput({
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
            maxFileSize: 100,
            maxFileCount: 1,
            allowedFileExtensions: ["JPG","jpg","PNG","png"]

        });

    })
</script>