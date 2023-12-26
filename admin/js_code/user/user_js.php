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

    check_login('admin_username_lcm','login.php');

?>

    <script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/ui/moment/moment.min.js"></script>

    <script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.select').select2({
                minimumResultsForSearch: Infinity
            });           
        })
    </script>
<!-- /theme JS files -->

    <script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();
                if(run_show==="show"){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/user/user_show.php",{
                        run_show:run_show
                    },function(RunShow){
                        if(RunShow!=""){
                            $("#Run_Show_All").html(RunShow);
                        }else{}
                    })
                }else{
                    document.getElementById("Run_Show_All").innerHTML=
                    '<span style="font-weight: bold; color:red;">ไม่สามารถดำเนินการได้</span>';
                }
        })
    </script>

    <script>
        $(document).ready(function(){

            var swalInitAddUser = swal.mixin({
                buttonsStyling: false,
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-light',
                        denyButton: 'btn btn-light',
                        input: 'form-control'
                    }
            });

            $("#sub_up").on("click",function(){

                swalInitAddUser.fire({
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
                    if(result.value){

                        var action=$("#sub_up").val();
                        var count_error=0;

                        var name=$("#name").val();
                        var surname=$("#surname").val();
                        var username=$("#username").val();
                        var password=$("#password").val();

                        var tel=$("#tel").val();
                        var tel_pattern = /[0-9]{10}/;

                        var email=$("#email").val();
                        var email_pattern= /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                        var type=$("#type").val();

                            if(action==""){

                                swalInitAddUser.fire({
                                    title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                    icon:'error'
                                });

                            }else{

//test 
                                if(name===""){
                                    document.getElementById("name-null").innerHTML=
                                    '<div id="name-null">'+
                                    '<input type="text" name="name" id="name" class="form-control is-invalid" value="'+name+'" placeholder="ชื่อ" required="required">'+
                                    '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>'+
                                    '</div>';
                                    count_error=count_error+1;
                                }else{
                                    document.getElementById("name-null").innerHTML=
                                    '<div id="name-null">'+
                                    '<input type="text" name="name" id="name" class="form-control" value="'+name+'" placeholder="ชื่อ" required="required">'+
                                    '<span>กรอกข้อมูลชื่อ</span>'+
                                    '</div>';
                                    count_error=count_error+0;
                                }

                                if(surname===""){
                                    document.getElementById("surname-null").innerHTML=
                                    '<div id="surname-null">'+
                                    '<input type="text" name="surname" id="surname" class="form-control is-invalid" value="'+surname+'" placeholder="นามสกุล" required="required">'+
                                    '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>'+
                                    '</div>';
                                    count_error=count_error+1;
                                }else{
                                    document.getElementById("surname-null").innerHTML=
                                    '<div id="surname-null">'+
                                    '<input type="text" name="surname" id="surname" class="form-control" value="'+surname+'" placeholder="นามสกุล" required="required">'+
                                    '<span>กรอกข้อมูลนามสกุล</span>'+
                                    '</div>';
                                    count_error=count_error+0;
                                }

                                if(username===""){
                                    document.getElementById("username-null").innerHTML=
                                    '<div id="username-null">'+
                                    '<input type="text" name="username" id="username" class="form-control is-invalid" value="'+username+'" placeholder="ชื่อผู้ใช้งาน" required="required">'+
                                    '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>'+
                                    '</div>';
                                    count_error=count_error+1;
                                }else{
                                    document.getElementById("username-null").innerHTML=
                                    '<div id="username-null">'+
                                    '<input type="text" name="username" id="username" class="form-control" value="'+username+'" placeholder="ชื่อผู้ใช้งาน" required="required">'+
                                    '<span>กรอกข้อมูลชื่อผู้ใช้งาน</span>'+
                                    '</div>';
                                    count_error=count_error+0;
                                }

                                if(password===""){
                                    document.getElementById("password-null").innerHTML=
                                    '<div id="password-null">'+
                                    '<input type="password" name="password" id="password" class="form-control is-invalid" value="'+password+'" placeholder="รหัสผ่าน" required="required">'+
                                    '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>'+
                                    '</div>';
                                    count_error=count_error+1;
                                }else{
                                    document.getElementById("password-null").innerHTML=
                                    '<div id="password-null">'+
                                    '<input type="password" name="password" id="password" class="form-control" value="'+password+'" placeholder="รหัสผ่าน" required="required">'+
                                    '<span>กรอกข้อมูลรหัสผ่าน</span>'+
                                    '</div>';
                                    count_error=count_error+0;
                                }

                                if(tel===""){
                                    document.getElementById("tel-null").innerHTML=
                                    '<div id="tel-null">'+
                                    '<input type="tel" name="tel" id="tel" class="form-control is-invalid" value="'+tel+'" placeholder="เบอร์โทรศัพท์" required="required">'+
                                    '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>'+
                                    '</div>';
                                    count_error=count_error+1;
                                }else{
                                    if(tel_pattern.test(tel)){
                                        document.getElementById("tel-null").innerHTML=
                                        '<div id="tel-null">'+
                                        '<input type="tel" name="tel" id="tel" class="form-control" value="'+tel+'" placeholder="เบอร์โทรศัพท์" required="required">'+
                                        '<span>กรอกข้อมูลเบอร์โทรศัพท์</span>'+
                                        '</div>';
                                        count_error=count_error+0;
                                    }else{
                                        document.getElementById("tel-null").innerHTML=
                                        '<div id="tel-null">'+
                                        '<input type="tel" name="tel" id="tel" class="form-control is-invalid" value="'+tel+'" placeholder="เบอร์โทรศัพท์" required="required">'+
                                        '<span class="invalid-feedback">กรุณาระบุข้อมูลเบอร์โทรศัพท์ให้ถูกต้อง</span>'+
                                        '</div>';
                                        count_error=count_error+1;
                                    }
                                    
                                }

                                if(email===""){
                                    document.getElementById("email-null").innerHTML=
                                    '<div id="email-null">'+
                                    '<input type="email" name="email" id="email" class="form-control is-invalid" value="'+email+'" placeholder="อีเมล" required="required">'+
                                    '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>'+
                                    '</div>';                                    
                                    count_error=count_error+1;
                                }else{
                                    if(email_pattern.test(email)){
                                        document.getElementById("email-null").innerHTML=
                                        '<div id="email-null">'+
                                        '<input type="email" name="email" id="email" class="form-control" value="'+email+'" placeholder="อีเมล" required="required">'+
                                        '<span>กรอกข้อมูลอีเมล</span>'+
                                        '</div>';
                                        count_error=count_error+0;
                                    }else{
                                    document.getElementById("email-null").innerHTML=
                                        '<div id="email-null">'+
                                        '<input type="email" name="email" id="email" class="form-control is-invalid" value="'+email+'" placeholder="อีเมล" required="required">'+
                                        '<span class="invalid-feedback">กรุณาระบุข้อมูลอีเมลให้ถูกต้อง</span>'+
                                        '</div>';
                                        count_error=count_error+1;
                                    }

                                }

                                if(type===""){
                                    document.getElementById("type-null").innerHTML='<span style="color: red;">กรุณา ประเภทผู้ใช้งานระบบ</span>';
                                    count_error=count_error+1;
                                }else{
                                    document.getElementById("type-null").innerHTML='<span>กรอกข้อมูลประเภทผู้ใช้งานระบบ</span>';
                                    count_error=count_error+0;
                                }
//test 

                                if(count_error>=1){

                                }else{
                                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/user/user_process.php",{
                                        action:action,
                                        name:name,
                                        surname:surname,
                                        username:username,
                                        password:password,
                                        tel:tel,
                                        email:email,
                                        type:type
                                    },function(txt_add){
                                        var txt_add=txt_add.trim();

                                            if(txt_add==="NotError"){

                                                let timerInterval;
                                                    swalInitAddUser.fire({
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
                                                                    const b_user = content.querySelector('b_user')
                                                                    if (b_user) {
                                                                        b_user.textContent = Swal.getTimerLeft();
                                                                    } else {}
                                                                } else {}
                                                            }, 100);
                                                        },
                                                        willClose: function() {
                                                            clearInterval(timerInterval)
                                                        }
                                                    }).then(function(result) {
                                                        if (result.dismiss === Swal.DismissReason.timer) {
                                                            document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=user";
                                                        } else {}
                                                    });

                                            }else if(txt_add==="Error_Null"){
                                                swalInitAddUser.fire({
                                                    title: 'ข้อมูลไม่ครบ',
                                                    icon: 'error'
                                                });   
                                            }else if(txt_add==="Error"){
                                                swalInitAddUser.fire({
                                                    title: 'บันทึกไม่สำเร็จ',
                                                    icon: 'error'
                                                });    
                                            }else{
                                                swalInitAddUser.fire({
                                                    title: 'เกิดข้อผิดพลาดไม่สามารถดำเนินการได้',
                                                    text: ''+txt_add,
                                                    icon: 'error'
                                                }); 
                                            }

                                    })
                                }

                            }

                    }else if(result.dismiss === swal.DismissReason.cancel){

                        swalInitAddUser.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        );

                    }else{}
                })

            })

        })
    </script>

    <script>
        $(document).ready(function(){
            $("#reset_up").on("click",function(){
                var reset_up=$("#reset_up").val();
                if(reset_up==="Reset"){
                    location.reload();
                }else{}
            })
        })
    </script>