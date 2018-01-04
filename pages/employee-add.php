<?php session_start() ?>
<?php $title = "Добавление сотрудника" ?>
<?php
require_once( '../forms/EmployeeForm.php' );
//require_once ('forms/LoginForm.php');
require_once( '../DB.php' );
require_once( '../Password.php' );
require_once( '../Session.php' );
require_once( '../Dbsettings.php' );
$msg  = '';
$db   = new DB( $host, $user, $password, $db_name );
$form = new EmployeeForm( $_POST );
if ( $_POST ) {
	if ( $form->validate() ) {
		$name       = $db->escape( $form->getName() );
		$secondname = $db->escape( $form->getSecondname() );
		$idunit     = $db->escape( $form->getIdunit() );
		$position   = $db->escape( $form->getPosition() );

		$email = $_SESSION['email'];
		$res   = $db->query( "SELECT userrole FROM `user` WHERE email = '{$email}'" );
		$a     = $res[0]['userrole'];
		if ( $a != 1 ) {
			$msg = 'У Вас нет прав на добавление документа!';
			//print_r ($res); проверка
			//echo $a; проверка
		} else {
			$db->query( "INSERT INTO employee (`name`, secondname, idunit, `position`) VALUES ('{$name}','{$secondname}', '{$idunit}', '{$position}') " );
			header( 'location: employee.php?msg=Сотрудник успешно добавлен!' );
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
                        <label for="name">Имя</label>
                        <input type="text" class="form-control" id="name" placeholder="Имя"
                               name="name"
                               value="<?= $form->getName(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="secondname">Фамилия</label>
                        <input type="text" class="form-control" id="secondname" placeholder="Фамилия"
                               name="secondname" value="<?= $form->getSecondname() ?>">
                    </div>

                    <div class="form-group">
                        <label for="idunit">Отдел</label>
                        <select class="form-control" name="idunit" id="idunit">
							<?php
							$db   = new DB( $host, $user, $password, $db_name );
							$unit = $db->query( "SELECT idunit, unitname FROM unit" );
							foreach ( $unit as $unititem ) {
								?>
                                <option value="<?php echo $unititem['idunit'] ?>"><?php echo $unititem['unitname'] ?></option>
							<?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="position">Должность</label>
                        <input type="text" class="form-control" id="position" placeholder="Должность"
                               name="position" value="<?= $form->getPosition() ?>">
                    </div>
                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="employee.php" class="btn btn-info">Отмена</a>

                </form>
            </div>
        </div>
    </div>

</div>


<?php include 'footer.php' ?>
