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
      Quản Lý Phòng
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
            <th>Tên Phòng</th>
            <th>Tên Khoa</th>
            <th>Trạng Thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
          
        <tbody>
           @foreach ($ds_Phong as $key => $value)
          <tr>
            <td> <a style="color: #999;" href="#">{{$value->MaPhong}}</a></td>
            <td><span class="text-ellipsis">{{$value->TenKhoa}}</span></td>
                 <td><span class="text-ellipsis">
                        <?php 
                            if($value->TrangThaiPhong==0){
                              ?>
                              <a href="{{URL::to('/unactive-Phong/'.$value->MaPhong)}}" ><span class="fa fa-times-circle"></span></a>
                            <?php  
                            } else{
                            ?>
                           <a href="{{URL::to('/active-Phong/'.$value->MaPhong)}}" ><span class="fa fa-check-circle"></span></a>
                           <?php 
                           }
                         ?>
              </span></td>
            <td>
              <a href="{{URL::to('/edit-Phong/'.$value->MaPhong)}}" class="active" ui-toggle-class="" style="font-size: 15px;">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
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