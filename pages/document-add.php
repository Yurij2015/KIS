<?php session_start() ?>
<?php $title = "Добавление документа" ?>
<?php
require_once( '../forms/DocumentForm.php' );
//require_once ('forms/LoginForm.php');
require_once( '../DB.php' );
require_once( '../Password.php' );
require_once( '../Session.php' );
require_once( '../Dbsettings.php' );
$msg  = '';
$db   = new DB( $host, $user, $password, $db_name );
$form = new DocumentForm( $_POST );
if ( $_POST ) {
	if ( $form->validate() ) {
		$name                = $db->escape( $form->getName() );
		$doccontent          = $db->escape( $form->getDoccontent() );
		$link                = $db->escape( $form->getLink() );
		$employee_idemployee = $db->escape( $form->getEmployeeIdemployee() );


		$email = $_SESSION['email'];
		$res   = $db->query( "SELECT userrole FROM `user` WHERE email = '{$email}'" );
		$a     = $res[0]['userrole'];
		if ( $a != 1 ) {
			$msg = 'У Вас нет прав на добавление документа!';
			//print_r ($res); проверка
			//echo $a; проверка
		} else {
			$db->query( "INSERT INTO document (`name`, doccontent, link, employee_idemployee) VALUES ('{$name}','{$doccontent}', '{$link}', '{$employee_idemployee}') " );
			header( 'location: document.php?msg=Документ успешно добавлен!' );
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
                        <label for="name">Название документа</label>
                        <input type="text" class="form-control" id="name" placeholder="Название документа"
                               name="name"
                               value="<?= $form->getName(); ?>">
                    </div>
                    <div class="form-group">

                        <label for="doccontent">Содержание документа</label>
                        <textarea class="form-control" id="doccontent"
                                  placeholder="Содержание документа" name="doccontent"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="link">Ссылка на документ</label>
                        <input type="text" class="form-control" id="link" placeholder="Ссылка на документ"
                               name="link" value="<?= $form->getLink() ?>">
                    </div>
                    <div class="form-group">
                        <label for="employee_idemployee">Автор документа</label>
                        <input type="text" class="form-control" id="employee_idemployee" placeholder="Автор документа"
                               name="employee_idemployee" value="<?= $form->getEmployeeIdemployee() ?>">
                    </div>
                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="client.php" class="btn btn-info">Отмена</a>

                </form>
            </div>
        </div>
    </div>

</div>




<?php include 'footer.php' ?>
