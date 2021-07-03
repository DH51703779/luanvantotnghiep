@extends('admin_layout')
@section('admin_content')
<style >
    span.text-alert {
    color: red;
    margin-top: 20px;
    font-size: 15px;
}
span.fa.fa-check-circle {
    font-size: 28px;
    color: green;
}
span.fa.fa-times-circle {
    font-size: 28px;
    color: red;
}
</style>
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Khoa
    </div>
       <?php 
           $message = Session::get('message');
           if($message){
               echo'<span class="text-alert">'.$message.'</span>';
              Session::put('message',null);
          }
       ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" class="data display datatable" id="myTable">
        <thead>
          <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Hình</th>
            <th>Trạng Thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
             @foreach ($ds_Khoa as $key => $value)
          <tr>
            <td>{{$value->MaKhoa}}</td>
            <td>{{$value->TenKhoa}}</td>
             <td>{{$value->gia}}</td>
            <td> <img src="public/frontend/img/khoa/{{$value->Hinh}}" height="100" width="100"></td>
                <td><span class="text-ellipsis">
                        <?php 
                            if($value->TrangThaiKhoa==0){
                              ?>
                              <a href="{{URL::to('/unactive-khoa/'.$value->MaKhoa)}}" ><span class="fa fa-times-circle"></span></a>
                            <?php  
                            } else{
                            ?>
                           <a href="{{URL::to('/active-khoa/'.$value->MaKhoa)}}" ><span class="fa fa-check-circle"></span></a>
                           <?php 
                           }
                         ?>
              </span></td>
            <td>
              <a href="{{URL::to('/edit-Khoa/'.$value->MaKhoa)}}" class="active" ui-toggle-class="" style="font-size: 15px;">
                  <i class="fa fa-edit"></i></a>
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