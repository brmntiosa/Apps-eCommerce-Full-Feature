<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/bootstrap4/bootstrap.min.css">

  <!-- Font Awesome CSS -->
  <link href="{{asset('global/landingpage')}}/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/animate.css">

  <!-- Main Styles CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/responsive.css">

  <!-- Themify Icons CSS -->
  <link rel="stylesheet" href="{{asset('global/landingpage')}}/plugins/themify-icons/themify-icons.css">

  <!-- jQuery UI CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">

  <!-- Single Styles CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/single_styles.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/single_responsive.css">

  {{-- Kategori Styles CSS --}}
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/categories_styles.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/categories_responsive.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/bootstrap4/bootstrap.min.css">
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/main_styles.css">

  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/responsive.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/bootstrap4/bootstrap.min.css">
  <link href="{{asset('global/landingpage')}}/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" href="{{asset('global/landingpage')}}/plugins/themify-icons/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/single_styles.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/single_responsive.css">

  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/bootstrap4/bootstrap.min.css">
  <link href="{{asset('global/landingpage')}}/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/categories_styles.css">
  <link rel="stylesheet" type="text/css" href="{{asset('global/landingpage')}}/styles/categories_responsive.css">
</head>

<body>
  @include('site.layouts.header')
  @yield('content')
  @include('site.layouts.footer')

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Bootstrap JS (Optional, for certain components) -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="{{asset('global/landingpage')}}/js/jquery-3.2.1.min.js"></script>
  <script src="{{asset('global/landingpage')}}/styles/bootstrap4/popper.js"></script>
  <script src="{{asset('global/landingpage')}}/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/Isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/easing/easing.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
  <script src="{{asset('global/landingpage')}}/js/categories_custom.js"></script>
  <script src="{{asset('global/landingpage')}}/js/jquery-3.2.1.min.js"></script>
  <script src="{{asset('global/landingpage')}}/styles/bootstrap4/popper.js"></script>
  <script src="{{asset('global/landingpage')}}/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/Isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/easing/easing.js"></script>
  <script src="{{asset('global/landingpage')}}/js/custom.js"></script>
  <script src="{{asset('global/landingpage')}}/js/jquery-3.2.1.min.js"></script>
  <script src="{{asset('global/landingpage')}}/styles/bootstrap4/popper.js"></script>
  <script src="{{asset('global/landingpage')}}/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/Isotope/isotope.pkgd.min.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/easing/easing.js"></script>
  <script src="{{asset('global/landingpage')}}/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
  <script src="{{asset('global/landingpage')}}/js/single_custom.js"></script>
</body>

</html>