@extends('layouts.index')

@section('content')
    @include('admin.nav')
    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                            <h5 class="text-xl font-bold">Thêm khách hàng</h5>
                        </div>
                        <div>
                            <a href="{{ route('user.index') }}" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition-colors flex items-center gap-2">
                                <i class="fas fa-list-ul"></i> Danh sách
                            </a>
                        </div>
                    </div>
                    @include('layouts.notification')
                    <form action="{{ route('user.store') }}" class="mb-3" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email<strong class="text-red-500">(*)</strong>
                            </label>
                            <input type="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                                id="email" name="email" placeholder="Nhập email" required value="{{ old('email') }}">
                            <small class="text-sm text-gray-500 mt-1 block">Mật khẩu mặc định là 12346</small>
                            @if ($errors->has('email'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="hoTen" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Họ tên<strong class="text-red-500">(*)</strong>
                                </label>
                                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('hoten') ? 'border-red-500' : 'border-gray-300' }}"
                                    id="hoTen" name="hoten" placeholder="Nhập họ tên" required value="{{ old('hoten') }}">
                                @if ($errors->has('hoten'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('hoten') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="cccd" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Căn cước công dân<strong class="text-red-500">(*)</strong>
                                </label>
                                <div class="flex items-center gap-2">
                                    <input type="text" class="flex-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('cccd') ? 'border-red-500' : 'border-gray-300' }}"
                                        id="cccd" name="cccd" placeholder="Nhập CCCD" required value="{{ old('cccd') }}" oninput="formatNumber(this)">
                                    <small class="text-sm text-gray-500 whitespace-nowrap">Phải có 12 số.</small>
                                </div>
                                @if ($errors->has('cccd'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('cccd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="ngaySinh" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Ngày sinh<strong class="text-red-500">(*)</strong>
                                </label>
                                <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                    id="ngaySinh" name="ngaysinh" placeholder="Chọn ngày sinh" required value="{{ old('ngaysinh') }}">
                            </div>
                            <div>
                                <label for="soDienThoai" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Số điện thoại<strong class="text-red-500">(*)</strong>
                                </label>
                                <div class="flex items-center gap-2">
                                    <input type="text" class="flex-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('sdt') ? 'border-red-500' : 'border-gray-300' }}"
                                        id="soDienThoai" name="sdt" placeholder="Nhập số điện thoại" required value="{{ old('sdt') }}" oninput="formatNumber(this)">
                                    <small class="text-sm text-gray-500 whitespace-nowrap">Phải có 10 số.</small>
                                </div>
                                @if ($errors->has('sdt'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('sdt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="diaChi" class="block text-sm font-semibold text-gray-700 mb-2">Địa chỉ</label>
                            <textarea class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('diachi') ? 'border-red-500' : 'border-gray-300' }}" 
                                id="diaChi" name="diachi" rows="2" placeholder="Nhập địa chỉ">{{ old('diachi') }}</textarea>
                            @if ($errors->has('diachi'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('diachi') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-end gap-3">
                            <button type="reset" class="px-6 py-2 bg-gray-500 text-white rounded-lg font-semibold hover:bg-gray-600 transition-colors flex items-center gap-2">
                                <i class="fas fa-sync-alt"></i> Làm mới
                            </button>
                            <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2">
                                <i class="fas fa-plus"></i> Thêm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function formatNumber(input) {
            var value = input.value.replace(/[^0-9]/g, '');
            input.value = value;
        }
    </script>
@endsection
