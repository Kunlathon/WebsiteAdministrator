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
    include("../../structure/function_php_oop.php");

    $RunLink = new link_system();

    check_login('admin_username_lcm', 'login.php');

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
            "paging"       :    true,
            "lengthChange" :    false,
            "searching"    :    true,
            "ordering"     :    false,
            "info"         :    true,
            "autowidth"    :    false
        });

    })
</script>

<div class="table-responsive">
        <table class="table table-bordered" id="datatable-button-html5-columns-STD">
            <thead>
                <tr align="center">
                    <th>
                        <div>ลำดับ</div>
                    </th>
                    <th>
                        <div>ประเภท</div>
                    </th>
                    <th>
                        <div>จำนวนเอกสาร</div>
                    </th>
                    <th>
                        <div>จัดการ</div>
                    </th>
                </tr>
            </thead>
            <tbody>
    <?php
            $document_category_sql = "SELECT * FROM `tb_document_category`  ORDER BY `document_category_id` DESC";
            $document_category_list = result_array($document_category_sql);
            foreach ($document_category_list as $key => $document_category_row) { 

    ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                <tr>
                    <td align="center" style="vertical-align: text-top;" class="align-top">
                        <div><?php echo $key+1;?></div>
                    </td>
                    <td style="vertical-align: text-top;" class="align-top">
                        <div><?php echo $document_category_row["document_category_name"];?></div>
                        <div><?php echo $document_category_row["document_category_name_en"];?></div>
                        <div><?php echo $document_category_row["document_category_name_cn"];?></div>
                    </td>

                    <td align="center" style="vertical-align: text-top;" class="align-top">

    <?php
        $count_docmentSql="SELECT COUNT(`document_category_id`) AS `count_document` 
                           FROM `tb_document` 
                           WHERE `document_category_id`='{$document_category_row["document_category_id"]}'";
        $count_docmentRs=result_array($count_docmentSql);
        foreach ($count_docmentRs as $key => $count_docmentRow){
            if((is_array($count_docmentRow) and count($count_docmentRow))){
                $count_document=$count_docmentRow["count_document"];
            }else{
                $count_document=0;
            }
        }
    ?>

                        <div>
                         
<form name="count_document_<?php echo $document_category_row["document_category_id"];?>" id="count_document_<?php echo $document_category_row["document_category_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document">
                            
                            <input type="hidden" name="manage" id="manage" value="show_data">
                            <input type="hidden" name="category_key" id="category_key" value="<?php echo $document_category_row["document_category_id"];?>">

                            <button type="submit" name="but_count<?php echo $document_category_row["document_category_id"];?>" id="but_count<?php echo $document_category_row["document_category_id"];?>" class="badge badge-primary badge-pill"><?php echo $count_document;?></button>
</form>                      
                        </div>

                    </td>




                    <td align="center" style="vertical-align: text-top;" class="align-top">
                        <div align="center">
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
<form name="document_category_update<?php echo $document_category_row["document_category_id"];?>" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category">
    <input type="hidden" name="manage" value="edit"> 
    <input type="hidden" name="document_category_id" value="<?php echo $document_category_row["document_category_id"];?>">
    <button type="submit" name="button_<?php echo $document_category_row["document_category_id"];?>" class="btn btn-outline-secondary btn-sm" data-popup="tooltip" title="แก้ไข" data-placement="bottom"><i class="icon-pen"></i></button>
</form>
                                </li>
                                <li class="nav-item">
                                    <button type="button" name="Delete_Student_Data" id="delete_document_category_<?php echo $document_category_row["document_category_id"];?>" class="btn btn-outline-danger btn-sm" data-popup="tooltip" title="ลบ" data-placement="bottom"><i class="icon-bin"></i></button>
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


    <?php
        $document_category_sql="SELECT * FROM `tb_document_category`  ORDER BY `document_category_id` DESC";
        $document_category_list = result_array($document_category_sql);
        
        foreach ($document_category_list as $key => $document_category_row) { 
            if((is_array($document_category_row) && count($document_category_row))){ ?>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <script>
        $(document).ready(function(){
            var document_category_id="<?php echo $document_category_row["document_category_id"];?>";
            var action="delete";
            var action_error="error";
            var document_category_id_error="error";
// Defaults
            var swalInitDeteleImageData = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
// Defaults End

            $('#delete_document_category_<?php echo $document_category_row["document_category_id"];?>').on('click', function() {
                swalInitDeteleImageData.fire({
                    title: 'ต้องการลบข้อมูลหรือไม่',
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
                    if(result.value){

                        if (action==="") {
                            swalInitDeteleImageData.fire({
                                title: 'ข้อมูลไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                                icon: 'error'
                            });
                            action_error="error";
                        }else{
                            action_error="no_error";
                        }

                        if(document_category_id==""){
                            swalInitDeteleImageData.fire({
                                title: 'คีย์ว่าง ไม่สามารถดำเนินการลบได้',
                                icon: 'error'
                            });
                            document_category_id_error="error";
                        }else{
                            document_category_id_error="no_error";
                        }

                        if(action_error=="no_error" && document_category_id_error=="no_error"){
                            $.post("<?php echo $RunLink->Call_Link_System();?>/js_code/document_category/document_category_process.php",{
                                action:action,
                                document_category_id:document_category_id
                            },function(process_delete){
                                var process_delete = process_delete.trim();
                                if (process_delete === "no_error"){

                                    let timerInterval;
                                        swalInitDeteleImageData.fire({
                                            title: 'ลบสำเร็จ',
                                            //html: 'I will close in <b></b> milliseconds.',
                                            timer: 1200,
                                            icon: 'success',
                                            timerProgressBar: true,
                                            didOpen: function() {
                                                Swal.showLoading()
                                                timerInterval = setInterval(function() {
                                                    const content = Swal.getContent();
                                                    if (content) {
                                                        const b_document_category = content.querySelector('b_document_category')
                                                        if (b_document_category) {
                                                            b_document_category.textContent = Swal.getTimerLeft();
                                                        } else {}
                                                    } else {}
                                                }, 100);
                                            },
                                            willClose: function() {
                                                clearInterval(timerInterval)
                                            }
                                        }).then(function(result) {
                                            if (result.dismiss === Swal.DismissReason.timer) {
                                                document.location = "<?php echo $RunLink->Call_Link_System(); ?>/?modules=document_category";
                                            } else {}
                                        });

                                }else if(process_delete === "it_error"){
                                    swalInitDeteleImageData.fire({
                                            title: 'ลบไม่สำเร็จ',
                                            text: 'ข้อมูลมีความเชื่อมต่อกับรายการ เอกสาร',
                                            icon: 'error'
                                    });
                                }else{
                                    swalInitDeteleImageData.fire({
                                            title: 'พบข้อผิดพลาด',
                                            text: process_delete,
                                            icon: 'error'
                                    });
                                }
                            })
                        }else{}

                    }else if (result.dismiss === swal.DismissReason.cancel){

                    }else{

                    }
                });
            });
        })
    </script>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <?php   }else{}
        } ?>