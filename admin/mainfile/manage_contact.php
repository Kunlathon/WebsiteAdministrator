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

error_reporting(E_ALL ^ E_NOTICE);
//ini_set('display_errors', 'On'); // Open Error , PHP Code

if ((preg_match("/manage_contact.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_contact" class="breadcrumb-item"> ติดต่อเรา (TH)</a>

                        <a href="#" class="breadcrumb-item"> รายละเอียดติดต่อเรา (TH)</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
      /*if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST, 'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET, 'manage');
            }else{
                $manage="show";
            }
        }*/
            $manage = "edit";
            $information_key = 8;
            if (($manage == "edit")) {
                $sql = "SELECT `information_id`,`information_topic`,`information_detail`,`information_image` 
                        FROM `tb_information` 
                        WHERE `information_id`='{$information_key}';";
                $list = result_array($sql);
                foreach ($list as $key => $row) {
                    if ((is_array($row) && count($row))) {
                        $information_topic = $row["information_topic"];
                        $information_detail = $row["information_detail"];
                        $information_image = $row["information_image"];
                        $information_id = $row["information_id"];
                    } else {
                        $information_topic = null;
                        $information_detail = null;
                        $information_image = null;
                        $information_id = null;
                    }
                }
            ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ข้อมูลติดต่อเรา (TH)</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-4">
                        <div class="btn-group">
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_contact'" class="btn btn-success btn-sm" value="">แก้ไข (TH)</button>&nbsp;&nbsp;
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_contact_en'" class="btn btn-outline-success btn-sm" value="">แก้ไข (EN)</button>&nbsp;&nbsp;
                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_contact_cn'" class="btn btn-outline-success btn-sm" value="">แก้ไข (CN)</button>
                        </div>
                    </div>
                    <div class="col-<?php echo $grid; ?>-4"></div>
                    <div class="col-<?php echo $grid; ?>-4"></div>
                </div><br>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลติดต่อเรา (TH)</div>
                                <div class="col-<?php echo $grid; ?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <form name="manage_contact_form_show" id="manage_contact_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_contact">
                                                        <input type="hidden" name="manage" id="manage" value="show">
                                                        <button type="submit" name="sub_isfs" id="sub_isfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <form name="form_edit" id="form_edit" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System(); ?>/js_code/manage_contact/manage_contact_process.php" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <div class="card-header">
                                                <h5 class="card-title">หัวข้อ</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <input type="text" name="information_topic" id="information_topic" class="form-control" value="<?php echo $information_topic; ?>" placeholder="หัวข้อเรื่อง" required="required">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

    <?php
        if(($information_image != null)){
            if(file_exists("../uploads/information/".$information_image)){ 
                $copy_information_image=$information_image;
            }else{
                $copy_information_image="no-image-icon-0.jpg";
            }
        }else{
            $copy_information_image="no-image-icon-0.jpg";
        }
    ?>

<script>
    $(document).ready(function(){
        var copy_information_image="<?php echo $copy_information_image;?>";
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
            uploadClass: 'btn btn-teal',
            uploadIcon: '<i class="icon-file-upload mr-2"></i>',
            uploadTitle:"อัปโหลดไฟล์ที่เลือก",
            uploadLabel:"อัปโหลด",
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialPreview: [
                '<?php echo $link_wbe->Call_Link_Wbe();?>/uploads/information/'+copy_information_image,
            ],
            initialPreviewConfig: [
                {caption: copy_information_image,  key: 1, url: '{$url}', showDrag: false}
            ],
            initialPreviewAsData: true,
            overwriteInitial: true,
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

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <div class="card-header">
                                                <h5 class="card-title">ภาพ</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <input type="file" name="information_image" id="information_image" class="form-control file-input-custom" data-show-upload="false" placeholder="ภาพ">
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <div class="card-header">
                                                <h5 class="card-title">รายละเอียด</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <div class="col-<?php echo $grid; ?>-12">
                                                        <textarea name="information_detail" id="editor-full" rows="4" cols="4" required="required">
                                                            <?php echo $information_detail; ?>
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <button type="submit" name="sub_up" id="sub_up" class="btn btn-info">บันทึก</button>&nbsp;
                                                <button type="reset" name="reset_up" id="reset_up" class="btn btn-danger">ยกเลิก</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <input type="hidden" name="action" id="action" value="edit">
                                    <input type="hidden" name="information_key" id="information_key" value="<?php echo $information_key; ?>">
                                    <input type="hidden" name="copy_image" id="copy_image" value="<?php echo $information_image; ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    } else {
            } ?>

        </div>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } else {
    }
}
?>