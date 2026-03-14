@extends('layouts.index')

@section('content')
    <div class="flex items-center justify-center min-h-[60vh]">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-br from-red-400 to-red-600 p-12 text-center relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white opacity-10 rounded-full"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                
                <div class="relative z-10">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl">
                        <i class="ti-close text-5xl text-red-500"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 uppercase tracking-wider">Thất bại!</h2>
                    <p class="text-red-50 text-lg">Đã có lỗi xảy ra khi xử lý</p>
                </div>
            </div>
            
            <div class="p-10 text-center">
                <div class="bg-red-50 rounded-2xl p-6 mb-8 border border-red-100">
                    <p class="text-gray-700 leading-relaxed font-medium">
                        {{ request('message') }}
                    </p>
                </div>
                
                <p class="text-sm text-gray-500 mb-8">Vui lòng kiểm tra lại thông tin thanh toán hoặc thử lại sau vài phút.</p>
                
                <div class="flex flex-col gap-4">
                    <button onclick="window.history.back()" class="w-full py-4 bg-red-500 text-white rounded-xl font-bold hover:bg-red-600 transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                        <i class="ti-reload"></i> Thử lại ngay
                    </button>
                    <a href="/pages/contact" class="w-full py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-all flex items-center justify-center gap-2">
                        <i class="ti-headphone-alt"></i> Liên hệ hỗ trợ
                    </a>
                </div>
            </div>
            
            <div class="bg-gray-50 py-4 text-center border-t border-gray-100">
                <a href="/" class="text-xs text-blue-600 hover:underline">Quay lại trang chủ</a>
            </div>
        </div>
    </div>
@endsection
