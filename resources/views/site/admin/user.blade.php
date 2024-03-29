@extends('site.admin.layouts.main')

@section('title')
@endsection

@section('extra-css')
    <!-- start here -->
@endsection

@section('extra-styles')
    <!-- start here -->
    <style>
        .form-hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
    <!-- start here -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Attendance Dashboard | By Code Info</title>
        <link rel="stylesheet" href="style.css" />
        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            integrity="sha384-GLhlTQ8i1I6TurfA6GvaqEF+TcRb7M/dfQFc8e9xHb6ZLl/3gy2IepER95F5jqFw" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <style>
            .form-hidden {
                display: none;
            }

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

            .dropdown-form {
                background-color: #f8f9fa;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-top: 10px;
            }

            .dropdown-form label {
                font-weight: bold;
            }

            .dropdown-form input,
            .dropdown-form select {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                margin-bottom: 10px;
                border: 1px solid #ced4da;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .dropdown-form button {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .dropdown-form button:hover {
                background-color: #0056b3;
            }

            .button-admin {
                padding-top: 32px;
            }
        </style>
    </head>

    <body>

        <div class="box">
            @if (session('success'))
                <div class="alert alert-success align-content-between">
                    {{ session('success') }}
                    <button class="close-button">&times;</button>
                </div>
            @endif
            <section class="main">

                <section class="attendance">
                    <div class="attendance-list">
                        <h1>Registered Admin</h1>
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary"
                                                onclick="editUser({{ $user->id }})">Edit</button>
                                            <form action="{{ route('site.admin.deleteUser', $user->id) }}" method="post"
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
                    </div>
                </section>


                <h5>Add Administrator</h5>
                <a href="#">

                    <i class="fas fa-plus" id="add-admin-icon"></i>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-form">
                        <form action="{{ route('site.admin.addUser') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3" class="form-hidden">
                                        <label for="name" class="form-label">Name:</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role:</label>
                                        <select name="role" class="form-select" required>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="button-admin">
                                        <button type="submit" class="btn btn-success">Add admin</button>
                                    </div>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
        </div>
        </section>

        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('add-admin-icon').addEventListener('click', function() {
                    var dropdownMenu = document.querySelector('.dropdown-menu');
                    dropdownMenu.classList.toggle('show');
                });
            });

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
