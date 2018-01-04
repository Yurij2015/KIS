<?php session_start() ?>
<?php $title = "Обновление данных сотрудника" ?>
<?php
require_once( '../forms/EmployeeForm.php' );
//require_once ('forms/LoginForm.php');
require_once( '../DB.php' );
require_once( '../Password.php' );
require_once( '../Session.php' );
require_once( '../Dbsettings.php' );
$msg  = '';
$idemployee = $_GET['idemployee'];
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

		//$idemployee = $_GET['idemployee'];

		if ( $a != 1 ) {
			$msg = 'У Вас нет прав на обновление данных!';
			//print_r ($res); проверка
			//echo $a; проверка
		} else {
			$db->query( "UPDATE `employee` SET `name` = '{$name}', secondname = '{$secondname}', idunit = '{$idunit}', `position` = '{$position}' WHERE idemployee={$idemployee} LIMIT 1" );
			header( 'location: employee-edit-remove.php?msg=Данные успешно обновлены!' );
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

				<?php
				//$idemployee = $_GET['idemployee'];
				$db         = new DB( $host, $user, $password, $db_name );
				$employee   = $db->query( "SELECT * FROM employee, unit WHERE unit.idunit = employee.idunit  AND idemployee={$idemployee}" );
				foreach ( $employee as $employeeitem ) {
					?>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" id="name" placeholder="Имя"
                                   name="name"
                                   value="<?php echo $employeeitem["name"]; ?>">
                            <input type="hidden" value="<?php echo $employeeitem["idemployee"]; ?>" name="idemployee">
                        </div>

                        <div class="form-group">
                            <label for="secondname">Фамилия</label>
                            <input type="text" class="form-control" id="secondname"
                                   placeholder="Фамилия" name="secondname"
                                   value="<?php echo $employeeitem["secondname"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="idunit">Текущий отдел</label>
                            <input type="text" class="form-control" id="idunit" disabled
                                   value="<?php echo $employeeitem["unitname"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="idunit">Обновить отдел </label>
                            <select class="form-control" name="idunit" id="idunit">
                                <option value="<?php echo $employeeitem["idunit"]; ?>"
                                        selected><?php echo $employeeitem["unitname"]; ?></option>
								<?php
								//$db   = new DB( $host, $user, $password, $db_name );
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
                                   name="position" value="<?php echo $employeeitem["position"]; ?>">
                        </div>

                        <button type="submit" class="btn btn-info">Сохранить</button>
                        <a href="employee-edit-remove.php" class="btn btn-info">Отмена</a>

                    </form>
					<?php
				}
				?>
            </div>
        </div>
    </div>

</div>


<?php include 'footer.php' ?>
