<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Xử lý tin đăng</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<style type="text/css">
table{
    border: 1px groove maroon;
    font-family: Arial;
    font-size: 10pt;
    border-collapse: separate;
    border-spacing: 0px;
    width: 1200px;
    color: black;
}
td{
    border: thin dotted maroon;
    padding: 8px;
    text-align: justify;
    vertical-align: top;
}
th{
    color: #FFFFFF;
    font-size: 11pt;
    font-weight: bold;
    text-align: center;
    background-color: #FF0000;
    border: thin solid #FFFFFF;
    padding: 6px;
}
.noidung{
    line-height: 1.5;
}
.menu{
    text-align: right;
    font-size: 9pt;
    font-weight: bold;
    padding: 5px;
}
</style>
</head>
<body>
    <p class="menu">
        <a href="trangtin.html">Trang chủ</a> |
        <a href="dangtin.php">Đăng tin</a>
    </p>

    <?php
        $servername = "localhost";
        $username   = "root";
        $password   = "vertrigo";
        $dbname     = "qltin";
        $port       = 3307;

        $connect = new mysqli($servername, $username, $password, $dbname, $port);

        if ($connect->connect_error) {
            die("Không kết nối: " . $connect->connect_error);
        }

        $connect->set_charset("utf8");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $chuyenmuc = isset($_POST["oCM"]) ? trim($_POST["oCM"]) : "";
            $noidung   = isset($_POST["tND"]) ? trim($_POST["tND"]) : "";
            $diadiem   = isset($_POST["oDD"]) ? trim($_POST["oDD"]) : "";
            $email     = isset($_POST["tEM"]) ? trim($_POST["tEM"]) : "";

            if ($chuyenmuc != "" && $noidung != "" && $diadiem != "" && $email != "") {
                $stmt = $connect->prepare("INSERT INTO baidang (chuyenmuc, noidung, diadiem, email) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $chuyenmuc, $noidung, $diadiem, $email);
                $stmt->execute();
                $stmt->close();
            }
        }

        $sql = "SELECT * FROM baidang ORDER BY maso DESC";
        $result = $connect->query($sql);

        if (!$result) {
            die("Không thể thực hiện câu lệnh SQL: " . $connect->error);
        }

        echo "<table align='center'>";
        echo "<tr>";
        echo "<th>Chuyên mục</th>";
        echo "<th>Nội dung</th>";
        echo "<th>Địa điểm</th>";
        echo "<th>Email:</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><b>" . htmlspecialchars($row["chuyenmuc"]) . "</b></td>";
            echo "<td class='noidung'>" . nl2br(htmlspecialchars($row["noidung"])) . "</td>";
            echo "<td>" . htmlspecialchars($row["diadiem"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        $connect->close();
    ?>
</body>
</html>