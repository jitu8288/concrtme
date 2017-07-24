<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'ConcrtMe!';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <!-- Bootstrap Stylesheets -->
    <?= $this->Html->css('main/bootstrap/css/bootstrap.css') ?>
    <!-- Main Stylesheets -->
    <?= $this->Html->css('main/css/custom.css') ?>
    <?= $this->Html->css('main/css/responsive.css') ?>
    <?= $this->Html->css('main/css/demo.css') ?>
    <?= $this->Html->css('main/css/component.css') ?>
 
 
    <!-- Google web font -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i" rel="stylesheet"> 
   
    <!-- java scripts -->
    <?= $this->Html->script('main/js/jquery.min.js') ?>
    <?= $this->Html->script('main/bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('main/js/modernizr.custom.js') ?>
    <?= $this->Html->script('main/js/imagesloaded.pkgd.min.js') ?>
    <?= $this->Html->script('main/js/masonry.pkgd.min.js') ?>
    <?= $this->Html->script('main/js/cbpGridGallery.js') ?> 
    <?= $this->Html->script('main/js/classie.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script>
         new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
    </script>

</head>
 
<body class="<?=  $this->request->session()->read('Auth.User.id')!=='' ? 'logged_in':'' ?>"   >
    <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top mymenu">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?= $this->Html->image('concrt_me_logo.svg') ?></a>
    </div>
  <?php if($this->request->session()->read('Auth.User.id')) : ?>
    <div id="navbar" class="navbar-collapse collapse">
      <div class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="../navbar/">Default</a></li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle profile-pic" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/pic2.png" class="img-circle"> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">
                <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'lnr lnr-pencil')).' Logout ', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)) ?></a>
                </li>
               
              </ul>
            </li>
        </ul>
      </div>
    </div><!--/.nav-collapse -->
<?php endif; ?>


  </div>
</nav>
<!-- //Mobile-Menu// -->
    
    <?= $this->fetch('content') ?>
 
 </body>
</html>

 