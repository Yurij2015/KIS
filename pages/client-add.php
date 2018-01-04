<?php session_start() ?>
<?php $title = "Добавление клиента" ?>
<?php
require_once( '../forms/ClientForm.php' );
//require_once ('forms/LoginForm.php');
require_once( '../DB.php' );
require_once( '../Password.php' );
require_once( '../Session.php' );
require_once( '../Dbsettings.php' );
$msg  = '';
$db   = new DB( $host, $user, $password, $db_name );
$form = new ClientForm( $_POST );
if ( $_POST ) {
	if ( $form->validate() ) {
		$clientname     = $db->escape( $form->getClientName() );
		$clientemail = $db->escape( $form->getClienteMail() );
		$clientphone    = $db->escape( $form->getClientPhone() );

		$email = $_SESSION['email'];
		$res = $db->query( "SELECT userrole FROM `user` WHERE email = '{$email}'" );
		$a   = $res[0]['userrole'];
		if ( $a != 1 ) {
			$msg = 'У Вас нет прав на добавление клиента!';
			//print_r ($res); проверка
			//echo $a; проверка
		} else {
			$db->query( "INSERT INTO client (clientname, clientemail, clientphone) VALUES ('{$clientname}','{$clientname}', '{$clientphone}')" );
			header( 'location: client.php?msg=Клиент успешно добавлен!' );
		}

	} else {
		$msg = 'Пожалуйста, заполните все поля';
	}
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

                <b style="color: red;"><?= $msg; ?></b>
                <form method="post">
                    <div class="form-group">
                        <label for="clientname">ФИО клиента</label>
                        <input type="text" class="form-control" id="clientname" placeholder="ФИО клиента"
                               name="clientname"
                               value="<?= $form->getClientName(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="clientemail">E-mail</label>
                        <input type="email" class="form-control" id="clientemail"
                               placeholder="E-mail" name="clientemail"
                               value="<?= $form->getClienteMail() ?>">
                    </div>
                    <div class="form-group">
                        <label for="clientphone">Номер телефона</label>
                        <input type="text" class="form-control" id="clientphone" placeholder="Номер телефона"
                               name="clientphone" value="<?= $form->getClientPhone() ?>">
                    </div>
                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="client.php" class="btn btn-info">Отмена</a>

                </form>
            </div>
        </div>
    </div>

</div>


<?php include 'footer.php' ?>
