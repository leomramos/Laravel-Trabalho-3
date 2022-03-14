@extends('layouts.app')
@section('page', 'Products')
@section('content')
{!! app('App\Http\Controllers\ProductController')->listProducts(true) !!}
@endsection