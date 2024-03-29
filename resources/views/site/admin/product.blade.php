@extends('site.admin.layouts.main')


@section('title')
@endsection

@section('extra-css')
    <!-- start here -->
@endsection

@section('extra-styles')
    <!-- start here -->
@endsection

@section('content')
    <!-- start here -->

    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Pacifico&family=Sofia+Sans:wght@100&display=swap"
            rel="stylesheet">
        <style>
            .breadcrumbs ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .breadcrumbs ul li {
                display: inline;
                font-size: 14px;
            }

            .breadcrumbs ul li a {
                text-decoration: none;
                color: #5555554c;
                transition: color 0.3s;
            }

            .breadcrumbs ul li a:hover {
                color: #007bff;
            }

            .breadcrumbs ul li i {
                margin: 0 5px;
                color: #89898961;
            }

            .breadcrumbs ul li.active a {
                color: #000000b4;
                text-decoration: underline;
            }

            .box-main {
                position: relative;
                width: 100%;
                border-radius: 10px;
                height: 70px;
                padding: 10px;
                background-color: #dcdcdcc0
            }

            .teks {
                position: absolute;
                top: 20px;

            }

            .breadcrumbs ul li a {
                text-decoration: none;
                color: #9e9e9e8b;
                transition: color 0.3s;
                font-size: 18px;
                /* Change font size to 50px */
                font-family: "DM Sans", sans-serif;
                /* Change font family to Elegant Font */
            }
        </style>
    </head>

    <body>


        <div class="box">
            <div class="box-main">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumbs d-flex flex-row align-items-center">
                            <ul class="teks">
                                <li><a href="/home">Dashboard ></a></li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
                                <li class="active"><a href="#">Product</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="about">

                </div>
            </div>
            <section class="main">
                <div class="main-top">
                    <h1>Products</h1>
                    <i class="fas fa-shopping-bag"></i>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button class="close" onclick="this.parentElement.style.display='none'">&times;</button>
                    </div>
                @endif
                <section class="attendance">
                    <div class="attendance-list">
                        <div class="attendance-list">
                            <div class="row">
                                <div class="col">
                                    <br>
                                    <h6>Total Products: {{ count($products) }}</h6>
                                </div>
                                <div class="col text-end">

                                    <a href="{{ route('admin.addProduct') }}" class="btn">
                                        <button type="button" class="btn btn-outline-primary">Add
                                            product</button>
                                    </a>
                                </div>
                            </div>

                            {{-- <table class="table table-hover">
                                <!-- Table content here -->

                            </table> --}}
                        </div>
                        <table class="table table-hover">

                            <thead class="table table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->productCategory->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>
                                            <button class="btn btn-edit"
                                                onclick="editProduct({{ $product->id }})">Edit</button>
                                            <form action="{{ route('site.admin.deleteProduct', $product->id) }}"
                                                method="post" style="display: inline-block;">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-delete"
                                                    onclick="return confirm('Apakah Benar ingin menghapus?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $products->withquerystring()->links('pagination::bootstrap-5') }}
                    </div>
                </section>
            </section>
        </div>
    </body>
@endsection

@section('extra-content')
    <!-- start here -->
@endsection

@section('extra-js')
    <!-- start here -->
@endsection

@section('extra-script')
@endsection
