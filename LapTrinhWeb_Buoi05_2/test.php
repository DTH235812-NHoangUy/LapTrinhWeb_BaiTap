<?php
$conn = @mysqli_connect("127.0.0.1", "root", "vertrigo", "hdthuoc", 3307);

if (!$conn) {
    die("Lỗi: " . mysqli_connect_error());
}

echo "Kết nối thành công";
mysqli_close($conn);
?>