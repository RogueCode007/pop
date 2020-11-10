@extends('layouts.app')
@section('content')
  
<div class="container-lg">

    @auth
    <div style="margin-bottom: 10px">
      <a class="bg-success add" href="{{route('items.create')}}" style="padding: 5px; color: white;">Add Item <span><i class="fa fa-plus"></i></span></a>
    </div>
    @endauth
  
  
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session()->get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
  <div class="row">
    @foreach($items as $item)
      <div class="col-lg-3 col-md-4 col-sm-6 col-6 item">
        <div class="card" style="margin-bottom: 20px; height: auto;">
          <a href="{{route('items.show', $item->id)}}"><img src="{{asset('storage/coverImages/'.$item->image_name)}}"
            class="card-img-top mx-auto "
            style="height: 200px; width: 100%;display: block;"
            alt="dress image"></a>
            <div class="action text-left">
              <p>{{$item->name}} <span class="">{{$item->category}}</span></p>
              <p class="">{{$item->price}} NGN</p>
              <form action="{{ route('cart.store') }}" method="POST" class="">
                  {{ csrf_field() }}
                  <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                  <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                  <input type="hidden" value="{{ $item->price }}" id="price" name="price">
                  <input type="hidden" value="{{ $item->image_name }}" id="img" name="img">
                  <input type="hidden" value="1" id="quantity" name="quantity">
                  <div class="">
                    <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                        <i class="fa fa-shopping-cart"></i> add to cart
                    </button>    
                  </div>
              </form>
              
            </div>
          
        </div>
      </div>    
    @endforeach
  </div>
  {{$items->links()}}
</div>
@endsection
