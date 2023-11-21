<?php
	$MaNguoiDung=$_POST['MaNguoiDung'];
	$MatKhauCu=$_POST['MatKhauCu'];
	$MatKhauMoi=$_POST['MatKhauMoi'];
	$XacNhanMatKhauMoi=$_POST['XacNhanMatKhauMoi'];
	if(trim($MatKhauCu)=="")
		ThongBaoLoi("Bạn chưa nhập mật khẩu cũ");
	elseif(trim($MatKhauMoi)=="")
		ThongBaoLoi("Bạn chưa nhập mật khẩu mới");
	elseif(trim($XacNhanMatKhauMoi)=="")
		ThongBaoLoi("Bạn chưa xác nhận mật khẩu");
	elseif($MatKhauMoi!=$XacNhanMatKhauMoi)
		ThongBaoLoi("Xác nhận mật khẩu không trùng khớp");
	else
	{
		// Kiểm tra mật khẩu cũ
		$sql_kiemtra="SELECT * FROM tbl_nguoidung WHERE MaNguoiDung = $MaNguoiDung";
		$danhsach = $connect->query($sql_kiemtra);
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
		$MatKhauCu=md5($MatKhauCu);
		if($MatKhauCu==$dong['MatKhau'])
		{
			$MatKhauMoi=md5($MatKhauMoi);
			$sql="UPDATE `tbl_nguoidung` SET `MatKhau`='$MatKhauMoi' WHERE `MaNguoiDung`=$MaNguoiDung";
			$danhsach = $connect->query($sql);
			if (!$danhsach) 
			{
				die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
				exit();
			}
			else
			{
				ThongBao("Đổi mật khẩu thành công");
				header("Location: index.php?do=nguoidung");
			}
		}
		else
			ThongBaoLoi("Mật khẩu cũ không trùng khớp vui lòng xem lại!!!");
	}


?>