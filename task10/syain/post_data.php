<?php
require_once('common.php'); // common.phpというファイルを一度だけ読み込む。このファイルがすでに読み込まれていた場合は再度読み込まない。

if (isset($_POST["status"])) { // "status"というキーが$_POST配列に存在するかどうかをチェックする。存在する場合は次の処理を実行する。
  
  if (isset($_POST["id"])) { // "id"というキーが$_POST配列に存在するかどうかをチェックする。存在する場合は、その値を$id変数に代入する。
    $id = $_POST["id"];
  }

  if (isset($_POST["name"])) { // "name"というキーが$_POST配列に存在するかどうかをチェックする。存在する場合は、その値を$name変数に代入する。
    $name = $_POST["name"];
  }

  if (isset($_POST["age"])) { // "age"というキーが$_POST配列に存在するかどうかをチェックする。存在する場合は、その値を$age変数に代入する。
    $age = $_POST["age"];
  }

  if (isset($_POST["work"])) { // "work"というキーが$_POST配列に存在するかどうかをチェックする。存在する場合は、その値を$work変数に代入する。
    $work = $_POST["work"];
  }

  if (isset($_POST["old_id"])) { // "old_id"というキーが$_POST配列に存在するかどうかをチェックする。存在する場合は、その値を$old_id変数に代入する。
    $old_id = $_POST["old_id"];
  }

  if ($_POST["status"] == "create") { // $_POST["status"]の値が"create"であるかどうかをチェックする。"create"である場合は次の処理を実行する。
    
    if (check_input($id, $name, $age, $work, $error) == false) { // check_input関数を用いて入力値のチェックを行う。問題がある場合はエラーページにリダイレクトする。
      header("Location: syain_create.php?error={$error}"); // ブラウザに対して、指定したURLにリダイレクトすることを伝える。
      exit(); // スクリプトを終了する。
    }

    if ($db->idexist($id) == true) { // $dbオブジェクトのidexistメソッドを用いて、指定したIDがすでに存在するかどうかをチェックする。存在する場合はエラーページにリダイレクトする。
      $error = "既に使用されているIDです";
      header("Location: syain_create.php?error={$error}&name={$name}&age={$age}&work={$work}");; // ブラウザに対して、指定したURLにリダイレクトすることを伝える。
      exit(); // スクリプトを終了する。
    }

    if ($db->createsyain($id, $name, $age, $work) == false) { // $dbオブジェクトのcreatesyainメソッドを用いて、新たな社員情報を作成する。問題がある場合はエラーページにリダイレクトする。
      $error = "DBエラー";
      header("Location: syain_create.php?error={$error}"); // ブラウザに対して、指定したURLにリダイレクトすることを伝える。
      exit(); // スクリプトを終了する。
    }

    header("Location: index.php"); // 社員情報の作成が成功した場合は、ブラウザに対してindex.phpにリダイレクトすることを伝える。
    exit(); // スクリプトを終了する。
  }
}
?>
