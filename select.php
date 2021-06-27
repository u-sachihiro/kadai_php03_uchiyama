<?php
session_start();
//funcs.phpを読み込む
require_once('funcs.php');
loginCheck();

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai02;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM kadai02_a_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示

$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= '<a href="u_view.php?id='.$result["id"].'">';
    $view .= h($result["indate"]).":".h($result["filename"]).":".h($result["filedate"]).":".h($result["dept"]).":".h($result["PIC"]);
    $view .= '</a>';
    $view .= '　';
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= '[削除]';
    $view .= '</a>';
    $view .= "</p>";
  }
}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <button type=“button” onclick="location.href='menu.php'">トップに戻る</button>
      <button type=“button” onclick="location.href='list.php'">DBに登録されたデータの閲覧</button>
      <button type=“button” onclick="location.href='dbreg.php'">新規データの登録</button>
      <button type=“button” onclick="location.href='select.php'">過去登録内容の編集</button>
      <button type=“button” onclick="location.href='logout.php'">ログアウト</button>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>




