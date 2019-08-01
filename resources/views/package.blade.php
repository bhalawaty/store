@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card " style="margin-bottom:10px; border: 1px solid black;">
                    <div class="card-header">{{$package->name}}
                        <div style="float: right">{{$package->price}}$</div>
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>category name:</strong>{{$package->category->name}}</li>
                        <li class="list-group-item"><strong>category discount:</strong>{{$package->discount}}$</li>

                        <li class="list-group-item"><strong>select products :</strong></li>
                        <li class="list-group-item">
                            <div class="input-group">


                        @foreach($package->products as $product)
                            <li class="list-group-item" value="{{$product->id}}">{{$product->name}}
                                :<strong>{{$product->price}}
                                    $</strong>
                                <button class="btn btn-outline-danger" type="button"><a
                                        href="/delete/product/package/{{$package->id}}/{{$product->id}}">remove</a>
                                </button>
                            </li>

                        @endforeach

                        <div class="input-group-append">


                        </div>


                        </li>

                        <li class="list-group-item"><strong>choose products from
                                :{{$package->category->name}}</strong></li>
                        <li class="list-group-item">
                            <div class="input-group">

                        @foreach($package->category->products as $product)
                            <li class="list-group-item" value="{{$product->id}}">{{$product->name}}
                                :<strong>{{$product->price}}
                                    $</strong>
                                <button class="btn btn-outline-danger" type="button"><a
                                        href="/add/product/package/{{$package->id}}/{{$product->id}}">add</a></button>
                            </li>
                        @endforeach
                        <div class="input-group-append">
                        </div>


                        </li>
                    </ul>
                    <button class="btn btn-outline-success" type="button"><a href="{{route('all_package')}}">submit all
                            changes</a></button>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('footer')
@endsection