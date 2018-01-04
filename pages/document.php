<?php
session_start();
require_once '../Session.php';
?>
<?php $title = "Документы" ?>
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
						<a href="document-add.php" class="btn btn-info">Добавить документ</a>
						<a href="client-edit-remove.php" class="btn btn-info">Редактировать / Удалить</a>

					</div>
					<table class="table">
						<thead>
						<tr>
							<th scope="col" class="text-center">Название документа</th>
							<th scope="col" class="text-center">Содержание документа</th>
							<th scope="col" class="text-center">Ссылка</th>
							<th scope="col" class="text-center">Автор</th>
						</tr>
						</thead>
						<tbody>
						<?php
						try {
						$db     = new DB( $host, $user, $password, $db_name );
						$document = $db->query( "SELECT * FROM `document`" );
						foreach ( $document as $documentitem ) {
							?>
							<tr>
								<td><?php echo $documentitem["name"]; ?></td>
								<td><?php echo $documentitem["doccontent"]; ?></td>
								<td><?php echo $documentitem["link"]; ?></td>
								<td><?php echo $documentitem["employee_idemployee"]; ?></td>
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