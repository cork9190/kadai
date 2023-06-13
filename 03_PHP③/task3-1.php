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
// 商品と価格の連想配列の作成
$products = array(
  '鉛筆' => 100,
  '消しゴム' => 200
);

// 表示用の配列を初期化
$tableData = array();

// 商品情報をループで処理
foreach ($products as $productName => $price) {
  // 税込価格の計算
  $taxIncludedPrice = $price * 1.1;

  // 1Dz（12個）の価格の計算
  $dozenPrice = $taxIncludedPrice * 12;

  // 表示用の行データを作成
  $row = array(
    '商品' => $productName,
    '価格' => $price,
    '税込価格' => $taxIncludedPrice,
    '1Dzの価格' => $dozenPrice
  );

  // 表示用の配列に行データを追加
  $tableData[] = $row;
}
?>

<style>
  table {
    border-collapse: collapse;
    width: 50%;
  }

  th, td {
    border: 1px solid black;
    padding: 5px;
    text-align: center;
  }
</style>

<table>
  <tr>
    <th>商品</th>
    <th>価格</th>
    <th>税込価格</th>
    <th>1Dzの価格</th>
  </tr>
  <?php foreach ($tableData as $row): ?>
    <tr>
      <td><?php echo $row['商品']; ?></td>
      <td><?php echo $row['価格']; ?>円</td>
      <td><?php echo $row['税込価格']; ?>円</td>
      <td><?php echo $row['1Dzの価格']; ?>円</td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>
