@extends('layouts.index')

<head>
    <title>{{ $xe->tenxe }}</title>
</head>

@section('content')
        @php
            $array = json_decode($xe->hinhxe->hinhxe);
            $img1 = isset($array[0]) ? $array[0] : null;
            $img2 = isset($array[1]) ? $array[1] : null;
            $img3 = isset($array[2]) ? $array[2] : null;
            $img4 = isset($array[3]) ? $array[3] : null;
        @endphp

    <div class="max-w-7xl mx-auto px-4 py-4">
        <!-- Cover Car Images -->
        <div class="mb-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row gap-4">
                    <div class="w-full lg:w-[calc(68%-16px)]">
                        <div class="cursor-pointer rounded-2xl overflow-hidden">
                            <img src="{{ $img1 }}" alt="{{ $xe->tenxe }}" class="w-full h-[600px] object-cover rounded-2xl">
                                </div>
                            </div>
                    <div class="w-full lg:w-[32%] flex flex-col gap-4">
                        <div class="cursor-pointer rounded-2xl overflow-hidden">
                            <img src="{{ $img2 }}" alt="{{ $xe->tenxe }}" class="w-full h-[189px] object-cover rounded-2xl">
                                </div>
                        <div class="cursor-pointer rounded-2xl overflow-hidden">
                            <img src="{{ $img3 }}" alt="{{ $xe->tenxe }}" class="w-full h-[189px] object-cover rounded-2xl">
                                </div>
                        <div class="cursor-pointer rounded-2xl overflow-hidden">
                            <img src="{{ $img4 }}" alt="{{ $xe->tenxe }}" class="w-full h-[189px] object-cover rounded-2xl">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Car Details Section -->
        <div class="flex flex-col lg:flex-row gap-6 mb-8">
            <!-- Main Content -->
            <div class="w-full lg:w-[calc(68%-92px)]">
                <!-- Car Basic Info -->
                <div class="mb-9">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-4">
                        <h3 class="text-3xl font-bold js_ten_xe">{{ $xe->tenxe }}</h3>
                        <div class="flex items-center gap-2">
                            <div class="p-2 rounded-full border border-gray-200 cursor-pointer hover:bg-green-50 hover:border-primary transition-colors">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 0L10.163 5.607L16 6.472L12 10.944L12.944 16L8 13.607L3.056 16L4 10.944L0 6.472L5.837 5.607L8 0Z" stroke="#5fcf86" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <div class="p-2 rounded-full border border-gray-200 cursor-pointer hover:bg-green-50 hover:border-primary transition-colors">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 1L10.163 6.607L16 7.472L12 11.944L12.944 17L8 14.607L3.056 17L4 11.944L0 7.472L5.837 6.607L8 1Z" stroke="#5fcf86" stroke-width="1.5"/>
                                </svg>
                                            </div>
                                        </div>
                                    </div>
                    <div class="flex flex-wrap items-end gap-2 mb-4">
                        <i class="ti-car text-gray-500"></i>
                        <span class="text-sm text-gray-500">{{ $xe->dongxe->tendongxe }}</span>
                        <span class="text-sm text-gray-500">•</span>
                        <span class="text-sm text-gray-500">{{ $xe->hangxe->tenhangxe }}</span>
                                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-50 text-gray-800">{{ $xe->truyendong }}</span>
                                        @if ($xe->nhienlieu == 'Xăng')
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-50 text-gray-800">{{ $xe->nhienlieu }}</span>
                                        @elseif ($xe->nhienlieu == 'Dầu diesel')
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-50 text-gray-800">{{ $xe->nhienlieu }}</span>
                                        @else
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-purple-50 text-gray-800">{{ $xe->nhienlieu }}</span>
                                        @endif
                                        @php
                                            $string = $xe->bienso;
                                            $string = substr($string, 0, 3) . '-' . substr($string, 3);
                                            $string = substr_replace($string, '.', -2, 0);
                                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-50 text-gray-800 js_bien_so">{{ $string }}</span>
                                    </div>
                                </div>

                <!-- Outstanding Features -->
                <div class="mb-6 scroll-mt-28" id="outsfeatures">
                    <h6 class="text-xl font-semibold mb-6">Đặc điểm</h6>
                    <div class="flex flex-wrap gap-5 justify-between">
                        <div class="flex items-center gap-4 w-full md:w-[calc(50%-10px)]">
                            <div class="flex-shrink-0">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.914 23.3289C10.9148 23.3284 10.9156 23.3279 10.9163 23.3274C10.9155 23.3279 10.9148 23.3284 10.914 23.3289ZM10.914 23.3289C10.914 23.3289 10.914 23.3289 10.914 23.3289L11.3128 23.9114M10.914 23.3289L11.3128 23.9114M11.3128 23.9114L10.9807 23.2882L20.6697 23.9458C20.6682 23.9484 20.6656 23.9496 20.6631 23.9479C20.655 23.9424 20.6343 23.9284 20.6014 23.9074C20.6014 23.9073 20.6014 23.9073 20.6013 23.9073C20.5141 23.8516 20.3413 23.7468 20.0921 23.6208C20.0919 23.6207 20.0918 23.6206 20.0917 23.6206C19.3397 23.2404 17.8926 22.6674 16.0003 22.6674C14.1715 22.6674 12.7584 23.2026 11.9869 23.5817L11.9929 23.5929M11.3128 23.9114L11.331 23.9456C11.3324 23.9483 11.3352 23.9495 11.3377 23.9478C11.3444 23.9432 11.3592 23.9332 11.3821 23.9184L11.9929 23.5929L11.9929 23.5929M11.9929 23.5929C11.9909 23.5892 11.9889 23.5855 11.9868 23.5818C11.6767 23.7342 11.4702 23.8614 11.3821 23.9184L11.9929 23.5929ZM10.6691 24.2983L10.6691 24.2983C10.7406 24.4324 10.8728 24.5792 11.0793 24.6538C11.3072 24.7361 11.5609 24.7039 11.7614 24.5667L11.7614 24.5667C11.7978 24.5418 13.4597 23.4174 16.0003 23.4174C18.5426 23.4174 20.205 24.5432 20.2393 24.5667L20.2393 24.5667C20.4389 24.7034 20.6938 24.7372 20.9245 24.6528C21.1293 24.5779 21.2557 24.4338 21.3233 24.3136L22.4886 22.2427L24.3242 23.0447L21.6934 28.584H9.99882L7.65051 23.0635L9.57427 22.2435L10.6691 24.2983ZM24.4348 22.8117L24.4345 22.8124L24.4348 22.8117Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M12.75 4.66675C12.75 3.97639 13.3096 3.41675 14 3.41675H18C18.6904 3.41675 19.25 3.97639 19.25 4.66675V7.00008C19.25 7.13815 19.1381 7.25008 19 7.25008H13C12.8619 7.25008 12.75 7.13815 12.75 7.00008V4.66675Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M9.33398 22.6668L9.90564 11.2336C9.95887 10.1692 10.8374 9.3335 11.9031 9.3335H20.0982C21.1639 9.3335 22.0424 10.1692 22.0957 11.2336L22.6673 22.6668" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M14.667 7.35815V9.8901" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M17.334 7.35815V9.8901" stroke="#5FCF86" stroke-width="1.5"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-xs text-gray-500">Số ghế</p>
                                <p class="text-xl font-semibold text-black">{{ substr($xe->dongxe->tendongxe, 0, 1) }} chỗ</p>
                                            </div>
                                        </div>
                        <div class="flex items-center gap-4 w-full md:w-[calc(50%-10px)]">
                            <div class="flex-shrink-0">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25.9163 7.99992C25.9163 9.05846 25.0582 9.91659 23.9997 9.91659C22.9411 9.91659 22.083 9.05846 22.083 7.99992C22.083 6.94137 22.9411 6.08325 23.9997 6.08325C25.0582 6.08325 25.9163 6.94137 25.9163 7.99992Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <circle cx="23.9997" cy="23.9999" r="1.91667" stroke="#5FCF86" stroke-width="1.5"></circle>
                                    <path d="M17.9163 7.99992C17.9163 9.05846 17.0582 9.91659 15.9997 9.91659C14.9411 9.91659 14.083 9.05846 14.083 7.99992C14.083 6.94137 14.9411 6.08325 15.9997 6.08325C17.0582 6.08325 17.9163 6.94137 17.9163 7.99992Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M17.9163 23.9999C17.9163 25.0585 17.0582 25.9166 15.9997 25.9166C14.9411 25.9166 14.083 25.0585 14.083 23.9999C14.083 22.9414 14.9411 22.0833 15.9997 22.0833C17.0582 22.0833 17.9163 22.9414 17.9163 23.9999Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <circle cx="7.99967" cy="7.99992" r="1.91667" stroke="#5FCF86" stroke-width="1.5"></circle>
                                    <path d="M10.1025 26.6666V21.3333H7.99837C7.59559 21.3333 7.25184 21.4053 6.96712 21.5494C6.68066 21.6918 6.46278 21.894 6.31348 22.1562C6.16244 22.4166 6.08691 22.723 6.08691 23.0754C6.08691 23.4296 6.1633 23.7343 6.31608 23.9895C6.46886 24.243 6.69021 24.4374 6.98014 24.5728C7.26834 24.7083 7.6173 24.776 8.02702 24.776H9.43587V23.8697H8.20931C7.99403 23.8697 7.81521 23.8402 7.67285 23.7812C7.53049 23.7221 7.42459 23.6336 7.35514 23.5155C7.28396 23.3975 7.24837 23.2508 7.24837 23.0754C7.24837 22.8984 7.28396 22.7491 7.35514 22.6275C7.42459 22.506 7.53136 22.414 7.67546 22.3515C7.81782 22.2872 7.9975 22.2551 8.21452 22.2551H8.97493V26.6666H10.1025ZM7.22233 24.2395L5.89681 26.6666H7.1416L8.43848 24.2395H7.22233Z" fill="#5FCF86"></path>
                                    <path d="M24 10.6665V15.9998M24 21.3332V15.9998M16 10.6665V21.3332M8 10.6665V15.4998C8 15.776 8.22386 15.9998 8.5 15.9998H24" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                            </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-xs text-gray-500">Truyền động</p>
                                <p class="text-xl font-semibold text-black">{{ $xe->truyendong }}</p>
                                        </div>
                                    </div>
                        <div class="flex items-center gap-4 w-full md:w-[calc(50%-10px)]">
                            <div class="flex-shrink-0">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24.3337 27.2499H7.66699C7.52892 27.2499 7.41699 27.138 7.41699 26.9999V12.4599C7.41699 12.3869 7.44888 12.3175 7.5043 12.27L14.652 6.14344L14.1639 5.574L14.652 6.14344C14.6973 6.1046 14.755 6.08325 14.8147 6.08325H24.3337C24.4717 6.08325 24.5837 6.19518 24.5837 6.33325V26.9999C24.5837 27.138 24.4717 27.2499 24.3337 27.2499Z" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M12.0001 5.33325L7.42285 9.46712" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M17.888 19.5212L16.7708 15.93C16.5378 15.1812 15.4785 15.1798 15.2436 15.928L14.1172 19.5164C13.7178 20.7889 14.6682 22.0833 16.0019 22.0833C17.3335 22.0833 18.2836 20.7927 17.888 19.5212Z" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M23.2503 3.66675V5.66675C23.2503 5.80482 23.1384 5.91675 23.0003 5.91675H14.667C14.5827 5.91675 14.5365 5.8916 14.5072 5.86702C14.4721 5.83755 14.44 5.78953 14.4245 5.72738C14.4089 5.66524 14.4147 5.60775 14.4318 5.56523C14.4461 5.52975 14.4749 5.48584 14.5493 5.44616L18.2993 3.44616C18.3356 3.42685 18.376 3.41675 18.417 3.41675H23.0003C23.1384 3.41675 23.2503 3.52868 23.2503 3.66675Z" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                        </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-xs text-gray-500">Nhiên liệu</p>
                                <p class="text-xl font-semibold text-black">{{ $xe->nhienlieu }}</p>
                                        </div>
                                    </div>
                        <div class="flex items-center gap-4 w-full md:w-[calc(50%-10px)]">
                            <div class="flex-shrink-0">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.41667 24V23.25H6.66667H4.75V18.0833H6.66667H7.41667V17.3333V15.4167H9.33333H9.64399L9.86366 15.197L12.3107 12.75H24.5833V23.25H22.6667H22.356L22.1363 23.4697L19.6893 25.9167H7.41667V24Z" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M24 21.3333H28" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M24 18.6665H28" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M15.417 7.33325C15.417 6.6429 15.9766 6.08325 16.667 6.08325H20.667C21.3573 6.08325 21.917 6.6429 21.917 7.33325V8.58325H15.417V7.33325Z" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M17.333 9.33325V11.9999M19.9997 9.33325V11.9999" stroke="#5FCF86" stroke-width="1.5"></path>
                                    <path d="M4.66699 26.01L4.66699 15.3308" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M27.3291 23.3384L27.3291 16.6704" stroke="#5FCF86" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                </div>
                            <div class="flex flex-col gap-1">
                                <p class="text-xs text-gray-500">NL tiêu hao</p>
                                <p class="text-xl font-semibold text-black">{{ $xe->nhienlieutieuhao_km }} lít/Km</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                <div class="w-full h-px bg-gray-200 my-6"></div>

                <!-- Description -->
                <div class="mb-6">
                    <h6 class="text-xl font-semibold mb-6">Miêu tả</h6>
                    <span class="des text-gray-600 whitespace-pre-wrap"></span>
                                </div>

                <div class="w-full h-px bg-gray-200 my-6"></div>

                <!-- Features -->
                <div class="mb-6">
                    <h6 class="text-xl font-semibold mb-6">Các tiện nghi khác</h6>
                    <ul class="flex flex-wrap gap-6">
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/map-v2.png" alt="Bản đồ" class="w-6 h-6">
                            <span>Bản đồ</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/bluetooth-v2.png" alt="Bluetooth" class="w-6 h-6">
                            <span>Bluetooth</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/360_camera-v2.png" alt="Camera 360" class="w-6 h-6">
                            <span>Camera 360</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/parking_camera-v2.png" alt="Camera cập lề" class="w-6 h-6">
                            <span>Camera cập lề</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/dash_camera-v2.png" alt="Camera hành trình" class="w-6 h-6">
                            <span>Camera hành trình</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/reverse_camera-v2.png" alt="Camera lùi" class="w-6 h-6">
                            <span>Camera lùi</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/impact_sensor-v2.png" alt="Cảm biến va chạm" class="w-6 h-6">
                            <span>Cảm biến va chạm</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/head_up-v2.png" alt="Cảnh báo tốc độ" class="w-6 h-6">
                            <span>Cảnh báo tốc độ</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/gps-v2.png" alt="Định vị GPS" class="w-6 h-6">
                            <span>Định vị GPS</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/usb-v2.png" alt="Khe cắm USB" class="w-6 h-6">
                            <span>Khe cắm USB</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/spare_tire-v2.png" alt="Lốp dự phòng" class="w-6 h-6">
                            <span>Lốp dự phòng</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/dvd-v2.png" alt="Màn hình DVD" class="w-6 h-6">
                            <span>Màn hình DVD</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/etc-v2.png" alt="ETC" class="w-6 h-6">
                            <span>ETC</span>
                        </li>
                        <li class="flex items-center gap-4 w-full sm:w-[calc(50%-12px)] lg:w-[calc(25%-15px)]">
                            <img loading="lazy" src="https://n1-cstg.mioto.vn/v4/p/m/icons/features/airbags-v2.png" alt="Túi khí an toàn" class="w-6 h-6">
                            <span>Túi khí an toàn</span>
                        </li>
                                        </ul>
                                    </div>

                <div class="w-full h-px bg-gray-200 my-6"></div>

                <!-- Terms -->
                <div class="mb-6">
                    <h6 class="text-3xl font-extrabold mb-4">Điều khoản</h6>
                    <pre class="text-gray-600 whitespace-pre-wrap text-sm">Quy định khác:
◦ Sử dụng xe đúng mục đích.
◦ Không sử dụng xe thuê vào mục đích phi pháp, trái pháp luật.
◦ Không sử dụng xe thuê để cầm cố, thế chấp.
◦ Không hút thuốc, nhả kẹo cao su, xả rác trong xe.
◦ Không chở hàng quốc cấm dễ cháy nổ.
◦ Không chở hoa quả, thực phẩm nặng mùi trong xe.
◦ Khi trả xe, nếu xe bẩn hoặc có mùi trong xe, khách hàng vui lòng vệ sinh xe sạch sẽ hoặc gửi phụ thu phí vệ sinh xe.
Trân trọng cảm ơn, chúc quý khách hàng có những chuyến đi tuyệt vời !</pre>
                </div>

                <!-- Cancel Policy -->
                <div class="mb-6">
                    <h6 class="text-3xl font-extrabold mb-4">
                        Chính sách huỷ chuyến<br>
                        <p class="text-base font-normal text-gray-600 mt-2">Miễn phí hủy chuyến trong vòng 1 giờ sau khi đặt cọc</p>
                                    </h6>
                    <div class="border border-gray-300 rounded-t-xl overflow-hidden">
                        <div class="flex bg-gray-100 rounded-t-xl">
                            <div class="flex-1 p-4 text-sm font-bold text-center capitalize">Thời điểm hủy chuyến</div>
                            <div class="flex-1 p-4 text-sm font-bold text-center border-l border-gray-300">Khách thuê hủy chuyến</div>
                            <div class="flex-1 p-4 text-sm font-bold text-center border-l border-gray-300">Chủ xe hủy chuyến</div>
                                        </div>
                        <div class="flex border-t border-gray-300">
                            <div class="flex-1 p-4 text-sm text-left pl-6">Trong vòng 1h sau giữ chỗ</div>
                            <div class="flex-1 p-4 text-sm text-center border-l border-gray-300 flex flex-col items-center justify-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1">
                                    <path d="M12.25 2C6.74 2 2.25 6.49 2.25 12C2.25 17.51 6.74 22 12.25 22C17.76 22 22.25 17.51 22.25 12C22.25 6.49 17.76 2 12.25 2ZM15.84 10.59L12.32 14.11C12.17 14.26 11.98 14.33 11.79 14.33C11.6 14.33 11.4 14.26 11.26 14.11L9.5 12.35C9.2 12.06 9.2 11.58 9.5 11.29C9.79 11 10.27 11 10.56 11.29L11.79 12.52L14.78 9.53C15.07 9.24 15.54 9.24 15.84 9.53C16.13 9.82 16.13 10.3 15.84 10.59Z" fill="#12B76A"></path>
                                </svg>
                                Hoàn tiền giữ chỗ 100%
                                            </div>
                            <div class="flex-1 p-4 text-sm text-center border-l border-gray-300 flex flex-col items-center justify-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1">
                                    <path d="M12.25 2C6.74 2 2.25 6.49 2.25 12C2.25 17.51 6.74 22 12.25 22C17.76 22 22.25 17.51 22.25 12C22.25 6.49 17.76 2 12.25 2ZM15.84 10.59L12.32 14.11C12.17 14.26 11.98 14.33 11.79 14.33C11.6 14.33 11.4 14.26 11.26 14.11L9.5 12.35C9.2 12.06 9.2 11.58 9.5 11.29C9.79 11 10.27 11 10.56 11.29L11.79 12.52L14.78 9.53C15.07 9.24 15.54 9.24 15.84 9.53C16.13 9.82 16.13 10.3 15.84 10.59Z" fill="#12B76A"></path>
                                </svg>
                                Không tốn phí<span class="block text-xs">(Đánh giá hệ thống 3*)</span>
                                            </div>
                                        </div>
                        <div class="flex border-t border-gray-300">
                            <div class="flex-1 p-4 text-sm text-left pl-6">Trước chuyến đi &gt;7 ngày</div>
                            <div class="flex-1 p-4 text-sm text-center border-l border-gray-300 flex flex-col items-center justify-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1">
                                    <path d="M12.25 2C6.74 2 2.25 6.49 2.25 12C2.25 17.51 6.74 22 12.25 22C17.76 22 22.25 17.51 22.25 12C22.25 6.49 17.76 2 12.25 2ZM15.84 10.59L12.32 14.11C12.17 14.26 11.98 14.33 11.79 14.33C11.6 14.33 11.4 14.26 11.26 14.11L9.5 12.35C9.2 12.06 9.2 11.58 9.5 11.29C9.79 11 10.27 11 10.56 11.29L11.79 12.52L14.78 9.53C15.07 9.24 15.54 9.24 15.84 9.53C16.13 9.82 16.13 10.3 15.84 10.59Z" fill="#12B76A"></path>
                                </svg>
                                Hoàn tiền giữ chỗ 70%
                                            </div>
                            <div class="flex-1 p-4 text-sm text-center border-l border-gray-300 flex flex-col items-center justify-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1">
                                    <path d="M12.25 2C6.74 2 2.25 6.49 2.25 12C2.25 17.51 6.74 22 12.25 22C17.76 22 22.25 17.51 22.25 12C22.25 6.49 17.76 2 12.25 2ZM15.84 10.59L12.32 14.11C12.17 14.26 11.98 14.33 11.79 14.33C11.6 14.33 11.4 14.26 11.26 14.11L9.5 12.35C9.2 12.06 9.2 11.58 9.5 11.29C9.79 11 10.27 11 10.56 11.29L11.79 12.52L14.78 9.53C15.07 9.24 15.54 9.24 15.84 9.53C16.13 9.82 16.13 10.3 15.84 10.59Z" fill="#12B76A"></path>
                                </svg>
                                Đền tiền 30%<span class="block text-xs">(Đánh giá hệ thống 3*)</span>
                                            </div>
                                        </div>
                        <div class="flex border-t border-gray-300">
                            <div class="flex-1 p-4 text-sm text-left pl-6">Trong vòng 7 ngày trước chuyến đi</div>
                            <div class="flex-1 p-4 text-sm text-center border-l border-gray-300 flex flex-col items-center justify-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1">
                                    <path d="M12.25 2C6.74 2 2.25 6.49 2.25 12C2.25 17.51 6.74 22 12.25 22C17.76 22 22.25 17.51 22.25 12C22.25 6.49 17.76 2 12.25 2ZM14.67 13.39C14.97 13.69 14.96 14.16 14.67 14.45C14.52 14.59 14.33 14.67 14.14 14.67C13.95 14.67 13.75 14.59 13.61 14.44L12.25 13.07L10.9 14.44C10.75 14.59 10.56 14.67 10.36 14.67C10.17 14.67 9.98 14.59 9.84 14.45C9.54 14.16 9.53999 13.69 9.82999 13.39L11.2 12L9.82999 10.61C9.53999 10.31 9.54 9.84 9.84 9.55C10.13 9.26 10.61 9.26 10.9 9.56L12.25 10.93L13.61 9.56C13.9 9.26 14.37 9.26 14.67 9.55C14.96 9.84 14.97 10.31 14.67 10.61L13.3 12L14.67 13.39Z" fill="#F04438"></path>
                                </svg>
                                Không hoàn tiền
                                            </div>
                            <div class="flex-1 p-4 text-sm text-center border-l border-gray-300 flex flex-col items-center justify-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-1">
                                    <path d="M12.25 2C6.74 2 2.25 6.49 2.25 12C2.25 17.51 6.74 22 12.25 22C17.76 22 22.25 17.51 22.25 12C22.25 6.49 17.76 2 12.25 2ZM14.67 13.39C14.97 13.69 14.96 14.16 14.67 14.45C14.52 14.59 14.33 14.67 14.14 14.67C13.95 14.67 13.75 14.59 13.61 14.44L12.25 13.07L10.9 14.44C10.75 14.59 10.56 14.67 10.36 14.67C10.17 14.67 9.98 14.59 9.84 14.45C9.54 14.16 9.53999 13.69 9.82999 13.39L11.2 12L9.82999 10.61C9.53999 10.31 9.54 9.84 9.84 9.55C10.13 9.26 10.61 9.26 10.9 9.56L12.25 10.93L13.61 9.56C13.9 9.26 14.37 9.26 14.67 9.55C14.96 9.84 14.97 10.31 14.67 10.61L13.3 12L14.67 13.39Z" fill="#F04438"></path>
                                </svg>
                                Đền tiền 100%<span class="block text-xs">(Đánh giá hệ thống 2*)</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex flex-col gap-0.5 text-sm text-gray-600">
                        <p>* Khách thuê không nhận xe sẽ không được hoàn tiền giữ chỗ</p>
                        <p>* Chủ xe không giao xe sẽ hoàn & đền 100% tiền giữ chỗ cho bạn</p>
                        <p class="flex items-center gap-1">
                            * Tiền giữ chỗ & bồi thường cho chủ xe hủy chuyến (nếu có) sẽ được Vietcar hoàn trả đến bạn bằng chuyển khoản ngân hàng trong vòng 1-3 ngày làm việc.
                            <span class="relative group cursor-help">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.08984 9.00008C9.32495 8.33175 9.789 7.76819 10.3998 7.40921C11.0106 7.05024 11.7287 6.91902 12.427 7.03879C13.1253 7.15857 13.7587 7.52161 14.2149 8.06361C14.6712 8.60561 14.9209 9.2916 14.9198 10.0001C14.9198 12.0001 11.9198 13.0001 11.9198 13.0001" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12 17H12.01" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-64 p-3 bg-gray-900 text-white text-xs rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                                    <b>Thủ tục hoàn tiền & đền cọc</b> Vietcar sẽ hoàn lại tiền cọc (& tiền đền cọc do chủ xe hủy chuyến (nếu có) theo chính sách hủy chuyến) qua tài khoản ngân hàng của khách thuê trong vòng 1-3 ngày làm việc kể từ thời điểm hủy chuyến. <i>*Nhân viên Vietcar sẽ liên hệ khách thuê (qua số điện thoại đã đăng ký trên Vietcar) để xin thông tin tài khoản ngân hàng, hoặc Khách thuê có thể chủ động gửi thông tin cho Vietcar qua email Contact@Vietcar.vn hoặc nhắn tin tại Vietcar Fanpage</i>
                                </span>
                            </span>
                        </p>
                    </div>
        </div>
    </div>

            <!-- Sidebar Booking -->
            <div class="w-full lg:w-[35%] lg:float-right mb-20">
                <div class="sticky top-24">
                    <div class="p-6 bg-blue-50 border border-gray-100 rounded-xl mb-6" id="cardetail">
                        <div class="mb-4">
                            <h4 class="text-2xl font-extrabold">{{ number_format($xe->gia) }}K/ngày</h4>
                        </div>
                        <div class="border border-gray-200 rounded-xl bg-white mb-3">
                            <div class="p-3 flex flex-col gap-2 cursor-pointer">
                                <label class="text-sm font-medium text-gray-700">Nhận xe</label>
                                <div class="flex justify-between items-center">
                                    <input type="date" class="js_ngay_nhan_xe border-none outline-none text-base font-semibold text-black" 
                                           name="ngaynhanxe" id="ngayNhanXe" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+3 months')) }}">
                </div>
                            </div>
                            <div class="h-px bg-gray-200"></div>
                            <div class="p-3 flex flex-col gap-2 cursor-pointer">
                                <label class="text-sm font-medium text-gray-700">Trả xe</label>
                                <div class="flex justify-between items-center">
                                    <input type="date" class="js_ngay_tra_xe border-none outline-none text-base font-semibold text-black" 
                                           name="ngaytraxe" id="ngayTraXe" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+4 months')) }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Địa điểm giao nhận xe</label>
                            <div class="p-3 border border-gray-200 rounded-lg bg-white">
                                <span class="text-gray-700">Vietcar</span>
                            </div>
                        </div>
                        <div class="w-full h-px bg-gray-200 my-3"></div>
                        <div class="flex flex-col gap-2 pt-4">
                            <div class="flex justify-between items-center">
                                <p class="flex items-center text-sm text-gray-700">Đơn giá thuê</p>
                                <p class="text-sm font-semibold text-black">
                                    <span class="js_don_gia">{{ number_format($xe->gia) }}đ/ngày</span>
                                </p>
                            </div>
                            <div class="w-full h-px bg-gray-200 my-2"></div>
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-700">Tổng cộng</p>
                                <p class="text-sm font-semibold text-black">
                                    <span>{{ number_format($xe->gia) }}đ</span> x&nbsp;<span class="js_so_ngay_thue"></span>&nbsp;ngày
                                </p>
                            </div>
                            <div class="w-full h-px bg-gray-200 my-2"></div>
                            <div class="flex justify-between items-center py-2">
                                <p class="text-base font-extrabold">Thành tiền</p>
                                <p class="text-base font-extrabold">
                                    <span class="js_thanh_tien"> đồng</span>
                                </p>
                            </div>
                        </div>
                        @if (auth()->check())
                            <a class="w-full px-6 py-4 bg-primary text-white rounded-lg font-bold hover:bg-primary-dark transition-colors flex items-center justify-center gap-2 mt-4 js_btn_dat_xe cursor-pointer">
                                <i class="fa-solid fa-bolt-lightning text-base"></i>CHỌN THUÊ
                            </a>
                        @else
                            <div class="mt-4 text-sm text-gray-700">
                                Vui lòng <a href="{{ route('pages.dangnhap') }}" class="text-primary hover:underline">Đăng nhập</a> để đặt xe
                            </div>
                        @endif
                    </div>

                    <!-- Surcharge -->
                    <div class="p-4 border border-gray-200 rounded-xl bg-white">
                        <p class="text-primary font-bold mb-4">Phụ phí có thể phát sinh</p>
                        <div class="surcharge-container hidden flex flex-col gap-3">
                            <div class="flex gap-3 text-xs">
                                <div class="flex-shrink-0">
                                    <i class="ti-info-alt text-primary text-lg"></i>
                                </div>
                                <div class="flex-1 flex flex-col gap-1">
                                    <div class="flex justify-between items-center">
                                        <p class="font-bold text-black">Phí vượt giới hạn</p>
                                        <p class="font-bold text-black">Không tính phí</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex gap-3 text-xs">
                                <div class="flex-shrink-0">
                                    <i class="ti-info-alt text-primary text-lg"></i>
                                </div>
                                <div class="flex-1 flex flex-col gap-1">
                                    <div class="flex justify-between items-center">
                                        <p class="font-bold text-black">Phí quá giờ</p>
                                        <p class="font-bold text-black">80 000đ/h</p>
                                    </div>
                                    <p class="text-gray-600">Phụ phí phát sinh nếu hoàn trả xe trễ giờ. Trường hợp trễ quá <span class="font-semibold">4 tiếng</span>, phụ phí thêm <span class="font-semibold">1 ngày</span> thuê</p>
                        </div>
                    </div>
                            <div class="flex gap-3 text-xs">
                                <div class="flex-shrink-0">
                                    <i class="ti-info-alt text-primary text-lg"></i>
                                </div>
                                <div class="flex-1 flex flex-col gap-1">
                                    <div class="flex justify-between items-center">
                                        <p class="font-bold text-black">Phí vệ sinh</p>
                                        <p class="font-bold text-black">120 000đ</p>
                    </div>
                                    <p class="text-gray-600">Phụ phí phát sinh khi xe hoàn trả không đảm bảo vệ sinh (nhiều vết bẩn, bùn cát, sình lầy...)</p>
            </div>
        </div>
                            <div class="flex gap-3 text-xs">
                                <div class="flex-shrink-0">
                                    <i class="ti-info-alt text-primary text-lg"></i>
    </div>
                                <div class="flex-1 flex flex-col gap-1">
                                    <div class="flex justify-between items-center">
                                        <p class="font-bold text-black">Phí khử mùi</p>
                                        <p class="font-bold text-black">200 000đ</p>
                </div>
                                    <p class="text-gray-600">Phụ phí phát sinh khi xe hoàn trả bị ám mùi khó chịu (mùi thuốc lá, thực phẩm nặng mùi...)</p>
            </div>
        </div>
    </div>
                        <button onclick="document.querySelector('.surcharge-container').classList.toggle('hidden')" 
                                class="text-sm font-bold text-primary cursor-pointer mt-2 hover:underline">
                            Đọc thêm
                    </button>
                    </div>
            </div>
        </div>
    </div>

        <!-- Comment Section -->
        <section class="py-12" id="review">
            <div class="max-w-3xl mx-auto">
            @if (auth()->check())
                @if (session('thongbao'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('thongbao') }}
                        </div>
                @endif
                    <h3 class="text-2xl font-bold mb-6">Đánh giá...</h3>
                    <form action="{{ route('comments', ['id' => $xe->idxe]) }}" method="post" class="mb-8">
                    @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="iduser" value="{{ auth()->id() }}" />
                        <input type="hidden" name="idxe" value="{{ $xe->idxe }}" />
                        <textarea name="mota" id="comment" cols="3" rows="3" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary mb-4" 
                                  placeholder="Nội dung phản hồi..."></textarea>
                        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg font-bold hover:bg-primary-dark transition-colors">
                            Gửi
                        </button>
                    </form>
                @else
                    <div class="mb-8 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <strong>Đăng nhập để đánh giá</strong> 
                        <a href="{{ route('pages.dangnhap') }}" class="text-primary hover:underline ml-1">Đăng nhập</a>
                </div>
            @endif

            @foreach ($comments as $comment)
                    <div class="p-6 bg-green-50 rounded-xl mb-4 border border-gray-200">
                        <div class="flex flex-col gap-1">
                        @if ($comment->user)
                                <h6 class="text-lg font-bold text-gray-900">{{ $comment->user->hoten }}</h6>
                        @else
                                <h6 class="text-lg font-bold text-gray-900">Unknown User</h6>
                        @endif
                            <div class="flex items-start justify-between gap-2">
                                <pre class="text-gray-700 whitespace-pre-wrap flex-1">{{ $comment->mota }}</pre>
                                <i class="text-sm text-gray-500 flex-shrink-0">{{ $comment->created_at->diffForHumans() }}</i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <!-- Modal Xác nhận -->
    <div id="js_modal_xac_nhan" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50" data-backdrop="static">
        <div class="bg-white rounded-lg max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center p-6 border-b border-gray-200">
                <h5 class="text-xl font-bold" id="modalXacNhan">Xác nhận thuê xe<span class="js_ten_xe_md"></span></h5>
                <button type="button" onclick="document.getElementById('js_modal_xac_nhan').classList.add('hidden')" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>
            <form action="" method="POST">
                <div class="p-6 md:p-12">
                    <div class="flex flex-col md:flex-row gap-6 mb-6">
                        <div class="flex-shrink-0">
                            <div class="main-img_md"></div>
                        </div>
                        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>Tên xe: <strong class="js_ten_xe_md"></strong></div>
                            <div>Biển số: <strong class="js_bien_so_md"></strong></div>
                            <div>Ngày nhận xe: <strong class="js_ngay_nhan_xe_md"></strong></div>
                            <div>Ngày trả xe: <strong class="js_ngay_tra_xe_md"></strong></div>
                            <div>Đơn giá: <strong class="js_don_gia_md"></strong></div>
                            <div>Số ngày: <strong class="js_so_ngay_thue_md"></strong></div>
                        </div>
                    </div>
                    <div class="mb-4 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-lg">
                        <div>Thành tiền <strong class="js_thanh_tien_md"></strong></div>
                    </div>
                    <p class="text-gray-600">Thanh toán dễ dàng, lần đầu vào ngày nhận xe</p>
                </div>
                <div class="flex justify-between items-center p-6 border-t border-gray-200">
                    <button type="button" onclick="document.getElementById('js_modal_xac_nhan').classList.add('hidden')" 
                            class="px-6 py-2 bg-gray-500 text-white rounded-lg font-semibold hover:bg-gray-600 transition-colors flex items-center gap-2">
                        <i class="fas fa-times"></i> Hủy
                    </button>
                    <button type="button" class="js_btn_xac_nhan px-6 py-2 bg-primary text-white rounded-lg font-semibold hover:bg-primary-dark transition-colors flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> Xác nhận
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Success -->
    <div id="js_modal_thong_bao_success" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg max-w-2xl w-full mx-4">
            <div class="p-6 bg-green-100 border border-green-400 text-green-700 rounded-lg relative">
                <button type="button" onclick="document.getElementById('js_modal_thong_bao_success').classList.add('hidden')" 
                        class="absolute top-2 right-2 text-green-700 hover:text-green-900 text-2xl">&times;</button>
                <strong>Bạn đã đặt thành công!</strong> Vui lòng chờ quản trị viên xác nhận. Cảm ơn!
            </div>
        </div>
        </div>

    <!-- Modal Error -->
    <div id="js_modal_thong_bao_error" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg max-w-md w-full mx-4">
            <div class="p-6 bg-red-100 border border-red-400 text-red-700 rounded-lg relative">
                <button type="button" onclick="document.getElementById('js_modal_thong_bao_error').classList.add('hidden')" 
                        class="absolute top-2 right-2 text-red-700 hover:text-red-900 text-2xl">&times;</button>
                <strong>Lỗi!</strong> Có một vài lỗi, xin hãy thử lại!
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Lấy các phần tử cần thiết
        var ngayNhanXeInput = document.getElementById('ngayNhanXe');
        var ngayTraXeInput = document.getElementById('ngayTraXe');
        var soNgayThueElement = document.querySelector('.js_so_ngay_thue');
        var donGiaElement = document.querySelector('.js_don_gia');
        var thanhTienElement = document.querySelector('.js_thanh_tien');

        // Hàm lắng nghe sự kiện thay đổi của cả hai input ngày nhận xe và ngày trả xe
        ngayNhanXeInput.addEventListener('change', function() {
            updateSoNgayThueAndThanhTien();
        });

        ngayTraXeInput.addEventListener('change', function() {
            updateSoNgayThueAndThanhTien();
        });

        // Hàm cập nhật số ngày thuê và tổng tiền
        function updateSoNgayThueAndThanhTien() {
            var ngayNhanXe = new Date(ngayNhanXeInput.value);
            var ngayTraXe = new Date(ngayTraXeInput.value);

            // Kiểm tra xem cả hai ngày nhận xe và ngày trả xe đã được chọn
            if (ngayNhanXeInput.value && ngayTraXeInput.value) {
                // Kiểm tra nếu ngày trả xe trước ngày nhận xe
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

        // Hàm cập nhật tổng tiền
        function updateThanhTien() {
            var soNgayThue = parseInt(soNgayThueElement.textContent);
            var donGia = parseInt(donGiaElement.textContent.replace(/\D/g, ''));

            if (!isNaN(soNgayThue)) {
                var thanhTien = soNgayThue * donGia;
                thanhTienElement.textContent = thanhTien.toLocaleString() + ' đồng';
            }
        }

        // Modal functions
        function showModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.getElementById(modalId).classList.add('flex');
        }

        function hideModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementById(modalId).classList.remove('flex');
        }

        $(document).ready(function() {
            function toggleDatXeButton() {
                let ngayNhanXe = $('.js_ngay_nhan_xe').val();
                let ngayTraXe = $('.js_ngay_tra_xe').val();

                if (ngayNhanXe && ngayTraXe) {
                    $('.js_btn_dat_xe').prop('disabled', false).removeClass('opacity-50 cursor-not-allowed');
                } else {
                    $('.js_btn_dat_xe').prop('disabled', true).addClass('opacity-50 cursor-not-allowed');
                }
            }

            $('.js_ngay_nhan_xe, .js_ngay_tra_xe').change(function() {
                toggleDatXeButton();
            });

            toggleDatXeButton();

            $('.js_btn_dat_xe').click(function(e) {
                e.preventDefault();

                let ngayNhanXe = $('.js_ngay_nhan_xe').val();
                let ngayTraXe = $('.js_ngay_tra_xe').val();

                if (!ngayNhanXe || !ngayTraXe) {
                    alert("Vui lòng chọn ngày nhận xe và ngày trả xe trước khi chọn thuê.");
                    return;
                }

                let tenXe = $('.js_ten_xe').html();
                let hinhXe = $('.main-img').html();
                let bienSo = $('.js_bien_so').html();
                let donGia = $('.js_don_gia').text();
                let days = $('.js_so_ngay_thue').text();
                let thanhTien = $('.js_thanh_tien').text();

                $('.js_ten_xe_md').html(tenXe);
                $('.main-img_md').html(hinhXe);
                $('.main-img_md img').css({
                    'width': '20rem',
                    'height': 'auto',
                });

                $('.js_bien_so_md').html(bienSo);
                $('.js_ngay_nhan_xe_md').html(ngayNhanXe);
                $('.js_ngay_tra_xe_md').html(ngayTraXe);
                $('.js_don_gia_md').html(donGia);
                $('.js_so_ngay_thue_md').html(days);
                $('.js_thanh_tien_md').html(thanhTien);

                showModal('js_modal_xac_nhan');
            });

            $('.js_btn_xac_nhan').click(function(e) {
                e.preventDefault();
                const data = {
                    'ten_xe': $('.js_ten_xe').text(),
                    'bien_so': $('.js_bien_so').text().replace(/[.-\s]/g, ''),
                    'ngay_nhan_xe': $('.js_ngay_nhan_xe').val(),
                    'ngay_tra_xe': $('.js_ngay_tra_xe').val(),
                    'thanh_tien': $('.js_thanh_tien').text().replace(/[^0-9]/g, ''),
                    'id_xe': {{ $xe->idxe }},
                };

                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "xac-nhan-dat-xe",
                        data: {
                            id_xe: data.id_xe,
                            ngay_nhan_xe: data.ngay_nhan_xe,
                            ngay_tra_xe: data.ngay_tra_xe,
                            thanh_tien: data.thanh_tien,
                        },
                        success: function(response) {
                            if (!response.error) {
                            hideModal('js_modal_xac_nhan');
                            showModal('js_modal_thong_bao_success');
                            } else {
                            hideModal('js_modal_xac_nhan');
                            showModal('js_modal_thong_bao_error');
                        }
                        }
                    })
                    .done(function() {})
                    .fail(function() {
                    hideModal('js_modal_xac_nhan');
                    showModal('js_modal_thong_bao_success');
                    })
            });
        });
    </script>
@endpush
