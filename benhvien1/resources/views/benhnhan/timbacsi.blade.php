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

  
    @endsection