<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra chẵn lẻ</title>
</head>
<body>
    <form method="post" action="">
        Nhập vào số nguyên:
        <input type="text" name="txtSo" />
        <input type="submit" name="btnKT" value="Kiểm tra chẵn lẻ" />
    </form>

    <?php
    if(isset($_POST['btnKT'])) {
        $so = $_POST['txtSo'];
        if(is_numeric($so)) {
            $so = (int)$so; // ép kiểu về số nguyên
            if($so % 2 == 0)
                echo "$so là số chẵn!";
            else
                echo "$so là số lẻ!";
        } else {
            echo "$so không phải là số!";
        }
    }
    ?>
</body>
</html>
