<?php require("_header.php"); 
$get_username=$_SESSION['session_username'];
$sql="SELECT * FROM users WHERE username = '$get_username'";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);

?>
<!-- /HEADER-->
<script type="text/javascript">

</script>
	<!-- MAIN,  content for home page -->
	<div class="container">
		<!-- Viewtopic -->
		<div class="panel panel-primary ">
			<div class="panel-heading">
				<h3><b>Trang người dùng</b></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-success">
							<div class="panel-heading text-center">
								<h4>
									<b>Thông tin cá nhân</b><br>
								</h4>
							</div>
							<div class="panel-body">
								<form name="changeinfo" id="changeinfo" method="POST" action="do_update.php">
									<input type="hidden" name="mod" value="user">
									<table class="table">
									<tr>
										<input type="hidden" value="<?php echo $_SESSION['session_username'];?>" name="username"/>
										<td><label>Tài khoản</label></td>
										<td><?php echo $_SESSION['session_username'];?></td>
									</tr>
									<tr>
										<td><label>Họ tên</label></td>
										<td><input class="form-control" type="text" name="full_name" value="<?=$row['full_name']?>" required>
										</td>
									</tr>
									<tr>
										<td><label>Email</label></td>
										<td><input class="form-control" type="text" value="<?=$row['email']?>" name="email" required></td>
									</tr>
									<tr>
										<td><label>Hình đại diện</label></td>
										<td><input class="form-control" type="text" value="<?=$row['avatar_url']?>" name="avatar_url"></td>
									</tr>
									<tr>
										<td>
											<img src="<?=$row['avatar_url']?>" width="96" height="96">
										</td>
										<td><button type="submit" class="btn btn-success">Lưu thông tin</button></td>
									</tr>
								</table>
							</form>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-success">
							<div class="panel-heading text-center">
								<h4><b>Đổi mật khẩu</b></h4>
							</div>
							<div class="panel-body">
								<form name="form" method="POST" id="changepass" action="do_update.php" >
									<input type="hidden" name="mod" value="change_password">
									<table class="table">
										<tr>
											<td><label>Mật khẩu cũ</label></td>
											<td><input class="form-control" type="password" name="old_password" required></td>
										</tr>
										<tr>
											<td><label>Mật khẩu mới</label></td>
											<td><input class="form-control" type="password" name="new_password" required></td>
										</tr>
										<tr>
											<td><label>Nhập lại</label></td>
											<td><input class="form-control" type="password" name="new_password_confirm" required></td>
										</tr>
										<tr>
											<td></td>
											<td><button type="submit" class="btn btn-warning">Đổi mật khẩu</button></td>
										</tr>
									</table>
								</form>
							</div>
							<div class="panel-footer">
								<a href="index.php" class="btn btn-default">Quay lại trang chủ</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /MAIN -->
<?php require('_footer.php'); ?>