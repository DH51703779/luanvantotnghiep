@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Bệnh Nhân
    </div>
 
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <th>Tên Bệnh Nhân</th>
            <th>Số Điện Thoại</th>
            <th>Giới Tính</th>
            <th>Địa Chỉ</th>
          </tr>
        </thead>
          
        <tbody>
           @foreach ($ds_BenhNhan as $key => $value)
          <tr>
            <td> <a style="color: #999;" href="{{URL::to('/chitietbenhnhan/'.$value->MaBN)}}">{{$value->TenBN}}</a></td>
            <td><span class="text-ellipsis">{{$value->DienThoai}}</span></td>
            <td><span class="text-ellipsis">
              <?php 
                  if($value->gioitinh==0){
                    echo'Nữ';
                  } else
                    echo "Nam";
               ?>
            </span></td>
            <td><span class="text-ellipsis">{{$value->DiaChi}}</span></td>
          </tr>
           @endforeach
        </tbody>
      </table>
     
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
      </div>
    </footer>
  </div>

@endsection