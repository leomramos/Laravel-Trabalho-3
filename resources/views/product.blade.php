@extends('layouts.app')
@section('page', "Product $product->id")
@section('content')
<div style="background-color: #ffffff; padding: 30px; border-radius: 15px;" class="container">
  <div class="row">
    <div class="col-md-6">
      <img style="max-width: 100%;" src='{{ asset("products-images/$product->image") }}' alt="product-image" />
    </div>
    <div class="col-md-6">
      <h1>{{$product->name}}</h1>
      <h4>{{$product->year}}</h4>
      <p>{{$product->description}}</p>
      <span>R$ {{$product->price}}</span>
    </div>
  </div>
</div>
<section id="product-list">
  <h1>
    Not this one?
  </h1>
  <p>
    Check out all the options
  </p>
  {!! app('App\Http\Controllers\ProductController')->listProducts(false) !!}
</section>
@endsection