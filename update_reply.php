<?php
	header('Content-Type: text/html; charset=utf-8');
	// FINISHED
	session_start();
	include('_func.php');
	$reply_id;
	if (isset($_GET['reply_id'])) {
		$reply_id = (int) $_GET['reply_id'];
		if ($reply_id <= 0 || !isset($_SESSION['session_username']) || $_SESSION['session_is_blocked']== TRUE) {
			die ('Sai mã số bài viết, hoặc chưa đăng nhập, hoặc đã bị khóa nick!'); // BÙM!
		}
	} else {
		die ('Bạn chưa nhập mã số phản hồi!'); // BÙM!
	}
	// Các thông tin cơ bản
	$username; $reply_content;
	// Đã lấy được mã số và kiểm đa sơ sơ ban đầu, tiếp tục kiểm tra xem có phải hàng chính chủ hay không
	$select_reply = "select replies.*, full_name from replies,users where reply_id = $reply_id and replies.username=users.username";
	$result_select_reply = mysql_query($select_reply, $connection);
	if ($result_select_reply) {
		if ($row_reply = mysql_fetch_array($result_select_reply)) {
			$username = $row_reply['username'];
			// Tiếp tục kiểm tra xem có phải hàng chính chủ hay không
			if ($_SESSION['session_level'] >= LEVEL_MEMBER && $username != $_SESSION['session_username']) {
				die('Bạn không có quyền sửa bài viết này!');
			}
			$reply_content = $row_reply['content'];
		}
	}
	//echo $username .';;;'. $reply_content;
?>
<html>
<head>
<title>TXTForum</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<!-- Optional theme -->
<link rel="stylesheet" href="./css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="./css/texteditor.css" />
<link rel="stylesheet" href="./css/font-awesome.css" />
<!-- Latest compiled and minified JavaScript -->
<script src="./js/jquery-1.12.3.min.js"></script>
</head>
<body>
<!-- MAIN,  content for home page -->
<div class="container-fluid">
<!-- Bảng edit text -->
<form id="update_form" method="post" action="do_update.php" charset="utf-8">
<input type="hidden" name="mod" value="reply">
<input type="hidden" name="reply_id" value="<?=$reply_id?>">
<div class="newPost">
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
					<option value="Georgia">Georgia</option>
					<option value="Palatino Linotype">Palatino Linotype</option>
					<option value="Times New Roman">Times New Roman</option>
				</optgroup>
				<optgroup label="Phông chân phương">
					<option value="Arial">Arial</option>
					<option value="Arial Black">Arial Black</option>
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
	<textarea id="content_data" name="new_reply_content" style="display:none;"></textarea>
	<div class="row" style="margin-top:10px;">
				<div class="col-xs-3 col-xs-offset-3">
					<div class="form-group">
						<button data-func="clear" class="btn btn-warning btn-block" type="button">Tẩy Trắng</button>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<button data-func="save" class="btn btn-success btn-block" type="submit">Cập nhật</button>
					</div>
				</div>
			</div>
</div>
</form>
<script>
$(document).ready(function(){
   $('.editor').html('<?=$reply_content?>');
	
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
	//$('.editor').html('<?=$reply_content?>');
 
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