<!doctype html>

<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Bệnh viện </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/img/logo/logo.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}"> -->
	<link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.css')}}">

    <link rel="stylesheet" href="{{asset('public/frontend/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">


    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">


</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('public/frontend/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.html"><img src="{{asset('public/frontend/img/logo/logo.png')}}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{URL::to('/')}}">Trang chủ </a></li>

                                            <li><a href="{{URL::to('/datlich')}}">Đặt lịch</a></li>
                                            <?php $taikhoan = Session::get('ten');
                                        $id = Session::get('id-user');
                                if($taikhoan){?>

                                            <li>   <a class=""><i class="fas fa-user"></i> 
                                                    <?php echo $taikhoan; ?></a>
                                                <ul class="submenu">
                                                    <li><a href="{{URL::to('/trangcanhan')}}">Quản Lý</a></li>
                                                    <li> <a href="{{URL::to('/dangxuat')}}" class="">Đăng xuất</a></li>

                                                </ul>
                                            </li>

                                            <?php
                                    }else{ 
                                    ?>

                                            <li> <a href="{{URL::to('/dangnhap')}}" >Đăng
                                                    nhập</a> </li>
                                            <?php
                                }
                                ?>


                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">

                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        @yield('content')
        @yield('datlich')
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/img/gallery/footer_bg.jpg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15671.846569277608!2d106.6409201!3d10.8905197!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1623338143080!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <div class="footer-pera">
                                        <p class="info1">Lorem igpsum doldfor sit amet, adipiscing elit, sed do eiusmod
                                            tempor cergelit rgh. </p>
                                        <p class="info1">Lorem ipsum dolor sit amet, adipiscing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-number mb-50">
                                    <h4><span>+564 </span>7885 3222</h4>
                                    <p>youremail@gmail.com</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part" novalidate="true">
                                            <input type="email" name="EMAIL" id="newsletter-form-email"
                                                placeholder=" Email Address " class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Your email address'">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm">
                                                    Send
                                                </button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{asset('public/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->

    <script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('public/frontend/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/animated.headline.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.magnific-popup.js')}}"></script>

    <!-- Date Picker -->
    <script src="{{asset('public/frontend/js/gijgo.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/moment.min.js')}}"></script>
    <!-- Nice-select, sticky -->
    <!-- <script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.sticky.js')}}"></script>
     -->
    <!-- counter , waypoint -->
    <!-- <script src="{{asset('public/frontend/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/waypoints.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script> -->
    <!-- contact js -->
    <script src="{{asset('public/frontend/js/contact.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.form.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/mail-script.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('public/frontend/js/plugins.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>


    <!-- lịch -->

</body>

</html>