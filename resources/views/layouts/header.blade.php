<nav class="bg-white fixed top-0 left-0 right-0 z-50 shadow-sm" style="background-image: url(https://www.mioto.vn/static/media/header.350aa232.png);">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <a class="flex items-center" href="/">
                <img class="w-24 rounded-lg" src="/upload/slides/logo.png" alt="VietCar Logo">
            </a>

            <button class="md:hidden p-2 rounded-md text-gray-700 hover:bg-gray-100 focus:outline-none" type="button" id="mobile-menu-button" aria-label="Toggle navigation">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
        </button>

            <div class="hidden md:flex md:items-center md:space-x-4 flex-1 justify-end" id="myNavbar">
                <form action="{{ route('pages.timkiem') }}" class="flex items-center space-x-2 mr-4">
                    <input class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent w-48" 
                           type="search" placeholder="Tìm kiếm xe..." name="q" id="search" value="{{ old('search') }}">
                    <button class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors" type="submit">Tìm kiếm</button>
            </form>
                
                <div class="flex items-center space-x-4">
                    <a class="text-black font-bold text-sm px-4 py-3 hover:text-primary transition-colors" href="/">Trang chủ</a>
                    <a class="text-black font-bold text-sm px-4 py-3 hover:text-primary transition-colors" href="{{ route('pages.about') }}">Về VietCar</a>
                    <a class="text-black font-bold text-sm px-4 py-3 hover:text-primary transition-colors" href="{{ route('pages.thuexe') }}">Thuê xe</a>
                    <a class="text-black font-bold text-sm px-4 py-3 hover:text-primary transition-colors" href="{{ route('pages.contact') }}">Liên hệ</a>
                </div>

                <div class="flex items-center space-x-4 ml-4">
                    @auth
                        @can('is_admin')
                            <a class="text-black font-bold text-sm px-4 py-3 hover:text-primary transition-colors" href="{{ route('admin.thongke') }}">Quản trị</a>
                        @endcan
                        <a class="text-black font-bold text-sm px-4 py-3 hover:text-primary transition-colors" href="/trangcanhan">{{ auth()->user()->hoten }}</a>
                        <form action="{{ route('auth.dangxuat') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors font-bold">Đăng xuất</button>
                        </form>
                    @endauth
                    @guest
                        <a class="text-black font-bold text-sm px-4 py-3 hover:text-primary transition-colors" href="{{ route('pages.dangnhap') }}">Đăng nhập</a>
                        <a class="text-black font-bold text-sm px-4 py-3 border border-black rounded-md hover:bg-gray-100 transition-colors" href="{{ route('pages.dangky') }}">Đăng ký</a>
                    @endguest
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <form action="{{ route('pages.timkiem') }}" class="mb-4">
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md mb-2" type="search" placeholder="Tìm kiếm xe..." name="q" value="{{ old('search') }}">
                    <button class="w-full px-4 py-2 bg-primary text-white rounded-md" type="submit">Tìm kiếm</button>
                </form>
                <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="/">Trang chủ</a>
                <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="{{ route('pages.about') }}">Về VietCar</a>
                <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="{{ route('pages.thuexe') }}">Thuê xe</a>
                <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="{{ route('pages.contact') }}">Liên hệ</a>
                @auth
                    @can('is_admin')
                        <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="{{ route('admin.thongke') }}">Quản trị</a>
                    @endcan
                    <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="/trangcanhan">{{ auth()->user()->hoten }}</a>
                        <form action="{{ route('auth.dangxuat') }}" method="POST">
                            @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 bg-primary text-white rounded-md hover:bg-primary-dark">Đăng xuất</button>
                        </form>
                @endauth
                @guest
                    <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="{{ route('pages.dangnhap') }}">Đăng nhập</a>
                    <a class="block text-black font-bold px-3 py-2 hover:bg-gray-100 rounded-md" href="{{ route('pages.dangky') }}">Đăng ký</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu?.classList.toggle('hidden');
    });
</script>
