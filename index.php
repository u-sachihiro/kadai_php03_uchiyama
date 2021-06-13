<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アンケート入力</title>
</head>
<body>
    <h1>アンケートフォーム</h1>
    <form method="post" action="result.php">
        <p>お名前：<input type="text" name="name" size="20" placeholder="例）内山祥宏"></p>
        <p>メールアドレス：<input type="text" name="email" size="20" placeholder="例）test@test.com"></p>
        <p>緊急連絡先：<input type="text" name="tel" size="20" placeholder="例）xxx-yyyy-zzzz"></p>
        <p>お住まい：<input type="text" name="live" size="20" placeholder="例）江東区"></p>
        <p>お車の有無：
            <input type="radio" name="car" value="お車あり">あり
            <input type="radio" name="car" value="お車なし">なし
        </p>
        <p>希望エリア（複数選択可）：</P>
        <p>
            <input type="checkbox" name="venue1" value="千葉">千葉<br>
            <input type="checkbox" name="venue2" value="栃木">栃木<br>
            <input type="checkbox" name="venue3" value="神奈川">神奈川<br>
        </p>
        <p>アベレージスコア：<input type="text" name="avg" size="20" placeholder="例）100"></p>
        <p>ベストスコア：<input type="text" name="best" size="20" placeholder="例）92"></p>   
        <p>要望：</P>
        <p><textarea name="request" rows="3" cols="45" placeholder="例）A課長とは別組にして欲しい"></textarea></P>
        <p><input type="submit" value="送信"></p>
    </form>

</body>
</html>

