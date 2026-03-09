<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lĩnh vực</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #dbeafe, #f0f9ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            width: 420px;
            background: #ffffff;
            padding: 30px 25px;
            border-radius: 14px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .form-box h2 {
            margin: 0 0 25px;
            text-align: center;
            color: #1d4ed8;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #374151;
        }

        input[type="text"] {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .btn-group {
            display: flex;
            gap: 12px;
            margin-top: 22px;
        }

        .btn-group input,
        .btn-group a {
            flex: 1;
            padding: 11px;
            text-align: center;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-save {
            background: #2563eb;
            color: white;
        }

        .btn-save:hover {
            background: #1d4ed8;
        }

        .btn-reset {
            background: #ef4444;
            color: white;
        }

        .btn-reset:hover {
            background: #dc2626;
        }

        .btn-back {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-back:hover {
            background: #d1d5db;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Thêm lĩnh vực</h2>

        <form action="themlinhvuc.php" method="post">
            <div class="form-group">
                <label for="txtMaLinhVuc">Mã lĩnh vực</label>
                <input type="text" id="txtMaLinhVuc" name="txtMaLinhVuc" placeholder="Nhập mã lĩnh vực">
            </div>

            <div class="form-group">
                <label for="txtTenLinhVuc">Tên lĩnh vực</label>
                <input type="text" id="txtTenLinhVuc" name="txtTenLinhVuc" placeholder="Nhập tên lĩnh vực">
            </div>

            <div class="btn-group">
                <input type="submit" value="Lưu" class="btn-save">
                <input type="reset" value="Xóa" class="btn-reset">
                <a href="hienthi.php" class="btn-back">Xem danh sách</a>
            </div>
        </form>
    </div>
</body>
</html>