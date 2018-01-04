<?php session_start() ?>
<?php $title = "Добавление курса" ?>
<?php
require_once( 'forms/RegoncourseForm.php' );
//require_once ('forms/LoginForm.php');
require_once( 'DB.php' );
require_once( 'Password.php' );
require_once( 'Session.php' );
require_once ('Dbsettings.php');


$msg = '';

$db   = new DB( $host, $user, $password, $db_name );
$form = new RegoncourseForm( $_POST );

if ( $_POST ) {
	if ( $form->validate() ) {
		$fio          = $db->escape( $form->getFio() );
		$passportdata = $db->escape( $form->getPassportdata() );
		$course       = $db->escape( $form->getCourse() );

		$db->query( "INSERT INTO `regoncourse` (fio, passportdata, course) VALUES ('{$fio}', '{$passportdata}', '{$course}')" );
		header( 'location: index.php?msg=Вы успешно записаны на курс!' );

	} else {
		$msg = 'Пожалуйста, заполните все поля';
	}
}

?>
<?php include 'header.php' ?>
<h4 class="text-center">Регистрация на курс</h4>
<b style="color: red;"><?= $msg; ?></b>
<form method="post">
    <div class="form-group">
        <label for="coursename">ФИО</label>
        <input type="text" class="form-control" id="fio" placeholder="ФИО" name="fio"
               value="<?= $form->getFio(); ?>">
    </div>
    <div class="form-group">
        <label for="courseduration">Паспортные данные</label>
        <input type="text" class="form-control" id="passportdata"
               placeholder="Паспортные данные" name="passportdata" value="<?= $form->getPassportdata() ?>">
    </div>
    <div class="form-group">
        <label for="course">Курс</label>
        <select class="form-control" id="course" name="course">
			<?php
			$db  = new DB( $host, $user, $password, $db_name );
			$res = $db->query( "SELECT * FROM `course`" );
			foreach ( $res as $reitem ) {
				?>
                <option value="<?php echo $reitem["idcourse"]; ?>"><?php echo $reitem["coursename"]; ?></option>
			<?php }
			?>

        </select>
    </div>

    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="index.php" class="btn btn-primary">Отмена</a>

</form>
<?php include 'footer.php' ?>
