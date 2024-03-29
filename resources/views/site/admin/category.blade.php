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
        <style>
            .close-button {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
                padding: 5px 10px;
                font-size: 16px;
                cursor: pointer;
                position: relative;

            }

            .close-button::after {
                content: "\00D7";
                position: absolute;
                right: 10px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success align-content-between">
                    {{ session('success') }}
                    <button class="close-button">&times;</button>
                </div>
            @endif

            </nav>

            <section class="main">

                <section class="attendance">
                    <h2>categories</h2>

                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Jumlah Produk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr class="{{ $index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $categoryProductsCount[$category->id] ?? 0 }}</td>
                                    <td>
                                        <form action="{{ route('site.admin.category.delete', $category->id) }}" method="post"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{ route('site.admin.addCategory') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Nama Kategori:</label>
                            <input type="text" name="category_name" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                    </form>
                </section>

            </section>
        </div>
        <script>
            function editUser(userId) {
                window.location.href = "{{ url('admin/edit') }}/" + userId;
            }
            document.querySelectorAll('.menu-toggle').forEach(item => {
                item.addEventListener('click', event => {
                    const submenu = item.nextElementSibling;
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
                });
            });
            document.querySelectorAll('.close-button').forEach(button => {
                button.addEventListener('click', function() {
                    this.parentElement.style.display = 'none';
                });
            });
        </script>
    </body>

    </html>
@endsection
