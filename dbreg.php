<?php
session_start();
include("funcs.php");
loginCheck();
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
    <h1>データ登録フォーム</h1>
    <form method="post" action="insert.php">
        <p>ファイル名：<input type="text" name="filename" size="60" placeholder="名称を入力してください (例)X市場調査資料、Y社ヒアリングメモ"></p>
        <p>ファイル作成年月：<input type="text" name="filedate" size="60" placeholder="作成年月を「xxxx年yy月」の要領で入力してください (例)2021年6月"></p>
        <p>内容：</P>
        <p><textarea name="content" rows="3" cols="50" placeholder="概要説明を記載してください"></textarea></P>
        <p>タグ1：<input type="text" name="tag1" size="50" placeholder="キーワードを入力してください(if any)"></p>
        <p>タグ2：<input type="text" name="tag2" size="50" placeholder="キーワードを入力してください(if any)"></p>
        <p>タグ3：<input type="text" name="tag3" size="50" placeholder="キーワードを入力してください(if any)"></p>
        <p>保存先：<input type="text" name="filelink" size="50" placeholder="ファイル格納先リンクを貼り付けてください"></p>
        <p>グループ：
        <select name="mcgroup" size="1" id="mcgroup">        
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
        <p>部署：<input type="text" name="dept" size="50" placeholder="部署名を入力してください"></p>
        <p>担当者：<input type="text" name="PIC" size="50" placeholder="氏名を入力してください"></p>
        <p>連絡先：<input type="text" name="email" size="50" placeholder="MCメールアドレスを入力してください"></p>
        <input type="submit" value="登録">
    </form>
    <button type=“button” onclick="location.href='menu.php'">トップに戻る</button>
    <button type=“button” onclick="location.href='list.php'">DBに登録されたデータの閲覧</button>
    <button type=“button” onclick="location.href='dbreg.php'">新規データの登録</button>
    <button type=“button” onclick="location.href='select.php'">過去登録内容の編集</button>
    <button type=“button” onclick="location.href='logout.php'">ログアウト</button>
</body>
</html>