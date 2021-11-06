@extends('admin.layouts.baseAdmin')
@section('title', 'Danh sách môn học')
@section('main_content')
<style>
    .input-text {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }

    .select {
        width: 100%;
        border: 1px solid #ccc;
        color: #777;
        border-radius: 6px;
        height: 35px;
    }
</style>
<div class="container">
    <h4 class="text-center">Danh sách môn học</h4>
    <a href="trang-them-mon-hoc" class="btn btn-primary">Thêm môn</a>
    <br>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên môn</th>
                <th>Ảnh</th>
                <th>Ngành</th>
                <th>Trang thái</th>
                <th>Ngày</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $index = 1;
            ?>
            @foreach($dataSubject as $key)
            <tr>
                <td><?= $index++ ?></td>
                <td>{{$key['subject_name']}}</td>
                <td>
                    <img width="50px" src="./public/img/{{$key['subject_img']}}" alt="">
                </td>
                <td>{{$key['cate_name']}}</td>
                <td>@if($key['subject_status'] == 0)
                    <span style="color:red">Chưa mở</span>
                    @else
                    <span style="color:green">Đã mở</span>
                    @endif
                </td>
                <td>{{$key['date_post']}}</td>
                <td><a class="btn btn-warning" onclick="return confirm('Bạn có muốn Sửa môn học này ?')" href="sua-khoa-hoc?id={{$key['subject_id']}}">Sửa</a></td>
                <td><a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa môn học này ?')" href="xoa-khoa-hoc?id={{$key['subject_id']}}">Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- dd($data['dataCateProduct']); -->
@endsection