<?php session_start();
		require("../_config.php"); 
		$username = $_GET["username"];
      	//require("checkUser.php") 
		
?>

<?php 
	 $sql = "DELETE FROM users WHERE username ='$username'";
	 $result=mysql_query($sql);

if($result == 1)
{
	header("location:member.php");
	
	}
	else
	{
	header("location:abc.php");
	}
?>