@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    @include('layouts.notification')
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                    <h5 class="text-xl font-bold">Danh sách giao dịch <span class="text-gray-500 font-normal">({{ $giaoDichs->count() }} giao dịch)</span></h5>
                        </div>
                        <div>
                    <a href="{{ route('giaodich.create') }}" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2">
                        <i class="fas fa-plus"></i> Thêm
                    </a>
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
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tình trạng</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Duyệt</th>
                            <th scope="col" class="px-4 py-3 text-center text-sm font-semibold text-gray-700 border-b">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dem = 0;
                            @endphp
                            @forelse ($giaoDichs as $giaoDich)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border-b">{{ ++$dem }}</td>
                                <td class="px-4 py-3 border-b">{{ $giaoDich->xe->tenxe }}</td>
                                <td class="px-4 py-3 border-b">{{ $giaoDich->xe->bienso }}</td>
                                <td class="px-4 py-3 border-b">{{ $giaoDich->user->hoten }}</td>
                                <td class="px-4 py-3 border-b">{{ $giaoDich->user->cccd }}</td>
                                <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($giaoDich->ngaynhanxe)) }}</td>
                                <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($giaoDich->ngaytraxe)) }}</td>
                                <td class="px-4 py-3 border-b">{{ number_format($giaoDich->tongtien) }} đồng</td>
                                <td class="px-4 py-3 border-b">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $giaoDich->tinhtranggiaodich == 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $giaoDich->tinhtranggiaodich == 0 ? 'Chưa duyệt' : 'Đã duyệt' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 border-b">
                                    <label class="flex items-center cursor-pointer">
                                            <input type="checkbox" {{ $giaoDich->tinhtranggiaodich == 0 ? '' : 'checked' }}
                                                giaodich-id="{{ $giaoDich->idgiaodich }}"
                                            class="w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary js_checkbox_tinhtrang"
                                                id="checkBox_{{ $giaoDich->idgiaodich }}">
                                    </label>
                                    </td>
                                <td class="px-4 py-3 border-b text-center">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('giaodich.edit', $giaoDich->idgiaodich) }}" class="text-primary hover:underline font-semibold">
                                            <i class="fa fa-edit"></i> Cập nhật
                                        </a>
                                        <a href="#" class="text-red-500 hover:underline font-semibold js_btn_xoa_giao_dich" giaodich-id="{{ $giaoDich->idgiaodich }}">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                        <form id="js_form_xoa_giao_dich_{{ $giaoDich->idgiaodich }}" action="{{ route('giaodich.destroy', $giaoDich->idgiaodich) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="11" class="px-4 py-8 text-center text-gray-500">Không có dữ liệu</td>
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
                let giaoDichId = $(this).attr('giaodich-id')
                let tinhTrang;
                (checked) ? tinhTrang = 1: tinhTrang = 0;
                if (confirm('Bạn có chắc chắn muốn thay đổi trạng thái của giao dịch không?')) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "admin/update-tinh-trang-giao-dich",
                        data: {
                            idgiaodich: giaoDichId,
                            tinhtranggiaodich: tinhTrang
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    });
                } else {
                    $(this).prop('checked', !checked);
                }
            });

            $('body').on('click', '.js_btn_xoa_giao_dich', function(e) {
                e.preventDefault();
                let id = $(this).attr('giaodich-id');
                if (confirm('Bạn có chắc chắn?')) {
                    $(`#js_form_xoa_giao_dich_${id}`).submit();
                }
            });
        });
    </script>
@endsection
