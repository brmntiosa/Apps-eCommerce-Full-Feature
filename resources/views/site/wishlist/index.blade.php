@extends('site.layouts.main')

@section('title')
<!-- Title here -->
@endsection

@section('extra-css')
<!-- Additional CSS here -->



@endsection

@section('extra-styles')
<!-- Additional styles here -->
@endsection

@section('content')
<!-- Main content here -->
<div class="main_slider" style="background-image: url({{ asset('global/landingpage/images/slider_1.jpg') }})">
    <!-- Slider content here -->
    @if(session('success'))
    <div class="row">
        <div class="col text-center">
            <div class="alert alert-success" id="welcomeMessage">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif

</div>

<div class="banner">
    <!-- Banner content here -->
</div>

<div class="new_arrivals">
    <!-- New Arrivals content here -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Wishlist</h2>
                {{-- <div class="wishlist_products">
                    @foreach($wishlists as $wishlist)
                        <div class="wishlist_product">
                            <img src="{{ asset($wishlist->product->productImage->first()['url']) }}" alt="{{ $wishlist->product->name }}">
                <div class="product_info">
                    <h6>{{ $wishlist->product->name }}</h6>
                    <div class="product_price">${{ $wishlist->product->price }}</div>
                </div>
            </div>
            @endforeach
        </div> --}}

        <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
            @foreach($wishlists as $wishlist)
            <div class="product-item text-right">
                <div class="product product_filter">
                    <div class="product_image">
                        <img src="{{ asset($wishlist->product->productImage->first()['url']) }}" alt="{{ $wishlist->product->name }}">
                    </div>
                    <div class="product_info">


                        <div class="product_info">
                            <h6>{{ $wishlist->product->name }}</h6>
                            <div class="product_price">${{ $wishlist->product->price }}</div>
                        </div>
                    </div>
                    <form action="{{ route('site.wishlist.removeFromWishlist', $wishlist->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus Wishlist<span class="bi bi-trash"></span></button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('extra-content')
<!-- Additional content here -->
@endsection

@section('extra-js')
<!-- Additional JavaScript here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<script>
    $(document).ready(function() {
        var $grid = $('.wishlist_products').isotope({
            itemSelector: '.wishlist_product',
            layoutMode: 'fitRows'
        });
    });

    setTimeout(function() {
        document.getElementById('welcomeMessage').style.display = 'none';
    }, 5000);
</script>
@endsection

@section('extra-script')
<!-- Additional script here -->
@endsection