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

<div class="row">

<?php
    $DocumentCategory_Sql = "SELECT * FROM `tb_document_category` ORDER BY `document_category_id` ASC";
    $DocumentCategory_Row = result_array($DocumentCategory_Sql);

    foreach ($DocumentCategory_Row as $key => $DocumentCategory_Print){

        if ((is_array($DocumentCategory_Print) && count($DocumentCategory_Print))) { ?>
            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            
                <div class="col-<?php echo $grid; ?>-4">
<form name="form_category_show" id="form_category_show" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=document">
                    <fieldset class="mb-3">
                        <button type="submit" class="card card-body bg-primary btn-block text-white has-bg-image btn-float m-0">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-graduation2 icon-3x opacity-75"></i>
                                </div>

                                <div class="media-body text-right">
                                    <h3 class="mb-0"><?php echo $DocumentCategory_Print["document_category_name"]; ?>&nbsp;</h3>
                                    <span class="text-uppercase font-size-xs"><?php echo $DocumentCategory_Print["document_category_name_en"];?>&nbsp;</span>
                                    <span class="text-uppercase font-size-xs"><?php echo $DocumentCategory_Print["document_category_name_cn"];?>&nbsp;</span>
                                </div>
                            </div>
                        </button>
                    </fieldset>
<input name="category_key"  type="hidden" value="<?php echo $DocumentCategory_Print['document_category_id']; ?>">
<input name="manage"  type="hidden" value="show_data" >
</form>
                </div>
                
            <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php


        }else{}
    }
?>


</div> 