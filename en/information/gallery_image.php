<!--css code-->
    <link rel="stylesheet" href="../dist/img/gallery/baguetteBox.min.css">
    <link rel="stylesheet" href="../dist/img/gallery/grid-gallery.css">
<!--css code end-->
<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
            <div class="row row-cards">
              <div class="col-md-12">
                <div class="page-body">
                  <div class="container-xl">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<?php 
		    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

			$sql = "SELECT * FROM tb_gallery a INNER JOIN tb_picture b ON a.gallery_id=b.gallery_id WHERE a.gallery_id='$id ' AND a.gallery_status = '1' ORDER BY b.picture_id ASC";
			//echo $sql;
			$row = row_array($sql);
		?>
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
                                              <div class="page-title" style="font-size: 20px;"><?php echo $row['gallery_name'];?></div>
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
                        <div class="card-body">

                          <section class="gallery-block grid-gallery">
                            <div class="mb-1">
                                <div class="row g-3">
								<?php
									$sqlGal = "SELECT * FROM tb_gallery a INNER JOIN tb_picture b ON a.gallery_id=b.gallery_id WHERE a.gallery_id='$id ' AND a.gallery_status = '1' ORDER BY b.picture_id ASC";
									//echo $sqlGal;
									$rowGal = result_array($sqlGal);

									foreach ($rowGal as $key => $_itemGal){ 
								?>

                                    <div class="col-md-4 item">
                                        <a class="lightbox" href="../uploads/gallery/<?php echo $_itemGal['gallery_folder'];?>/<?php echo $_itemGal['picture_name'];?>">
                                            <img class="img-fluid image scale-on-hover" src="../uploads/gallery/<?php echo $_itemGal['gallery_folder'];?>/<?php echo $_itemGal['picture_name'];?>">
                                        </a>
                                    </div>

								<?php } ?>

                                </div>
                            </div>
                          </section>

                        <div>
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

<!--js code-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../dist/img/gallery/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.grid-gallery', { animation: 'slideIn'});
    </script>
<!--js code end-->

   