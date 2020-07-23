<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>Q-FORUM</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!--==================================
=            Forum Section            =
===================================-->

<section class="blog section">
	<div class="container">
		<div class="row">
            <?php
                if(isset($_GET['CatId'])){
                    $CatId = clean($_GET['CatId']);
            ?>
            <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">

                <?php

                $per_page = 10;

                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                else
                {
                    $page = 1;
                }

                if($per_page == '' || $page == 1)
                {
                    $page_1 = 0;
                }
                else
                {
                    $page_1 = ($page * $per_page) - $per_page;
                }

                $query = "SELECT * FROM forum WHERE status='published' AND category_id=$CatId ORDER BY id DESC ";
                $result = Query($query);
                confirm($result);
                $count = row_count($result);

                $count = ceil($count / $per_page);

                $sql = "SELECT * FROM forum WHERE status='published' AND category_id=$CatId ORDER BY id DESC LIMIT $page_1, $per_page ";
                $check = Query($sql);
                confirm($check);

                while($row = fetch_data($check)) {
                    $Id = $row['id'];
                    $Title = $row['title'];
                    $Author = $row['author'];
                    $Date = $row['date'];
                    $Image = $row['image'];
                    $Content = substr($row['content'], 0,220);
                    $Status = $row['status'];
                    $View_Count = $row['view_count'];
                    $Comment_Count = $row['comment_count'];
                    $Like_count = $row['like_count'];

                    if($Status == 'published') {

                        $query = " SELECT * FROM comment_tags WHERE post_id=$Id ";
                        $Tags = Query($query);
                        confirm($Tags);
                        $countTag = row_count($Tags);

                        $comment = ($Comment_Count + $countTag);

                        ?>

                        <!-- Article 01 -->
                        <article>
                            <!-- Post Image -->
                            <div class="image">
                                <img src="images/forum/<?php echo $Image; ?>" alt="article-01">
                            </div>
                            <!-- Post Title -->
                            <h3><?php echo $Title; ?></h3>
                            <ul class="list-inline">
                                <li class="list-inline-item">by <b><a href="about-us.php"><?php echo $Author; ?></a></b></li>
                                <li class="list-inline-item">Posted on <b><?php date_format1($Date); ?></b></li>
                            </ul>
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-thumbs-up"></i> <b><?php

                                        if($Like_count == 0)
                                        {
                                            echo ' No Likes Yet!';
                                        }
                                        else if($Like_count == 1)
                                        {
                                            echo $Like_count . ' Like';
                                        }
                                        else if($Like_count > 1)
                                        {
                                            echo $Like_count . ' Likes';
                                        }

                                        ?></b></li>
                                <li class="list-inline-item"><i class="fa fa-eye"></i> <b><?php

                                        if($View_Count == 0)
                                        {
                                            echo ' No Views Yet!';
                                        }
                                        else if($View_Count == 1)
                                        {
                                            echo $View_Count . ' view';
                                        }
                                        else if($View_Count > 1)
                                        {
                                            echo $View_Count . ' views';
                                        }

                                        ?></b></li>
                                <li class="list-inline-item"><i class="fa fa-comments"></i><b><a href="forum-details.php?post=<?php echo $Id; ?>"><?php

                                            if($comment == 0)
                                            {
                                                echo ' No Comments Yet!';
                                            }
                                            else if($comment == 1)
                                            {
                                                echo $comment . ' comment';
                                            }
                                            else if($comment > 1)
                                            {
                                                echo $comment . ' comments';
                                            }

                                            ?></a></b></li>
                            </ul>
                            <!-- Post Description -->
                            <p class=""><?php echo $Content; ?>...</p>
                            <!-- Read more button -->
                            <?php
                            if(logged_in() == true){
                                echo '<a href="forum-details.php?post='.$Id.'" class="btn btn-transparent">Read More</a>';
                            }else{
                                echo '<a href="login.php?post='.$Id.'" class="btn btn-transparent">Read More</a>';
                            }
                            ?>
                        </article>

                    <?php } }
                    if(!fetch_data($result)){
                        ?>
                        <script type="text/javascript">
                            alert('Error! No Post(s) Under Selected Category, Please Try Another Category.');
                            window.location.href="forum.php";
                        </script>
                        <?php
                    } ?>
                <!-- pagination -->
                <div class="pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if($page > 1){
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="forum.php?page=<?php echo $page-1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                            }

                            for($i =1; $i <= $count; $i++)
                            {
                                if($i == $page){
                                    echo "<li class='page-item active'><a class='page-link' href='forum.php?page={$i}'>{$i}</a></li>";
                                }else{
                                    echo "<li><a class='page-link' href='forum.php?page={$i}'>{$i}</a></li>";
                                }
                            }

                            if($i>$page_1){
                                if($count){
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="forum.php?page=<?php echo $page+1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                <?php } } ?>
                        </ul>
                    </nav>
                </div>
                <!-- pagination -->
            </div>
            <?php
                    }else{
            ?>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">

				<?php 
								
					$per_page = 10;

					if(isset($_GET['page']))
					{
						$page = $_GET['page'];
					}
					else
					{
						$page = 1;
					}

					if($per_page == '' || $page == 1)
					{
						$page_1 = 0;
					}
					else
					{
						$page_1 = ($page * $per_page) - $per_page;
					}
					
					$query = "SELECT * FROM forum WHERE status='published' ORDER BY id DESC ";
					$result = Query($query);
					$count = row_count($result);

					$count = ceil($count / $per_page);

					$sql = "SELECT * FROM forum WHERE status='published' ORDER BY id DESC LIMIT $page_1, $per_page ";
					$check = Query($sql);
					confirm($check);

					while($row = fetch_data($check)) {
						$Id = $row['id'];
						$Title = $row['title'];
						$Author = $row['author'];
						$Date = $row['date'];
						$Image = $row['image'];
						$Content = substr($row['content'], 0,220);
						$Status = $row['status'];
						$View_Count = $row['view_count'];
						$Comment_Count = $row['comment_count'];
                        $Like_count = $row['like_count'];

                        if($Status == 'published') {
                            $query = " SELECT * FROM comment_tags WHERE post_id=$Id ";
                            $Tags = Query($query);
                            confirm($Tags);
                            $countTag = row_count($Tags);

                            $comment = ($Comment_Count + $countTag);

				?>

				<!-- Article 01 -->
				<article>
					<!-- Post Image -->
					<div class="image">
						<img src="images/forum/<?php echo $Image; ?>" alt="article-01">
					</div>
					<!-- Post Title -->
					<h3><?php echo $Title; ?></h3>
					<ul class="list-inline">
						<li class="list-inline-item">by <b><a href="about-us.php"><?php echo $Author; ?></a></b></li>
						<li class="list-inline-item">Posted on <b><?php date_format1($Date); ?></b></li>
					</ul>
					<ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-heart"></i> <b><?php

                            if($Like_count == 0)
                            {
                                echo ' No Likes Yet!';
                            }
                            else if($Like_count == 1)
                            {
                                echo $Like_count . ' Like';
                            }
                            else if($Like_count > 1)
                            {
                                echo $Like_count . ' Likes';
                            }

                        ?></b></li>
						<li class="list-inline-item"><i class="fa fa-eye"></i> <b><?php
						
							if($View_Count == 0)
							{
								echo ' No Views Yet!';
							}
							else if($View_Count == 1)
							{
								echo $View_Count . ' view';
							}
							else if($View_Count > 1)
							{
								echo $View_Count . ' views';
							}
								
						?></b></li>
						<li class="list-inline-item"><i class="fa fa-comments"></i><b><a href="forum-details.php?post=<?php echo $Id; ?>"><?php
						
							if($comment == 0)
							{
								echo ' No Comments Yet!';
							}
							else if($comment == 1)
							{
								echo $comment . ' comment';
							}
							else if($comment > 1)
							{
								echo $comment . ' comments';
							}
						
						?></a></b></li>
					</ul>
					<!-- Post Description -->
					<p class=""><?php echo $Content; ?>...</p>
					<!-- Read more button -->
                    <?php
                        if(logged_in() == true){
                            echo '<a href="forum-details.php?post='.$Id.'" class="btn btn-transparent">Read More</a>';
                        }else{
                            echo '<a href="login.php?post='.$Id.'" class="btn btn-transparent">Read More</a>';
                        }
                    ?>
				</article>

                <?php } }
                if(!fetch_data($result)){
                    ?>
                    <script type="text/javascript">
                        alert('Error! No Post(s) Currently, Please Check Again Later.');
                        window.location.href="index.php";
                    </script>
                    <?php
                }?>
                <!-- pagination -->
                <div class="pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if($page > 1){
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="forum.php?page=<?php echo $page-1; ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?php
                            }

                            for($i =1; $i <= $count; $i++)
                            {
                                if($i == $page){
                                    echo "<li class='page-item active'><a class='page-link' href='forum.php?page={$i}'>{$i}</a></li>";
                                }else{
                                    echo "<li><a class='page-link' href='forum.php?page={$i}'>{$i}</a></li>";
                                }
                            }

                            if($i>$page_1){
                                if($count){
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="forum.php?page=<?php echo $page+1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                <?php } } ?>
                        </ul>
                    </nav>
                </div>
                <!-- pagination -->
			</div>
			<?php } require_once('includes/forum-widget.php'); ?>
		</div>
	</div>
</section>

<?php require_once('includes/footer.php'); ?>