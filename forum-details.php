<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<!--=================================
=            Single Blog            =
==================================-->

<?php 

	if(isset($_GET['post'])){
		$Id = clean($_GET['post']);
        $username = $_SESSION['loginID'];

        $query = " SELECT * FROM users WHERE username='".$username."' OR user_phone='".$username."' OR user_email='".$username."' ";
        $result = Query($query);

        if($row = fetch_data($result)){
            $dbUsername = $row['username'];
            $Firstname = $row['user_firstname'];
            $Lastname = $row['user_lastname'];
            $UserImage = $row['user_image'];
        }

		$query = " SELECT * FROM forum WHERE id=$Id ";
		$result = Query($query);
		confirm($result);

		if($row = fetch_data($result)){
			$Title = $row['title'];
			$Author = $row['author'];
			$Content = $row['content'];
			$Date = $row['date'];
			$Status = $row['status'];
			$Image = $row['image'];
		}
		else{
			redirect("404.php");
		}

		if(isset($dbUsername)){
			$sql = " SELECT * FROM views WHERE post_id=$Id AND author='$dbUsername' ";
			$check = Query($sql);
			confirm($check);

			if(!fetch_data($check))
			{
				$query = " INSERT INTO views(post_id,author,date) VALUES($Id,'$dbUsername',now()) ";
				$insert = Query($query);
				confirm($insert);

				$query = " UPDATE forum SET view_count=view_count+1 WHERE id=$Id ";
				$view = Query($query);
				confirm($view);
			}
			else
			{
				$query = " UPDATE views SET date=now() WHERE post_id=$Id ";
				$update = Query($query);
				confirm($update);
			}
		}
	}else{
	    redirect("404.php");
    }

?>
<section class="blog single-blog section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<?php if($Status == 'published'){ ?>
				<article class="single-post">
					<h3><?php echo $Title; ?></h3>
					<ul class="list-inline">
						<li class="list-inline-item">by <a href=""><?php echo $Author; ?></a></li>
						<li class="list-inline-item"><?php date_format1($Date); ?></li>
					</ul>
					<img src="images/forum/<?php echo $Image; ?>" alt="article-01">
                    <center>
                        <div>
                    <?php
                        $query = " SELECT * FROM likes WHERE post_id=$Id AND author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        if(!fetch_data($result)){
                            echo '<button type="button" id="LikeBtn" onclick="like_post('.$Id.');" class="btn btn-outline-danger rounded-circle" style="width:70px;padding:20px;height:70px;"><i class="fa fa-heart-o" id="LikeIcon"></i></button>';
                            echo '<button type="button" id="LikedBtn" class="btn btn-danger rounded-circle" style="width:70px;padding:20px;height:70px;display:none;"><i class="fa fa-heart-o" id="LikedIcon"></i></button>';
                        }else{
                            echo '<button type="button" class="btn btn-danger rounded-circle" style="width:70px;padding:20px;height:70px;"><i class="fa fa-heart-o" id="LikedIcon"></i></button>';
                        }

                        $query = " SELECT like_count FROM forum WHERE id=$Id ";
                        $result = Query($query);
                        confirm($result);

                        if($row = fetch_data($result)){
                            echo '<br><span id="LikeTxt">'.number_format($row['like_count']).'</span> LIKES';
                        }
                    ?>
                        <hr>
                    </div></center>
					<p><?php echo $Content; ?></p> 
					<ul class="social-circle-icons list-inline">
				  		<li class="list-inline-item text-center"><a class="fa fa-facebook" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-twitter" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-google-plus" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-pinterest-p" href=""></a></li>
				  		<li class="list-inline-item text-center"><a class="fa fa-linkedin" href=""></a></li>
				  	</ul>
				</article>
				<?php } ?>
				<div class="block comment">
					<h4>Comments</h4>
					<?php
						$query = " SELECT * FROM comments WHERE post_id=$Id ";
						$result = Query($query);
						confirm($result);

						while($row = fetch_data($result)){
							$comId = $row['id'];
							$PostId = $row['post_id'];
							$Author = $row['author'];
							$Content = substr($row['content'], 0,200);
							$Date = $row['date'];

							$sql = " SELECT * FROM users WHERE username='$Author' ";
							$check = Query($sql);
							confirm($check);

							while($rows = fetch_data($check)){
								$comfirst = $rows['user_firstname'];
								$comlast = $rows['user_lastname'];
								$comImg = $rows['user_image'];
							}
					?>
					<div class="form-group mb-30">
						<span class="float-right">
							<a href="comment-details.php?reply=<?php echo $comId; ?>"> Reply </a>
							<?php

								if($Content > 200){
							?>
							<a href="comment-details.php?view=<?php echo $comId; ?>"> view more </a>
                            <?php } ?>
						</span>
						<img src="images/user/<?php echo $comImg; ?>" class="media-object" style="width:45px">
						<span> <?php echo $comfirst . ' ' . $comlast; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<p><?php echo $Content; ?></p>
					</div>
					<?php 
						}
						$query = " SELECT * FROM comments WHERE post_id=$Id ";
						$show = Query($query);
						confirm($show);

						if(!fetch_data($show)){
					?>
					<div class="form-group mb-30">
						<p>No Comments Yet! Be the First To Comment?</p>
					</div>
					<?php } ?>
				</div>
				<?php

					if(logged_in()){

				?>
				<div class="block comment">
					<h4>Leave A Comment</h4>
					<p><?php add_comment(); ?></p>
					<form method="POST">
						<!-- Message -->
						<div class="form-group mb-30">
						<img src="images/user/<?php echo $UserImage; ?>" class="media-object" style="width:45px">
						<span> <?php echo $Firstname . ' ' . $Lastname; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<br>
						<br>
						    <label for="message">Message</label>
							<textarea class="form-control" id="message" name="content" rows="8"></textarea>
							<input type="hidden" name="username" value="<?php echo $dbUsername; ?>">
						</div>
						<button type="submit" class="btn btn-transparent">Leave Comment</button>
					</form>
				</div>
				<?php
					}else{
				?>
				<div class="block comment">
					<h4>Leave A Comment</h4>
						<p> Not Logged In Yet... You Have To Login First To Comment on <b><a href="forum-details.php?post=<?php echo $Id; ?>"><?php echo $Title; ?></a></b> </p>
						<a href="login.php?post=<?php echo $Id; ?>"><button class="btn btn-transparent">Login</button></a>
				</div>
					<?php } ?>
			</div>
			<?php require_once('includes/forum-widget.php'); ?>
		</div>
	</div>
</section>

    <script type="text/javascript">
        function like_post(Id) {
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    <?php
                        $query = " SELECT * FROM likes WHERE post_id=$Id AND author='$dbUsername' ";
                        $result = Query($query);
                        confirm($result);

                        if(!fetch_data($result)){
//                            $query = " SELECT like_count FROM forum WHERE id=$Id ";
//                            $result = Query($query);
//                            confirm($result);
//
//                            if($row = fetch_data($result)){
//                                ?>
                    document.getElementById('LikeBtn').style.display = "none";
                    document.getElementById('LikedBtn').style.display = "inherit";
                                document.getElementById('LikeTxt').innerHTML = parseInt(document.getElementById('LikeTxt').innerHTML)+parseInt(1);
<!--                                --><?php
//                            }
//                            ?>

                            <?php
                        }
                    ?>
                }
            };
            xmlhttp.open("GET","forajax/like_post.php?postId=" + Id,true);
            xmlhttp.send(null);
        }
    </script>

<?php require_once('includes/footer.php'); ?>