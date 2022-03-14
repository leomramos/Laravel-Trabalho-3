@extends('layouts.app')
@section('page', 'Create')
@section('content')
<createForm>
  @if(isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
      @foreach($errors->all() as $error)
        <p> {{$error}}
      @endforeach
    </div>
  @endif
  {!! Form::open(['route' => 'products.store', 'class' => 'form', 'enctype'=>'multipart/form-data']) !!}
    <h2>
      Register Product
    </h2>
    <div class="form-group">
      {!! Form::text('name', null, ['class' => 'form', 'placeholder' => 'Name', 'required' => 'required', 'minLength' => 3, 'maxLength' => 50]) !!}
    </div>
    <div class="form-group">
      {!! Form::number('year', null, ['class' => 'form', 'placeholder' => 'Year', 'required' => 'required', 'min' => 1960, 'max' => 2023]) !!}
    </div>
    <div class="form-group">
      {!! Form::textarea('description', null, ['class' => 'form', 'placeholder' => 'Description', 'maxLength' => 255]) !!}
    </div>
    <div class="form-group">
      {!! Form::number('price', null, ['class' => 'form', 'placeholder' => 'Price', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
      {!! Form::file('image', ['class' => 'form', 'accept' => 'image/*']) !!}
    </div>
    {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
</createForm>

<style>
  createForm {
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 50px;
  }
  form {
    background-color: #ffffff;
    padding: 30px;
  }
  input, textarea {
    padding: 5px;
    margin-top: 15px;
  }
  input[type="file"] {
    padding: 0;
  }
  textarea {
    min-height: 100px;
    max-height: 200px;
  }
</style>
@endsection