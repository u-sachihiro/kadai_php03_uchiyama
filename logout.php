<?php
session_start();

//SESSION初期化(空っぽにする)
$_SESSION = array();

//Cookieに保存してあるSessionIDの保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) { //session_name()は、セッションID名を返す関数
    setcookie(session_name(),'',time()-42000,'/');
}

//サーバ側でのセッションIDの破棄
session_destroy();

header("Location: login.php");
exit();

?>