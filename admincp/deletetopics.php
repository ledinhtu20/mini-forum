<?php session_start();
		require("../_config.php"); 
		$topic_id = $_GET["topic_id"];
      	//require("checkUser.php") 
		
?>

<?php 
	 $sql = "DELETE FROM topics WHERE topic_id ='$topic_id'";
	 $result=mysql_query($sql);

if($result == 1)
{
	header("location:admintopic.php");
	
	}
	else
	{
	header("location:abc.php");
	}
?>