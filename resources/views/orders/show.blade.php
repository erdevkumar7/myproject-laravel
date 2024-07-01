@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <p><strong>Customer Name: </strong>{{ $order->customer_name }}</p>
    <p><strong>Customer Email: </strong>{{ $order->customer_email }}</p>
    <p><strong>Total Amount: </strong>${{ $order->total_amount }}</p>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
