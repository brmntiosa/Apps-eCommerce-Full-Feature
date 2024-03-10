@extends('site.layouts.main')

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Link untuk Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Link untuk FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Link untuk jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <!-- Link untuk Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Link untuk Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <div class="fs_menu_overlay"></div>

        <!-- Hamburger Menu -->

        <div class="container product_section_container">
            <div class="row">
                <div class="col product_section clearfix">

                    <!-- Breadcrumbs -->
                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="/home">Home</a></li>
                            <li><a href="/kategori"><i class="fa fa-angle-right" aria-hidden="true"></i>Kategori</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
                        </ul>
                    </div>

                    <!-- Sidebar -->

                    <div class="sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <form action="{{ route('site.kategori.searchByName') }}" method="GET" class="input-group rounded">
                                    <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <button type="submit" class="btn btn-outline-secondary rounded-0" id="search-addon">
                                        <i class="bi bi-search"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg>
                                    </button>

                                </form>
                            </div>

                            <!-- Price Range Filtering -->
                            <div class="sidebar_section" style="margin-top: 100px;">
                                <div class="sidebar_title">
                                    <h5>Filter by Price</h5>
                                </div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </p>
                                <div id="slider-range"></div>
                                <div class="filter_button"><span>filter</span></div>
                            </div>

                        </div>
                    </div>

                    <!-- Main Content -->

                    <div class="main_content">

                        <!-- Product Sorting -->

                        <div class="product_sorting_container product_sorting_container_top">
                            <!-- Sorting options... -->
                            <ul class="product_sorting">
                                <li>
                                    <span class="type_sorting_text">Default Sorting</span>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="sorting_type">
                                        <a href="/kategori">
                                            <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "id" }'><span>Default Sorting</span></li>
                                        </a>
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                        <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Show</span>
                                    <span class="num_sorting_text">6</span>
                                    <i class="fa fa-angle-down"></i>
                                    <ul class="sorting_num">
                                        <li class="num_sorting_btn"><span>6</span></li>
                                        <li class="num_sorting_btn"><span>12</span></li>
                                        <li class="num_sorting_btn"><span>24</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <!-- Product Grid -->
                        <div class="product-grid">
                            @forelse($products as $product)
                            <div class="product-item {{ $product->kategori }}">
                                <div class="product product_filter">
                                    <div class="product_image">
                                        @if ($product->productImage->isNotEmpty())
                                        <img src="{{ asset($product->productImage->first()['url']) }}" alt="{{ $product->name }}">
                                        @endif
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_name"><a href="{{ route('site.produk.getIndex', $product->id) }}">{{ $product->name }}</a></h6>
                                        <div class="product_price">${{ $product->price }}</div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <p>Tidak ada produk ditemukan untuk kata kunci pencarian tersebut.</p>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Benefit -->
    <!-- Newsletter -->
    <!-- Your other sections... -->

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
<!-- start here -->
@endsection