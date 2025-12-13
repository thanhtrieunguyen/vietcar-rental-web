@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    @include('layouts.notification')
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                    <h5 class="text-xl font-bold">Danh sách Dòng xe <span class="text-gray-500 font-normal">({{ $dongXes->count() }} dòng xe)</span></h5>
                        </div>
                        <div>
                    <a href="{{ route('dongxe.create') }}" class="px-4 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2">
                        <i class="fas fa-plus"></i> Thêm
                    </a>
                        </div>
                    </div>
            <div class="overflow-x-auto">
                <table id="myTable" class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                            <tr>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">STT</th>
                            <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tên Dòng xe</th>
                            <th scope="col" class="px-4 py-3 text-center text-sm font-semibold text-gray-700 border-b">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dongXes as $index => $dongxe)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border-b">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 border-b">{{ $dongxe->tendongxe }}</td>
                                <td class="px-4 py-3 border-b text-center">
                                    <div class="flex items-center justify-center gap-4">
                                        <a href="{{ route('dongxe.edit', $dongxe->iddongxe) }}" class="text-primary hover:underline font-semibold">
                                            <i class="fa fa-edit"></i> Cập nhật
                                        </a>
                                        <a href="#" class="text-red-500 hover:underline font-semibold js_btn_xoa_xe" xe-id="{{ $dongxe->iddongxe }}">
                                            <i class="fa fa-trash"></i> Xóa
                                        </a>
                                        <form id="js_form_xoa_xe_{{ $dongxe->iddongxe }}" action="{{ route('dongxe.destroy', $dongxe->iddongxe) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="px-4 py-8 text-center text-gray-500">Không có dữ liệu</td>
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
            $('body').on('click', '.js_btn_xoa_xe', function(e) {
                e.preventDefault();
                let id = $(this).attr('xe-id');
                if (confirm('Bạn có chắc chắn?')) {
                    $(`#js_form_xoa_xe_${id}`).submit();
                }
            });
        });
    </script>
@endsection
