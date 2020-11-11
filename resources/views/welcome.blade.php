@extends('layouts.app')
@section('content')
       
<div class="container-fluid text-center">
        <div class="img-container jumbotron ">
            <div>
            <h1>New, Amazing Stuff Is Here</h1>
            <p class="lead">Shop today and get 20% discount</p>
            <a href="/items"  class="shop">Shop Now</a>
            </div>  
        </div>    
        <div class="tabs">
            <div class="tab card-1 rounded"><a href="{{route('items.bag')}}" class="label">Bags</a></div>
            <div class="tab card-2 rounded"><a href="{{route('items.dress')}}" class="label">Dresses</a></div>
            <div class="tab card-3 rounded"><a href="{{route('items.footwear')}}" class="label">Heels</a></div>
        </div>         
</div>   
    
@endsection

