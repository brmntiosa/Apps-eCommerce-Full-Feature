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
    @if(session('suuccess'))
    <div class="row">
        <div class="col text-left">
            <div class="alert alert-success" id="welcomeMessage">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif
    @auth
    <div class="row" id="welcomeMessage">
        <div class="col text-left">
            <div id="notification" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #FFE4C4; color: #333; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                <span onclick="closeNotification()" style="position: absolute; top: 10px; right: 10px; cursor: pointer; font-size: 60px;">&times;</span>
                <h2 style="font-family: 'Arial', sans-serif; margin: 0;">Selamat Datang, {{ Auth::user()->name }}!</h2>
                <p style="font-size: 16px; margin-top: 10px;">Catatan: Semua fitur Sorting di sini telah diaktifkan, mulai dari penyesuaian berdasarkan kategori, harga, hingga pengurutan berdasarkan abjad.</p>
                <!-- Tambahkan elemen desain lainnya sesuai keinginan -->
            </div>

            <script>
                // Fungsi untuk menutup pemberitahuan
                function closeNotification() {
                    document.getElementById('notification').style.display = 'none';
                }
                // Tampilkan pemberitahuan setelah halaman dimuat
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('notification').style.display = 'block';
                });
            </script>
        </div>
    </div>


    @endauth
</div>

<div class="banner">
    <!-- Banner content here -->
</div>

<div class="new_arrivals">
    <!-- New Arrivals content here -->
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".T Shirt">women's</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".aksesoris">accessories</li>
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Pria">men's</li>
                    </ul>
                </div>
            </div>
        </div>




        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    @foreach($products as $product)
                        <div class="product-item {{ $product->product_category_id }} text-right">
                            <div class="product product_filter">
                                <div class="product_image">
                                    @if ($product->productImage->isNotEmpty())
                                        <img src="{{ asset($product->productImage->first()['url']) }}" alt="{{ $product->name }}">
                                    @endif
                                </div>
                                <div class="favorite"></div>
                                <div class="product_info">
                                    <h6 class="product_name"><a href="{{ route('site.produk.getIndex', $product->id) }}">{{ $product->name }}</a></h6>
                                    <div class="product_price">${{ $product->price }}</div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
                        </div>


                    @endforeach
                </div>



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
        var $grid = $('.product-grid').isotope({
            itemSelector: '.product-item',
            layoutMode: 'fitRows'
        });

        $('.filters-button-group li').on('click', function() {
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({
                filter: filterValue
            });

            $('.filters-button-group li').removeClass('active');
            $(this).addClass('active');
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
