@extends('layouts.index')

<head>
    <title>About US</title>
    <link rel="icon" type="image/x-icon" href="icons/about-us.png">
</head>
@section('content')
    <section class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div class="mb-12 md:mb-16">
            <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start pt-12 md:pt-20 pb-12 md:pb-16">
                <div class="w-full md:w-[440px] md:mr-5">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">VietCar - Cùng bạn đến mọi hành trình</h1>
                </div>
                <div class="flex-1">
                    <p class="text-lg leading-7 mb-4">
                        Mỗi chuyến đi là một hành trình khám phá cuộc sống và thế giới xung quanh,
                        là cơ hội học hỏi và chinh phục những điều mới lạ của mỗi cá nhân để trở nên tốt hơn.
                        Do đó, chất lượng trải nghiệm của khách hàng là ưu tiên hàng đầu và là nguồn cảm hứng của đội
                        ngũ VIETCAR.
                    </p>
                    <p class="text-lg leading-7">
                        VIETCAR là nền tảng chia sẻ ô tô,
                        sứ mệnh của chúng tôi không chỉ dừng lại ở việc kết nối chủ xe và khách hàng một cách Nhanh
                        chóng - An toàn - Tiện lợi,
                        mà còn hướng đến việc truyền cảm hứng KHÁM PHÁ những điều mới lạ đến cộng đồng qua những chuyến
                        đi trên nền tảng của chúng tôi.
                    </p>
                </div>
            </div>
        </div>

        <div class="mb-12 md:mb-16">
            <div class="w-full">
                <img src="https://www.mioto.vn/static/media/aboutus1.4c31a699.png" class="w-full max-w-7xl mx-auto" alt="About VietCar">
            </div>
        </div>

        <div class="mb-12 md:mb-16">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-24 items-start">
                <div class="flex-1">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">Drive. Explore. Inspire</h2>
                    <p class="text-lg mb-4">
                        <strong>Cầm lái</strong> và <strong>Khám phá</strong> thế giới đầy <strong>Cảm hứng.</strong>
                    </p>
                    <p class="text-lg mb-4">
                        VIETCAR đặt mục tiêu trở thành cộng động người dùng ô tô Văn minh & Uy tín #1 tại Việt Nam,
                        nhằm mang lại những giá trị thiết thực cho tất cả những thành viên hướng đến một cuộc sống tốt
                        đẹp hơn.
                    </p>
                    <p class="text-lg">
                        Chúng tôi tin rằng mỗi hành trình đều quan trọng,
                        vì vậy đội ngũ và các đối tác của VIETCAR với nhiều kinh nghiệm về lĩnh vực cho thuê xe,
                        công nghệ, bảo hiểm & du lịch sẽ mang đến cho hành trình của bạn thêm nhiều trải nghiệm mới lạ,
                        thú vị cùng sự an toàn ở mức cao nhất.
                    </p>
                </div>
                <div class="w-full lg:w-[535px] flex-shrink-0">
                    <img src="/upload/slides/pic2.jpg" class="w-full h-auto rounded-lg" alt="VietCar">
                </div>
            </div>
        </div>

        <div class="bg-gray-200 mt-20 py-12 md:py-20">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-center text-4xl md:text-5xl font-bold mb-10">VietCar và những con số</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 md:gap-16">
                    <div class="flex flex-col items-center gap-2.5 text-center">
                        <div>
                            <i class="fa-solid fa-cart-flatbed-suitcase text-5xl text-primary"></i>
                        </div>
                        <h5 class="text-2xl font-bold mt-2">100,000+</h5>
                        <p class="text-gray-700">
                            Chuyến đi đầy cảm hứng
                            <br>
                            VietCar đã đồng hành
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2.5 text-center">
                        <div>
                            <i class="fa-solid fa-user text-5xl text-primary"></i>
                        </div>
                        <h5 class="text-2xl font-bold mt-2">50,000+</h5>
                        <p class="text-gray-700">
                            Khách hàng
                            <br>
                            đã trải nghiệm dịch vụ
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2.5 text-center">
                        <div>
                            <i class="fa-brands fa-redhat text-5xl text-primary"></i>
                        </div>
                        <h5 class="text-2xl font-bold mt-2">5,000+</h5>
                        <p class="text-gray-700">
                            Đối tác chủ xe
                            <br>
                            trong cộng đồng VietCar
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2.5 text-center">
                        <div>
                            <i class="fa-solid fa-car-side text-5xl text-primary"></i>
                        </div>
                        <h5 class="text-2xl font-bold mt-2">100+</h5>
                        <p class="text-gray-700">
                            Dòng xe
                            <br>
                            khác nhau đang cho thuê
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2.5 text-center">
                        <div>
                            <i class="fa-solid fa-globe text-5xl text-primary"></i>
                        </div>
                        <h5 class="text-2xl font-bold mt-2">10+</h5>
                        <p class="text-gray-700">
                            Thành phố
                            <br>
                            VietCar đã có mặt
                        </p>
                    </div>
                    <div class="flex flex-col items-center gap-2.5 text-center">
                        <div>
                            <i class="fa-solid fa-star text-5xl text-primary"></i>
                        </div>
                        <h5 class="text-2xl font-bold mt-2">4.95/5*</h5>
                        <p class="text-gray-700">
                            Là số điểm nhận được từ >50,000 khách hàng
                            <br>
                            đánh giá về dịch vụ của chúng tôi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
