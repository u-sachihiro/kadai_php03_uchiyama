<?php
require_once('funcs.php');
// loginCheck();

// GETでidを取得(URLの後ろについているデータ)

$id = $_GET["id"];


// DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=kadai02;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}


// SELECT * FROM gs_an_table WHERE id=:id;
$sql = "SELECT * FROM kadai02_a_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


// データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  // 1データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();
  //$row["id"], $row["name"]...
}

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
    <h1>社内データ登録フォーム</h1>
    <form method="post" action="update.php">
        <p>ファイル名：<input type="text" name="filename" size="50" value=<?=$row["filename"];?>></p>
        <p>ファイル作成年月：<input type="text" name="filedate" size="60" value=<?=$row["filedate"];?>></p>
        <p>内容：</P>
        <p><textarea name="content" rows="3" cols="50" value=<?=$row["content"];?>></textarea></P>
        <p>タグ1：<input type="text" name="tag1" size="50" value=<?=$row["tag1"];?>></p>
        <p>タグ2：<input type="text" name="tag2" size="50" value=<?=$row["tag2"];?>></p>
        <p>タグ3：<input type="text" name="tag3" size="50" value=<?=$row["tag3"];?>></p>
        <p>グループ：
        <select name="mcgroup" size="1" id="mcgroup"><?=$row["mcgroup"];?>
        <option value="未選択">所属Gを選択してください</option>
        <option value="コーポレート">コーポレート</option>
        <option value="天然ガスグループ">天然ガスグループ</option>
        <option value="総合素材グループ">総合素材グループ</option>
        <option value="石油・化学ソリューショングループ">石油・化学ソリューショングループ</option>
        <option value="金属資源グループ">金属資源グループ</option>
        <option value="産業インフラグループ">産業インフラグループ</option>
        <option value="自動車・モビリティグループ">自動車・モビリティグループ</option>
        <option value="食品産業グループ">食品産業グループ</option>
        <option value="コンシューマー産業グループ">コンシューマー産業グループ</option>
        <option value="電力ソリューショングループ">電力ソリューショングループ</option>
        <option value="複合都市開発グループ">複合都市開発グループ</option>
        </select>
        </p>
        <p>部署：<input type="text" name="dept" size="50" value=<?=$row["dept"];?>></p>
        <p>担当者：<input type="text" name="PIC" size="50" value=<?=$row["PIC"];?>></p>
        <p>連絡先：<input type="text" name="email" size="50" value=<?=$row["email"];?>></p>
        <input type="hidden" name="id" value="<?=$row["id"]?>">
        <p><input type="submit" value="更新"></p>
    </form>

    <button type=“button” onclick="location.href='select.php'">戻る</button>
    <button type=“button” onclick="location.href='menu.php'">トップに戻る</button>
    <button type=“button” onclick="location.href='list.php'">DBに登録されたデータの閲覧</button>
    <button type=“button” onclick="location.href='dbreg.php'">新規データの登録</button>

</body>
</html>




