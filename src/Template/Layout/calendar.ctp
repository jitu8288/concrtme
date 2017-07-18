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

$cakeDescription = 'Calendar | Home';
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
    <?= $this->Html->css('calendar.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('progress.css') ?>
    <?= $this->Html->script('vendor/jquery/jquery.min.js') ?>
    <?= $this->Html->script('vendor/bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('progress.js') ?>      

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<!--     <div class='progress' id="progress_div">
        <div class='bar' id='bar1'></div>
        <div class='percent' id='percent1'></div>
    </div>
 -->
    <?= $this->Flash->render() ?>
    <div class="container_calendar clearfix">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
    </footer>
    <input type="hidden" id="progress_width" value="0">
</body>
</html>

 