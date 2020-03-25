<?php
header('Content-Type: text/html; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!empty($_GET['save'])) {
        print("<script language=javascript>window.alert('Спасибо, результаты сохранены');</script>");
    }
    include('form.php');
    exit();
}

include('form.php');
$errors = FALSE;
if (empty($_POST['Name'])) {
    print("<script language=javascript>window.alert('Enter Name');</script>");
    $errors = TRUE;
}
if (empty($_POST['Email'])) {
    print("<script language=javascript>window.alert('Enter Email');</script>");
    $errors = TRUE;
}
if (empty($_POST['BG'])) {
    print("<script language=javascript>window.alert('Enter Biografy');</script>");
    $errors = TRUE;
}
if (count($_POST['SP'])==0) {
    print("<script language=javascript>window.alert('Enter SuperPowers');</script>");
    $errors = TRUE;
}
if (empty($_POST['DD']) or empty($_POST['DM']) or empty($_POST['DY']) or !ctype_digit($_POST['DD']) or !ctype_digit($_POST['DM']) or !ctype_digit($_POST['DY'])) {
    print("<script language=javascript>window.alert('Enter correct Date of Birth');</script>");
    $errors = TRUE;
}
if(isset($_POST['CH']) &&
    $_POST['CH'] == 'Yes')
{
    $ch='OZNACOMLEN';
}
else
{
    print("<script language=javascript>window.alert('Сheck the checkbox');</script>");
    $errors = TRUE;
}
if($errors) { exit();};


$sp='';

for($i=0;$i<count($_POST['SP']);$i++){
    $sp .= $_POST['SP'][$i] . '  ';
}
$user = 'u16342';
$pass = '7387652';
$db = new PDO('mysql:host=localhost;dbname=u16342', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

try {
    $stmt = $db->prepare("INSERT INTO formOne (NAME,EMAIL,YEAR,SEX,Nol,SUPERPOWERS,BIO,CHECKBOX) VALUES (:NAME,:EMAIL,:YEAR,:SEX,:NoL,:SUPERPOWERS,:BIO,:CHECKBOX)");   //добавление в базу данные
    $stmt -> execute(array('NAME'=>$_POST['Name'], 'EMAIL'=>$_POST['Email'],'YEAR'=>$_POST['DY'],'SEX'=>$_POST['Rad'],'NoL'=>$_POST['Limbs'], 'SUPERPOWERS'=>$sp, 'BIO'=>$_POST['BG'], 'CHECKBOX'=>$ch));
}
catch(PDOException $e){
    print('Error : ' . $e->getMessage());
    exit();
}
?>