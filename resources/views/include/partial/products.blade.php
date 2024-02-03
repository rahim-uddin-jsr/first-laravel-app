@if ($loop->even)
<div class="col">

    <div class="card">
        <!-- You can replace the image link with your actual image URL -->
        <img src="https://placekitten.com/300/200" class="card-img-top" alt="Product Image">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>

            <p class="card-text">Color: {{ $product['color'] }}</p>
            <p class="card-text">Price: {{ $product['price'] }}</p>
            <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@else
<div class="col">
    <div class="card ">
        <!-- You can replace the image link with your actual image URL -->
        <img src="https://placekitten.com/300/200" class="card-img-top" alt="Product Image">
        <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>

            <p class="card-text">Color: {{ $product['color'] }}</p>
            <p class="card-text">Price: {{ $product['price'] }}</p>
            <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@endif
