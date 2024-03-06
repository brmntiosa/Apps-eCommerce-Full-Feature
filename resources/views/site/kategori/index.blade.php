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
<body>

    <div class="super_container">

        <!-- Header -->


        <div class="fs_menu_overlay"></div>

        <!-- Hamburger Menu -->



        <div class="container product_section_container">
            <div class="row">
                <div class="col product_section clearfix">

                    <!-- Breadcrumbs -->

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
                                <h5>Product Category</h5>
                            </div>
                            <ul class="sidebar_categories">
                                <li><a href="#">Men</a></li>
                                <li class="active"><a href="#"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Women</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">New Arrivals</a></li>
                                <li><a href="#">Collection</a></li>
                                <li><a href="#">Shop</a></li>
                            </ul>
                        </div>

                        <!-- Price Range Filtering -->
                        <div class="sidebar_section">
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

                    <!-- Main Content -->

                    <div class="main_content">

                        <!-- Products -->

                        <div class="products_iso">
                            <div class="row">
                                <div class="col">

                                    <!-- Product Sorting -->

                                    <div class="product_sorting_container product_sorting_container_top">
                                        <ul class="product_sorting">
                                            <li>
                                                <span class="type_sorting_text">Default Sorting</span>
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="sorting_type">
                                                    <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
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
                                        @foreach($produks as $produk)
                                            <div class="product-item {{ $produk->kategori }}">
                                                <div class="product product_filter">
                                                    <div class="product_image">
                                                        @if(!empty($produk->gambar1))
                                                            <img src="{{ asset($produk->gambar1) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar2))
                                                            <img src="{{ asset($produk->gambar2) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar3))
                                                            <img src="{{ asset($produk->gambar3) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar4))
                                                            <img src="{{ asset($produk->gambar4) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar5))
                                                            <img src="{{ asset($produk->gambar5) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar6))
                                                            <img src="{{ asset($produk->gambar6) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar7))
                                                            <img src="{{ asset($produk->gambar7) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar8))
                                                            <img src="{{ asset($produk->gambar8) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar9))
                                                            <img src="{{ asset($produk->gambar9) }}" alt="{{ $produk->nama }}">
                                                        @elseif(!empty($produk->gambar10))
                                                            <img src="{{ asset($produk->gambar10) }}" alt="{{ $produk->nama }}">
                                                        @endif
                                                    </div>
                                                    <div class="favorite"></div>
                                                    <div class="product_info">
                                                        <h6 class="product_name"><a href="{{ route('site.produk.getIndex', $produk->id) }}">{{ $produk->nama }}</a></h6>
                                                        <div class="product_price">${{ $produk->harga }}<span>$590.00</span></div>
                                                    </div>
                                                </div>
                                                <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                                            </div>
                                        @endforeach
                                    </div>


                                    <!-- Product Sorting -->

                                    <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                        <ul class="product_sorting">
                                            <li>
                                                <span>Show:</span>
                                                <span class="num_sorting_text">04</span>
                                                <i class="fa fa-angle-down"></i>
                                                <ul class="sorting_num">
                                                    <li class="num_sorting_btn"><span>01</span></li>
                                                    <li class="num_sorting_btn"><span>02</span></li>
                                                    <li class="num_sorting_btn"><span>03</span></li>
                                                    <li class="num_sorting_btn"><span>04</span></li>
                                                </ul>
                                            </li>
                                        </ul>



                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Benefit -->

        <div class="benefit">
            <div class="container">
                <div class="row benefit_row">
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>free shipping</h6>
                                <p>Suffered Alteration in Some Form</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>cach on delivery</h6>
                                <p>The Internet Tend To Repeat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>45 days return</h6>
                                <p>Making it Look Like Readable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 benefit_col">
                        <div class="benefit_item d-flex flex-row align-items-center">
                            <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                            <div class="benefit_content">
                                <h6>opening all week</h6>
                                <p>8AM - 09PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                            <h4>Newsletter</h4>
                            <p>Subscribe to our newsletter and get 20% off your first purchase</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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
