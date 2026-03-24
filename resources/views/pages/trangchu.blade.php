@extends('layouts.index')

<head>
    <link rel="icon" type="image/x-icon" href="upload/slides/car.png">
</head>
@section('content')

    <!-- Banner Carousel -->
    <div id="myCarousel" class="relative w-full mb-4 md:mb-8">
        <div class="relative h-[300px] md:h-[400px] lg:h-[600px] overflow-hidden rounded-lg md:rounded-2xl">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('https://www.mioto.vn/static/media/bg-landingpage-1.34e13e49.png');">
                <div class="flex flex-col items-center justify-center h-full text-center px-4">
                    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-2 md:mb-4 max-w-2xl leading-tight px-2">VietCar - Cùng Bạn Đến Mọi Hành Trình</h1>
                    <div class="w-40 md:w-60 lg:w-80 h-px bg-white my-2 md:my-4"></div>
                    <h6 class="text-sm sm:text-base md:text-lg lg:text-xl font-semibold text-white mb-1 md:mb-2 px-2">Trải nghiệm sự khác biệt từ <span class="text-primary">hơn 1000</span> xe gia đình đời mới khắp Việt Nam</h6>
                    <h6 class="text-sm sm:text-base md:text-lg lg:text-xl font-semibold text-white px-2">Hotline: 19003333</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Cars Section -->
    <div class="mt-8 md:mt-12 px-4 md:px-0">
        <div class="mb-4 md:mb-6">
            <h4 class="text-center uppercase text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold">Xe tốt nhất</h4>
        </div>
        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6">
            @foreach ($xes as $xe)
                @php
                    $array = json_decode($xe->hinhxe->hinhxe);
                    $img1 = isset($array[1]) ? $array[1] : null;
                @endphp
                <li>
                    <a href="{{ route('xe.show', ['id' => $xe->idxe]) }}" class="block border border-gray-200 rounded-xl p-4 bg-white cursor-pointer">
                        <div class="relative mb-4">
                            <span class="absolute top-2 left-2 z-10 flex flex-col gap-2">
                                <span class="px-2 py-1 rounded-full bg-black bg-opacity-50 text-white text-xs font-semibold flex items-center gap-1">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.9733 7.70015L8.46667 14.2668C8.29334 14.5268 8.01335 14.6668 7.71335 14.6668C7.62002 14.6668 7.52667 14.6535 7.43334 14.6268C7.05334 14.5068 6.79335 14.1668 6.79335 13.7735V10.0135C6.79335 9.86015 6.64667 9.72682 6.46667 9.72682L3.78001 9.6935C3.44001 9.6935 3.12668 9.50016 2.97335 9.20682C2.82668 8.92016 2.84668 8.5735 3.03335 8.30017L7.53335 1.7335C7.76001 1.40016 8.18001 1.25349 8.56668 1.37349C8.94668 1.49349 9.20668 1.83349 9.20668 2.22682V5.98683C9.20668 6.14017 9.35335 6.2735 9.53335 6.2735L12.22 6.30682C12.56 6.30682 12.8733 6.49349 13.0267 6.79349C13.1733 7.08016 13.1533 7.42682 12.9733 7.70015Z" fill="#FFC634"></path>
                                    </svg>
                                </span>
                            </span>
                            <div class="relative pb-[75%] rounded-lg overflow-hidden">
                                <img src="{{ $img1 }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $xe->tenxe }}">
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-50 text-gray-800">{{ $xe->truyendong }}</span>
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-50 text-gray-800">{{ $xe->nhienlieu }}</span>
                            </div>
                            <div>
                                <p class="text-lg font-extrabold text-black truncate">{{ $xe->tenxe }}</p>
                            </div>
                            <div class="flex flex-wrap items-end gap-1 text-sm text-gray-500">
                                <i class="ti-car"></i>
                                <span>{{ $xe->dongxe->tendongxe }}</span>
                                <span>•</span>
                                <span>{{ $xe->hangxe->tenhangxe }}</span>
                            </div>
                            <div class="w-full h-px bg-gray-200 my-2"></div>
                            <div class="flex flex-col items-end">
                                <div>
                                    <span class="text-primary text-base font-black">{{ number_format($xe->gia) }}đ</span>/&nbsp;ngày
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="w-full text-center mt-6 md:mt-8">
            <a href="/thuexe" class="inline-block px-6 py-3 bg-primary text-white rounded-lg font-bold hover:bg-primary-dark transition-colors">Xem thêm</a>
        </div>
    </div>

    <!-- Advantages Section -->
    <section class="py-8 md:py-12 mt-8 md:mt-12 px-4 md:px-0" id="dishes">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-3 md:mb-4">Ưu Điểm Của Vietcar</h1>
        <h3 class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-700 text-center font-medium mb-8 md:mb-12 px-4">
            Những tính năng giúp bạn dễ dàng hơn khi thuê xe trên Vietcar.
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            <div class="p-4 md:p-6 lg:p-8 bg-white rounded-lg shadow-md relative text-center">
                <a href="#" class="absolute left-4 md:left-6 top-4 md:top-6 bg-gray-100 rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-xl md:text-2xl text-primary hover:text-primary-dark"></a>
                <img class="h-40 w-40 md:h-48 md:w-48 lg:h-60 lg:w-60 mx-auto mb-3 md:mb-4" src="/upload/slides/laixe.svg" alt="" />
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900 mb-3 md:mb-4">Lái xe an toàn cùng Vietcar</h3>
                <div class="flex justify-center gap-1 mb-3 md:mb-4">
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                </div>
                <span class="text-sm md:text-base text-gray-600">Chuyến đi trên Vietcar được bảo vệ với Gói bảo hiểm thuê xe tự lái từ MIC & VNI.
                    Khách thuê sẽ chỉ bồi thường tối đa 2,000,000VNĐ trong trường hợp có sự cố ngoài ý muốn.</span>
            </div>

            <div class="p-4 md:p-6 lg:p-8 bg-white rounded-lg shadow-md relative text-center">
                <a href="#" class="absolute left-4 md:left-6 top-4 md:top-6 bg-gray-100 rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-xl md:text-2xl text-primary hover:text-primary-dark"></a>
                <img class="h-40 w-40 md:h-48 md:w-48 lg:h-60 lg:w-60 mx-auto mb-3 md:mb-4" src="./upload/slides/datxe.svg" alt="" />
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900 mb-3 md:mb-4">An tâm đặt xe</h3>
                <div class="flex justify-center gap-1 mb-3 md:mb-4">
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                </div>
                <span class="text-sm md:text-base text-gray-600">Không tính phí huỷ chuyến trong vòng 1h sau khi đặt cọc.
                    Hoàn cọc và bồi thường 100% nếu chủ xe huỷ chuyến trong vòng 7 ngày trước chuyến đi</span>
            </div>

            <div class="p-4 md:p-6 lg:p-8 bg-white rounded-lg shadow-md relative text-center">
                <a href="#" class="absolute left-4 md:left-6 top-4 md:top-6 bg-gray-100 rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-xl md:text-2xl text-primary hover:text-primary-dark"></a>
                <img class="h-40 w-40 md:h-48 md:w-48 lg:h-60 lg:w-60 mx-auto mb-3 md:mb-4" src="./upload/slides/thutuc.svg" alt="" />
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900 mb-3 md:mb-4">Thủ tục đơn giản</h3>
                <div class="flex justify-center gap-1 mb-3 md:mb-4">
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                </div>
                <span class="text-sm md:text-base text-gray-600">Chỉ cần có CCCD gắn chip (Hoặc Passport) &
                    Giấy phép lái xe là bạn đã đủ điều kiện thuê xe trên Vietcar.</span>
            </div>

            <div class="p-4 md:p-6 lg:p-8 bg-white rounded-lg shadow-md relative text-center">
                <a href="#" class="absolute left-4 md:left-6 top-4 md:top-6 bg-gray-100 rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-xl md:text-2xl text-primary hover:text-primary-dark"></a>
                <img class="h-40 w-40 md:h-48 md:w-48 lg:h-60 lg:w-60 mx-auto mb-3 md:mb-4" src="/upload/slides/thanhtoan.svg" alt="" />
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900 mb-3 md:mb-4">Thanh toán dễ dàng</h3>
                <div class="flex justify-center gap-1 mb-3 md:mb-4">
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                </div>
                <span class="text-sm md:text-base text-gray-600">Đa dạng hình thức thanh toán: ATM, thẻ Visa & Ví điện tử (Momo, VnPay, ZaloPay).</span>
            </div>

            <div class="p-4 md:p-6 lg:p-8 bg-white rounded-lg shadow-md relative text-center">
                <a href="#" class="absolute left-4 md:left-6 top-4 md:top-6 bg-gray-100 rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-xl md:text-2xl text-primary hover:text-primary-dark"></a>
                <img class="h-40 w-40 md:h-48 md:w-48 lg:h-60 lg:w-60 mx-auto mb-3 md:mb-4" src="./upload/slides/giaoxe.svg" alt="" />
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900 mb-3 md:mb-4">Giao xe tận nơi</h3>
                <div class="flex justify-center gap-1 mb-3 md:mb-4">
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                </div>
                <span class="text-sm md:text-base text-gray-600">Bạn có thể lựa chọn giao xe tận nhà/sân bay... Phí tiết kiệm chỉ từ 15k/km.</span>
            </div>

            <div class="p-4 md:p-6 lg:p-8 bg-white rounded-lg shadow-md relative text-center">
                <a href="#" class="absolute left-4 md:left-6 top-4 md:top-6 bg-gray-100 rounded-full w-10 h-10 md:w-12 md:h-12 flex items-center justify-center text-xl md:text-2xl text-primary hover:text-primary-dark"></a>
                <img class="h-40 w-40 md:h-48 md:w-48 lg:h-60 lg:w-60 mx-auto mb-3 md:mb-4" src="/upload/slides/dongxe.svg" alt="" />
                <h3 class="text-lg md:text-xl lg:text-2xl font-bold text-gray-900 mb-3 md:mb-4">Dòng xe đa dạng</h3>
                <div class="flex justify-center gap-1 mb-3 md:mb-4">
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                    <i class="fas fa-star text-primary text-lg md:text-xl"></i>
                </div>
                <span class="text-sm md:text-base text-gray-600">Hơn 100 dòng xe cho bạn tuỳ ý lựa chọn: Mini, Sedan, CUV, SUV, MPV, Bán tải.</span>
            </div>
        </div>
    </section>

    <!-- Guide Section -->
    <div class="max-w-7xl mx-auto my-8 md:my-12 lg:my-16 px-4 md:px-0">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">Hướng Dẫn Thuê Xe</h2>
            <h5 class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-700 font-normal max-w-2xl mx-auto px-4">Chỉ với 4 bước đơn giản để trải nghiệm thuê xe VietCar một cách nhanh chóng</h5>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            <div class="flex flex-col items-center">
                <div class="mb-4 md:mb-6 lg:mb-9">
                    <img loading="lazy" class="w-24 h-24 md:w-32 md:h-32 lg:w-auto lg:h-auto" src="/upload/slides/item1.svg" alt="cho thuê xe giá rẻ TP Hồ Chí Minh">
                </div>
                <div class="flex items-center flex-col sm:flex-row text-center sm:text-left">
                    <h5 class="text-primary text-xl md:text-2xl font-bold mr-0 sm:mr-2 mb-1 sm:mb-0">01</h5>
                    <h5 class="text-lg md:text-xl lg:text-2xl font-bold">
                        Đặt xe trên
                        <br>
                        web VietCar
                    </h5>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="mb-4 md:mb-6 lg:mb-9">
                    <img loading="lazy" class="w-24 h-24 md:w-32 md:h-32 lg:w-auto lg:h-auto" src="/upload/slides/item2.svg" alt="cho thuê xe giá rẻ TP Hồ Chí Minh">
                </div>
                <div class="flex items-center flex-col sm:flex-row text-center sm:text-left">
                    <h5 class="text-primary text-xl md:text-2xl font-bold mr-0 sm:mr-2 mb-1 sm:mb-0">02</h5>
                    <h5 class="text-lg md:text-xl lg:text-2xl font-bold">
                        Nhận xe
                    </h5>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="mb-4 md:mb-6 lg:mb-9">
                    <img loading="lazy" class="w-24 h-24 md:w-32 md:h-32 lg:w-auto lg:h-auto" src="/upload/slides/item3.svg" alt="cho thuê xe giá rẻ TP Hồ Chí Minh">
                </div>
                <div class="flex items-center flex-col sm:flex-row text-center sm:text-left">
                    <h5 class="text-primary text-xl md:text-2xl font-bold mr-0 sm:mr-2 mb-1 sm:mb-0">03</h5>
                    <h5 class="text-lg md:text-xl lg:text-2xl font-bold">
                        Bắt đầu
                        <br>
                        hành trình
                    </h5>
                </div>
            </div>
            <div class="flex flex-col items-center">
                <div class="mb-4 md:mb-6 lg:mb-9">
                    <img loading="lazy" class="w-24 h-24 md:w-32 md:h-32 lg:w-auto lg:h-auto" src="/upload/slides/item4.svg" alt="cho thuê xe giá rẻ TP Hồ Chí Minh">
                </div>
                <div class="flex items-center flex-col sm:flex-row text-center sm:text-left">
                    <h5 class="text-primary text-xl md:text-2xl font-bold mr-0 sm:mr-2 mb-1 sm:mb-0">04</h5>
                    <h5 class="text-lg md:text-xl lg:text-2xl font-bold">
                        Trả xe & kết thúc
                        <br>
                        chuyến đi
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div class="py-10 md:py-16 lg:py-20 px-4 md:px-0">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-8 md:mb-12 lg:mb-16">VIETCAR BLOG</h2>
            <div class="flex flex-col lg:flex-row gap-4 md:gap-5">
                <div class="w-full lg:w-[30%] flex flex-col gap-4 md:gap-5">
                    <a class="relative h-full cursor-pointer group" href="/blo-g">
                        <div class="h-[200px] md:h-[250px] relative">
                            <img loading="lazy" class="rounded-xl md:rounded-2xl w-full h-full object-cover" src="/upload/slides/blog1.jpg" alt="VIETCAR- thuê xe tự lái">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 text-white p-4 md:p-5 group-hover:bg-black group-hover:bg-opacity-40 transition-all rounded-t-xl md:rounded-t-2xl bg-gradient-to-t from-black/60 to-transparent">
                            <p class="text-sm md:text-base m-0">24-01-2024</p>
                            <p class="text-base md:text-lg lg:text-xl font-semibold m-0">Thuê xe ô tô tự lái: An tâm đưa gia đình đi muôn nơi dịp Tết Nguyên Đán</p>
                        </div>
                    </a>
                    <a class="relative h-full cursor-pointer group" href="/blo-g">
                        <div class="h-[200px] md:h-[250px] relative">
                            <img loading="lazy" class="rounded-xl md:rounded-2xl w-full h-full object-cover" src="/upload/slides/blog2.jpg" alt="VIETCAR- thuê xe tự lái">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 text-white p-4 md:p-5 group-hover:bg-black group-hover:bg-opacity-40 transition-all rounded-t-xl md:rounded-t-2xl bg-gradient-to-t from-black/60 to-transparent">
                            <p class="text-sm md:text-base m-0">29-1-2024</p>
                            <p class="text-base md:text-lg lg:text-xl font-semibold m-0">Thuê xe ô tô tự lái: Tự do trải ngiệm lễ Giáng sinh đáng nhớ</p>
                        </div>
                    </a>
                </div>
                <div class="w-full lg:w-[calc(70%-20px)]">
                    <a class="relative h-full cursor-pointer group block" href="/blo-g">
                        <div class="h-[300px] md:h-[400px] lg:h-[520px] relative">
                            <img loading="lazy" class="rounded-xl md:rounded-2xl w-full h-full object-cover" src="/upload/slides/blog3.jpg" alt="VIETCAR- thuê xe tự lái">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 text-white p-4 md:p-5 lg:p-6 bg-gradient-to-t from-black/80 to-transparent rounded-t-xl md:rounded-t-2xl">
                            <p class="text-sm md:text-base mb-2">30-11-2023</p>
                            <p class="text-lg md:text-xl lg:text-2xl xl:text-3xl font-semibold">Thuê xe ô tô tự lái giá rẻ tại quận 3: sự lựa chọn không giới hạn</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
