<?php
	session_start();//sử dụng sesstion
	
	include_once "cauhinh.php";
	include_once "thuvien.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Trang Tin Du Lịch</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
		<!--font chu moi-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="css/styleadmin.css" />
		<script src="scripts/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div class="title"></div>
		<div id="TrangWeb">
			<div id="PhanDau">
				<h1>Quản Lý</h1>
				<?php
					if(isset($_SESSION['MaND']) && isset($_SESSION['HoTen']))
					{
					echo "<br>Xin chào ".$_SESSION['HoTen']." &nbsp;&nbsp;|| &nbsp;&nbsp;";
						echo '<a href="index.php?do=dangxuat">Đăng xuất</a>'."&nbsp;&nbsp;";
					}
				?>				
			</div>
			<div id="PhanGiua">
				<div id="BenTrai">
					<?php
					//hiện menu quản lý
					if(!isset($_SESSION['MaND']))
					{
						echo '<h3>Quản lý</h3>';
							echo '<ul>';
								echo '<li><a href="index.php?do=dangnhap">Đăng nhập</a></li>';
								echo '<li><a href="index.php?do=dangky">Đăng ký</a></li>';
							echo '</ul>';
					}
					else
					{
						echo '<h3>Quản lý</h3>';
						echo '<ul>';						
							echo '<li><a href="index.php?do=baiviet_them">Đăng bài viết</a></li>';
								
							if($_SESSION['QuyenHan'] == 1)
							{
								echo '<li><a href="index.php?do=chude">Danh sách chủ đề</a></li>';
								echo '<li><a href="index.php?do=baiviet">Danh sách bài viết</a></li>';
								echo '<li><a href="index.php?do=nguoidung">Danh sách người dùng</a></li>';
							}
						echo '</ul>';
					}


					//hiện menu hồ sơ cá nhân					
					if(isset($_SESSION['MaND']))
					{
						echo '<h3>Hồ sơ cá nhân</h3>';
						echo '<ul>';						
							echo '<li><a href="index.php?do=hosocanhan">Hồ sơ cá nhân</a></li>';
							echo '<li><a href="index.php?do=doimatkhau">Đổi mật khẩu</a></li>';
						echo '</ul>';
					}								
					?>
					<h3>Chức năng khác</h3>
					<ul>
						<li><a href="../index.php">Trang Chủ</a></li>
						<li><a href="">.......</a></li>
					</ul>
					
					
				</div>
				<div id="BenPhai">
					<?php
						$do = isset($_GET['do']) ? $_GET['do'] : "home";
						
						include $do . ".php";
					?>
				</div>
			</div>
			<div id="PhanCuoi">
				<div class="box-container">
					<div class="box">
						<h3>Thông tin liên lạc</h3>
						<a href="#"><i class="fas fa-phone"></i> 0378 108 260</a>
						<a href="#"><i class="fas fa-phone"></i> 0562 075 576</a>
						<a href="#"><i class="fas fa-phone"></i> 0983 879 260</a>
					</div>
					<div class="box">
						<h3>Theo dõi tại</h3>
						<a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
						<a href="#"><i class="fab fa-twitter"></i> Twitter</a>
						<a href="#"><i class="fab fa-instagram"></i> Instagram</a>
					</div>
				</div>
				<div class="credit">Trang Web được tạo bởi: <span>HPD-LHD-TDH</span>|Cảm ơn bạn đã ghé!!!</div>
			</div>
		</div>
	</body>
</html>