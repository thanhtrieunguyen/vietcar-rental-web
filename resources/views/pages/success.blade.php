@extends('layouts.index')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-center">
            <div class="w-full max-w-2xl">
                <div class="bg-white rounded-lg shadow-lg">
                    <div class="bg-green-500 text-white px-6 py-4 rounded-t-lg">
                        <h3 class="text-xl font-bold">Thanh toán thành công</h3>
                    </div>
                    <div class="p-6">
                        <div class="text-gray-700">{{ $message }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
