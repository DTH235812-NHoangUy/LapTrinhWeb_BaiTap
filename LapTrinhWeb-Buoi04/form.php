<head>
    <title>Thực hành PHP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <form name="f" method="POST" action="xulyform.php">
        <table align="center">
            <tr>
                <td colspan="2" align="center">THÔNG TIN SINH VIÊN</td>
            </tr>
            <tr>
                <td>Mã số SV</td>
                <td><input type="text" name="txtMSSV"/></td>
            </tr>
            <tr>
                <td>Họ tên</td>
                <td><input type="text" name="txtHoTen"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnGui" value="Gửi"/>
                    <input type="reset" name="btnXoa" value="Xóa"/>
                </td>
            </tr>
        </table>
    </form>
</body>
