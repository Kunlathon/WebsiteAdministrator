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
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>

<script>
    $(document).ready(function(){
        $('.summernote').summernote();
    })
</script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/forms/selects/select2.min.js"></script>

<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/pnotify.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/noty.min.js"></script>
<script src="<?php echo $RunLink->Call_Link_System();?>/template/global_assets/js/plugins/notifications/jgrowl.min.js"></script>

<script>
    $(document).ready(function(){
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });
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

        $('.file-input-custom').fileinput({
            previewFileType: 'image',
            browseLabel: 'เลือกรูป',
            browseClass: 'btn btn-secondary',
            browseIcon: '<i class="icon-image2 mr-2"></i>',
            removeLabel: 'ลบ',
            removeClass: 'btn btn-danger',
            removeIcon: '<i class="icon-cancel-square mr-2"></i>',
            //uploadClass: 'btn btn-teal',
            //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialCaption: "กรุณาเลือกภาพ",
            mainClass: 'input-group',
            maxFileCount: 1,
            maxFileSize: 800,
            allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            fileActionSettings: fileActionSettings
        });

    })
</script>


<!--Show Data All-->
    <script>
        $(document).ready(function(){
            var run_show=$("#run_show").val();
                if(run_show==="show"){
                    $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/manage_news/manage_news_show.php",{
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
<!--Show Date All End-->
<!--Update En-->
    <script>
        $(document).ready(function(){
            // Defaults
            var swalInitManageNewsEn = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
            // Defaults End

            $('#sub_up_en').on('click',function(){
                var action=$("#action_en").val();
                    if(action==="edit_en"){
                        var news_id=$("#news_id_en").val();
                            if(news_id!==""){
                                var news_topic_en=$("#news_topic_en").val();
                                var news_detail_1_en=$("#news_detail_1_en").val();
                                var news_detail_2_en=$("#news_detail_2_en").val();
                                var news_detail_3_en=$("#news_detail_3_en").val();
                                var news_detail_4_en=$("#news_detail_4_en").val();
                                var news_detail_5_en=$("#news_detail_5_en").val();
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/manage_news/manage_news_process.php",{
                                    action:action,
                                    news_id:news_id,
                                    news_topic_en:news_topic_en,
                                    news_detail_1_en:news_detail_1_en,
                                    news_detail_2_en:news_detail_2_en,
                                    news_detail_3_en:news_detail_3_en,
                                    news_detail_4_en:news_detail_4_en,
                                    news_detail_5_en:news_detail_5_en
                                },function(test_news_th){
                                    var test_news_th=test_news_th;
                                        if(test_news_th.trim()==="NoError"){

                                            let timerInterval;
                                            swalInitManageNewsEn.fire({
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
                                                            const b_document_news_en = content.querySelector('b_document_news_en')
                                                            if (b_document_news_en) {
                                                                b_document_news_en.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=manage_news"; 
                                                }else{}
                                            });

                                        }else if(test_news_th.trim()==="ItError"){
                                            swalInitManageNewsEn.fire({
                                                title: 'บันทึกข้อมูลไม่สำเร็จ',
                                                icon: 'error'
                                            })
                                        }else{
                                            swalInitManageNewsEn.fire({
                                                title: 'เกิดข้อผิดในการบันทึกข้อมูล กรุณาลองใหม่อีกครั้ง',
                                                text: test_news_th.trim(),
                                                icon: 'error'
                                            })
                                        }
                                })
                            }else{
                                swalInitManageNewsEn.fire({
                                    title: 'พบข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
                                    icon: 'error'
                                })
                            }
                    }else{
                        swalInitManageNewsEn.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            icon: 'error'
                        });
                    }

            })

        })
    </script>
<!--Update En End-->

<!--Update Cn-->
<script>
        $(document).ready(function(){
            // Defaults
            var swalInitManageNewsCn = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
            // Defaults End

            $('#sub_up_cn').on('click',function(){
                var action=$("#action_cn").val();
                    if(action==="edit_cn"){
                        var news_id=$("#news_id_cn").val();
                            if(news_id!==""){
                                var news_topic_cn=$("#news_topic_cn").val();
                                var news_detail_1_cn=$("#news_detail_1_cn").val();
                                var news_detail_2_cn=$("#news_detail_2_cn").val();
                                var news_detail_3_cn=$("#news_detail_3_cn").val();
                                var news_detail_4_cn=$("#news_detail_4_cn").val();
                                var news_detail_5_cn=$("#news_detail_5_cn").val();
                                $.post("<?php echo $RunLink->Call_Link_System(); ?>/js_code/manage_news/manage_news_process.php",{
                                    action:action,
                                    news_id:news_id,
                                    news_topic_cn:news_topic_cn,
                                    news_detail_1_cn:news_detail_1_cn,
                                    news_detail_2_cn:news_detail_2_cn,
                                    news_detail_3_cn:news_detail_3_cn,
                                    news_detail_4_cn:news_detail_4_cn,
                                    news_detail_5_cn:news_detail_5_cn
                                },function(test_news_th){
                                    var test_news_th=test_news_th;
                                        if(test_news_th.trim()==="NoError"){

                                            let timerInterval;
                                            swalInitManageNewsCn.fire({
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
                                                            const b_document_news_cn = content.querySelector('b_document_news_cn')
                                                            if (b_document_news_cn) {
                                                                b_document_news_cn.textContent = Swal.getTimerLeft();
                                                            }else{}
                                                        }else{}
                                                    }, 100);
                                                },
                                                willClose: function() {
                                                    clearInterval(timerInterval)
                                                }
                                            }).then(function (result) {
                                                if (result.dismiss === Swal.DismissReason.timer) {
                                                    document.location="<?php echo $RunLink->Call_Link_System();?>/?modules=manage_news"; 
                                                }else{}
                                            });

                                        }else if(test_news_th.trim()==="ItError"){
                                            swalInitManageNewsCn.fire({
                                                title: 'บันทึกข้อมูลไม่สำเร็จ',
                                                icon: 'error'
                                            })
                                        }else{
                                            swalInitManageNewsCn.fire({
                                                title: 'เกิดข้อผิดในการบันทึกข้อมูล กรุณาลองใหม่อีกครั้ง',
                                                icon: 'error'
                                            })
                                        }
                                })
                            }else{
                                swalInitManageNewsCn.fire({
                                    title: 'พบข้อผิดพลาด กรุณาลองใหม่อีกครั้ง',
                                    icon: 'error'
                                })
                            }
                    }else{
                        swalInitManageNewsCn.fire({
                            title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                            icon: 'error'
                        });
                    }

            })

        })
    </script>
<!--Update Cn End-->