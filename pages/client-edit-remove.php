<?php
session_start();
require_once '../Session.php';
?>
<?php $title = "Управление списком клиентов" ?>
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
                        <a href="client.php" class="btn btn-info">Назад</a>

                    </div>
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center" style="width: 20%">ФИО клиента</th>
                            <th scope="col" class="text-center" style="width: 20%">E-mail</th>
                            <th scope="col" class="text-center" style="width: 15%">Номер телефона</th>
                            <th scope="col" class="text-center" style="width: 23%">Дата добавления</th>
                            <th scope="col" class="text-center">Управление записью</th>
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

								<?php
								echo '<td class="text-center"><a href="client-update.php';
								echo '?idclient=';
								echo $clientitem["idclient"];
								echo '">';
								echo 'Изменить';
								echo '</a><br>';

								echo '<a href="client-remove.php';
								echo '?idclient=';
								echo $clientitem["idclient"];
								echo '"> Удалить</a></td>';
								?>
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