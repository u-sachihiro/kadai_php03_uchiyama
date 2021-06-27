<?php
include("funcs.php");
header("Location: login.php");

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>データベース</title>
</head>
<body>
    <h1>社内データベース</h1>
    <button type=“button” onclick="location.href='list.php'">DBに登録されたデータの閲覧</button>
    <button type=“button” onclick="location.href='dbreg.php'">新規データの登録</button>
    <button type=“button” onclick="location.href='select.php'">過去登録内容の編集</button>
    <button type=“button” onclick="location.href='logout.php'">ログアウト</button>
</body>
</html>

