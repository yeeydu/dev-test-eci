@extends('layout.main')
@section('content')

<div class="container mb-5 p-5 ">
    <h1 class="text-center m-2 p-2">Import data</h1>
    <a href="{{ url('/') }}" >
        <button class="btn btn-primary " id="btn-add" >Back</button>
    </a>
    <div class="text-center m-4 pt-4">

        <form method="POST" action="{{ route('importcsv') }}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv">
            <button type="submit">Import CSV</button>
        </form>
    </div>
</div>


@endsection