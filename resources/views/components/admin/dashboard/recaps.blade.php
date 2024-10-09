<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Monthly Recap Report</h5>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong class="monthlyRecapTitle"></strong>
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Reservation Status Quick Check</strong>
              </p>

              <div class="progress-group">
                Pending
                <span class="float-right pendingReservation"><b></b><span></span></span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-warning pendingBar" style="width: 100%"></div>
                </div>
              </div>


              <div class="progress-group">
                In Progress
                <span class="float-right inProgressReservation"><b></b><span></span></span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-primary inProgressBar" style="width: 100%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Done</span>
                <span class="float-right doneReservation"><b></b><span></span></span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-success doneBar" style="width: 100%"></div>
                </div>
              </div>

              <!-- /.progress-group -->
              <div class="progress-group">
                Cancelled
                <span class="float-right cancelledReservation"><b></b><span></span></span>
                <div class="progress progress-sm">
                  <div class="progress-bar bg-danger cancelledBar" style="width: 100%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
          <div class="row topUserCont">
            
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>