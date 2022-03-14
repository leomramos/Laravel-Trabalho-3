@extends('layouts.app')
@section('page', 'Home')
@section('content')
<head>
  <link href="css/home.css" rel="stylesheet">
</head>
<home>
  <div id="banner">
    <div class="black-opacity"></div>
    <div class="center-info">
      <h2>
        Find your new car now!
      </h2>
      <p>
        Here you can find the car of your dreams.
      </p>
      <a href="#product-list"><span>Take a look</span></a>
    </div>
  </div>
  <section id="product-list">
    <h1>
      Are you looking for a new car?
    </h1>
    <p>
      We've got you!
    </p>
    {!! app('App\Http\Controllers\ProductController')->listProducts(false) !!}
  </section>
</home>
@endsection