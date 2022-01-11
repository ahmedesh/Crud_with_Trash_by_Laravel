
@extends('layouts.app');

@section('content')

    <h1> index Product </h1>

    @if($message = Session::get('success'))
        <div class="alert alert-primary container" role="alert" style="width: 30%">
            {{$message}}
        </div>
    @endif

    <a href="{{route('products.create')}}" type="button" class="btn btn-success"> Create Post </a>
    <a href="{{route('product.trash')}}" type="button" class="btn btn-primary"> Trash </a>
{{--     products دي اللي موجوده فال route بتاع web.php--}}
{{-- بقولو روح فال route هتلاقي اسم product.trash --}}
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
                <a href="{{route('products.show' , $item->id)}}" class="btn btn-info">   View</a>  {{-- products دا هو ال Route--}}
                <a href="{{route('products.edit' , $item->id)}}" class="btn btn-primary">Edit</a>  {{-- products دا هو ال Route--}}
                <a href="{{route('soft.delete'   , $item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to Soft deleted this Product ?!')">
                    Soft delete</a>  {{-- products دا هو ال Route--}}

{{--                <form method="POST" action="{{route('products.destroy' , $item->id)}}" style="display: inline">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to deleted this Product ?!')">--}}
{{--                        delete</button>--}}
{{--                </form>--}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{ $products->links() }} = {!! $products->links() !!}--}}
{{--    {{ $products->links() }}   --}}{{-- عشان ينفذلي ال paginate(4) --}}
    {!! $products->links() !!}  {{-- دا عشان ينفذلي ال paginate(4) وينقلي اي ستايل له معاه --}}
@endsection
