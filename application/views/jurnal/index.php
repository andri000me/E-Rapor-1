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
              <li class="active"><a href="<?= site_url($title); ?>"><?= $title; ?></a></li>
          </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-12">
                  <div class="alert alert-info alert-dismissible">
                      <span><i class="icon fa fa-info"></i> Informasi </span>
                      <marquee>Selamat Datang di Sistem Informasi E-Rapot SMKN 1 KEBUMEN</marquee>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="box">
                      <div class="box-body">
                          <h4>Hallo <?= $this->session->userdata('nama'); ?></h4>
                          <div class="text-right">
                              <h5>Tanggal : <?php echo date('d-m-Y'); ?></h5>
                          </div>
                          <br>
                          <h5>Profil</h5>
                          <p>Nip : <?= $guru->nip; ?></p>
                          <p>Nama : <?= $guru->nama; ?></p>
                          <p>Jenis Kelamin : <?= $guru->jk; ?></p>
                          <p>Mapel : <?= $guru->nama_mapel; ?></p>
                          <p>Email : <?= $guru->email; ?></p>
                          <br><br>
                          <button class="btn btn-flat btn-warning"><i class="fa fa-edit"></i> Edit Profil</button>
                      </div>
                  </div>
              </div>
              <div class="col-md-8">
                  <div class="box">
                      <div class="box-body table-responsive">
                          <h4>Jadwal Pelajaran</h4>
                          <div id="message_success"></div>
                          <button class="btn btn-flat btn-success pull-right" id="tbh-jadwal"><i class="fa fa-paper-plane"></i> Tambah</button>
                          <table class="table table-hover" id="tbl-jadwal">
                              <thead>
                                  <th>No</th>
                                  <th>Hari</th>
                                  <th>Kelas</th>
                                  <th>Jam</th>
                                  <th></th>
                              </thead>
                              <tbody id="bd-jadwal"></tbody>
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
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
                  <form id="form-tambah" method="post">
                      <input type="hidden" name="id_guru" value="<?= $guru->id_guru; ?>">
                      <input type="hidden" name="id_mapel" value="<?= $guru->id_mapel; ?>">
                      <div class="form-group fr-hari">
                          <label for="hari">Hari</label>
                          <select name="hari" id="hari" class="form-control">
                              <option value="0">---Piih---</option>
                              <?php $hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat'];
                                foreach ($hari as $hr) : ?>
                                  <option value="<?= $hr; ?>"><?= $hr; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group fr-kelas">
                          <label for="kelas">Kelas</label>
                          <select name="kelas" id="kelas" class="form-control">
                              <option value="0">--Pilih---</option>
                              <?php foreach ($kelas as $kl) : ?>
                                  <option value="<?= $kl->id_kelas; ?>"><?= $kl->nm_kelas; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group fr-jam">
                          <label for="jam">Jam Ke-</label>
                          <input type="number" class="form-control" id="jam" name="jam">
                      </div>
                      <div class="progress active" style="display: none;">
                          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0">
                              <span class="msg-prog" style="display:none;">0%</span>
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" id="simpan" class="btn btn-primary">Simpan</button>
                  </form>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>


  <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Data</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="id_jadwal">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" id="hapus" class="btn btn-primary">Perbarui</button>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>