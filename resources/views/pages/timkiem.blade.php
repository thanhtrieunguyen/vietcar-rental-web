@extends('layouts.index')

<head>
    <title>Tìm kiếm</title>
    <link rel="icon" type="image/x-icon" href="upload/slides/car.png">
</head>
@section('content')
    <div class="w-full mt-4 mb-4">
        <h2 class="text-center text-2xl md:text-3xl font-bold text-gray-800">
            Kết quả tìm kiếm cho: <span class="text-primary">"{{ $query == null ? 'trống' : $query }}"</span>
        </h2>
        <p class="text-center text-gray-500 mt-2">{{ $xes->count() }} xe được tìm thấy</p>
    </div>

    <!-- Filter Section - Fixed on scroll -->
    <div class="fixed top-16 left-0 right-0 z-40 bg-white shadow-md transition-all duration-300" id="filter-section">
        <div class="max-w-7xl mx-auto px-4">
            <div class="py-4">
                <form action="{{ route('filter') }}" method="GET">
                    @if(request('q'))
                        <input type="hidden" name="q" value="{{ request('q') }}">
                    @endif
                    <div class="flex flex-col md:flex-row gap-4 items-center">
                        <div class="flex flex-wrap gap-2 flex-1 w-full md:w-auto">
                            <a href="{{ route('pages.thuexe') }}" class="relative flex items-center gap-2 border border-gray-400 rounded-full px-3 py-2 hover:bg-gray-50 transition-colors">
                                <i class="ti-back-left text-xl"></i>
                            </a>
                            <div class="relative flex items-center gap-2 border border-gray-400 rounded-full px-3 py-2">
                                <i class="ti-car text-xl"></i>
                                <select name="dongxe" class="outline-none border-none bg-transparent cursor-pointer text-sm">
                                    <option selected value="None">Dòng xe</option>
                                    @foreach ($dongXes as $dongXe)
                                        <option value="{{ $dongXe->iddongxe }}" {{ request('dongxe') == $dongXe->iddongxe ? 'selected' : '' }}>{{ $dongXe->tendongxe }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative flex items-center gap-2 border border-gray-400 rounded-full px-3 py-2">
                                <i class="ti-world text-xl"></i>
                                <select name="hangxe" class="outline-none border-none bg-transparent cursor-pointer text-sm">
                                    <option selected value="None">Hãng xe</option>
                                    @foreach ($hangXes as $hangXe)
                                        <option value="{{ $hangXe->idhangxe }}" {{ request('hangxe') == $hangXe->idhangxe ? 'selected' : '' }}>{{ $hangXe->tenhangxe }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-white border border-gray-400 rounded-full hover:bg-gray-50 transition-colors flex items-center gap-2 text-sm font-semibold">
                            <i class="ti-filter"></i>Bộ lọc
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="w-full mt-32 md:mt-28">
        <div class="w-full">
            <ul class="flex flex-wrap gap-5 justify-start">
                @foreach ($xes as $xe)
                    @php
                        $array = json_decode($xe->hinhxe->hinhxe);
                        $img1 = isset($array[1]) ? $array[1] : null;
                    @endphp
                    <li class="w-full sm:w-[calc(50%-10px)] lg:w-[calc(33.333%-14px)] xl:w-[calc(25%-15px)]">
                        <a href="{{ route('xe.show', ['id' => $xe->idxe]) }}" class="block border border-gray-200 rounded-xl p-4 bg-white hover:shadow-lg transition-shadow h-full cursor-pointer">
                            <div class="relative mb-4">
                                <span class="absolute top-2 left-2 z-10">
                                    <span class="px-2 py-1 rounded-full bg-black bg-opacity-50 text-white text-xs font-semibold flex items-center gap-1">
                                        Đặt xe nhanh 
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
                                    @if ($xe->nhienlieu == 'Xăng')
                                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-50 text-gray-800">{{ $xe->nhienlieu }}</span>
                                    @elseif ($xe->nhienlieu == 'Dầu diesel')
                                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-50 text-gray-800">{{ $xe->nhienlieu }}</span>
                                    @else
                                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-purple-50 text-gray-800">{{ $xe->nhienlieu }}</span>
                                    @endif
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
            <div class="mt-8 flex justify-center">
                {!! $xes->withQueryString()->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>

    <script>
        // Fixed filter on scroll
        window.addEventListener('scroll', function() {
            const filterSection = document.getElementById('filter-section');
            if (window.scrollY > 100) {
                filterSection.classList.add('shadow-lg');
            } else {
                filterSection.classList.remove('shadow-lg');
            }
        });
    </script>
@endsection
