<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicon -->
        <link href="{{asset('frontend/img/fav.ico')}}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

        <style>
            .display-1 {
                font-size: {{$font_one->font_size}};
                font-weight: {{$font_one->font_weight}};
                line-height: {{$font_one->line_height}};
            }

            @media(min-width: 1200px) {
                .display-1 {
                    font-size: {{$font_one->min_width_font_size}}
                }
            }

            .display-2 {
                font-size: calc(1.575rem + 3.9vw);
                font-weight: 600;
                line-height: 1.2
            }

            @media(min-width: 1200px) {
                .display-2 {
                    font-size: 4.5rem
                }
            }

            .display-3 {
                font-size: {{$font_two->font_size}};
                font-weight: {{$font_two->font_weight}};
                line-height: {{$font_two->line_height}};
            }

            @media(min-width: 1200px) {
                .display-3 {
                    font-size: {{$font_two->min_width_font_size}}
                }
            }

            .display-4 {
                font-size: calc(1.475rem + 2.7vw);
                font-weight: 600;
                line-height: 1.2
            }

            @media(min-width: 1200px) {
                .display-4 {
                    font-size: {{$font_two->min_width_font_size}}
                }
            }

            .display-5 {
                font-size: calc(1.425rem + 2.1vw);
                font-weight: 600;
                line-height: 1.2
            }

            @media(min-width: 1200px) {
                .display-5 {
                    font-size: 3rem
                }
            }

            .display-6 {
                font-size: calc(1.375rem + 1.5vw);
                font-weight: 600;
                line-height: 1.2
            }

            @media(min-width: 1200px) {
                .display-6 {
                    font-size: 2.5rem
                }
            }

            .testimonial-inner p{
                color: #FFF !important;
            }
        </style>

    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- topbar Start -->
        @include('layouts.includes.frontend.header')
        <!-- Sidebar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">

            @include('layouts.includes.frontend.navbar')

            @yield('banner')

        </div>
        <!-- Navbar & Hero End -->

        @yield('content')


        <!-- Sidebar Start -->
        @include('layouts.includes.frontend.footer')
        <!-- Sidebar End -->


            
        <a href="{{$whatsapp_text->description}}" class="float bounce" target="_blank">
            <i class="fab fa-whatsapp my-float"></i>
        </a>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top text-white"><i class="fa fa-arrow-up"></i></a>   


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
        <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>


        <!-- Template Javascript -->
        <script src="{{asset('frontend/js/main.js')}}"></script>

    </body>

</html>