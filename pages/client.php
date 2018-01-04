<?php
session_start();
require_once '../Session.php';
?>
<?php $title = "Клиенты компании" ?>
<?php
require_once( '../Dbsettings.php' );
include_once( '../DB.php' );
$db = new DB( $host, $user, $password, $db_name );
?>
<?php include 'header.php' ?>
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
                <h5 class="text-center border border-top-0 border-right-0"
                    style="line-height: 40px;"><?php echo $title ?></h5>
            </div>
        </div>
        <div class="row">
			<?php include_once( '../navigation.php' ); ?>
            <div class="col-sm">
                <div class="text-justify border border-bottom-0 border-right-0"
                     style="line-height: 40px; padding-left: 10px; padding-right: 10px;">
                    <div style="margin: 4px 0 7px 0;">
                        <a href="client-add.php" class="btn btn-info">Добавить клиента</a>
                        <a href="client-edit-remove.php" class="btn btn-info">Редактировать / Удалить</a>

                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ФИО клиента</th>
                            <th scope="col" class="text-center">E-mail</th>
                            <th scope="col" class="text-center">Номер телефона</th>
                            <th scope="col" class="text-center">Дата добавления</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php
						try {
						$db     = new DB( $host, $user, $password, $db_name );
						$client = $db->query( "SELECT * FROM `client`" );
						foreach ( $client as $clientitem ) {
							?>
                            <tr>
                                <td><?php echo $clientitem["clientname"]; ?></td>
                                <td><?php echo $clientitem["clientemail"]; ?></td>
                                <td><?php echo $clientitem["clientphone"]; ?></td>
                                <td><?php echo $clientitem["timestamp"]; ?></td>
                            </tr>
						<?php }
						?>
                        </tbody>
                    </table>
					<?php

					} catch
					( Exception $e ) {
						echo $e->getMessage() . ':(';
					}
					?>
                </div>
            </div>
        </div>

    </div>
<?php include 'footer.php' ?>