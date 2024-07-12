<div class="container">
    <h2>Search Results for "{{ $query }}"</h2>
    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">${{ $product->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>