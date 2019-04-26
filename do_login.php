<?php
//FINISHED
include("_config.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
	$myusername = $_POST['username'];
	$mypassword = $_POST['password'];
	$sql = "select * from users where username = '$myusername' and password = '$mypassword'";
	$result = mysql_query($sql, $connection);
	if ($result && $row = mysql_fetch_assoc($result)) {
		$_SESSION['session_username'] = $myusername;
		$_SESSION['session_full_name'] = $row['full_name'];
		$_SESSION['session_level'] = $row['level']; // Xem hắn là ai
		$_SESSION['session_is_blocked'] = $row['is_blocked']; // Xem hắn có bị khóa nick hay không?
		
		$login_time = date('Y-m-d G:i:s');
		$sql_2 = "update users set last_login_time= '$login_time' where username = '$myusername'";
		mysql_query($sql_2, $connection);
		header("location: index.php"); // Quay về trang chủ
	} else {
		header('location: exit.php?result=failed&message=Tài khoản hoặc mật khẩu nhập không đúng. <a href="login.php">Đăng nhập</a> lại');
	}
}
?>