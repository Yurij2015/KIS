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
		$coursename     = $db->escape( $form->getCourseName() );
		$courseduration = $db->escape( $form->getCourseDuration() );
		$courseinfo     = $db->escape( $form->getCourseinfo() );
		$coursecost     = $db->escape( $form->getCoursecost() );

		$email = $_SESSION['email'];

		$res = $db->query( "SELECT userrole FROM `user` WHERE email = '{$email}'" );
		$a   = $res[0]['userrole'];

		$idcourse = $_GET['idcourse'];

		if ( $a != 1 ) {
			$msg = 'У Вас нет прав на добавление курсов!';
			//print_r ($res); проверка
			//echo $a; проверка
		} else {
			$db->query( "UPDATE `course` SET coursename = '{$coursename}', courseduration = '{$courseduration}', courseinfo = '{$courseinfo}', coursecost='{$coursecost}' WHERE idcourse={$idcourse} LIMIT 1" );
			header( 'location: index.php?msg=Курс успешно обновлен!' );
		}

	} else {
		$msg = 'Пожалуйста, заполните все поля';
	}
}

?>
<?php include 'header.php' ?>
<h4 class="text-center">Добавление курсов</h4>
<b style="color: red;"><?= $msg; ?></b>
<?php
$idcourse = $_GET['idcourse'];
$db  = new DB( $host, $user, $password, $db_name );
$res = $db->query( "SELECT * FROM course WHERE idcourse={$idcourse}" );
foreach ( $res as $reitem ) {
	?>

    <form method="post">
        <div class="form-group">
            <label for="coursename">Название курса</label>
            <input type="text" class="form-control" id="coursename" placeholder="Название курса" name="coursename"
                   value="<?php echo $reitem["coursename"]; ?>">
        </div>
        <div class="form-group">
            <label for="courseduration">Продолжительность курса</label>
            <input type="text" class="form-control" id="courseduration"
                   placeholder="Продолжительность курса" name="courseduration"
                   value="<?php echo $reitem["courseduration"]; ?>">
        </div>
        <div class="form-group">
            <label for="courseinfo">Информация о курсе</label>
            <input type="text" class="form-control" id="courseinfo" placeholder="Информация о курсе"
                   name="courseinfo" value="<?php echo $reitem["courseinfo"]; ?>">
        </div>
        <div class="form-group">
            <label for="coursecost">Стоимость курса</label>
            <input type="text" class="form-control" id="coursecost" placeholder="Стоимость курса" name="coursecost"
                   value="<?php echo $reitem["coursecost"]; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Обновить</button>
        <a href="index.php" class="btn btn-primary">Отмена</a>

    </form>

<?php }
?>

<?php include 'footer.php' ?>
