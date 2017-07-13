<?php $cakeDescription = 'Admin Panel';?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('admin/vendor/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/vendor/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('admin/vendor/linearicons/style.css') ?>
    <?= $this->Html->css('admin/vendor/chartist/css/chartist-custom.css') ?>
    <?= $this->Html->css('admin/css/main.css') ?>
    <?= $this->Html->script('vendor/jquery/jquery.min.js') ?>
    <?= $this->Html->script('vendor/bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('vendor/jquery-slimscroll/jquery.slimscroll.min.js') ?>
    <?= $this->Html->script('scripts/klorofil-common.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
 
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
 </head>
<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- Side barmenu --> 
        <?php if ($this->request->session()->check('Auth.User.user_type')): ?>       
            <?= $this->element('admin/menu') ?>
        <?php endif; ?>
        <!-- End sidebar menu  -->       
        <?= $this->fetch('content') ?>
    </div>
    <!-- END WRAPPER -->
</body>
</html>
