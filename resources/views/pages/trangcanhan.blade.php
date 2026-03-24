@extends('layouts.index')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white rounded-lg shadow-lg border-0">
                    <div class="p-6">
                        <!-- Tabs Navigation -->
                        <ul class="flex border-b border-gray-200 mb-6" id="pills-tab" role="tablist">
                            <li class="flex-1">
                                <a class="tab-link active block text-center py-3 px-4 border-b-2 border-primary text-primary font-semibold transition-colors" 
                                   id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">
                                    Thông tin cá nhân
                                </a>
                        </li>
                            <li class="flex-1">
                                <a class="tab-link block text-center py-3 px-4 border-b-2 border-transparent text-gray-600 hover:text-primary font-semibold transition-colors" 
                                   id="pills-history-tab" data-toggle="pill" href="#pills-history" role="tab" aria-controls="pills-history" aria-selected="false">
                                    Lịch sử đặt xe
                                </a>
                        </li>
                    </ul>

                        <!-- Tabs Content -->
                    <div class="tab-content" id="pills-tabContent">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            @include('layouts.notification')
                            <form action="{{ route('auth.update') }}" class="mb-3" method="POST">
                                @csrf
                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" disabled 
                                               class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100 text-gray-600" 
                                               id="email" value="{{ $khachHang->email }}">
                                </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                                        <div>
                                            <label for="hoTen" class="block text-sm font-medium text-gray-700 mb-2">Họ tên</label>
                                        <input type="text"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('hoten') ? 'border-red-500' : 'border-gray-300' }}"
                                                   id="hoTen" name="hoten" placeholder="Nhập họ tên" required value="{{ $khachHang->hoten }}">

                                        @if ($errors->has('hoten'))
                                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                                <strong>{{ $errors->first('hoten') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                        <div>
                                            <label for="cccd" class="block text-sm font-medium text-gray-700 mb-2">Căn cước công dân</label>
                                            <input type="text" 
                                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                                   name="cccd" id="cccd" value="{{ $khachHang->cccd }}">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-4">
                                        <div>
                                            <label for="ngaySinh" class="block text-sm font-medium text-gray-700 mb-2">Ngày sinh</label>
                                            <input type="date" 
                                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" 
                                                   id="ngaySinh" name="ngaysinh" placeholder="Chọn ngày sinh" required value="{{ $khachHang->ngaysinh }}">
                                </div>
                                        <div>
                                            <label for="soDienThoai" class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại</label>
                                        <input type="text"
                                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('sdt') ? 'border-red-500' : 'border-gray-300' }}"
                                                   id="soDienThoai" name="sdt" placeholder="Nhập số điện thoại" required value="{{ $khachHang->sdt }}">

                                        @if ($errors->has('sdt'))
                                                <span class="text-red-500 text-sm mt-1 block" role="alert">
                                                <strong>{{ $errors->first('sdt') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                    <div class="mb-4">
                                        <label for="diaChi" class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ</label>
                                        <textarea class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary {{ $errors->has('diachi') ? 'border-red-500' : 'border-gray-300' }}" 
                                                  id="diaChi" name="diachi" rows="2" placeholder="Nhập địa chỉ" required>{{ $khachHang->diachi }}</textarea>

                                    @if ($errors->has('diachi'))
                                            <span class="text-red-500 text-sm mt-1 block" role="alert">
                                            <strong>{{ $errors->first('diachi') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                    <div class="flex justify-end">
                                        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-md font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2">
                                            <i class="fas fa-save"></i> Cập nhật
                                        </button>
                                </div>
                            </form>
                        </div>

                            <!-- History Tab -->
                        <div class="tab-pane fade" id="pills-history" role="tabpanel" aria-labelledby="pills-history-tab">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full border border-gray-300">
                                        <thead class="bg-gray-100">
                                    <tr>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">STT</th>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tên xe</th>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Biển số</th>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày nhận xe</th>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày trả xe</th>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Thành tiền</th>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Ngày tạo</th>
                                                <th scope="col" class="px-4 py-3 text-left text-sm font-semibold text-gray-700 border-b">Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $dem = 0;
                                    @endphp
                                    @forelse ($giaoDichs as $giaoDich)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-3 border-b">{{ ++$dem }}</td>
                                                    <td class="px-4 py-3 border-b">{{ $giaoDich->xe->tenxe }}</td>
                                                    <td class="px-4 py-3 border-b">{{ $giaoDich->xe->bienso }}</td>
                                                    <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($giaoDich->ngaynhanxe)) }}</td>
                                                    <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($giaoDich->ngaytraxe)) }}</td>
                                                    <td class="px-4 py-3 border-b">{{ number_format($giaoDich->tongtien) }} đồng</td>
                                                    <td class="px-4 py-3 border-b">{{ date('d/m/Y', strtotime($giaoDich->created_at)) }}</td>
                                                    <td class="px-4 py-3 border-b">
                                                @if ($giaoDich->tinhtranggiaodich == 0)
                                                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Chưa duyệt</span>
                                                @elseif($giaoDich->tinhtranggiaodich == 1 and $giaoDich->hoadon->tinhtranghoadon == 0)
                                                    <a href="{{ route('pages.thanhtoan', ['id' => $giaoDich->idgiaodich]) }}"
                                                               class="text-primary hover:underline font-semibold">Click để Thanh toán</a>
                                                @elseif($giaoDich->hoadon->tinhtranghoadon == 1 and $giaoDich->tinhtranggiaodich == 1)
                                                            <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Đã thanh toán</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                                <tr>
                                                    <td colspan="8" class="px-4 py-8 text-center text-gray-500">Không có lịch sử</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <style>
        .tab-pane {
            display: none;
        }
        .tab-pane.active {
            display: block;
        }
        .fade {
            transition: opacity 0.15s linear;
        }
        .fade:not(.show) {
            opacity: 0;
        }
    </style>

    <script>
        document.querySelectorAll('[data-toggle="pill"]').forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                
                // Ẩn tất cả tab panes
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                    pane.classList.add('hidden');
                });
                
                // Xóa trạng thái active của tất cả các links
                document.querySelectorAll('.tab-link').forEach(link => {
                    link.classList.remove('active', 'border-primary', 'text-primary');
                    link.classList.add('border-transparent', 'text-gray-600');
                });
                
                // Hiển thị tab pane mục tiêu
                const targetPane = document.querySelector(targetId);
                if (targetPane) {
                    targetPane.classList.remove('hidden');
                    targetPane.classList.add('active');
                    // Sử dụng setTimeout để tạo hiệu ứng fade
                    setTimeout(() => {
                        targetPane.classList.add('show');
                    }, 10);
                }
                
                // Kích hoạt link đã nhấn
                this.classList.add('active', 'border-primary', 'text-primary');
                this.classList.remove('border-transparent', 'text-gray-600');
            });

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');

                    // Hide all panes
                    panes.forEach(pane => {
                        pane.classList.add('hidden');
                        pane.classList.remove('show', 'active');
                    });

                    // Reset all tabs
                    tabs.forEach(link => {
                        link.classList.remove('active', 'border-primary', 'text-primary');
                        link.classList.add('border-transparent', 'text-gray-600');
                    });

                    // Show target pane
                    const targetPane = document.querySelector(targetId);
                    targetPane?.classList.remove('hidden');
                    targetPane?.classList.add('show', 'active');

                    // Activate clicked tab
                    this.classList.add('active', 'border-primary', 'text-primary');
                    this.classList.remove('border-transparent', 'text-gray-600');
                });
            });
        })();
    </script>
@endsection
