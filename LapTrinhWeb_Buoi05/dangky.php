<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Phiếu mua hàng trả góp</title>
    <link rel="stylesheet" type="text/css" href="dinhdang/mystyle.css">
</head>

<body>		
    <form name="f" method="post" action="">
        <table class="bieumau">
            <tr> 
                <td colspan="3" class="canhgiua"><h2>PHIẾU MUA HÀNG TRẢ GÓP</h2></td>
            </tr>
				
            <tr> 
                <td colspan="3" class="tieude">THÔNG TIN SẢN PHẨM</td>
            </tr>

            <tr> 
                <td>Chọn sản phẩm</td>
                <td>
                    <select name="optSanPham">
                        <option value="">--- Chọn sản phẩm ---</option>
                        <?php
                            $servername = "localhost";
                            $username   = "root";
                            $password   = "vertrigo";
                            $dbname     = "qlhanghoa";
                            $port       = 3307; // đổi 3306 nếu máy bạn dùng 3306

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

                            while ($row = $danhsach->fetch_assoc()) {
                                echo "<option value='" . $row["MaHang"] . "'>" . $row["TenHang"] . "</option>";
                            }

                            $connect->close();
                        ?>
                    </select>
                </td>
                <td>&nbsp;</td>
            </tr>

            <tr> 
                <td>Thời hạn trả</td>
                <td>
                    <input type="radio" name="radThoiHan" value="1">6 tháng
                    <input type="radio" name="radThoiHan" value="2">12 tháng
                </td>
                <td>&nbsp;</td>
            </tr>   

            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="checkbox" name="chkGiaoHang">
                    Giao hàng tận nơi
                </td>
                <td>&nbsp;</td>
            </tr>

            <tr> 
                <td colspan="3" class="tieude">THÔNG TIN KHÁCH HÀNG</td>
            </tr>

            <tr> 
                <td>Họ tên</td>
                <td><input type="text" name="txtHoTen"></td>
                <td>*</td>
            </tr>

            <tr> 
                <td>Năm sinh</td>
                <td>
                    <select name="optNamSinh">
                        <option>---Chọn---</option>
                        <script>
                            var d = new Date();
                            var namht = d.getFullYear();
                            for (var i = namht; i >= 1900; i--) {
                                document.write("<option>" + i + "</option>");
                            }
                        </script>
                    </select>
                </td>
                <td>&nbsp;</td>
            </tr>
				
            <tr> 
                <td colspan="3" class="canhgiua"> 
                    <input type="submit" name="btnXacNhan" value="Xác nhận">
                    <input type="reset" name="btnKhong" value="Không">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>