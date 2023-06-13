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

// 定数を文字列として作成
define('TAX', '現在、消費税は10%です。');

// 変数を文字列として作成
$pencil = '鉛筆が100円で税込110円です。';

// 変数を文字列として作成
$eraser = '消しゴムが200円で税込220円です。';
?>

<p><?= TAX; ?></p>
<p><?= $pencil; ?></p>
<p><?= $eraser; ?></p>


</body>
</html>