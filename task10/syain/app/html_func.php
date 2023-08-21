<?php
session_start();
// HTMLのドキュメント上部を表示する関数
// オプションの引数 $heading が指定されていない場合、デフォルトでは "社員一覧" をヘッダーとして表示します
function show_top($heading = "社員一覧")
{
  echo <<<TOP
  <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社員管理</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>{$heading}</h1>
TOP;
}

// HTMLのドキュメント下部を表示する関数
// オプションの引数 $return が true の場合、"社員一覧に戻る" ボタンを表示します
function show_down($return =false)
{
  if($return == true) {
    echo '<button><a href="index.php">社員一覧に戻る</a></button>';
  }
  echo <<<BOTTOM
  </body>
</html>
BOTTOM;
}

// 社員一覧を表示する関数
// 引数 $members は社員情報の配列を指します
function show_syainlist($members)
{
  echo <<<TABLE1
  <table>
    <tr>
      <th>社員番号</th>
      <th>名前</th>
    </tr>
TABLE1;
  foreach ($members as $member) {
    echo <<<TABLE2
      <tr>
        <th>{$member[id]}</th>
        <td><a href="syain_edit.php?id={$member[id]}">{$member["name"]}</a></td>
      </tr>
TABLE2;
 }
 echo <<<TABLE3
    </table>
    <button><a href="syain_create.php">社員情報の追加</a></button>
TABLE3;
}

// フォームを表示する関数
// 各引数はフォームの各フィールドに相当します。$status は操作の種類（例えば "create"）、$button は送信ボタンのラベルを指します
function show_form($id, $name, $age, $work, $old_id, $status, $button)
{
  $error = get_error();
  echo <<<FORM
  <form action="post_data.php" method="post">
    <p>社員番号</p>
    <input type="text" name="id" placeholder="例) 10001" value="{$id}">
    <p>名前</p>
    <input type="text" name="name" placeholder="例) 中野 孝" value="{$name}">
    <p>年齢</p>
    <input type="text" name="age" placeholder="例) 35" value="{$age}">
    <p>勤務形態</p>
    <input type="text" name="work" placeholder="例) 社員" value="{$work}">
    <p class="red">{$error}</p>
    <input type="hidden" name="old_id" value="{$old_id}">
    <input type="hidden" name="status" value="{$status}">
    <input type="submit" name="button" value="{$button}">
  </form>
FORM;
}

// 新規作成フォームを表示する関数
// フォームフィールドは空に設定され、ステータスは "create"、送信ボタンのラベルは "登録" に設定されます
function show_create()
{
  $error = get_error();

  $id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : '');
  $name = isset($_POST['name']) ? $_POST['name'] : (isset($_GET['name']) ? $_GET['name'] : '');
  $age = isset($_POST['age']) ? $_POST['age'] : (isset($_GET['age']) ? $_GET['age'] : '');
  $work = isset($_POST['work']) ? $_POST['work'] : (isset($_GET['work']) ? $_GET['work'] : '');
  show_form($id, $name, $age, $work, "", "create", "登録");
}

function show_update($syain)
{
    if (!isset($_GET['id'])) {
        die("IDが指定されていません。");
    }

    $old_id = $_GET['id']; // URLのクエリパラメータからIDを取得

    $db = new Database(); // データベースの新しいインスタンスを作成します
    $syain = $db->getSyainById($old_id); // 社員情報を取得

    //URLのクエリパラメータにidが存在する場合、$idに$_GET['id']の値を代入し、存在しない場合は$idに$syain['id']の値を代入します。
    $id = isset($_GET['id']) ? $_GET['id'] : $syain['id'];
    $name = isset($_GET['name']) ? $_GET['name'] : $syain['name'];
    $age = isset($_GET['age']) ? $_GET['age'] : $syain['age'];
    $work = isset($_GET['work']) ? $_GET['work'] : $syain['work'];
    $error = isset($_GET['error']) ? $_GET['error'] : "";

    show_form($id, $name, $age, $work, $old_id, "update", "更新");
}


?>