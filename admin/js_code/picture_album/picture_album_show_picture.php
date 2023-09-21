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

    <link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System();?>/js_code/tool_js/grid-gallery/baguetteBox.min.css">
    <link rel="stylesheet" href="<?php echo $RunLink->Call_Link_System();?>/js_code/tool_js/grid-gallery/grid-gallery.css">

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

    <script src="<?php echo $RunLink->Call_Link_System();?>/js_code/tool_js/grid-gallery/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
    </script>

        <div class="row">
            <div class="col-<?php echo $grid;?>-12">

                <section class="gallery-block grid-gallery">
                    <div class="row">                     
    <?php

            if((isset($_POST["run_gallery_key"],$_POST["run_gallery_folder"]))){
                
                $gallery_key=filter_input(INPUT_POST, 'run_gallery_key');
                $gallery_folder=filter_input(INPUT_POST, 'run_gallery_folder');

                $picture_sql = "SELECT `picture_name` FROM `tb_picture`  WHERE `gallery_id`='{$gallery_key}'";
                $picture_list = result_array($picture_sql);
                //$link_album="../../../dist/img/gallery/".$gallery_folder."/".$picture_row["picture_name"];
                foreach ($picture_list as $key => $picture_row) {   ?>
                
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
                        <div class="col-<?php echo $grid;?>-4 item">
                            <a class="lightbox" href="../../../languagecenter/dist/img/gallery/<?php echo $gallery_folder;?>/<?php echo $picture_row["picture_name"];?>">
                                <img class="img-fluid image scale-on-hover" style="width:304px; height:236px;" src="../../../languagecenter/dist/img/gallery/<?php echo $gallery_folder;?>/<?php echo $picture_row["picture_name"];?>">
                            </a>
                        </div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->    
    <?php       }

            }else{

            }

    ?>
                    </div>               
                </section>

            </div>
        </div>     


