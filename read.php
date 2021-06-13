<html>
<head>
<title>結果表示</title>
<meta charset="utf-8">
</head>
<body>
<table border='1'>
<tr>
    <th>お名前</th>
    <th>メールアドレス</th>
    <th>緊急連絡先</th>
    <th>お住まい</th>
    <th>お車の有無</th>
    <th>希望エリア</th>
    <th>アベレージスコア</th>
    <th>ベストスコア</th>
    <th>要望</th>
</tr>

</body>

</html>

<?php

include("funcs.php");

// ファイルを変数に格納
$filename = 'data/data.csv';

if( ($fp = fopen("data/data.csv","r"))=== false ){
	die("CSVファイル読み込みエラー");
}

while (($array = fgetcsv($fp)) !== FALSE) {
	
	//空行を取り除く
	if(!array_diff($array, array(''))){
		continue;
	}
	
	echo "<tr>";
	for($i = 0; $i < count($array); ++$i ){
		$elem = nl2br($array[$i]);
		$elem = $elem === "" ?  "&nbsp;" : $elem;
		echo("<td>".$elem."</td>");
	}
	echo "</tr>";
	
}
 
fclose($fp);

?>

