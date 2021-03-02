<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <?php foreach ($role->result() as $rl) : ?>
                <?php if ($title == $rl->title) : ?>
                    <li class="active">
                    <?php else : ?>
                    <li>
                    <?php endif; ?>
                    <a href="<?= site_url($rl->url) ?>">
                        <i class="<?= $rl->icon; ?>"></i> <span><?= $rl->title; ?></span>
                    </a>
                    </li>
                <?php endforeach; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>