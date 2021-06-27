<?php

include("funcs.php");


// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ

$filename = $_POST["filename"];
$filedate = $_POST["filedate"];
$content = $_POST["content"];
$tag1 = $_POST["tag1"];
$tag2 = $_POST["tag2"];
$tag3 = $_POST["tag3"];
$filelink = $_POST["filelink"];
$mcgroup = $_POST["mcgroup"];
$dept = $_POST["dept"];
$PIC = $_POST["PIC"];
$email = $_POST["email"];


// 2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai02;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO kadai02_a_table ( id, filename, filedate, content, tag1, tag2, tag3, filelink, mcgroup, dept, PIC, email, indate )
  VALUES( NULL, :filename, :filedate, :content, :tag1, :tag2, :tag3, :filelink, :mcgroup, :dept, :PIC, :email, sysdate() )"
);

// 4. バインド変数を用意
$stmt->bindValue(':filename', $filename, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':filedate', $filedate, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tag1', $tag1, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tag2', $tag2, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':tag3', $tag3, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':filelink', $filelink, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':mcgroup', $mcgroup, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':dept', $dept, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':PIC', $PIC, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
//   header('Location: index.php');
}
?>


<html>
<head>
<meta charset="utf-8">
</head>

<body>
<p>ご登録ありがとうございました。</P>
<p>以下の内容で送信致しました。</p>

<dl>
<dt>ファイル名：</dt>
<dd><?=h($filename);?></dd>
<dt>ファイル作成年月：</dt>
<dd><?=h($filedate);?></dd>
<dt>内容：</dt>
<dd><?=h($content);?></dd>
<dt>タグ1：</dt>
<dd><?=h($tag1);?></dd>
<dt>タグ2：</dt>
<dd><?=h($tag2);?></dd>
<dt>タグ3：</dt>
<dd><?=h($tag3);?></dd>
<dt>保存先：</dt>
<dd><?=h($filelink);?></dd>
<dt>グループ：</dt>
<dd><?=h($mcgroup);?></dd>
<dt>部署：</dt>
<dd><?=h($dept);?></dd>
<dt>担当者：</dt>
<dd><?=h($PIC);?></dd>
<dt>連絡先：</dt>
<dd><?=h($email);?></dd>
</dl>

<button type=“button” onclick="location.href='index.php'">トップに戻る</button>
<button type=“button” onclick="location.href='list.php'">DBを閲覧</button>
    <button type=“button” onclick="location.href='select.php'">過去の登録内容を編集</button>


</body>
</html>
