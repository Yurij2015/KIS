<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
    <!-- TinyMCE -->
    <script type="text/javascript">
        tinyMCE.init({
            selector: "#doccontent",
            language: 'ru',
            plugins : 'advlist autolink link image lists charmap print preview'

        });
    </script>
    <title><?php echo $title ?></title>

</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #072466;">
        <a class="navbar-brand" href="../index.php">CorporateSystem</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <!--                <li class="nav-item">-->
                <!--                    <a class="nav-link" href="register.php"> Регистрация <span class="sr-only">(current)</span></a>-->
                <!--                </li>-->
                <li class="nav-item">
					<?php if ( ! Session::has( 'email' ) ) { ?>
                        <a class="nav-link" href="/register.php">Регистрация <span class="sr-only">(current)</span></a>
					<?php } ?>
                </li>

                <li class="nav-item">
					<?php if ( Session::has( 'email' ) ) : ?>
                        <a class="nav-link" href="/logout.php">Выйти (<?= Session::get( 'email' ); ?>)</a>
					<?php else : ?>
                        <a class="nav-link" href="/login.php">Войти</a>
					<?php endif; ?>
                </li>

<!--				--><?php
//				$email = $_SESSION['email'];
//				$res   = $db->query( "SELECT userrole FROM `user` WHERE email = '{$email}'" );
//				$a     = $res[0]['userrole'];
//
//				if ( $a == 1 ) {
//					echo '<li class="nav-item">';
//					echo '<a class="nav-link" href="addcourse.php"> Добавить курс</a>';
//					echo '</li>';
//					echo '<li class="nav-item">';
//					echo '<a class="nav-link" href="listregoncourse.php"> Записи на курс</a>';
//					echo '</li>';
//				}
//				?>

<!--				--><?php
//				$email = $_SESSION['email'];
//				$res   = $db->query( "SELECT userrole FROM `user` WHERE email = '{$email}'" );
//				if ( $res ) {
//					echo '<li class="nav-item">';
//					echo '<a class="nav-link" href="regoncourse.php"> Регистрация на курс</a>';
//					echo '</li>';
//				}
//				?>


            </ul>
<!--            <span class="navbar-text">Корпоративная информационная система</span>-->
        </div>
    </nav>
