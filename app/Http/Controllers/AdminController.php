<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    function index(){
        $blogs=DB::table('blogs')->get();
        return view('all',compact('blogs'));
    }

    function about(){
        $name="JoJo";
        $date="10 Ags 2024";
        // แนบข้อมูลด้วย compact
        return view('about',compact('name','date'));
    }

    function write(){
        return view('form');
    }

    function insert(Request $request){
        $time = date('Y-m-d H:i:s',time());
        $request->validate(
            [
                // ตรวจสอบข้อมูลที่ส่งมาจากฟอร์ม name = title
                'title'=>'required|max:50', 
                // ตรวจสอบข้อมูลที่ส่งมาจากฟอร์มชื่อ name = content
                'content'=>'required'
            ],
            [
                'title.required'=>'กรุณาป้อนชื่อบทความ',
                'title.max' => 'ชื่อบทความไม่เกิน 50 ตัวอักษร',
                'content' => 'กรุณาป้อนเนื้อหาบทความ'
            ]
        );
        $data=[
            'title'=>$request->title,
            'content'=>$request->content,
            'created_at'=>$time,
            'updated_at'=>$time
        ];
        DB::table('blogs')->insert($data);
        return redirect('/all');
    }

    function delete($id){
        DB::table('blogs')->where('id',$id)->delete();
        return redirect(route('block'));
    }

    function update(){
        DB::table('blogs')->where('id',$id)->update();
    }
}
