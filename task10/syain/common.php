<?php
// 必要なファイルをインクルードします
require_once('app/Database.php'); 
require_once('app/html_func.php'); 
require_once('app/check.php'); 

// エラーメッセージを取得する関数です
function get_error() 
{
  $error = ""; 
  // GETパラメーターにエラーがあるかをチェックします
  if (isset($_GET["error"])) {
    $error = $_GET["error"];
  }
  return $error;
}

// データベースの新しいインスタンスを作成します
$db = new Database(); 

// 社員情報を表示する関数です
function show_syain($id)
{
  // データベースの新しいインスタンスを作成します
  $db = new Database();
  // 社員情報を取得します
  $syain = $db->getSyainById($id);

  // 社員情報がある場合
  if ($syain) {
    // 社員情報を表示します
    echo <<<TABLE
    <table>
      <tr>
        <th>社員番号</th>
        <th>名前</th>
        <th>年齢</th>
        <th>労働形態</th>
      </tr>
      <tr>
        <td>{$syain["id"]}</td>
        <td>{$syain["name"]}</td>
        <td>{$syain["age"]}</td>
        <td>{$syain["work"]}</td>
      </tr>
    </table>
    <a href="syain_update.php?id={$syain["id"]}">社員情報の更新</a></br>
    <a href="syain_delete.php?id={$syain["id"]}">社員情報の削除</a></br>
TABLE;
  } else {
    // 社員情報がない場合、メッセージを表示します
    echo "<p>指定した社員は見つかりませんでした。</p>";
  }
}

// 社員情報を作成する関数です
function create_syain($id, $name, $age, $work)
{
  // データベースの新しいインスタンスを作成します
  $db = new Database();

  // 社員番号が存在しない場合
  if (!$db->idexist($id)) {
    // 社員情報を作成します
    $db->createsyain($id, $name, $age, $work);
    // インデックスページにリダイレクトします
    header("Location: index.php");
    exit;
  } else {
    // 社員番号が既に存在する場合、一時的に社員情報をセッションに保存します
    $_SESSION['temp_syain'] = [
      'id' => $id,
      'name' => $name,
      'age' => $age,
      'work' => $work,
    ];
    // 社員作成ページにエラーメッセージと共にリダイレクトします
    header("Location: syain_create.php?error=duplicate");
    exit;
  }
}
?>
