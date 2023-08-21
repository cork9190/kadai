<?php
require_once('common.php'); // 共通ファイルをインクルード

show_top("社員情報の削除"); 

$id = $_GET['id']; // URLのクエリパラメータからIDを取得
$syain = $db->getSyainById($id); // 社員情報を取得

// POSTリクエストの場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['yes'])) {
    // "はい"ボタンがクリックされた場合、削除処理を実行
    $db->deleteSyain($id);
    // index.phpにリダイレクト
    header("Location: index.php");
    exit;
  } else {
    // "いいえ"ボタンがクリックされた場合、編集画面にリダイレクト
    header("Location: syain_edit.php?id=" . $id);
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社員情報の削除</title>
</head>
<body>
  <p>以下の社員を削除しますか？</p>
  <p>社員番号: <?php echo $syain["id"]; ?></p>
  <p>名前: <?php echo $syain["name"]; ?></p>
  <p>年齢: <?php echo $syain["age"]; ?></p>
  <p>労働形態: <?php echo $syain["work"]; ?></p>
  <form action="syain_delete.php?id=<?php echo $id; ?>" method="post">
    <input type="submit" name="yes" value="はい"> <!-- 削除を確認するボタン -->
    <input type="submit" name="no" value="いいえ"> <!-- 削除をキャンセルするボタン -->
  </form>
</body>
</html>
