
@extends('layouts.app')

@section('content')

    <a href="{{route('products.index')}}" type="submit" class="btn btn-primary"> Home </a>

    <div class="card">
        <h5 class="card-header">Post Info</h5>
        <div class="card-body">
            <h5 class="card-title"> <b>Name:- </b> {{$product->name}} </h5>
            <h5 class="card-title"> <b>Price:- </b> {{$product->price}} </h5>   {{-- محطتش هنا foreach عشان انا كدا كدا بستدعيه بال id بتاعه --}}
            <h5 class="card-title"> <b>Details:- </b> {{$product->detail}} </h5>
        </div>
    </div>
    </div>

@endsection
