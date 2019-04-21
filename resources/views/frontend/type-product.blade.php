@extends('frontend.master')
@section('name','Home')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
		   <div class="main-content">
			  <div class="space60">&nbsp;</div>
			  <div class="row">
				 <div class="col-sm-12">
					<div class="beta-products-list">
					   <h4> Type Products</h4>
					   <div class="beta-products-details">
						  <p class="pull-left">438 styles found</p>
						  <div class="clearfix"></div>
                       </div>
                       @if(count($product_cate) > 0)
					   <div class="row">
							@foreach ($product_cate as $item)
							<div class="col-sm-3">
									<div class="single-item">
									  <div class="single-item-header">
										  <a href="{!! URL::route('getdetail',['id' => $item->id, 'alias' => $item->alias]) !!}"><img height="246px" src="{{ asset('public/upload/image/'.$item->image) }}" alt=""></a>
									  </div>
									  <div class="single-item-body">
										  <p class="single-item-title">{{ $item->name }}</p>
										  <p class="single-item-price">
											 <span>  {{number_format($item->price, 0, ",", ".")}} VNĐ </span>
										  </p>
									  </div>
									  <div class="single-item-caption">
										  <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
										  <a class="beta-btn primary" href="{!! URL::route('getdetail',['id' => $item->id, 'alias' => $item->alias]) !!}">Details <i class="fa fa-chevron-right"></i></a>
										  <div class="clearfix"></div>
									  </div>
									</div>
								 </div>
							@endforeach
                       </div>
                       @else
                        <div class="row">
                            <h3>Không có sản phẩm trong loại này</h3>
                        </div>
                       @endif
					</div>
					<!-- .beta-products-list -->
					<div class="space50">&nbsp;</div>
					<!-- .beta-products-list -->
				 </div>
			  </div>
			  <!-- end section with sidebar and main content -->
		   </div>
		   <!-- .main-content -->
		</div>
		<!-- #content -->
	 </div>
@stop
            