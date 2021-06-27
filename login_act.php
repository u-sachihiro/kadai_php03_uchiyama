<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];


// DB接続
try {
    $pdo = new PDO('mysql:dbname=kadai02;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }



// データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai03_user_table WHERE u_id=:lid AND u_pw=:lpw");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 実行
$status = $stmt->execute();
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
}

// 抽出データ数を取得
$val = $stmt->fetch(); // 1レコードだけ取得する方法

// 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["u_name"] = $val['u_name'];
    // Login処理OKの場合select.phpへ遷移
    header("Location: select.php");
}else{
    // Login処理NGの場合login.phpへ遷移
    header("Location: login.php");
}
// 処理終了
exit();
?>
