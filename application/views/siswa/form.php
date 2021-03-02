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
                        <h3 class="box-title">Tambah Data Siswa</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                <form action="<?= site_url('/Siswa/simpan'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="nis">Nis</label>
                                        <input type="text" name="nis" id="nis" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenkel">Jenis Kelamin</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jenkel" id="jenkel1" value="L">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jenkel" id="jenkel2" value="P">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select name="kelas" id="kelas" class="form-control">
                                            <option value="0"></option>
                                            <?php foreach ($kelas as $kl) : ?>
                                                <option value="<?= $kl->id_kelas; ?>"><?= $kl->nm_kelas; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                    <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-undo"></i> Reset</button>
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