<?php
session_start();
require_once 'Session.php';
?>
<?php $title = "Список регистраций на курсы" ?>
<?php
require_once ('Dbsettings.php');

include_once( 'DB.php' );
$db = new DB( $host, $user, $password, $db_name );
?>
<?php include 'header.php' ?>
<?= isset( $_GET['msg'] ) ? $_GET['msg'] : ''; ?>
<h5 align="center">Список записей на курсы</h5>
<table class="table">
    <thead>
    <tr>
        <th scope="col" class="text-center">ФИО</th>
        <th scope="col" class="text-center">Паспортные данные</th>
        <th scope="col" class="text-center">Курс</th>
    </tr>
    </thead>
    <tbody>
	<?php
	try {
	$db  = new DB( $host, $user, $password, $db_name );
	$res = $db->query( "SELECT fio, passportdata, regoncourse.course, course.coursename as course FROM regoncourse, course WHERE regoncourse.course=course.idcourse" );
	foreach ( $res as $reitem ) {
		?>
        <tr>
            <td><?php echo $reitem["fio"]; ?></td>
            <td><?php echo $reitem["passportdata"]; ?></td>
            <td><?php echo $reitem["course"]; ?></td>
        </tr>
	<?php }
	?>

    </tbody>
</table>
<?php

} catch
( Exception $e ) {
	echo $e->getMessage() . ':(';
}

?>
<?php include 'footer.php' ?>
