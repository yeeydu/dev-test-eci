@extends('layout.main')
@section('content')

<div class="container p-5">
    <h1 class="text-center m-2 p-2">Get Products</h1>
    <a href="{{ url('/') }}" >
        <button class="btn btn-primary " id="btn-add" >Back</button>
    </a>
    <div class="row mt-4 mb-4">
            <h5>Get product price</h5>
            <form method="GET" action="{{ route('get-product-price') }}">
                <div class="input-group">
                    <input type="search" name="sku" class="form-control rounded" placeholder="product sku" aria-label="Search" aria-describedby="search-addon">
                    <input type="search" name="account_id" class="form-control rounded" placeholder="account id" aria-label="Search" aria-describedby="search-addon">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </form>
    </div>
    <div id="productInfo">              
            {{-- {{ (isset($dbPrices) ? $dbPrices : "Nothing to show") }}   --}}
        @if ($finalPrice !== null)
            <p>Product ID: {{ $finalPrice->product_id }}</p>
            <p>Account ID: {{ $finalPrice->account_id }}</p>
            <p>Value: {{ $finalPrice->value }}</p>
        @else
            <p>No data found.</p>
        @endif
    
    </div>
</div>
@endsection