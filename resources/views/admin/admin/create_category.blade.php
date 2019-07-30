@extends('admin.layouts.app')

@section('title')

@endsection

@section('content')

    <section class="content-header">

        <h1>
            add category

        </h1>


    </section>
    <div class="container">


        <section class="content">

            <form method="Post" action="{{route('post.create.category.admin')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">category name </label>
                    <input type="text" name="name" class="form-control" required/>
                    <small id="name" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">select products </label> <br>

                    <select name="products[]" class="custom-select custom-select-lg mb-3" multiple>
                        <option selected>Open this select menu</option>
                        @foreach($products as $product)
                            <option  value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </section>
    </div>

@endsection
