<?php

require_once('funcs.php');


// POSTで値を取得
$id = $_POST["id"];
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


// DB接続
try {
    $pdo = new PDO('mysql:dbname=kadai02;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

// UPDATE gs_an_table SET ....;で更新(bindValue)
$sql = 'UPDATE kadai02_a_table SET 
    filename = :filename, 
    filedate = :filedate, 
    content = :content, 
    tag1 = :tag1,
    tag2 = :tag2, 
    tag3 = :tag3,
    filelink = :filelink,
    mcgroup = :mcgroup,
    dept = :dept,
    PIC = :PIC,
    email = :email 
    WHERE id=:id'
;

$stmt = $pdo->prepare($sql);
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
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


// データ登録処理後
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  // select.phpへリダイレクト
  header("Location: select.php");
}

?>