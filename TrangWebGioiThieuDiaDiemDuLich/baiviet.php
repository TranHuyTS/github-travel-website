<?php
	session_start();
	include_once "cauhinh.php";
	include_once "thuvien.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>


    <!--lien ket giup thu phong hinh anh-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <!--font chu moi-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!--lien ket vs file css-->
    <link rel="stylesheet" href="css/style1.css">
    

</head>
<body>
<!--header-->
<section class="header">
    <a href="index.php" class="logo">DU LỊCH</a>
    <nav class="navbar">
        <a href="index.php">TRANG CHỦ</a>
        <a href="baiviet.php"> DANH SÁCH</a>
        <a href="thongtin.php">THÔNG TIN</a>
        <a href="Admin/index.php">ĐĂNG NHẬP</a>
    </nav>

    <div id="menu-btn" class="fas fa-bars"></div>
</section>
<!--header--> 
<!--NoiDungChinh--> 
<section class="home">
    
</section>
<!--NoiDungChinh--> 
<!--DanhSachNoiDung--> 
<section class="home-packages">
    <h1 class="heading-title">DANH SÁCH ĐỊA ĐIỂM</h1>
	<div class="TimKiem">
		<form action="index.php?do=search_xuly" method="post">
			Tìm kiếm: <input type="text" name="search" />
			<input type="submit" name="ok" value="search" />
		</form>
	</div>
    <div class="box-container">
        <?php
            $sql = "SELECT * FROM `tbl_noidungdiadiem` WHERE 1 and KiemDuyet=1";
            $danhsach = $connect->query($sql);
            //Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
            if (!$danhsach) {
                die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
                exit();
            }
        ?>
        <?php
            while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 
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
        ?>
    </div>
</section>
<!--DanhSachNoiDung--> 




<!--DanhSachNoiDung--> 














<!--footer-->  
<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Truy cập</h3>
            <a href="index.php"><i class="fas fa-angle-right"></i> TRANG CHỦ</a>
            <a href="baiviet.php"><i class="fas fa-angle-right"></i>DANH SÁCH</a>
            <a href="thongtin.php"><i class="fas fa-angle-right"></i>THÔNG TIN</a>
            <a href="Admin/index.php"><i class="fas fa-angle-right"></i>ĐĂNG NHẬP</a>
        </div>

        <div class="box">
            <h3>Thông tin liên lạc</h3>
            <a href="#"><i class="fas fa-phone"></i> 0378 108 260</a>
            <a href="#"><i class="fas fa-phone"></i> 0562 075 576</a>
            <a href="#"><i class="fas fa-phone"></i> 0983 879 260</a>
            <a href="#"><i class="fas fa-evelope"></i> lhd_21th@student.agu.edu.vn</a>
        </div>
        <div class="box">
            <h3>Theo dõi tại</h3>
            <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
        </div>
    </div>
    <div class="credit">Trang Web được tạo bởi: <span>HPD-LHD-TDH</span>|Cảm ơn bạn đã ghé!!!</div>
</section>
<!--footer-->  


<!--lien ket giup thu phong hinh anh-->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>