<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	include('_func.php');
	
	// Người lạ miễn vào
	if (!isset($_SESSION['session_username'])) {
		header('location: exit.php?result=warning');
	} else if ($_SESSION['session_is_blocked'] == TRUE) {
		//die("Bạn không thể thực hiện chức năng này khi đang bị khóa tài khoản!");
		header('location: exit.php?result=blocked');
	}
	
	
	// Thực hiện các chức năng cập nhật
	$mod = isset($_POST['mod']) ? $_POST['mod'] : (isset($_GET['mod']) ? $_GET['mod'] : "");
	if ('post' == $mod) {
		$post_id = $_POST['post_id'];
		$new_post_title = $_POST['new_post_title'];
		$new_post_content = $_POST['new_post_content'];
		$poster = $_POST['poster'];
		$updated_time = date('Y-m-d G:i:s');
		$icon_name = $_POST['icon_name'];
		$update_post = "update posts set post_title = '$new_post_title', post_content='$new_post_content', icon_name='$icon_name', last_edit_time = '$updated_time' where post_id = $post_id";
		//echo $update_post;
		if (mysql_query($update_post, $connection)) {
			//echo "Đã cập nhật thành công";
			header('location: exit.php?result=success');
		} else {
			//die("cập nhật thất bại");
			header('location: exit.php?result=failed');
		}
	} else if ('reply' == $mod) {
		$reply_id = $_POST['reply_id'];
		$content = $_POST['new_reply_content'];
		$updated_time = date('Y-m-d G:i:s');
		$update_reply = "update replies set content = '$content', last_edit_time = '$updated_time' where reply_id = $reply_id";
		//echo $update_reply;
		if (mysql_query($update_reply, $connection)) {
			//echo "Đã cập nhật phản hồi thành công";
			header('location: exit.php?result=success');
		} else {
			//die("cập nhật thất bại");
			header('location: exit.php?result=failed');
		}
	} else if ('verifying' == $mod) {
		if ($_SESSION['session_level'] < LEVEL_MEMBER) {
			$post_id = $_GET['post_id'];
			$update_post = "update posts set is_verified=1 where post_id = $post_id";
			//echo $update_post;
			if (mysql_query($update_post, $connection)) {
				//echo "Đã cập nhật phản hồi thành công";
				//header('location: exit.php?result=success');
				header('location: view_post.php?post_id='.$post_id);
			} else {
				//die("cập nhật thất bại");
				header('location: exit.php?result=failed');
			}
		} else {
			header('location: exit.php?result=warning');
		}
	} else if ('user' == $mod) {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$full_name = $_POST['full_name'];
		$avatar_url = $_POST['avatar_url'];
		$update_user = "update users set email = '$email', full_name='$full_name', avatar_url='$avatar_url' where username = '$username'";
		if (mysql_query($update_user, $connection)) {
			header('location: user_panel.php');
		} else {
			header('location: exit.php?result=failed');
		}
	} else if ('change_password' == $mod) {
		$get_username= $_SESSION['session_username'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$new_password_confirm = $_POST['new_password_confirm'];
		$change_password = "update users set password = '$new_password' where username = '$get_username' and password= '$old_password'";
		if ($new_password == $new_password_confirm && mysql_query($change_password, $connection)) {
			header('location: exit.php?result=success');
		} else {
			header('location: exit.php?result=failed');
		}
	} else {
		die("Bùm");
	}
?>