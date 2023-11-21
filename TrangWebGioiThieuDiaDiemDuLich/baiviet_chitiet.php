<?php
	$MaBV = $_GET['id'];
	
	$sql = "SELECT *
			FROM tbl_noidungdiadiem A, tbl_chude B, tbl_nguoidung C
			WHERE A.MaChuDe = B.MaChuDe AND A.maNguoiDung = C.MaNguoiDung AND A.MaBaiViet = $MaBV";
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
	
	// Tăng lượt xem
	$sql = "UPDATE tbl_noidungdiadiem SET LuotXem = LuotXem + 1 WHERE MaBaiViet = $MaBV";
	$truyvan_luotxem = $connect->query($sql);
	
	
?>
<section class="home-packages">
	<div class="box-container">
		<div class='box'>
			<div class='image'>
				<img src=<?php echo $dong["HinhAnh"];?>>
			</div>
			<div class='content'>
				<h1 class="heading-title"><?php echo $dong['TieuDe']; ?></h1>
				<p>[<?php echo $dong['TenChuDe']; ?>] Đăng bởi <?php echo $dong['TenNguoiDung']; ?>,vào lúc <?php echo $dong['NgayDang']; ?>, có  <?php echo $dong['LuotXem']+1; ?> lượt xem. </p>
				<p><?php echo $dong['TomTat']; ?></p>
				<p><?php echo "<td colspan=\"2\"></br>" . $dong['ChuThichAnh'] . "</td>"; ?></p>
				<p><?php echo $dong['NoiDung']; ?></p>
			</div>
		</div>
	</div>
</section>
<table border="0" cellspacing="0" width="550" align="center" valign="top">

<?php
	// các tin khác cũ hơn cùng lĩnh vực
	$sql = "select * from  tbl_noidungdiadiem " .
        " where MaChuDe='" .$dong['MaChuDe'].
        "'and MaBaiViet!=".$MaBV." and KiemDuyet=1";
	
	$danhsach2 = $connect->query($sql);
	if (!$danhsach2) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}

	echo "<section class='home-packages'>";
	echo "<h1 class='heading-title'>CÁC TIN KHÁC CÙNG LĨNH VỰC</h1>";
	echo "<div class='box-container'>";
	while ($row = $danhsach2->fetch_array(MYSQLI_ASSOC))
	{						
		echo "<div class='box'>";
			echo "<div class='image'>";
				echo "<img src='".$row['HinhAnh']."'>";
			echo "</div>";
			echo "<div class='content'>";
				echo "<p>".$row['NgayDang']."---View:".$row['LuotXem']."</p>";
				echo "<h3>".$row['TieuDe']."</h3>";
				echo "<p>".$row['TomTat']."</p>";
				echo "<a href='index.php?do=baiviet_chitiet&id=".$row['MaBaiViet']."' class='btn'>Tìm hiểu thêm</a>";
			echo "</div>";
		echo "</div>";
	}
	echo "</div>";
	echo "</section>";


?>

