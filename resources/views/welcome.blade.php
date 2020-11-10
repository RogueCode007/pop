@extends('layouts.layout')
@section('content')
       
<div class="container-fluid text-center">
    <nav class="navbar  d-flex navbar-expand-md  align-items-center">
        <h1 class="navbar-brand">Fashop</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item">
                <a href="/items" class="nav-link"><p>Shop now</p></a>
                </li>
                <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Admin Login</a>
                </li>
            </ul>
        </div>           
    </nav>
    
        <div class="img-container jumbotron ">
            <div>
            <h1>New, Amazing Stuff Is Here</h1>
            <p class="lead">Shop today and get 20% discount</p>
            <a href="/items"  class="shop">Shop Now</a>
            </div>  
        </div>    
        <div class="row">
            <div class="col-md-4 col-sm-12 card-1 rounded"><a href="{{route('items.bag')}}" class="label">Bags</a></div>
            <div class="col-md-4 col-sm-12 card-2 rounded"><a href="{{route('items.dress')}}" class="label">Dresses</a></div>
            <div class="col-md-4 col-sm-12 card-3 rounded"><a href="{{route('items.footwear')}}" class="label">Heels</a></div>
        </div>         
    

</div>   
    
@endsection

