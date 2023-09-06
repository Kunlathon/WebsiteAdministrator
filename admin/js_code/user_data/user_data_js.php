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


<!--Add-->
<script>
	var ABA_Adduser_data = function () {
            var _componentABA_Adduser_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitAddUserData = swal.mixin({
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
		$('#Add_user_data').on('click', function() {
            swalInitAddUserData.fire({
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
                    var test_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/;

                    var name=$("#name").val();//*                    
                    var surname=$("#surname").val();                    
                    var username=$("#username").val(); //*
                    var password=$("#password").val(); //*
                    var tel=$("#tel").val();//*
                    var email=$("#email").val();//*
                    var type=$("#type").val();//*
                    var ttype=$("#ttype").val();
                    var grade=$("#grade").val();


                    var password_error="yes";
                    var tel_error="yes";
                    var email_error="yes";

                        if(action==""){
                            swalInitAddUserData.fire({
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

                        if(type==""){
                            document.getElementById("type-null").innerHTML='<span style="color: red;">กรอกข้อมูล ประเภทผู้ใช่งานระบบ</span>';
                        }else{
                            document.getElementById("type-null").innerHTML='<span></span>';
                        }

                        if(tel==""){
                            document.getElementById("tel-null").innerHTML=
                            '<input type="text" name="tel" id="tel" class="form-control  is-invalid" value="" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">'+
                            '<span class="invalid-feedback">กรุณากรอกข้อมูลเบอร์โทรศัพท์</span>'
                            tel_error="yes";
                        }else{
                            if(!tel.match(/^([0-9])+$/i)){
                                document.getElementById("tel-null").innerHTML=
                                '<input type="text" name="tel" id="tel" class="form-control  is-invalid" value="'+tel+'" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">'+
                                '<span class="invalid-feedback">กรุณากรอกเฉราะ</span>'
                                tel_error="yes";
                            }else{
                                document.getElementById("tel-null").innerHTML=
                                '<input type="text" name="tel" id="tel" class="form-control" value="'+tel+'" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">'+
                                '<span>กรอกข้อมูลเบอร์โทรศัพท์</span>'
                                tel_error="no";
                            }
                        }

                        if(email==""){
                            document.getElementById("email-null").innerHTML=
                            '<input type="email" name="email" id="email" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลอีเมล์" required="required">'+
                            '<span class="invalid-feedback">กรุณากรอกข้อมูลอีเมล์</span> '
                            email_error="yes";
                        }else{
                            if(!email.match(test_email)){
                                document.getElementById("email-null").innerHTML=
                                '<input type="mail" name="email" id="email" class="form-control is-invalid" value="'+email+'" required="required">'+
                                '<span class="invalid-feedback">อีเมล์ไม่ถูกต้อง</span>';
                                email_error="yes";
                            }else{
                                document.getElementById("email-null").innerHTML=
                                '<input type="email" name="email" id="email" class="form-control" value="'+email+'" placeholder="กรอกข้อมูลอีเมล์" required="required">'+
                                '<span>กรอกข้อมูลอีเมล์</span> '
                                email_error="no";                                
                            }
                        }

                            if(name!="" && username!="" && password_error!="yes" && type!="" && tel_error!="yes" && email_error!="yes"){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/user_data/user_data_proccess.php",{
                                    action:action,
                                    name:name,
                                    surname:surname,
                                    username:username,
                                    password:password,
                                    tel:tel,
                                    email:email,
                                    type:type,
                                    grade:grade
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitAddUserData.fire({
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
                                                            const b_user_data = content.querySelector('b_user_data')
                                                            if (b_user_data) {
                                                                b_user_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=user_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitAddUserData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitAddUserData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddUserData.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddUserData.fire(
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
            initComponentsAddUserData: function() {
                _componentABA_Adduser_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Adduser_data.initComponentsAddUserData();
    });
</script>
<!--Add End-->

<!--Update-->
<script>
	var ABA_Upuser_data = function () {
            var _componentABA_Upuser_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpUserData = swal.mixin({
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
		$('#Edit_user_data').on('click', function() {
            swalInitUpUserData.fire({
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
                    var test_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/;

                    var name=$("#name").val();//*                    
                    var surname=$("#surname").val();                    
                    var username=$("#username").val(); //*
                    //var password=$("#password").val(); //*
                    var tel=$("#tel").val();//*
                    var email=$("#email").val();//*
                    var type=$("#type").val();//*
                    var ttype=$("#ttype").val();
                    var grade=$("#grade").val();
                    var admin_key=$("#admin_key").val();


                    var password_error="yes";
                    var tel_error="yes";
                    var email_error="yes";

                    var status_work=$("#status_work").val();
                    var id=$("#Edit_user_data").val();

                    var id_key=btoa(admin_key);

                        if(action==""){
                            swalInitAddUserData.fire({
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

                        /*if(password!=""){
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
                        }*/

                        if(type==""){
                            document.getElementById("type-null").innerHTML='<span style="color: red;">กรอกข้อมูล ประเภทผู้ใช่งานระบบ</span>';
                        }else{
                            document.getElementById("type-null").innerHTML='<span></span>';
                        }

                        if(tel==""){
                            document.getElementById("tel-null").innerHTML=
                            '<input type="text" name="tel" id="tel" class="form-control  is-invalid" value="" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">'+
                            '<span class="invalid-feedback">กรุณากรอกข้อมูลเบอร์โทรศัพท์</span>'
                            tel_error="yes";
                        }else{
                            if(!tel.match(/^([0-9])+$/i)){
                                document.getElementById("tel-null").innerHTML=
                                '<input type="text" name="tel" id="tel" class="form-control  is-invalid" value="'+tel+'" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">'+
                                '<span class="invalid-feedback">กรุณากรอกเฉราะ</span>'
                                tel_error="yes";
                            }else{
                                document.getElementById("tel-null").innerHTML=
                                '<input type="text" name="tel" id="tel" class="form-control" value="'+tel+'" placeholder="กรอกข้อมูลเบอร์โทรศัพท์" required="required">'+
                                '<span>กรอกข้อมูลเบอร์โทรศัพท์</span>'
                                tel_error="no";
                            }
                        }

                        if(email==""){
                            document.getElementById("email-null").innerHTML=
                            '<input type="email" name="email" id="email" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลอีเมล์" required="required">'+
                            '<span class="invalid-feedback">กรุณากรอกข้อมูลอีเมล์</span> '
                            email_error="yes";
                        }else{
                            if(!email.match(test_email)){
                                document.getElementById("email-null").innerHTML=
                                '<input type="mail" name="email" id="email" class="form-control is-invalid" value="'+email+'" required="required">'+
                                '<span class="invalid-feedback">อีเมล์ไม่ถูกต้อง</span>';
                                email_error="yes";
                            }else{
                                document.getElementById("email-null").innerHTML=
                                '<input type="email" name="email" id="email" class="form-control" value="'+email+'" placeholder="กรอกข้อมูลอีเมล์" required="required">'+
                                '<span>กรอกข้อมูลอีเมล์</span> '
                                email_error="no";                                
                            }
                        }

                            if(name!="" && username!="" && type!="" && tel_error!="yes" && email_error!="yes"){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/user_data/user_data_proccess.php",{
                                    action:action,
                                    name:name,
                                    surname:surname,
                                    username:username,
                                    //password:password,
                                    tel:tel,
                                    email:email,
                                    type:type,
                                    grade:grade,
                                    status_work:status_work,
                                    admin_key:admin_key
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitUpUserData.fire({
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
                                                            const b_user_data = content.querySelector('b_user_data')
                                                            if (b_user_data) {
                                                                b_user_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=user_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitUpUserData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitUpUserData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddUserData.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddUserData.fire(
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
            initComponentsUpUserData: function() {
                _componentABA_Upuser_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Upuser_data.initComponentsUpUserData();
    });
</script>
<!--Update End-->

<!--Password-->
<script>
	var ABA_Passuser_data = function () {
            var _componentABA_Passuser_data = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitPassUserData = swal.mixin({
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
		$('#password_user_data').on('click', function() {
            swalInitPassUserData.fire({
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
                    var id=$("#password_user_data").val();
                    var id_key=btoa(id);
                    var password=$("#password").val(); //*
                    var admin_key=$("#admin_key").val(); //*
                    var password_error="yes";

                        if(action==""){
                            swalInitPassUserData.fire({
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

                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/user_data/user_data_proccess.php",{
                                    action:action,
                                    admin_key:admin_key,
                                    password:password
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
                                            let timerInterval;
                                            swalInitPassUserData.fire({
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
                                                            const b_user_data = content.querySelector('b_user_data')
                                                            if (b_user_data) {
                                                                b_user_data.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=user_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitPassUserData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitPassUserData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })

                            }else{
                            /* swalInitPassUserData.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }                            

                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitPassUserData.fire(
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
            initComponentsPassUserData: function() {
                _componentABA_Passuser_data();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        ABA_Passuser_data.initComponentsPassUserData();
    });
</script>
<!--Password End-->
