@extends('layouts.app')
@section('content')
  <div >        
    <div class="item-form">
      <h1>Update item</h1>
      <form action="{{route('items.update', $item->id)}}" method="POST" enctype="multipart/form-data" class="md-container text-left bg-dark">
      @csrf
      <div class="form-group">
          <label for="name">Name:</label>
          <div class="input">
            <input type="text" id="name" name="name" value="{{old('name') ?? ''}}">
          </div>
          @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Price(NGN):</label>
          <div class="input">
            <input type="number" id="price" name="price" value="{{old('price') ?? ''}}">
          </div>
          @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category">Select category:</label>
          <div class="input">
            <select name="category">
              <option value="dress">Dress</option>
              <option value="footwear">Footwear</option>
              <option value="bag">Bag</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="descriptionn">Description:</label>
          <div class="input">
            <textarea name="description" id="description" value="{{old('description') ?? ''}}" style="width: 100%; height: 150px"></textarea>
          </div>
          @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Cover image</label>
          <div class="input">
            <input type="file" name="coverImage">
          </div>
          @error('coverImage')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button class=" btn btn-primary">Update Item</button>
      </form>
    </div>
  </div>
@endsection
