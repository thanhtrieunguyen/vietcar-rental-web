@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    @include('layouts.notification')
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                    <h5 class="text-xl font-bold">Danh sách xe <span class="text-gray-500 font-normal">({{ $xes->total() }} xe)</span></h5>
                        </div>
                        <div>
                    <a href="{{ route('xe.create') }}" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2">
                        <i class="fas fa-plus"></i> Thêm
                    </a>
                        </div>
                    </div>
            <div class="overflow-x-auto">
                <table id="myTable" class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                            <tr>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">STT</th>
                            <th scope="col" colspan="2" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Hình</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tên xe</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Biển số</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Giá thuê</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Truyền động</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Nhiên liệu</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tiêu hao</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Dòng xe</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Hãng xe</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tình trạng</th>
                            <th scope="col" class="px-4 py-3 text-center text-sm font-semibold text-gray-700 border-b">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $startIndex = ($xes->currentPage() - 1) * $xes->perPage() + 1;
                            @endphp
                            @forelse ($xes as $index => $xe)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border-b">{{ $startIndex + $index }}</td>
                                <td class="px-4 py-3 border-b" style="height: 60px; width: 120px">
                                        @php
                                            $array = json_decode($xe->hinhxe->hinhxe);
                                            $img1 = isset($array[0]) ? $array[0] : null;
                                        @endphp
                                    <div class="flex">
                                        <img src="{{ $img1 }}" class="w-full h-full object-cover rounded" alt="{{ $xe->tenxe }}">
                                        </div>
                                    </td>
                                <td class="px-4 py-3 border-b" style="height: 60px; width: 120px">
                                        @php
                                            $img2 = isset($array[1]) ? $array[1] : null;
                                        @endphp
                                    <div class="flex">
                                        <img src="{{ $img2 }}" class="w-full h-full object-cover rounded" alt="{{ $xe->tenxe }}">
                                        </div>
                                    </td>
                                <td class="px-4 py-3 border-b">
                                    <a href="{{ route('xe.show', $xe->idxe) }}" class="text-primary hover:underline">
                                            {{ $xe->tenxe }}
                                        </a>
                                    </td>
                                <td class="px-4 py-3 border-b">{{ $xe->bienso }}</td>
                                <td class="px-4 py-3 border-b">{{ number_format($xe->gia) }} đồng</td>
                                <td class="px-4 py-3 border-b">{{ $xe->truyendong }}</td>
                                <td class="px-4 py-3 border-b">{{ $xe->nhienlieu }}</td>
                                <td class="px-4 py-3 border-b">{{ $xe->nhienlieutieuhao_km }} Km/Lít</td>
                                <td class="px-4 py-3 border-b">{{ $xe->dongXe->tendongxe }}</td>
                                <td class="px-4 py-3 border-b">{{ $xe->hangXe->tenhangxe }}</td>
                                <td class="px-4 py-3 border-b">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $xe->tinhtrang == 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $xe->tinhtrang == 0 ? 'Chưa đặt' : 'Đã đặt' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border-b text-center">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('xe.edit', $xe->idxe) }}" class="text-primary hover:underline font-semibold">
                                            <i class="fa fa-edit"></i> Cập nhật
                                        </a>
                                        <a href="#" class="text-red-500 hover:underline font-semibold js_btn_xoa_xe" xe-id="{{ $xe->idxe }}">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                        <form id="js_form_xoa_xe_{{ $xe->idxe }}" action="{{ route('xe.destroy', $xe->idxe) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="13" class="px-4 py-8 text-center text-gray-500">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            <div class="mt-6 flex justify-center">
                {!! $xes->withQueryString()->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.js_btn_xoa_xe').click(function(e) {
                e.preventDefault();
                var xeId = $(this).attr('xe-id');
                if (confirm('Bạn có chắc chắn muốn xóa xe này không?')) {
                    $('#js_form_xoa_xe_' + xeId).submit();
                }
            });
        });
    </script>
@endsection
