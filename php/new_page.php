<?php
include_once("dbconfig.php");
?>
<div class="timetable">
             
              <div class="news-panel">
                <div class="panel">
                  <div class="news-heading">
                    <h2>News</h2>
                  </div>
                  <div class="panel-body1">
                   <?php 
			        $query = "SELECT * FROM presb_new ORDER BY new_id DESC";       
					$records_per_page=2;
					$newquery = $paginate->paging($query,$records_per_page);
					$paginate->dataview($newquery);
					$paginate->paginglink($query,$records_per_page);		
					?>
                   
                  </div>
                </div>
              </div>
            </div>