<?php

    include("../../config/connect.ini.php");
    include("../../config/fnc.php");

    $Date=date("Y-m-d");
    $DateTime=date("Y-m-d H:i:s");
    $Dateimg=date("YmdHis");

    $text_key=filter_input(INPUT_POST,'text_key');


 ?>                                                        
                                                         <div class="table-responsive">
                                                               
                                                               <table class="table table-bordered">
                                                                   <thead>
                                                                       <tr>
																				<th><div>ลำดับ (No.)</div></th>
                                                                                <th><div>รายการ (List)</div></th>
                                                                                <th><div>ประเภท (Type)</div></th>
                                                                                <th><div>ไฟล์ (File)</div></th>
                                                                       </tr>
                                                                   </thead>
                                                                   <tbody>
<?php
   $request_Sql="SELECT * FROM tb_document a INNER JOIN tb_document_category b ON a.document_category_id=b.document_category_id WHERE document_topic LIKE '%{$text_key}%' OR document_topic_en LIKE '%{$text_key}%' AND a.document_status='1' ORDER BY a.document_topic ASC";
   $request_Rs=result_array($request_Sql);
   $requset_count=0;
   foreach($request_Rs as $key=>$request_Row){ 
       $requset_count=$requset_count+1;
       $document_name=$request_Row["document_topic"];
	   $document_category_name=$request_Row["document_category_name"];

       ?>

                                                                       <tr>
                                                                           <td><div><?php echo $requset_count;?></div></td>

                                                                           <td><div><?php echo $document_name;?></div></td>
                                                                           
                                                                           <td><div><?php echo $document_category_name;?></div></td>

                                                                           <td>
																																								
																					<?php
																					if ($request_Row['document_file'] == "") {

																					} else {
																					?>
																						<a href="uploads/document/<?php echo $request_Row['document_file']; ?>" target="_blank"><span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
																						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
																						   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
																						   <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
																						   <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
																						   <path d="M9 15l2 2l4 -4"></path>
																						</svg>
																					  </span></a>

																					<?php
																					}
																					?>
                                                                                    
                                                                                    
                                                                            </td>
                                                                       </tr>
<?php   } ?>


                                                                   </tbody>
                                                           </table>

                                                         </div>