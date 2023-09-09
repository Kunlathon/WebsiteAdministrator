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
	var SA_UpdataSchool = function () {
            var _componentSA_UpdataSchool = function() {
                if (typeof swal == 'undefined') {
                    console.warn('Warning - sweet_alert.min.js is not loaded.');
                    return;
                }
// Defaults
                var swalInitUpdataSchool = swal.mixin({
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
		$('#update_school').on('click', function() {
            swalInitUpdataSchool.fire({
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
                    var sid='1';
					var action="edit";
                    var name=$("#name").val();
                    var ename=$("#ename").val();
                    var affiliation=$("#affiliation").val();
                    var area=$("#area").val();
                    var tambon=$("#tambon").val();
                    var amphoe=$("#amphoe").val();
                    var provinceid=$("#provinceid").val();
                    var register=$("#register").val();
                    var direction=$("#direction").val();

                        if(action==""){
                            swalInitUpdataSchool.fire({
                                title:'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon:'error'
                            });
                        }else{

                            if(name==""){
                                document.getElementById("name-null").innerHTML=
                                '<input type="text" name="name" id="name" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล ชื่อโรงเรียน</span>';
                            }else{
                                document.getElementById("name-null").innerHTML=
                                '<input type="text" name="name" id="name" class="form-control" value="'+name+'">';
                            }

                            if(ename==""){
                                document.getElementById("ename-null").innerHTML=
                                '<input type="text" name="ename" id="ename" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล School</span>';
                            }else{
                                document.getElementById("ename-null").innerHTML=
                                '<input type="text" name="ename" id="ename" class="form-control" value="'+ename+'">';
                            }

                            if(affiliation==""){
                                document.getElementById("affiliation-null").innerHTML=
                                '<input type="text" name="affiliation" id="affiliation" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล สังกัด</span>';
                            }else{
                                document.getElementById("affiliation-null").innerHTML=
                                '<input type="text" name="affiliation" id="affiliation" class="form-control" value="'+affiliation+'">';
                            }

                            if(area==""){
                                document.getElementById("area-null").innerHTML=
                                '<input type="text" name="area" id="area" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล เขตพื้นที่</span>';
                            }else{
                                document.getElementById("area-null").innerHTML=
                                '<input type="text" name="area" id="area" class="form-control" value="'+area+'">';
                            }

                            if(tambon==""){
                                document.getElementById("tambon-null").innerHTML=
                                '<input type="text" name="tambon" id="tambon" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล ตำบล</span>';
                            }else{
                                document.getElementById("tambon-null").innerHTML=
                                '<input type="text" name="tambon" id="tambon" class="form-control" value="'+tambon+'">';
                            }

                            if(amphoe==""){
                                document.getElementById("amphoe-null").innerHTML=
                                '<input type="text" name="amphoe" id="amphoe" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล อำเภอ</span>';
                            }else{
                                document.getElementById("amphoe-null").innerHTML=
                                '<input type="text" name="amphoe" id="amphoe" class="form-control" value="'+amphoe+'">';
                            }

                            if(register==""){
                                document.getElementById("register-null").innerHTML=
                                '<input type="text" name="register" id="register" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล นายทะเบียน</span>';
                            }else{
                                document.getElementById("register-null").innerHTML=
                                '<input type="text" name="register" id="register" class="form-control" value="'+register+'">';
                            }

                            if(direction==""){
                                document.getElementById("direction-null").innerHTML=
                                '<input type="text" name="direction" id="direction" class="form-control is-invalid" value="">'+
                                '<span class="invalid-feedback">กรุณากรอบข้อมูล ผู้อำนวยการ</span>';
                            }else{
                                document.getElementById("direction-null").innerHTML=
                                '<input type="text" name="direction" id="direction" class="form-control" value="'+direction+'">';
                            }

                            if(name!="" && ename!="" && affiliation!="" && area!="" && tambon!="" && amphoe!="" && register!="" && direction!=""){
                            
                                $.post("<?php echo $RunLink->Call_Link_System();?>/?modules=school&manage=process",{
                                    action:action,
                                    name:name,
                                    ename:ename,
                                    affiliation:affiliation,
                                    area:area,
                                    tambon:tambon,
                                    amphoe:amphoe,
                                    provinceid:provinceid,
                                    register:register,
                                    direction:direction,
                                    sid:sid
                                },function(process_edit){

                                    let timerInterval;
                                        swalInitUpdataSchool.fire({
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
                                                        const b_school = content.querySelector('b_school')
                                                        if (b_school) {
                                                            b_school.textContent = Swal.getTimerLeft();
                                                        }else{}
                                                    }else{}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function (result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=school"; 
                                            }else{}
                                        });


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
            };
//--------------------------------------------------------------------------------------
        return {
            initComponentsUpdataSchool: function() {
                _componentSA_UpdataSchool();
            }
        }
    }();
// Initialize module
// ------------------------------
    document.addEventListener('DOMContentLoaded', function() {
        SA_UpdataSchool.initComponentsUpdataSchool();
    });
</script>






<script>
$(document).ready(function() {
    $('#school_show').on('click', function() {
        var school_show = $("#school_show").val();
        if (school_show == "show") {
            document.location =
                "<?php echo $RunLink->Call_Link_System();?>/?modules=school&manage=show";
        } else {}
    })
})

$(document).ready(function() {
    $('#school_edit').on('click', function() {
        var school_edit = $("#school_edit").val();
        if (school_edit == "edit") {
            document.location =
                "<?php echo $RunLink->Call_Link_System();?>/?modules=school&manage=edit";
        } else {}
    })
})

$(document).ready(function() {
    $('#school_img').on('click', function() {
        var school_img=$("#school_img").val();
        if(school_img=="change_picture"){
            document.location ="<?php echo $RunLink->Call_Link_System();?>/?modules=school&manage=change_picture";
        }else{}

    })
})
</script>

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
            maxFileSize: 500,
            maxFileCount: 1,
            allowedFileExtensions: ["JPG","jpg","PNG","png"]

        });

    })
</script>