@extends('admin.master')
@section('page-header','Product')
@section('title', 'List')

@section('content')
<table class="table table-striped table-bordered table-hover" id="sample-table">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $stt = 1;    
        ?>
        @foreach ($data as $item)
        <tr class="odd gradeX" align="center">
            <td>{{$stt++}}</td>
            <td>{{ $item['name'] }}</td>
            <td>{!! number_format($item['price'],0,",",".") !!}  VNĐ</td>
            <td>
                <?php
                  echo \Carbon\Carbon::createFromTimeStamp(strtotime($item["created_at"]))->diffForHumans();
                ?>
            </td>
            <td>
                <?php
                    $cate = DB::table('cates')->where('id',$item["cate_id"])->first();    
                ?>
                @if (!empty($cate->name))
                    {{$cate->name}}
                @endif
            </td>
            <td class="center">
                <i class="fa fa-trash-o  fa-fw"></i>
                <a onclick="return xacnhanxoa('Bạn có chắc là muốn xóa không')" 
                href="{!! URL::route('delete_product', $item['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('edit_product', $item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
        
    </tbody>
</table>
@endsection