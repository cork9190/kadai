<?php
require_once('common.php');

$id = $_GET['id'];
$syain = $db->getSyainById($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // フォームから更新情報を取得
  $id = $_POST['id'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $work = $_POST['work'];

  // データベースの社員情報を更新
  $db->updateSyain($id, $name, $age, $work);

  // インデックスページへリダイレクト
  header("Location: index.php");
  exit;
}

// 社員情報更新のためのフォームを表示
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社員情報の更新</title>
</head>
<body>
  <h1>社員情報の更新</h1>
  <form action="syain_update.php?id=<?php echo $id; ?>" method="post">
    
    <p>社員番号</p>
    <input type="text" name="id" value="<?php echo $syain["id"]; ?>">

    <!-- 名前の入力欄。既存の値がデフォルトとして入力される -->
    <p>名前</p>
    <input type="text" name="name" value="<?php echo $syain["name"]; ?>">

    <!-- 年齢の入力欄。既存の値がデフォルトとして入力される -->
    <p>年齢</p>
    <input type="number" name="age" value="<?php echo $syain["age"]; ?>">

    <!-- 労働形態の入力欄。既存の値がデフォルトとして入力される -->
    <p>労働形態</p>
    <input type="text" name="work" value="<?php echo $syain["work"]; ?>">

    <!-- 更新ボタン -->
    <p><button type="submit">更新</button></p>
  </form>
  <!-- 戻るリンク -->
  <a href="index.php">戻る</a>
</body>
</html>

