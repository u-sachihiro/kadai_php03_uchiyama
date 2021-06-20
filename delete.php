<?php
// GETでidを取得
$id = $_GET["id"];


// DB接続
try {
    $pdo = new PDO('mysql:dbname=kadai02;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}


// DELETE FROM gs_an_table WHERE;で削除(bindValue)
$sql = 'DELETE FROM kadai02_a_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
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