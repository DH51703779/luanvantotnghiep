@extends('bacsi.bacsi_layout')
@section('bacsi_content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('public/backend/css/lichtruc.css')}}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{asset('public/frontend/js/jquery.magnifier.js')}}"></script>


<div class="card">
    <div class="card-body">
        <div id="form" class="row">
            <div class="col-4">

                <div  class="single-team mb-30">

                    <div class="team-caption">
                        <h2 class="contact-title">Lịch hẹn </h2>

                    </div>
                    <hr>
                </div>
            </div>
            <br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Thanh toán </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsach as $key=>$value)
                    <tr>
                        <td id="hello" data-label="Mã bệnh nhân :">{{($value->STT)}}</td>
                        <td data-label="Tên bệnh nhân :">{{($value->TenBN)}}</td>
                        <td data-label="Ngày sinh :">{{($value->Ngaysinh)}}</td>
                        <td data-label="Giới tính :"><?php if ($value->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>
                      
                            @if($value->Thanhtoan == 0)
                            <td class="error" data-label="Thanh toán"> Chưa thanh toán </td>
                            @else
                            <td class="success" data-label="Thanh toán"> Đã thanh toán </td>
                            @endif

                        
                        <td><a href="{{URL::to('/bac-si/chi-tiet-benh-nhan/'.$value->MaLK)}}" class="hihi" >Chi tiết</a></td>
                    </tr>
                    @endforeach


                </tbody>

            </table>


        </div>
       
    </div>
</div>
</div>

@endsection