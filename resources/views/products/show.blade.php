@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p><strong>Price: </strong>${{ $product->price }}</p>
    <p><strong>Quantity: </strong>{{ $product->quantity }}</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
