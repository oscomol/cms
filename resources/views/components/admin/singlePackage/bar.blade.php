<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fa fa-birthday-cake"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Foods</span>
          <span class="info-box-number">
            {{$selectedMenu->count()}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-address-card"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">
            <a href="/clinic/admin/doctors" class="text-white">Max Person</a>
          </span>
          <span class="info-box-number">{{$package->allowedIndividuals ?? '0'}}</span>
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
        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-tree"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">
            <a href="/clinic/admin/list" class="text-white">Theme</a>
          </span>
          <span class="info-box-number">{{$selectedTheme->theme ?? 'NA'}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-dollar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">
            <a href="/clinic/admin/users" class="text-white">Price</a>
          </span>
          <span class="info-box-number">Php {{$package->price ?? '0'}}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
</div>