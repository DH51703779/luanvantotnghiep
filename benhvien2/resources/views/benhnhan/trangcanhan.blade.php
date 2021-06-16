@extends('welcome')
@section('datlich')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




    <script type="text/javascript">
        function thongtin() {
            const x = document.querySelector('#form')
            x.innerHTML = `  <h3>Thông tin tài khoản</h3>
                <br>
                <br>
                    
                 @foreach($taikhoan as $key=>$tk)
                 <form id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                    <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp; <input type="text" name="name" value="{{($tk->Ten)}}" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                    <i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp; <input type="text" value="{{($tk->Sodienthoai)}}" name="email" >
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                    <i class="fas fa-map-marker-alt"></i></i>&nbsp;&nbsp;&nbsp; <input type="text" value="{{($tk->Diachi)}}" name="email" >
                                    </div>
                                </div>
                              
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                    <i class="fas fa-venus-mars"></i></i>&nbsp;&nbsp;&nbsp; <input type="text"  name="email" >
                                    </div>
                                </div>
                             
                                 
                                
                            </div>
                        </form>
                        @endforeach  `;
        };

        function benhnhan() {
            const x = document.querySelector('#form')
            x.innerHTML = `  <h3>Hồ sơ bệnh nhân</h3>
                <br>
                <br>
                <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Mã bệnh nhân</th>
                    <th>Tên bệnh nhân</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th></th>
                 
                    </tr>
                    </thead>
                    @foreach($benhnhan as $key=> $bn)
                    <tr>
                        <td data-label="Mã bệnh nhân :" >{{($bn->MaBN)}}</td>
                        <td data-label="Tên bệnh nhân :">{{($bn->TenBN)}}</td>
                        <td data-label="Giới tính :"><?php if ($bn->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>
                        <td data-label="Ngày sinh :">{{($bn->Ngaysinh)}}</td>
                        <td data-label="Số điện thoại:" >{{($bn->DienThoai)}}</td>
                        <td ><a >Xem thêm </a></td>
                    </tr>
                    @endforeach
                </table>  `;

        };

        function lichkham() {
            const x = document.querySelector('#form')
            x.innerHTML = `      <h3>Lịch khám bệnh</h3>
                <br>
                <br>
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Thời gian</th>
                            <th>Tên bệnh nhân</th>
                            <th>Phòng </th>
                            <th>Khoa</th>
                            <th>Thanh toán</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lichkham as $key=> $lk)
                        <tr>
                        <td data-label="Thời gian :">{{($lk->Buoi)}}-{{($lk->NgayTruc)}}</td>
                            <td data-label="Số thứ tự :" >{{($lk->STT)}}</td>
                            <td data-label="Tên bệnh nhân :">{{($lk->TenBN)}}</td>
                            <td data-label="Mã phòng  :" >{{($lk->MaPhong)}}</td>
                            <td data-label="Tên khoa :">{{($lk->TenKhoa)}}</td>
                            <td data-label="Tình trạng :"><?php if ($lk->Tinhtrang == 0) {
                                                                echo " Trực tiếp";
                                                            } else {
                                                                echo " Online ";
                                                            } ?></td>
                            <td><a href="#">Xem thêm </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <span> {{ $lichkham->render() }}</span> `;

        };
    

    </script>

</head>

<hr>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a onclick="thongtin()" class="btnx form-group">
                    Thông tin tài khoản &nbsp;
                </a>
                <a onclick="benhnhan()" class="btnx form-group">
                    Hồ sơ bệnh nhân &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                <a onclick="lichkham()" class="btnx form-group">
                    Lịch khám bệnh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>

            </div>
            <div id="form" class="col-8">
                <h3>Lịch khám bệnh</h3>
                <br>
                <br>
                <table  class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Số thứ t</th>
                            <th>Tên bệnh nhân</th>
                            <th>Phòng </th>
                            <th>Khoa</th>
                            <th>Thanh toán</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lichkham as $key=> $lk)
                        <tr>
                            <td data-label="Thời gian :">{{($lk->Buoi)}}-{{($lk->NgayTruc)}}</td>
                            <td data-label="Số thứ tự :">{{($lk->STT)}}</td>
                            <td data-label="Tên bệnh nhân :">{{($lk->TenBN)}}</td>
                            <td data-label="Mã phòng  :">{{($lk->MaPhong)}}</td>
                            <td data-label="Tên khoa :">{{($lk->TenKhoa)}}</td>
                            <?php if ($lk->Tinhtrang == 0) {
                                echo '  <td class="error" data-label="Tình trạng :">Trực tiếp</td>';
                            } else {
                                echo '<td class="success" data-label="Tình trạng :"> Online</td> ';
                            } ?>
                            <td><a > Xem thêm </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <span> {{ $lichkham->render() }}</span>
            </div>
        </div>

    </div>
</section>

@endsection
<style>
    input {
        font-size: 20px !important;

    }

    @media screen and (max-width: 600px) {


        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;

        }

        table td::before {

            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
        }
    }

    /* destop */
    table td {
        text-align: center;
    }

    .error {
        color: red;
    }

    .success {
        color: green;
    }

    h3 {
        text-align: center !important;
        font-weight: bolder !important;
    }

    .btnx {
        border: 1px solid black;

        -moz-user-select: none;
        text-transform: uppercase;
        color: black;
        cursor: pointer;
        display: inline-table;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 1px;
        line-height: 0;
        margin-bottom: 0;
        padding: 27px 44px;
        border-radius: 5px;

        margin: 10px;
        cursor: pointer;
        transition: color 0.4s linear;
        position: relative;
        z-index: 1;

        overflow: hidden;
        margin: 0;
        line-height: 40px;
        font-weight: bold;
        text-align: center;
    }

    .btnx::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: white;
        z-index: 1;
        border-radius: 5px;
        transition: transform 0.5s;
        transition-timing-function: ease;
        transform-origin: 0 0;
        transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
        transform: scaleX(0);
        border-radius: 0;


    }

    .btnx:hover::before {
        transform: scaleX(1);
        color: #fff !important;
        z-index: -1;
    }
</style>