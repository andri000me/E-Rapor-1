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
                        <h3 class="box-title">Menu Manajemen</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#df-menu" data-toggle="tab" aria-expanded="true">Daftar Menu</a></li>
                                <li class=""><a href="#df-admin" data-toggle="tab" aria-expanded="false">Daftar Admin</a></li>
                            </ul>
                            <div class="tab-content">
                                <!-- Font Awesome Icons -->
                                <div class="tab-pane active" id="df-menu">
                                    <section id="new">
                                        <div class="text-right">
                                            <button type="button" class="btn btn-flat btn-success" id="tb-menu">Tambah Menu</button>
                                        </div>
                                        <h4 class="page-header">Daftar Menu</h4>
                                        <div class="box">
                                            <div class="box-body table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Title</th>
                                                            <th>Icon</th>
                                                            <th>Link</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bd-menu">
                                                        <?php
                                                        $no = 1;
                                                        foreach ($menu->result() as $mn) : ?>
                                                            <tr>
                                                                <th><?= $no++; ?></th>
                                                                <td><?= $mn->title; ?></td>
                                                                <td><span><i class="<?= $mn->icon; ?>"></i></span></td>
                                                                <td><?= $mn->url; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- /#ion-icons -->
                                <div class="tab-pane " id="df-admin">
                                    <section id="new">
                                        <h4 class="page-header">Akun Admin</h4>
                                        <div class="box">
                                            <div class="box-body">
                                                <h4></h4>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<!-- modal tambah menu -->
<div class="modal fade" id="tbh-menu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Menu</h4>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('/Manajemen/tambah_menu') ?>" method="post">
                    <div class="form-group">
                        <label for="menu_id">Menu ID</label>
                        <input type="number" name="menu_id" id="menu_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" name="icon" id="icon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->