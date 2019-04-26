<?php
	// MOST FINISHED
	include('_header.php');
	include('_func.php');
	$post_id;
	$page = 1;
	if (isset($_GET['post_id'])) {
		$post_id = (int) $_GET['post_id'];
		if (isset($_GET['page'])) {
			$page = (int) $_GET['page'];
		}
		if ($post_id <= 0 || $page <= 0) {
			header("location: index.php"); // Quay về trang chủ nếu không nhập đúng số
		}
	} else {
		header("location: index.php"); 
	}
?>
<!-- MAIN,  content for VIEW_TOPIC.PHP : AUTHOR: NguyenBaAnh -->
<div class="container">
	<?php	
		$select_post = "select posts.*, full_name, avatar_url from posts,users where post_id = $post_id and posts.username=users.username";
		$result_select_post = mysql_query($select_post, $connection);
		if ($result_select_post) {
			if ($row_post = mysql_fetch_array($result_select_post)) {
				// BREADCRUMBs ===================================================
				echo '<ol class="breadcrumb"><li><a href="index.php">Trang chủ</a></li>' .get_topic_breadcrumbs($connection, $row_post['topic_id']) . '</ol>';
				
				//POST ===================================================
				$is_verified = $row_post['is_verified'];
				if (!$is_verified && !isset($_SESSION['session_username'])) { // chưa đăng nhập
					header("location: exit.php?result=warning"); // nhảy
				}
				if (!$is_verified && isset($_SESSION['session_level']) && $_SESSION['session_level'] >= LEVEL_MEMBER) {
					// cố dấm ăn xôi...
					if (isset($_SESSION['session_username']) && $_SESSION['session_username'] != $row_post['username']) {
						// log lại để cảnh cáo hoặc...
						header("location: exit.php?result=warning"); // nhảy
					}
				}
				$panel_type = "success";
				$verify_button = "";
				$remove_button = "";
				if (!$is_verified) {
					$panel_type = "danger";
					$verify_button = '<div class="col-xs-2"><a href="do_update.php?mod=verifying&post_id=' .$post_id. '" type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-ok-sign"></span> Chấp nhận</a></div> <div class="col-xs-8"><strong class="text text-danger">BÀI VIẾT CHƯA ĐƯỢC XÉT DUYỆT</strong>, các thành viên khác sẽ không thể nhìn thấy bài viết này</div>';
				}
				// Tiêu đề ===================================================
				echo '<div class="panel panel-' .$panel_type. '">
					<div class="panel-heading">
						<h3><span class="glyphicon glyphicon-' .$row_post['icon_name']. '"></span> <b>' .$row_post['post_title']. '</b><h3>
							<h5 class="text-muted"><em>Đăng bởi <img src="' .$row_post['avatar_url']. '" alt="avatar" width="32" height="32"><b><abbr title="' .$row_post['username']. '">' .$row_post['full_name']. '</abbr></b> vào lúc <abbr title="sửa lần cuối: ' .$row_post['last_edit_time']. '"><b>' .$row_post['created_time']. '</b></em></h5>
					</div>
				';
				// Nội dung ===================================================
				// Chỉ trang 1 mới hiển thị nội dung POST
				if ($page == 1){ //IF-BLOCK
					echo '<div class="panel-body">
								' .$row_post['post_content']. '		
							</div>';
					// Nếu là chủ nhân bài viết hoặc là mod/admin thì hiện nút xóa / sửa
					if ($row_post['username'] == (isset($_SESSION["session_username"]) ? $_SESSION["session_username"] : '') 
						|| (isset($_SESSION["session_level"]) ? $_SESSION["session_level"] : LEVEL_VISITOR) < LEVEL_MEMBER) {
						echo '
							<div class="panel-footer">
								<div class="row">
									<div class="col-xs-1">
										<a type="button" class="btn btn-info btn-block" data-toggle="modal"
									data-target="#edit_post_modal"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
									</div>
									<div class="col-xs-1">
										<a type="button" class="btn btn-warning btn-block" href="do_delete.php?mod=post&post_id=' .$post_id. '"
										onClick="return confirm(\'Chắc chắn?\')"><span class="glyphicon glyphicon-remove"></span> Xóa
										</a>
									</div>
									' .($_SESSION["session_level"] < LEVEL_MEMBER ? $verify_button : ""). '
								</div>
							</div>
						';
						echo '<!-- EDIT POST MODAL -->
							<div id="edit_post_modal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
								<div class="modal-dialog modal-default" style="width: 900px; height: 485px;">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Cập nhật bài viết đăng bởi <b>' .$row_post['full_name']. '</b> lúc <b>' .$row_post['created_time']. '</b></h4>
										</div>
										<div class="modal-body">
											<iframe src="update_post.php?post_id='.$post_id.'" style="border: none; width: 100%; height: 485px;"></iframe>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default"
												data-dismiss="modal" onFocus="location.reload();">Đóng</button>
										</div>
									</div>
								</div>
							</div><!-- /EDIT POST MODAL -->
						';
					}			 
				}
				echo '</div>';
								
				// Các bình luận ===================================================
				$replies_per_page = MAX_ITEMS_PER_PAGE;
				$start_point = $replies_per_page * ($page - 1);
				// Lấy các bình luận của trang hiện tại
				$select_replies = "select replies.*, users.full_name, users.avatar_url from replies,users where replies.username = users.username and post_id = $post_id order by created_time asc limit $start_point, $replies_per_page";
				//echo $select_replies;
				$result_select_replies = mysql_query($select_replies, $connection);
				if ($result_select_replies) {
					$index = $start_point;
					while ($row_replies = mysql_fetch_array($result_select_replies)) {
						$index++;
						$action_buttons =""; //mặc định không có
						if (isset($_SESSION['session_username'])): // IF-BLOCK
						//Nếu là mod/admin hoặc chủ nhân bình luận (không bị khóa nick) thì sẽ có 2 nút
						if ($_SESSION['session_level'] < LEVEL_MEMBER 
							|| ($row_replies['username'] == $_SESSION['session_username'] && $_SESSION['session_is_blocked'] == FALSE)) {
							$action_buttons = '
								<span style="float:right;">
									<a data-toggle="modal" data-target="#reply_modal" class="btn btn-info btn-sm" onClick="setSource(\''.$row_replies['reply_id'].'\')">Sửa</a> <!-- FIXME-->
									<a href="do_delete.php?mod=reply&reply_id=' .$row_replies['reply_id']. '&post_id=' .$post_id. '" class="btn btn-warning btn-sm" onClick="return confirm(\'Chắc chắn?\')">Xóa</a>
								</span>
							';
						}
						endif; // END IF-BLOCK
						echo '
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4>
										<span class="badge">#' .$index. '</span> &nbsp;
										<img src="' .$row_replies['avatar_url']. '" alt="avatar" width="32" height="32">
										<strong><abbr title="' .$row_replies['username']. '">' .$row_replies['full_name']. '</abbr></strong>
										đã bình luận vào lúc <abbr title="sửa lần cuối: ' .$row_replies['last_edit_time']. '"><i>' .$row_replies['created_time']. '</i></abbr>
										' .$action_buttons. '
									</h4>
								</div>
								<div class="panel-body">
									' .$row_replies['content']. '
								</div>
							</div>
						';
					}
				}
				
				// Thanh điều hướng trang ===================================================
				$number_of_replies = get_replies_number($connection, $post_id);
				echo '<!-- Pages Navigation --><center><nav><ul class="pagination pagination-lg">';
				// Nếu đang ở trang 2 trở đi thì có nút quay ngược về
				if ($page > 1) {
					echo '<li><a href="view_post.php?post_id=' .$post_id. '&page=' .($page - 1). '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
				}
				// In ra danh sách các số trang 
				$max_page = ceil($number_of_replies / MAX_ITEMS_PER_PAGE); // lên nóc nhà bắt con gà!
				for ($page_item = 1; $page_item <= $max_page; $page_item++) {
					$active_class = "";
					$current_mark = "";
					$href_link = 'view_post.php?post_id=' .$post_id. '&page=' .$page_item;
					if ($page == $page_item) { // đang ở trang hiện tại thì thiết kế để nó in đậm lên
						$active_class = ' class="active"';
						$current_mark = '<span class="sr-only">(current)</span>';
						$href_link = "#";
					}
					echo '<li' .$active_class. '><a href="' . $href_link. '">' .$page_item. ' ' .$current_mark. '</a></li>';
				}
				// Nếu không phải trang cuối, và có nhiều hơn 1 trang thì có nút qua trang
				if ($page < $max_page && $number_of_replies > MAX_ITEMS_PER_PAGE) {
					echo '<li><a href="view_post.php?post_id=' .$post_id. '&page=' .($page + 1). '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
				}
				echo '</ul></nav></center><!-- /Pages Navigation -->';
				
				// Khung bình luận ===================================================
				// Chỉ dành cho thành viên đã đăng nhập (và không bị blocked), dành cho bài viết đã được duyệt
				if (isset($_SESSION['session_username']) && $_SESSION['session_is_blocked'] == FALSE && $is_verified)  {
					echo '
						<!-- Comment Area -->
						<div class="panel panel-info" style="max-width: 900px; margin: 0 auto;">
							<div class="panel-heading text-center">
								<h4><b>Phản hồi bài viết này</b></h4>
							</div>
							<div class="panel-body">
					';
					include('_reply_box.php');
					echo '
							</div>
						</div>
						<!-- /Comment Area -->
					';
				}
			} // END fetch_array
			else {
				header('location: exit.php?result=failed&message=Không tìm được bài viết tương ứng');
			}
		}// END check exist
	?>
</div>
<!-- REPLY MODAL -->
<script>
function setSource(repy_id) {
	document.getElementById('modal_frame').src='update_reply.php?reply_id=' + repy_id;
}
</script>
<div id="reply_modal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
	<div class="modal-dialog modal-default" style="width: 900px; height: 500px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Cập nhật phản hồi</b></h4>
			</div>
			<div class="modal-body">
				<iframe id="modal_frame" src="" style="border: none; width: 100%; height: 450px;"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default"
					data-dismiss="modal" onFocus="location.reload();">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!-- /REPLY MODAL -->
<!-- /MAIN -->
<?php
	include('_footer.php');
?>