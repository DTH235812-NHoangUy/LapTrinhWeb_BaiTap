<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra số nguyên tố</title>
</head>
<body>
    <h2>Hướng dẫn:</h2>
    <form method="POST" action="">
        Nhập số n: <input type="text" name="txtSo1" size="5" />
        <input type="submit" name="btnKT" value="Tìm số nguyên tố" />
    </form>

<?php
// Hàm kiểm tra số nguyên tố
function KiemTraSNT($a)
{
    if ($a <= 1) return false;
    for ($i = 2; $i <= sqrt($a); $i++) {
        if ($a % $i == 0) return false;
    }
    return true;
}

// Xử lý khi người dùng bấm nút
if (isset($_POST['btnKT'])) {
    $so = $_POST['txtSo1'];
    if (is_numeric($so)) {
        if ($so <= 0) {
            echo "$so không phải là số nguyên tố";
        } else {
            $dem = 0;
            $chuoi = "";
            for ($i = 2; $i < $so; $i++) {
                if (KiemTraSNT($i)) {
                    $chuoi .= "$i ";
                    $dem++;
                }
            }
            echo "Có $dem số nguyên tố nhỏ hơn $so là: ";
            echo $chuoi;
        }
    } else {
        echo "$so không phải là số";
    }
}
?>
</body>
</html>
