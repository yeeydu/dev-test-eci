@extends('layout.main')
@section('content')

<div class="container p-5">
    <h1 class="text-center m-2 p-2">Products</h1>
    <div class="row mt-4 mb-4 text-center">
        <div class="col">
            <a href="{{ url('getProductPrice') }}" >
                <button class="btn btn-primary" id="btn-add" >Product</button>
            </a>
        </div>
        <div class="col ">
            <a href="{{ route('import') }}" >
                <button class="btn btn-primary" id="btn-add" >Import CSV</button>
            </a>
        </div>
    </div>

</div>
@endsection