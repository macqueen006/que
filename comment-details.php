<?php require_once('includes/header.php'); ?>

<?php require_once('includes/nav.php'); ?>

<!--=================================
=            Single Blog            =
==================================-->

<?php 

	if(isset($_GET['view']))
	{
		$Id = clean($_GET['view']);
        $LoginID = $_SESSION['loginID'];

        $query = " SELECT * FROM users WHERE username='$LoginID' or user_email='$LoginID' or user_phone='$LoginID' ";
        $result = Query($query);
        confirm($result);

        if($row = fetch_data($result))
        {
            $Username = $row['username'];
            $Firstname = $row['user_firstname'];
            $Lastname = $row['user_lastname'];
            $UserImage = $row['user_image'];
        }

		$query = " SELECT * FROM comments WHERE id=$Id ";
		$result = Query($query);
        confirm($result);
        
        if($rows = fetch_data($result))
        {
            $PostId = $rows['post_id'];

            $query = " SELECT * FROM forum WHERE id=$PostId ";
            $post = Query($query);
            confirm($post);

            if($row = fetch_data($post))
            {
                $Title = $row['title'];
                $Author = $row['author'];
                $Content = $row['content']; 
                $Date = $row['date'];
                $Status = $row['status'];
                $Image = $row['image'];
            }
        }
        else
        {
            redirect("404.php");
        }

		if(isset($Username))
		{
			$sql = " SELECT * FROM views WHERE post_id=$Id AND author='$Username' ";
			$check = Query($sql);
			confirm($check);

			if(!fetch_data($check))
			{
				$query = " INSERT INTO views(post_id,author,date) VALUES($Id,'$Username',now()) ";
				$insert = Query($query);
				confirm($insert);

				$query = " UPDATE forum SET view_count=view_count+1 WHERE id=$Id ";
				$view = Query($query);
				confirm($view);
			}
			else
			{
				$sqlquery = " UPDATE views SET date=now() WHERE post_id=$Id ";
				$update = Query($sqlquery);
				confirm($update);
			}
		}
    }
    else if(isset($_GET['reply']))
	{
		$Id = clean($_GET['reply']);
		$user = $_SESSION['loginID'];

		$query = " SELECT * FROM comments WHERE id=$Id ";
		$result = Query($query);
        confirm($result);
        
        if($rows = fetch_data($result))
        {
            $PostId = $rows['post_id'];

            $query = " SELECT * FROM forum WHERE id=$PostId ";
            $post = Query($query);
            confirm($post);

            if($row = fetch_data($post))
            {
                $Title = $row['title'];
                $Author = $row['author'];
                $Content = $row['content']; 
                $Date = $row['date'];
                $Status = $row['status'];
                $Image = $row['image'];
            }
        }
        else
        {
            redirect("404.php");
        }

		if(isset($_SESSION['loginID']))
		{
			$sql = " SELECT * FROM views WHERE post_id=$Id AND author='".$user."' ";
			$check = Query($sql);
			confirm($check);

			if(!fetch_data($check))
			{
				$sqlquery = " INSERT INTO views(post_id,author,date) VALUES($Id,'".$user."',now()) ";
				$insert = Query($sqlquery);
				confirm($insert);

				$query = " UPDATE forum SET view_count=view_count+1 WHERE id=$Id ";
				$view = Query($query);
				confirm($view);
			}
			else
			{
				$sqlquery = " UPDATE views SET date=now() WHERE post_id=$Id ";
				$update = Query($sqlquery);
				confirm($update);
			}
		}
    }
    else if(isset($_GET['replyTag']))
	{
		$Id = clean($_GET['replyTag']);
		$user = $_SESSION['loginID'];

		$query = " SELECT * FROM comment_tags WHERE id=$Id ";
		$result = Query($query);
        confirm($result);
        
        if($rows = fetch_data($result))
        {
            $PostId = $rows['post_id'];
            $CommentId = $rows['comment_id'];
            $DbTagId = $rows['tag_id'];

            $query = " SELECT * FROM forum WHERE id=$PostId ";
            $post = Query($query);
            confirm($post);

            if($row = fetch_data($post))
            {
                $Title = $row['title'];
                $Author = $row['author'];
                $Content = $row['content']; 
                $Date = $row['date'];
                $Status = $row['status'];
                $Image = $row['image'];
            }
        }
        else
        {
            redirect("404.php");
        }

		if(isset($_SESSION['loginID']))
		{
			$sql = " SELECT * FROM views WHERE post_id=$Id AND author='".$user."' ";
			$check = Query($sql);
			confirm($check);

			if(!fetch_data($check))
			{
				$sqlquery = " INSERT INTO views(post_id,author,date) VALUES($Id,'".$user."',now()) ";
				$insert = Query($sqlquery);
				confirm($insert);

				$query = " UPDATE forum SET view_count=view_count+1 WHERE id=$Id ";
				$view = Query($query);
				confirm($view);
			}
			else
			{
				$sqlquery = " UPDATE views SET date=now() WHERE post_id=$Id ";
				$update = Query($sqlquery);
				confirm($update);
			}
		}
	}

?>
<section class="blog single-blog section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<?php if($Status == 'published') { ?>
				<article class="single-post">
					<h3><?php echo $Title; ?></h3>
					<ul class="list-inline">
						<li class="list-inline-item">by <a href=""><?php echo $Author; ?></a></li>
						<li class="list-inline-item"><?php print date("r", strtotime($Date)); ?></li>
					</ul>
					<img src="images/forum/<?php echo $Image; ?>" alt="article-01">
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
					<?php

                        if(isset($_GET['reply']))
                        {
                            $query = " SELECT * FROM comments WHERE id=$Id ";
                            $result = Query($query);
                            confirm($result);

                            while($row = fetch_data($result))
                            {
                                $PostId = $row['post_id'];
                                $Author = $row['author'];
                                $Content = $row['content'];
                                $Date = $row['date'];

                                $sql = " SELECT * FROM users WHERE username='$Author' ";
                                $check = Query($sql);
                                confirm($check);

                                if($rows = fetch_data($check))
                                {
                                    $comfirst = $rows['user_firstname'];
                                    $comlast = $rows['user_lastname'];
                                    $comImg = $rows['user_image'];
                                    $comUse = $rows['username'];
                                }

					?>
                    <h4>Replies to <?php echo $Author; ?></h4>
					<div class="form-group mb-30">
                        <?php

                            if(isset($_GET['view']))
                            {

                        ?>
                        <a href="comment-details.php?reply=<?php echo $Id; ?>" class="float-right"> Reply </a>
                            <?php } ?>
						<img src="images/user/<?php echo $comImg; ?>" class="media-object" style="width:45px">
						<span> <?php echo $comfirst . ' ' . $comlast; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<p><?php echo $Content; ?></p>
					</div>
                    <?php 
                    
                        }
                        
                        $tagquery = " SELECT * FROM comment_tags WHERE comment_id=$Id ";
                        $tag = Query($tagquery);
                        confirm($tag);

                        while($row = fetch_data($tag))
                        {
                            $TagId = $row['id'];
                            $TagPostId = $row['post_id'];
                            $TagCommentId = $row['comment_id'];
                            $TagAuthor = $row['author'];
                            $TagContent = $row['content'];
                            $TagDate = $row['date'];

                            $sql = " SELECT * FROM users WHERE username='$TagAuthor' ";
							$check = Query($sql);
							confirm($check);

							if($rows = fetch_data($check))
							{
								$TagFirst = $rows['user_firstname'];
								$TagLast = $rows['user_lastname'];
                                $TagImg = $rows['user_image'];
                                $TagUse = $rows['username'];
							}

                    ?>
                    <div class="form-group mb-30">
                        <?php

                            if(isset($_GET['view']) || isset($_GET['reply']))
                            {

                        ?>
                        <a href="comment-details.php?replyTag=<?php echo $TagId; ?>" class="float-right"> Reply </a>
                            <?php } ?>
						<img src="images/user/<?php echo $TagImg; ?>" class="media-object" style="width:45px">
						<span> <?php echo $TagFirst . ' ' . $TagLast; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<p><?php echo $TagContent; ?></p>
					</div>
                    <?php

                            }
                        }
                        else if(isset($_GET['replyTag'])) {
                            $query = " SELECT * FROM comments WHERE id=$CommentId ";
                            $result = Query($query);
                            confirm($result);

                            while($row = fetch_data($result))
                            {
                                $PostId = $row['post_id'];
                                $Author = $row['author'];
                                $Content = $row['content'];
                                $Date = $row['date'];

                                $sql = " SELECT * FROM users WHERE username='$Author' ";
                                $check = Query($sql);
                                confirm($check);

                                if($rows = fetch_data($check))
                                {
                                    $comfirst = $rows['user_firstname'];
                                    $comlast = $rows['user_lastname'];
                                    $comImg = $rows['user_image'];
                                    $comUse = $rows['username'];
                                }

                    ?>
                    <div class="form-group mb-30">
                        <?php

                            if(isset($_GET['view']))
                            {

                        ?>
                        <a href="comment-details.php?reply=<?php echo $Id; ?>" class="float-right"> Reply </a>
                            <?php } ?>
						<img src="images/user/<?php echo $comImg; ?>" class="media-object" style="width:45px">
						<span> <?php echo $comfirst . ' ' . $comlast; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<p><?php echo $Content; ?></p>
					</div>
                    <?php 
                    
                        }
                        
                        $tagquery = " SELECT * FROM comment_tags WHERE comment_id=$CommentId ";
                        $tag = Query($tagquery);
                        confirm($tag);

                        while($row = fetch_data($tag))
                        {
                            $TagId = $row['id'];
                            $TagPostId = $row['post_id'];
                            $TagCommentId = $row['comment_id'];
                            $TagAuthor = $row['author'];
                            $TagContent = $row['content'];
                            $TagDate = $row['date'];

                            $sql = " SELECT * FROM users WHERE username='$TagAuthor' ";
                            $check = Query($sql);
                            confirm($check);

                            if($rows = fetch_data($check))
                            {
                                $TagFirst = $rows['user_firstname'];
                                $TagLast = $rows['user_lastname'];
                                $TagImg = $rows['user_image'];
                                $TagUse = $rows['username'];
                            }

                    ?>
                    <div class="form-group mb-30">
                        <?php

                            if(isset($_GET['view']) || isset($_GET['replyTag']))
                            {
                                if($TagId !== $Id)
                                {

                        ?>
                        <a href="comment-details.php?replyTag=<?php echo $TagId; ?>" class="float-right"> Reply </a>
                            <?php } } ?>
						<img src="images/user/<?php echo $TagImg; ?>" class="media-object" style="width:45px">
						<span> <?php echo $TagFirst . ' ' . $TagLast; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<p><?php echo $TagContent; ?></p>
					</div>
                    <?php
                            }

                        }

                        if(isset($_GET['reply']))
                        {
                            $sqlquery = " SELECT * FROM comments WHERE id=$Id ";
                            $show = Query($sqlquery);
                            confirm($show);

                            if(!fetch_data($show))
                            {

					?>
					<div class="form-group mb-30">
						<p>No Comments Yet! Be the First To Comment?</p>
					</div>
                    <?php 
                    
                            }
                        }
                        else if(isset($_GET['replyTag']))
                        {
                            $sqlquery = " SELECT * FROM comments WHERE id=$CommentId ";
                            $show = Query($sqlquery);
                            confirm($show);

                            if(!fetch_data($show))
                            {

                    ?>
                    <div class="form-group mb-30">
						<p>No Comments Yet! Be the First To Comment?</p>
                    </div>
                    <?php } } ?>    
				</div>
				<?php

					if(logged_in())
					{
                        if(isset($_SESSION['loginID']) && isset($_GET['reply']))
						{
							$LoginID = $_SESSION['loginID'];

							$query = " SELECT * FROM users WHERE username='$LoginID' or user_email='$LoginID' or user_phone='$LoginID' ";
							$result = Query($query);
							confirm($result);

							if($row = fetch_data($result))
							{
								$Username = $row['username'];
								$Firstname = $row['user_firstname'];
								$Lastname = $row['user_lastname'];
								$UserImage = $row['user_image'];
                            }
                            
                ?>
                <div class="block comment">
					<h4>Reply to <?php echo $comfirst; ?></h4>
					<p><?php reply_comment(); ?></p>
					<form method="POST">
						<!-- Message -->
						<div class="form-group mb-30">
						<img src="images/user/<?php echo $UserImage; ?>" class="media-object" style="width:45px">
						<span> <?php echo $Firstname . ' ' . $Lastname; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<br>
						<br>
						    <label for="message">Message</label>
							<textarea class="form-control" id="message" name="content" rows="8">@<?php echo $comUse; ?> </textarea>
							<input type="hidden" name="username" value="<?php echo $Username; ?>">
						</div>
						<button type="submit" class="btn btn-transparent">Leave Comment</button>
					</form>
				</div>
                <?php

                        }
                        else if(isset($_SESSION['loginID']) && isset($_GET['replyTag']))
                        {
                            $LoginID = $_SESSION['loginID'];

							$query = " SELECT * FROM users WHERE username='$LoginID' or user_email='$LoginID' or user_phone='$LoginID' ";
							$result = Query($query);
							confirm($result);

							if($row = fetch_data($result))
							{
								$Username = $row['username'];
								$Firstname = $row['user_firstname'];
								$Lastname = $row['user_lastname'];
								$UserImage = $row['user_image'];
                            }

                ?>
                <div class="block comment">
                    <h4>Reply to <?php
                    
                        $sql = " SELECT * FROM comment_tags WHERE id=$Id ";
                        $TagQuery = Query($sql);
                        confirm($TagQuery);

                        if($TagRow = fetch_data($TagQuery))
                        {
                            $TaggedUser = $TagRow['author'];

                            $query = " SELECT * FROM users WHERE username='$TaggedUser' ";
                            $check = Query($query);
                            confirm($check);

                            if($rows = fetch_data($check))
                            {
                                $TaggedFirst = $rows['user_firstname'];

                                echo $TaggedFirst;
                            }
                        }
                    
                    ?></h4>
					<p><?php reply_comment(); ?></p>
					<form method="POST">
						<!-- Message -->
						<div class="form-group mb-30">
						<img src="images/user/<?php echo $UserImage; ?>" class="media-object" style="width:45px">
						<span> <?php echo $Firstname . ' ' . $Lastname; ?> <small><i>Posted on February 19, 2016</i></small></span>
						<br>
						<br>
						    <label for="message">Message</label>
							<textarea class="form-control" id="message" name="content" rows="8">@<?php echo $TaggedUser; ?> </textarea>
                            <input type="hidden" name="username" value="<?php echo $Username; ?>">
                            <input type="hidden" name="comment_id" value="<?php echo $CommentId; ?>">
						</div>
						<button type="submit" class="btn btn-transparent">Leave Comment</button>
					</form>
				</div>
                <?php

                        }
                    }
					else
					{
					
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

<?php require_once('includes/footer.php'); ?>