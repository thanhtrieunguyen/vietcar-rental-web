<?php

namespace App\Http\Controllers;

use App\Models\DongXe;
use App\Models\HangXe;
use Illuminate\Http\Request;
use App\Models\Xe;
use App\Models\GiaoDich;
use App\Models\HoaDon;

class PageController extends Controller
{
    public function getHome()
    {
        $xes = Xe::with('dongXe', 'hangXe')->orderBy('gia', 'desc')->take(8)->get();
        return view('pages.trangchu', compact('xes'));
    }

    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }

    public function getDangKy()
    {
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        return view('pages.dangky', compact('today'));
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.lienhe');
    }

    public function getThueXe()
    {
        $xes = Xe::with('dongXe', 'hangXe', 'hinhXe')->latest()->paginate(24);
        $dongXes = DongXe::select('iddongxe', 'tendongxe')->limit(100)->get();
        $hangXes = HangXe::select('idhangxe', 'tenhangxe')->limit(100)->get();
        return view('pages.thuexe', compact('xes', 'dongXes', 'hangXes'));
    }

    public function getBlog()
    {
        return view('pages.blogs');
    }
    public function getDulich()
    {
        return view('pages.dulich');
    }

    public function timKiem(Request $request)
    {
        $dongXes = DongXe::select('iddongxe', 'tendongxe')->limit(100)->get();
        $hangXes = HangXe::select('idhangxe', 'tenhangxe')->limit(100)->get();
        $query = $request->q;
        if ($query) {
            $xes = Xe::with('dongXe', 'hangXe')
                ->where('tenxe', 'LIKE', '%' . $query . '%')
                ->orWhere('bienso', 'LIKE', '%' . $query . '%')
                ->latest()
                ->paginate(24);
        } else {
            $xes = Xe::with('dongXe', 'hangXe')->latest()->paginate(24);
        }

        return view('pages.timkiem', compact('xes', 'query', 'dongXes', 'hangXes'));
    }

    public function getTrangCaNhan()
    {
        $khachHang = auth()->user();
        $giaoDichs = GiaoDich::with('xe', 'user')
            ->where('iduser', $khachHang->iduser)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('pages.trangcanhan', compact('khachHang', 'giaoDichs'));
    }

    public function getTrangThanhToan($id)
    {
        $giaoDich = GiaoDich::findOrFail($id);
        $hoaDon = $giaoDich->hoadon;

        return view('pages.thanhtoan', compact('hoaDon'));
    }

    public function getApiThueXe(Request $request)
    {
        $xes = Xe::with('dongXe', 'hangXe', 'hinhXe')->latest()->paginate(24);
        return response()->json($xes);
    }
}
