<?php

/**
 * Файл login.php для не авторизованного пользователя выводит форму логина.
 * При отправке формы проверяет логин/пароль и создает сессию,
 * записывает в нее логин и id пользователя.
 * После авторизации пользователь перенаправляется на главную страницу
 * для изменения ранее введенных данных.
 **/

// Отправляем браузеру правильную кодировку,
// файл login.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// Начинаем сессию.
session_start();

// В суперглобальном массиве $_SESSION хранятся переменные сессии.
// Будем сохранять туда логин после успешной авторизации.
if (!empty($_SESSION['login'])) {
    header('Location: ./');
}

if (isset($_COOKIE['problem'])){
    echo '<div class="jumbotron w-25 p-3 mx-auto my-2">Wrong LOGIN or PASSWORD</div>';
    setcookie('problem', '', 100000);
}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    ?>		

<html>
<head>
	<title>Web-5</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style type="text/css">
	a {
	   text-decoration: none;
	   color: white;}
	 a:hover {
	 text-decoration: none; 
	 color: white;
	 }
	</style>
</head>
<body class="bg-success">
	<div class="jumbotron w-25 mx-auto my-5 py-2">
		<div class="my-2">
			<label>Login in</label>
		</div>
		<div>
			<form action="" method="post">
				<div class="my-3">
					<label>Login:</label>
					<input type="text" class="form-control" name="login" value="">	
				</div>
				<div class="my-3">
					<label>Password:</label>
					<input name="pass" class="form-control" />	
				</div>
  				<button type="submit" class="btn btn-success">Enter</button>
			</form>
		</div>
		<button class="btn btn-primary"><a href="http://u16342.kubsu-dev.ru/BackEnd6">Back</a></button>
		<button class="btn btn-primary"><a href="http://u16342.kubsu-dev.ru/BackEnd6/admin.php">Log like admin</a></button>
	</div>
</body>
</html>

<?php
}
// Иначе, если запрос был методом POST, т.е. нужно сделать авторизацию с записью логина в сессию.
else {
    $errors=false;
    if (!preg_match("/^[a-zA-Z0-9_\-.]+@{1}[a-zA-Z0-9.-]+\z/", $_POST['login']) or !ctype_digit($_POST['pass'])){
        $errors = TRUE;
    }
    $user = 'u16342';
    $pass = '7387652';
    $db = new PDO('mysql:host=localhost;dbname=u16342', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    if (!$errors){
        try {
            $stmt = $db->prepare("SELECT COUNT(*) as KOLVO FROM formOne WHERE EMAIL=:name AND PASS=:upass");   //добавление в базу данные
            $stmt -> execute(array('name'=>$_POST['login'], 'upass'=>md5($_POST['pass'])));
            $kolvo=$stmt->fetchColumn();    //узнаем кол-во подходящих логин-пароль
        }
        catch(PDOException $e){
            print('Error : ' . $e->getMessage());
            exit();
        }
    }
    if ($kolvo==1 and !$errors){
        // Если все ок, то авторизуем пользователя.
        $_SESSION['login'] = $_POST['login'];
        // Записываем ID пользователя.
        $_SESSION['pass'] = $_POST['pass'];
    } else {
        session_destroy();
        setcookie('problem', '1');
        header('Location: ./login.php');
        exit();
    }
    
    header('Location: ./');
}
