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

$db = new DB( $host, $user, $password, $db_name );


if ( $_POST ) {
	$idcourse = $_GET['idcourse'];

	$db->query( "DELETE FROM course WHERE idcourse='{$idcourse}' LIMIT 1" );
	header( 'location: index.php?msg=Курс удален!' );
}

?>
<?php include 'header.php' ?>
<h4 class="text-center">Вы уверены, что хотите удалить эту запись?</h4>
<b style="color: red;"><?= $msg; ?></b>
<?php
$idcourse = $_GET['idcourse'];
$db       = new DB( $host, $user, $password, $db_name );
$res      = $db->query( "SELECT * FROM course WHERE idcourse={$idcourse}" );
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

        <button type="submit" class="btn btn-primary">Удалить</button>
        <a href="index.php" class="btn btn-primary">Отмена</a>

    </form>

<?php }
?>

<?php include 'footer.php' ?>
