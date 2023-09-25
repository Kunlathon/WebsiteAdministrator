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
		    $keyword = isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : '';
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
                                            <div class="col-md-6">
                                              <div class="row g-2">
                                                <div class="page-title" style="font-size: 20px;">ข่าวประชาสัมพันธ์ทั้งหมด</div>
                                              </div>
                                            </div>

                                            <div class="col-md-6" align="right">
											<form name="keyword" action="?modules=news_public" method="post">
                                              <div class="row g-2">											  
                                                <div class="col">
                                                  <input type="text" name="keyword" id="" class="form-control" placeholder="Search for…">											
                                                </div>
                                                <div class="col-auto">
                                                  <button type="submit" name="" id="" class="btn btn-icon" aria-label="Button" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                                                  </button>
                                                </div>			

                                              </div>
											  </form>
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
                                    <div class="row g-5 alogn-items-center">
                                        
                                        <div class="row row-cards alogn-items-center">

										 <?php

											  $perpage = 9;

											  if (isset($_GET['page'])) {
												$page = $_GET['page'];
											  } else {
												$page = 1;
											  }

											  $start = ($page - 1) * $perpage;

											  $sql = "SELECT * FROM tb_news WHERE (news_topic LIKE '%$keyword%' OR news_topic_en LIKE '%$keyword%' OR news_topic_cn LIKE '%$keyword%') AND news_category_id = '2' AND news_status = '1' ORDER BY news_id DESC LIMIT {$start} , {$perpage}";
											  //echo $sql;
											  $row = result_array($sql);

											  foreach ($row as $key => $_item){ 
										?>

                                            <div class="col-md-4">
                                                <div class="card card-sm alogn-items-center">
                                                    <a href="?modules=news_detail&id=<?php echo $_item['news_id'];?>" class="d-block">
													<img src="uploads/news/<?php echo $_item['news_image0'];?>" alt="<?php echo $_item['news_topic'];?>" class="card-img-top"></a>
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div><?php echo $_item['news_topic'];?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

										<?php
										  }

										  $sqlPage = "SELECT * , COUNT(news_id) AS COUNT FROM tb_news WHERE (news_topic LIKE '%$keyword%' OR news_topic_en LIKE '%$keyword%' OR news_topic_cn LIKE '%$keyword%') AND news_category_id = '2' AND news_status = '1' ORDER BY news_id";
										  $rowPage = row_array($sqlPage);
										  $total_record = $rowPage['COUNT'];
										  $total_page = ceil($total_record / $perpage);

										  ?>

										  <div class="col-md-12">
											<nav>
											<ul class="pagination ">
											  <li class="page-item disabled">
												<a class="page-link" href="?modules=news_public&keyword=<?php echo $keyword; ?>&page=1" tabindex="-1" aria-disabled="true">
												  <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
												  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
												  prev
												</a>
											  </li>
											  <?php
												for ($i = 1; $i <= $total_page; $i++) {

												  if ($i == $page) {
													$active = "active";
												  } else {
													$active = "";
												  }

												?>
												  <li class="page-item <?php echo $active; ?>"><a class="page-link" href="?modules=news_public&keyword=<?php echo $keyword; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
												<?php } ?>

											  <li class="page-item">
												<a class="page-link" href="?modules=news_public&keyword=<?php echo $keyword; ?>&page=<?php echo $total_page; ?>">
												  next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
												  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
												</a>
											  </li>
											</ul>

											</nav>
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
