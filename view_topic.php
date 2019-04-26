<?php
	// FINISHED
	include('_header.php');
	include('_func.php');
	$topic_id;
	$page = 1;
	if (isset($_GET['topic_id'])) {
		$topic_id = (int) $_GET['topic_id'];
		if (isset($_GET['page'])) {
			$page = (int) $_GET['page'];
		}
		if ($topic_id <= 0 || $page <= 0) {
			header("location: index.php"); // Quay về trang chủ nếu không nhập đúng số
		}
	} else {
		header("location: index.php"); 
	}
?>
<!-- MAIN,  content for view_topic.php -->
<div class="container">	
	<?php
		// BREADCRUMBs ===================================================
		echo '<ol class="breadcrumb"><li><a href="index.php">Trang chủ</a></li>' .get_topic_breadcrumbs($connection, $topic_id) . '</ol>';
				
		/// NESTED TOPICS =================================================
		// Nếu ở trang 1, và chuyên mục có chứa chuyên mục con thì hiển thị ra
		if ($page ==1) {
			echo '<div class="container-fluid">';
			// Lấy danh sách mã các chuyên mục cha
			$user_level = LEVEL_VISITOR;
			$select_topics = "select * from topics where parent_topic_id = $topic_id and level >= $user_level";
			//echo $select_topic_id;
			$result_topics = mysql_query($select_topics, $connection);
			if ($result_topics) {
				while ($row = mysql_fetch_assoc($result_topics)) {
					//Kiểm tra xem chuyên mục hiện tại có chứa chuyên mục con nào không, nếu có thì lấy ra html.
					$nested_topics_html = '';
					$select_child_topics = 'select * from topics where parent_topic_id = ' .$row['topic_id']. ' and level >= ' .$user_level;
					//echo $select_child_topics;
					$result_nested_topics = mysql_query($select_child_topics, $connection);
					if ($result_nested_topics) {
						while ($nested_row = mysql_fetch_assoc($result_nested_topics)) {
							$nested_topics_html .= '
								<div class="media">
									<div class="media-left">
										<div class="square-box small">
											<div class="square-content">
												<div class="bg-success"><span class="glyphicon glyphicon-' .$nested_row['icon_name']. '"></span></div>
											</div>
										</div>
									</div>
									<div class="media-body">
										<h4 class="media-heading"><a href="view_topic.php?topic_id=' .$nested_row['topic_id']. '"><strong>' .$nested_row['topic_title']. '</strong></a></h4>
										<em class="small">' .$nested_row['description']. '</em>
									</div>
									<div class="media-right">
										<div class="square-box small">
											<div class="square-content">
												<div class="bg-success"><span><small>' .get_posts_number($connection, $nested_row['topic_id']). '</small></span></div>
											</div>
										</div>
									</div>
								</div>
							';
						} // end - while
					} // end-if
					// In ra chuyên mục kèm chuyên mục con của nó (nếu có)
					echo '
						<div class="media">
							<div class="media-left">
								<div class="square-box">
									<div class="square-content">
										<div class="bg-success"><span class="glyphicon glyphicon-' .$row['icon_name']. '"></span></div>
									</div>
								</div>
							</div>
							<div class="media-body">
								<h3 class="media-heading"><a href="view_topic.php?topic_id=' .$row['topic_id']. '"><strong>' .$row['topic_title']. '</strong></a></h3> 
								<em>' .$row['description']. '</em> <!-- MAX_LENGTH = 255-->
								' .$nested_topics_html. '
							</div>
							<div class="media-right">
								<div class="square-box">
									<div class="square-content">
										<div class="bg-success"><span><big>' .get_posts_number($connection, $row['topic_id']). '</big></span></div>
									</div>
								</div>
							</div>
						</div>
					';
				} // END WHILE
			} // END IF
			echo '</div><br>';
		} // End If
		/// END NESTED TOPICS =================================================
		
		/// POSTS IN TOPIC ====================================================
		$user_level = LEVEL_VISITOR;
		if (isset($_SESSION['session_level']) && $_SESSION['session_level'] < LEVEL_MEMBER) { 
			$where_clause_hide_unverified_posts = " posts.username = users.username ";
		} else { // ẩn hết bài chưa kiểm duyệt nếu là thành viên, ngoại trừ chủ nhân bài viết
			$include_my_posts = (isset($_SESSION['session_username']) ? ("or posts.username = '".$_SESSION['session_username'])."'" : "");
			$where_clause_hide_unverified_posts = " posts.username = users.username and (posts.is_verified = 1 $include_my_posts )";
		}
		$start_point = MAX_ITEMS_PER_PAGE * ($page - 1);
		$select_posts = 'select post_id, post_title, icon_name, full_name, is_verified
			from posts, users
			where ' .$where_clause_hide_unverified_posts. ' and topic_id = ' .$topic_id. '
			order by posts.created_time DESC
			limit '.$start_point.' , ' .MAX_ITEMS_PER_PAGE;
		//echo $select_posts;
		$result_new_posts = mysql_query($select_posts, $connection);
		if ($result_new_posts) {
			echo '
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-10">
								<h4><strong>Danh sách bài viết của chuyên mục</strong></h4>
							</div>
							<div class="col-sm-2">
								<a class="btn btn-default btn-block"
									href="insert_post.php?topic_id=' .$topic_id. '"
								><span class="glyphicon glyphicon-pencil"></span> Đăng bài viết mới</a>
							</div>
						</div>
					</div>
			';
			$index = $start_point;
			while ($row = mysql_fetch_assoc($result_new_posts)) {
				$index++;
				$highlighted_item = "";
				if ($row['is_verified'] == FALSE) {
					$highlighted_item = " list-group-item-danger";
				}
				echo '
					<a class="list-group-item '.$highlighted_item.'" href="view_post.php?post_id='.$row['post_id'].'">
						<span class="label label-default">' .$index. '</span> &nbsp;
						<span class="glyphicon glyphicon-' .$row['icon_name']. '"></span>
						<strong>'.$row['post_title'].'</strong>	<!-- MAX_LENGTH = 100 -->
						<span class="badge">'. get_replies_number($connection, $row['post_id']) .'</span>
						<span class="badge">'.$row['full_name'].'</span>
					</a>';
			}
			echo '
					</div>
				</div>
			';
		}
		/// END POSTS IN TOPIC ================================================
		
		/// Pages Navigation
		// In ra danh sách các số trang 
		$number_of_posts = get_self_posts_number($connection, $topic_id);
		$max_page = ceil($number_of_posts / MAX_ITEMS_PER_PAGE); // lên nóc nhà bắt con gà!
		echo '<!-- Pages Navigation --><center><nav><ul class="pagination pagination-lg">';
		// Nếu đang ở trang 2 trở đi thì có nút quay ngược về
		if ($page > 1) {
			echo '<li><a href="view_topic.php?topic_id=' .$topic_id. '&page=' .($page - 1). '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
		}
		for ($page_item = 1; $page_item <= $max_page; $page_item++) {
			$active_class = "";
			$current_mark = "";
			$href_link = 'view_topic.php?topic_id=' .$topic_id. '&page=' .$page_item;
			if ($page == $page_item) { // đang ở trang hiện tại thì thiết kế để nó in đậm lên
				$active_class = ' class="active"';
				$current_mark = '<span class="sr-only">(current)</span>';
				$href_link = "#";
			}
			echo '<li' .$active_class. '><a href="' . $href_link. '">' .$page_item. ' ' .$current_mark. '</a></li>';
		}
		// Nếu không phải trang cuối, và có nhiều hơn 1 trang thì có nút qua trang
		if ($page < $max_page && $number_of_posts > MAX_ITEMS_PER_PAGE) {
			echo '<li><a href="view_topic.php?topic_id=' .$topic_id. '&page=' .($page + 1). '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
		}
		echo '</ul></nav></center><!-- /Pages Navigation -->';
		/// END Pages Navigation
		
	?>
</div>
<!-- /MAIN -->
<?php
	include('_footer.php');
?>