<?php
	// FINISHED
	include('_header.php');
	include('_func.php');
?>
	<!-- MAIN,  content for home page -->
	<div class="container">
		<!-- NewPosts -->
		<div class="list-group">
			<h4 class="list-group-item active">Bài viết mới</h4>
			<?php
				if (isset($_SESSION['session_level']) && $_SESSION['session_level'] < LEVEL_MEMBER) { 
					// là quản lí hiển thị tất cả bài viết
					$where_clause_hide_unverified_posts = " posts.username = users.username ";
				} else { // ẩn hết bài chưa kiểm duyệt nếu là thành viên, ngoại trừ chủ nhân bài viết
					$include_my_posts = (isset($_SESSION['session_username']) ? ("or posts.username = '".$_SESSION['session_username'])."'" : "");
					$where_clause_hide_unverified_posts = " posts.username = users.username and (posts.is_verified = 1 $include_my_posts )";
				}
				$select_new_posts = 'select post_id, post_title, icon_name, full_name, is_verified
					from posts, users
					where ' .$where_clause_hide_unverified_posts. ' 
					order by posts.created_time DESC
					limit 0 , ' .MAX_NEW_ITEMS;
				//echo $select_new_posts;
				$result_new_posts = mysql_query($select_new_posts, $connection);
				if ($result_new_posts) {
					while ($row = mysql_fetch_assoc($result_new_posts)) {
						$highlighted_item = "";
						if ($row['is_verified'] == FALSE) {
							$highlighted_item = "list-group-item-danger";
						}
						echo '
							<a class="list-group-item '.$highlighted_item.'" href="view_post.php?post_id='.$row['post_id'].'">
								<span class="glyphicon glyphicon-' .$row['icon_name']. '"></span>
								<strong>'.$row['post_title'].'</strong>	<!-- MAX_LENGTH = 100 -->
								<span class="badge">'. get_replies_number($connection, $row['post_id']) .'</span>
								<span class="badge">'.$row['full_name'].'</span>
							</a>';
					}
				}
			?>
		</div>
		<!-- /NewPosts -->
		
		<!-- TopicList -->
		<div class="panel panel-default">
			<div class="panel-heading"><h4>Danh sách chuyên mục</h4></div>
			<div class="panel-body">
				<!-- Category Media Item -->
				<?php
					$user_level = LEVEL_VISITOR;
					if (isset($_SESSION['session_username'])) {
						$user_level = $_SESSION['session_level'];
					}
					// Lấy danh sách mã các chuyên mục gốc đầu tiên
					$select_topics = 'select * from topics where parent_topic_id is null and level >= ' .$user_level;
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
								}
							}
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
						}
					}
				?>
			</div>
		</div>
		<!-- /TopicList -->
	</div>
	<!-- /MAIN -->
<?php
	include('_footer.php');
?>
	