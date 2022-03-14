@extends('layouts.app')
@section('page', 'Products')
@section('content')
<section id="product-list">
  <h1 style="margin-bottom: 30px;">
    All Products (Admin Mode)
  </h1>
  <a class="cta-button" href="{{route('products.create')}}"><span>Register new</span></a>
  {!! app('App\Http\Controllers\ProductController')->listProducts(true) !!}
</section>
@endsection