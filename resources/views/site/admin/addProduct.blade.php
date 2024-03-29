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
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Edit Product | Attendance Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            integrity="sha384-GLhlTQ8i1I6TurfA6GvaqEF+TcRb7M/dfQFc8e9xHb6ZLl/3gy2IepER95F5jqFw" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <section class="main">

                <section class="attendance">
                    <div class="attendance-list">
                        <h1>Product List</h1>
                        <form id="addProductForm" style="display: none;" action="{{ route('site.admin.addProduct') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="productName">Product Name:</label>
                                <input type="text" name="name" id="productName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="productCategory">Product Category:</label>
                                <select name="product_category_id" id="productCategory" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock:</label>
                                <input type="text" name="stock" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control" required>
                                    <option value="active">Active</option>
                                    <option value="non-active">Non-Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="images">Product Images:</label>
                                <input type="file" name="images[]" id="images" class="form-control" multiple
                                    accept="image/*" required>
                                <p>Maximal 4 Foto</p>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Product</button>
                            <a href="/admin/product">

                                <button type="button" class="btn btn-secondary">Cancel</button>
                            </a>
                        </form>
                    </div>
                </section>
            </section>
        </div>


        <script>
            // function addProduct() {
            //     var productName = $('#productName').val();
            //     var description = $('#description').val();
            //     var price = $('#price').val();
            //     var stock = $('#stock').val();
            //     var status = $('#status').val();

            //     // Kirim data ke server menggunakan AJAX
            //     $.ajax({
            //         type: 'POST',
            //         url: "{{ route('site.admin.addProduct') }}",
            //         data: {
            //             '_token': '{{ csrf_token() }}',
            //             'name': productName,
            //             'description': description,
            //             'price': price,
            //             'stock': stock,
            //             'status': status
            //         },
            //         success: function(data) {
            //             alert('Product added successfully!');
            //             location.reload();
            //         },
            //         error: function(error) {
            //             alert('Failed to add product. Please try again.');
            //         }
            //     });
            // }

            // function cancelAddProduct() {
            //     $('#addProductForm').hide();
            // }

            function showAddProductForm() {
                $('#addProductForm').show();
            }

            // Panggil fungsi showAddProductForm() saat halaman dimuat
            $(document).ready(function() {
                showAddProductForm();
            });

            document.querySelectorAll('.menu-toggle').forEach(item => {
                item.addEventListener('click', event => {
                    const submenu = item.nextElementSibling;
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
                });
            });
        </script>
    </body>

    </html>
@endsection
