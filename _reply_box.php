<div class="container-fluid">
	<!-- Bảng edit text -->
	<form id="reply_form" method="post" action="do_insert.php" charset="utf-8">
		<input type="hidden" name="mod" value="reply">
		<input type="hidden" name="post_id" value="<?=$post_id?>">
		<input type="hidden" name="username" value="<?=(isset($_SESSION['session_username']) ? $_SESSION['session_username'] : '')?>">
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
			<textarea id="content_data" name="content" style="display:none;"></textarea>
			<div class="row" style="margin-top:10px;">
				<div class="col-xs-3 col-xs-offset-3">
					<div class="form-group">
						<button data-func="clear" class="btn btn-warning btn-block" type="button">Tẩy Trắng</button>
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<button data-func="save" class="btn btn-success btn-block" type="submit">Đăng phản hồi</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script>
	$(document).ready(function(){
		$('.editor').html('');
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
		$('.editor').html('');
	 
		$('button[data-func="save"]').click(function(){
			$content = $('.editor').html();
			//localStorage.setItem("wysiwyg", $content);
			$('.editor').append('<span class="saved"><i class="fa fa-check"></i></span>').fadeIn(function(){
				$(this).find('.saved').fadeOut(500);
			});
			$("#content_data").html($content);
			$("#reply_form").submit();
		});
	 
		$('button[data-func="clear"]').click(function(){
		$('.editor').html('');
		//localStorage.removeItem("wysiwyg");
		}); 
	} 
	</script>
</div>
	<!-- !Bảng edit text -->
	<!-- /MAIN -->