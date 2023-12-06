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

    $link_web = new link_web();

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

<?php
    $news_key= filter_input(INPUT_POST, 'news_key');

    $news_sql = "SELECT * FROM `tb_news`  WHERE `news_id`='{$news_key}'";
    $news_list = result_array($news_sql);
    foreach ($news_list as $key => $news_row){
        $news_id = $news_row["news_id"];
        $news_category_id = $news_row["news_category_id"];
        $news_topic = $news_row["news_topic"];
        $news_image0 = $news_row["news_image0"];
        $news_detail_1 = $news_row["news_detail_1"];
        $news_image1_1 = $news_row["news_image1_1"];
        $news_image1_2 = $news_row["news_image1_2"];
        $news_detail_2 = $news_row["news_detail_2"];
        $news_image2_1 = $news_row["news_image2_1"];
        $news_image2_2 = $news_row["news_image2_2"];
        $news_detail_3 = $news_row["news_detail_3"];
        $news_image3_1 = $news_row["news_image3_1"];
        $news_image3_1 = $news_row["news_image3_1"];
        $news_image3_2 = $news_row["news_image3_2"];
        $news_detail_4 = $news_row["news_detail_4"];
        $news_image4_1 = $news_row["news_image4_1"];
        $news_image4_2 = $news_row["news_image4_2"];
        $news_detail_5 = $news_row["news_detail_5"];
        $news_image5_1 = $news_row["news_image5_1"];
        $news_image5_2 = $news_row["news_image5_2"];
        $news_status = $news_row["news_status"];

        if((isset($news_row["news_topic_en"]))){
            $news_topic_en=$news_row["news_topic_en"];
        }else{
            $news_topic_en=null;
        }

        if((isset($news_row["news_detail_1_en"]))){
            $news_detail_1_en=$news_row["news_detail_1_en"];
        }else{
            $news_detail_1_en=null;
        }

        if((isset($news_row["news_detail_2_en"]))){
            $news_detail_2_en=$news_row["news_detail_2_en"];
        }else{
            $news_detail_2_en=null;
        }

        if((isset($news_row["news_detail_3_en"]))){
            $news_detail_3_en=$news_row["news_detail_3_en"];
        }else{
            $news_detail_3_en=null;
        }

        if((isset($news_row["news_detail_4_en"]))){
            $news_detail_4_en=$news_row["news_detail_4_en"];
        }else{
            $news_detail_4_en=null;
        }

        if((isset($news_row["news_detail_5_en"]))){
            $news_detail_5_en=$news_row["news_detail_5_en"];
        }else{
            $news_detail_5_en=null;
        }

        if((isset($news_row["news_topic_cn"]))){
            $news_topic_cn=$news_row["news_topic_cn"];
        }else{
            $news_topic_cn=null;
        }

        if((isset($news_row["news_detail_1_cn"]))){
            $news_detail_1_cn=$news_row["news_detail_1_cn"];
        }else{
            $news_detail_1_cn=null;
        }

        if((isset($news_row["news_detail_2_cn"]))){
            $news_detail_2_cn=$news_row["news_detail_2_cn"];
        }else{
            $news_detail_2_cn=null;
        }

        if((isset($news_row["news_detail_3_cn"]))){
            $news_detail_3_cn=$news_row["news_detail_3_cn"];
        }else{
            $news_detail_3_cn=null;
        }

        if((isset($news_row["news_detail_4_cn"]))){
            $news_detail_4_cn=$news_row["news_detail_4_cn"];
        }else{
            $news_detail_4_cn=null;
        }

        if((isset($news_row["news_detail_5_cn"]))){
            $news_detail_5_cn=$news_row["news_detail_5_cn"];
        }else{
            $news_detail_5_cn=null;
        }

    }

?>

                <ul class="nav nav-tabs nav-tabs-solid nav-tabs-solid-custom bg-primary rounded-top border-0 mb-0">
					<li class="nav-item"><a href="#colored-nav-tab-th" class="nav-link rounded-left rounded-bottom-0 active" data-toggle="tab">รายละเอียด TH</a></li>
					<li class="nav-item"><a href="#colored-nav-tab-en" class="nav-link" data-toggle="tab">รายละเอียด EN</a></li>
                    <li class="nav-item"><a href="#colored-nav-tab-cn" class="nav-link" data-toggle="tab">รายละเอียด CN</a></li>
				</ul>

                <div class="tab-content card card-body rounded-top-0 border-top-0 mb-0">

                    <div class="tab-pane fade active show" id="colored-nav-tab-th">

                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ข้อมูลข่าว TH</div>
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="form_manage_news_show" id="form_manage_news_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news">
                                                                <input type="hidden" name="manage" id="manage" value="show">
                                                                <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form name="form_manage_news_add" id="form_manage_news_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news">
                                                                <input type="hidden" name="manage" id="manage" value="add">
                                                                <button type="submit" name="sub_mva" id="sub_mva" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลข่าว</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        
                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
            <?php
                    if((($news_image0 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image0))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image0;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div style="font-size: 20px; font-weight: bold;"><?php echo $news_topic; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_1; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image1_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image1_1))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image1_1;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image1_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image1_2))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image1_2;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_2; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image2_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_1))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image2_1;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image2_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image2_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_3; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image3_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image3_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image3_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image3_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_4; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image4_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image4_1 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image4_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
                                                <?php
                    if((($news_image4_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image4_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image4_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_5; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image5_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image5_1 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image5_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image5_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image5_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image5_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="colored-nav-tab-en">
                   
                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ข้อมูลข่าว EN</div>
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="form_manage_news_show" id="form_manage_news_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news">
                                                                <input type="hidden" name="manage" id="manage" value="show">
                                                                <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form name="form_manage_news_add" id="form_manage_news_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news">
                                                                <input type="hidden" name="manage" id="manage" value="add">
                                                                <button type="submit" name="sub_mva" id="sub_mva" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลข่าว</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        
                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
            <?php
                    if((($news_image0 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image0))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image0;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div style="font-size: 20px; font-weight: bold;"><?php echo $news_topic_en; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_1_en; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image1_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image1_1))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image1_1;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image1_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image1_2))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image1_2;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_2_en; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image2_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_1))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image2_1;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image2_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image2_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_3_en; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image3_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image3_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image3_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image3_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_4_en; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image4_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image4_1 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image4_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
                                                <?php
                    if((($news_image4_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image4_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image4_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_5_en; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image5_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image5_1 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image5_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image5_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image5_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image5_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="colored-nav-tab-cn">

                        <div class="row">
                            <div class="col-<?php echo $grid;?>-12">
                                <div class="card border border-purple">
                                    <div class="card-header header-elements-inline bg-info text-white">
                                        <div class="col-<?php echo $grid; ?>-6">ข้อมูลข่าว CN</div>
                                        <div class="col-<?php echo $grid; ?>-6">
                                            <table align="right">
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <form name="form_manage_news_show" id="form_manage_news_show" accept-charset="uft-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news">
                                                                <input type="hidden" name="manage" id="manage" value="show">
                                                                <button type="submit" name="sub_mvs" id="sub_mvs" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-list-unordered"></i> รายการ</button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <form name="form_manage_news_add" id="form_manage_news_add" accept-charset="utf-8" method="post" action="<?php echo $RunLink->Call_Link_System(); ?>/?modules=manage_news">
                                                                <input type="hidden" name="manage" id="manage" value="add">
                                                                <button type="submit" name="sub_mva" id="sub_mva" class="btn btn-secondary btn-sm" style="align: right;"><i class="icon-plus3"></i> เพิ่มข้อมูลข่าว</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        
                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
            <?php
                    if((($news_image0 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image0))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image0;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div style="font-size: 20px; font-weight: bold;"><?php echo $news_topic_cn; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_1_cn; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image1_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image1_1))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image1_1;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image1_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image1_2))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image1_2;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_2_cn; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image2_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_1))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image2_1;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image2_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image2_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_3_cn; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image3_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image3_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image3_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image2_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image3_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_4_cn; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image4_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image4_1 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image4_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
                                                <?php
                    if((($news_image4_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image4_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image4_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-12">
                                                    <div><?php echo $news_detail_5_cn; ?></div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="mb-3">
                                            <div class="row">
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image5_1 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image5_1 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image5_1 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                                <div class="col-<?php echo $grid; ?>-6">
            <?php
                    if((($news_image5_2 != null))) {
                        if((file_exists("../../../uploads/news/" . $news_image5_2 ))) { ?> 
                                                    <div align="center"><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/<?php echo $news_image5_2 ;?>" class="img-thumbnail" style="width: 60%; height:436;"></div>
            <?php       }else{ ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;"></div>-->
            <?php   }
                    }else{  ?>
                                                    <!--<div><img src="<?php echo $link_web->Call_link_web();?>/uploads/news/no-image-icon-0.jpg" class="img-thumbnail" style="width: 60%; height:436;" ></div>-->
            <?php   } ?>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

