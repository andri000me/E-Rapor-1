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
              <li class="active"><a href="<?= site_url('/Jurnal'); ?>"><?= $title; ?></a></li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">

          <div class="row">
              <div class="col-md-12">
                  <div class="box">
                      <div class="box-header">
                          <div class="row">
                              <div class="col-md-3">
                                  <div id="message_success"></div>
                                  <div class="form-group">
                                      <label for="nkelas">Kelas</label>
                                      <select name="kdkelas" id="nkelas" class="form-control">
                                          <?php foreach ($kelas as $kl) : ?>
                                              <option value="<?= $kl->id_kelas; ?>"><?= $kl->nm_kelas; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-9">
                                  <br>
                                  <input type="hidden" name="id_guru" value="<?= $guru->id_guru; ?>">
                                  <input type="hidden" name="id_mapel" value="<?= $guru->mapel; ?>">
                                  <button class="btn btn-flat btn-success pull-right" id="ipt-nilai" style="margin-right:1em;">Input Nilai</button>
                              </div>
                          </div>
                      </div>
                      <div class="box-body table-responsive">
                          <table class="table table-hover" id="tbl-nilai">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>Semester</th>
                                      <th>Jenis Nilai</th>
                                      <th>Nilai</th>
                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody id="bd-nilai">

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="progress active" style="display: none;">
                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0">
                          <span class="msg-prog" style="display:none;">0%</span>
                      </div>
                  </div>
                  <form id="form-tambah" method="post">
                      <div class="form-group">
                          <label for="semester">Semester</label>
                          <select name="semester" id="semester" class="form-control">
                              <option value="I">I</option>
                              <option value="II">II</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <select name="kelas" id="idkelas" class="form-control">
                          </select>
                      </div>
                      <div class="form-group fr-jenis">
                          <label for="jenis_nilai">Jenis Nilai</label>
                          <input type="text" name="jenis" id="jenis_niai" class="form-control">
                      </div>
                      <div class="form-group fr-nilai">
                          <label for="nilai">Nilai</label>
                          <input type="number" name="nilai" id="nilai" class="form-control">
                      </div>
                      <div class="form-group">
                          <label for="nama">Nama</label>
                          <select name="nama" id="nama" class="form-control">
                              <option value="0">--Pilih Siswa--</option>
                          </select>
                      </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default btl" data-dismiss="modal">Batal</button>
                  <button type="button" class="btn btn-success" id="simpan_nilai">Simpan</button>
                  </form>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->