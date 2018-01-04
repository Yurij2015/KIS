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

	$idemployee = $_GET['idemployee'];

	$db->query( "DELETE FROM employee WHERE idemployee='{$idemployee}' LIMIT 1" );
	header( 'location: employee-edit-remove.php?msg=Запись успешно удалена!' );
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
				$idemployee = $_GET['idemployee'];
				$db         = new DB( $host, $user, $password, $db_name );
				$employee   = $db->query( "SELECT * FROM employee, unit WHERE unit.idunit = employee.idunit  AND idemployee={$idemployee}" );
				foreach ( $employee as $employeeitem ) {
					?>
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control" id="name" placeholder="Имя"
                                   name="name" disabled
                                   value="<?php echo $employeeitem["name"]; ?>">
                            <input type="hidden" value="<?php echo $employeeitem["idemployee"]; ?>" name="idemployee">
                        </div>

                        <div class="form-group">
                            <label for="secondname">Фамилия</label>
                            <input type="text" class="form-control" id="secondname"
                                   placeholder="Фамилия" name="secondname" disabled
                                   value="<?php echo $employeeitem["secondname"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="idunit">Отдел</label>
                            <input type="text" class="form-control" id="idunit" placeholder="Отдел"
                                   name="idunit" disabled value="<?php echo $employeeitem["unitname"]; ?>">
                        </div>

                        <div class="form-group">
                            <label for="position">Должность</label>
                            <input type="text" class="form-control" id="position" placeholder="Должность"
                                   name="position" disabled value="<?php echo $employeeitem["position"]; ?>">
                        </div>

                        <button type="submit" class="btn btn-info">Удалить запись</button>
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
