<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f2f2f2;
        }
        .khung{
            width:500px;
            margin:80px auto;
            border:1px solid #666;
            background:#fff;
        }
        .tieude{
            text-align:center;
            font-size:32px;
            font-weight:bold;
            padding:20px;
            border-bottom:1px solid #666;
        }
        table{
            width:100%;
            border-collapse:collapse;
        }
        td{
            border:1px solid #666;
            padding:12px;
            font-size:18px;
        }
        input[type=text], input[type=password]{
            width:95%;
            padding:8px;
            font-size:18px;
        }
        .nut{
            text-align:center;
            padding:20px;
        }
        button{
            padding:10px 30px;
            font-size:20px;
            cursor:pointer;
        }
        .thongbao{
            width:500px;
            margin:20px auto 0;
            color:red;
            font-weight:bold;
            text-align:center;
        }
    </style>
</head>
<body>

<?php
if (isset($_SESSION['HoVaTen'])) {
    echo '<div class="thongbao" style="color:green;">Bạn đã đăng nhập với tên: ' . $_SESSION['HoVaTen'] . '</div>';
}
?>

<div class="khung">
    <div class="tieude">ĐĂNG NHẬP HỆ THỐNG</div>

    <form action="dangnhap_submit.php" method="post">
        <table>
            <tr>
                <td style="width:35%;">Tên đăng nhập</td>
                <td><input type="text" name="TenDangNhap"></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="MatKhau"></td>
            </tr>
            <tr>
                <td colspan="2" class="nut">
                    <button type="submit">Đăng nhập</button>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>