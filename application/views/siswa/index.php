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
                        <h3 class="box-title">Data Siswa</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <br>
                                <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control">
                                    <option value="0"></option>
                                    <?php foreach ($kelas as $kl) : ?>
                                        <option value="<?= $kl->id_kelas; ?>"><?= $kl->nm_kelas; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-8 text-right">
                                <br><br>
                                <a href="<?= site_url('/Siswa/tambah'); ?>" class="btn btn-success">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-hover" id="tbl-siswa">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="bd-siswa">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>