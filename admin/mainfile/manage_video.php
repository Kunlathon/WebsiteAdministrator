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

if ((preg_match("/manage_video.php/", $_SERVER['PHP_SELF']))) {
    Header("Location: ../index.php");
    die();
} else {
    if ((check_session("admin_status_lcm") == '1') || (check_session("admin_status_lcm") == '2') || (check_session("admin_status_lcm") == '3') || (check_session("admin_status_lcm") == '4') || (check_session("admin_status_lcm") == '5')) { ?>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="breadcrumb-item">
                            <i class="icon-home2 mr-2"></i> หน้าแรก</a>

                        <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video" class="breadcrumb-item"> วิดีโอ (Youtube)</a>

                        <a href="#" class="breadcrumb-item"> รายละเอียดวิดีโอ (Youtube)</a>

                    </div>
                    <a href="<?php echo $RunLink->Call_Link_System(); ?>/?modules=dashboard" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>
            </div>
        </div>

        <div class="content">

            <?php
            if ((isset($_POST["manage"]))) {
                $manage = filter_input(INPUT_POST, 'manage');
            } else {
                if ((isset($_GET["manage"]))) {
                    $manage = filter_input(INPUT_GET, 'manage');
                } else {
                    $manage = "show";
                }
            }
            ?>

            <?php
            if (($manage == "add")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>เพิ่มข้อมูลวิดีโอ (Youtube)</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ฟอร์มเพิ่มข้อมูลวิดีโอ</div>
                                <div class="col-<?php echo $grid; ?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <form name="form_manage_video_show" id="form_manage_video_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video">
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

                                <form name="form_add" id="form_add" accept-charset="utf-8" action="#" method="post" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div id="videos_topic-null">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อเรื่อง</label>
                                                        <div class="col-<?php echo $grid; ?>-10">
                                                            <input type="text" name="videos_topic" id="videos_topic" class="form-control" value="" placeholder="หัวข้อเรื่อง" required="required" maxlength="100">
                                                            <div>
                                                            </div>
                                                        </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">สคริปต์วิดีโอ</label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <textarea name="videos_youtube" id="videos_youtube" class="summernote"></textarea>
                                                        <div>
                                                        </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาวิดีโอ</label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <textarea name="videos_detail" id="videos_detail" class="summernote"></textarea>
                                                        <div>
                                                        </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-<?php echo $grid; ?>-12">
                                            <fieldset class="mb-3">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะวิดีโอ</label>
                                                    <div class="col-<?php echo $grid; ?>-10">
                                                        <select name="videos_status" id="videos_status" class="form-control select" required="required" data-fouc>
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
                                                <button type="button" name="sub_up" id="sub_up" class="btn btn-info">บันทึก</button>&nbsp;
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
            <?php   } elseif (($manage == "edit")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>แก้ไขข้อมูลวิดีโอ (Youtube)</h4>
                    </div>
                </div>

                <?php
                if ((isset($_POST["videos_id"]))) {

                    $videos_key = filter_input(INPUT_POST, 'videos_id');

                    $video_sql = "SELECT * FROM `tb_videos`  WHERE `videos_id`='{$videos_key}'";
                    $video_list = result_array($video_sql);

                    foreach ($video_list as $key => $video_row) {
                        if ((is_array($video_row) && count($video_row))) {
                            $videos_id = $video_row["videos_id"];
                            $videos_topic = $video_row["videos_topic"];
                            $videos_youtube = $video_row["videos_youtube"];
                            $videos_detail = $video_row["videos_detail"];
                            $videos_status = $video_row["videos_status"];

                            $videos_post_date = $video_row["videos_post_date"];
                            $videos_update_date = $video_row["videos_update_date"];
                        } else {
                            $videos_id = null;
                            $videos_topic = null;
                            $videos_youtube = null;
                            $videos_detail = null;
                            $videos_status = null;
                        }
                    }

                ?>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                    <div class="row">
                        <div class="col-<?php echo $grid; ?>-12">
                            <div class="card border border-purple">
                                <div class="card-header header-elements-inline bg-info text-white">
                                    <div class="col-<?php echo $grid; ?>-6">ฟอร์มแก้ไขข้อมูลวิดีโอ</div>
                                    <div class="col-<?php echo $grid; ?>-6">
                                        <table align="right">
                                            <tr>
                                                <td>
                                                    <div>
                                                        <form name="form_manage_video_show" id="form_manage_video_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video">
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

                                    <form name="form_edit" id="form_edit" accept-charset="utf-8" action="#" method="post" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3">
                                                    <div id="videos_topic-null">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-<?php echo $grid; ?>-2">หัวข้อเรื่อง</label>
                                                            <div class="col-<?php echo $grid; ?>-10">
                                                                <input type="text" name="videos_topic" id="videos_topic" class="form-control" value="<?php echo $videos_topic; ?>" placeholder="หัวข้อเรื่อง" required="required" maxlength="100">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-<?php echo $grid; ?>-2">สคริปต์วิดีโอ</label>
                                                        <div class="col-<?php echo $grid; ?>-10">
                                                            <textarea name="videos_youtube" id="videos_youtube" class="summernote"><?php echo $videos_youtube; ?></textarea>
                                                            <div>
                                                            </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-<?php echo $grid; ?>-2">เนื้อหาวิดีโอ</label>
                                                        <div class="col-<?php echo $grid; ?>-10">
                                                            <textarea name="videos_detail" id="videos_detail" class="summernote"><?php echo $videos_detail; ?></textarea>
                                                            <div>
                                                            </div>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-<?php echo $grid; ?>-12">
                                                <fieldset class="mb-3">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-<?php echo $grid; ?>-2">สถานะวิดีโอ</label>
                                                        <div class="col-<?php echo $grid; ?>-10">
                                                            <select name="videos_status" id="videos_status" class="form-control select" required="required" data-fouc>
                                                                <?php
                                                                if (($videos_status == 1)) { ?>
                                                                    <option value="1" selected="selected">แสดง</option>
                                                                    <option value="0">ไม่แสดง</option>
                                                                <?php   } elseif (($videos_status == 0)) { ?>
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
                                                    <button type="button" name="sub_edit" id="sub_edit" class="btn btn-info">บันทึก</button>&nbsp;
                                                    <button type="reset" name="reset_edit" id="reset_edit" class="btn btn-danger">ยกเลิก</button>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <input type="hidden" name="action" id="action" value="edit">
                                        <input type="hidden" name="videos_id" id="videos_id" value="<?php echo $videos_id; ?>">

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <?php   } else {
                } ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?PHP   } elseif (($manage == "show")) { ?>
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <h4>ข้อมูลวิดีโอ (Youtube)</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-<?php echo $grid; ?>-12">
                        <div class="card border border-purple">
                            <div class="card-header header-elements-inline bg-info text-white">
                                <div class="col-<?php echo $grid; ?>-6">ข้อมูลวิดีโอ</div>
                                <div class="col-<?php echo $grid; ?>-6">
                                    <table align="right">
                                        <tr>
                                            <td>
                                                <div>
                                                    <form name="form_manage_video_show" id="form_manage_video_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video">
                                                        <input type="hidden" name="manage" id="manage" value="show">
                                                        <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                    </form>

                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <form name="form_manage_video_add" id="form_manage_video_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_video">
                                                        <input type="hidden" name="manage" id="manage" value="add">
                                                        <button type="submit" name="sub_mva" id="sub_mva" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลภาพสไลด์</button>
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
                <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <?php    } else {
            } ?>


        </div>

        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php   } else {
    }
}

?>