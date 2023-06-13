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
echo "<h1>九九の計算</h1>";
echo "<table>";

for ($i = 1; $i <= 9; $i++) {
  echo "<tr>";
  for ($j = 1; $j <= 9; $j++) {
      $result = $i * $j;
      echo "<td>{$i} × {$j} = {$result}</td>";
        echo "<td style='width: 5px;'>&nbsp;</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>