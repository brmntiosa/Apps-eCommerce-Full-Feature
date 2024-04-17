<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ICONS -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="{{ asset('global/landingpage') }}/style2.css" />

    <title>Sidebar</title>
</head>

<body>
    {{-- <div class="container"> --}}
    <div class="sidebar">
        {{-- <div class="menu-btn">
            <i class="ph-bold ph-caret-left"></i>
        </div> --}}
        <div class="head">
            <div class="user-img">
                <img src="user.jpg" alt="" />
            </div>
            <div class="user-details">
                <p class="title">Admin Panel</p>
                <p class="name">admin</p>
            </div>
        </div>
        <div class="nav">
            <div class="menu">
                <p class="title">Main</p>
                <ul>
                    <li>
                        <a href="/admin">
                            <i class="icon ph-bold ph-house-simple"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon ph-bold ph-user"></i>
                            <span class="text">Audience</span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="/admin/user">
                                    <span class="text">Users</span>
                                    <span class="line"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="text">Reseller</span>
                                    <span class="linedua"></span> <!-- Curved line design -->
                                </a>

                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i><img class="catalog" src="{{ asset('global/landingpage') }}/images/catalog.png"></i>
                            <span class="text">Catalog</span>
                            <i class="arrow ph-bold ph-caret-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="active">
                                <a href="/admin/product">
                                    <i class="icon ph-bold ph-file-text"></i>
                                    <span class="text">Product</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/categories">
                                    <i class="icon ph-bold ph-list"></i>

                                    <span class="text">Categories</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i>
                                        <img src="{{ asset('global/landingpage') }}/images/delivery-service.png"
                                            alt="">
                                    </i>
                                    <span class="text">Orders</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu">
                <p class="title">Settings</p>
                <ul>
                    <li>
                        <a href="#">
                            <i class="icon ph-bold ph-gear"></i>
                            <span class="text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <p class="title">Account</p>
            <ul>

                <li>
                    <a href="/admin/logout">
                        <i class="icon ph-bold ph-sign-out"></i>
                        <span class="text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- <div class="container">
            <div class="credits">
                <h1>
                    Tuan <br /> Tio Ganteng

                </h1>
            </div>
        </div> --}}
    {{-- </div> --}}

    <!-- Jquery -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"
        integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw=="
        crossorigin="anonymous"></script>
    <script src="{{ asset('global/landingpage') }}/js/product.js"></script>
</body>

</html>
