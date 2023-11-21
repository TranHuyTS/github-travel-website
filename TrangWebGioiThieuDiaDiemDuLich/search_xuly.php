	<?php
	if (isset($_REQUEST['ok'])) {

		// Gán hàm addslashes để chống sql injection
		$search = addslashes($_POST['search']);
		// Dùng câu lênh like trong sql và sứ dụng toán tử % của php 
		//để tìm kiếm dữ liệu chính xác hơn.
		$sql = "select * from tbl_noidungdiadiem where TieuDe like '%$search%' or NoiDung like '%$search%' and KiemDuyet=1";

		

		// Thực thi câu truy vấn
		$danhsach = $connect->query($sql);
		//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
		if (!$danhsach) {
			die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
			exit();
		}
		// Đếm số dòng trả về trong sql.
		$num = mysqli_num_rows($danhsach);

		// Nếu $search rỗng thì báo lỗi tức là người dùng chưa
		//nhập liệu mà đã nhấn submit.
		if (empty($search)) {
			echo "Hãy nhập dữ liệu vào ô tìm kiếm";
		} else {
			// Ngược lại nếu người dùng nhập liệu thì tiến hành xứ lý show dữ liệu.
			// Nếu $num > 0 hoặc $search khác rỗng tức 
			//là có dữ liệu mối show ra nhé, ngược lại thì báo lỗi.
			if ($num > 0 && $search != "") {

				// Dùng $num để đếm số dòng trả về.
				echo "<h1 class='heading-title'> $num kết quả trả về với từ khóa <b>$search</b></h1>";
				// Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ 
				//dữ liệu có trong table và trả về dữ liệu ở dạng array.
				echo "<section class='home-packages'>";
				echo "<h1 class='heading-title'>DANH SÁCH ĐỊA ĐIỂM</h1>";
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
			} else 
				echo "<h1 class='heading-title'> Không có kết quả trả về với từ khóa <b>$search</b></h1>";
			}
		}
	?>  