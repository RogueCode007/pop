@extends('layouts.app')
@section('content')
  
<div class="container-lg">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session()->get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
  <a href="{{route('items.index)}}">Bsck to shop</a>
</div>
@endsection
