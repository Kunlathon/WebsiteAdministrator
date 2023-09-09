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
?>
<?php check_login('admin_username_lcm', 'login.php'); ?>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>


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
                    var admin_key=$("#admin_key").val(); //*
                    var id_key=btoa(admin_key);
                    var password=$("#password").val(); //*
                    //var password2=$("#password2").val(); //*
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
                                        document.getElementById("password-null").innerHTML=
                                        '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                        password_error="yes";
                                    }else{
                                        document.getElementById("password-null").innerHTML=
                                        '<input type="text" name="password" id="password" class="form-control" value="'+password+'" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ข้อมูล Password เช่น aba@123456</span>'
                                        password_error="no";
                                    }
                                }else{
                                    document.getElementById("password-null").innerHTML=
                                    '<input type="text" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                    password_error="yes";
                                }
                            }else{
                                document.getElementById("password-null").innerHTML=
                                '<input type="text" name="password" id="password" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                '<span class="invalid-feedback">กรุณาข้อมูล Password เช่น aba@123456</span>'
                                password_error="yes";
                            }

                            /*if(password2!=""){
                                if(password2.length>=6){
                                    if(password2.match(/^([0-9])+$/i)){
                                        document.getElementById("password2-null").innerHTML=
                                        '<input type="text" name="password2" id="password2" class="form-control is-invalid" value="'+password2+'" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ต้องมีตัวเลขและตัวอังกฤษ</span'
                                        password2_error="yes";
                                    }else{
                                        document.getElementById("password2-null").innerHTML=
                                        '<input type="text" name="password2" id="password2" class="form-control" value="'+password2+'" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                        '<span class="invalid-feedback">ข้อมูล Password เช่น aba@123456</span>'
                                        password2_error="no";
                                    }
                                }else{
                                    document.getElementById("password2-null").innerHTML=
                                    '<input type="text" name="password2" id="password2" class="form-control is-invalid" value="'+password2+'" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                    '<span class="invalid-feedback">Password อย่างน้อย 6 ตัว</span>'
                                    password2_error="yes";
                                }
                            }else{
                                document.getElementById("password2-null").innerHTML=
                                '<input type="text" name="password2" id="password2" class="form-control is-invalid" value="" placeholder="ข้อมูล Password เช่น aba@123456" required="required">'+
                                '<span class="invalid-feedback">กรุณาข้อมูล Password เช่น aba@123456</span>'
                                password2_error="yes";
                            }*/

                            //if(password!="" && password_error!="yes" && password2!="" && password2_error!="yes" ){
                            if(password!="" && password_error!="yes" && password2!=""){

                                $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/changepass/changepass_proccess.php",{
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
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/process/logout.php";
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











