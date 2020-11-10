@extends('layouts.app')
@section('content')
  <div >        
    <div class="container">
      <h1>Add a new item</h1>
     
      <form action="/items" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" value="{{old('name') ?? ''}}">
          @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Price(NGN):</label>
          <input type="number" id="price" name="price" value="{{old('price') ?? ''}}">
          @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="category">Select category:</label>
          <select name="category">
            <option value="dress">Dress</option>
            <option value="footwear">Footwear</option>
            <option value="bag">Bag</option>
          </select>
        </div>
        <div class="form-group">
          <label for="descriptionn">Description:</label>
          <textarea name="description" id="description" value="{{old('description') ?? ''}}"></textarea>
          @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Cover image</label>
          <input type="file" name="coverImage">
          @error('coverImage')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Additional image</label>
          <input type="file" name="photo[]">
          @error('photo')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Additional image</label>
          <input type="file" name="photo[]">
          @error('photo')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <input type="submit" value="Add Item">
      </form>
    </div>
  </div>
@endsection
