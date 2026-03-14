@extends('layouts.index')

@section('content')
    <div class="flex items-center justify-center min-h-[60vh]">
        <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-br from-green-400 to-green-600 p-12 text-center relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-white opacity-10 rounded-full"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                
                <div class="relative z-10">
                    <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl">
                        <i class="ti-check text-5xl text-green-500"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-white mb-2 uppercase tracking-wider">Thành công!</h2>
                    <p class="text-green-50 text-lg">Giao dịch của bạn đã hoàn tất</p>
                </div>
            </div>
            
            <div class="p-10 text-center">
                <div class="bg-green-50 rounded-2xl p-6 mb-8 border border-green-100">
                    <p class="text-gray-700 leading-relaxed font-medium">
                        {{ request('message') }}
                    </p>
                </div>
                
                <div class="flex flex-col gap-4">
                    <a href="/" class="w-full py-4 bg-gray-900 text-white rounded-xl font-bold hover:bg-black transition-all shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                        <i class="ti-home"></i> Quay về trang chủ
                    </a>
                    <a href="/trangcanhan" class="w-full py-4 bg-white border-2 border-gray-200 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition-all flex items-center justify-center gap-2">
                        <i class="ti-user"></i> Xem lịch sử đặt xe
                    </a>
                </div>
            </div>
            
            <div class="bg-gray-50 py-4 text-center border-t border-gray-100">
                <p class="text-xs text-gray-400">Cảm ơn bạn đã tin tưởng dịch vụ của VietCar</p>
            </div>
        </div>
    </div>
@endsection
