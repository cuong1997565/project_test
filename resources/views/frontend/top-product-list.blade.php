<div class="beta-products-list">
        <h4>Top Products</h4>
        <div class="beta-products-details">
           <p class="pull-left">438 styles found</p>
           <div class="clearfix"></div>
        </div>
        <div class="row">
           @foreach ($products_top as $item)
           <div class="col-sm-3" style="margin-bottom:15px;">
               <div class="single-item">
                  <div class="single-item-header">
                     <a href="{!! URL::route('getdetail',['id' => $item->id, 'alias' => $item->alias]) !!}"><img src="{{asset('public/upload/image/'.$item->image)}}" width="250px" height="250px;" alt=""></a>
                  </div>
                  <div class="single-item-body">
                     <p class="single-item-title">{{$item->name}}</p>
                     <p class="single-item-price">
                        <span> {{number_format($item->price, 0, ",", ".")}} VNĐ  </span>
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