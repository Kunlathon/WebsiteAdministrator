<!-- Page body -->

<div class="page-body">
    <div class="container-xl">
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
        <div class="row row-cards">
            <div class="col-md-12">
                <div class="page-body">
                    <div class="container-xl">
                        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">

                                    <div class="mb-1">
                                        <div class="row g-3">
                                            <div class="row g-2 alogn-items-center">
                                                <div class="row row-cards">
                                                    <div class="col-md-12">
                                                        <div class="page-header d=print-none">
                                                            <div class="container-xl">
                                                                <div class="row g-2 alogn-items-center">
                                                                    <div class="col-md-12">
                                                                        <div class="row g-2">
                                                                            <div class="page-title" style="font-size: 20px;">รายละเอียดข่าว</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-1">
                                    <div class="row g-3">
                                        <div class="col-md-8">

                                            <?php
                                            if ((isset($_POST["id"]))) {
                                                $news_key = filter_input(INPUT_POST, 'id');
                                            } else {
                                                if ((isset($_GET["id"]))) {
                                                    $news_key = filter_input(INPUT_GET, 'id');
                                                } else {
                                                    $news_key = null;
                                                }
                                            } ?>

                                            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                var news_key = "<?php echo $news_key; ?>";
                                                if (news_key !== "") {
                                                    $.post("proccess/count_news.php", {
                                                        news_key: news_key
                                                    }, function(txt_count_news) {
                                                        txt_cn = txt_count_news.trim();
                                                        if (txt_cn === "yes") {
                                                            //location.reload();
                                                        } else {}
                                                    })
                                                } else {}
                                            })
                                        </script> -->

                                            <?php if (($news_key != null)) {


                                                $data_news_sql = "SELECT * FROM `tb_news` RIGHT JOIN `tb_news_category` ON (`tb_news`.`news_category_id`=`tb_news_category`.`news_category_id`)
                            WHERE `tb_news`.`news_id`='{$news_key}' AND  `tb_news`.`news_status`='1'";
                                                $data_news = result_array($data_news_sql);
                                                foreach ($data_news as $key => $data_news_row) {
                                                    if ((is_array($data_news_row) and count($data_news_row))) {
                                                        $news_topic = $data_news_row["news_topic"];
                                                        $news_image0 = $data_news_row["news_image0"];

                                                        $news_detail_1 = $data_news_row["news_detail_1"];
                                                        $news_image1_1 = $data_news_row["news_image1_1"];
                                                        $news_image1_2 = $data_news_row["news_image1_2"];

                                                        $news_detail_2 = $data_news_row["news_detail_2"];
                                                        $news_image2_1 = $data_news_row["news_image2_1"];
                                                        $news_image2_2 = $data_news_row["news_image2_2"];

                                                        $news_detail_3 = $data_news_row["news_detail_3"];
                                                        $news_image3_1 = $data_news_row["news_image3_1"];
                                                        $news_image3_2 = $data_news_row["news_image3_2"];

                                                        $news_detail_4 = $data_news_row["news_detail_4"];
                                                        $news_image4_1 = $data_news_row["news_image4_1"];
                                                        $news_image4_2 = $data_news_row["news_image4_2"];

                                                        $news_detail_5 = $data_news_row["news_detail_5"];
                                                        $news_image5_1 = $data_news_row["news_image5_1"];
                                                        $news_image5_2 = $data_news_row["news_image5_2"];

                                                        $news_pageview = $data_news_row['news_pageview'];
                                                    } else {
                                                        $news_topic=null;
                                                        $news_image0=null;
                                                        $news_detail_1 = null;
                                                        $news_image1_1= null;
                                                        $news_image1_2= null;
                                                        $news_detail_2= null;
                                                        $news_image2_1= null;
                                                        $news_image2_2= null;
                                                        $news_detail_3= null;
                                                        $news_image3_1= null;
                                                        $news_image3_2= null;
                                                        $news_detail_4= null;
                                                        $news_image4_1= null;
                                                        $news_image4_2= null;
                                                        $news_detail_5= null;
                                                        $news_image5_1= null;
                                                        $news_image5_2= null;

                                                    }
                                                }


                                                //ทำการเพิ่มจำนวนคนเข้าชม

                                                $pageview = $news_pageview + 1;

                                                $data = array(
                                                    "news_pageview" => $pageview
                                                );

                                                update("tb_news", $data, "news_id = {$news_key}");

                                            ?>

                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <?php
                                                                        if (($news_image0 != null)) {
                                                                            if ((file_exists("uploads/news/" . $news_image0))) {
                                                                                $file_news_image0 = $news_image0;
                                                                            } else {
                                                                                $file_news_image0 = "no-image-icon-0.jpg";
                                                                            }
                                                                        } else {
                                                                            $file_news_image0 = "no-image-icon-0.jpg";
                                                                        } ?>

                                                                        <?php
                                                                        if (($file_news_image0 != "no-image-icon-0.jpg")) { ?>
                                                                            <div><img src="uploads/news/<?php echo $file_news_image0; ?>" class="img-thumbnail" alt="<?php echo $file_news_image0; ?>" style="width:100%;"></div>
                                                                        <?php   } else { ?>

                                                                        <?php   } ?>


                                                                    </div>
                                                                </diV><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <p align="left">ปรับปรุงข้อมูลล่าสุด&nbsp;<?php echo  date_full_th($data_news_row['news_post_date']); ?></p>
                                                                        <p>

                                                                            <i class="fa fa-user"></i> จำนวนผู้เข้าชม <?php echo $pageview; ?> &nbsp;
                                                                            <?php
                                                                            $sqlCat = "SELECT * FROM tb_news_category WHERE news_category_id = '$data_news_row[news_category_id]'";
                                                                            $rowCat = row_array($sqlCat);

                                                                            ?>

                                                                            <i class="fa fa-comments"></i> ประเภท <?php echo $rowCat['news_category_name']; ?>

                                                                        </p>
                                                                    </div>
                                                                </diV><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <section style=""><?php echo $news_topic; ?></section>
                                                                    </div>
                                                                </diV><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <section></section>
                                                                    </div>
                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <section><?php echo $news_detail_1; ?></section>
                                                                    </div>
                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <?php
                                                                    if (($news_image1_1 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image1_1))) {
                                                                            $file_news_image1_1 = $news_image1_1;
                                                                        } else {
                                                                            $file_news_image1_1 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image1_1 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image1_1 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image1_1; ?>" class="img-thumbnail" alt="<?php echo $file_news_image1_1; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                    <?php
                                                                    if (($news_image1_2 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image1_2))) {
                                                                            $file_news_image1_2 = $news_image1_2;
                                                                        } else {
                                                                            $file_news_image1_2 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image1_2 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image1_2 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image1_2; ?>" class="img-thumbnail" alt="<?php echo $file_news_image1_2; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <section><?php echo $news_detail_2; ?></section>
                                                                    </div>
                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <?php
                                                                    if (($news_image2_1 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image2_1))) {
                                                                            $file_news_image2_1 = $news_image2_1;
                                                                        } else {
                                                                            $file_news_image2_1 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image2_1 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image2_1 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image2_1; ?>" class="img-thumbnail" alt="<?php echo $file_news_image2_1; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                    <?php
                                                                    if (($news_image2_2 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image2_2))) {
                                                                            $file_news_image2_2 = $news_image2_2;
                                                                        } else {
                                                                            $file_news_image2_2 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image2_2 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image2_2 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image2_2; ?>" class="img-thumbnail" alt="<?php echo $file_news_image2_2; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <section><?php echo $news_detail_3; ?></section>
                                                                    </div>
                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <?php
                                                                    if (($news_image3_1 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image3_1))) {
                                                                            $file_news_image3_1 = $news_image3_1;
                                                                        } else {
                                                                            $file_news_image3_1 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image3_1 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image3_1 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image3_1; ?>" class="img-thumbnail" alt="<?php echo $file_news_image3_1; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                    <?php
                                                                    if (($news_image3_2 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image3_2))) {
                                                                            $file_news_image3_2 = $news_image3_2;
                                                                        } else {
                                                                            $file_news_image3_2 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image3_2 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image3_2 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image3_2; ?>" class="img-thumbnail" alt="<?php echo $file_news_image3_2; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <section><?php echo $news_detail_4; ?></section>
                                                                    </div>
                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <?php
                                                                    if (($news_image4_1 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image4_1))) {
                                                                            $file_news_image4_1 = $news_image4_1;
                                                                        } else {
                                                                            $file_news_image4_1 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image4_1 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image4_1 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image4_1; ?>" class="img-thumbnail" alt="<?php echo $file_news_image4_1; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                    <?php
                                                                    if (($news_image4_2 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image4_2))) {
                                                                            $file_news_image4_2 = $news_image4_2;
                                                                        } else {
                                                                            $file_news_image4_2 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image4_2 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image4_2 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image4_2; ?>" class="img-thumbnail" alt="<?php echo $file_news_image4_2; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <div class="col-md-12">
                                                                        <section><?php echo $news_detail_5; ?></section>
                                                                    </div>
                                                                </div><br>

                                                                <div class="row g-2">
                                                                    <?php
                                                                    if (($news_image5_1 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image5_1))) {
                                                                            $file_news_image5_1 = $news_image5_1;
                                                                        } else {
                                                                            $file_news_image5_1 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image5_1 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image5_1 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image5_1; ?>" class="img-thumbnail" alt="<?php echo $file_news_image5_1; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                    <?php
                                                                    if (($news_image5_2 != null)) {
                                                                        if ((file_exists("uploads/news/" . $news_image5_2))) {
                                                                            $file_news_image5_2 = $news_image5_2;
                                                                        } else {
                                                                            $file_news_image5_2 = "no-image-icon-0.jpg";
                                                                        }
                                                                    } else {
                                                                        $file_news_image5_2 = "no-image-icon-0.jpg";
                                                                    } ?>

                                                                    <?php
                                                                    if (($file_news_image5_2 != "no-image-icon-0.jpg")) { ?>
                                                                        <div class="col-md-6">
                                                                            <div><img src="uploads/news/<?php echo $file_news_image5_2; ?>" class="img-thumbnail" alt="<?php echo $file_news_image5_2; ?>" style="width:100%; height:400;"></div>
                                                                        </div>
                                                                    <?php   } else { ?>

                                                                    <?php   } ?>


                                                                </div><br>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            <?php  } else { ?>



                                            <?php    } ?>


                                        </div>
                                        <div class="col-md-4">

                                        <?php
                                        $news_category_id = $data_news_row['news_category_id'];

                                        if($news_category_id=="1"){
                                            $search_news = "?modules=news_announcement";
                                        
                                        } elseif($news_category_id=="2"){
                                            $search_news = "?modules=news_public";

                                        } elseif($news_category_id=="3"){
                                            $search_news = "?modules=news_procurement";

                                        } elseif($news_category_id=="4"){
                                            $search_news = "?modules=news_recruitment";

                                        }

                                        ?>

                                            <div class="row g-3">
                                                <div class="col-md-12" align="right">
                                                    <form name="keyword" action="<?php echo $search_news;?>" method="post">
                                                        <div class="row g-2">
                                                            <div class="col">
                                                                <input type="text" name="keyword" id="" class="form-control" placeholder="Search for…">
                                                            </div>
                                                            <div class="col-auto">
                                                                <button type="submit" name="" id="" class="btn btn-icon" aria-label="Button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                                        <path d="M21 21l-6 -6" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><br>

                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <?php
                                                            $Statistics_New_Sql = "SELECT * 
                                 FROM `tb_news` 
                                 WHERE `news_status`='1' 
                                 ORDER BY `news_pageview` DESC , `news_topic` ASC LIMIT 10;";
                                                            $Statistics_New = result_array($Statistics_New_Sql);
                                                            foreach ($Statistics_New as $key => $Statistics_New_Row) {
                                                                if ((is_array($Statistics_New_Row) and count($Statistics_New_Row))) { ?>

                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="alert alert-success" role="alert">
                                                                                <div><a href="?modules=news_detail&id=<?php echo $Statistics_New_Row['news_id']; ?>"><?php echo $Statistics_New_Row["news_topic"] . " (" . $Statistics_New_Row["news_pageview"] . ")"; ?></a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                            <?php    } else {
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    </div>
</div>
<!-- Page body end-->
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->