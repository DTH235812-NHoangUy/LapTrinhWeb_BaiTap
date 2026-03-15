<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng rao vặt</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .khung-form{
            width: 700px;
            margin: 60px auto;
            padding: 20px 30px;
            border: 1px dashed #ff9999;
            border-radius: 20px;
            background: #f8f8f8;
            box-shadow: 8px 8px 12px #cfcfcf;
            font-size: 11pt;
            font-family: Arial;
        }
        .khung-form table{
            width: 100%;
        }
        .khung-form td{
            padding: 8px;
            color: #999;
            font-size: 22px;
        }
        .khung-form select,
        .khung-form textarea,
        .khung-form input[type="text"]{
            font-size: 16pt;
            font-family: Arial;
        }
        .khung-form .tieude{
            text-align: center;
            font-size: 28pt;
            font-weight: bold;
            color: #b3b3b3;
            padding-bottom: 10px;
        }
        .banner{
            text-align: center;
            margin-bottom: 10px;
        }
        .banner img{
            max-width: 220px;
            height: auto;
        }
        .nut{
            text-align: center;
        }
        .nut input{
            font-size: 16pt;
            padding: 4px 16px;
        }
    </style>
</head>
<body>
    <div class="khung-form">
        <div class="banner">
            <img src="images/top.jpg" alt="banner">
        </div>

        <form action="xulytin.php" method="POST" name="f">
            <table>
                <tr>
                    <td colspan="2" class="tieude">ĐĂNG RAO VẶT</td>
                </tr>

                <tr>
                    <td>Chuyên mục</td>
                    <td>
                        <select name="oCM">
                            <option value="Nhà đất">Nhà đất</option>
                            <option value="Ô tô - Xe máy">Ô tô - Xe máy</option>
                            <option value="Điện thoại">Điện thoại</option>
                            <option value="Máy tính">Máy tính</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Nội dung</td>
                    <td>
                        <textarea name="tND" cols="40" rows="6"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Địa điểm</td>
                    <td>
                        <select name="oDD">
                            <option value="Toàn quốc">Toàn quốc</option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input name="tEM" type="text" size="30">
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="nut">
                        <input type="submit" value="Đăng">
                        <input type="reset" value="Hủy">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>