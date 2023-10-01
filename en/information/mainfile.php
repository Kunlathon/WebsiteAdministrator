      <div class="page-wrapper">
        <!-- Page header -->

        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col-md-9">
				<!--Create a Carousel-->
                <div id="demo" class="carousel slide" data-ride="carousel">
                  <ul class="carousel-indicators">
				  <?php
                    $sqlSli = "SELECT * FROM tb_slide WHERE slide_status='1' ORDER BY slide_id DESC LIMIT 10";
                    $listSli = result_array($sqlSli);

					$i = 0;

                    foreach ($listSli as $key => $rowSli) {
						if ($i==0){
                   ?>
                    <li data-target="#demo" data-slide-to="<?php echo $i; ?>" class="active"></li>
					<?php 
						} else {
					?>
                    <li data-target="#demo" data-slide-to="<?php echo $i; ?>"></li>

					<?php 
						}
					$i++;
					} 
					?>


                  </ul>

                  <div class="carousel-inner">
				   <?php

					$i = 0;

                    foreach ($listSli as $key => $rowSli) {
						if ($i==0){
                   ?>
                    <div class="carousel-item active">
                      <img src="../uploads/slides/<?php echo $rowSli['slide_image']; ?>" alt="<?php echo $rowSli['slide_topic']; ?>" style="width: 100%; height: 400px;">
                    </div>
					<?php 
						} else {
					?>
                    <div class="carousel-item">
                      <img src="../uploads/slides/<?php echo $rowSli['slide_image']; ?>" alt="<?php echo $rowSli['slide_topic']; ?>" style="width: 100%; height: 400px;">
                    </div>
				
                    <?php 
						}
					$i++;
					} 
					?>

                  </div>
                  <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                  </a>
                  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                  </a>
                </div>
				<!--Create a Carousel End-->
              </div>

              <div class="col-md-3">

                <div class="row">

			<?php
				$sqlGal = "SELECT * FROM tb_gallery WHERE gallery_status='1' ORDER BY gallery_id DESC LIMIT 6";
                $listGal = result_array($sqlGal);

                foreach ($listGal as $key => $rowGal) {
            ?>

                  <div class="col-md-6">
                    <div class="form-imagecheck mb-2">             
                      <span class="form-imagecheck" onclick="location.href='?modules=gallery_image&id=<?php echo $rowGal['gallery_id'];?>'">
                        <img src="../uploads/gallery/<?php echo $rowGal['gallery_folder'];?>/<?php echo $rowGal['gallery_thumbnail'];?>" alt="<?php echo $rowGal['gallery_name'];?>" class="form-image" title="<?php echo $rowGal['gallery_name'];?>">
                      </span>
                    </div>
                  </div>
  
			<?php 
				} 
			?>

                </div>    

                <div class="row">              
                  <div class="col-md-12">
					<a class="card card-link" href="?modules=gallery_all">
						<div class="card-body card card-link card-link-pop btn-secondary" style="background-color: #FF9933;">Album</div>
					</a>
                  </div>
                </div>
              </div>
            <div>
          </div>

        </div>

<!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

			<div class="row row-deck row-cards">    

              <div class="col-md-12">      
                <div class="page-header d-print-none">
                  <div class="container-xl">
                    <h2 class="page-title" >
                      <a href="?modules=teacher">Teacher</a>
                    </h2>
                  </div>
                </div>
              </div>    

             <?php
				$sqlTea = "SELECT * FROM tb_teacher WHERE teacher_status='1' ORDER BY RAND() LIMIT 6";
                $listTea = result_array($sqlTea);

                foreach ($listTea as $key => $rowTea) {
            ?>


              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
						<a href="../uploads/teacher/<?php echo $rowTea['teacher_file'];?>" class="d-block" target="_blank">
						<img src="../uploads/teacher/<?php echo $rowTea['teacher_picture'];?>" alt="<?php echo $rowTea['teacher_name'];?>" class="card-img-top"></a>
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div><?php echo $rowTea['teacher_name'];?></div>
                            </div>
						</div>
                  </div>
                </div>
              </div>


  
			<?php 
				} 
			?>


            </div>

            <div class="row row-deck row-cards">
			
              <div class="col-md-12">      
                <div class="page-header d-print-none">
                  <div class="container-xl">
                    <h2 class="page-title" >
                      <a href="?modules=videos">Videos</a>
                    </h2>
                  </div>
                </div>
              </div>

			<?php
				$sqlVid = "SELECT * FROM tb_videos WHERE videos_status='1' ORDER BY videos_id DESC LIMIT 4";
                $listVid = result_array($sqlVid);

                foreach ($listVid as $key => $rowVid) {
            ?>
			
              <div class="col-md-3">
                <div class="embed-responsive embed-responsive-16by9">
                  <?php echo $rowVid['videos_youtube']; ?>
                </div>
              </div>
  
			<?php 
				} 
			?>

            </div>

            <div class="row row-deck row-cards">
              <div class="col-md-12">      
                <div class="page-header d-print-none">
                  <div class="container-xl">
                    <h2 class="page-title" >
                     <a href="?modules=contactus">Contact Us</a>
                    </h2>
                  </div>
                </div>
              </div>
            </div>

            <div class="row row-deck row-cards">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone-call" width="128" height="128" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                      <path d="M15 7a2 2 0 0 1 2 2"></path>
                      <path d="M15 3a6 6 0 0 1 6 6"></path>
                    </svg>
                  </div>
                  <div>&nbsp;</div>
                  <div class="col-md-12">Tel : 053 278967, Ext. 210</div>
                  <div class="col-md-12">Mobile : 0902748585</div>
                  <div class="col-md-12">Line : 0902748585</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-pin" width="128" height="128" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                      <path d="M12.783 21.326a2 2 0 0 1 -2.196 -.426l-4.244 -4.243a8 8 0 1 1 13.657 -5.62"></path>
                      <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z"></path>
                      <path d="M19 18v.01"></path>
                    </svg>
                  </div>
                  <div>&nbsp;</div>
                  <div class="col-md-12">Mahachulalongkornrajavidyalaya University Chiang Mai Campus 139 SuThep Road, Muang District, Chiang Mai, Thailand, 50200</div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="128" height="128" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                      <path d="M3.6 9h16.8"></path>
                      <path d="M3.6 15h16.8"></path>
                      <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                      <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                    </svg>
                  </div>
                  <div>&nbsp;</div>
                  <div class="col-md-12">Website :</div>
                  <div class="col-md-12">Email : languagemcu123@gmail.com</div>
                </div>
              </div>
            </div>
            <div>&nbsp;</div>

            <div class="row row-deck row-cards">
              <div class="col-md-12">
				<?php
                    $sqlMap = "SELECT * FROM tb_information WHERE information_id='7' AND information_status='1'";
                    $rowMap= row_array($sqlMap);
				
					echo $rowMap['information_detail'];
				?>
                
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

      </div>