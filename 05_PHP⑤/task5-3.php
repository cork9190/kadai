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
  // 商品と価格の連想配列の作成
  $products = array(
    array(
      '商品' => '鉛筆',
      '価格' => 100,
    ),
    array(
      '商品' => '消しゴム',
      '価格' => 200,
    ),
    array(
      '商品' => '定規',
      '価格' => 300,
    )
  );

  // 表示用の配列を初期化
  $tableData = array();

  // 商品情報をループで処理
  foreach ($products as $product) {
    // 税込価格の計算
    $taxIncludedPrice = $product['価格'] * 1.1;

    // 表示用の行データを作成
    $row = array(
      '商品' => $product['商品'],
      '価格' => $product['価格'],
      '税込価格' => $taxIncludedPrice
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
    </tr>
    <?php foreach ($tableData as $row): ?>
      <tr>
        <td><?php echo $row['商品']; ?></td>
        <td><?php echo $row['価格']; ?>円</td>
        <td><?php echo $row['税込価格']; ?>円</td>
      </tr>
    <?php endforeach; ?>
  </table>
  </body>
</html>

