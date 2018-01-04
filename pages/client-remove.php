<?php session_start() ?>
<?php $title = "Удаление записи" ?>
<?php
//require_once( '../forms/ClientForm.php' );
//require_once ('forms/LoginForm.php');
require_once( '../DB.php' );
require_once( '../Password.php' );
require_once( '../Session.php' );
require_once( '../Dbsettings.php' );
$msg = '';
$db  = new DB( $host, $user, $password, $db_name );

if ( $_POST ) {

	$idclient = $_GET['idclient'];

	$db->query( "DELETE FROM client WHERE idclient='{$idclient}' LIMIT 1" );
	header( 'location: client-edit-remove.php?msg=Запись успешно удалена!' );
}

?>
<?php include 'header.php' ?>
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
                <h6 class="text-center" style="padding-top: 15px; color: red;">Вы уверены, что хотите удалить эту
                    запись?</h6>

                <b style="color: red;"><?= $msg; ?></b>

				<?php
				$idclient = $_GET['idclient'];
				$db       = new DB( $host, $user, $password, $db_name );
				$client   = $db->query( "SELECT * FROM client WHERE idclient={$idclient	}" );
				foreach ( $client as $clientitem ) {
					?>
                    <form method="post">
                        <div class="form-group">
                            <label for="clientname">ФИО клиента</label>
                            <input type="text" class="form-control" id="clientname" placeholder="ФИО клиента"
                                   name="clientname" disabled
                                   value="<?php echo $clientitem["clientname"]; ?>">
                            <input type="hidden" value="<?php echo $clientitem["idclient"]; ?>" name="idclient">
                        </div>
                        <div class="form-group">
                            <label for="clientemail">E-mail</label>
                            <input type="email" class="form-control" id="clientemail"
                                   placeholder="E-mail" name="clientemail" disabled
                                   value="<?php echo $clientitem["clientemail"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="clientphone">Номер телефона</label>
                            <input type="text" class="form-control" id="clientphone" placeholder="Номер телефона"
                                   name="clientphone" disabled value="<?php echo $clientitem["clientphone"]; ?>">
                        </div>
                        <button type="submit" class="btn btn-info">Удалить запись</button>
                        <a href="client-edit-remove.php" class="btn btn-info">Отмена</a>

                    </form>
					<?php
				}
				?>
            </div>
        </div>
    </div>

</div>


<?php include 'footer.php' ?>
