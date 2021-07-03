
@extends('welcome')
@section('content')
 <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <span></span>
                                <h1 class="cd-headline letters scale">Điều hạnh phúc của chúng tôi là được thấy bạn 
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">khỏe mạnh</b>
                                        <b>vui vẻ</b>
                                        <b>hạnh phúc</b>
                                    </strong>
                                 
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Sức khỏe tốt và trí tuệ minh mẫn là hai điều hạnh phúc nhất của cuộc đời.</p>

                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
           
        </div>
    </div>
    <!-- slider Area End-->
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
                            <a href="{{URL::to('/dskhoa/1')}}" class="btn about-btn">Khám theo ngày <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="{{URL::to('/dskhoa/2')}}" class="btn about-btn2">Khám theo bác sĩ <i class="ti-arrow-right"></i></a>
                        </div>
                        <!-- <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn2">Khám tại nhà <i class="ti-arrow-right"></i></a>
                        </div> -->
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
    <!--? department_area_start  -->
   
    <!-- depertment area end  -->
     <!--? Gallery Area Start -->
 
    <!-- gallery Products End -->
    <!--? Blog start -->
  
    <!-- Blog End -->
    @endsection