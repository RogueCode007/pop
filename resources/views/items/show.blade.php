@extends('layouts.app')
@section('content')

  <div>
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
      </div>
    @endif
    <div class="container item-content">
      <div class="item-img">
        <div class="img-display">    
          <!-- Expanded image -->
          <img src="https://darkgrambucket.s3.us-east-2.amazonaws.com/coverImages{{$item->image_name}}" id="expandedImg" style="width:100%; height: 100%">
        </div>
        <div class="images-row">
          @foreach($images as $image)
          <div class="image-col">
            <img src="https://darkgrambucket.s3.us-east-2.amazonaws.com/images{{$image->name}}" alt="item image" onclick="showImage(this)">
          </div>
          @endforeach
          <div class="image-col">
            <img src="https://darkgrambucket.s3.us-east-2.amazonaws.com/coverImages{{$item->image_name}}" alt="item image" onclick="showImage(this)">
          </div>
        </div>
      </div>
      <div class="item-details">
        <p>{{$item->name}}</p>
        <p class="item-price">{{$item->price}}NGN</p>
        <p>Details: {{$item->description}}</p>
        <form action="{{ route('cart.store') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $item->id }}" id="id" name="id">
            <input type="hidden" value="{{ $item->name }}" id="name" name="name">
            <input type="hidden" value="{{ $item->price }}" id="price" name="price">
            <input type="hidden" value="{{ $item->image_name }}" id="img" name="img">
            <input type="hidden" value="1" id="quantity" name="quantity">
            <div>
                  <div class="">
                    <button  class="btn btn-outline-success btn-md" class="tooltip-test" title="add to cart">
                        <i class="fa fa-shopping-cart"></i> add to cart
                    </button>
                </div>
            </div>
        </form>
        <a href="{{route('items.index')}}">Back to shop</a>
        @auth
        <div class="controls">
        <button type="button" class="btn btn-sm btn-outline-warning">
          <a href="{{route('items.update', $item->id)}}" class="item-link item-link1">Edit item <span><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
        </button>
        <button type="button" class="btn btn-sm btn-outline-primary">
          <a href="{{route('items.addPhoto', $item->id)}}" class=" item-link item-link2">Add Photo <span><i class="fa fa-camera" aria-hidden="true"></i></span></a>
        </button>
        
        <form action="{{route('items.delete', $item->id)}}" method="POST" style="display: inline">
          @csrf 
          @method('DELETE')
          <button class=" btn btn-sm btn-outline-danger"> Delete item <i class="fa fa-trash-o" ></i></button>
        </form>
        </div>
        
        @endauth
      </div>
    </div>   
  </div>
@endsection

<script>
function showImage(img){
  let expandedImg = document.getElementById('expandedImg');
  expandedImg.src = img.src;  
}


</script>