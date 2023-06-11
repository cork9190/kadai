<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<head>
</head>
<body>
<?php
// 商品情報の連想配列の作成
$products = array(
  '鉛筆' => array(
    '価格' => 100,
    '税込価格' => 110
  ),
  '消しゴム' => array(
    '価格' => 200,
    '税込価格' => 220
  ),
  '定規' => array(
    '価格' => 300,
    '税込価格' => 330
  )
);
?>

<style>
  table {
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
  }
</style>


<table>
  <tr>
    <th>商品名</th>
    <th>価格</th>
    <th>税込価格</th>
  </tr>
  <?php foreach ($products as $productName => $productInfo): ?>
    <tr>
      <td><?php echo $productName; ?></td>
      <td><?php echo $productInfo['価格']; ?>円</td>
      <td><?php echo $productInfo['税込価格']; ?>円</td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>