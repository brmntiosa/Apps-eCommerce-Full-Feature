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
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    </head>

    <body>


        <div class="box pb-3">
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
                    <div class="about">
                        <a href="#">
                            <img src="{{ asset('global/landingpage') }}/images/info.png" class="img-info" alt="">
                        </a>
                    </div>
                    <div class="breadcrumbs-profile">
                        <div class="second-box">

                            <div class="notify">ON</div>
                        </div>
                        <div class="profile-users">
                            @foreach ($users as $user)
                                <h6>{{ Auth::user()->name }}</h6>
                                <p class="email-teks">{{ Auth::user()->email }}</p>
                            @endforeach
                        </div>
                        <a href="#">
                            <i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container mt-2">
                <div class="row d-flex flex-row  rounded p-2">
                    <div class="col">
                        <h4 class="teks2">Products <span class="count">({{ count($products) }})</span></h4>
                    </div>

                    <div class="col d-flex flex-row justify-between gap-3">
                        <form action="">
                            <div class="search">
                                <span class="material-symbols-outlined">
                                    search
                                </span>
                                <input type="search" name="" id="" class="search-input"
                                    placeholder="Search">
                            </div>
                        </form>
                        <div class="d-flex flex-row align-items-center gap-1 bg-teal rounded p-2 red-custom">
                            <img src="{{ asset('global/landingpage') }}/images/sort.png" class="iconsort" alt="">
                            <span>Sort</span>
                        </div>

                        <a href="{{ route('admin.addProduct') }}" class="btn">
                            <button type="button" class="btn btn-outline-primary " style="text-wrap:nowrap">Add
                                product</button>
                        </a>
                    </div>
                </div>

            </div>
            <div class="inner-line"></div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" data-target="#mainProducts" href="/admin/product">Main
                            Products</a>
                        <a class="nav-item nav-link" href="#" data-target="#detailsProducts"
                            href="/details-products">Details Products</a>
                    </div>
                </div>
            </nav>

            <div class="inner-bottom mt-2"></div>

            <div class="main-top pt-3">



                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <button class="btn-close-white float-end" onclick="this.parentElement.style.display='none'"
                            style="width: 100px; height:30px";>&times;</button>
                    </div>
                @endif
                <section class="attendance">
                    <div class="attendance-list">
                        <div class="attendance-list">

                            {{-- <table class="table table-hover">
                                <!-- Table content here -->

                            </table> --}}
                        </div>
                        <table class="table table-hover" style="border-bottom: none; ">

                            <thead class="table table-light rounded p-2" style="border-bottom: none; ">
                                <tr style="border-right: none;">
                                    <th style="border-bottom: none; ">ID</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>inventory</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td class="product-item">
                                            <div style="display: flex; align-items: center;">
                                                <img src="{{ asset($product->productImage->first()->url) }}"
                                                    alt="{{ $product->name }}" width="80" style="margin-right: 10px;">
                                                <div>
                                                    <h6 style="margin-bottom: 5px;">{{ $product->name }}</h6>
                                                    <div class="box-category"
                                                        style="background-color: #dbdbdb7a; border-radius: 5px; width: 100px">
                                                        <p
                                                            style="max-width: 100px; overflow: hidden;  white-space: nowrap; font-size: 13px;">
                                                            {{ $product->productCategory->name }}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>

                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <div class="container text-wrap">
                                                <span style="color: #979797e1">
                                                    <h6 style="display: inline; margin: 0; color: #000000;">
                                                        {{ $product->stock }}</h6>
                                                    Stock
                                                </span>
                                            </div>


                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="statusDropdown{{ $product->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    {{ $product->status }}
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="statusDropdown{{ $product->id }}">
                                                    <li><a class="dropdown-item" href="#"
                                                            onclick="updateStatus('{{ $product->id }}', 'active')">Active</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#"
                                                            onclick="updateStatus('{{ $product->id }}', 'non-active')">Non-active</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>


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




            <script>
                function updateStatus(productId, status) {
                    // Send AJAX request to update status
                    fetch('/update-status', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Assuming you're using CSRF protection
                            },
                            body: JSON.stringify({
                                productId: productId,
                                status: status
                            })
                        })
                        .then(response => {
                            // Handle response
                            if (response.ok) {
                                // Update UI or show success message
                                // For example, update the status text
                                document.getElementById('statusDropdown' + productId).innerText = status;
                            } else {
                                // Handle error response
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }

                // Function to update status
                function updateStatus(productId, status) {
                    // Send AJAX request to update status
                    fetch('/update-status', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Assuming you're using CSRF protection
                            },
                            body: JSON.stringify({
                                productId: productId,
                                status: status
                            })
                        })
                        .then(response => {
                            // Handle response
                            if (response.ok) {
                                // Update UI or show success message
                                // For example, update the status text
                                document.getElementById('statusDropdown' + productId).innerText = status;
                            } else {
                                // Handle error response
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }


                function editProduct(productId) {
                    window.location.href = '/admin/product/edit/' + productId;
                }
                document.addEventListener("DOMContentLoaded", function() {
                    const navLinks = document.querySelectorAll('.nav-item');
                    navLinks.forEach(link => {
                        link.addEventListener('click', function(event) {
                            event.preventDefault();
                            const targetId = this.getAttribute(
                                'data-target'); // Ambil ID target dari atribut data-target
                            const target = document.querySelector(
                                targetId); // Cari elemen dengan ID yang sesuai
                            document.querySelector('.nav-item.active').classList.remove('active');
                            this.classList.add('active');
                        });
                    });
                });
            </script>

    </body>
@endsection
