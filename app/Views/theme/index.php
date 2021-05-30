<?= view('App\Views\theme\header') ?>
<?= view('App\Views\theme\sidebar') ?>
<br>
<h1 id="page-title"><?= $function_title ?></h1>
<?php echo view($viewName); ?>
<?= view('App\Views\theme\footer') ?>
<?= view('App\Views\theme\notification') ?>
