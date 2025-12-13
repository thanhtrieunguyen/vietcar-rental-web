<hr class="mb-12 border-t border-gray-200">
<footer class="max-w-7xl mx-auto px-4 pb-12">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 border-b border-gray-200 pb-8">
        <div class="md:col-span-1">
            <div class="mb-8">
                <img class="w-24" src="/upload/slides/logo.png" alt="VietCar Logo">
        </div>
            <p class="text-gray-700 mb-4">
                Trang Đăng tin và Tìm kiếm thông tin về <a href="/thue-xe" class="text-blue-600 hover:text-blue-800">thuê</a> xe.
            Chúng tôi kết nối dễ dàng giữa người thuê và người cho thuê. Đồng thời cung
            cấp những bộ lọc tìm kiếm thông minh, giúp dễ dàng trong việc tìm kiếm
            các thông tin xe phù hợp với nhu cầu của người dùng.
        </p>
            <div class="flex items-center gap-4">
                <a href="#" class="hover:opacity-80 transition-opacity">
                    <img class="w-10" src="upload/slides/t.png" alt="Twitter">
                </a>
                <a href="#" class="hover:opacity-80 transition-opacity">
                    <img class="w-10" src="upload/slides/youtube.png" alt="YouTube">
                </a>
                <a href="#" class="hover:opacity-80 transition-opacity">
                    <img class="w-10" src="/upload/slides/facebook.png" alt="Facebook">
                </a>
            </div>
        </div>
        
        <div>
            <h4 class="text-primary text-xl font-medium mb-8">Công ty</h4>
            <div class="flex flex-col space-y-4">
                <a href="#" class="text-black hover:text-primary transition-colors">Kinh doanh</a>
                <a href="#" class="text-black hover:text-primary transition-colors">kênh truyền hình</a>
                <a href="#" class="text-black hover:text-primary transition-colors">Nhà tài trợ</a>
    </div>
    </div>

        <div>
            <h4 class="text-primary text-xl font-medium mb-8">Về chúng tôi</h4>
            <div class="flex flex-col space-y-4">
                <a href="#" class="text-black hover:text-primary transition-colors">Tính thông dụng</a>
                <a href="#" class="text-black hover:text-primary transition-colors">Quan hệ đối tác</a>
                <a href="#" class="text-black hover:text-primary transition-colors">Nhà phát triển</a>
            </div>
    </div>

        <div>
            <h4 class="text-primary text-xl font-medium mb-8">Liên hệ</h4>
            <div class="flex flex-col space-y-4">
                <a href="#" class="text-black hover:text-primary transition-colors">Liên hệ chung tôi</a>
                <a href="https://thuvienphapluat.vn/van-ban/Cong-nghe-thong-tin/Luat-an-ninh-mang-2018-351416.aspx" class="text-black hover:text-primary transition-colors">Chính sách quyền riêng tư</a>
                <a href="https://icontract.com.vn/tin-tuc/cac-quy-dinh-ve-dieu-khoan-bao-mat-thong-tin-trong-hop-dong#:~:text=%C4%90i%E1%BB%81u%20kho%E1%BA%A3n%20b%E1%BA%A3o%20m%E1%BA%ADt%20(confidentiality,m%E1%BA%ADt%20nh%E1%BB%AFng%20th%C3%B4ng%20tin%20%C4%91%C3%B3." class="text-black hover:text-primary transition-colors">Điều khoản và điều kiện</a>
            </div>
        </div>
    </div>

    <div class="mt-8 text-black">
        <p class="mb-4">
        Hotline: 1900 3333 <br>
        Mr.Group 6
        </p>
        <a href="#" class="inline-block mb-4">
            <img class="w-24" src="./upload/slides/logobocongthuong.png" alt="Bộ Công Thương">
        </a>
        <p class="mb-4">Phương thức thanh toán</p>
        <div class="flex items-center gap-4">
            <img class="w-10" src="./upload/images/momo.png" alt="MoMo">
            <img class="w-10" src="./upload/images/vnpay.png" alt="VNPay">
            <img class="w-10" src="./upload/images/visa.png" alt="Visa">
            <img class="w-10" src="./upload/images/zalopay.png" alt="ZaloPay">
        </div>
    </div>
    {{-- <script src=" script.js"></script> --}}
</footer>
{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
{{-- <script src="js/carouseller.js"></script>
<script src="js/jquery.easing.1.3.js"></script> --}}
{{-- <script type="text/javascript" src="libs/fancybox/jquery.fancybox.min.js"></script> --}}

<script>
    function formatNumber(input) {
        // Xóa tất cả ký tự không phải số và ký tự dấu phẩy khỏi giá trị của input
        var value = input.value.replace(/[^0-9]/g, '');

        // Gán giá trị đã định dạng lại vào input
        input.value = value;
    }
</script>

{{-- <script>
    $(".quick-buy-form").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: './process_cart.php?action=add',
            data: $(this).serializeArray(),
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == 0) { //Có lỗi
                    alert(response.message);
                } else { //Mua thành công
                    alert(response.message);
                    //                                    location.reload();
                }
            }
        });
    });
</script> --}}

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
    integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script>
    var offset = 400;
    var duration = 750;
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > offset)
                $('#top-up').fadeIn(duration);
            else
                $('#top-up').fadeOut(duration);
        });
        $('#top-up').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, duration);
        });
    });
</script>
<div title="Về đầu trang" id="top-up" class="text-4xl cursor-pointer fixed z-[9999] text-primary bottom-5 right-4 hidden hover:text-gray-800 transition-colors">
    <i class="fas fa-arrow-circle-up"></i>
</div>
{{-- <script type="text/javascript">
    $(function() {
        $('#product-slide').carouseller();
    });
</script> --}}

</body>

</html>
