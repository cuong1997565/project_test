@extends('admin.master')
@section('page-header','Product')
@section('title', 'Edit')
@section('content')
<style>
    .image_curent{
        width: 200px;
    }
    .img_detail{
        width: 200px;
        margin-bottom: 20px;
        height: 200px;
    }
    .icon_del{
        background: red;
        position: relative;
        top: -95px;
        left: -14px;
    }
    #insert {
        margin-top: 20px;
    }
</style>

<form action="{!! URL::route('edit_product', $product['id']) !!}" method="POST" name="frmEditProduct" enctype="multipart/form-data">
<div class="col-lg-7" style="padding-bottom:120px">
        @include('admin.note.error')
                {{csrf_field()}}
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="txtCateParent">
                    <option value="">Please Choose Category</option>
                    <?php 
                        cate_parent($cate,0,"--",$product['cate_id']); 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="txtName" value="{!! old('txtName',isset($product) ? $product['name'] : null)  !!}" placeholder="Please Enter Username" />
            </div>
            <div class="form-group">
                <label>Price</label>
                <input class="form-control" name="txtPrice" value="{!! old('txtPrice',isset($product) ? $product['price'] : null)  !!}"  placeholder="Please Enter txtPrice" />
            </div>
            <div class="form-group">
                <label>Intro</label>
                <textarea class="form-control ckeditor" rows="3" name="txtIntro">{!! old('txtIntro',isset($product) ? $product['intro'] : null)  !!}</textarea>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control ckeditor" rows="3" name="txtContent">{!! old('txtContent',isset($product) ? $product['content'] : null)  !!}</textarea>
            </div>
            <div class="form-group">
                <label>Image Current</label>
                <img src="{!! asset('public/upload/image/'.$product['image']) !!}" class="image_curent" alt="">
            </div>
            <div class="form-group">
                <label>Images</label>
                <input type="file" name="fImages">
                <input type="hidden" name="img_current" value="{!!$product['image']!!}">
            </div>
            <div class="form-group">
                <label>Product Keywords</label>
                <input class="form-control" name="txtKeywords" value="{!! old('txtKeywords',isset($product) ? $product['keywords'] : null)  !!}" placeholder="Please Enter Category Keywords" />
            </div>
            <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription',isset($product) ? $product['description'] : null)  !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Product Edit</button>
            <button type="reset" class="btn btn-default">Reset</button>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
        @foreach ($product_image as $key => $item)
                <div class="form-group" id="{!!$key!!}">
                        <img src="{!! asset('public/upload/image/detail/'.$item->image) !!}" idHinh="{!!$item->id!!}" id="{!!$key!!}" class="img_detail" alt="">
                        <a href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
                    </div>
         @endforeach
         <button type="button" class="btn btnp-primary" style="margin-bottom:10px;" id="addImages">Add Images</button>
         <div id="insert"></div>        
    </div>
    <form>
@endsection
