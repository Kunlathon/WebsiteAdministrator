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
    
    if ((preg_match("/picture_album.php/", $_SERVER['PHP_SELF']))) {
        Header("Location: ../index.php");
        die();
    }else{

        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album" class="breadcrumb-item"> รูปกิจกรรม</a>

                        <a href="#" class="breadcrumb-item"> รายละเอียดรูปกิจกรรม</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

        <?php
            if((isset($_POST["manage"]))){
                    $manage=filter_input(INPUT_POST,'manage');
            }else{
                if((isset($_GET["manage"]))){
                    $manage=filter_input(INPUT_GET,'manage');
                }else{
                    $manage="show";
                }
            }
        ?>

        <?php

                if(($manage=="add")){  ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>เพิ่มข้อมูลรูปกิจกรรม</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ฟอร์มเพิ่มข้อมูลรูปกิจกรรม</div>
                            <div class="col-<?php echo $grid;?>-6">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
<form name="form_picture_album_show" id="form_picture_album_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                                <input type="hidden" name="manage" id="manage" value="show">
                                                <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                            </div>
                                        </td>
                                    </tr>
                                </table>                  
                            </div> 
                        </div>

                        <div class="card-body">

<form name="form_add" id="form_add" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/picture_album/picture_album_process.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="text" name="gallery_name" id="gallery_name" class="form-control" value="" placeholder="ชื่อกิจกรรม" required="required" maxlength="100">                                                
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหากิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="gallery_topic" id="gallery_topic" class="summernote" required="required"></textarea>                                               
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาพหน้าปกกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="gallery_thumbnail" id="gallery_thumbnail" class="file-input-custom-A" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>                                                                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาพกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="picture_name[]" id="picture_name[]" class="file-input-custom-B" multiple="multiple" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>                                                                                             
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะรูปกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="gallery_status" id="gallery_status"  class="form-control select" required="required" data-fouc>
                                                    <option value="1">แสดง</option>
                                                    <option value="0">ไม่แสดง</option>
                                                </select> 
                                            <div>
                                        </div>
                                    </fieldset>                        
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <button type="submit" name="sub_add" id="sub_add" class="btn btn-info">บันทึก</button>&nbsp;
                                        <button type="reset" name="reset_up" id="reset_up" class="btn btn-danger">ยกเลิก</button>
                                    </fieldset>
                                </div>
                            </div>

<input type="hidden" name="action" id="action" value="add">

</form>

                        </div>

                    </div>
                </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php    }elseif(($manage=="show")){  ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>ข้อมูลรูปกิจกรรมทั้งหมด</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ข้อมูลรูปกิจกรรมทั้งหมด</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="form_picture_album_show" id="form_picture_album_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="form_picture_album_add" id="form_picture_album_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_mva" id="sub_mva"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลรูปกิจกรรม</button>
</form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                  
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div id="Run_Show_All"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
 <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->       
        <input type="hidden" name="run_show" id="run_show" value="show">
        <input type="hidden" name="run_gallery_key" id="run_gallery_key" value="-">
        <input type="hidden" name="run_gallery_folder" id="run_gallery_" value="-">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php    }elseif(($manage=="edit")){ 

                    if((isset($_POST["gallery_key"]))){
                        $picture_album_id=filter_input(INPUT_POST,'gallery_key');  
                        $gallery_sql = "SELECT * FROM `tb_gallery`  WHERE `gallery_id`='{$picture_album_id}'";
                        $gallery_list = result_array($gallery_sql);
                        foreach ($gallery_list as $key => $gallery_row) { 
                            $gallery_id=$gallery_row["gallery_id"];
                            $gallery_name=$gallery_row["gallery_name"];
                            $gallery_topic=$gallery_row["gallery_topic"];
                            $gallery_thumbnail=$gallery_row["gallery_thumbnail"];
                            $gallery_folder=$gallery_row["gallery_folder"];
                            $gallery_preview=$gallery_row["gallery_preview"];
                            $gallery_status=$gallery_row["gallery_status"];

                        }
                        ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>แก้ไขข้อมูลรูปกิจกรรม</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <div class="card border border-purple">
                        <div class="card-header header-elements-inline bg-info text-white">
                            <div class="col-<?php echo $grid;?>-6">ฟอร์มแก้ไขข้อมูลรูปกิจกรรม</div>
                            <div class="col-<?php echo $grid;?>-6">
                                <table align="right">
                                    <tr>
                                        <td>
                                            <div>
<form name="form_picture_album_show" id="form_picture_album_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                                <input type="hidden" name="manage" id="manage" value="show">
                                                <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                            </div>
                                        </td>
                                    </tr>
                                </table>                  
                            </div> 
                        </div>

                        <div class="card-body">

<form name="form_edit" id="form_edit" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/picture_album/picture_album_process.php" method="post" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ชื่อกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="text" name="gallery_name" id="gallery_name" class="form-control" value="<?php echo $gallery_name;?>" placeholder="ชื่อกิจกรรม" required="required" maxlength="100">                                                
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหากิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <textarea  name="gallery_topic" id="gallery_topic" class="summernote" required="required"><?php echo $gallery_topic;?></textarea>                                               
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-<?php echo $grid; ?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">ภาพหน้าปกกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <input type="file" name="gallery_thumbnail" id="gallery_thumbnail" class="file-input-custom-Aup" data-show-upload="false" data-show-caption="true" data-show-preview="true"  data-fouc>
										        <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>                                                                                            
                                            <div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

<!---->
                                        <script>
                                            $(document).ready(function() {

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

                                                $('.file-input-custom-Aup').fileinput({
                                                    previewFileType: 'image',
                                                    browseLabel: 'เลือกรูป',
                                                    browseClass: 'btn btn-secondary',
                                                    browseIcon: '<i class="icon-image2 mr-2"></i>',
                                                    removeLabel: 'ลบ',
                                                    removeClass: 'btn btn-danger',
                                                    removeIcon: '<i class="icon-cancel-square mr-2"></i>',
                                                    //uploadClass: 'btn btn-teal',
                                                    //uploadIcon: '<i class="icon-file-upload mr-2"></i>',
                                                    uploadTitle: "อัปโหลดไฟล์ที่เลือก",
                                                    uploadLabel: "อัปโหลด",
                                                    layoutTemplates: {
                                                        icon: '<i class="icon-file-check"></i>',
                                                        modal: modalTemplate
                                                    },

                                                    initialPreview: [

                                                        <?php
                                                        if ((($gallery_thumbnail != null))) {
                                                            if (file_exists("../dist/img/gallery/".$gallery_folder."/".$gallery_thumbnail)) { ?>


                                                                '../dist/img/gallery/<?php echo $gallery_folder;?>/<?php echo $gallery_thumbnail; ?>'


                                                        <?php       } else {
                                                            }
                                                        } else {
                                                        } ?>

                                                    ],

                                                    initialPreviewConfig: [

                                                        <?php
                                                        if ((($gallery_thumbnail != null))) {
                                                            if (file_exists("../dist/img/gallery/".$gallery_folder."/".$gallery_thumbnail)) { ?>


                                                                {
                                                                    caption: '<?php echo $gallery_thumbnail; ?>',
                                                                    size: 800000,
                                                                    key: 1,
                                                                    url: '{$url}',
                                                                    showDrag: false
                                                                }


                                                        <?php       } else {
                                                            }
                                                        } else {
                                                        } ?>

                                                    ],

                                                    initialCaption: "กรุณาเลือกภาพ",
                                                    mainClass: 'input-group',
                                                    initialPreviewAsData: true,
                                                    overwriteInitial: true,
                                                    maxFileCount: 1,
                                                    maxFileSize: 800,
                                                    allowedFileExtensions: ["jpg", "JPG", "pnp", "PNG"],
                                                    previewZoomButtonClasses: previewZoomButtonClasses,
                                                    previewZoomButtonIcons: previewZoomButtonIcons,
                                                    fileActionSettings: fileActionSettings
                                                });

                                            })
                                        </script>
<!---->

                            <div class="row">
                                <div class="col-<?php echo $grid;?>-12">
                                    <fieldset class="mb-3">
                                        <div class="form-group row">
                                            <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะรูปกิจกรรม</label>
                                            <div class="col-<?php echo $grid; ?>-10">
                                                <select name="gallery_status" id="gallery_status"  class="form-control select" required="required" data-fouc>

                                                                <?php
                                                                if (($gallery_status == 1)) { ?>
                                                                    <option value="1" selected="selected">แสดง</option>
                                                                    <option value="0">ไม่แสดง</option>
                                                                <?php   } elseif (($gallery_status == 0)) { ?>
                                                                    <option value="1">แสดง</option>
                                                                    <option value="0" selected="selected">ไม่แสดง</option>
                                                                <?php   } else { ?>
                                                                    <option value="1">แสดง</option>
                                                                    <option value="0">ไม่แสดง</option>
                                                                <?php   } ?>
                                                </select> 
                                            <div>
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
<input type="hidden" name="gallery_id" id="gallery_id" value="<?php echo $gallery_id;?>">
<input type="hidden" name="gallery_folder" id="gallery_folder" value="<?php echo $gallery_folder;?>">
<input type="hidden" name="copy_gallery" id="copy_gallery" value="<?php echo $gallery_thumbnail;?>">
</form>

                        </div>

                    </div>
                </div>
            </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php       }else{}

            ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php    }elseif(($manage=="picture")){

                $gallery_key=filter_input(INPUT_POST,'gallery_id');

                $gallery_sql = "SELECT * FROM `tb_gallery`  WHERE `gallery_id`='{$gallery_key}'";
                $gallery_list = result_array($gallery_sql);
                foreach ($gallery_list as $key => $gallery_row) { 
                    $gallery_name=$gallery_row["gallery_name"];
                    $gallery_topic=$gallery_row["gallery_topic"];
                    $gallery_id=$gallery_row["gallery_id"];
                    $gallery_folder=$gallery_row["gallery_folder"];
                }

            ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row">
                <div class="col-<?php echo $grid;?>-12">
                    <h4>ข้อมูลรูปกิจกรรม</h4>
                </div>
            </div>
            
            <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ชื่อกิจกรรม : <?php echo $gallery_name;?></div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="form_picture_album_show" id="form_picture_album_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="form_picture_album_add" id="form_picture_album_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=picture_album">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_mva" id="sub_mva"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลรูปกิจกรรม</button>
</form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                  
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                    <?php echo $gallery_topic;?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-<?php echo $grid; ?>-12">
                                <div id="Run_Show_All"><i class="icon-spinner2 spinner"></i> <span>กำลังโหลดข้อมูล... </span></div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        <input type="hidden" name="run_show" id="run_show" value="show_album">
        <input type="hidden" name="run_gallery_key" id="run_gallery_key" value="<?php echo $gallery_id;?>">
        <input type="hidden" name="run_gallery_folder" id="run_gallery_folder" value="<?php echo $gallery_folder;?>">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <?php    }else{ ?>

        <?php    }?>

        </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}

    }
?>