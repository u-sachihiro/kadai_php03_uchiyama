<?php

//funcs.phpを読み込む
require_once('funcs.php');


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

echo "<table>\n";
echo "\t<tr>
            <th>id</th>
            <th>filename</th>
            <th>filedate</th>
            <th>content</th>
            <th>tag1</th>
            <th>tag2</th>
            <th>tag3</th>
            <th>filelink</th>
            <th>mcgroup</th>
            <th>dept</th>
            <th>PIC</th>
            <th>email</th>
        </tr>\n";

// 「$stmt」からデータを取り出し、変数「$result」に代入。
// 「PDO::FETCH_ASSOC」を指定した場合、カラム名をキーとする連想配列として「$result」に格納される。
$view="";
while( $result = $stmt->fetch( PDO::FETCH_ASSOC ) ){
    echo "\t<tr>\n";
    echo "\t\t<td>{$result['id']}</td>\n";
    echo "\t\t<td>{$result['filename']}</td>\n";
    echo "\t\t<td>{$result['filedate']}</td>\n";
    echo "\t\t<td>{$result['content']}</td>\n";
    echo "\t\t<td>{$result['tag1']}</td>\n";
    echo "\t\t<td>{$result['tag2']}</td>\n";
    echo "\t\t<td>{$result['tag3']}</td>\n";
    echo "\t\t<td>{$result['filelink']}</td>\n";
    echo "\t\t<td>{$result['mcgroup']}</td>\n";
    echo "\t\t<td>{$result['dept']}</td>\n";
    echo "\t\t<td>{$result['PIC']}</td>\n";
    echo "\t\t<td>{$result['email']}</td>\n";
    echo "\t</tr>\n";

}
echo "</table>\n";

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
      <a class="navbar-brand" href="index.php">トップへ</a>
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