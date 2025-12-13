@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                            <h5 class="text-xl font-bold">Cập nhật xe <small class="text-gray-500 font-normal">{{ $xe->tenxe }}</small></h5>
                        </div>
                        <div>
                            <a href="{{ route('xe.index') }}" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition-colors flex items-center gap-2">
                                <i class="fas fa-list-ul"></i> Danh sách
                            </a>
                        </div>
                    </div>
                    @include('layouts.notification')
                    <form action="{{ route('xe.update', $xe->idxe) }}" class="mb-3" method="POST" enctype="multipart/form-data" onsubmit="return checkImageLimit()">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="loaiXe" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Dòng xe<strong class="text-red-500">(*)</strong>
                                </label>
                                <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('iddongxe') ? 'border-red-500' : 'border-gray-300' }}"
                                    name="iddongxe" id="dongXe">
                                    <option selected disabled>Chọn dòng xe</option>
                                    @foreach ($dongXe as $dongXe)
                                        <option value="{{ $dongXe->iddongxe }}" {{ (old('iddongxe') ?? $xe->iddongxe) == $dongXe->iddongxe ? 'selected' : '' }}>
                                            {{ $dongXe->tendongxe }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('iddongxe'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('iddongxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Hãng xe<strong class="text-red-500">(*)</strong>
                                </label>
                                <select class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('idhangxe') ? 'border-red-500' : 'border-gray-300' }}"
                                    name="idhangxe" id="hangXe" onchange="hideErrorAndClass()">
                                    <option selected disabled>Chọn hãng xe</option>
                                    @foreach ($hangXe as $hangXe)
                                        <option value="{{ $hangXe->idhangxe }}" {{ (old('idhangxe') ?? $xe->idhangxe) == $hangXe->idhangxe ? 'selected' : '' }}>
                                            {{ $hangXe->tenhangxe }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->any())
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('idhangxe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="tenXe" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tên xe<strong class="text-red-500">(*)</strong>
                            </label>
                            <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('tenxe') ? 'border-red-500' : 'border-gray-300' }}"
                                id="tenXe" name="tenxe" placeholder="Nhập tên xe" value="{{ old('tenxe', $xe->tenxe) }}">
                            @if ($errors->has('tenxe'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('tenxe') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="bienSo" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Biển số xe<strong class="text-red-500">(*)</strong>
                                </label>
                                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('bienso') ? 'border-red-500' : 'border-gray-300' }}"
                                    id="bienSo" name="bienso" placeholder="Nhập biển số xe" value="{{ old('bienso', $xe->bienso) }}">
                                @if ($errors->any())
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('bienso') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div>
                                <label for="gia" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Giá thuê<strong class="text-red-500">(*)</strong>
                                </label>
                                <input type="text" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('gia') ? 'border-red-500' : 'border-gray-300' }}"
                                    id="gia" name="gia" placeholder="Nhập giá thuê" value="{{ old('gia', $xe->gia) }}" oninput="formatCurrency(this)">
                                @if ($errors->has('gia'))
                                    <span class="text-red-500 text-sm mt-1 block" role="alert">
                                        <strong>{{ $errors->first('gia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label for="truyenDong" class="block text-sm font-semibold text-gray-700 mb-2">Truyền động</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" name="truyendong" id="truyenDong">
                                    <option selected disabled>Chọn truyền động xe</option>
                                    <option value="Số tự động" {{ (old('truyendong') ?? $xe->truyendong) == 'Số tự động' ? 'selected' : '' }}>Số tự động</option>
                                    <option value="Số sàn" {{ (old('truyendong') ?? $xe->truyendong) == 'Số sàn' ? 'selected' : '' }}>Số sàn</option>
                                </select>
                            </div>
                            <div>
                                <label for="nhienLieu" class="block text-sm font-semibold text-gray-700 mb-2">Nhiên liệu</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" name="nhienlieu" id="nhienLieu">
                                    <option selected disabled>Chọn nhiên liệu xe</option>
                                    <option value="Xăng" {{ (old('nhienlieu') ?? $xe->nhienlieu) == 'Xăng' ? 'selected' : '' }}>Xăng</option>
                                    <option value="Điện" {{ (old('nhienlieu') ?? $xe->nhienlieu) == 'Điện' ? 'selected' : '' }}>Điện</option>
                                    <option value="Dầu" {{ (old('nhienlieu') ?? $xe->nhienlieu) == 'Dầu' ? 'selected' : '' }}>Dầu</option>
                                </select>
                            </div>
                            <div>
                                <label for="nhienlieutieuhao_km" class="block text-sm font-semibold text-gray-700 mb-2">Nhiên liệu tiêu hao lít/Km</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
                                    id="nhienlieutieuhao_km" name="nhienlieutieuhao_km" placeholder="Nhập nhiên liệu tiêu hao" value="{{ old('nhienlieutieuhao_km', $xe->nhienlieutieuhao_km) }}">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="mieuTa" class="block text-sm font-semibold text-gray-700 mb-2">Miêu tả</label>
                            @php
                                function convertNewlines($text) {
                                    return str_replace('\n', "\n", $text);
                                }
                                $des = convertNewlines($xe->mieuta);
                            @endphp
                            <textarea class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('mieuta') ? 'border-red-500' : 'border-gray-300' }}" 
                                name="mieuta" id="mieuTa" rows="3" placeholder="Nhập miêu tả">{{ old('mieuta') ?? $des }}</textarea>
                            @if ($errors->has('mieuta'))
                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                    <strong>{{ $errors->first('mieuta') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="mb-4">
                                <label for="inputHinh" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Chọn hình<em class="text-gray-500 font-normal">(optional)</em>
                                </label>
                                <input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                    id="inputHinh" name="hinhxe[]" multiple>
                                <div class="mt-2">
                                    <button type="button" onclick="resetFileInput()" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors">
                                        Xoá hình
                                    </button>
                                </div>
                                <div class="preview mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @if ($hinhXeArr)
                                        @foreach ($hinhXeArr as $url)
                                            <div class="p-2 border border-gray-200 rounded-lg">
                                                <img src="{{ $url }}" class="w-full h-auto rounded-lg object-cover">
                                                <label class="block mt-2 text-sm">
                                                    <input type="checkbox" name="xoa_hinh[]" value="{{ $url }}" class="mr-2">
                                                    Xoá
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div id="preview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                                <strong class="text-red-500 text-sm">{{ $errors->first('hinhxe') }}</strong>
                            </div>
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

    <script>
        const checkImageLimit = () => {
            const selectedImagesCount = document.querySelectorAll('input[name="hinhxe[]"]:checked').length;
            if (selectedImagesCount > 4) {
                alert('Bạn chỉ có thể chọn tối đa 4 ảnh');
                return false;
            }
            return true;
        };

        const resetFileInput = () => {
            $('#inputHinh').wrap('<form>').closest('form').get(0).reset();
            $('#inputHinh').unwrap();
            $('#preview').empty();
        }

        const preview = (file) => {
            const fr = new FileReader();
            fr.onload = () => {
                const img = document.createElement("img");
                img.src = fr.result;
                img.alt = file.name;
                img.className = "w-full h-auto rounded-lg object-cover";
                document.querySelector('#preview').append(img);
            };
            fr.readAsDataURL(file);
        };

        document.querySelector("#inputHinh").addEventListener("change", (ev) => {
            if (!ev.target.files) return;
            $('#preview').empty();
            [...ev.target.files].forEach(preview);
        });

        function formatCurrency(input) {
            var value = input.value.replace(/[^0-9]/g, '');
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            input.value = value;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var giaInput = document.getElementById('gia');
            formatCurrency(giaInput);
        });
    </script>
@endsection

