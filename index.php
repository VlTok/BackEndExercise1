<?php
header('Content-Type: text/html; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    $messages = array();
    
    if (!empty($_COOKIE['save'])) {
       
        $secret = array();
        if (isset($_COOKIE['login'])){
            $secret['log']=$_COOKIE['login'];
            $secret['pas']=$_COOKIE['pass'];
        }
        setcookie('save', '', 100000);
        setcookie('login', '', 100000);
        setcookie('pass', '', 100000);
        
        echo '<div class="jumbotron w-25 p-3 mx-auto my-2 bg-success">Saved</div>';
        
        if (!empty($_COOKIE['pass'])) {
            echo '<div class="jumbotron w-25 p-3 mx-auto my-2 bg-success">Login: ',$secret['log'],'</div>';
            echo '<div class="jumbotron w-25 p-3 mx-auto my-2 bg-success">Password: ',$secret['pas'],'</div>';
        }
    }
    $errors = array();
    $errors['Name'] = !empty($_COOKIE['Name_error']);
    $errors['Email'] = !empty($_COOKIE['Email_error']);
    $errors['DD'] = !empty($_COOKIE['DD_error']);
    $errors['DM'] = !empty($_COOKIE['DM_error']);
    $errors['DY'] = !empty($_COOKIE['DY_error']);
    $errors['SP'] = !empty($_COOKIE['SP_error']);
    $errors['BG'] = !empty($_COOKIE['BG_error']);
    $errors['CH'] = !empty($_COOKIE['CH_error']);
    
    // Выдаем сообщения об ошибках.
    if ($errors['Name']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('Name_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter NAME</div>';
    }
    $values = array();
    $values['Name'] = empty($_COOKIE['Name_value']) ? '' : $_COOKIE['Name_value'];
    
    if ($errors['Email']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('Email_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter email.</div>';
    }
    $values['Email'] = empty($_COOKIE['Email_value']) ? '' : $_COOKIE['Email_value'];
    
    if ($errors['BG']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('BG_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter day.</div>';
    }
    $values['BG'] = empty($_COOKIE['BG_value']) ? '' : $_COOKIE['BG_value'];
    
    if ($errors['DD']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('DD_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter day.</div>';
    }
    $values['DD'] = empty($_COOKIE['DD_value']) ? '' : $_COOKIE['DD_value'];
    
    if ($errors['DM']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('DM_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter month.</div>';
    }
    $values['DM'] = empty($_COOKIE['DM_value']) ? '' : $_COOKIE['DM_value'];
    
    if ($errors['DY']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('DY_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter year.</div>';
    }
    $values['DY'] = empty($_COOKIE['DY_value']) ? '' : $_COOKIE['DY_value'];
    
    if ($errors['SP']){
        setcookie('SP_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter superpower.</div>';
    }
    $values['SP']=array();
    if (key_exists("SP_value",$_COOKIE)) $values['SP'] = unserialize($_COOKIE['SP_value'], ["allowed_classes" => false]);
    
    if ($errors['BG']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('BG_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter biography.</div>';
    }
    $values['BG'] = empty($_COOKIE['BG_value']) ? '' : $_COOKIE['BG_value'];
    
    if ($errors['CH']) {
        setcookie('CH_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Enter contract.</div>';
    }
    $values['CH'] = empty($_COOKIE['CH_value']) ? '' : $_COOKIE['CH_value'];
    
    if (key_exists("PO_value",$_COOKIE)) $values['PO'] = $_COOKIE['PO_value']; else $values['PO'] = "MALE";
    if (key_exists("LI_value",$_COOKIE)) $values['LI'] = $_COOKIE['LI_value']; else $values['LI'] = "0";
    
    if (!empty($_COOKIE[session_name()]) && session_start() && !empty($_SESSION['login'])) {
        $user = 'u16342';
        $pass = '7387652';
        $db = new PDO('mysql:host=localhost;dbname=u16342', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
        
        try {
            $stmt = $db->prepare("SELECT NAME FROM formOne WHERE NAME=:name AND PASS=:upass");   //добавление в базу данные
            $stmt -> execute(array('name'=>$_SESSION['login'], 'upass'=>md5($_SESSION['pass'])));
            $base=$stmt->fetch();
            print_r($base);
            $values['SP'] = array();
            $values['Name'] = $base['NAME'];
            $values['Email'] = $base['EMAIL'];
            $values['DD'] = $base['DAY'];
            $values['DM'] = $base['MONTH'];
            $values['DY'] = $base['YEAR'];
            $values['BG'] = $base['BIO'];
            $values['PO'] = $base['SEX'];
            $values['LI'] = $base['NoL'];
        }
        catch(PDOException $e){
            print('Error : ' . $e->getMessage());
            exit();
        }
    }
    include('form.php');
}
else {
    if($_POST['requestMe']=='LO') {
        session_start();
        $_SESSION=array();
        session_destroy();
        header('Location: index.php');
        exit();
    }
    if($_POST['requestMe']=='LI'){
        header('Location: ./login.php');
        exit();
    }
    
    $errors = FALSE;
    if (empty($_POST['Name'])) {
        setcookie('Name_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    } else
        if (!ctype_alpha($_POST['Name'])) {
            setcookie('Name_error', '2', time() + 24 * 60 * 60);
            $errors = TRUE;
        }
    else {
        setcookie('Name_value', $_POST['Name'], time() + 30 * 24 * 60 * 60);
    }
    if (empty($_POST['Email'])) {
        setcookie('Email_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    } else if (!preg_match("/^[a-zA-Z0-9_\-.]+@[a-z]/", $_POST['Email'])){
        setcookie('Email_error', '2', time() + 24 * 60 * 60);
        $errors = TRUE;
    } else {
        setcookie('Email_value', $_POST['Email'], time() + 30 * 24 * 60 * 60);
    }
    if (empty($_POST['DD']) or empty($_POST['DM']) or empty($_POST['DY'])) {
        setcookie('DY_error', '1', time() + 24 * 60 * 60);
        setcookie('DM_error', '1', time() + 24 * 60 * 60);
        setcookie('DY_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    } else if (!ctype_digit($_POST['DD']) or !ctype_digit($_POST['DM']) or !ctype_digit($_POST['DY']))
    {
        setcookie('DD_error', '2', time() + 24 * 60 * 60);
        setcookie('DM_error', '2', time() + 24 * 60 * 60);
        setcookie('DY_error', '2', time() + 24 * 60 * 60);
        $errors = TRUE;
    } else {
        setcookie('DD_value', $_POST['DD'], time() + 30 * 24 * 60 * 60);
        setcookie('DM_value', $_POST['DM'], time() + 30 * 24 * 60 * 60);
        setcookie('DY_value', $_POST['DY'], time() + 30 * 24 * 60 * 60);
    }
    if (count($_POST['SP'])==0) {
        setcookie('SP_error','1',time() + 24*60*60);
        $errors = TRUE;
    }
    if (empty($_POST['BG'])) {
        setcookie('BG_error','1',time() + 24*60*60);
        $errors = TRUE;
    }
    else{
        setcookie('BG_value', $_POST['BG'], time() + 30 * 24 * 60 * 60);
    }
    if(isset($_POST['CH']) &&
        $_POST['CH'] == 'Yes')
    {
        $ch='OZNACOMLEN';
        setcookie('CH_value', 'checked=""', time() + 30 * 24 * 60 * 60);
    }
    else
    {
        setcookie('CH_value', '', time() + 30 * 24 * 60 * 60);
        setcookie('CH_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    setcookie('PO_value', $_POST['Rad'], time() + 30 * 24 * 60 * 60);
    setcookie('LI_value', $_POST['Limbs'], time() + 30 * 24 * 60 * 60);
    if (count($_POST['SP'])==0) {
        $noo = array();
        setcookie('SP_value', serialize($noo), time() + 30 * 24 * 60 * 60);
    } else {
        setcookie('SP_value', serialize($_POST['SP']), time() + 30 * 24 * 60 * 60);
    }
    
    if($errors) {
        
        header('Location: index.php');
        
        exit();
    }
    else {
        setcookie('Name_error','',100000);
        setcookie('Email_error','',100000);
        setcookie('DD_error','',100000);
        setcookie('DM_error','',100000);
        setcookie('DY_error','',100000);
        setcookie('SP_error','',100000);
        setcookie('BG_error','',100000);
        setcookie('CH_error','',100000);
    }
    $sp='';
    for($i=0;$i<count($_POST['SP']);$i++){
        $sp .= $_POST['SP'][$i] . '  ';
    }
    $user = 'u16342';
    $pass = '7387652';
    $db = new PDO('mysql:host=localhost;dbname=u16342', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    
    try{
        if (!empty($_COOKIE[session_name()])&
            session_start() && !empty($_SESSION['login'])) {
                
                $stmt = $db->prepare("UPDATE formOne SET NAME=:name,DAY=:day,MONTH=:month,YEAR=:year, SEX=:sex, NoL=:nol, SUPERPOWERS=:superpowers, BIO=:bio, CHECKBOX=:checkbox, COMMIT_TIME=FROM_UNIXTIME(:time) WHERE PASS=:upass");   //обновление в базу данные
                $stmt -> execute(array('name'=>$_POST['Name'],'day'=>$_POST['DD'],'month'=>$_POST['DM'],'year'=>$_POST['DY'], 'sex'=>$_POST['Rad'],'superpowers'=>$sp,'nol'=>$_POST['Limbs'],'bio'=>$_POST['BG'],'checkbox'=>$ch, 'upass'=>md5($_SESSION['pass']),'time'=>time()));
                
            }
            else {
                $login = $_POST['Email'];
                $upass = rand(0,10000);
                // Сохраняем в Cookies.
                setcookie('login', $login);
                setcookie('pass', $upass);
                
                $stmt = $db->prepare("INSERT INTO formOne (NAME,EMAIL,PASS,DAY,MONTH,YEAR,SEX,Nol,SUPERPOWERS,BIO,CHECKBOX) VALUES (:NAME,:EMAIL,:PASS,:DAY,:MONTH,:YEAR,:SEX,:NoL,:SUPERPOWERS,:BIO,:CHECKBOX)");   //добавление в базу данные
                $stmt -> execute(array('NAME'=>$_POST['Name'], 'EMAIL'=>$_POST['Email'],'PASS'=>md5($upass),'DAY'=>$_POST['DD'],'MONTH'=>$_POST['DM'],'YEAR'=>$_POST['DY'],'SEX'=>$_POST['Rad'],'NoL'=>$_POST['Limbs'], 'SUPERPOWERS'=>$sp, 'BIO'=>$_POST['BG'], 'CHECKBOX'=>$ch));
                
            }
    }
    catch(PDOException $e){
        print('Error : ' . $e->getMessage());
        exit();
    }
    setcookie('save','1');
    header('Location: ./');
}
?>
