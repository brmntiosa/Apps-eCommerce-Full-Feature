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
<div class="fs_menu_overlay"></div>

<!-- Hamburger Menu -->

<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
            <li class="menu_item has-children">
                <a href="#">
                    usd
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#">cad</a></li>
                    <li><a href="#">aud</a></li>
                    <li><a href="#">eur</a></li>
                    <li><a href="#">gbp</a></li>
                </ul>
            </li>
            <li class="menu_item has-children">
                <a href="#">
                    English
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#">French</a></li>
                    <li><a href="#">Italian</a></li>
                    <li><a href="#">German</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </li>
            <li class="menu_item has-children">
                <a href="#">
                    My Account
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                    <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="/home">home</a></li>
            <li class="menu_item"><a href="#">shop</a></li>
            <li class="menu_item"><a href="#">promotion</a></li>
            <li class="menu_item"><a href="#">pages</a></li>
            <li class="menu_item"><a href="#">blog</a></li>
            <li class="menu_item"><a href="#">contact</a></li>
        </ul>
    </div>
</div>

<div class="container single_product_container">
    <div class="row">
        <div class="col">
            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
                    <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="single_product_pics">
                <div class="row">
                    <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                        <div class="single_product_thumbnails">
                            <ul>
                                @foreach ($products->productImage as $index => $productImage)
                                <li class="{{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset($productImage->url) }}" alt="{{ $products->name }}" data-image="{{ asset($productImage->url) }}" onclick="changeBackgroundImage(this, '{{ $productImage->url }}')">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 image_col order-lg-2 order-1">
                        <div class="single_product_image">
                            <!-- Display the selected image -->
                            <div id="selected_image" class="single_product_image_background" style="background-image:url({{ asset($products->productImage[0]->url) }})"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{dd($products)}} --}}
        <script>
            function initThumbnail() {
                if ($(".single_product_thumbnails ul li").length) {
                    var thumbs = $(".single_product_thumbnails ul li");
                    var singleImage = $("#selected_image");
                    thumbs.each(function() {
                        var item = $(this);
                        item.on("click", function() {
                            thumbs.removeClass("active");
                            item.addClass("active");
                            var img = item.find("img").data("image");
                            singleImage.css("background-image", "url(" + img + ")");
                        });
                    });
                }
            }

            function changeBackgroundImage(element, imgUrl) {
                console.log("Image clicked. URL: ", imgUrl);
                $("#selected_image").css("background-image", "url(" + imgUrl + ")");
            }
            initThumbnail();
        </script>

        <div class="col-lg-5">
            <div class="product_details">
                <div class="product_details_title">
                    <h2>{{$products->name}}</h2>
                    <h6>Category: {{ $products->productCategory->name }}</h6>
                    <p>{{$products->description}}</p>

                </div>
                <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                    <span class="ti-truck"></span><span>free delivery</span>
                </div>
                <div class="original_price">${{ $products->price }}</div>
                <div class="product_price">${{ $products->price }}</div>
                <ul class="star_rating">
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                </ul>
                <div class="product_color">
                    <span>stok: {{$products->stock}}</span>
                </div>
                <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                    <span>Quantity:</span>
                    <div class="quantity_selector">
                        <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        <span id="quantity_value">1</span>
                        <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="tabs_section_container">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="tabs_container">
                    <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                        <li class="tab active" data-active-tab="tab_1"><span>Description</span></li>
                        <li class="tab" data-active-tab="tab_2"><span>Additional Information</span></li>
                        <li class="tab" data-active-tab="tab_3"><span>Reviews (2)</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">

                <!-- Tab Description -->

                <div id="tab_1" class="tab_container active">
                    <div class="row">
                        <div class="col-lg-5 desc_col">
                            <div class="tab_title">
                                <h4>Description</h4>
                            </div>
                            <div class="tab_text_block">
                                <h2>{{$products->name}}</h2>
                                <p>{{$products->description}}</p>
                            </div>
                            <div class="tab_image">
                                @if($products->productImage->count() > 0)
                                <img src="{{ asset($products->productImage->get(0)['url']) }}" alt="{{ $products->name }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-2 desc_col">
                            @if($products->productImage->count() > 1)
                            <div class="tab_image">
                                <img src="{{ asset($products->productImage->get(1)['url']) }}" alt="{{ $products->name }}">
                            </div>
                            @endif
                            @if($products->productImage->count() > 2)
                            <div class="tab_image desc_last">
                                <img src="{{ asset($products->productImage->get(2)['url']) }}" alt="{{ $products->name }}">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Tab Additional Info -->
                <div id="tab_2" class="tab_container">
                    <div class="row">
                        <div class="col additional_info_col">
                            <div class="tab_title additional_info_title">
                                <h4>Additional Information</h4>
                            </div>
                            <p>COLOR:<span>Gold, Red</span></p>
                            <p>SIZE:<span>L,M,XL</span></p>
                        </div>
                    </div>
                </div>

                <!-- Tab Reviews -->
                <div id="tab_3" class="tab_container">
                    <div class="row">
                        <div class="col-lg-6 reviews_col">
                            <div class="tab_title reviews_title">
                                <h4>Reviews (2)</h4>
                            </div>
                            <div class="user_review_container d-flex flex-column flex-sm-row">
                                <div class="user">
                                    <div class="user_pic"></div>
                                    <div class="user_rating">
                                        <ul class="star_rating">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="review_date">27 Aug 2016</div>
                                    <div class="user_name">Brandon William</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <!-- User Review -->
                            <div class="user_review_container d-flex flex-column flex-sm-row">
                                <div class="user">
                                    <div class="user_pic"></div>
                                    <div class="user_rating">
                                        <ul class="star_rating">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="review_date">27 Aug 2016</div>
                                    <div class="user_name">Brandon William</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
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
