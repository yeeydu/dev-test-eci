@extends('layout.main')
@section('content')

<div class="container p-5">
    <h1 class="text-center m-2 p-2">Products</h1>
    <div class="row mt-4 mb-4">
        <div class="col">
            <h5>Get product price</h5>
            <form method="GET" action="{{ route('get-product-price') }}">
                <div class="input-group">
                    <input type="search" name="sku" class="form-control rounded" placeholder="product sku" aria-label="Search" aria-describedby="search-addon">
                    <input type="search" name="account_id" class="form-control rounded" placeholder="account id" aria-label="Search" aria-describedby="search-addon">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="col text-end">
            <a href="{{ route('import') }}" >
                <button class="btn btn-primary" id="btn-add" >import CSV</button>
            </a>
        </div>
    </div>
    
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th>Product SKU</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <div id="productInfo">
                {{-- Display product information here --}}
                {{ $name ?? '' }}
                {{ $dbPrices ?? '' }}
                {{ $prices ?? '' }}
                {{-- @foreach ($dbPrices as $price)
                    <tr>
                        <td>{{ $price->product_id }}</td>
                        <td>{{ $price->value }}</td>
                    </tr>
                @endforeach --}}
 
            </div>
        </tbody>
    </table>
</div>

@endsection