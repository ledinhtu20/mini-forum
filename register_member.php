<?php
	include('_header.php');
?>
	<!-- MAIN-->
	<div class="container">
<div class="panel panel-primary ">
			<div class="panel-heading text-center">
				<h3>Đăng kí thành viên</h3>
			</div>
			<div class="panel-body">

					<!-- Panel đăng kí -->
						<form action="do_insert.php" method="post">
						<input type="hidden" name="mod" value="user">
						<div class="col-xs-6 col-xs-offset-3">
							<input type="text" class="form-control" name="username" placeholder="Tên Đăng nhập" />
						  </p>
						  <p>
							<input type="text" class="form-control" name="full_name" placeholder="Họ và tên" />
						  </p>
						   <p>
							<input type="email" class="form-control" name="email" placeholder="Địa chỉ Email" />
						  </p>
						  <p>
							<input type="password" class="form-control" name="password" placeholder="Mật khẩu" />
						  </p>
						  <p>
							<input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu" />
						  </p>
						  <div class="form-group">
							<p class="col-xs-6"><input type="submit" class="btn btn-success btn-block" value="Hoàn tất đăng kí" /></p>
							<p class="col-xs-6"><a href="index.php" class="btn btn-warning btn-block">Quay về trang chủ</a></p>
						  </div>
						</form>

					<!-- !Panel đăng kí -->
				</div>
</div>

	</div>

			</div>
	<!-- /MAIN -->
<?php
	include('_footer.php');
?>