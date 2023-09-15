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
                      <img src="dist/img/slides/<?php echo $rowSli['slide_image']; ?>" alt="<?php echo $rowSli['slide_topic']; ?>" style="width: 100%; height: 400px;">
                    </div>
					<?php 
						} else {
					?>
                    <div class="carousel-item">
                      <img src="dist/img/slides/<?php echo $rowSli['slide_image']; ?>" alt="<?php echo $rowSli['slide_topic']; ?>" style="width: 100%; height: 400px;">
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
                  <div class="col-md-6">
                    <div class="form-imagecheck mb-2">             
                      <span class="form-imagecheck">
                        <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-image">
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-imagecheck mb-2">             
                      <span class="form-imagecheck">
                        <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-image">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-imagecheck mb-2">             
                      <span class="form-imagecheck">
                        <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-image">
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-imagecheck mb-2">             
                      <span class="form-imagecheck">
                        <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-image">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-imagecheck mb-2">             
                      <span class="form-imagecheck">
                        <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-image">
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-imagecheck mb-2">             
                      <span class="form-imagecheck" onclick="location.href='/?modules=gallery_all'">
                        <img src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg" alt="Beautiful blonde woman relaxing with a can of coke on a tree stump by the beach" class="form-image">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">              
                  <div class="col-md-12">
					<a class="card card-link" onclick="location.href='/languagecenter/?modules=gallery_all'">
						<div class="card-body card card-link card-link-pop btn-secondary" style="background-color: #FF9933;">รูปทั้งหมด</div>
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
              <div class="col-md-2">
                <a href="#" class="card card-link">
                  <div class="card-body" style="background-color: #FF9933;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4 4h6v6h-6z"></path>
                      <path d="M14 4h6v6h-6z"></path>
                      <path d="M4 14h6v6h-6z"></path>
                      <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    </svg> 
                  test01
                  </div>
                </a>
              </div>
              <div class="col-md-2">
                <a href="#" class="card card-link">
                  <div class="card-body" style="background-color: #FF9933;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                      <path d="M3.6 9h16.8"></path>
                      <path d="M3.6 15h16.8"></path>
                      <path d="M11.5 3a17 17 0 0 0 0 18"></path>
                      <path d="M12.5 3a17 17 0 0 1 0 18"></path>
                    </svg>  
                  test02
                  </div>
                </a>
              </div>
              <div class="col-md-2">
                <a href="#" class="card card-link">
                  <div class="card-body" style="background-color: #FF9933;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin-rupee" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                      <path d="M15 8h-6h1a3 3 0 0 1 0 6h-1l3 3"></path>
                      <path d="M9 11h6"></path>
                    </svg>
                  test03
                  </div>
                </a>
              </div>
              <div class="col-md-2">
                <a href="#" class="card card-link">
                  <div class="card-body" style="background-color: #FF9933;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                      <path d="M16 5l3 3"></path>
                      <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                    </svg>
                  test04
                  </div>
                </a>
              </div>
              <div class="col-md-2">
                <a href="#" class="card card-link">
                  <div class="card-body" style="background-color: #FF9933;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                      <path d="M16 5l3 3"></path>
                      <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                    </svg>
                  test05
                  </div>
                </a>
              </div>
              <div class="col-md-2">
                <a href="#" class="card card-link">
                  <div class="card-body" style="background-color: #FF9933;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z"></path>
                      <path d="M16 5l3 3"></path>
                      <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6"></path>
                    </svg>
                  test06
                  </div>
                </a>
              </div>

            </div>
            <div>&nbsp;</div>


            <div class="row row-deck row-cards">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">test01</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="subheader">test02</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>&nbsp;</div>

            <div class="row row-deck row-cards">
              <div class="col-md-3">
                <div class="card">
                  <iframe style="width: 100%; height: 115px;" 
                          src="https://www.youtube.com/embed/culwztQvugw?si=JKRFlEP3gaX0_ZCy" 
                          title="YouTube video player" 
                          frameborder="0" 
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                          allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <iframe style="width: 100%; height: 115px;" 
                          src="https://www.youtube.com/embed/CmFWe9fG-xo?si=IWd4DG98sz7U7cWL" 
                          title="YouTube video player" 
                          frameborder="0" 
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                          allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <iframe style="width: 100%; height: 115px;" 
                          src="https://www.youtube.com/embed/Jo8Km-wQdjs?si=hgowMMGRJG7Xh6u2" 
                          title="YouTube video player" 
                          frameborder="0" 
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                          allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <iframe style="width: 100%; height: 115px;" 
                          src="https://www.youtube.com/embed/4VCQKFrmrp8?si=k26Z2yN2S8hCqGxN" 
                          title="YouTube video player" 
                          frameborder="0" 
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                          allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div>&nbsp;</div>

            <div class="row row-deck row-cards">
              <div class="col-md-12">      
                <div class="page-header d-print-none">
                  <div class="container-xl">
                    <h2 class="page-title" >
                      Contact Us
                    </h2>
                  </div>
                </div>
              </div>
            </div>
            <div>&nbsp;</div>

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
                  <div class="col-md-12">xxx</div>
                  <div class="col-md-12">xxx</div>
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
                  <div class="col-md-12">xxx</div>
                  <div class="col-md-12">xxx</div>
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
                  <div class="col-md-12">xxx</div>
                  <div class="col-md-12">xxx</div>
                </div>
              </div>
            </div>
            <div>&nbsp;</div>

            <div class="row row-deck row-cards">
              <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3777.2224185350324!2d98.96518697519828!3d18.788238682358024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30da3a7de79258eb%3A0xc3ba2271c3e95576!2sWat%20Suan%20Dok!5e0!3m2!1sen!2sth!4v1693584464849!5m2!1sen!2sth" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
          </div>
        </div>
<!-- Page body end-->

<!--footer-->
        <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row row-deck row-cards">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-3">
                    <img src="dist/img/logo.png" width="80" height="80" alt="Tabler" class="" style="float: right;">
                  </div>
                  <div class="col-md-9">
                    <div class="row">
                      <div class="col-md-12">xxxxxxxxxx</div>
                      <div class="col-md-12">xxxxxxxxxx</div>
                      <div class="col-md-12">xxxxxxxxxx</div>
                      <div class="col-md-12">xxxxxxxxxx</div>
                    </div>
                  </div>                
                </div>
              </div>
              <div class="col-md-6">

              </div>
            </div>
          </div>
        </footer>
<!--footer end-->
      </div>