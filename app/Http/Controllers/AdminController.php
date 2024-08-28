<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog; //นำ model มาใช้
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        // $blogs=DB::table('blogs')->paginate(5);
        $blogs=Blog::paginate(5);
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
        //request คือ array ที่รับเข้ามาจาก post method
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
        // DB::table('blogs')->where('id',$id)->delete();
        Blog::find($id)->delete();
        return redirect(route('block'));
    }

    function change($id){
        // $blog=DB::table('blogs')->where('id',$id)->first();
        $blog=Blog::find($id);
        $data=[
            'status'=>!$blog->status
        ];
        // DB::table('blogs')->where('id',$id)->update($data);
        $blog=Blog::find($id)->update($data);
        // กลับไปยังหน้าที่เรียกใช้ฟังก์ชันนี้
        return redirect()->back();
    }

    function edit($id){
        // $blog=DB::table('blogs')->where('id',$id)->first();
        $blog=Blog::find($id);
        // dd($blog);
        return view('edit',compact('blog'));
    }

    function update(Request $request,$id){
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
            'updated_at'=>$time
        ];
        // DB::table('blogs')->where('id',$id)->update($data);
        $blog = Blog::find($id)->update($data);
        if($blog){
            $blog->update($data);
        }
        return redirect('/all');
    }
}
