@extends('layouts.app')

@section('content')



    <div class="row container ">
        <div class="col-6">
            <h1 style="float: left;">
                your packages:
            </h1>
        </div>

    </div>




    <div class="container">


        <div class="row">
            @foreach($packages as $package)

                <div class="col-4">
                    <div class="card " style="margin-bottom:10px;border:1px solid grey ;">

                        <div class="card-header">{{$package->name}}:

                            <div style="float: right">price : {{ $package->discount($package)}}$</div>

                        </div>

                        <ul class="list-group list-group-flush">
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
                            @if( ! $package->modify==1)
                            <button class="btn btn-danger" type="button">
                                <a href="{{route('destroyYourPackage.package',$package->id)}}">
                                    delete your order
                                </a>
                            </button>
                                @else
                            <button class="btn btn-danger" type="button">
                                <a href="{{route('destroyModifiedPackage.package',$package->id)}}">
                                    delete your order
                                </a>
                            </button>
                                @endif

                        </ul>


                    </div>

                </div>


            @endforeach

        </div>
    </div>

@endsection
