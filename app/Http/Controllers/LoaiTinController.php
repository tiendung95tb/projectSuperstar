<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    public function getDanhSach()
    {
    	$loaitin = LoaiTin::all();
    	return view('admin.loaitin.danhsach', ['loaitin' =>$loaitin]);
    }

   	public function getThem()
   	{
   		return view('admin.loaitin.them');
   	}

   	public function getSua($id)
   	{
       $loaitin = LoaiTin::find($id);
       return view('admin.loaitin.sua', ['loaitin' => $loaitin]);
     }
     
     public function postSua(Request $request, $id)
   	{
       $theloai = LoaiTin::find($id);
       $this->validate($request,
         [
            'Ten' => 'required|unique:LoaiTin,Ten|min:3|max:100'
        ],
        [
          'Ten.require'=>'Bạn chưa nhập tên thể loại',
          'Ten.unique'=>'Tên thể loại đã tồn tại',
          'Ten.min' => 'Tên thể loại phải có từ 3 - 100 ký tự',
          'Ten.max' => 'Tên thể loại phải có từ 3 - 100 ký tự',
        ]);

        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Sửa thành công.');
   	}

    public function postThem(Request $request)
    {
        $this->validate($request, 
          [
            'Ten' => 'required|min:3|max:10|unique:LoaiTin,Ten'
          ],
          [
            'Ten.required' => 'Bạn chưa nhập tên thể loại!',
            'Ten.min' => 'Tên thể loại phải có từ 3 - 100 ký tự',
            'Ten.max' => 'Tên thể loại phải có từ 3 - 100 ký tự',
            'Ten.unique' => 'Tên thể loại đã tồn tại',
          ]);

        $theloai = new LoaiTin;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/loaitin/them')->with('thongbao', 'Bạn đã thêm thành công');
    }

    public function getXoa($id)
    {
      # code...
      $loaitin = LoaiTin::find($id);
      $loaitin->delete();
      return redirect('admin/loaitin/danhsach')->with('thongbao', 'Bạn đã xoá thành công');
    }
}

// <?php
