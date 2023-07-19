<?php
try {
    //DSN（Data Source Name）と呼ばれ、接続するデータベースの詳細を指定します。
    $pdo = new PDO(
      'mysql:host=localhost;dbname=consumer;charset=utf8mb4',
      'root',
      'root',
      [
        //エラーが起きたときには、そのエラー情報を包含する「例外」を発生させて、それを後続のコードでキャッチできるようにする
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        //データベースから取得したデータのデフォルトの取得モードを設定します。
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //プリペアドステートメント（事前にSQL文を準備しておくこと）を、データベース側で正しく処理させる
        PDO::ATTR_EMULATE_PREPARES   => false,
      ]
    );

    // $pdo->query("DROP TABLE IF EXISTS inquiries");
    // $pdo->query(
    // "CREATE TABLE inquiries(
    // id INT AUTO_INCREMENT PRIMARY KEY,
    // user_name VARCHAR(128),
	  // user_kana VARCHAR(128),
	  // user_email VARCHAR(128),
	  // user_tel VARCHAR(128),
	  // inquiry_item VARCHAR(128),
	  // inquiry_content TEXT,
	  // date DATETIME
    // )");

  // POSTからデータを取得
  $user_name = $_POST['user_name'];
  $user_kana = $_POST['user_kana'];
  $user_email = $_POST['user_email'];
  $user_tel = $_POST['user_tel'];
  $inquiry_item = $_POST['inquiry_item'];
  $inquiry_content = $_POST['inquiry_content'];
  $date = date('Y-m-d H:i:s'); // 現在の日時

  // データベースへの保存処理
  //$stmt = $pdo->prepare(...)：データベースに送る「命令」を準備しています。?は、後で具体的なデータに置き換える予定の「空欄」です。
  $stmt = $pdo->prepare('INSERT INTO inquiries (user_name, user_kana, user_email, user_tel, inquiry_item, inquiry_content, date) VALUES (?, ?, ?, ?, ?, ?, ?)');
  //$saved_to_db = $stmt->execute([...])：「空欄」を具体的なデータで埋めてデータベースに送り、その「命令」が成功したかどうかの結果を$saved_to_dbに保存しています。
  $saved_to_db = $stmt->execute([$user_name, $user_kana, $user_email, $user_tel, $inquiry_item, $inquiry_content, $date]);

  // データベースへの保存が成功したら task9-1.php へリダイレクト
  if ($saved_to_db) {
      header('Location: task9-1.php');
      exit();
  } else {
      // 保存が失敗したらエラーページへリダイレクト（あるいはエラーメッセージを表示）
      header('Location: error_page.php');
      exit();
  }
	
} catch(PDOException $e) {
    echo $e->getMessage() . '<br>';
    exit;
}
?>
