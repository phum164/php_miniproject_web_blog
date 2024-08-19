@extends('layout')
@section('title', 'บทความทั้งหมด')
@section('content')
    <h2 class="text text-center py-2">All Page</h2>
    <hr>
    <div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">ชื่อบทความ</th>
                    <th scope="col">เนื้อหา</th>
                    <th scope="col">สถานะบทความ</th>
                    <th scope="col">ลบบทความ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    @if ($item->status)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ Str::limit($item->content,10) }}</td>
                            <td><a href="{{route('update',$item->id)}}" class="btn btn-success">เผยแพร่</a></td>
                            <td>
                                <a href="{{route('delete',$item->id)}}" 
                                    class="btn btn-danger"
                                    onclick="return confirm('คุณต้องการลบบทความ {{ $item->title }} หรือไม่ ?')"
                                    >ลบ</a></td>
                        </tr>
                    @else
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ Str::limit($item->content,10) }}</td>
                            <td><a href="{{route('update',$item->id)}}" class="btn btn-warning">ฉบับร่าง</a></td>
                            <td> <a href="{{route('delete',$item->id)}}" 
                                class="btn btn-danger"
                                onclick="return confirm('คุณต้องการลบบทความ {{ $item->title }} หรือไม่ ?')"
                                >ลบ</a></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="about">เกี่ยวกับเรา</a>
    <a href="{{ route('page') }}">first page</a>
@endsection
