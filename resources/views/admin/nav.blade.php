<div class="sticky top-16 z-30 bg-white rounded-lg shadow-md py-2 mb-4">
    <ul class="flex flex-wrap justify-center items-center gap-2 md:gap-4">
        <li>
            <a class="px-4 py-2 text-black font-semibold hover:text-primary transition-colors rounded-md" href="{{ route('admin.thongke') }}">Thống kê</a>
        </li>
        <li>
            <a class="px-4 py-2 text-black font-semibold hover:text-primary transition-colors rounded-md" href="{{ route('user.index') }}">Quản lý khách hàng</a>
        </li>
        <li class="relative group">
            <a class="px-4 py-2 text-black font-semibold hover:text-primary transition-colors rounded-md flex items-center gap-1 cursor-pointer" href="#">
                Quản lý xe
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <div class="absolute top-full left-0 mt-1 bg-white rounded-lg shadow-lg py-2 min-w-[200px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                <a class="block px-4 py-2 text-black hover:bg-gray-100 transition-colors" href="{{ route('xe.index') }}">Quản lý xe</a>
                <a class="block px-4 py-2 text-black hover:bg-gray-100 transition-colors" href="{{ route('dongxe.index') }}">Quản lý dòng xe</a>
                <a class="block px-4 py-2 text-black hover:bg-gray-100 transition-colors" href="{{ route('hangxe.index') }}">Quản lý hãng xe</a>
                    </div>
        </li>
        <li>
            <a class="px-4 py-2 text-black font-semibold hover:text-primary transition-colors rounded-md" href="{{ route('giaodich.index') }}">Quản lý giao dịch</a>
        </li>
        <li>
            <a class="px-4 py-2 text-black font-semibold hover:text-primary transition-colors rounded-md" href="{{ route('hoadon.index') }}">Quản lý hoá đơn</a>
        </li>
    </ul>
</div>
