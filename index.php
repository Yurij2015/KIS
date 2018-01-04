<?php
session_start();
require_once 'Session.php';
?>
<?php $title = "Главная страница" ?>
<?php
require_once( 'Dbsettings.php' );

include_once( 'DB.php' );
$db = new DB( $host, $user, $password, $db_name );
?>
<?php include 'pages/header.php' ?>
<?= isset( $_GET['msg'] ) ? $_GET['msg'] : ''; ?>
<hr>
<h5 align="center">Корпоративная информационная система</h5>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-center border border-top-0 border-left-0" style="line-height: 40px;">Меню</h5>

        </div>
        <div class="col-sm">
            <h5 class="text-center border border-top-0 border-right-0" style="line-height: 40px;">Заголовок</h5>
        </div>
    </div>

    <div class="row">
        <?php include_once( 'navigation.php' );?>
        <div class="col-sm">
            <div class="text-justify border border-bottom-0 border-right-0"
                 style="line-height: 40px; padding-left: 10px; padding-right: 10px;">
                <p>Контент</p>
                <p>Контент</p>

            </div>
        </div>
    </div>

</div>
<?php include 'pages/footer.php' ?>
