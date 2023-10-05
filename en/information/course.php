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
                                                <div class="page-title" style="font-size: 20px;">All courses</div>
                                              </div>
                                            </div>

                                            <div class="col-md-6" align="right">
											<form name="keyword" action="?modules=course" method="post">
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

											  $perpage = 6;

											  if (isset($_GET['page'])) {
												$page = $_GET['page'];
											  } else {
												$page = 1;
											  }

											  $start = ($page - 1) * $perpage;

											  $sql = "SELECT * FROM tb_course WHERE (course_name LIKE '%$keyword%' OR course_name_en LIKE '%$keyword%' OR course_name_cn LIKE '%$keyword%') AND course_status = '1' ORDER BY course_id DESC LIMIT {$start} , {$perpage}";
											  //echo $sql;
											  $row = result_array($sql);

											  foreach ($row as $key => $_item){ 

												$sqlCouD = "SELECT * FROM tb_course_detail WHERE course_id = '{$_item['course_id']}' AND course_detail_status ='1' ORDER BY course_detail_id DESC";
												$rowCouD = row_array($sqlCouD);
										?>

                                            <div class="col-md-4">
                                                <div class="card card-sm alogn-items-center">
												<?php
														if ($rowCouD['course_detail_image'] == "") {
														?>
															<a href="?modules=register&id=<?php echo $_item['course_id'];?>" class="d-block">
															<img src="../uploads/course/no-image-icon-0.jpg" alt="<?php echo $_item['course_name'];?>" class="card-img-top" style='width:400px;height:500px;'></a>

														<?php
														} else {
														?>
															<a href="?modules=register&id=<?php echo $_item['course_id'];?>" class="d-block">
															<img src="../uploads/course/<?php echo $rowCouD['course_detail_image'];?>" alt="<?php echo $_item['course_name'];?>" class="card-img-top" style='width:400px;height:500px;'></a>

														<?php
														}
														?>
                                                    
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center">
                                                            <div><?php echo $_item['course_name'];?></div>
                                                        </div><br>
                                                        <div class="row g-2">
                                                            <center><input type="image" name="image_<?php echo $_item['course_id'];?>" id="image_<?php echo $_item['course_id'];?>" src="../dist/img/register_course.png" border="0" style="width:200px; height:50px;" onclick="location.href='?modules=register&id=<?php echo $_item['course_id'];?>'"></center>                                 
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

										<?php
										  }

										  $sqlPage = "SELECT * , COUNT(course_id) AS COUNT FROM tb_course WHERE (course_name LIKE '%$keyword%' OR course_name_en LIKE '%$keyword%' OR course_name_cn LIKE '%$keyword%') AND course_status = '1' ORDER BY course_id";
										  $rowPage = row_array($sqlPage);
										  $total_record = $rowPage['COUNT'];
										  $total_page = ceil($total_record / $perpage);

										  ?>

										  <div class="col-md-12">
											<nav>
											<ul class="pagination ">
											  <li class="page-item disabled">
												<a class="page-link" href="?modules=course&keyword=<?php echo $keyword; ?>&page=1" tabindex="-1" aria-disabled="true">
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
												  <li class="page-item <?php echo $active; ?>"><a class="page-link" href="?modules=course&keyword=<?php echo $keyword; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
												<?php } ?>

											  <li class="page-item">
												<a class="page-link" href="?modules=course&keyword=<?php echo $keyword; ?>&page=<?php echo $total_page; ?>">
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

   