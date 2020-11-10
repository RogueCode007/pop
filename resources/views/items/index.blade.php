@extends('layouts.app')
@section('content')
  
<div class="container">
  <div>
    <h1>Welcome to the shop page</h1>
    @auth
    <a href="{{route('items.create')}}">Add Item</a>
    @endauth
  </div>
  
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
      <div class="col-lg-3 col-md-4  item">
        <div class="card" style="margin-bottom: 20px; height: auto;">
          <img src="{{asset('storage/coverImages/'.$item->image_name)}}"
            class="card-img-top mx-auto "
            style="height: 350px; width: 100%;display: block;"
            alt="dress image">
          <a href="{{route('items.show', $item->id)}}" style="margin-top: 15px; text-align: center"><h5 class="card-title">{{$item->name}} </h5></a>
          <p style="text-align: center;">{{$item->price}}NGN</p>
          <form action="{{ route('cart.store') }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" value="{{ $item->id }}" id="id" name="id">
              <input type="hidden" value="{{ $item->name }}" id="name" name="name">
              <input type="hidden" value="{{ $item->price }}" id="price" name="price">
              <input type="hidden" value="{{ $item->image_name }}" id="img" name="img">
              <input type="hidden" value="1" id="quantity" name="quantity">
              <div class="card-footer" style="background-color: white;">
                    <div class="row">
                      <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                          <i class="fa fa-shopping-cart"></i> add to cart
                      </button>
                  </div>
              </div>
          </form>
        </div>
      </div>    
    @endforeach
  </div>
  {{$items->links()}}
</div>
@endsection
