<?php 

	require_once('functions/init.php');

$query = " SELECT * FROM tickets ";
$result = Query($query);
confirm($result);

while($row = fetch_data($result))
{
    $Id = $row['id'];
    $Date = $row['date'];

    $createdDate = strtotime($Date);
    $oneWeek = strtotime('-1 week');

    if ($createdDate < $oneWeek) {
        // Delete Ticket AFter one week no use...
        $query = " DELETE FROM tickets WHERE id=$Id ";
        $result = Query($query);
        confirm($result);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QuestionMark Technologies</title>
  
  <!-- FAVICON -->
  <link href="images/ico.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Validate CSS -->
  <link href="css/validate.css" rel="stylesheet">
    <!-- Time Circles -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/TimeCircles.js"></script>
    <link rel="stylesheet" type="text/css" href="css/TimeCircles.css">

    <style>
        input[type=email]:focus
        {
            border: none;
            border-bottom: 1px solid gray;
            background: transparent;
        }
        .jumbotron:hover
        {
                background-color: #062c33;
            color: white;
        }
    </style>

</head>

<body class="body-wrapper">
	 <!-- Page Preloder -->
	 <div id="preloder">
			<div class="loader"></div>
		</div>