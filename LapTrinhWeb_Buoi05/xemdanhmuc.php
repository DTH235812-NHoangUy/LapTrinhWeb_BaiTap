<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="dinhdang/mystyle.css">
</head>

<body>
    <table class="bieumau1" border="1">
        <tr>
            <td colspan="5" class="canhgiua"><h2>Danh mục sản phẩm</h2></td>
        </tr>
        <tr>
            <td>STT</td>
            <td>Tên Sản Phẩm</td>
            <td>Hình ảnh</td>
            <td>Giá bán</td>
            <td>Giá gốc</td>
        </tr>

        <?php
            $servername = "localhost";
            $username   = "root";
            $password   = "vertrigo";
            $dbname     = "qlhanghoa";
            $port       = 3307;

            $connect = new mysqli($servername, $username, $password, $dbname, $port);

            if ($connect->connect_error) {
                die("Không kết nối: " . $connect->connect_error);
            }

            $connect->set_charset("utf8");

            $sql = "SELECT * FROM mathang";
            $danhsach = $connect->query($sql);

            if (!$danhsach) {
                die("Không thể thực hiện câu lệnh SQL: " . $connect->error);
            }

            $stt = 1;

            while ($row = $danhsach->fetch_assoc()) {
                $tenAnh = trim($row["HinhAnh"]);

                // Nếu DB chỉ lưu tên file, tự thêm thư mục image/
                if (
                    stripos($tenAnh, "image/") !== 0 &&
                    stripos($tenAnh, "image\\") !== 0 &&
                    stripos($tenAnh, "images/") !== 0 &&
                    stripos($tenAnh, "images\\") !== 0
                ) {
                    $tenAnh = "image/" . $tenAnh;
                }

                // Nếu chưa có đuôi file thì tự thêm .jpg
                if (pathinfo($tenAnh, PATHINFO_EXTENSION) == "") {
                    $tenAnh .= ".jpg";
                }

                echo "<tr>";
                echo "<td>" . $stt . "</td>";
                echo "<td>" . $row["TenHang"] . "</td>";
                echo "<td><img src='" . $tenAnh . "' width='180' height='120' alt='Không có ảnh'></td>";
                echo "<td>" . $row["GiaBan"] . "</td>";
                echo "<td>" . $row["GiaGoc"] . "</td>";
                echo "</tr>";

                $stt++;
            }

            $connect->close();
        ?>
    </table>
</body>
</html>