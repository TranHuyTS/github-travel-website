<?php
	$MaNguoiDung = $_POST['MaNguoiDung'];
	$TenNguoiDung = $_POST['HoVaTen'];
	if(trim($TenNguoiDung) == "")
		ThongBaoLoi("Tên người dùng không được bỏ trống!");
	else
	{
		$sql = "UPDATE `tbl_nguoidung` SET `TenNguoiDung`='$TenNguoiDung' WHERE `MaNguoiDung`=$MaNguoiDung";
        $danhsach = $connect->query($sql);
        if (!$danhsach) 
        {
          die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
          exit();
        }
        else
        {
          header("Location: index.php?do=nguoidung");
        }
	}
?>