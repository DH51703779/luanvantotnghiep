@extends('welcome')
@section('datlich')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




    <script type="text/javascript">
      

        function lichkham() {
            const x = document.querySelector('#form')
            x.innerHTML = `     `;

        };
    </script>


</head>

<hr>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="thongtin()" class="btnx form-group">
                     &nbsp;&nbsp;&nbsp;
                </a>
                <i class="fas fa-tags"></i> <a href="{{URL::to('/trangcanhan')}}" class="btnx form-group">
                    Hồ sơ bệnh nhân &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
                <i class="fas fa-tags"></i> <a onclick="lichkham()" class="btnx form-group">
                    Lịch khám bệnh &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
<section class="contact-section">

    <div class="container">
    
        <div class="row">
            <div class="col-4">
              

            </div>
            <div id="form" class="col-8">
            <h3>Lịch khám bệnh</h3>
                <br>
                <br>
                <table  class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Số thứ tự</th>
                            <th>Tên bệnh nhân</th>
                            <th>Phòng </th>
                            <th>Khoa</th>
                            <th>Thanh toán</th>
                            <th>Trạng thái</th>
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
                            <?php if ($lk->Thanhtoan == 0) {
                                echo '  <td class="error" data-label="Thanh toán :">Trực tiếp</td>';
                            } else {
                                echo '<td class="success" data-label="Thanh toán :"> Online</td> ';
                            } ?>
                             <?php if ($lk->Trangthai == 0) {
                                    echo '  <td class="error" data-label="Trạng thái :">Chưa khám </td>';
                                } else if ($lk->Trangthai == 2) {
                                    echo '<td class="success" data-label="Trạng thái :">Đã khám </td> ';
                                }
                             else if ($lk->Trangthai == 1){
                                echo '<td class="error" data-label="Trạng thái :">Vắng  </td> ';
                            } ?>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table><?php if ($int > 4) { ?>
                
                <span> {{ $lichkham->render() }}</span>
                    
                    <?php } ?>

            </div>
          
        </div>

    </div>
</section>

@endsection
<style>
    .hihi {
        color: red;
    }

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
        
        -moz-user-select: none;
        text-transform: uppercase;
        color: black;
        cursor: pointer;
        display: inline-table;
      
        font-weight: 500;
       

      
        transition: color 0.4s linear;
        position: relative;
        z-index: 1;

        overflow: hidden;
        margin: 0;
        line-height: 40px;
      
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

    
    a:hover{
        color: black !important;
    }
</style>