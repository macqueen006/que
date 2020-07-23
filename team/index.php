<?php
require_once('../functions/init.php');
require_once('includes/header.php');
require_once('includes/topnav.php');
require_once('includes/sidenav.php');

if(logged_in()) {
    $loginID = $_SESSION['loginID'];
    $query = " SELECT * FROM users WHERE username='$loginID' OR user_phone='$loginID' OR user_email='$loginID' ";
    $result = Query($query);

    if ($row = fetch_data($result)) {
        $Username = $row['username'];
    }
}else{
    redirect("login.php");
}
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-12 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye" aria-hidden="true"></i>
					</div>
                    <?php
                        $query = " SELECT * FROM quiz50 WHERE creator='$Username' ";
                        $result = Query($query);
                        confirm($result);
                        $QuestionCount1 = row_count($result);

                        $query = " SELECT * FROM quiz100 WHERE creator='$Username' ";
                        $result = Query($query);
                        confirm($result);
                        $QuestionCount2 = row_count($result);

                        $query = " SELECT * FROM quiz150 WHERE creator='$Username' ";
                        $result = Query($query);
                        confirm($result);
                        $QuestionCount3 = row_count($result);

                        $query = " SELECT * FROM quiz200 WHERE creator='$Username' ";
                        $result = Query($query);
                        confirm($result);
                        $QuestionCount4 = row_count($result);
                    ?>
					<div class="col-md-8 market-update-left">
						<h4 class="text-center">Total Uploaded Questions</h4>
                        <h3 class="text-center"><?php
                                if($QuestionCount1 + $QuestionCount2 + $QuestionCount3 + $QuestionCount4 == 0){
                                    echo '0';
                                }else{
                                    echo number_format(round($QuestionCount1 + $QuestionCount2 + $QuestionCount3 + $QuestionCount4,2));
                                }
                            ?></h3>
						<p class="text-center">Other hand, we denounce</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Plan</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		<!-- //calendar -->
		<div class="col-md-6 w3agile-notifications">
			<div class="notifications">
				<!--notification start-->
				
					<header class="panel-heading">
						Notification 
					</header>
					<div class="notify-w3ls">
						<div class="alert alert-info clearfix">
							<span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
									<li class="pull-right notification-time">1 min ago</li>
								</ul>
								<p>
									Urgent meeting for next proposal
								</p>
							</div>
						</div>
						<div class="alert alert-danger">
							<span class="alert-icon"><i class="fa fa-facebook"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> mentioned you in a post </li>
									<li class="pull-right notification-time">7 Hours Ago</li>
								</ul>
								<p>
									Very cool photo jack
								</p>
							</div>
						</div>
						<div class="alert alert-success ">
							<span class="alert-icon"><i class="fa fa-comments-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender">You have 5 message unread</li>
									<li class="pull-right notification-time">1 min ago</li>
								</ul>
								<p>
									<a href="#">Anjelina Mewlo, Jack Flip</a> and <a href="#">3 others</a>
								</p>
							</div>
						</div>
						<div class="alert alert-warning ">
							<span class="alert-icon"><i class="fa fa-bell-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead</li>
									<li class="pull-right notification-time">5 Days Ago</li>
								</ul>
								<p>
									Next 5 July Thursday is the last day
								</p>
							</div>
						</div>
						<div class="alert alert-info clearfix">
							<span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
									<li class="pull-right notification-time">1 min ago</li>
								</ul>
								<p>
									Urgent meeting for next proposal
								</p>
							</div>
						</div>
						
					</div>
				
				<!--notification end-->
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
</section>
<?php require_once('includes/footer.php'); ?>