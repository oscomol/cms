<div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fa fa-edit"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">Reservations</span>
            <span class="info-box-number">
              {{$reservationCount ?? 0}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-tree"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">
              <a href="/clinic/admin/doctors" class="text-white">Themes</a>
            </span>
            <span class="info-box-number">{{$themesCount ?? 0}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
  
      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up">
      </div>
  
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fa fa-birthday-cake"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">
              <a href="/clinic/admin/list" class="text-white">Regular Menus</a>
            </span>
            <span class="info-box-number">{{$regularMenuCount ?? 0}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-birthday-cake"></i></span>
  
          <div class="info-box-content">
            <span class="info-box-text">
              <a href="/clinic/admin/users" class="text-white">Package menus</a>
            </span>
            <span class="info-box-number">{{$packedCount ?? 0}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
  </div>