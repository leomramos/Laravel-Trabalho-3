
<div id="products-list">
  @foreach($products as $product)
  <div class="card">
    <img class="card-img-top" src='{{ asset("products-images/$product->image") }}' alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
      <p class="card-text">R$ {{$product->price}}</p>
      <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">See more</a>
    </div>
  </div>
  @endforeach
</div>
  
{!! $products->links() !!}

<style>
  nav .hidden div:last-child{
    display: none;
  }
  nav span.relative{
    color: #333333;
  }
</style>