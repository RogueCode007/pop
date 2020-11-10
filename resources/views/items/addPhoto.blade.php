@extends('layouts.app')
@section('content')
  <div>
    @if(session()->has('success'))
      <div class="success">{{session()->get('success')}}</div>
    @endif
    <form action="{{route('items.addPhoto', $item->id)}}" method="POST" enctype="multipart/form-data">
      @csrf 
      <div class="form-group">
        <label for="photo1">Add a photo</label>
        <input type="file" name="photo[]" >
        @error('photo1')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="photo2">Add a photo</label>
        <input type="file" name="photo[]" >
        @error('photo2')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="photo3">Add a photo</label>
        <input type="file" name="photo[]" >
        @error('photo3')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
        <input type="hidden" name="id" value="{{$item->id}}">
        <input type="submit" value="Submit">
    </form>
  </div>
@endsection