<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	include('_func.php');
	
	if (isset($_SESSION['session_is_blocked']) && $_SESSION['session_is_blocked'] == TRUE) {
		//die("Bạn không thể thực hiện chức năng này khi đang bị khóa tài khoản!");
		header('location: exit.php?result=blocked');
	}
	
	// Thực hiện các chức năng thêm mới
	$mod = isset($_POST['mod']) ? $_POST['mod'] : "";
	if ('post' == $mod) {
		$topic_id = $_POST['topic_id'];
		$post_title = $_POST['post_title'];
		$post_content = $_POST['post_content'];
		$icon_name = $_POST['icon_name'];
		$username = $_SESSION['session_username'];
		$is_verified = 0;
		if ($_SESSION['session_level'] < LEVEL_MEMBER) {
			$is_verified = 1; // Admin, mod thì không cần duyệt lại bài
		}
		$insert_post = "insert into posts (topic_id,post_title, post_content,username,icon_name,is_verified) values($topic_id, '$post_title', '$post_content', '$username', '$icon_name', $is_verified)";
		//echo $insert_post;
		// đăng bài quá ngắn thì nghỉ
		if (strlen($post_content) > 50 && mysql_query($insert_post, $connection)) {
			//echo "Đã thêm bài viết thành công";
			header('location: view_topic.php?topic_id='.$topic_id);
		} else {
			//die("Thêm bài viết thất bại");
			header('location: exit.php?result=failed&message=Thêm bài viết thất bại');
		}
	} else if ('reply' == $mod) {
		$post_id = $_POST['post_id'];
		$content = $_POST['content'];
		$username = $_POST['username'];
		$insert_reply = "insert into replies (post_id,content,username) values($post_id, '$content', '$username')";
		//echo $insert_reply;
		if (strlen($content) > 1 && mysql_query($insert_reply, $connection)) {
			//echo "Đã thêm bình luận thành công";
			header('location: view_post.php?post_id='.$post_id);
			} else {
				//die("<br>Phản hồi thất bại");
				header('location: exit.php?result=failed&message=Phản hồi thất bại');
			}
		} else if ('verification' == $mod) {
		
		} else if ('block' == $mod) {
		
		} else if ('user' == $mod) {
			$username = $_POST['username'];
			$full_name = $_POST['full_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			if ($password == $confirm_password) {
				$insert_user = "insert into users(username, full_name, email, password) values('$username', '$full_name', '$email', '$password')";
				if (mysql_query($insert_user, $connection)) {

					header("location: exit.php?result=success&message=Đăng kí  thành công <b>$username</b>, hãy <a href=\"login.php\">đăng nhập</a> để tiếp tục.");
				} else {
					header("location: exit.php?result=failed&message=Không thể đăng kí thành viên <b>$username</b>");
				}
		} else {
			header('location: exit.php?result=failed&message=Mật khẩu nhập lại không khớp!');
		}
	} else {
		die("Bùm");
	}
?>