<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
$days_of_week = ["月曜日", "火曜日", "水曜日", "木曜日", "金曜日", "土曜日", "日曜日"];
$count = 0;

echo "<ul>\n"; // リストの開始タグ

while ($count < count($days_of_week)) {
    echo "<li>" . $days_of_week[$count] . "</li>\n"; // 箇条書きアイテムの表示
    $count++;
}

echo "</ul>"; // リストの終了タグ
?>

</body>
</html>