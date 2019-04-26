<?php
	header('Content-Type: text/html; charset=utf-8');
	include("_config.php");
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>TXTForum-ĐìnhTư-HoàngThông</title>
		<script type="text/javascript" src="./js/jquery.min.js"></script>
		<!--
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js'></script>
		<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
		-->
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link rel="stylesheet" href="./css/bootstrap-theme.min.css">
		<script type="text/javascript" src="./js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="./css/texteditor.css" />
		<link rel="stylesheet" href="./css/font-awesome.css" />
		
		<style>
		body {background: url("images/background-pattern.png") repeat;}
		.square-box{position:relative;width:75px;heigh:75px;overflow:hidden}
		.small {width:60px;heigh:60px;}
		em.small {font-size:12px;}
		.square-box:before{content:"";display:block;padding-top:100%}
		.square-content{position:absolute;top:0;left:0;bottom:0;right:0}
		.square-content div{display:table;width:100%;height:100%}
		.square-content span {display:table-cell;text-align:center;vertical-align:middle;font-weight:700;font-size:25px}
		.media:hover {background-color:#fafafa; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.05) inset, 0px 0px 5px rgba(82, 168, 236, 0.6);}
		</style>
	</head>
	<body>
	<!-- HEADER, included from _header.php -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<img src="images/top-banner.png" width="100%" height="auto" alt="ảnh đầu trang">
			</div>
		</div>
		<div class="row" style="margin: 10px;">
			<div class="col-sm-7 col-sm-offset-5">
				<?php 
					if (isset($_SESSION['session_username'])): 
				?>
					<div style="float:right;">
						<span>Chào <a href="user_panel.php"><b><?=$_SESSION['session_full_name'] ?></b></a></span>
						<?=($_SESSION['session_level'] < LEVEL_MODERATOR ? '<a target="_blank" href="admincp/" class="btn btn-info">AdminCP</a>': '')?>
						&nbsp;<a href="do_logout.php" class="btn btn-danger"><span>Đăng xuất</span></a>
					</div>
				<?php 
					// nếu chưa đăng nhập thì hiển thị form đăng nhập
					else: 
				?>
					<!-- FORM ĐĂNG NHẬP -->
					<form class="form-inline" method="post" action="do_login.php">
						<div class="form-group">
							<label class="sr-only" for="username">Tài khoản</label>
							<input type="text" class="form-control" name="username" placeholder="Tài khoản">
						</div>
						<div class="form-group">
							<label class="sr-only" for="password">Mật khẩu</label>
							<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block">Đăng nhập</button>
						</div>
						<div class="form-group">
							<a type="button" href="register_member.php" class="btn btn-info btn-block">Đăng kí</a>
						</div>
					</form>
					<!-- /FORM ĐĂNG NHẬP -->
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- /HEADER-->