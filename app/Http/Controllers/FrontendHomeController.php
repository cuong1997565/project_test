<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FrontendHomeController extends Controller
{
    public function getHome(){
        $products = DB::table('products')->select('id','name','price','alias','image')->orderBy('id','desc')->skip(0)->take(4)->get();
        $products_top = DB::table('products')->select('id','name','price','alias','image')->orderBy('id','desc')->skip(0)->take(8)->get();
        return view('frontend.home',compact('products','products_top'));
    }

    public function getLoaiSanPham ($id, $alias) {
        $product_cate = DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->get();
        return view('frontend.type-product',compact('product_cate'));
    }

    public function getDetail($id) {
            $product_detail = DB::table('products')->where('id', $id)->first();
            $products = DB::table('products')->select('id','name','price','alias','image')->orderBy('id','asc')->skip(0)->take(4)->get();
            $products_new = DB::table('products')->select('id','name','price','alias','image')->orderBy('id','desc')->skip(0)->take(4)->get();
            return view('frontend.product' ,compact('product_detail','products','products_new'));
    }
}
