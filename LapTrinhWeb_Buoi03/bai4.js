function ThoiGian() {
    var hientai = new Date();
    var ngay = hientai.getDate();
    var thang = hientai.getMonth() + 1;
    var nam = hientai.getFullYear();
    
    var thu = hientai.getDay();

    switch(thu) {
        case 0: thu = "Chủ Nhật"; break;
        case 1: thu = "Thứ Hai"; break;
        case 2: thu = "Thứ Ba"; break;
        case 3: thu = "Thứ Tư"; break;
        case 4: thu = "Thứ Năm"; break;
        case 5: thu = "Thứ Sáu"; break;
        case 6: thu = "Thứ Bảy"; break;
    }
    
    document.write("Hôm nay là " + thu + ", ngày " + ngay + " tháng " + thang + " năm " + nam);
}