<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Data Siswa</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <form action="<?= site_url('/Guru/simpan'); ?>" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="id_guru" value="<?= $sw->id_guru; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nip">Nip</label>
                                        <input type="text" name="nis" id="nip" class="form-control" value="<?= $sw->nip; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $sw->nama; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenkel">Jenis Kelamin</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jenkel" id="jenkel1" value="L" <?= ($sw->jk == 'L') ? 'checked' : null; ?>>
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jenkel" id="jenkel2" value="P" <?= ($sw->jk == 'P') ? 'checked' : null; ?>>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mapel">Mapel</label>
                                        <select name="mapel" id="mapel" class="form-control">
                                            <option value="0">--Pilih--</option>
                                            <?php foreach ($mapel as $kl) : ?>
                                                <option value="<?= $kl->id_mapel; ?>" <?= ($sw->mapel == $kl->id_mapel) ? 'selected' : null; ?>><?= $kl->nama_mapel; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                    <a href="<?= site_url('/Guru'); ?>" class="btn btn-danger btn-flat">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>