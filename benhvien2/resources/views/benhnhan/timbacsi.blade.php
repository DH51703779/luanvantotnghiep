@extends('welcome')
@section('datlich')

    <!-- Hero End -->
    <div class="department_area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-100">
                        <span>Chuyên khoa</span>
                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="depart_ment_tab mb-30">
                        <!-- Tabs Buttons -->
                        <ul class="nav" id="myTab" role="tablist">
                            @foreach($khoa as $key=>$value )
                            <li class="nav-item">
                                <a class="nav-link active"  href="{{URL::to('/dsbacsi/'.$value->MaKhoa)}}" >
                                    <i > <img width="50" height="50" src="{{asset('public/frontend/img/khoa/'.$value->Hinh)}}"></i>
                                    <h4>{{($value->TenKhoa)}}</h4>
                                    
                                </a>
                            </li>
                            @endforeach
                           
                            
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--? About Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <span>Đặt lịch khám</span>
                            <h2>Cám ơn bạn đã tin tưởng bệnh viện của chúng tôi</h2>
                        </div>
                        <p>Nhằm đáp ứng nhu cầu chăm sóc sức khỏe , cũng như giảm tối thiểu thời gian chờ đợi của bệnh nhân , bạn vui lòng đăng ký lịch khám bênh trước </p>
                        <div class="about-btn1 mb-30">
                            <a href="" class="btn about-btn">Khám theo ngày <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn2">Khám theo bác sĩ <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn2">Khám tại nhà <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="{{('public/img/gallery/about2.png')}}" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="{{('public/img/gallery/about1.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? All startups Start -->
    <div class="all-starups-area testimonial-area fix">
        <!-- left Contents -->
        <div class="starups">
            <!--? Testimonial Start -->
            <div class="h1-testimonial-active">
                <!-- Single Testimonial -->
                <div class="single-testimonial text-center">
                    <!-- Testimonial Content -->
                    <div class="testimonial-caption ">
                        <div class="testimonial-top-cap">
                            <img src="assets/img/gallery/testimonial.png" alt="">
                            <p>“I am at an age where I just want to be fit and healthy our bodies are our responsibility! So start caring for your body and it will care for you. Eat clean it will care for yout hard.”</p>
                        </div>
                        <!-- founder -->
                        <div class="testimonial-founder d-flex align-items-center justify-content-center">
                            <div class="founder-img">
                                <img src="assets/img/gallery/Homepage_testi.png" alt="">
                            </div>
                            <div class="founder-text">
                                <span>Margaret Lawson</span>
                                <p>Chif Photographer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
        </div>
        <!--Right Contents  -->
        <div class="starups-img"></div>
    </div>
    <!--All startups End -->
    <!--? Gallery Area Start -->
   
    <!-- Gallery Area End -->
     <!--? Contact form Start -->
    
    <!-- Contact form End -->
    <!--? gallery Products Start -->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                             <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Products End -->
     <!--? Team Start -->
  
    @endsection