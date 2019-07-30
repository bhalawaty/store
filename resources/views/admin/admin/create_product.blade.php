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

            <form method="Post" action="{{route('post.create.products.admin')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">product name </label>
                    <textarea type="text" name="name" class="form-control" required></textarea>
                    <small id="name" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">product price </label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </section>
    </div>

@endsection
