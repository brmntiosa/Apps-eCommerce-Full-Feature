@extends('site.layouts.main')

@section('title')
<!-- Tambahkan judul sesuai kebutuhan -->
Wishlist Page
@endsection

@section('extra-css')
<!-- Tambahkan CSS ekstra sesuai kebutuhan -->
<style>
    /* CSS ekstra di sini */
</style>
@endsection

@section('extra-styles')
<!-- Tambahkan gaya ekstra sesuai kebutuhan -->
<link rel="stylesheet" href="path/to/extra/style.css">
@endsection

@section('content')
<!-- Mulai konten utama -->
<div>
    @foreach ($products as $product)
    <div>
        ID Produk: {{ $product->id }}

        @if ($product->user)
        ID Pengguna: {{ $product->user->id }}
        @else
        ID Pengguna: Tidak ada pengguna terkait
        @endif

        <!-- Tambahkan atribut lainnya sesuai kebutuhan -->
    </div>
    @endforeach
</div>
<!-- Akhir konten utama -->
@endsection

@section('extra-content')
<!-- Tambahkan konten ekstra sesuai kebutuhan -->
<div>
    Konten ekstra di sini
</div>
@endsection

@section('extra-js')
<!-- Tambahkan JavaScript ekstra sesuai kebutuhan -->
<script src="path/to/extra/script.js"></script>
@endsection

@section('extra-script')
<!-- Tambahkan skrip ekstra sesuai kebutuhan -->
<script>
    // Skrip ekstra di sini
</script>
@endsection