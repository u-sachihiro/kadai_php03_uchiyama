
<?php

include("funcs.php");

// POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$live = $_POST["live"];
$car = $_POST["car"];
$venue = $_POST["venue1"];
$venue = $_POST["venue2"];
$venue = $_POST["venue3"];
$avg = $_POST["avg"];
$best = $_POST["best"];
$request = $_POST["request"];


// 申込時間取得
$date = date("Y年m月d日");


// ファイルを読み込む
$file = fopen("data/data.csv","a");
// ファイルに書き込む
fwrite($file,$date." ".$name." ".$email." ".$tel." ".$live." ".$car." ".$venue1."".$venue2."".$venue3." ".$avg." ".$best." ".$request."\n");
// ファイルを閉じる
fclose($file);

// // read.phpにリダイレクト
// header("Location: read.php");
// exit();

?>

<html>
<head>
<meta charset="utf-8">
</head>

<body>
<p>ご回答ありがとうございました。</P>
<p>以下の内容で送信致しました。</p>

<dl>
<dt>お名前：</dt>
<dd><?=h($name);?></dd>
<dt>メールアドレス：</dt>
<dd><?=h($email);?></dd>
<dt>緊急連絡先：</dt>
<dd><?=h($tel);?></dd>
<dt>お住まい：</dt>
<dd><?=h($live);?></dd>
<dt>お車の有無：</dt>
<dd><?=h($car);?></dd>
<dt>希望エリア：</dt>
<dd><?=h($venue1);?></dd>
<dd><?=h($venue2);?></dd>
<dd><?=h($venue3);?></dd>
<dt>アベレージスコア：</dt>
<dd><?=h($avg);?></dd>
<dt>ベストスコア：</dt>
<dd><?=h($best);?></dd>
<dt>要望：</dt>
<dd><?=h($request);?></dd>
</dl>


</body>
</html>

