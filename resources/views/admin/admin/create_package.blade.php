@extends('admin.layouts.app')

@section('title')

@endsection

@section('content')

    <section class="content-header">

        <h1>
            add product

        </h1>


    </section>
    <div class="container">


        <section class="content">

            <form method="Post" action="{{route('post.create.package.admin')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">package name </label>
                    <input type="text" name="name" class="form-control" required/>
                    <small id="name" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">package price </label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">package discount </label>
                    <input type="number" name="discount" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">package minimum number of products </label>
                    <input type="number" name="minnumproducts" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">select category </label> <br>

                    <select name="category" class="custom-select custom-select-lg mb-3 ">
                        <option selected>Open this select menu</option>
                        @foreach($categories as $category)
                            <option  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

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
