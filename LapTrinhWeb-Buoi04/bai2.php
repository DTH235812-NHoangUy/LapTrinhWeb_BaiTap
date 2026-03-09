<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cộng hai số</title>
</head>
<body>
    <form method="POST" action="">
        Số thứ 1: <input type="text" name="txtSo1" />
        Số thứ 2: <input type="text" name="txtSo2" />
        <input type="submit" name="btnTong" value="Tổng" />
    </form>

    <?php
        if(isset($_POST['btnTong'])) {
            $a = $_POST['txtSo1'];
            $b = $_POST['txtSo2'];
            if(is_numeric($a) && is_numeric($b)) {
                $c = $a + $b;
                echo "Tổng $a + $b = $c";
            } else {
                echo "Giá trị nhập vào phải là số!";
            }
        }
    ?>
</body>
</html>
