@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                            <h5 class="text-xl font-bold">Cập nhật hãng xe <small class="text-gray-500 font-normal">{{ $hangXe->tenhangxe }}</small></h5>
                        </div>
                        <div>
                            <a href="{{ route('hangxe.index') }}" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition-colors flex items-center gap-2">
                                <i class="fas fa-list-ul"></i> Danh sách
                            </a>
                        </div>
                    </div>
                    @include('layouts.notification')
                    <form action="{{ route('hangxe.update', $hangXe->idhangxe) }}" class="mb-3" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="tenHangXe" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tên hãng xe<strong class="text-red-500">(*)</strong>
                            </label>
                            <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('tenhangxe') ? 'border-red-500' : 'border-gray-300' }}" 
                                id="tenHangXe" name="tenhangxe" placeholder="Nhập tên hãng xe" value="{{ $hangXe->tenhangxe }}">
                            @if ($errors->has('tenhangxe'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('tenhangxe') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="flex justify-end gap-3">
                            <button type="reset" class="px-6 py-2 bg-gray-500 text-white rounded-lg font-semibold hover:bg-gray-600 transition-colors flex items-center gap-2">
                                <i class="fas fa-sync-alt"></i> Làm mới
                            </button>
                            <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2">
                                <i class="fas fa-save"></i> Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
