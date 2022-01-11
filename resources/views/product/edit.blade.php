

@extends('layouts/app');

@section('content')

    <div class="card my-5 ">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>

    <a href="{{route('products.index')}}" type="submit" class="btn btn-primary"> Home </a>

    <form method="POST" action="{{route('products.update' , $product->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="product Name" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="product Price" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Details</label>
            <textarea required  name="detail" class="form-control" rows="3"> {!! $product->detail !!}  </textarea>
            {{-- !!دا عشان ينقلي اي ستايل له معاه --}}
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection

