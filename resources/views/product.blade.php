@extends('layouts.app')
@section('content')
{{$product}}
{!! app('App\Http\Controllers\ProductController')->listProducts(false) !!}
@endsection