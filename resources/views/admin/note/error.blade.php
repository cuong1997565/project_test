@if (count($errors) > 0)
<div class="alert alert-danger">
     <ul>
          @foreach ($errors->all() as $item)
              <li> {!! $item !!}</li>
          @endforeach
     </ul>
</div>
@endif

@if(Session::has('error'))
    <p class="alert alert-danger"> {{ Session::get('error') }} </p>
@endif
