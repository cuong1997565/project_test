@extends('admin.master')
@section('page-header','Category')
@section('title', 'Add')

@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @include('admin.note.error')
    <form action="{!! route('add_cate') !!}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label>Category Parent</label>
            <select class="form-control" name="txtCateParent">
                <option value="0">Please Choose Category</option>
                <?php cate_parent($parent); ?>
            </select>
        </div>
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Order</label>
            <input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
        </div>
        <div class="form-group">
            <label>Category Keywords</label>
            <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" name="txtDescription" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Category Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    <form>
</div>
@endsection
