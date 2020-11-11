@extends('layouts.app')
@section('content')
  <div class="item-form">
    @if(session()->has('success'))
      <div class="success">{{session()->get('success')}}</div>
    @endif
    <form action="{{route('items.addPhoto', $item->id)}}" method="POST" enctype="multipart/form-data" class="md-container text-left bg-dark">
      @csrf 
      <div class="form-group">
        <label for="photo1">Add a photo</label>
        <div class="input">
          <input type="file" name="photo[]" >
        </div>
        @error('photo1')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="photo2">Add a photo</label>
        <div class="input">
          <input type="file" name="photo[]" >
        </div>
        @error('photo2')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="photo3">Add a photo</label>
        <div class="input">
          <input type="file" name="photo[]" >
        </div>
        @error('photo3')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
        <input type="hidden" name="id" value="{{$item->id}}">
        <button class=" btn btn-primary">Add Item</button>
    </form>
  </div>
@endsection