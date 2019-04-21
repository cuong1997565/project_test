@extends('admin.master')
@section('page-header','Product')
@section('title', 'Add')

@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.note.error')
    <form action="{!!route('add_product')!!}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="txtCateParent">
                <option value="">Please Choose Category</option>
                <?php cate_parent($cate,0,"--",old('txtCateParent')); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{old('txtName')}}" />
        </div>
        <div class="form-group">
            <label>Price</label>
            <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{old('txtPrice')}}"/>
        </div>
        <div class="form-group">
            <label>Intro</label>
            <textarea class="form-control ckeditor" rows="3" name="txtIntro">{{old("txtIntro")}}</textarea>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control ckeditor" rows="3" name="txtContent">{{old("txtContent")}}</textarea>
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Product Keywords</label>
            <input class="form-control" name="txtKeywords"  value="{{old('txtKeywords')}}" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea class="form-control" rows="3" name="txtDescription">{{old("txtDescription")}}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Product Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
</div>
<div class="col-md-1"></div>
<div class="col-md-4">
    @for ($i = 1; $i <= 10; $i++)
    <div class="form-group">
        <label>Image Product Detail {{$i}} </label>
        <input type="file" name="fProductDetail[]">
    </div>
@endfor
<form>

</div>

@endsection