<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<head>
  <title>1週間の配列を表示する例</title>
  <style>
    ul {
      list-style-type: disc; /* 箇条書きのスタイルを黒い点に設定 */
    }
  </style>
</head>
<body>
<ul>
<?php
// 1週間の日付を配列として作成
$daysOfWeek = array('日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日');
?>
<?php
/// 配列をループして日付を表示
echo '<ul>';
foreach ($daysOfWeek as $day) {
echo '<li>' . $day . '</li>';
}
?>

</body>
</html>