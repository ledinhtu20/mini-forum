<?php
	header('Content-Type: text/html; charset=utf-8');
	// FINISHED
	session_start();
	include('_func.php');
	$post_id;
	if (isset($_GET['post_id'])) {
		$post_id = (int) $_GET['post_id'];
		if ($post_id <= 0 || !isset($_SESSION['session_username']) || $_SESSION['session_is_blocked']== TRUE) {
			//die ('Sai mã số bài viết, hoặc chưa đăng nhập, hoặc đã bị khóa nick!'); // BÙM!
			header('location: exit.php?result=failed');
		}
	} else {
		//die ('Bạn chưa nhập mã số bài viết!'); // BÙM!
		header('location: exit.php?result=failed');
	}
	// Các thông tin cơ bản
	$poster; $post_title; $post_content; $icon_name;
	// Đã lấy được mã số và kiểm đa sơ sơ ban đầu, tiếp tục kiểm tra xem có phải hàng chính chủ hay không
	$select_post = "select posts.*, full_name from posts,users where post_id = $post_id and posts.username=users.username";
	$result_select_post = mysql_query($select_post, $connection);
	if ($result_select_post) {
		if ($row_post = mysql_fetch_array($result_select_post)) {
			$poster = $row_post['username'];
			// Tiếp tục kiểm tra xem có phải hàng chính chủ hay không
			if ($_SESSION['session_level'] >= LEVEL_MEMBER && $poster != $_SESSION['session_username']) {
				//die('Bạn không có quyền sửa bài viết này!');
				header('location: exit.php?result=failed');
			}
			$post_title = $row_post['post_title'];
			$post_content = $row_post['post_content'];
			$icon_name = $row_post['icon_name'];
		}
	}
?>
<html>
<head>
<title>TXTForum</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="css/texteditor.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery-1.12.3.min.js"></script>
</head>
<body>
<!-- MAIN,  content for home page -->
<div class="container-fluid">
<!-- Bảng edit text -->
<form id="update_form" method="post" action="do_update.php" charset="utf-8">
<input type="hidden" name="mod" value="post">
<input type="hidden" name="post_id" value="<?=$post_id?>">
<input type="hidden" name="poster" value="<?=$poster?>">
<div class="newPost">
	<script type="text/javascript">
		$(function() {
				 $("#icon_name").val('<?=$icon_name?>');
				 $("#selected_icon").html('<span class="glyphicon glyphicon-<?=$icon_name?>"></span>');
				 document.getElementById("selected_icon").style.fontSize = "25px";
			});
		window.onload = function() {
			var eSelect = document.getElementById("icon_name");
			eSelect.onchange = function() {
				var name = eSelect.options[eSelect.selectedIndex].value;
				document.getElementById("selected_icon").style.fontSize = "25px";
				document.getElementById("selected_icon").innerHTML = '<span class="glyphicon glyphicon-' + name + '"></span>';
			}
		}
	</script>
	<div class="row">
			<div class="col-xs-1">
				<div class="form-group">
					<label class="control-label" id="selected_icon">Chọn biểu tượng cho bài viết</label>
				</div>
			</div>
			<div class="col-xs-5">
				<div class="form-group">
					<select class="form-control" id="icon_name" name="icon_name">
						<?=get_icon_names($connection)?>'
					</select>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="form-group">
					<button data-func="clear" class="btn btn-warning btn-block" type="button">Tẩy Trắng</button>
				</div>
			</div>
			<div class="col-xs-3">
				<div class="form-group">
					<button data-func="save"  class="btn btn-success btn-block" type="submit">Cập nhật</button>
				</div>
			</div>
	</div>
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Tiêu đề" name="new_post_title" value="<?=$post_title?>">
	</div>
	<div class="toolbar">
		<button type="button" data-func="bold"><i class="fa fa-bold"></i></button>
		<button type="button" data-func="italic"><i class="fa fa-italic"></i></button>
		<button type="button" data-func="underline"><i class="fa fa-underline"></i></button>
		<button type="button" data-func="justifyleft"><i class="fa fa-align-left"></i></button>
		<button type="button" data-func="justifycenter"><i class="fa fa-align-center"></i></button>
		<button type="button" data-func="justifyright"><i class="fa fa-align-right"></i></button>
		<button type="button" data-func="insertunorderedlist"><i class="fa fa-list-ul"></i></button>
		<button type="button" data-func="insertorderedlist"><i class="fa fa-list-ol"></i></button>
		<div class="customSelect">
			<select data-func="fontname">
				<optgroup label="Phông có chân">
					<option value="Bree Serif">Bree Serif</option>
					<option value="Georgia">Georgia</option>
					<option value="Palatino Linotype">Palatino Linotype</option>
					<option value="Times New Roman">Times New Roman</option>
				</optgroup>
				<optgroup label="Phông chân phương">
					<option value="Arial">Arial</option>
					<option value="Arial Black">Arial Black</option>
					<option value="Asap">Asap</option>
					<option value="Comic Sans MS">Comic Sans MS</option>
					<option value="Impact">Impact</option>
					<option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
					<option value="Tahoma" selected>Tahoma</option>
					<option value="Trebuchet MS">Trebuchet MS</option>
					<option value="Verdana">Verdana</option>
				</optgroup>
				<optgroup label="Phông đơn cách">
					<option value="Courier New">Courier New</option>
					<option value="Lucida Console">Lucida Console</option>
				</optgroup>
			</select>
		</div>
		<div class="customSelect">
			<select data-func="formatblock">
			  <option value="h1">Tiêu đề 1</option>
			  <option value="h2">Tiêu đề 2</option>
			  <option value="h4">Tiêu đề phụ</option>
			  <option value="p" selected>Đoạn văn</option>
			</select>
		</div>
	</div>
	<!-- Chỉnh tùm lum ở đây-->
	<div class="editor" contenteditable></div>
	<!-- Sau đó được đẩy qua đây và lên form -->
	<textarea id="content_data" name="new_post_content" style="display:none;"></textarea>
</div>
</form>
<script>
$(document).ready(function(){
   $('.editor').html('<?=$post_content?>');
	
});

$('.newPost button[data-func]').click(function(){
	document.execCommand( $(this).data('func'), false 	);
});

$('.newPost select[data-func]').change(function(){
	var $value = $(this).find(':selected').val();
	document.execCommand( $(this).data('func'), false, $value);
});

if(typeof(Storage) !== "undefined") {
	$('.editor').keypress(function(){
		$(this).find('.saved').detach();
	});
 
	//$('.editor').html(localStorage.getItem("wysiwyg")) ;
	$('.editor').html('<?=$post_content?>');
 
	$('button[data-func="save"]').click(function(){
		$content = $('.editor').html();
		//localStorage.setItem("wysiwyg", $content);
		$('.editor').append('<span class="saved"><i class="fa fa-check"></i></span>').fadeIn(function(){
			$(this).find('.saved').fadeOut(500);
		});
		$("#content_data").html($content);
		$("#update_form").submit();
	});
 
	$('button[data-func="clear"]').click(function(){
	$('.editor').html('');
	//localStorage.removeItem("wysiwyg");
	}); 
} 
</script>
<!-- !Bảng edit text -->
<!-- /MAIN -->
<div>
</body>
</html>