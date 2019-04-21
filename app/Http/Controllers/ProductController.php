<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate, App\Product,App\ProductImage;
use App\Http\Requests\ProductRequest;
use File;

class ProductController extends Controller
{
    public function getList() {
        $data = Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
        return view('admin.product.list', compact('data'));
    }
    public function getAdd() {
        $cate = Cate::select('name','id','parent_id')->get()->toArray();
        return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $request) {
        $product = new Product;
        $url = $request->file('fImages');
        $file_name =  $url->getClientOriginalName();
        $product->name            = $request->txtName;
        $product->alias           = changeTitle($request->txtName);
        $product->price           = $request->txtPrice;
        $product->intro           = $request->txtIntro;
        $product->content         = $request->txtContent;
        $product->image           =  time() . '.' .$file_name;
        $product->keywords        = $request->txtKeywords;
        $product->description     = $request->txtDescription;
        $product->user_id         = 1;
        $product->cate_id         = $request->txtCateParent;
        $url->move('public/upload/image/', time() . '.' . $file_name);
        $product->save();
        $product_id = $product->id;
        if($request->hasFile('fProductDetail')) {
           foreach ($request->file('fProductDetail') as $file) {
                $product_img = new ProductImage;
                if(isset($file)){
                    $name_img = $file->getClientOriginalName();
                    $product_img->image   =  time() . '.' . $name_img;
                    $product_img->product_id = $product_id;
                    $file->move('public/upload/image/detail/', time() . '.' . $name_img);
                    $product_img->save();
                }
           }
        }
        return redirect()->route('list_product')->with([
            'flash_level' => 'success',
            'flash_message'=>'Success !! Complete Add Product'
        ]);
    }

    public function getDelete($id) {
        $product_detail = Product::find($id)->pimages()->get()->toArray();
        foreach ($product_detail as $value){
            File::delete('public/upload/image/detail/'.$value["image"]);
        }
        $product = Product::find($id);
        File::delete('public/upload/image/'.$product->image);
        $product->delete($id);
        return redirect()->route('list_product')->with([
            'flash_level' => 'success',
            'flash_message'=>'Success !! Complete Delete Product'
        ]);
    }


    public function getEdit($id) {
        $cate = Cate::select('name','id','parent_id')->get()->toArray();
        $product = Product::find($id)->toArray();
        $product_image = Product::find($id)->pimages;
        return view('admin.product.edit',compact('cate','product','product_image'));
    }

    public function postEdit($id,Request $request) {
          $product = Product::find($id);
          $product->name = $request->input('txtName');
          $product->alias = changeTitle($request->input('txtName'));
          $product->price = $request->input('txtPrice');
          $product->intro = $request->input('txtIntro');
          $product->content = $request->input('txtContent');
          $product->keywords = $request->input('txtKeywords');
          $product->description = $request->input('txtDescription');
          $product->user_id = 1;
          $product->cate_id = $request->input('txtCateParent');
          //upload image
          $img_current = 'public/upload/image/'.$request->input('img_current');
          if(!empty($request->file('fImages'))){
              $file_name = time() . '.' . $request->file('fImages')->getClientOriginalName();
              $product->image = $file_name;
              $request->file('fImages')->move('public/upload/image/', $file_name);
              if(File::exists($img_current)){
                  File::delete($img_current);
              }
          } else {
              echo "không có file";
          }
          $product->save();
          //upload images detail
          if (!empty($request->file('fProductDetail'))) {
            foreach ($request->file('fProductDetail') as $file) {
                $product_img = new ProductImage;
                if(isset($file)) {
                    $product_img->image = time() . '.' . $file->getClientOriginalName();
                    echo $product_img->image ."<br>";
                    $product_img->product_id  = $id;
                    $file->move('public/upload/image/detail/',time() . '.' .$file->getClientOriginalName());
                }
                $product_img->save();
            }        
          }
          else {
              echo "không có file";
          }
        

          return redirect()->route('list_product')->with([
            'flash_level' => 'success',
            'flash_message'=>'Success !! Complete Edit Product'
        ]);
    }


    public function getDeleImage(Request $request , $id) {
        if($request->ajax()){
            $idHinh = (int)$request->input('idHinh');
            $image_detail = ProductImage::find($idHinh);
            if (!empty($image_detail)){
                  $img = 'public/upload/image/detail/'.$image_detail->image;
                  if (File::exists($img)){
                    //    File::delete($img);
                    File::delete($img);
                  }
                  else {
                      echo "không có file";
                  }
                  $image_detail->delete();
            }
            return "Oke";
        }
    }
}

