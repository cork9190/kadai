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

// 消費税率
$taxRate = 0.1;

// 商品の情報
$product1Name = "鉛筆";
$product1Price = 100;
$product1TaxInclusivePrice = $product1Price * (1 + $taxRate);

$product2Name = "消しゴム";
$product2Price = 200;
$product2TaxInclusivePrice = $product2Price * (1 + $taxRate);
?>

<p>現在、消費税は10%です。</p>
<p><?= $product1Name; ?>が<?= $product1Price; ?> 円で税込<?= $product1TaxInclusivePrice; ?> 円です。</p>
<p><?= $product2Name; ?>が<?= $product2Price; ?>円で税込<?= $product2TaxInclusivePrice; ?> 円です。</p>


</body>
</html>