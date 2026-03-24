@extends('layouts.index')

@section('content')
    <div class="flex justify-center my-8">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-lg shadow-lg border-0">
                <div class="p-6">
                    <h5 class="text-center text-2xl font-bold mb-6">Đăng nhập</h5>
                    @include('layouts.notification')
                    <div class="my-6 p-4 bg-gray-50 rounded-lg">
                        <p class="font-semibold mb-2">Tài khoản test:</p>
                        <p class="text-lg">Admin: Tài khoản: admin@gmail.com | Mật khẩu: 123456</p>
                        <p class="text-lg">User: Tài khoản: khach5@gmail.com | Mật khẩu: 123456</p>
                    </div>

                    <form action="{{ route('auth.dangnhap') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email"
                                class="w-full px-4 py-3 border rounded-md focus:outline-none {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                                id="email" name="email" placeholder="Nhập email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mật khẩu</label>
                            <input type="password"
                                class="w-full px-4 py-3 border rounded-md focus:outline-none {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                                id="password" name="password" placeholder="Nhập mật khẩu">

                            @if ($errors->has('password'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- Bạn chưa có tài khoản -->
                        <div class="text-sm mb-4">
                            Bạn chưa là thành viên? <a href="{{ route('pages.dangky') }}"
                                class="text-primary hover:underline font-semibold">Đăng ký ngay</a>
                        </div>
                        <button type="submit"
                            class="w-full bg-primary text-white py-3 rounded-md font-semibold hover:bg-primary-dark transition-colors mt-6">Đăng
                            nhập</button>
                        <div class="flex items-center my-4">
                            <div class="flex-1 h-px bg-gray-300"></div>
                            <span class="px-4 text-sm text-gray-500">or</span>
                            <div class="flex-1 h-px bg-gray-300"></div>
                        </div>
                        <div class="flex justify-center my-4">
                            <a href="{{ route('auth.google') }}">
                                <img width="200px" src="./upload/images/login.png" alt="Google Login">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection