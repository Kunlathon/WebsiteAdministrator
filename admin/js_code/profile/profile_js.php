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

?>
<?php check_login('admin_username_lcm', 'login.php'); ?>

<script
    src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js">
</script>


<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>


<script>
var Select2Selects = function() {
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        } else {
            // Select with search
            $('.select-search').select2();
        }
    };
    return {
        init: function() {
            _componentSelect2();
        }
    }
}();

// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    Select2Selects.init();
});
</script>



<script>
	var SA_UpdataProfile = function () {
            var _componentSA_UpdataProfile = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpdataProfile = swal.mixin({
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
		$('#Edit_Profile').on('click', function() {
            swalInitUpdataProfile.fire({
                title: 'ต้องการบันทึกข้อมูลที่แก้ไขหรือไม่',
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
                   
					var action="edit";
                    var test_email=/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*\@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.([a-zA-Z]){2,4})$/;

                    var firstname=$("#firstname").val();
                    var lastname=$("#lastname").val();
                    var idcard=$("#idcard").val();
                    var username=$("#username").val();
                    var address=$("#address").val();
                    var tel=$("#tel").val();
                    var email=$("#email").val();
                    


                        if(action==""){
                            swalInitUpdataProfile.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else if(firstname=="" && lastname==""  && idcard=="" && username=="" && address=="" && tel=="" && email==""){
                            swalInitUpdataProfile.fire({
                                title:'กรุณาระบุข้อมูลให้ครบ',
                                icon:'error'
                            });
                        }else if(firstname==""){
                            document.getElementById("firstname-null").innerHTML=
                            '<input type="text" name="firstname" id="firstname" class="form-control is-invalid" value="" placeholder="ชื่อ" required="required">'+
                            '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>';
                        }else if(lastname==""){
                            document.getElementById("lastname-null").innerHTML=
                            '<input type="text" name="lastname" id="lastname" class="form-control is-invalid" value="" placeholder="นามสกุล" required="required">'+
                            '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>';                            
                        }else if(idcard==""){
                            document.getElementById("idcard-null").innerHTML=
                            '<input type="text" name="idcard" id="idcard" class="form-control is-invalid" value="" placeholder="เลขที่บัตรประชาชน" required="required">'+
                            '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>';
                        }else if(username==""){
                            document.getElementById("username-null").innerHTML=
                            '<input type="text" name="username" id="username" class="form-control is-invalid" value="" placeholder="Username" required="required">'+
                            '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>';
                        }else if(address==""){
                            document.getElementById("address-null").innerHTML=
                            '<textarea class="form-control is-invalid" id="address" name="address" rows="3" placeholder="ที่อยู่ตามทะเบียนบ้าน" required="required"></textarea>'+
                            '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>';
                        }else if(tel==""){
                            document.getElementById("tel-null").innerHTML=
                            '<input type="tel" name="tel" id="tel" class="form-control is-invalid" value="" pattern="[0-9]" required="required">'+
                            '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>';
                        }else if(email==""){
                            document.getElementById("email-null").innerHTML=
                            '<input type="mail" name="email" id="email" class="form-control is-invalid" value="" required="required">'+
                            '<span class="invalid-feedback">กรุณาระบุข้อมูลในช่องนี้</span>';
                        }else if(!email.match(test_email)){
                            document.getElementById("email-null").innerHTML=
                            '<input type="mail" name="email" id="email" class="form-control is-invalid" value="'+email+'" required="required">'+
                            '<span class="invalid-feedback">อีเมล์ไม่ถูกต้อง</span>';
                        }else{
                            
                            $.post("<?php echo $RunLink->Call_Link_System();?>/?modules=profile&manage=process",{
                                action:action,
                                firstname:firstname,
                                lastname:lastname,
                                idcard:idcard,
                                username:username,
                                address:address,
                                tel:tel,
                                email:email
                            },function(process_edit){

                                let timerInterval;
                                    swalInitUpdataProfile.fire({
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
                                                    const b_profile = content.querySelector('b_profile')
                                                    if (b_profile) {
                                                        b_profile.textContent = Swal.getTimerLeft();
                                                    }else{}
                                                }else{}
                                            }, 100);
                                        },
                                        willClose: function() {
                                            clearInterval(timerInterval)
                                        }
                                    }).then(function (result) {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                             document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=profile"; 
                                        }else{}
                                    });


                            })

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
            };
//--------------------------------------------------------------------------------------
        return {
            initComponentsUpdataProfile: function() {
                _componentSA_UpdataProfile();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_UpdataProfile.initComponentsUpdataProfile();
    });
</script>






<script>
$(document).ready(function() {
    $('#profile_read').on('click', function() {
        var profile_read = $("#profile_read").val();
        if (profile_read == "show") {
            document.location ="<?php echo $RunLink->Call_Link_System();?>/?modules=profile&manage=show";
        } else {}
    })
})

$(document).ready(function() {
    $('#profile_update').on('click', function() {
        var profile_update = $("#profile_update").val();
        if (profile_update == "edit") {
            document.location ="<?php echo $RunLink->Call_Link_System();?>/?modules=profile&manage=edit";
        } else {}
    })
})

$(document).ready(function() {
    $('#profile_img').on('click', function() {
        var profile_img=$("#profile_img").val();
        if(profile_img =="change_picture" ){
            document.location ="<?php echo $RunLink->Call_Link_System();?>/?modules=profile&manage=change_picture";
        }else{}
    })
})

$(document).ready(function() {
    $('#update_cancel').on('click', function() {
        document.location ="<?php echo $RunLink->Call_Link_System();?>/?modules=profile&manage=update";
    })
})

</script>

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
<!--file up excel End-->