@extends('layouts.app')
@section('content')
  <div >        
    <div class="create-form">
      <h1>Add a new item</h1>
      <form action="/items" method="POST" enctype="multipart/form-data" class="md-container text-left bg-dark">
      @csrf
        <div class="form-group ">
          <label for="name" class="">Name*</label>
          <div class="input ">
            <input type="text" id="name" name="name" value="{{old('name') ?? ''}}" >
          </div>
          @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price" class="">Price(NGN)*</label>
          <div class="input">
            <input type="number" id="price" name="price" value="{{old('price') ?? ''}}" class="">
          </div>
          @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group ">
          <label for="category" class="">Select category*</label>
          <div class="input">
            <select name="category" class="">
              <option value="dress">Dress</option>
              <option value="footwear">Footwear</option>
              <option value="bag">Bag</option>
            </select>
          </div>
        </div>
        <div class="form-group ">
          <label for="description" class="">Description*</label>
          <div class="input">
            <textarea name="description" id="description" value="{{old('description') ?? ''}}" class="" style="width: 100%"></textarea>
          </div>
          @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group ">
          <label for="photo" class="">Cover image*</label>
          <div class="input">
            <input type="file" name="coverImage" class="">
          </div>
          @error('coverImage')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo" class="">Additional image</label>
          <div class="input">
            <input type="file" name="photo[]" class="">
          </div>
          @error('photo')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo" class="">Additional image</label>
          <div class="input">
            <input type="file" name="photo[]" class="">
          </div>
          @error('photo')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button class="btn-primary">Add Item</button>
      </form>
    </div>
  </div>
@endsection
