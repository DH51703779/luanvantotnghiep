@extends('admin_layout')
@section('admin_content')
<style >
    span.text-alert {
    color: red;
    margin-top: 20px;
    font-size: 15px;
}
span.fa.fa-thumbs-up {
    font-size: 28px;
    color: green;
}
span.fa.fa-thumbs-down {
    font-size: 28px;
    color: red;
}
</style>
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Lịch Khám
    </div>
    <div class="panel">
      <?php 
           $message = Session::get('message');
           if($message){
               echo'<span class="text-alert">'.$message.'</span>';
              Session::put('message',null);
          }
       ?>
    </div>
    
    <div class="table-responsive">

      <table class="table table-striped b-t b-light" class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <th>Tên BN</th>
            <th >Số Thứ Tự</th>
            <th >Tổng Tiền</th>
            <th>Tình Trạng</th>
          </tr>
        </thead>
          
        <tbody>
           @foreach ($ds_LKham as $key => $value)
          <tr>
            <td> <a style="color: #999;" href="{{URL::to('/chitietlichkham/'.$value->MaLK)}}">{{$value->TenBN}}</a></td>
             <td>
              <a>{{$value->STT}}</a>
            </td>
             <td>
              <a>{{$value->TongTien}}</a>
            </td>
              <td>
              <a>{{$value->Tinhtrang}}</a>
            </td>
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