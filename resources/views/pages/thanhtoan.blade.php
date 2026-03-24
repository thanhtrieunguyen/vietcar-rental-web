@extends('layouts.index')

<head>
    <link rel="stylesheet" href="{{ asset('static/icon/themify-icons/themify-icons.css') }}">
    <script src="https://kit.fontawesome.com/1a9d4a043e.js" crossorigin="anonymous"></script>
</head>

@section('content')
    <div class="bg-gray-100 min-h-screen py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Title -->
            <div class="text-center mb-8 md:mb-12 pt-12 md:pt-20">
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Chọn Phương Thức Thanh Toán</h3>
        </div>

            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">
                <!-- Payment Method Section -->
                <div class="flex-1 lg:max-w-[60%]">
                    <div class="bg-white rounded-xl p-6 md:p-8 mb-6">
                        <div class="payment-method__item bg-blue-50 border border-gray-200 rounded-lg p-6 mb-4">
                            <div class="title-payment mb-4">
                                <h6 class="text-xl font-bold text-gray-900 inline-block ml-2.5">Ví điện tử</h6>
                            </div>
                            <div class="h-px bg-gray-200 mb-5"></div>
                            <div class="content-payment space-y-4">
                                <p class="text-base">1. Lựa chọn ví điện tử</p>
                                <div class="radio-payment flex gap-4">
                                    <label for="payment-vnpay" 
                                           class="payment-card cursor-pointer border-2 border-primary rounded-lg p-4 hover:bg-blue-50 transition-colors flex items-center justify-center">
                                        <input type="radio" id="payment-vnpay" name="payment_method" value="vnpay" class="sr-only payment-method-radio" checked>
                                        <img loading="lazy" class="e-wallet" src="./static/img/logo-vnpay.png" alt="VNPay" width="100px">
                                    </label>
                                </div>
                                <p class="text-base">2. Bấm <strong>"THANH TOÁN"</strong> để chuyển hướng về ví điện tử và tiến hành đặt cọc.</p>
                                <p class="text-base">3. Nhập thông tin tài khoản hoặc quét mã thanh toán.</p>
                                <p class="text-base">4. Sau khi thanh toán, bạn sẽ nhận được thông báo đặt xe thành công và thông tin chủ xe qua tin nhắn và qua ứng dụng/ website VIETCAR.</p>
                            </div>
                            <div class="mt-6">
                                <p class="text-xs text-gray-600">
                                    *Gọi <a href="tel:#" class="text-primary hover:underline">19000000 (7AM - 10PM)</a> hoặc
                                    Chat với VietCar tại <a target="_blank" href="#" class="text-primary hover:underline">VietCar Fanpage</a>
                                    nếu bạn gặp khó khăn trong quá trình thanh toán.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Total Section -->
                <div class="lg:w-[400px]">
                    <div class="bg-green-50 rounded-xl p-6 sticky top-24">
                        <div class="mb-6">
                            <p class="text-xl font-bold text-gray-900 mb-2">Mã thanh toán</p>
                            </div>
                        <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                            <p class="text-base font-bold">Tổng giá trị</p>
                            <p class="text-2xl font-extrabold text-primary">
                                    <strong>{{ number_format($hoaDon->tongtien) }}K</strong>
                                </p>
                            </div>

                            <form action="{{ route('vnpay') }}" method="POST">
                                @csrf
                                <input type="hidden" name="idhoadon" value="{{ $hoaDon->idhoadon }}">
                                <input type="hidden" name="tongtien" value="{{ $hoaDon->tongtien }}">
                                <input type="hidden" name="payment_method" id="paymentMethodValue" value="vnpay">
                            <button type="submit" id="paymentBtn" 
                                    class="w-full px-6 py-4 bg-primary text-white rounded-lg font-bold hover:bg-primary-dark transition-colors mb-4">
                                Thanh toán với VNPAY
                            </button>
                            </form>

                        <p class="text-xs text-gray-600 mb-2 font-medium">
                            (*Trường hợp nhiều khách đặt xe cùng một thời điểm, hệ thống sẽ ưu tiên khách hàng thanh toán sớm nhất)
                        </p>
                        <p class="text-xs text-gray-600 font-medium">
                            (*Để bảo vệ khoản thanh toán của bạn, tuyệt đối không chuyển tiền hoặc liên lạc bên ngoài trang web hoặc ứng dụng Vietcar)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Keep the hidden form value in sync with the selected payment option
        (function() {
            const radios = document.querySelectorAll('.payment-method-radio');
            const hiddenInput = document.getElementById('paymentMethodValue');

            // Apply selected styling
            function refreshStyles() {
                radios.forEach(radio => {
                    const card = radio.closest('.payment-card');
                    card?.classList.toggle('ring-2', radio.checked);
                    card?.classList.toggle('ring-primary', radio.checked);
                    card?.classList.toggle('border-primary', radio.checked);
                    card?.classList.toggle('border-gray-200', !radio.checked);
                });
            }

            radios.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (hiddenInput) hiddenInput.value = radio.value;
                    refreshStyles();
                });
            });

            refreshStyles();
        })();
    </script>
@endsection
