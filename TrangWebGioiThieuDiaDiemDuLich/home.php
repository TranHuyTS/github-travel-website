<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">

            <?php
                $sql = "SELECT * FROM `tbl_noidungdiadiem` WHERE 1 and KiemDuyet=1 ORDER BY `LuotXem` DESC LIMIT 4";
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
                    echo "<div class='swiper-slide' style='background:url(".$row['HinhAnh'].") no-repeat ; background-size: cover'>";
                        echo "<div class='content'>";
                            echo "<h3>".$row['TieuDe']."</h3>";
                            echo "<span>".$row['TomTat']."</span>";
                            echo "<a href='index.php?do=baiviet_chitiet&id=".$row['MaBaiViet']."' class='btn'>Tìm hiểu thêm</a>";
                        echo "</div>";
                    echo "</div>";  
                }
            ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!--NoiDungChinh--> 
<!--DanhSachNoiDung--> 
<section class="home-packages">
    <h1 class="heading-title">DANH SÁCH ĐỊA ĐIỂM MỚI</h1>
    <div class="box-container">
        <?php
            $sql = "SELECT * FROM `tbl_noidungdiadiem` WHERE 1 and KiemDuyet=1 ORDER BY `NgayDang` DESC LIMIT 3";
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
	<div class="load-more"><a href="baiviet.php" class="btn">Xem thêm</a></div>
</section>
<!--DanhSachNoiDung--> 
<!--ChuyenMuc--> 
<section class="services">
    <h1 class="heading-title">Chuyên mục</h1>
    <div class="box-container">
    <?php
        $sql = "SELECT * FROM `tbl_chude` WHERE 1";
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
                echo "<img src='".$row['HinhAnhCD']."'>";
                echo "<a href='index.php?do=baiviet_chude&id=" . $row['MaChuDe'] . "'><h3>" . $row['TenChuDe'] . "</h3></a>";
            echo "</div>";  
        }
    ?> 
    </div>
</section>
<!--ChuyenMuc--> 
<!--DanhSachNoiDung--> 
<section class="home-packages">
    <h1 class="heading-title">DANH SÁCH ĐỊA ĐIỂM NỔI TIẾNG</h1>
    <div class="box-container">
        <?php
            $sql = "SELECT * FROM `tbl_noidungdiadiem` WHERE 1 and KiemDuyet=1 ORDER BY `LuotXem` DESC LIMIT 3";
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
	<div class="load-more"><a href="baiviet.php" class="btn">Xem thêm</a></div>
</section>