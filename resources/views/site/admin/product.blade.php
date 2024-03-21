<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8i1I6TurfA6GvaqEF+TcRb7M/dfQFc8e9xHb6ZLl/3gy2IepER95F5jqFw" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");


        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: rgb(226, 226, 226);
        }

        /* nav {
            position: sticky;
            top: 0;
            bottom: 0;
            height: 100vh;
            left: 0;
            width: 90px;
            background: #fff;
            overflow: hidden;
            transition: 1s;
        }

        nav:hover {
            width: 280px;
            transition: 1s;
        } */

        .logo {
            text-align: center;
            display: flex;
            margin: 10px 0 0 10px;
            padding-bottom: 3rem;
        }

        .logo img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
        }

        .logo span {
            font-weight: bold;
            padding-left: 15px;
            font-size: 18px;
            text-transform: uppercase;
        }

        a {
            position: relative;
            width: 280px;
            font-size: 14px;
            color: rgb(85, 83, 83);
            display: table;
            padding: 10px;
        }

        nav .fas {
            position: relative;
            width: 70px;
            height: 40px;
            top: 20px;
            font-size: 20px;
            text-align: center;
        }

        .nav-item {
            position: relative;
            top: 12px;
            margin-left: 10px;
        }

        a:hover {
            background: #eee;
        }

        a:hover i {
            color: #34AF6D;
            transition: 0.5s;
        }

        .logout {
            position: absolute;
            bottom: 0;
        }

        .container {
            display: flex;
        }

        /* Main Section */
        .main {
            position: relative;
            padding: 20px;
            width: 100%;
        }

        .main-top {
            display: flex;
            width: 100%;
        }

        .main-top i {
            position: absolute;
            right: 0;
            margin: 10px 30px;
            color: rgb(110, 109, 109);
            cursor: pointer;
        }

        .main .users {
            display: flex;
            width: 100%;
        }

        .users .card {
            width: 25%;
            margin: 10px;
            background: #fff;
            text-align: center;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        .users .card img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }

        .users .card h4 {
            text-transform: uppercase;
        }

        .users .card p {
            font-size: 12px;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .users table {
            margin: auto;
        }

        .users .per span {
            padding: 5px;
            border-radius: 10px;
            background: rgb(223, 223, 223);
        }

        .users td {
            font-size: 14px;
            padding-right: 15px;
        }

        .users .card button {
            width: 100%;
            margin-top: 8px;
            padding: 7px;
            cursor: pointer;
            border-radius: 10px;
            background: transparent;
            border: 1px solid #4AD489;
        }

        .users .card button:hover {
            background: #4AD489;
            color: #fff;
            transition: 0.5s;
        }

        /* Attendance List section */
        .attendance {
            margin-top: 20px;
            text-transform: capitalize;
        }

        .attendance-list {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }

        .table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 15px;
            min-width: 100%;
            overflow: hidden;
            border-radius: 5px 5px 0 0;
        }

        table thead tr {
            color: #fff;
            background: #34AF6D;
            text-align: left;
            font-weight: bold;
        }

        .table th,
        .table td {
            padding: 12px 15px;
        }

        .table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        .table tbody tr:nth-of-type(odd) {
            background: #f3f3f3;
        }

        .table tbody tr.active {
            font-weight: bold;
            color: #4AD489;
        }

        .table tbody tr:last-of-type {
            border-bottom: 2px solid #4AD489;
        }

        .table button {
            padding: 6px 20px;
            border-radius: 10px;
            cursor: pointer;
            background: transparent;
            border: 1px solid #4AD489;
        }

        .table button:hover {
            background: #4AD489;
            color: #fff;
            transition: 0.5rem;
        }

        .submenu {
            display: none;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .submenu a {
            padding: 10px;
            display: block;
            text-decoration: none;
            color: rgb(85, 83, 83);
            font-size: 14px;
        }

        .submenu a:hover {
            background: #eee;
        }

        .alert {
            position: relative;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert button.close {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
        }

        .alert button.close:hover {
            color: #155724;
        }

        .btnn {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btnn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="#" class="logo">
                        <img src="{{asset('global/landingpage/images')}}/adminlogo.png" alt="Logo">
                        <span class="nav-item">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="/admin">
                        <i class="fas fa-menorah"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/user" class="menu-toggle">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Users</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/product">
                        <i class="fas fa-shopping-bag"></i>
                        <span class="nav-item">Products</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/categories">
                        <i class="fas fa-bars"></i>
                        <span class="nav-item">categories</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/logout" class="logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item">Log out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <section class="main">
            <div class="main-top">
                <h1>Products</h1>
                <i class="fas fa-shopping-bag"></i>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button class="close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            @endif
            <section class="attendance">
                <div class="attendance-list">
                    <h1>Product List</h1>
                    <a href="{{ route('site.admin.addProduct') }}" class="btnn">Add Product</a>
                    <h2>Total Products: {{ count($products) }}</h2>
                    <table class="table">
                        <thead>
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
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->productCategory->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->status }}</td>
                                <td>
                                    <button class="btn btn-edit" onclick="editProduct({{ $product->id }})">Edit</button>
                                    <form action="{{ route('site.admin.deleteProduct', $product->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Benar ingin menghapus?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </div>

    <script>
        function editProduct(productId) {
            window.location.href = "{{ url('admin/product/edit') }}/" + productId;
        }
        document.querySelectorAll('.menu-toggle').forEach(item => {
            item.addEventListener('click', event => {
                const submenu = item.nextElementSibling;
                submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>

</html>
