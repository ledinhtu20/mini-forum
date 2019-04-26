<?php
	if (!isset($_GET['result'])) {
		die("CHÀO BẠN!");
	} else {
		$message = isset($_GET["message"]) ? $_GET["message"] : "";
		if ($_GET['result'] == "success") {
			$title = "Thao tác thành công";
			$image = "./images/good_quality_96px.png";
		} else if ($_GET['result'] == "failed") {
			$title = "Thao tác thất bại";
			$image = "./images/poor_quality_96px.png";
		} else if ($_GET['result'] == "warning") {
			$title = "Cảnh báo";
			$image = "./images/behavior_blocker_96px.png";
			$message = "Bạn không được phép thực hiện thao tác này!";
		} else if ($_GET['result'] == "blocked") {
			$title = "Chú ý";
			$image = "./images/warning_shield_96px.png";
			$message = "Bạn đang trong thời gian khóa tài khoản!";
		}
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>MjniForum </title>
		<script type="text/javascript" src="./js/jquery.min.js"></script>
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/bootstrap-theme.min.css">
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<br>
			  <div class="col-xs-6 col-xs-6 col-xs-offset-3">
				 <div class="thumbnail">
					<a href="index.php"><img src="<?=$image?>" alt="..."></a>
					<div class="caption">
						<h3 class="text text-center"><?=$title?></h3>
						<p class="text text-center"><?=$message?></p>
					</div>
				 </div>
			  </div>
			</div>
		</div>
	</body>
</html>
