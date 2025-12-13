@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-lg border-0 p-6">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-normal uppercase py-3">Khách hàng</div>
                    <div class="text-red-500 py-3 flex items-center gap-2">
                        <span class="font-bold text-xl">{{ $totalKhachHang }} kh</span>
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg border-0 p-6">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-normal uppercase py-3">Tổng xe</div>
                    <div class="text-blue-500 py-3 flex items-center gap-2">
                        <span class="font-bold text-xl">{{ $totalXe }} xe</span>
                        <i class="fas fa-car text-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg border-0 p-6">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-normal uppercase py-3">Doanh thu</div>
                    <div class="text-green-500 py-3 flex items-center gap-2">
                        <span class="font-bold text-xl">{{ number_format($totalMoney[0]->total_money) }} đồng</span>
                        <i class="fas fa-hand-holding-usd text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            <div class="bg-white rounded-lg shadow-lg border-0 p-6">
                <h6 class="text-lg font-bold mb-4">Danh sách cho thuê xe ngày {{ date('d/m/Y') }}</h6>
                <div class="overflow-x-auto">
                    <table id="myTable" class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">STT</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tên khách hàng</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tên xe</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày nhận</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày trả</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dem = 0;
                            @endphp
                            @forelse ($giaoDichs as $giaoDich)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 border-b">{{ ++$dem }}</td>
                                    <td class="px-4 py-3 border-b">{{ $giaoDich->user->hoten }}</td>
                                    <td class="px-4 py-3 border-b">{{ $giaoDich->xe->tenxe }}</td>
                                    <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($giaoDich->ngaynhanxe)) }}</td>
                                    <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($giaoDich->ngaytraxe)) }}</td>
                                    <td class="px-4 py-3 border-b">{{ number_format($giaoDich->tongtien) }} đồng</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-gray-500">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
            </div>
        </div>

            <div class="bg-white rounded-lg shadow-lg border-0 p-6">
                <h6 class="text-lg font-bold mb-4">Danh sách giao dịch chưa duyệt</h6>
                <div class="overflow-x-auto">
                    <table id="myTable2" class="min-w-full border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">STT</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tên khách hàng</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tên xe</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tổng tiền</th>
                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                                $dem2 = 0;
                        @endphp
                            @forelse ($giaoDichsChuaDuyet as $giaoDich)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3 border-b">{{ ++$dem2 }}</td>
                                    <td class="px-4 py-3 border-b">{{ $giaoDich->user->hoten }}</td>
                                    <td class="px-4 py-3 border-b">{{ $giaoDich->xe->tenxe }}</td>
                                    <td class="px-4 py-3 border-b">{{ number_format($giaoDich->tongtien) }} đồng</td>
                                    <td class="px-4 py-3 border-b">
                                        <a href="{{ route('giaodich.edit', $giaoDich->idgiaodich) }}" 
                                           class="text-primary hover:underline font-semibold">Duyệt</a>
                                    </td>
                                </tr>
                        @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-gray-500">Không có dữ liệu</td>
                                </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
