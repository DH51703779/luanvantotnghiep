@extends('welcome')
@section('datlich')
<?php

$id = Session::get('id-user'); 
$sodienthoai = Session::get('sodienthoai');
$ten = Session::get('ten');
?>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    function doi() {
        const x = document.querySelector('#form')
        x.innerHTML = `  <div class="col-12">
                          <h3 class="">Thông tin người đặt</h3>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input readonly value="<?php echo $ten; ?>" class="form-control valid" name="tennguoidat" type="text"
                                    placeholder="Nhập tên người đặt">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input readonly  value="<?php echo $sodienthoai; ?>" class="form-control valid" name="sdtnguoidat" type="text"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>`;
    };

    function doi1() {
        const x = document.querySelector('#form')
        x.innerHTML = ``;
    }

    function hi() {
        //kiem tra trinh duyet co ho tro File API
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            // lay dung luong va kieu file tu the input file
            var fsize = $('#hinh')[0].files[0].size;
            var ftype = $('#hinh')[0].files[0].type;
            var fname = $('#hinh')[0].files[0].name;

            switch (ftype) {
                case 'image/png':
                case 'image/gif':
                case 'image/jpeg':
                case 'image/pjpeg':

                    break;
                default:{
                    alert("sai định dạng hình");
                   
                    const x = document.querySelector('#hihihi')
                    x.innerHTML =
                        ` <form  class="form-contact contact_form" action="{{URL::to('#')}}" method="post"
                    enctype="multipart/form-data" >
                    @csrf`;
                    window.location.reload(false); 
                
                
                };
                    
            }

        } else {
            alert("Please upgrade your browser, because your current browser lacks some new features we need!");
        }
    };

   

    
    </script>
</head>
<hr>
<section class="contact-section">
    <div class="container">


        <div class="row">
        <div class="col-sm-8">
                    <div class="form-group">
                        <input checked onclick="doi1()" class=" valid" name="doituong" id="minh" type="radio"> Đặt cho
                        mình
                        <input onclick="doi()" class=" valid" name="doituong" id="nguoithan" type="radio"> Đặt cho
                        người thân
                    </div>
                </div>
            <div class="col-lg-8">

               
                <div class="" id="hihihi">
                <form  class="" action="{{URL::to('/dienthongtin')}}" method="post"
                    enctype="multipart/form-data" >
                    @csrf
                </div>
                    <div class="row">
                        <br>
                        <br>
                        <div class="col-12 row" id="form">

                        </div>
                        <div class="col-12">
                            <h3 class="">Thông tin bệnh nhân</h3>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <input  class="form-control" name="ten" required type="text"
                                    placeholder="Nhập tên bệnh nhân">
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">

                                (Ngày sinh) <input class="form-control valid" name="ngaysinh" type="date"
                                    placeholder="Ngày sinh">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input checked value="1" class=" valid" name="gioitinh" id="minh" type="radio">Nam
                                &nbsp; &nbsp;
                                <input class=" valid" value="0" name="gioitinh" id="nguoithan" type="radio">Nữ
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input id="sdt" class="form-control valid" required name="sdt" type="text"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <input class="form-control" name="cmnd" type="text" placeholder="CMND/CCCD">
                            </div>
                        </div>
                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

                        <div class="col-sm-3">
                            <label>(Thành phố ) </label>
                            <div class="form-group">

                                <select name="tp" class="form-control">
                                    <option>Hồ Chí Minh</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>(Quận Huyện ) </label>
                            <div class="form-group">

                                <select id="quan" name="quan" class="form-control">

                                    <option selected></option>
                                    @foreach($quan as $key=>$value)
                                    <option value="{{($value->namequan)}}">{{($value->namequan)}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $('#quan').change(function() {
                                var id = $(this).val();
                                $.ajax({
                                    url: 'quan/' + id,
                                    method: "GET",
                                    success: function(data) {
                                        data = JSON.parse(data);
                                        var resultajax = ``;
                                        console.log(data);
                                        $('#phuong').show();
                                        if (data.length > 0) {
                                            for (let i = 0; i < data.length; i++) {
                                                resultajax += `<option value="` + data[i]
                                                    .name + `">` + data[i].name +
                                                    `</option>`
                                            }
                                        }
                                        $('#phuong').html(resultajax);
                                    }
                                })
                            })
                        });
                        </script>
                        <div class="col-sm-3">
                            <label>(Phường xã ) </label>
                            <div class="form-group">

                                <select name="phuong" id="phuong" class="form-control">
                                    <option></option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control" name="sonha" type="text" placeholder="Số nhà">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input class="form-control" name="duong" type="text" placeholder="Đường">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <textarea class="form-control" name="tiensubenh" type=""
                                    placeholder="Tiền sử bệnh"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div  class="form-group">(hình đính kèm)
                                <input  id="hinh" class="form-control" name="hinh" type="file" placeholder="">
                            </div>
                        </div>


                    </div>
                    <div class="form-group mt-3">
                        <button id="submit" onclick="hi()" type="submit"
                            class="button  boxed-btn">Hoàn tất </button>
                    </div>
                </form>
            </div>

            <div class="col-lg-3 offset-lg-1">
                @foreach($bacsi as $key => $value)
                <div class="single-team mb-30">
                <br>
                <br>
                <br>

                    <h2 class="contact-title">Thông tin Bác sĩ</h2>

                    <div class="team-img">
                        <img height="300" src="{{asset('./public/frontend/img/gallery/'.$value->hinh)}}" alt="">
                    </div>
                    <div class="team-caption">
                        
                        <h3><a href="#">{{($value->TenBS)}}</a></h3>
                        <h3><a href="#">Khoa : {{($value->TenKhoa)}}</a></h3>
                        <h5>Học vị : {{($value->HocVi)}}</h5>
                        <h5>Giới tính : <?php if($value->gioitinh == 0){echo "Nữ";}else{ echo "Nam";}?></h5>
                        <h5>Buổi :{{($value->Buoi)}}</h5>
                        <h5>Ngày :{{($value->NgayTruc)}}</h5>
                        <h5>Phòng :{{($value->MaPhong)}}</h5>
                        <h4>Giá khám : <?php echo number_format(($value->gia));  ?> VNĐ</h4>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@endsection
<style>
.col-lg-8{
    border:1px solid black;
    align-items: center !important;
}
.col-lg-3{
    border:1px solid black;
}
</style>