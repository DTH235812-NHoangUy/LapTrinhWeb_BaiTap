function KiemTra() {
    // Lấy thông tin từ FORM thông qua thuộc tính name
    var tdn = document.getElementsByName("txtTDN")[0].value;
    var mk = document.getElementsByName("txtMK")[0].value;
    var xnmk = document.getElementsByName("txtXNMK")[0].value;

    // Kiểm tra 1: Không nhập giá trị vào 3 ô
    if(tdn == "" || mk == "" || xnmk == "") {
        alert("Các trường không được bỏ trống!");
        return false;
    }

    // Kiểm tra 2: Tên đăng nhập nhỏ hơn 6 ký tự
    if(tdn.length < 6) {
        alert("Tên đăng nhập phải nhiều hơn 6 ký tự!");
        return false;
    }

    // Kiểm tra 3: Mật khẩu nhập lại không khớp
    if(mk != xnmk) {
        alert("Xác nhận mật khẩu không chính xác!");
        return false;
    }

    // Nếu qua hết các ải trên thì cho phép submit form
    return true;
}