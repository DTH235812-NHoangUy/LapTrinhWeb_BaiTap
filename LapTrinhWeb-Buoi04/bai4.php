<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tìm số lớn nhất</title>
</head>
<body>
    <h2>Nhập 3 số để tìm số lớn nhất</h2>
    <form method="get" action="">
        Số thứ 1: <input type="text" name="txtSo1" size="5" />
        Số thứ 2: <input type="text" name="txtSo2" size="5" />
        Số thứ 3: <input type="text" name="txtSo3" size="5" />
        <input type="submit" name="btnKT" value="Tìm số lớn nhất" />
    </form>

    <?php
    if(isset($_GET['btnKT'])) {
        $a = $_GET['txtSo1'];
        $b = $_GET['txtSo2'];
        $c = $_GET['txtSo3'];

        if(is_numeric($a) && is_numeric($b) && is_numeric($c)) {
            $max = max($a, $b, $c);
            echo "<p>Số lớn nhất của $a, $b, $c là <strong>$max</strong></p>";
        } else {
            echo "<p>Giá trị nhập vào phải là số!</p>";
        }
    }
    ?>
</body>
</html>
