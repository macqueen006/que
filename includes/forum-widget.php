<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- Search Widget -->
					<div class="widget search p-0">
                        <form action="forum_search.php">
                            <div class="input-group">
                                <input type="text" class="form-control" id="expire" name="search" placeholder="Search...">
                                <button type="submit" class="input-group-addon"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
					</div>
					<!-- Category Widget -->
					<div class="widget category">
						<!-- Widget Header -->
						<h5 class="widget-header">Categories</h5>
						<ul class="category-list">
							<?php 

								$query = " SELECT * FROM categories ";
								$result = Query($query);
								confirm($result);

								while($row = fetch_data($result))
								{
									$cat_id = $row['cat_id'];
									$cat_title = $row['cat_title'];

							?>
							<li><a href="forum.php?CatId=<?php echo $cat_id; ?>"><?php echo $cat_title; ?> <span class="float-right"><?php
							
								$sql = " SELECT * FROM forum WHERE category_id=$cat_id ";
								$check = Query($sql);
								$count = row_count($check);

								if($count >= 1)
								{
									echo '(' . $count . ')';
								}
								
							?></span></a></li>
								<?php } ?>
						</ul>
					</div>
					<!-- Archive Widget -->
					<div class="widget archive">
						<!-- Widget Header -->
						<h5 class="widget-header">Archives</h5>
						<ul class="archive-list">
							<li><a href="">January 2017</a></li>
							<li><a href="">February 2017</a></li>
							<li><a href="">March 2017</a></li>
							<li><a href="">April 2017</a></li>
							<li><a href="">May 2017</a></li>
						</ul>
					</div>
				</div>
			</div>