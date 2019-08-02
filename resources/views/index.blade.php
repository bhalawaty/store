@extends('layouts.app')

@section('content')


    <section class="content-header">

        <div class="container">
            <div>
                <div style="float: left;width: 50%">
                    <h1>
                        all packages
                    </h1>

                </div>
                <div style="float: right;width: 50%">

                </div>
                <h1>my packages:{{count($package->userPackages)}}</h1>
            </div>
        </div>

    </section>

    <div class="container">


        <div class="row">
            @foreach($packages as $package)
                @if(!$package->modify==1)
                    <div class="col-4">
                        <div class="card " style="margin-bottom:10px;border:1px solid grey ;">
                            <form method="Post" action="/package">
                                @csrf

                                <input type="hidden" name="name" value="{{$package->name}}">
                                <input type="hidden" name="price" value="{{$package->price}}">
                                <input type="hidden" name="discount" value="{{$package->discount}}">
                                <input type="hidden" name="minnumproducts" value="{{$package->minnumproducts}}">
                                <input type="hidden" name="category" value="{{$package->category->id}}">
                                <input type="hidden" name="modify" value="1">
                                @foreach($package->products as $product)
                                    <input type="hidden" name="products[]" value="{{$product->id}}">
                                @endforeach
                                <div class="card-header">{{$package->name}}
                                    <div style="float: right">{{$package->price}}$</div>
                                </div>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>category
                                            name:</strong>{{$package->category->name}}</li>
                                    <li class="list-group-item"><strong>category
                                            discount:</strong>{{$package->discount}}$
                                    </li>

                                    <li class="list-group-item"><strong>all products :</strong></li>
                                    <li class="list-group-item">
                                        <div class="input-group">

                                            <select class="custom-select" id="inputGroupSelect04" multiple>
                                                @foreach($package->products as $product)
                                                    <option disabled class="list-group-item"
                                                            value="{{$product->id}}">{{$product->name}}
                                                        :<strong>{{$product->price}}
                                                            $</strong></option>
                                                @endforeach

                                            </select>

                                        </div>
                                    </li>
                                    <button style="border-radius: 0;" type="button" class="btn btn-primary"><a
                                            href="{{route('select.package',$package->id)}}">select</a>
                                    </button>

                                    <button style="border-radius: 0;" type="submit" class="btn btn-success">SELECT TO
                                        MODIFY YOUR
                                        PACKAGE
                                    </button>
                                </ul>

                            </form>
                        </div>

                    </div>

                @endif
            @endforeach

        </div>
    </div>

@endsection
