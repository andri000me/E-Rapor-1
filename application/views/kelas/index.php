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
                          <h4>Daftar Kelas</h4>
                          <?= $this->session->flashdata('pesan'); ?>
                          <button class="btn btn-flat btn-success pull-right" id="kelas-tambah" style="margin-right:1em;"><i class="fa fa-plus"></i> Tambah</button>
                      </div>
                      <div class="box-body table-responsive">
                          <table class="table table-hover" id="tbl-kelas">
                              <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama Kelas</th>
                                      <th></th>
                                  </tr>
                              </thead>
                          </table>
                      </div>
                  </div>

              </div>
          </div>

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <div class="modal fade" id="modal-edit">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Data</h4>
              </div>
              <div class="modal-body">
                  <form action="<?= site_url('/Kelas/simpan') ?>" method="post">
                      <input type="hidden" name="id_kelas">
                      <div class="form-group">
                          <label for="nama">Nama Kelas</label>
                          <input type="text" name="nama_kelas" id="nama" class="form-control">
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="modal-tambah">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Data</h4>
              </div>
              <div class="modal-body">
                  <form action="<?= site_url('/Kelas/simpan') ?>" method="post">
                      <input type="hidden" name="id_kelas">
                      <div class="form-group">
                          <label for="nm_kelas">Nama Kelas</label>
                          <input type="text" name="nm_kelas" id="nm_kelas" class="form-control">
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <div class="modal fade" id="modal-hapus">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body">
                  <form action="<?= site_url('/Kelas/hapus') ?>" method="post">
                      <input type="hidden" name="id_kelas">
                      <center>
                          <h4>Apakah yakin menghapus data?</h4>
                      </center>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
              </div>
          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->