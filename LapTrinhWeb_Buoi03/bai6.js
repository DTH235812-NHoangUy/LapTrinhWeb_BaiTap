function KiemTra() {
    // 1. Lấy giá trị từ các ô input thông qua thuộc tính name
    var tdn = document.forms[0].txtTDN.value;
    var mk = document.forms[0].txtMK.value;
    var xnmk = document.forms[0].txtXNMK.value;

    // 2. Kiểm tra Tên đăng nhập phải nhiều hơn 6 ký tự
    if (tdn.length <= 6) {
        alert("Tên đăng nhập phải nhiều hơn 6 ký tự!");
        document.forms[0].txtTDN.focus(); // Đưa con trỏ chuột về ô lỗi
        return false; // Ngăn không cho submit form
    }

    // 3. Kiểm tra mật khẩu không được để trống
    if (mk == "") {
        alert("Mật khẩu không được để trống!");
        document.forms[0].txtMK.focus();
        return false;
    }

    // 4. Kiểm tra mật khẩu xác nhận phải khớp
    if (mk !== xnmk) {
        alert("Mật khẩu xác nhận không khớp!");
        document.forms[0].txtXNMK.focus();
        return false;
    }

    // 5. Nếu mọi thứ đều đúng
    alert("Đăng ký thành công!");
    return true; 
}