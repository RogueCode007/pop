@extends('layouts.app')
@section('content')
  
<div class="container-lg">
  <p>Thanks for your order!</p>
  <a href="{{route('items.index')}}">Back to shop</a>
</div>
@endsection
