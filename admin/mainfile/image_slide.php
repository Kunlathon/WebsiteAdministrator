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
    ini_set('display_errors', 'On'); // Open Error , PHP Code



?>

<?php
    if((preg_match("/image_slide.php/", $_SERVER['PHP_SELF']))){
        Header("Location: ../index.php");
        die();
    }else{
        if((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')){ ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <div class="page-header page-header-light">
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                    <a href="#" class="breadcrumb-item"> จัดการระดับชั้น</a>

                    <a href="#" class="breadcrumb-item"> ข้อมูลระดับชั้น</a>

                    <a href="#" class="breadcrumb-item">รายละเอียดระดับชั้น</a>

                </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content">

    <?php
        if((isset($_POST["manage"]))){
            $manage=filter_input(INPUT_POST, 'manage');
        }else{
            if((isset($_GET["manage"]))){
                $manage=filter_input(INPUT_GET, 'manage');
            }else{
                $manage="show";
            }
        }
             if(($manage=="add")){ ?>

        <div class="row">
            <div class="col-<?php echo $grid; ?>-12">
                <h4>เพิ่มข้อมูลภาพสไลด์</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ฟอร์มเพิ่มข้อมูลภาพสไลด์</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
    <form name="image_slide_form_show" id="image_slide_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_isfs" id="sub_isfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
    </form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
    <form name="image_slide_form_add" id="image_slide_form_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_isfa" id="sub_isfa"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลภาพสไลด์</button>
    </form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                
                        </div>
                    </div>
                    <div class="card-body">
<form name="form_add" id="form_add" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/image_slide/image_slide_process.php" method="post" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-<?php echo $grid;?>-7">
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อเรื่อง</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <div id="slide_topic-null">
                                                        <input type="text" name="slide_topic" id="slide_topic" class="form-control" value="ศูนย์ภาษา มหาวิทยาลัยมหาจุฬาลงกรณราชวิทยาลัย วิทยาเขตเชียงใหม่" placeholder="กรอกข้อมูลหัวข้อเรื่อง" required="required" maxlength="100">
                                                        <span style="color: #DC143C;">กรอกข้อมูลหัวข้อเรื่อง</span>                                                
                                                    </div>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สิงค์</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="url" name="slide_link" id="slide_link" class="form-control" value="" placeholder="ข้อมูลสิงค์">
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <select class="form-control select" name="slide_status" id="slide_status" data-placeholder="เลือกสถานะ..." required="required">
                                                        <optgroup label="สถานะ">
                                                            <option value="1">แสดง</option>
                                                            <option value="0">ไม่แสดง</option>
                                                        </optgroup>
                                                    </select>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                            <div class="col-<?php echo $grid;?>-5">
                                
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <input type="file" name="slide_image" id="slide_image" class="UpdateFile_ImageSlide" data-fouc>
                                                <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            </div>
                                        </fieldset>
                                    </div>                            
                                </div> 

                            </div>

                        </div>
<input type="hidden" name="action" id="action" value="add">
</form>
                    </div>                    
                </div>
            </div>
        </div>

    <?php    }elseif(($manage=="edit")){ 
                if((isset($_POST["slide_id"]))){
                    $slide_id=filter_input(INPUT_POST, 'slide_id');
                }else{
                    if((isset($_GET["slide_id"]))){
                        $slide_id=base64_decode(filter_input(INPUT_GET, 'slide_id'));
                    }else{
                        $slide_id="-";
                    }
                } 
                if(($slide_id!="-")){   
                    
                    $slide_sql = "SELECT * 
                    FROM `tb_slide`
                    WHERE `slide_id` ='{$slide_id}'";
                    $slide_list = result_array($slide_sql);
                    foreach ($slide_list as $key => $slide_row) { 
                        if((is_array($slide_row) && count($slide_row))){
                            $slide_id=$slide_row["slide_id"];
                            $slide_topic=$slide_row["slide_topic"];
                            $slide_image=$slide_row["slide_image"];
                            $slide_link=$slide_row["slide_link"];
                            $slide_post_date=$slide_row["slide_post_date"];
                            $slide_update_date=$slide_row["slide_update_date"];
                            $slide_status=$slide_row["slide_status"];
                        }else{
                            $slide_id=null;
                            $slide_topic=null;
                            $slide_image=null;
                            $slide_link=null;
                            $slide_post_date=null;
                            $slide_update_date=null;
                            $slide_status=null;
                        }
                    }
                    ?>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<script>
        $(document).ready(function(){
            var js_img_name="<?php echo $slide_image;?>";
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

            $('.UpdateFile_ImageSlideEdit').fileinput({
                browseLabel: 'Browse',
                browseIcon: '<i class="icon-file-plus mr-2"></i>',
                uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
                removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
                layoutTemplates: {
                    icon: '<i class="icon-file-check"></i>',
                    modal: modalTemplate
                },
                initialPreview: [
                '../dist/img/slides/'+js_img_name
                ],
                initialPreviewConfig: [
                   // {caption: 'Jane.jpg', size: 930321, key: 1, url: '{$url}'}
                   {caption: js_img_name, key: 1, url: '{$url}'}
                ],
                initialPreviewAsData: true,
                overwriteInitial: true,
                initialCaption: "No file selected",
                previewZoomButtonClasses: previewZoomButtonClasses,
                previewZoomButtonIcons: previewZoomButtonIcons,
                fileActionSettings: fileActionSettings,
                //maxFileSize: 1500,
                maxFileCount: 1,
                allowedFileExtensions: ["jpg", "JPG", "png", "PNG"]

            });

        })
    </script>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

<!--<img src="../dist/img/slides/20200311131925_slide.jpg" class="img-rounded" alt="Cinque Terre">-->

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <h4>แก้ไขข้อมูลภาพสไลด์</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid;?>-6">ฟอร์มแก้ไขข้อมูลภาพสไลด์</div>
                        <div class="col-<?php echo $grid;?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
<form name="image_slide_form_show" id="image_slide_form_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="show">
                                            <button type="submit" name="sub_isfs" id="sub_isfs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
</form>

                                        </div>
                                    </td>
                                    <td>
                                        <div>
<form name="image_slide_form_add" id="image_slide_form_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                            <input type="hidden" name="manage" id="manage" value="add">
                                            <button type="submit" name="sub_isfa" id="sub_isfa"  class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลภาพสไลด์</button>
</form>
                                        </div>
                                    </td>
                                </tr>
                            </table>                
                        </div>
                    </div>
                    <div class="card-body">

<form name="form_edit" id="form_edit" accept-charset="utf-8" action="<?php echo $RunLink->Call_Link_System();?>/js_code/image_slide/image_slide_process.php" method="post" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-<?php echo $grid;?>-7">
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อเรื่อง</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <div id="slide_topic-null">
                                                        <input type="text" name="slide_topic" id="slide_topic" class="form-control" value="<?php echo $slide_topic;?>" placeholder="กรอกข้อมูลหัวข้อเรื่อง" required="required" maxlength="100">
                                                        <span style="color: #DC143C;">กรอกข้อมูลหัวข้อเรื่อง</span>                                                
                                                    </div>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สิงค์</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <input type="url" name="slide_link" id="slide_link" class="form-control" value="<?php echo $slide_link;?>" placeholder="ข้อมูลสิงค์">
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะ</label>
                                                <div class="col-<?php echo $grid; ?>-10">
                                                    <select class="form-control select" name="slide_status" id="slide_status" data-placeholder="เลือกสถานะ..." required="required">
                                                        <optgroup label="สถานะ">
                                                            <option value="1">แสดง</option>
                                                            <option value="0">ไม่แสดง</option>
                                                        </optgroup>
                                                    </select>
                                                <div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>

                            </div>
                            <div class="col-<?php echo $grid;?>-5">
                                
                                <div class="row">
                                    <div class="col-<?php echo $grid;?>-12">
                                        <fieldset class="mb-3">
                                            <div class="form-group row">
                                                <input type="file" name="slide_image" id="slide_image" class="UpdateFile_ImageSlideEdit" data-fouc value="../dist/img/slides/<?php echo $slide_image;?>">
                                                <span class="form-text text-muted">นานสกุลไฟส์ <code>jpg</code>,<code>JPG</code>,<code>png</code>,<code>PNG</code></span>
                                            </div>
                                        </fieldset>
                                    </div>                            
                                </div> 

                            </div>

                        </div>
    <input type="hidden" name="action" id="action" value="edit">
    <input type="hidden" name="slide_id" id="slide_id" value="<?php echo $slide_id;?>">
    <input type="hidden" name="copy_slide_image" id="copy_slide_image" value="<?php echo $slide_image;?>">
</form>

                    </div>
                </div>
            </div>
        </div>
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php       }else{}
            }else{ ?>

        <div class="row">
            <div class="col-<?php echo $grid; ?>-12">
                <h4>ข้อมูลภาพสไลด์</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">
                <div class="card border border-purple">
                    <div class="card-header header-elements-inline bg-info text-white">
                        <div class="col-<?php echo $grid; ?>-6">ตารางข้อมูลภาพสไลด์</div>
                        <div class="col-<?php echo $grid; ?>-6">
                            <table align="right">
                                <tr>
                                    <td>
                                        <div>
                                            <button type="button" onclick="location.href='<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide';" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <form name="image_slide_form_add" id="image_slide_form_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
                                                <button type="submit" name="manage" id="manage" value="add" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลภาพสไลด์</button>
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

    <input type="hidden" name="run_show" id="run_show" value="show">

    <?php    } ?>


    </div>


<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   }else{}
    }

?>