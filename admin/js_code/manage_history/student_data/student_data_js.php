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
<?php check_login('admin_username_lcm', 'login.php'); ?>
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
    $(document).ready(function(){

        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{ 
                orderable: false,
                width: 100,
                //targets: [ 7 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        // Apply custom style to select
        $.extend( $.fn.dataTableExt.oStdClasses, {
            "sLengthSelect": "custom-select"
        });

        // Basic datatable
        $('.datatable-button-html5-columns-STD').DataTable({
            
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
        
        $('.datatable-button-html5-columns-STDB').DataTable({
            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            }],
            "paging" : false,
            "lengehChange": false,
            "searching": true,
            "ordering": false,
            "autoWidth": false       
        });

    })
</script>

<script>
    $(document).ready(function(){
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });
    })
</script>


<script>
    $(document).ready(function(){
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
    })
</script>

<!--Add-->
<script>
    $(document).ready(function(){

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
		$('#Add_Student_Data').on('click', function() {
            swalInitAddStudentData.fire({
                title: 'ต้องการบันทึกข้อมูลหรือไม่',
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
            }).then(function(result) {
                if(result.value) {
                   
					var action="create";
                    var idcard=$("#idcard").val();
                    var name=$("#name").val(); //*
                    var surname=$("#surname").val(); //*
                    var ename=$("#ename").val(); //*
                    var esurname=$("#esurname").val(); //*
                    var gender=$("#gender").val();
                    var birthday=$("#birthday").val();
                    var username=$("#username").val(); //*
                    var password=$("#password").val(); //*
                    var grade=$("#grade").val();
                    var classroom=$("#classroom").val();
                    var nickname=$("#nickname").val();
                    var status=$("#status").val();

                    var ename_error="yes"; 
                    var esurname_error="yes";
                    var password_error="yes";

                        if(action==""){
                            swalInitAddStudentData.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{
                            
                            if(name==""){
                                document.getElementById("name-null").innerHTML=
                                '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล ชื่อ</span>'
                            }else{
                                document.getElementById("name-null").innerHTML=
                                '<input type="text" name="name" id="name" class="form-control" value="'+name+'" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                                '<span>กรอกข้อมูลชื่อ</span>'
                            }

                            
                            if(ename!=""){
                                if(!ename.match(/^([a-z A-Z 0-9 . -])+$/i)){
                                    document.getElementById("ename-null").innerHTML=
                                    '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="'+ename+'" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'                                    
                                    ename_error="yes";                                    
                                }else{
                                    document.getElementById("ename-null").innerHTML=
                                    '<input type="text" name="ename" id="ename" class="form-control" value="'+ename+'" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">'+
                                    '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'                                    
                                    ename_error="no";
                                }
                            }else{
                                ename_error="no";
                            }

                            if(esurname!=""){
                                if(!esurname.match(/^([a-z A-Z 0-9 . -])+$/i)){
                                    document.getElementById("esurname-null").innerHTML=
                                    '<input type="text" name="esurname" id="esurname" class="form-control is-invalid" value="'+esurname+'" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'                                     
                                    esurname_error="yes";
                                }else{
                                    document.getElementById("esurname-null").innerHTML=
                                    '<input type="text" name="esurname" id="esurname" class="form-control" value="'+esurname+'" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">'+
                                    '<span>กรอกข้อมูลนามสกุลภาษาอังกฤษ</span>'
                                    esurname_error="no";
                                }
                            }else{
                                esurname_error="no";
                            }
                            

                            if(username==""){
                                document.getElementById("username-null").innerHTML=
                                '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username" required="required">'+
                                '<span class="invalid-feedback">กรุณากรอกข้อมูลรหัสนักเรียน ใช้เป็น Username</span>'
                            }else{
                                document.getElementById("username-null").innerHTML=
                                '<input type="text" name="username" id="username" class="form-control" value="'+username+'" placeholder="กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username" required="required">'+
                                '<span>กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username</span>'                                
                            }

                            if(password!=""){
                                if(password.length>=6){
//Update 10/08/2023 By beer                                    
                                    /*if(password.match(/^([0-9])+$/i)){ 
                                        document.getElementById("password-null").innerHTML=
                                        '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                        password_error="yes";
                                    }else{
                                        document.getElementById("password-null").innerHTML=
                                        '<input type="text" name="password" id="password" class="form-control" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ข้อมูล Password เบื้องต้น aba@123456</span>'
                                        password_error="no";
                                    }*/
//Update 10/08/2023 By beer  End                                    
                                        document.getElementById("password-null").innerHTML=
                                        '<input type="text" name="password" id="password" class="form-control" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ข้อมูล Password เลขประจำตัวประชาชน</span>'
                                        password_error="no";
                                }else{
                                    document.getElementById("password-null").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                    password_error="yes";
                                }
                            }else{
                                document.getElementById("password-null").innerHTML=
                                '<input type="text" name="password" id="password" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เบื้องต้น aba@123456" required="required">'+
                                '<span class="invalid-feedback">กรุณาข้อมูล Password เบื้องต้น เลขประจำตัวประชาชน</span>'
                                password_error="yes";
                            }


                            if(grade==""){
                                document.getElementById("grade-null").innerHTML='<span style="color: red;">กรอกข้อมูล ระดับชั้น</span>';
                            }else{
                                document.getElementById("grade-null").innerHTML='<span></span>';
                            }

                            if(classroom==""){
                                document.getElementById("classroom-null").innerHTML='<span style="color: red;">กรอกข้อมูล ห้องเรียน</span>';
                            }else{
                                document.getElementById("classroom-null").innerHTML='<span></span>';
                            }

                            /*if(status==""){
                                document.getElementById("status-null").innerHTML='<span style="color: red;">กรอกข้อมูล สถานะ</span>';
                            }else{
                                document.getElementById("status-null").innerHTML='<span></span>';
                            }*/


                            if(name!="" && ename_error!="yes" && username!="" && password_error!="yes" && grade!="" && classroom!=""){
                       
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/student_data/student_data_process.php",{
                                    action:action,
                                    idcard:idcard,
                                    name:name,
                                    surname:surname,
                                    ename:ename,
                                    esurname:esurname,
                                    gender:gender,
                                    birthday:birthday,
                                    username:username,
                                    password:password,
                                    grade:grade,
                                    classroom:classroom,
                                    nickname:nickname,
                                    status:status
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
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
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=student_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitAddStudentData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else if(test_process.trim()=="error_classroom"){
                                            swalInitAddStudentData.fire({
                                                title:'จัดห้องก่อน จัดเองนะ',
                                                icon:'warning'
                                            });   
                                        }else{
                                            swalInitAddStudentData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{
                               /* swalInitAddStudentData.fire(
                                    'Cancelled',
                                    'Your imaginary file is safe :)',
                                    'error'
                                );  */                              
                            }
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitAddStudentData.fire(
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
    })
</script>
<!--Add end-->

<!--Update-->
<script>
    $(document).ready(function(){

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
                confirmButtonText: 'ใช้',
                cancelButtonText: 'ไม่',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(result) {
                if(result.value) {
                   
					var action="update";
                    var idcard=$("#idcard").val();
                    var name=$("#name").val(); //*
                    var surname=$("#surname").val(); //*
                    var ename=$("#ename").val(); //*
                    var esurname=$("#esurname").val(); //*
                    var gender=$("#gender").val();
                    var birthday=$("#birthday").val();
                    var username=$("#username").val(); //*
                    //var password=$("#password").val(); //*
                    var grade=$("#grade").val();
                    var classroom=$("#classroom").val();
                    var nickname=$("#nickname").val();
                    //var id_key=btoa(username);                    
                    var status=$("#status").val();

                    var esurname_error="yes";
                    var ename_error="yes";
                    //var password_error="yes";
                    
                    var student_key=$("#student_key").val();
                
                        if(action==""){
                            swalInitEditStudentData.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{
                            
                            if(name==""){
                                document.getElementById("name-edit").innerHTML=
                                '<input type="text" name="name" id="name" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล ชื่อ</span>'
                            }else{
                                document.getElementById("name-edit").innerHTML=
                                '<input type="text" name="name" id="name" class="form-control" value="'+name+'" placeholder="กรอกข้อมูลชื่อ" required="required">'+
                                '<span>กรอกข้อมูลชื่อ</span>'
                            }


                            if(ename!=""){
                                if(!ename.match(/^([a-z A-Z 0-9 . -])+$/i)){
                                    document.getElementById("ename-edit").innerHTML=
                                    '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="'+ename+'" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'                                    
                                    ename_error="yes";                                    
                                }else{
                                    document.getElementById("ename-edit").innerHTML=
                                    '<input type="text" name="ename" id="ename" class="form-control" value="'+ename+'" placeholder="กรอกข้อมูลชื่อภาษาอังกฤษ" required="required">'+
                                    '<span>กรอกข้อมูลชื่อภาษาอังกฤษ</span>'                                    
                                    ename_error="no";
                                }
                            }else{
                                ename_error="no";
                            }

                            if(esurname!=""){
                                if(!esurname.match(/^([a-z A-Z 0-9 . -])+$/i)){
                                    document.getElementById("esurname-edit").innerHTML=
                                    '<input type="text" name="esurname" id="esurname" class="form-control is-invalid" value="'+esurname+'" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">'+
                                    '<span class="invalid-feedback">กรอกข้อมูลได้เฉราะภาษาอังกฤษเท่านั้น</span>'                                     
                                    esurname_error="yes";
                                }else{
                                    document.getElementById("esurname-edit").innerHTML=
                                    '<input type="text" name="esurname" id="esurname" class="form-control" value="'+esurname+'" placeholder="กรอกข้อมูลนามสกุลภาษาอังกฤษ" required="required">'+
                                    '<span>กรอกข้อมูลนามสกุลภาษาอังกฤษ</span>'
                                    esurname_error="no";
                                }
                            }else{
                                esurname_error="no";
                            }
                        
                            if(username==""){
                                document.getElementById("username-edit").innerHTML=
                                '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username" required="required">'+
                                '<span class="invalid-feedback">กรุณากรอกข้อมูลรหัสนักเรียน ใช้เป็น Username</span>'
                            }else{
                                document.getElementById("username-edit").innerHTML=
                                '<input type="text" name="username" id="username" class="form-control" value="'+username+'" placeholder="กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username" required="required">'+
                                '<span>กรอกข้อมูลรหัสนักเรียน ใช้เป็น Username</span>'                                
                            }

                            if(grade==""){
                                document.getElementById("grade-edit").innerHTML='<span style="color: red;">กรุณากรอกข้อมูล ระดับชั้น</span>';
                            }else{
                                document.getElementById("grade-edit").innerHTML='<span></span>';
                            }

                            if(classroom==""){
                                document.getElementById("classroom-edit").innerHTML='<span style="color: red;">กรุณากรอกข้อมูล ห้องเรียน</span>';
                            }else{
                                document.getElementById("classroom-edit").innerHTML='<span></span>';
                            }

                            if(status==""){
                                document.getElementById("status-edit").innerHTML='<span style="color: red;">กรุณากรอกข้อมูล สถานะ</span>';
                            }else{
                                document.getElementById("status-edit").innerHTML='<span></span>';
                            }

                            if(name!="" && ename_error!="yes" && esurname_error!="yes" && username!="" && grade!="" && classroom!="" && status!=""){
                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/student_data/student_data_process.php",{
                                    action:action,
                                    idcard:idcard,
                                    name:name,
                                    surname:surname,
                                    ename:ename,
                                    esurname:esurname,
                                    gender:gender,
                                    birthday:birthday,
                                    username:username,
                                    student_key:student_key,
                                    grade:grade,
                                    classroom:classroom,
                                    nickname:nickname,
                                    status:status
                                },function(process_add){
                                    var test_process=process_add;
                                        if(test_process.trim()==="no_error"){
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
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=student_data"; 
                                                }else{}
                                            });

                                        }else if(test_process.trim()==="it_error"){
                                            swalInitEditStudentData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });                                        
                                        }else{
                                            swalInitEditStudentData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });
                                        }
                                })
                            }else{}
                        }
                }else if(result.dismiss === swal.DismissReason.cancel) {

                    //swalInitLogout.fire(
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
    })
</script>
<!--Updata end-->


<!--password-->
<script>
    $(document).ready(function(){  

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
        $('#student_data_password').on('click', function() {

                swalInitPasswordStudentData.fire({
                    title: 'ต้องการแก้ไขรหัสผ่านหรือไม่',
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
                }).then(function(result){

                    if(result.value){

                        var action="password";
                        var student_password=$("#student_password").val();
                        var password_error="yes";
                        var student_key=$("#student_key").val();

                        if(action==""){
                            swalInitPasswordStudentData.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{

                            if(student_password!=""){
                                if(student_password.length>6){
                                    /*if(student_password.match(/^([0-9])+$/i)){
                                        document.getElementById("password-edit").innerHTML=
                                        '<div class="form-group form-group-feedback form-group-feedback-left">'+
                                        '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg is-invalid" value="'+student_password+'" required="required">'+
                                        '   <span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ(รหัสผ่านเบื้องต้น aba123456)</span>'+
                                        '<div class="form-control-feedback form-control-feedback-lg">'+
                                        '   <i class="icon-key"></i>'+
                                        '</div>'
                                        password_error="yes";
                                    }else{
                                        document.getElementById("password-edit").innerHTML=
                                        '<div class="form-group form-group-feedback form-group-feedback-left">'+
                                        '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg" value="'+student_password+'" required="required">'+
                                        '   <span>กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร ต้องมีตัวเลขและตัวอังกฤษ(รหัสผ่านเบื้องต้น aba123456)</span>'+
                                        '<div class="form-control-feedback form-control-feedback-lg">'+
                                        '   <i class="icon-key"></i>'+
                                        '</div>'
                                        password_error="no";
                                    }*/
                                    document.getElementById("password-edit").innerHTML=
                                        '<div class="form-group form-group-feedback form-group-feedback-left">'+
                                        '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg" value="'+student_password+'" required="required">'+
                                        '   <span>กรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร (รหัสผ่านเบื้องต้น เลขประจำตัวประชาชน)</span>'+
                                        '<div class="form-control-feedback form-control-feedback-lg">'+
                                        '   <i class="icon-key"></i>'+
                                        '</div>'
                                        password_error="no";
                                }else{
                                    document.getElementById("password-edit").innerHTML=
                                    '<div class="form-group form-group-feedback form-group-feedback-left">'+
                                    '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg is-invalid" value="'+student_password+'" required="required">'+
                                    '   <span class="invalid-feedback">รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร</span>'+
                                    '<div class="form-control-feedback form-control-feedback-lg">'+
                                    '   <i class="icon-key"></i>'+
                                    '</div>'
                                    password_error="yes";
                                }
                            }else{
                                document.getElementById("password-edit").innerHTML=
                                '<div class="form-group form-group-feedback form-group-feedback-left">'+
                                '   <input type="text" name="student_password" id="student_password" class="form-control form-control-lg is-invalid" value="" required="required">'+
                                '   <span class="invalid-feedback">กรุณากรอกข้อมูลรหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร</span>'+
                                '<div class="form-control-feedback form-control-feedback-lg">'+
                                '   <i class="icon-key"></i>'+
                                '</div>'
                                password_error="yes";
                            }


                            if(password_error!="yes" && student_password!="" && student_key!=""){

                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/student_data/student_data_process.php",{
                                    action:action,
                                    student_password:student_password,
                                    student_key:student_key
                                },function(process_pass){
                                    var test_process=process_pass.trim();
                                        if(test_process==="no_error"){

                                            let timerInterval;
                                            swalInitPasswordStudentData.fire({
                                                title: 'แก้ไขสำเร็จ',
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
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=student_data"; 
                                                }else{}
                                            });

                                        }else if(test_process==="it_error"){
                                            swalInitPasswordStudentData.fire({
                                                title:'ข้อมูลซ้ำ',
                                                icon:'error'
                                            });  
                                        }else{
                                            swalInitPasswordStudentData.fire({
                                                title:'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้ '+test_process.trim(),
                                                icon:'error'
                                            });                                            
                                        }

                                })
                    

                            }else{}               

                        }

                    }else{}

                })

        })
//--------------------------------------------------------------------------------------
    })    
</script>
<!--password end-->



<!--file up excel-->
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
            allowedFileExtensions: ["xls", "xlsx", "csv", "XLS","XLSX","CSV"]

        });

    })
</script>
<!--file up excel End-->
<!--Show Data-->
<script>
        $(document).ready(function(){
            
            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/student_data/student_data_show.php",{

            },function(run_data_sd){
                $("#run_data_sd").html(run_data_sd)
            })
        })
</script>
<!--Show Data End-->