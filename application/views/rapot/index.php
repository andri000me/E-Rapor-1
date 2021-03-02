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
                      <div class="box-header">
                          <h3>Hallo, <?= $siswa->nama; ?></h3>
                          <br>
                          <p>Nis : <?= $siswa->nis; ?></p>
                          <p>Nama : <?= $siswa->nama; ?></p>
                          <div class="form-group">
                              <input type="hidden" name="id_siswa" value="<?= $siswa->id_siswa; ?>">
                          </div>
                      </div>
                      <div class="box-body">
                          <table class="table table-hover" id="tbl-rapot">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Mapel</th>
                                      <th>Nilai</th>
                                      <th>Predikat</th>
                                  </tr>
                              </thead>
                              <tbody id="bd-rapot">
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>