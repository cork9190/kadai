<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    function showString($num, $str) {
    for ($i = 0; $i < $num; $i++) {
    echo $str . "<br>";
    }
    }

    // 関数を使用して「気合いだ！」を3回表示する
    showString(3, "気合いだ！");
    ?>
</body>
</html>