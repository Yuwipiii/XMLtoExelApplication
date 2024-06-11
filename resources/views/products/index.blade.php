@extends('adminlte::page')
@section('content')
    <div class="container">


        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Old Price</th>
                <th scope="col">Currency</th>
                <th scope="col">Category</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Sub Sub Category</th>
                <th scope="col">Available</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($products as $product )
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->product_id}}</td>
                    <td><a href="{{$product->url}}">{{$product->name}}</a></td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->old_price}}</td>
                    <td>{{$product->currency_id}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->sub_category}}</td>
                    <td>{{$product->sub_sub_category}}</td>
                    <td>{{$product->available?"Available":"Unavailable" }}</td>

                </tr>
            @endforeach

            </tbody>
        </table>

        {{ $products->links() }}
    </div>
@endsection
