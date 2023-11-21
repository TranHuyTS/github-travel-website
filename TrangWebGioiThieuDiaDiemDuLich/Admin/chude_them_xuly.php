<?php
	// Lấy thông tin từ FORM
	$TenChuDe = $_POST['TenChuDe'];
	
	// Kiểm tra
	if(trim($TenChuDe) == "")
		ThongBaoLoi("Tên chủ đề không được bỏ trống!");
	else
	{
		$target_path = "images/";
		$target_path1 = "../images/";
		$target_path = $target_path . basename($_FILES['HinhAnh']['name']);
		$target_path1 = $target_path1 . basename($_FILES['HinhAnh']['name']);
		if (move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $target_path1))
			echo "Tập tin " . basename($_FILES['HinhAnh']['name']) . " đã được upload.<br/>";
		else
			echo "Tập tin upload không thành công.<br/>";


		

		$sql = "INSERT INTO `tbl_chude`(`TenChuDe`,`HinhAnhCD`) VALUES ('$TenChuDe','$target_path')";
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		else
		{
			header("Location: index.php?do=chude");
		}	
		
	}
?>