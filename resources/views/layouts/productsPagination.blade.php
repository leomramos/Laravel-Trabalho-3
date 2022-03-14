
<div id="products-list">
  @if($products->adminMode)
  <table class="table table-striped" style="background-color: #ffffff; vertical-align: middle;">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Year</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col" colspan=2>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
      <tr>
        <th scope="row">{{$product->id}}</th>
        <td><img class="img-thumbnail" style="max-width: 100px;" src='{{ asset("products-images/$product->image") }}' alt="product-image"></td>
        <td>{{$product->name}}</td>
        <td>{{$product->year}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->price}}</td>
        <td>
          <a href="{{route('products.edit', $product->id)}}" class="btn btn-warning text-light">Edit</a>
        </td>
        <td>
          {!! Form::open(['route' => ['products.destroy', $product->id], "method" => "DELETE"]) !!}
          {!! Form::submit("Delete", ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
  @else
    @foreach($products as $product)
      <div class="card">
        <img class="card-img-top" src='{{ asset("products-images/$product->image") }}' alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}} | {{$product->year}}</h5>
          <p class="card-text">R$ {{$product->price}}</p>
          <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">See more</a>
        </div>
      </div>
    @endforeach
  @endif
</div>
  
{!! $products->links() !!}

<style>
  nav .hidden div:last-child{
    display: none;
  }
  nav span.relative{
    color: #333333;
  }
  td a:first-child {
    margin-right: 10px;
  }
</style>