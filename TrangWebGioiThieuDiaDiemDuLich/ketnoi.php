<?php
	$servername="localhost";
	$username="root";
	$password="vertrigo";
	$dbname="tourdulich";
	$ketnoi = mysqli_connect($servername,$username,$password,$dbname); // lệnh kết nối csdl
	if ($ketnoi) {
		# code...
		mysqli_set_charset($ketnoi,"utf8"); // lệnh mã hóa tất cả dữ liệu thành tiếng việt utf8
		
	}else{
		echo "Kết nối máy chủ thất bại!";
		die;
	}

?>