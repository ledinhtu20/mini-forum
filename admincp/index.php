<?php
	session_start();
	if(!isset($_SESSION['session_username']) || $_SESSION['session_level'] > 1) {
		header("location: ../exit.php?result=warning");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<!--Phần Head chứa css và định dạng-->
  <?php
  require('header.php');
  ?>
	
	<!--Phần chính phía bên phải-->
	<main role="main">
	<!--Section đầu tiên, lời chào-->
	 <section class="panel important">
		<h2>Xin chào đến với trang quản lý của ban quản trị </h2>
      <ul>
       <li>Chúc bạn một ngày tốt lành.</li>
      </ul>
	 </section>
	 <!--Section thứ 2, thông tin về tổng số tin rao-->
	<section class="panel">
    <h2>Tổng số Bài đăng</h2>
    <ul>
      <li><b>xx </b>Bài đăng</li>
      <li><b>xx</b> Bài chưa duyệt.</li> 
    </ul>
	</section>
	</main>
	<footer role="contentinfo">Diễn đàn TXT - Đình Tư - Hoàng Thông</footer>
       
    </body>
<!-- Out Body -->
</html>