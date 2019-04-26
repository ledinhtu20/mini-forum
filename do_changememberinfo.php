<?php require("_config.php");
$email = $_POST['email'];
$username = $_POST['username'];
$full_name = $_POST['full_name'];
$sql = "UPDATE users SET email = '$email', full_name='$full_name' WHERE username = '$username'";
$result=mysql_query($sql);
header("location:memberinfo.php");
?>