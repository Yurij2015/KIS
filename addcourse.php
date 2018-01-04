<?php session_start() ?>
<?php $title = "Добавление курса" ?>
<?php
require_once( 'forms/AddCourseForm.php' );
//require_once ('forms/LoginForm.php');
require_once( 'DB.php' );
require_once( 'Password.php' );
require_once( 'Session.php' );
require_once ('Dbsettings.php');

$msg = '';

$db   = new DB( $host, $user, $password, $db_name );
$form = new AddCourseForm( $_POST );



if ( $_POST ) {
	if ( $form->validate() ) {
		$coursename    = $db->escape( $form->getCourseName() );
		$courseduration = $db->escape( $form->getCourseDuration() );
		$courseinfo = $db->escape( $form->getCourseinfo() );
		$coursecost = $db->escape( $form->getCoursecost() );

		$email = $_SESSION['email'];

		$res = $db->query( "SELECT userrole FROM `user` WHERE email = '{$email}'" );
		$a = $res[0]['userrole'];
		if ( $a != 1 ) {
			$msg = 'У Вас нет прав на добавление курсов!';
			//print_r ($res); проверка
			//echo $a; проверка
		} else {
			$db->query( "INSERT INTO course (coursename, courseduration, courseinfo, coursecost) VALUES ('{$coursename}','{$courseduration}', '{$courseinfo}','{$coursecost}')" );
			header( 'location: index.php?msg=Курс успешно добавлен!' );
		}

	} else {
		$msg = 'Пожалуйста, заполните все поля';
	}
}

?>
<?php include 'header.php' ?>
<h4 class="text-center">Добавление курсов</h4>
<b style="color: red;"><?=$msg; ?></b>
<form method="post">
	<div class="form-group">
		<label for="coursename">Название курса</label>
		<input type="text" class="form-control" id="coursename" placeholder="Название курса" name="coursename"
		       value="<?= $form->getCourseName(); ?>">
	</div>
	<div class="form-group">
		<label for="courseduration">Продолжительность курса</label>
		<input type="text" class="form-control" id="courseduration"
		       placeholder="Продолжительность курса" name="courseduration" value="<?= $form->getCourseDuration() ?>">
	</div>
	<div class="form-group">
		<label for="courseinfo">Информация о курсе</label>
		<input type="text" class="form-control" id="courseinfo" placeholder="Информация о курсе"
		       name="courseinfo" value="<?= $form->getCourseinfo() ?>">
	</div>
	<div class="form-group">
		<label for="coursecost">Стоимость курса</label>
		<input type="text" class="form-control" id="coursecost" placeholder="Стоимость курса" name="coursecost" value="<?= $form->getCoursecost() ?>">
	</div>

	<button type="submit" class="btn btn-primary">Сохранить</button>
	<a href="index.php" class="btn btn-primary">Отмена</a>

</form>
<?php include 'footer.php' ?>
