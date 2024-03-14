<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Attendance Dashboard | By Code Info</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8i1I6TurfA6GvaqEF+TcRb7M/dfQFc8e9xHb6ZLl/3gy2IepER95F5jqFw" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        .edit-button {
            background-color: #3498db;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .edit-button:hover {
            background-color: #2980b9;
        }

        .delete-button {
            background-color: #e74c3c;
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .styled-button {
            background-color: #3498db;
            color: #fff;
            padding: 6px 8px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .styled-button:hover {
            background-color: #2980b9;
        }


        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        .styled-table th {
            background-color: #34AF6D;
        }

        .styled-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .even-row {
            background-color: #f9f9f9;
        }

        .odd-row {
            background-color: #ffffff;
        }



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

        nav {
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
        }

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

            <section class="attendance">
                <h2>categories</h2>

                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Jumlah Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $index => $category)
                        <tr class="{{ $index % 2 == 0 ? 'even-row' : 'odd-row' }}">
                            <td>{{ $category->name }}</td>
                            <td>{{ $categoryProductsCount[$category->id] ?? 0 }}</td>
                            <td>
                                <form action="{{ route('site.admin.category.delete', $category->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="delete-button" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{ route('site.admin.addCategory') }}" method="post">
                    @csrf
                    <label for="category_name">Nama Kategori:</label>
                    <input type="text" name="category_name" required>
                    <button type="submit" class="styled-button">Tambah Kategori</button>
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
    </script>
</body>

</html>
