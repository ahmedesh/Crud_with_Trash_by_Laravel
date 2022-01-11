
@extends('layouts.app');

@section('content')

    <h1> trashed Product </h1>

    @if($message = Session::get('success'))
        <div class="alert alert-primary container" role="alert" style="width: 30%">
            {{$message}}
        </div>
    @endif

    <a href="{{route('products.index')}}" type="button" class="btn btn-primary"> Home </a>
    {{--     products دي اللي موجوده فال route بتاع web.php--}}

    <table class="table my-2">
        <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Details</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->detail}}</td>
                <td>
                    <a href="{{route('product.back.from.trash' , $item->id)}}" class="btn btn-info"> BachTrash </a>
                    <a href="{{route('product.delete.from.database' , $item->id)}}" class="btn btn-danger"
                       onclick="return confirm('Are you sure to deleted this Product Forever?!')"> Delete </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--    {{ $products->links() }} = {!! $products->links() !!}--}}
    {{--    {{ $products->links() }}   --}}{{-- عشان ينفذلي ال paginate(4) --}}
    {!! $products->links() !!}  {{-- دا عشان ينفذلي ال paginate(4) وينقلي اي ستايل له معاه --}}
@endsection
