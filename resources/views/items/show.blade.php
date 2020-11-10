@extends('layouts.app')
@section('content')

  <div>
    <div class="container">
      <h1>Welcome to the item page</h1>
      @if(session()->has('success'))
        <div class="success">{{session()->get('success')}}</div>
      @endif
      <div>
        @foreach($images as $image)
          <img src="{{asset('storage/images/'.$image->name)}}" alt="dress image" class="show-image" style="height: 350px; width: 200px">
        @endforeach
        <img src="{{asset('storage/coverImages/'.$item->image_name)}}" alt="" style="height: 350px; width: 200px">
      </div>
      <p>{{$item->name}}</p>
      <p>{{$item->price}}NGN</p>
      <p>{{$item->description}}</p>
      <form action="{{ route('cart.store') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" value="{{ $item->id }}" id="id" name="id">
          <input type="hidden" value="{{ $item->name }}" id="name" name="name">
          <input type="hidden" value="{{ $item->price }}" id="price" name="price">
          <input type="hidden" value="{{ $item->image_name }}" id="img" name="img">
          <input type="hidden" value="1" id="quantity" name="quantity">
          <div  style="background-color: white;">
                <div class="row">
                  <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                      <i class="fa fa-shopping-cart"></i> add to cart
                  </button>
              </div>
          </div>
      </form>
      @auth
      <a href="{{route('items.update', $item->id)}}">Edit item</a>
      <a href="{{route('items.addPhoto', $item->id)}}">Add Photo</a>
      <form action="{{route('items.delete', $item->id)}}" method="POST">
        @csrf 
        @method('DELETE')
        <button>Delete item</button>
      </form>
      @endauth
      <a href="{{route('items.index')}}">Back to shop</a>
    </div>   
  </div>
@endsection
