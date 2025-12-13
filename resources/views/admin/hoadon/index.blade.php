@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    @include('layouts.notification')
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                    <h5 class="text-xl font-bold">Danh sách hoá đơn <span class="text-gray-500 font-normal">({{ $hoaDons->count() }} hoá đơn)</span></h5>
                        </div>
                    </div>
            <div class="overflow-x-auto">
                <table id="myTable" class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                            <tr>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">STT</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Xe</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Biển số</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Người thuê</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">CCCD</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày nhận xe</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày trả xe</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Thành tiền</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày thanh toán</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tình trạng thanh toán</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Duyệt</th>
                            <th scope="col" class="px-4 py-3 text-center text-sm font-semibold text-gray-700 border-b">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dem = 0;
                            @endphp
                            @forelse ($hoaDons as $hoaDon)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border-b">{{ ++$dem }}</td>
                                <td class="px-4 py-3 border-b">{{ $hoaDon->xe->tenxe }}</td>
                                <td class="px-4 py-3 border-b">{{ $hoaDon->xe->bienso }}</td>
                                <td class="px-4 py-3 border-b">{{ $hoaDon->user->hoten }}</td>
                                <td class="px-4 py-3 border-b">{{ $hoaDon->user->cccd }}</td>
                                <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($hoaDon->ngaynhanxe)) }}</td>
                                <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($hoaDon->ngaytraxe)) }}</td>
                                <td class="px-4 py-3 border-b">{{ number_format($hoaDon->tongtien) }} đồng</td>
                                <td class="px-4 py-3 border-b">
                                    {{ date('d/m/Y', strtotime($hoaDon->ngaythanhtoan)) == '01/01/1970' ? '01/01/1970' : date('d/m/Y', strtotime($hoaDon->ngaythanhtoan)) }}
                                </td>
                                <td class="px-4 py-3 border-b">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $hoaDon->tinhtranghoadon == 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $hoaDon->tinhtranghoadon == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' }}
                                    </span>
                                    </td>
                                <td class="px-4 py-3 border-b">
                                    <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" {{ $hoaDon->tinhtranghoadon == 0 ? '' : 'checked' }}
                                                hoadon-id="{{ $hoaDon->idhoadon }}"
                                            class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary js_checkbox_tinhtrang"
                                                id="checkBox_{{ $hoaDon->idhoadon }}">
                                    </label>
                                    </td>
                                <td class="px-4 py-3 border-b text-center">
                                    <div class="flex items-center justify-center">
                                        <a href="#" class="text-red-500 hover:underline font-semibold js_btn_xoa_hoa_don" hoadon-id="{{ $hoaDon->idhoadon }}">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                        <form id="js_form_xoa_hoa_don_{{ $hoaDon->idhoadon }}" action="{{ route('hoadon.destroy', $hoaDon->idhoadon) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="px-4 py-8 text-center text-gray-500">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.js_checkbox_tinhtrang', function(e) {
                e.preventDefault();
                let checked = $(this).prop('checked');
                let hoaDonId = $(this).attr('hoadon-id')
                let tinhTrang;
                (checked) ? tinhTrang = 1: tinhTrang = 0;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: "admin/update-tinh-trang-hoa-don",
                    data: {
                        idhoadon: hoaDonId,
                        tinhtranghoadon: tinhTrang
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            });

            $('body').on('click', '.js_btn_xoa_hoa_don', function(e) {
                e.preventDefault();
                let id = $(this).attr('hoadon-id');
                if (confirm('Bạn có chắc chắn?')) {
                    $(`#js_form_xoa_hoa_don_${id}`).submit();
                }
            });
        });
    </script>
@endsection
