@extends('layouts.index')

<head>
    <title>Contact</title>
    <link rel="icon" type="image/x-icon" href="icons/contact.png">
</head>
@section('content')
    <section class="max-w-7xl mx-auto px-4 py-8 md:py-12">
        <div class="mb-8 md:mb-12">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Liên hệ với chúng tôi</h1>
            <p class="text-lg md:text-xl text-gray-600">Chúng tôi luôn sẵn lòng hồi đáp lại phản hồi của bạn khi có thể !</p>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-6 bg-white rounded-lg overflow-hidden shadow-lg">
            <div class="flex-1 p-6 md:p-10 lg:p-12 border-r-0 lg:border-r border-gray-200">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Nhập thông tin</h3>
                <form method="post" action="./../public/functions/contact/contatc.php">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Họ và tên</label>
                            <input type="text" placeholder="Nhập tên của bạn" name="name" 
                                   class="w-full px-4 py-2 border-b border-gray-300 focus:outline-none focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Số điện thoại</label>
                            <input type="text" placeholder="(+84) 816232452" name="phone" 
                                   class="w-full px-4 py-2 border-b border-gray-300 focus:outline-none focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                            <input type="text" placeholder="Nhập email" name="email" 
                                   class="w-full px-4 py-2 border-b border-gray-300 focus:outline-none focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Địa chỉ</label>
                            <input type="text" placeholder="Nhập địa chỉ" name="address" 
                                   class="w-full px-4 py-2 border-b border-gray-300 focus:outline-none focus:border-primary">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nội dung</label>
                        <textarea rows="5" placeholder="Nội dung của bạn" name="content" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                    </div>
                    <button type="submit" name="submit" 
                            class="px-6 py-3 bg-gray-900 text-white rounded-full font-semibold hover:bg-gray-800 transition-colors shadow-lg">
                        GỬI
                    </button>
                </form>
            </div>

            <div class="flex-1 p-6 md:p-10 lg:p-12">
                <h4 class="text-xl font-bold mb-4">Thông tin về chúng tôi</h4>
                <h3 class="text-3xl font-bold mb-6">VietCar</h3>
                <table class="w-full">
                    <tr class="border-b border-gray-700">
                        <td class="py-4 pr-6 w-40"><i class="fa-solid fa-envelope mr-2"></i>Email</td>
                        <td class="py-4">vietcar@gmail.com</td>
                    </tr>
                    <tr class="border-b border-gray-700">
                        <td class="py-4 pr-6"><i class="fa-solid fa-phone mr-2"></i>Số điện thoại</td>
                        <td class="py-4">(+84) 816232452</td>
                    </tr>
                    <tr class="border-b border-gray-700">
                        <td class="py-4 pr-6"><i class="fa-solid fa-location-dot mr-2"></i>Địa chỉ</td>
                        <td class="py-4">18A Cộng Hoà, Phường 4, Quận Tân Bình, Thành phố Hồ Chí Minh</td>
                    </tr>
                    <tr class="border-b border-gray-700">
                        <td class="py-4 pr-6"><i class="fa-solid fa-globe mr-2"></i>Website</td>
                        <td class="py-4">www.vietcar.click</td>
                    </tr>
                    <tr class="border-b border-gray-700">
                        <td class="py-4 pr-6"><i class="fa-brands fa-facebook mr-2"></i>Facebook</td>
                        <td class="py-4">Thuê Xe VietCar</td>
                    </tr>
                    <tr>
                        <td class="py-4 pr-6"><i class="fa-brands fa-instagram mr-2"></i>Instagram</td>
                        <td class="py-4">@_VietCar</td>
                    </tr>
                </table>
            </div>
        </div>

        <section class="mt-12">
            <h2 class="text-center text-3xl md:text-4xl font-bold mb-4">Bản đồ vị trí</h2>
            <p class="text-center text-gray-600 mb-6">Xác định địa điểm của bạn nhanh chóng hơn</p>
            <div class="w-full rounded-lg overflow-hidden shadow-lg">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15676.805707878355!2d106.64669143391502!3d10.795879313210166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175292976c117ad%3A0x5b3f38b21051f84!2zSOG7jWMgdmnhu4duIEjDoG5nIGtow7RuZyBWaeG7h3QgTmFtIC0gQ1My!5e0!3m2!1svi!2sus!4v1704558397733!5m2!1svi!2sus"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
            </div>
        </section>
    </section>
@endsection
