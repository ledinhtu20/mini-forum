<?php require("_header.php");
$get_username= $_SESSION['session_username'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$sql1 = "SELECT * FROM users WHERE username = '$get_username'";
$result1=mysql_query($sql1);
$row=mysql_fetch_array($result1);
if ($old_password==$row['password'])
{
	$sql2 = "UPDATE users SET password = '$new_password' WHERE username = '$get_username'";
	$result2 = mysql_query($sql2);
	echo '<p align="center"><b>Bạn đã thay đổi mật khẩu thành công</b></p>';
	header( "refresh:1.5;url=member_info.php" );
	
	
}
else {
	echo '<p align="center"><b>Bạn đã nhập sai mật khẩu, vui lòng nhập lại</b></p>';
	header( "refresh:1.5;url=member_info.php" );
}

?>