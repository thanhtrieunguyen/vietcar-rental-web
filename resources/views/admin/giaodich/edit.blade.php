@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                            <h5 class="text-xl font-bold">Cập nhật giao dịch khách hàng <small class="text-gray-500 font-normal">{{ $giaoDich->user->hoten }}</small></h5>
                        </div>
                        <div>
                            <a href="{{ route('giaodich.index') }}" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition-colors flex items-center gap-2">
                                <i class="fas fa-list-ul"></i> Danh sách
                            </a>
                        </div>
                    </div>
                    @include('layouts.notification')
                    <form action="{{ route('giaodich.update', $giaoDich->idgiaodich) }}" class="mb-3" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <div class="mb-4">
                                <label for="tenxe" class="block text-sm font-semibold text-gray-700 mb-2">Tên xe</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="tenxe" name="tenxe">
                                    @foreach ($xes as $xe)
                                        <option value="{{ $xe->tenxe }}" {{ $giaoDich->xe->tenxe == $xe->tenxe ? 'selected' : '' }}>
                                            {{ $xe->tenxe }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="bienso" class="block text-sm font-semibold text-gray-700 mb-2">Biển số xe</label>
                                <select class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-600" id="bienso" name="bienso" disabled>
                                    @foreach ($xes as $xe)
                                        <option value="{{ $xe->bienso }}" {{ $giaoDich->xe->bienso == $xe->bienso ? 'selected' : '' }}>
                                            {{ $xe->bienso }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="bienso" value="{{ $giaoDich->xe->bienso }}">
                            </div>
                            <div class="mb-4">
                                <label for="cmnd" class="block text-sm font-semibold text-gray-700 mb-2">CCCD người thuê</label>
                                <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary typeahead" 
                                    id="searchcccd" name="cccd" placeholder="Tìm CMND người thuê" required value="{{ $giaoDich->user->cccd }}">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="ngayNhanXe" class="block text-sm font-semibold text-gray-700 mb-2">Ngày nhận xe</label>
                                    <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                        id="ngayNhanXe" name="ngaynhanxe" placeholder="Chọn ngày nhận xe" required value="{{ date('Y-m-d', strtotime($giaoDich->ngaynhanxe)) }}">
                                </div>
                                <div>
                                    <label for="ngayTraXe" class="block text-sm font-semibold text-gray-700 mb-2">Ngày trả xe</label>
                                    <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                        id="ngayTraXe" name="ngaytraxe" placeholder="Chọn ngày trả" required value="{{ date('Y-m-d', strtotime($giaoDich->ngaytraxe)) }}">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="soNgayThue" class="block text-sm font-semibold text-gray-700 mb-2">Số ngày thuê</label>
                                    <span class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 js_so_ngay_thue">{{ $songaythue }}</span>
                                </div>
                                <div>
                                    <label for="donGia" class="block text-sm font-semibold text-gray-700 mb-2">Giá thuê/ngày</label>
                                    <span class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 js_don_gia">{{ number_format($giaoDich->xe->gia) }} vnđ</span>
                                </div>
                                <input type="hidden" name="phidv" value="20000">
                            </div>
                            <div class="mb-4">
                                <label for="thanhTien" class="block text-sm font-semibold text-gray-700 mb-2">Thành tiền</label>
                                <span class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 js_thanh_tien">{{ number_format($giaoDich->tongtien) }} vnđ</span>
                                <input type="hidden" name="tongtien" id="tongtien">
                            </div>
                        </div>
                        <div class="flex justify-end gap-3">
                            <button type="reset" class="px-6 py-2 bg-gray-500 text-white rounded-lg font-semibold hover:bg-gray-600 transition-colors flex items-center gap-2" id="refreshButton">
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

@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var pathCCCD = "{{ route('getcccd') }}";

        $(document).ready(function() {
            $('#tenxe').on('change', function() {
                var tenXe = $(this).val();
                $('#bienso').html('<option value="" selected disabled>Chọn biển số xe</option>');

                clearData();

                $.ajax({
                    url: '{{ route('getbien-so-xe') }}',
                    type: 'GET',
                    data: {
                        tenxe: tenXe
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length > 0) {
                            $.each(data, function(key, value) {
                                $('#bienso').append('<option value="' + value + '">' + value + '</option>');
                            });
                        } else {
                            $('#bienso').append('<option value="">Không có biển số xe</option>');
                        }
                    },
                    error: function() {
                        alert('Lỗi khi tải dữ liệu biển số xe');
                    }
                });
            });
        });

        $('#searchcccd').typeahead({
            source: function(query, process) {
                $.get(pathCCCD, {
                    query: query
                }, function(data) {
                    process(data.map(function(item) {
                        return item.cccd;
                    }));
                });
            }
        });

        $('#tenxe').on('change', function() {
            $('#bienso').prop('disabled', false);
        });

        function clearData() {
            donGiaElement.textContent = '';
            thanhTienElement.textContent = '';
            document.getElementById('tongtien').value = '';
        }
    </script>

    <script>
        var ngayNhanXeInput = document.getElementById('ngayNhanXe');
        var ngayTraXeInput = document.getElementById('ngayTraXe');
        var soNgayThueElement = document.querySelector('.js_so_ngay_thue');
        var donGiaElement = document.querySelector('.js_don_gia');
        var thanhTienElement = document.querySelector('.js_thanh_tien');

        $('#bienso').on('change', function() {
            var bienSo = $(this).val();

            $.ajax({
                url: '{{ route('get-don-gia') }}',
                type: 'GET',
                data: {
                    bienso: bienSo
                },
                dataType: 'json',
                success: function(data) {
                    var formattedPrice = new Intl.NumberFormat('vi-VN').format(data);
                    formattedPrice = formattedPrice.replace(/\./g, ',');
                    donGiaElement.textContent = formattedPrice.toLocaleString() + ' đồng';
                    updateThanhTien();
                },
                error: function() {
                    alert('Lỗi khi lấy đơn giá');
                }
            });
        });

        ngayNhanXeInput.addEventListener('change', function() {
            updateSoNgayThueAndThanhTien();
        });

        ngayTraXeInput.addEventListener('change', function() {
            updateSoNgayThueAndThanhTien();
        });

        function updateSoNgayThueAndThanhTien() {
            var ngayNhanXe = new Date(ngayNhanXeInput.value);
            var ngayTraXe = new Date(ngayTraXeInput.value);

            if (ngayNhanXeInput.value && ngayTraXeInput.value) {
                if (ngayTraXe < ngayNhanXe) {
                    alert('Ngày trả xe không thể trước ngày nhận xe. Vui lòng chọn lại.');
                    ngayTraXeInput.value = '';
                    soNgayThueElement.textContent = 'Không hợp lệ';
                    thanhTienElement.textContent = 'Không hợp lệ';
                    return;
                } else {
                    var soNgayThue = Math.ceil((ngayTraXe - ngayNhanXe) / (1000 * 3600 * 24));
                    soNgayThueElement.textContent = soNgayThue;
                    updateThanhTien();
                }
            }
        }

        function updateThanhTien() {
            var soNgayThue = parseInt(soNgayThueElement.textContent);
            var donGia = parseInt(donGiaElement.textContent.replace(/\D/g, ''));

            if (!isNaN(soNgayThue)) {
                var thanhTien = soNgayThue * donGia;
                thanhTienElement.textContent = thanhTien.toLocaleString() + ' đồng';
                document.getElementById('tongtien').value = thanhTien;
            }
        }
    </script>
@endsection

