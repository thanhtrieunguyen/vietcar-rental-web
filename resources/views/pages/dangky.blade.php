@extends('layouts.index')

@section('content')
    <div class="flex justify-center my-8">
        <div class="w-full max-w-2xl">
            <div class="bg-white rounded-lg shadow-lg border-0">
                <div class="p-6">
                    <h5 class="text-center text-2xl font-bold mt-6 mb-6">Đăng ký</h5>
                    @include('layouts.notification')
                    <form action="{{ route('auth.dangky') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="email" 
                                   class="w-full px-4 py-3 border rounded-md focus:outline-none  {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                                   name="email" placeholder="Nhập email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <input type="password" 
                                   class="w-full px-4 py-3 border rounded-md focus:outline-none  {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                                   name="password" placeholder="Nhập mật khẩu">

                            @if ($errors->has('password'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <input type="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none "
                                   name="password_confirmation" placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                            <div>
                                <input type="text" 
                                       class="w-full px-4 py-3 border rounded-md focus:outline-none  {{ $errors->has('hoten') ? 'border-red-500' : 'border-gray-300' }}"
                                       name="hoten" placeholder="Nhập họ tên" value="{{ old('hoten') }}">

                                @if ($errors->has('hoten'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('hoten') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <input type="text" 
                                       class="w-full px-4 py-3 border rounded-md focus:outline-none  {{ $errors->has('cccd') ? 'border-red-500' : 'border-gray-300' }}"
                                       name="cccd" placeholder="Nhập CCCD" value="{{ old('cccd') }}">

                                @if ($errors->has('cccd'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('cccd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                            <div>
                                <input type="date" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none "
                                       name="ngaysinh" placeholder="Chọn ngày sinh" value="{{ old('ngaysinh') }}">
                            </div>
                            <div>
                                <input type="text" 
                                       class="w-full px-4 py-3 border rounded-md focus:outline-none  {{ $errors->has('sdt') ? 'border-red-500' : 'border-gray-300' }}"
                                       name="sdt" placeholder="Nhập số điện thoại" value="{{ old('sdt') }}">

                                @if ($errors->has('sdt'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('sdt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4">
                            <textarea class="w-full px-4 py-3 border rounded-md focus:outline-none  {{ $errors->has('diachi') ? 'border-red-500' : 'border-gray-300' }}" 
                                      name="diachi" rows="2" placeholder="Nhập địa chỉ">{{ old('diachi') }}</textarea>

                            @if ($errors->has('diachi'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('diachi') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="text-sm mb-4">
                            Bạn đã có tài khoản? <a href="{{ route('pages.dangnhap') }}" class="text-primary hover:underline font-semibold">Đăng nhập ngay</a>
                        </div>
                        <button type="submit" class="w-full bg-primary text-white py-3 rounded-md font-semibold hover:bg-primary-dark transition-colors mt-6">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
