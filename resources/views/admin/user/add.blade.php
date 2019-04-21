@extends('admin.master')
@section('page-header','User')
@section('title', 'Add')
@section('content')
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{!! URL::route('add_user') !!}" method="POST">
                                {{csrf_field()}}
                            @include('admin.note.error')
                            <div class="form-group">
                                <label>Username</label>
                            <input class="form-control" name="txtUser" value="{!! old('txtUser') !!}" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control"  value="{!! old('txtPass') !!}" name="txtPass" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="txtRePass" value="{!! old('txtRePass') !!}" placeholder="Please Enter RePassword" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" value="{!! old('txtEmail') !!}" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
@stop
            