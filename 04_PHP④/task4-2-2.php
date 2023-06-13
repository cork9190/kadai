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
  $randomNumber = mt_rand(1, 12);
  $season = '';

  if ($randomNumber >= 3 && $randomNumber <= 5) {
    $season = '春';
} elseif ($randomNumber >= 6 && $randomNumber <= 8) {
    $season = '夏';
} elseif ($randomNumber >= 9 && $randomNumber <= 11) {
    $season = '秋';
} else {
    $season = '冬';
}
  echo "<h1>{$randomNumber}月は{$season}です。</h1>";
  ?>
</body>
</html>