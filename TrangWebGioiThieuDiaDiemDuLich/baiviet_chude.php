
<?php

// Lấy mã lĩnh vực
$cd = $_GET["id"];


 // BƯỚC 2: TÌM TỔNG SỐ RECORDS
        $sql2 =  "select * from tbl_noidungdiadiem where MaChuDe=" . $cd . " and KiemDuyet=1 "; 

		$danhsach = $connect->query($sql2);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
        echo "<section class='home-packages'>";
        echo "<h1 class='heading-title'>DANH SÁCH ĐỊA ĐIỂM THEO CHỦ ĐỀ</h1>";
        echo "<div class='TimKiem'>";
            echo "<form action='index.php?do=search_xuly' method='post'>";
                echo "Tìm kiếm: <input type='text' name='search' />";
                echo "<input type='submit' name='ok' value='search' />";
            echo "</form>";
        echo "</div>";
        echo "<div class='box-container'>";
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
        echo "</div>";
        echo "</section>";
?>