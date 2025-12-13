@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="max-w-7xl mx-auto px-4 mt-6">
        <div class="flex justify-center">
            <div class="w-full max-w-3xl">
                <div class="bg-white rounded-lg shadow-sm border-0 p-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 py-3 mb-4">
                        <div>
                            <h5 class="text-xl font-bold">Thêm giao dịch</h5>
                        </div>
                        <div>
                            <a href="{{ route('giaodich.index') }}" class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-semibold hover:bg-blue-200 transition-colors flex items-center gap-2">
                                <i class="fas fa-list-ul"></i> Danh sách
                            </a>
                        </div>
                    </div>
                    @include('layouts.notification')
                    <form action="{{ route('giaodich.store') }}" class="mb-3" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="tenxe" class="block text-sm font-semibold text-gray-700 mb-2">Tên xe</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="tenxe" name="tenxe" required></select>
                        </div>
                        <div class="mb-4">
                            <label for="bienso" class="block text-sm font-semibold text-gray-700 mb-2">Biển số xe</label>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="bienso" name="bienso" required></select>
                        </div>
                        <div class="mb-4">
                            <label for="cccd" class="block text-sm font-semibold text-gray-700 mb-2">CCCD người thuê</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary typeahead" 
                                id="searchcccd" name="cccd" placeholder="Tìm CCCD người thuê" required>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="ngayNhanXe" class="block text-sm font-semibold text-gray-700 mb-2">Ngày nhận xe</label>
                                <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                    id="ngayNhanXe" name="ngaynhanxe" placeholder="Chọn ngày nhận xe" required>
                            </div>
                            <div>
                                <label for="ngayTraXe" class="block text-sm font-semibold text-gray-700 mb-2">Ngày trả xe</label>
                                <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                    id="ngayTraXe" name="ngaytraxe" placeholder="Chọn ngày trả" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="soNgayThue" class="block text-sm font-semibold text-gray-700 mb-2">Số ngày thuê</label>
                                <span class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 js_so_ngay_thue"></span>
                            </div>
                            <div>
                                <label for="donGia" class="block text-sm font-semibold text-gray-700 mb-2">Giá thuê/ngày</label>
                                <span class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 js_don_gia"></span>
                            </div>
                            <input type="hidden" name="phidv" value="20000">
                        </div>
                        <div class="mb-4">
                            <label for="thanhTien" class="block text-sm font-semibold text-gray-700 mb-2">Thành tiền</label>
                            <span class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-50 js_thanh_tien"></span>
                            <input type="hidden" name="tongtien" id="tongtien">
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
@endsection

@section('script')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var pathCCCD = "{{ route('getcccd') }}";

        $(document).ready(function() {
            $.ajax({
                url: '{{ route('getall-xe') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#tenxe').append('<option value="" selected disabled>Chọn tên xe</option>');
                    $('#bienso').append('<option value="" selected disabled>Chọn biển số xe</option>');

                    $.each(data, function(key, value) {
                        $('#tenxe').append('<option value="' + value.tenxe + '">' + value.tenxe + '</option>');
                        $('#bienso').append('<option value="' + value.bienso + '">' + value.bienso + '</option>');
                    });
                },
                error: function() {
                    alert('Lỗi khi tải dữ liệu xe');
                }
            });

            $('#tenxe').on('change', function() {
                var tenXe = $(this).val();
                $('#bienso').html('<option value="" selected disabled>Chọn biển số xe</option>');

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
                    donGiaElement.textContent = data.toLocaleString() + ' đồng';
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

