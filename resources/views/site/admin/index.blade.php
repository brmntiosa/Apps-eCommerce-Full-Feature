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
        <meta charset="UTF-8" />
        <title>Attendance Dashboard | By Code Info</title>
        <link rel="stylesheet" href="style.css" />
        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            integrity="sha384-GLhlTQ8i1I6TurfA6GvaqEF+TcRb7M/dfQFc8e9xHb6ZLl/3gy2IepER95F5jqFw" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    </head>

    <body>
        <div class="container">


            <section class="main">
                <div class="main-top">
                    <h1>Users</h1>
                    <i class="fas fa-user-cog"></i>
                </div>

                <section class="attendance">
                    <div class="attendance-list">
                        <h1>Selamat Datang di Halaman Dasboard Admin</h1>

                        @if (Auth::check())
                            <div id="notification" class="notification">
                                <span class="close-btn" onclick="closeNotification()">&times;</span>
                                <h2 class="notification-title">Selamat Datang Tuan Admin {{ Auth::user()->name }}!</h2>
                                <p class="notification-content">Catatan: Semua fitur admin di sini telah diaktifkan, mulai
                                    dari controll terhadap users, Product, menambahkan product dan fitur lainya seperti
                                    category</p>
                            </div>

                            <script>
                                function closeNotification() {
                                    document.getElementById('notification').style.display = 'none';
                                }
                                document.addEventListener('DOMContentLoaded', function() {
                                    document.getElementById('notification').style.display = 'block';
                                });
                            </script>
                        @endif

                    </div>
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
@endsection
