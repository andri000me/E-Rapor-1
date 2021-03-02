  <!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              <?= $title; ?>
          </h1>
          <ol class="breadcrumb">
              <li><a href="<?= site_url('/Dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active"><a href="<?= site_url('/Dashboard'); ?>"><?= $title; ?></a></li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <div class="row">
              <div class="col-md-12">
                  <div class="box">
                      <div class="box-body">
                          <h3 id="time" class="pull-right"></h3>
                          <h3>Hallo , <?= $this->session->userdata('nama'); ?></h3>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                      <div class="inner">
                          <h3>1150</h3>

                          <p>Total Siswa</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                      <div class="inner">
                          <h3>114</h3>

                          <p>Total Guru</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                      <div class="inner">
                          <h3>20</h3>

                          <p>Total Mapel</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bookmark"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                      <div class="inner">
                          <h3>28</h3>

                          <p>Total Kelas</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->