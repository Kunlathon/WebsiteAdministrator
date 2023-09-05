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

    include ("../../config/connect.ini.php");
    include ("../../config/fnc.php");

    include("../../structure/link.php");

    $RunLink = new link_system();

    check_login('admin_username_aba', 'login.php');

?>

    <script type="text/javascript">
        function setScreenHWCookie() {
            $.cookie('sw', screen.width);
            //$.cookie('sh',screen.height);
            return true;
        }
        setScreenHWCookie();
    </script>

<?php
    $width_system = filter_input(INPUT_COOKIE, 'sw');
    if (($width_system >= 1200)) {
        $grid = "xl";
    } elseif (($width_system >= 992)) {
        $grid = "lg";
    } elseif (($width_system <= 768)) {
        $grid = "md";
    } elseif (($width_system <= 576)) {
        $grid = "sm";
    } else {
        $grid = "xs";
    }
?>

<script>
    $(document).ready(function() {

        $.extend($.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>ค้นหา:</span> _INPUT_',
                searchPlaceholder: 'พิมพ์เพื่อค้นหา...',
                lengthMenu: '<span>แสดง:</span> _MENU_',
                paginate: {
                    'first': 'First',
                    'last': 'Last',
                    'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                    'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                }
            }
        });

        $('#datatable-button-html5-columns-STD').DataTable({
            processing: true,

            columnDefs: [{
                "targets": '_all',
                "createdCell": function(td, cellData, rowData, row, col) {
                    $(td).css('padding', '4px')
                }
            }],
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ]
        });

    })
</script>

    <div class="table-responsive">
        <table class="table table-bordered" id="datatable-button-html5-columns-STD">
            <thead>
                <tr align="center">
                    <th>
                        <div>#</div>
                    </th>
                    <th>
                        <div>หัวข้อเรื่อง</div>
                    </th>
                    <th>
                        <div>ภาพ</div>
                    </th>
                    <th>
                        <div>สิงค์</div>
                    </th>
                    <th>
                        <div>วันที่ลง</div>
                    </th>
                    <th>
                        <div>วันที่แก้ไข</div>
                    </th>
                    <th>
                        <div>สถานะ</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
    <?php
            $slide_sql = "SELECT * 
                          FROM `tb_slide` 
                          WHERE `slide_status`='1' 
                          ORDER BY `slide_id` ASC";
            $slide_list = result_array($slide_sql);
            foreach ($slide_list as $key => $slide_row) { 
                if((isset($slide_row["slide_image"]))){
                    $slideimg_name=$slide_row["slide_image"];
                }else{
                    $slideimg_name=null;
                }
    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <tr>
                    <td align="center">
                        <div><?php echo $slide_row["slide_id"];?></div>
                    </td>
                    <td>
                        <div><?php echo $slide_row["slide_topic"];?></div>
                    </td>
                    <td>
    <?php
            if((isset($slideimg_name))){

            }else{ ?>

    <?php   } ?>
                        <div></div>
                    </td>
                    <td>
                        <div><?php echo $slide_row["slide_link"];?></div>
                    </td>
                    <td>
    <?php
            if((isset($slide_row["slide_post_date"]))){
                if((isset($slide_row["slide_post_date"]))!="0000-00-00 00:00:00"){ ?>
                        <div></div>
    <?php       }else{}
            }else{}
    ?>
                    </td>
                    <td>
    <?php
            if((isset($slide_row["slide_update_date"]))){
                if((isset($slide_row["slide_update_date"]))!="0000-00-00 00:00:00"){ ?>
                        <div></div>
    <?php       }else{}
            }else{}
    ?>
                    </td>
                    <td>
                        <div>
    <?php
            if(($slide_row["slide_status"]==0)){ ?>
                            <span class="badge badge-danger">ไม่แสดง</span>
    <?php   }elseif(($slide_row["slide_status"]==1)){ ?>
                            <span class="badge badge-success">แสดง</span>
    <?php   }else{} ?>
                        </div>
                    </td>
                    <td align="center">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="slide_update<?php echo $slide_row["slide_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=image_slide">
    <input type="hidden" name="manage" value="edit"> <input type="hidden" name="slide_id" value="<?php echo $slide_row["slide_id"];?>">
    <button type="submit" name="button_<?php echo $slide_row["slide_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
</form>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="Delete_Student_Data" data-toggle="modal" data-target="#modal_theme_success_Delete" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   } ?>
            </tbody>
        </table>
    </div>
